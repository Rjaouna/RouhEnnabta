<?php

namespace App\DataFixtures;

use App\Entity\Bienfaits;
use App\Entity\Precaution;
use App\Entity\Recettes;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ComplementProductDataFixtures extends Fixture implements DependentFixtureInterface
{
	private array $bienfaitsList = [
		"Troubles respiratoires\n- Détend les muscles bronchiques\n- Favorise l’ouverture des voies respiratoires\n- Aide en cas de toux sèche",
		"Système digestif\n- Soulage les crampes abdominales\n- Réduit les ballonnements\n- Facilite la digestion",
		"Système nerveux\n- Apaise le stress\n- Aide à clarifier l'esprit\n- Améliore la concentration",
	];

	private array $precautionsList = [
		"Photosensibilisante : ne pas s’exposer au soleil après application.\nToujours bien diluer.",
		"Déconseillée aux femmes enceintes et allaitantes.\nNe pas utiliser en continu.",
		"Toujours bien diluer.\nDéconseillée aux enfants < 6 ans.\nPrudence aux épileptiques.",
		"Déconseillée aux bébés < 3 mois.\nÉviter le contact avec les yeux.",
	];

	private array $recettesList = [
		"Synergie respiration\n- 1 goutte HE\n- 2 gouttes eucalyptus\n- 1 c. café HV\nUsage : thorax",
		"Huile digestive\n- 2 gouttes basilic\n- 1 goutte citron\nUsage : ventre",
		"Roll-on anti-stress\n- 3 gouttes lavande\n- Compléter HV\nUsage : poignets",
		"Huile de massage circulatoire\n- 3 gouttes romarin\n- 1 c. soupe HV\nUsage : jambes",
	];

	public function load(ObjectManager $manager): void
	{
		// récupération de tous les produits créés dans ProductFixtures
		$products = $manager->getRepository(Product::class)->findAll();

		foreach ($products as $product) {

			// ⭐ 2 bienfaits random
			for ($i = 0; $i < 2; $i++) {
				$bf = new Bienfaits();
				$bf->setDescription($this->getRandom($this->bienfaitsList));
				$bf->addProduct($product);
				$manager->persist($bf);
			}

			// ⭐ 2 précautions random
			for ($i = 0; $i < 2; $i++) {
				$pc = new Precaution();
				$pc->setDescription($this->getRandom($this->precautionsList));
				$pc->addProduct($product);
				$manager->persist($pc);
			}

			// ⭐ 2 à 3 recettes random
			$numRecettes = rand(2, 3);
			for ($i = 0; $i < $numRecettes; $i++) {
				$rc = new Recettes();
				$rc->setDescription($this->getRandom($this->recettesList));
				$rc->addProduct($product);
				$manager->persist($rc);
			}
		}

		$manager->flush();
	}

	private function getRandom(array $list): string
	{
		return $list[array_rand($list)];
	}

	public function getDependencies(): array
	{
		return [
			ProductFixtures::class,
			ProductImageFixtures::class
		];
	}
}
