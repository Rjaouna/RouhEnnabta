<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Gammes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProductFixtures extends Fixture
{
	public function __construct(
		private SluggerInterface $slugger
	) {}

	public function load(ObjectManager $manager): void
	{
		$categories = [];
		$gammes = [];

		$rows = [
			['Ammi','Huiles essentielles','Fleurs','10ml',10,50],
['Armoise blanche','Huiles essentielles','Fleurs','15ml',10,50],
['Basilic','Huiles essentielles','Fleurs','10ml',10,50],
['Camomille sauvage','Huiles essentielles','Fleurs','10ml',10,50],
['Cannelle','Huiles essentielles','Épices','15ml',10,50],
['Cedre de l\'Atlas','Huiles essentielles','Bois','10ml',10,50],
['Citron','Huiles essentielles','Agrumes','10ml',10,50],
['Rose Damascena','Huiles essentielles','Fleurs','5ml',10,50],
['Ciste','Huiles essentielles','Fleurs','10ml',10,50],
['Cypres','Huiles essentielles','Bois','10ml',10,50],
['Eucalyptus','Huiles essentielles','Bois','10ml',10,50],
['Genevrier','Huiles essentielles','Aiguilles','10ml',10,50],
['Geranium','Huiles essentielles','Fleurs','10ml',10,50],
['Gingembre','Huiles essentielles','Herbacées / Aromatiques','10ml',10,50],
['Girofle','Huiles essentielles','Fleurs','10ml',10,50],
['Inule visqueuse','Huiles essentielles','Fleurs','10ml',10,50],
['Laurier noble','Huiles essentielles','Plantes','10ml',10,50],
['Lavande','Huiles essentielles','Herbacées / Aromatiques','10ml',10,50],
['Marjolane','Huiles essentielles','Plantes','10ml',10,50],
['Menthe verte','Huiles essentielles','Herbacées / Aromatiques','10ml',10,50],
['Menthe pouliot','Huiles essentielles','Plantes','10ml',10,50],
['Menthe poivrée','Huiles essentielles','Herbacées / Aromatiques','10ml',10,50],
['Myrte','Huiles essentielles','Fleurs','10ml',10,50],
['Origan','Huiles essentielles','Herbacées / Aromatiques','10ml',10,50],
['Romarin','Huiles essentielles','Aiguilles','10ml',10,50],
['Sauge','Huiles essentielles','Plantes','10ml',10,50],
['Arbre a thé','Huiles essentielles','Aiguilles','10ml',10,50],
['Thym','Huiles essentielles','Plantes','10ml',10,50],
['Verveine','Huiles essentielles','Plantes','10ml',10,50],
['Ylang Ylang','Huiles essentielles','Herbacées / Aromatiques','10ml',10,50],
['Orange','Huiles essentielles','Agrumes','10ml',10,50],
['Encens','Huiles essentielles','Médicinales marocaines','10ml',10,50],
['Neroli','Huiles essentielles','Médicinales marocaines','5ml',10,50],
['Eucalyptus Radiata','Huiles essentielles','Plantes','10ml',10,50],
['Argan','Huiles végétales','Plantes','60ml',10,50],
['Figue de Barbarie','Huiles végétales','Aiguilles','15ml',10,50],
['Rose Musquee','Huiles végétales','Fleurs','15ml',10,50],
['Fenouil','Huiles végétales','Fleurs','15ml',10,50],
['Lin','Huiles végétales','Fleurs','15ml',10,50],
['Ricin ','Huiles végétales','Plantes','15ml',10,50],
['Coco','Huiles végétales','Plantes','15ml',10,50],
['Pepins de raisin','Huiles végétales','Fruits','15ml',10,50],
['Soja','Huiles végétales','Plantes','15ml',10,50],
['Amande douce','Huiles végétales','Fruits','15ml',10,50],
['Amande amer','Huiles végétales','Fruits','15ml',10,50],
['Abricot','Huiles végétales','Fruits','15ml',10,50],
['Avocat','Huiles végétales','Fruits','15ml',10,50],
['Graines de cresson','Huiles végétales','Plantes','15ml',10,50],
['Cumin','Huiles végétales','Épices','15ml',10,50],
['Fenugrec','Huiles végétales','Épices','15ml',10,50],
['Ail','Huiles végétales','Plantes','15ml',10,50],
['Nigelle','Huiles végétales','Herbacées / Aromatiques','15ml',10,50],
['Oignon','Huiles végétales','Plantes','15ml',10,50],
['Pepin de courge','Huiles végétales','Plantes','15ml',10,50],
['Sesame','Huiles végétales','Plantes','15ml',10,50],
['Poids chiches','Huiles végétales','Plantes','15ml',10,50],
['Eau Florale Lavande','Hydrolats','Herbacées / Aromatiques','200ml',10,50],
['Eau Florale de Rose','Hydrolats','Fleurs','200ml',10,50],
['Eaau Florale d\'Orange Amère','Hydrolats','Agrumes','200ml',10,50],
['Hydrolat de Romarin','Hydrolats','Aiguilles','200ml',10,50],
['Hydrolat de Menthe Verte','Hydrolats','Herbacées / Aromatiques','200ml',10,50],
['Hydrolat de Camomille','Hydrolats','Fleurs','200ml',10,50],
['Eau Florale Géranium','Hydrolats','Fleurs','200ml',10,50],
['Hydrolat d\'origan','Hydrolats','Plantes','200ml',10,50],
['Romarin','Herbes séchées','Aiguilles','100g',10,50],
['Lavande Herbe','Herbes séchées','Herbacées / Aromatiques','60g',10,50],
['Moringa Oleifera','Herbes séchées','Plantes','60g',10,50],
['Herbes a thé','Herbes séchées','Herbacées / Aromatiques','100g',10,50],
['Marjolaine','Herbes séchées','Plantes','100g',10,50],
		];

		foreach ($rows as [$name, $categoryName, $gammeName, $contenance, $purchase, $margin]) {

			// ===== CATEGORY =====
			if (!isset($categories[$categoryName])) {
				$category = new Category();
				$category->setName($categoryName);
				$category->setSlug($this->slugger->slug($categoryName)->lower());
				$category->setIsActive(true);

				$manager->persist($category);
				$categories[$categoryName] = $category;
			}

			// ===== GAMME =====
			if (!isset($gammes[$gammeName])) {
				$gamme = new Gammes();
				$gamme->setName($gammeName);
				$gamme->setIsActive(true);

				$manager->persist($gamme);
				$gammes[$gammeName] = $gamme;
			}

			// ===== PRODUCT =====
			$product = new Product();
			$product->setName($name);
			$product->setSlug($this->slugger->slug($name)->lower());
			$product->setDescription('');
			$product->setContenance($contenance);
			$product->setPurchasePrice($purchase);
			$product->setMargin((string) $margin);
			$product->setSalePrice(
				$purchase + ($purchase * $margin / 100)
			);
			$product->setStock(0);
			$product->setIsActive(true);
			$product->setCategory($categories[$categoryName]);
			$product->setGamme($gammes[$gammeName]);

			$manager->persist($product);
		}

		$manager->flush();
	}
}
