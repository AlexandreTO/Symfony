<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

	// fixtures load fake data in a database for testing purposes
	private $encoder;

	public function __construct(UserPasswordEncoderInterface $encoder){
		$this->encoder = $encoder;
	}


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

    	$user = new User();
    	$user-> setUsername("alexandre");

    	$pwd = $this->encoder->encodePassword($user,'root'); // the password is set to "root" but it is hashed in the database to avoid any security issues
    	$user->setPassword($pwd);

    	//doing a select * from user displays everything for the user including the crypted password

    	$manager->persist($user);
        $manager->flush();
    }
}
