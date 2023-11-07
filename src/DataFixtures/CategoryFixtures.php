<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $travel = new Category();
        $travel->setName('Travel & Adventure');
        $manager->persist($travel);
        $this->addReference('cat-travel', $travel);

        $sport = new Category();
        $sport->setName('Sport');
        $manager->persist($sport);
        $this->addReference('cat-sport', $sport);

        $manager->flush();
    }
}
