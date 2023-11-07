<?php

namespace App\DataFixtures;

use App\Entity\Wish;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class WishFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $travel = $this->getReference('cat-travel');
        $sport = $this->getReference('cat-sport');

        $wish1 = new Wish();
        $wish1->setTitle('Sauter en parachute');
        $wish1->setAuthor('Pierre');
        $wish1->setDescription('Je voudrais tellement faire un saut en parachute !');
        $wish1->setDateCreated(new \DateTime('-1 month'));
        $wish1->setCategory($sport);
        $manager->persist($wish1);

        $wish2 = new Wish();
        $wish2->setTitle('Visiter New York');
        $wish2->setAuthor('Jean-Louis');
        $wish2->setIsPublished(false);
        $wish2->setCategory($travel);
        $manager->persist($wish2);

        $wish3 = new Wish();
        $wish3->setTitle('Gagner la coupe du monde de rubgy');
        $wish3->setAuthor('Galtier');
        $wish3->setCategory($sport);
        $manager->persist($wish3);

        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            CategoryFixtures::class // "App\Fixtures\CategoryFixtures"
        ];
    }
}
