<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $article = new Article();
        // $manager->persist($article);

        $manager->flush();
    }
}
