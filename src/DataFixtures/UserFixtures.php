<?php

namespace App\DataFixtures;

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
        $user1 = new User();
        $user1->setEmail('abc@example.com');
        $user1->setRoles(array('ROLE_ADMIN'));
        $user1->setFirstName('Kamil');
        $user1->setLastName('Was');
        $user1->setPassword($this->passwordEncoder->encodePassword(
            $user1,
            'Kamil215'
        ));
        $user2 = new User();
        $user2->setEmail('kamilm215@gmail.com');
        $user2->setFirstName('Stefan');
        $user2->setLastName('Stefanski');
        $user2->setPassword($this->passwordEncoder->encodePassword(
            $user2,
            'Kamil215'
        ));
        $manager->persist($user1);
        $manager->persist($user2);
        $manager->flush();
    }
}
