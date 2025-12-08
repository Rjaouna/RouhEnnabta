<?php

namespace App\DataFixtures;

use App\Entity\Blog;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BlogFixtures extends Fixture
{
	public function load(ObjectManager $manager): void
	{
		$articles = [

			[
				'name' => 'Eau de Rose',
				'image' => 'eau-de-rose.jpg',
				'content' => '
<h3>Dénomination</h3>
<p>
<strong>Français :</strong> Eau de rose<br>
<strong>Arabe classique :</strong> Al Warde<br>
<strong>Arabe dialectal :</strong> Lwarde Lbeldi
</p>

<h3>Terroir de production</h3>
<p>
La production de l’Eau de Rose de Kelaât M’Gouna–Dadès est concentrée
dans le sous-bassin hydrologique du Dadès–M’Goun, entre Ouarzazate et Tinghir.
</p>

<h3>Spécificités</h3>
<p>
Produit incolore à l’arôme spécifique, issu de la distillation des pétales
de roses selon des méthodes traditionnelles ou modernes.
</p>

<h3>Usages</h3>
<p>
Utilisée en parfumerie, pharmacie et aromathérapie.
</p>'
			],

			[
				'name' => 'Pommes de Midelt',
				'image' => 'pommes-midelt.jpg',
				'content' => '
<h3>Dénomination</h3>
<p>
<strong>Nom scientifique :</strong> Malus<br>
<strong>Arabe classique :</strong> Touffah<br>
<strong>Arabe dialectal :</strong> Tffah
</p>

<h3>Terroir de production</h3>
<p>
L’indication géographique « Pomme de Midelt » couvre 16 communes rurales
de la province de Midelt.
</p>

<h3>Spécificités</h3>
<p>
Variétés Golden Delicious, Starkimson et Starking Delicious.
Fruit juteux, chair fine, goût sucré à acidulé.
</p>

<h3>Usages</h3>
<p>
Consommée fraîche ou en jus.
</p>'
			],

			[
				'name' => 'Rose de Kelaât M’Gouna–Dadès',
				'image' => 'rose-kelaat-mgouna.jpg',
				'content' => '
<h3>Dénomination</h3>
<p>
<strong>Nom scientifique :</strong> Rosa damascena<br>
<strong>Arabe classique :</strong> Al Warde<br>
<strong>Arabe dialectal :</strong> Lwarde Lbeldi
</p>

<h3>Terroir de production</h3>
<p>
Zone du Dadès–M’Gouna couvrant sept communes de la région d’Ouarzazate.
</p>

<h3>Spécificités</h3>
<p>
La Rosa Damascena est la principale variété utilisée pour l’extraction
de parfum et d’huile essentielle.
</p>

<h3>Usages</h3>
<p>
Cosmétique, production d’eau de rose et d’huile essentielle.
</p>'
			],

			[
				'name' => 'Amandes',
				'image' => 'amandes-maroc.jpg',
				'content' => '
<h3>Dénomination</h3>
<p>
<strong>Nom scientifique :</strong> Prunus dulcis<br>
<strong>Arabe classique :</strong> Al-Laouz<br>
<strong>Arabe dialectal :</strong> Louz
</p>

<h3>Terroir de production</h3>
<p>
Anti-Atlas, Haut Atlas, Rif et région orientale du Maroc.
</p>

<h3>Spécificités</h3>
<p>
Culture traditionnelle avec forte présence de coopératives agricoles.
</p>

<h3>Usages</h3>
<p>
Amlou, huile alimentaire et cosmétique.
</p>'
			],

			[
				'name' => 'Dattes Majhoul de Tafilalet',
				'image' => 'dattes-majhoul.jpg',
				'content' => '
<h3>Dénomination</h3>
<p>
<strong>Nom scientifique :</strong> Phoenix dactylifera<br>
<strong>Arabe classique :</strong> Atamar<br>
<strong>Arabe dialectal :</strong> Tmar
</p>

<h3>Terroir de production</h3>
<p>
Région du Tafilalet, provinces d’Errachidia et Tinghir.
</p>

<h3>Spécificités</h3>
<p>
Datte demi-molle, forme allongée, riche en sucres naturels.
</p>

<h3>Usages</h3>
<p>
Consommée fraîche lors de cérémonies et festivités.
</p>'
			],

			[
				'name' => 'Vinaigre de Pomme',
				'image' => 'vinaigre-de-pomme.jpg',
				'content' => '
<h3>Dénomination</h3>
<p>
<strong>Arabe classique :</strong> Khall O’Ttoffah
</p>

<h3>Terroir de production</h3>
<p>
Issu de la filière pomme marocaine, avec une production annuelle
supérieure à 600 000 tonnes.
</p>

<h3>Spécificités</h3>
<p>
Riche en minéraux, utilisé pour ses bienfaits nutritionnels
et de conservation.
</p>

<h3>Usages</h3>
<p>
Condiment, marinades et sauces.
</p>'
			],

		];

		foreach ($articles as $data) {
			$blog = new Blog();
			$blog
				->setName($data['name'])
				->setContent($data['content'])
				->setImage($data['image'])
				->setIsActive(true);

			$manager->persist($blog);
		}

		$manager->flush();
	}
}
