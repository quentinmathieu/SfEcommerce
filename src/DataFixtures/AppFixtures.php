<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = [];
        // create 5 categories
        for ($i = 0; $i < 5; $i++) {
            $category = new Category();
            $category->setName('category '.$i);
            $manager->persist($category);
            $categories []= $category;
        }

        // create 20 products! Bam!
        for ($i = 0; $i < 80; $i++) {
            $product = new Product();
            $product->setName('product '.$i);
            $product->setPrice(mt_rand(1, 150000) / 100);
            $product->setCategory($categories[mt_rand(0,4)]);
            $product->setDiscount(mt_rand(0,1));
            $product->setSalesPromotion(mt_rand(0,50));
            $manager->persist($product);
        }
        $manager->flush();
    }
}
