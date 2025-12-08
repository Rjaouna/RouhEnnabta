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
			[
				'name' => 'Henné',
				'image' => 'henne-maroc.jpg',
				'content' => '
<h3>Dénomination</h3>
<p>
<strong>Nom scientifique :</strong> Lawsonia inermis<br>
<strong>Français :</strong> Le henné<br>
<strong>Arabe :</strong> Al Hinae
</p>

<h3>Terroir de production</h3>
<p>
Le henné est produit principalement dans les régions de Ouarzazate,
Zagoura et Tata (vallée du Drâa), ainsi que dans les communes d’Assa
et de Zag, dans la région de Guelmim-Oued Noun.
</p>

<h3>Spécificités</h3>
<p>
Le henné est une culture ancestrale. Il est préparé à partir de feuilles
récoltées exclusivement à la main, en trois récoltes annuelles entre
mai et octobre. La poudre obtenue est pure, naturelle, très fine,
sans additif, de couleur verte claire et à la fragrance intense.
</p>

<h3>Usages</h3>
<p>
Très présent dans les rituels traditionnels marocains (fiançailles,
mariages, baptêmes), le henné est également utilisé comme soin capillaire
naturel pour renforcer les cheveux et prévenir leur chute.
</p>'
			],
			[
				'name' => 'Huile de Figue de Barbarie',
				'image' => 'figue-de-barbarie-huile.jpg',
				'content' => '
<h3>Dénomination</h3>
<p>
<strong>Nom scientifique :</strong> Opuntia ficus-indica<br>
<strong>Appellation en Français :</strong> Cactus<br>
<strong>Arabe classique :</strong> Assobbar<br>
<strong>Arabe dialectal :</strong> Zaâboul
</p>

<h3>Terroir de production</h3>
<p>
La figue de barbarie est cultivée dans plusieurs régions du Maroc,
notamment Aït Baâmrane, Rhamna, Ouled Heddou, Béjaâd, Khouribga,
Al Hoceima et Zerhoun.
</p>
<p>
Il faut près d’une tonne de figues pour obtenir un litre
d’huile de figue de barbarie, extraite par pression à froid
des graines.
</p>

<h3>Spécificités</h3>
<p>
Huile 100 % pure et naturelle, obtenue par première pression à froid
sans solvant. Elle se caractérise par sa couleur jaune à vert et
une forte teneur en acide linoléique (environ 60 %).
</p>

<h3>Usages</h3>
<p>
Produit destiné exclusivement à un usage cosmétique.
</p>'
			],

			[
				'name' => 'Amlou',
				'image' => 'amlou-maroc.jpg',
				'content' => '
<h3>Dénomination</h3>
<p>
<strong>Appellation en Français :</strong> Amlou<br>
<strong>Appellation en Arabe / Berbère :</strong> Amlou
</p>

<h3>Terroir de production</h3>
<p>
L’Amlou est une préparation culinaire marocaine ancestrale,
originaire de la région du Souss, produite dans la même zone
géographique que l’arganier.
</p>
<p>
Il s’agit d’une pâte à tartiner artisanale composée d’huile
d’argane, d’amandes grillées et broyées, auxquelles peuvent
être ajoutés du miel ou du sucre selon les traditions.
</p>

<h3>Spécificités</h3>
<p>
Préparation fortifiante et énergétique, traditionnellement
servie au petit-déjeuner ou au goûter, sur du pain d’orge,
de maïs ou de blé. Elle accompagne également les pâtisseries.
</p>

<h3>Usages</h3>
<p>
À consommer en pâte à tartiner sur du pain ou des crêpes,
ou accompagné d’un thé à la menthe, principalement
au petit-déjeuner ou au goûter.
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
