<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setPseudo('admin');
        $admin->setEmail('admin@bucket-list.com');
        $admin->setPassword($this->hasher->hashPassword($admin, '1234'));
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setIsVerified(true);
        $manager->persist($admin);
        $this->addReference('user-admin', $admin);

        $john = new User();
        $john->setPseudo('john');
        $john->setEmail('john@doe.fr');
        $john->setPassword($this->hasher->hashPassword($john, '1234'));
        $john->setIsVerified(true);
        $manager->persist($john);
        $this->addReference('user-john', $john);

        $manager->flush();
    }
}
