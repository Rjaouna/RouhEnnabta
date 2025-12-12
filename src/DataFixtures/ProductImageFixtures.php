<?php

namespace App\DataFixtures;

use App\Entity\ProductImage;
use App\Repository\ProductRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProductImageFixtures extends Fixture implements DependentFixtureInterface
{
	public function __construct(
		private ProductRepository $productRepository
	) {}

	public function load(ObjectManager $manager): void
	{
		$images = [
			'herbes-aromatiques-6934664e5b33b021807825-6937322e90fd9314439227.jpg',
			'herbes-aromatiques-6934664e5b33b021807825.jpg',
			'huiles-essentielles-6934661dbcdac699813704-6937320f6af85004018878.jpg',
			'huiles-vegetales-6934663c7167e024090756-69373215661b6670108142.jpg',
			'huiles-vegetales-6934663c7167e024090756.jpg',
			'hydrolats-693466422ae57654307535-6937322178ec8640651034.jpg',
		];

		$products = $this->productRepository->findAll();

		foreach ($products as $product) {

			// Mélanger l’ordre pour chaque produit
			$randomImages = $images;
			shuffle($randomImages);

			// 4 images par produit
			for ($i = 0; $i < 4; $i++) {
				$img = new ProductImage();
				$filename = $randomImages[$i];

				$img->setFilename($filename);
				$img->setAlt($product->getName());
				$img->setIsMain($i === 0); // première image = image principale
				$img->setPosition($i + 1);
				$img->setProduct($product);

				$manager->persist($img);
			}
		}

		$manager->flush();
	}

	/** 
	 * Assure que ProductFixtures s’exécute AVANT cette fixture
	 */
	public function getDependencies(): array
	{
		return [
			ProductFixtures::class
		];
	}
}
