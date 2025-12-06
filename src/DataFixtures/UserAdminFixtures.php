<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserAdminFixtures extends Fixture
{
	private UserPasswordHasherInterface $passwordHasher;

	public function __construct(UserPasswordHasherInterface $passwordHasher)
	{
		$this->passwordHasher = $passwordHasher;
	}

	public function load(ObjectManager $manager): void
	{
		$admin = new User();
		$admin->setEmail('admin@admin.com');
		$admin->setFirstname('Admin');
		$admin->setLastname('Principal');
		$admin->setRoles(['ROLE_ADMIN']);

		$hashedPassword = $this->passwordHasher->hashPassword(
			$admin,
			'admin123'
		);
		$admin->setPassword($hashedPassword);

		$admin->setIsActive(true);

		$manager->persist($admin);
		$manager->flush();
	}
}
