<?php

namespace App\DataFixtures;

use App\Entity\ApiToken;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEmail('admin@spacebar.com');
        $admin->setFirstname('admin');
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'test123'
        ));
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);
        $apiToken = new ApiToken($admin);
        $manager->persist($apiToken);
        $manager->flush();
        for($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->setEmail(sprintf('spacebar%d@example.com', $i));
            $user->setFirstname(sprintf('spacebar%d', $i));
            $user->setPassword($this->passwordEncoder->encodePassword(
               $user,
               'test123'
            ));
            $manager->persist($user);
        }

        $manager->flush();
    }
}
