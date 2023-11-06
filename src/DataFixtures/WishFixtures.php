<?php

namespace App\DataFixtures;

use App\Entity\Wish;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WishFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $wish1 = new Wish();
        $wish1->setTitle('Sauter en parachute');
        $wish1->setAuthor('Pierre');
        $wish1->setDescription('Je voudrais tellement faire un saut en parachute !');
        $wish1->setDateCreated(new \DateTime('-1 month'));
        $manager->persist($wish1);

        $wish2 = new Wish();
        $wish2->setTitle('Visiter New York');
        $wish2->setAuthor('Jean-Louis');
        $wish2->setIsPublished(false);
        $manager->persist($wish2);

        $wish3 = new Wish();
        $wish3->setTitle('Gagner la coupe du monde de rubgy');
        $wish3->setAuthor('Galtier');
        $manager->persist($wish3);

        $manager->flush();
    }







}
