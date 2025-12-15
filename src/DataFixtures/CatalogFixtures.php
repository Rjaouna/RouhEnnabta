<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Gammes;
use App\Entity\Bienfaits;
use App\Entity\Recettes;
use App\Entity\Precaution;
use App\Entity\ProductImage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CatalogFixtures extends Fixture
{
	public function __construct(
		private SluggerInterface $slugger
	) {}

	/**
	 * 🔹 DONNÉES RÉELLES STRUCTURÉES
	 */
	private array $productsData = [
		[
			'name' => 'Ammi',
			'latin' => 'Ammi visnaga',
			'description' => <<<TEXT
L’huile essentielle d’Ammi est extraite des graines de la plante Ammi visnaga,
connue depuis des siècles pour ses vertus respiratoires et circulatoires.
Elle se distingue par sa puissance, sa richesse en khellone et visnadine,
et son action ciblée sur les muscles lisses.

Odeur douce, légèrement herbacée, à l’action apaisante et relaxante.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Fleurs',

			'images' => [
				'ammi-1.jpg',
				'ammi-2.jpg',
				'ammi-3.jpg',
			],

			'bienfaits' => [
				"Troubles respiratoires\n- Détend les muscles bronchiques\n- Favorise l’ouverture des voies respiratoires\n- Aide en cas de toux spasmodique",
				"Troubles digestifs\n- Apaise les spasmes gastriques\n- Facilite la digestion\n- Soulage les crampes intestinales",
				"Système cardiovasculaire\n- Améliore la circulation sanguine\n- Favorise la dilatation des vaisseaux",
			],

			'recettes' => [
				<<<RECETTE
Synergie Respiration (Asthme, bronchite, toux spasmodique)
Usage : application sur le thorax + inspiration douce
Mélange :
- 1 goutte d’HE Ammi
- 2 gouttes d’HE Eucalyptus radié
- 2 gouttes d’HE Menthe poivrée
- 1 c. à café d’huile végétale
Effet : ouvre les bronches, apaise les spasmes.
RECETTE,

				<<<RECETTE
Huile de Massage Circulatoire
Usage : massage des jambes et zones douloureuses
Mélange :
- 1 goutte d’HE Ammi
- 3 gouttes d’HE Citron
- 3 gouttes d’HE Romarin à cinéole
Effet : active la circulation.
RECETTE,

				<<<RECETTE
Synergie Cardio-Confort
Usage : massage thorax ou dos
Mélange :
- 1 goutte d’HE Ammi
- 2 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Marjolaine
Effet : vasodilatateur doux.
RECETTE,

				<<<RECETTE
Roll-On Digestion
Usage : bas du ventre après repas
Mélange :
- 1 goutte d’HE Ammi
- 3 gouttes d’HE Basilic tropical
- 3 gouttes d’HE Citron
Effet : réduit les crampes digestives.
RECETTE,

				<<<RECETTE
Inhalation Anti-Toux Spasmodique
Usage : inhalation indirecte
Mélange :
- 1 goutte d’HE Ammi
- 1 goutte d’HE Ravintsara
Effet : apaise la toux.
RECETTE,

				<<<RECETTE
Bain Relaxant Respiratoire
Usage : bain tiède
Mélange :
- 1 goutte d’HE Ammi
- 2 gouttes d’HE Lavande vraie
Effet : détente profonde.
RECETTE,

				<<<RECETTE
Baume Respiratoire Maison
Usage : application sur la poitrine
Mélange :
- Beurre de karité
- Huile végétale de nigelle
- HE Ammi + Eucalyptus
Effet : facilite la respiration.
RECETTE,
			],

			'precautions' => [
				"Photosensibilisante : ne pas s’exposer au soleil après application.",
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Demander l’avis d’un professionnel en cas de traitement médical.",
			],
		],
		[
			'name' => 'Armoise blanche',
			'latin' => 'Artemisia herba-alba',
			'description' => <<<TEXT
L’huile essentielle d’Armoise Blanche est issue d’une plante aromatique très répandue dans les régions arides du Maghreb.
Réputée pour ses propriétés puissantes, elle agit profondément sur le système nerveux, digestif et respiratoire.
Son profil biochimique riche en cétones lui confère une action régulatrice, antispasmodique et tonique remarquable.
Son parfum est herbacé, sec et légèrement camphré.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Fleurs',

			'images' => [
				'armoise-blanche-1.jpg',
				'armoise-blanche-2.jpg',
				'armoise-blanche-3.jpg',
			],

			'bienfaits' => [
				"Système respiratoire\n- Décongestionne les voies respiratoires\n- Apaise les spasmes bronchiques\n- Aide à dégager les voies nasales et pulmonaires",

				"Système digestif\n- Soulage les crampes abdominales\n- Réduit les ballonnements et spasmes digestifs\n- Favorise l’équilibre intestinal",

				"Système nerveux\n- Agit comme un rééquilibrant nerveux\n- Tonifie en cas de fatigue\n- Aide à dissiper le stress et la nervosité",

				"Circulation & douleurs\n- Effet chauffant et tonifiant\n- Aide en cas de douleurs musculaires ou articulaires\n- Favorise une meilleure circulation périphérique",
			],

			'recettes' => [
				<<<RECETTE
Massage Anti-Spasmes Digestifs
Usage : masser le bas du ventre
Mélange :
- 1 goutte d’HE Armoise blanche
- 3 gouttes d’HE Basilic tropical
- 2 gouttes d’HE Menthe poivrée
- 1 c. à café d’huile végétale
Effet : soulage les crampes, spasmes et la digestion difficile.
RECETTE,

				<<<RECETTE
Baume Respiratoire Décongestionnant
Usage : poitrine et haut du dos
Mélange :
- 1 goutte d’HE Armoise blanche
- 2 gouttes d’HE Eucalyptus radié
- 2 gouttes d’HE Pin sylvestre
- 1 c. à soupe de beurre de karité
Effet : libère la respiration, apaise la toux et le nez bouché.
RECETTE,

				<<<RECETTE
Synergie Nervosité et Stress
Usage : application sur les poignets ou massage nuque / trapèzes
Mélange :
- 1 goutte d’HE Armoise blanche
- 3 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Marjolaine à coquilles
- 1 c. à café d’huile végétale
Effet : calme l’esprit et réduit la tension nerveuse.
RECETTE,

				<<<RECETTE
Huile de Massage Circulatoire – Jambes lourdes
Usage : masser de bas en haut
Mélange :
- 1 goutte d’HE Armoise blanche
- 3 gouttes d’HE Citron
- 3 gouttes d’HE Romarin à cinéole
- 1 c. à soupe d’huile de sésame
Effet : active la circulation et soulage les jambes fatiguées.
RECETTE,

				<<<RECETTE
Inhalation Anti-Toux
Usage : inhalation douce
Mélange :
- 1 bol d’eau chaude
- 1 goutte d’HE Armoise blanche
- 1 goutte d’HE Ravintsara
Effet : calme la toux et décongestionne les bronches.
RECETTE,

				<<<RECETTE
Bain Détente Musculaire
Usage : dans un bain tiède
Mélange :
- 1 goutte d’HE Armoise blanche
- 2 gouttes d’HE Lavande vraie
- 1 c. à soupe de base neutre
Effet : relâche les tensions musculaires et nerveuses.
RECETTE,
			],

			'precautions' => [
				"Déconseillée aux femmes enceintes, allaitantes et aux enfants.",
				"Toujours bien diluer, jamais pure.",
				"Ne pas utiliser en continu (cure courte).",
				"Éviter l’ingestion.",
			],
		],
		[
			'name' => 'Basilic',
			'latin' => 'Ocimum basilicum',
			'description' => <<<TEXT
L’huile essentielle de Basilic est une alliée puissante du système digestif et nerveux.
Connue pour ses propriétés antispasmodiques remarquables, elle soulage rapidement les tensions internes,
les crampes, la fatigue nerveuse et le stress.
Son parfum frais et herbacé stimule l’esprit tout en apaisant le corps.
Odeur fraîche, épicée et légèrement sucrée.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Fleurs',

			'images' => [
				'basilic-1.jpg',
				'basilic-2.jpg',
				'basilic-3.jpg',
			],

			'bienfaits' => [
				"Système digestif\n- Antispasmodique très puissant\n- Soulage les crampes abdominales\n- Réduit les ballonnements\n- Favorise une digestion fluide",

				"Système nerveux\n- Apaise le stress et les tensions nerveuses\n- Aide à clarifier l’esprit\n- Améliore la concentration\n- Réduit les maux de tête liés au stress",

				"Antalgique et décontractant\n- Relâche les tensions musculaires\n- Utile pour les maux de ventre liés au stress\n- Action calmante sur les douleurs spasmodiques",
			],

			'recettes' => [
				<<<RECETTE
Massage Anti-Spasmes Digestifs (recette phare)
Usage : masser le bas du ventre après un repas ou en cas de crampes
Mélange :
- 2 gouttes d’HE Basilic
- 1 goutte d’HE Menthe poivrée
- 1 goutte d’HE Citron
- 1 c. à café d’huile végétale (jojoba ou amande douce)
Effet : soulage instantanément les spasmes et facilite la digestion.
RECETTE,

				<<<RECETTE
Roll-On Anti-Stress & Clarté Mentale
Usage : poignets, nuque, tempes (loin des yeux)
Mélange (pour 10 ml) :
- 3 gouttes d’HE Basilic
- 4 gouttes d’HE Lavande vraie
- 3 gouttes d’HE Marjolaine à coquilles
Compléter avec huile végétale
Effet : apaise la nervosité et favorise la concentration.
RECETTE,

				<<<RECETTE
Synergie Anti-Ballonnements
Usage : massage du ventre
Mélange :
- 2 gouttes d’HE Basilic
- 2 gouttes d’HE Gingembre
- 1 goutte d’HE Citron
- 1 c. à café d’huile végétale
Effet : réduit les gaz, ballonnements et lourdeurs digestives.
RECETTE,

				<<<RECETTE
Inhalation Anti-Nausée & Anti-Stress
Usage : respirer doucement au-dessus d’un bol d’eau chaude
Mélange :
- 1 goutte d’HE Basilic
- 1 goutte d’HE Citron
Effet : calme les nausées et redonne clarté mentale.
RECETTE,

				<<<RECETTE
Huile de Massage Décontractante
Usage : zones tendues ou douloureuses
Mélange :
- 3 gouttes d’HE Basilic
- 2 gouttes d’HE Lavandin
- 1 goutte d’HE Eucalyptus citronné
- 1 c. à soupe d’huile végétale
Effet : détend les muscles et apaise les douleurs dues au stress.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Éviter le contact avec les yeux.",
				"Pas pour les enfants de moins de 6 ans.",
				"Prudence chez les personnes épileptiques.",
			],
		],
		[
			'name' => 'Camomille sauvage',
			'latin' => 'Matricaria recutita',
			'description' => <<<TEXT
La Camomille Sauvage, originaire du Maroc, est une huile essentielle apaisante et digestive,
très utilisée pour calmer les états nerveux.
Son parfum herbacé et légèrement sucré en fait une huile douce mais efficace,
particulièrement appréciée pour apaiser les douleurs émotionnelles,
les troubles digestifs nerveux et les tensions physiques.
Odeur douce, herbacée, légèrement sucrée, typique des fleurs sauvages marocaines.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Fleurs',

			'images' => [
				'camomille-sauvage-1.jpg',
				'camomille-sauvage-2.jpg',
				'camomille-sauvage-3.jpg',
			],

			'bienfaits' => [
				"Système nerveux\n- Calmante et relaxante\n- Réduit le stress, l’irritabilité et l’agitation\n- Aide au sommeil en apaisant l’esprit\n- Utile en cas d’anxiété légère et tensions psychiques",

				"Système digestif\n- Soulage les spasmes digestifs\n- Réduit les douleurs abdominales\n- Aide en cas de digestion lente\n- Apaise les troubles digestifs liés au stress",

				"Apaisante & anti-douleur\n- Calme les douleurs musculaires légères\n- Apaise les crampes et les tensions\n- Douce mais efficace pour les douleurs émotionnelles (huile réconfort)",
			],

			'recettes' => [
				<<<RECETTE
Roll-On Apaisant Anti-Stress
Usage : poignets, cou, plexus solaire
Mélange (pour 10 ml) :
- 4 gouttes d’HE Camomille sauvage
- 4 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Marjolaine à coquilles
Compléter avec huile végétale (jojoba)
Effet : calme immédiatement les tensions et apaise les émotions.
RECETTE,

				<<<RECETTE
Massage Soin du Sommeil
Usage : massage de la nuque et de la plante des pieds
Mélange :
- 3 gouttes d’HE Camomille sauvage
- 3 gouttes d’HE Lavande vraie
- 1 c. à café d’huile végétale
Effet : facilite l’endormissement et détend profondément.
RECETTE,

				<<<RECETTE
Huile de Massage Digestive Douce
Usage : bas du ventre en mouvements circulaires
Mélange :
- 2 gouttes d’HE Camomille sauvage
- 2 gouttes d’HE Basilic tropical
- 1 goutte d’HE Citron
- 1 c. à café d’huile végétale
Effet : calme les spasmes, les gaz et les douleurs liées au stress.
RECETTE,

				<<<RECETTE
Diffusion Apaisante Émotionnelle
Usage : soirée, méditation, détente
Mélange :
- 4 gouttes d’HE Camomille sauvage
- 4 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Orange douce
Effet : ambiance relaxante, soulagement émotionnel et détente complète.
RECETTE,

				<<<RECETTE
Compresse Anti-Douleurs Abdominales
Usage : compresse chaude sur le ventre
Mélange :
- 2 gouttes d’HE Camomille sauvage dans un bol d’eau chaude
Imbiber un linge et poser sur le ventre
Effet : apaise les douleurs intestinales et les contractions.
RECETTE,
			],

			'precautions' => [
				"Déconseillée aux bébés de moins de 3 mois.",
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Ne pas utiliser en cas d’allergie aux astéracées.",
				"Éviter le contact avec les yeux.",
			],
		],
		[
			'name' => 'Cannelle',
			'latin' => 'Cinnamomum zeylanicum',
			'description' => <<<TEXT
L’huile essentielle de Cannelle est l’une des huiles les plus puissantes et les plus chaleureuses de l’aromathérapie.
Stimulante, purifiante et tonifiante, elle est reconnue pour ses propriétés anti-infectieuses très fortes,
son soutien digestif et son action revitalisante.
Son parfum chaud, épicé et sucré rappelle les épices marocaines traditionnelles.
Odeur chaude, sucrée, épicée, très enveloppante.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Épices',

			'images' => [
				'cannelle-1.jpg',
				'cannelle-2.jpg',
				'cannelle-3.jpg',
			],

			'bienfaits' => [
				"Anti-infectieuse et purifiante\n- Antibactérienne très puissante\n- Antifongique et antivirale\n- Renforce l’immunité",

				"Système digestif\n- Stimulante et tonique digestive\n- Réduit les troubles digestifs liés à une digestion lente\n- Limite les fermentations intestinales\n- Soulage les ballonnements",

				"Tonique & revitalisante\n- Redonne de l’énergie en cas de fatigue\n- Stimule la circulation\n- Réchauffante, utile en période de froid\n- Dynamisante pour l’esprit et le corps",
			],

			'recettes' => [
				<<<RECETTE
Synergie Anti-Infectieuse Puissante (diffusion)
Usage : diffusion 10 minutes maximum
Mélange :
- 1 goutte d’HE Cannelle
- 3 gouttes d’HE Orange douce
- 2 gouttes d’HE Ravintsara
Effet : purifie l’air et renforce l’immunité.
RECETTE,

				<<<RECETTE
Huile de Massage Réchauffante & Circulatoire
Usage : massage des jambes, mains et pieds
Mélange :
- 1 goutte d’HE Cannelle
- 3 gouttes d’HE Gingembre
- 3 gouttes d’HE Lavandin
- 1 c. à soupe d’huile végétale
Effet : stimule la circulation et réchauffe le corps.
RECETTE,

				<<<RECETTE
Synergie Digestion Confort
Usage : massage du ventre (diluer impérativement)
Mélange :
- 1 petite goutte d’HE Cannelle
- 2 gouttes d’HE Citron
- 2 gouttes d’HE Basilic
- 1 c. à café d’huile végétale
Effet : facilite la digestion et réduit les ballonnements.
RECETTE,

				<<<RECETTE
Spray Maison Purifiant
Usage : assainissement de la pièce
Recette pour 50 ml :
- 20 gouttes d’HE Cannelle
- 30 gouttes d’HE Citron
- 30 gouttes d’HE Eucalyptus radié
Compléter avec alcool à 70 %
Effet : assainit l’air et diffuse une odeur chaleureuse.
RECETTE,

				<<<RECETTE
Roll-On Énergie & Motivation
Usage : application sur les poignets (faiblement dosé)
Mélange (pour 10 ml) :
- 1 goutte d’HE Cannelle
- 4 gouttes d’HE Menthe poivrée
- 4 gouttes d’HE Orange douce
Compléter avec huile végétale
Effet : boost énergétique et stimulation mentale.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Pas pour les enfants de moins de 6 ans.",
				"Ne pas utiliser sur une peau sensible ou irritée.",
				"Ne pas utiliser en continu (cure courte).",
			],
		],
		[
			'name' => "Cèdre de l'Atlas",
			'latin' => 'Cedrus atlantica',
			'description' => <<<TEXT
Originaire des montagnes de l’Atlas au Maroc, l’huile essentielle de Cèdre de l’Atlas
est une huile boisée, puissante et profondément enracinée.
Très utilisée pour la circulation, la détox, le drainage et les soins capillaires,
elle est aussi reconnue pour ses effets apaisants sur le mental.
Son parfum chaud et résineux apporte force, stabilité et ancrage.
Odeur boisée, chaude, légèrement fumée, très enveloppante.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Bois',

			'images' => [
				'cedre-atlas-1.jpg',
				'cedre-atlas-2.jpg',
				'cedre-atlas-3.jpg',
			],

			'bienfaits' => [
				"Circulation & drainage\n- Tonique circulatoire\n- Facilite le drainage lymphatique\n- Réduit la sensation de jambes lourdes\n- Détoxifiante",

				"Soins capillaires\n- Stimule la microcirculation du cuir chevelu\n- Réduit la chute de cheveux\n- Aide contre les pellicules\n- Purifie le cuir chevelu gras",

				"Système nerveux & émotionnel\n- Favorise l’ancrage et la stabilité\n- Diminue l’anxiété\n- Apaise le mental\n- Soutien en cas de manque de confiance ou fatigue psychique",

				"Respiratoire & purifiant\n- Désinfectant de l’air\n- Décongestionnant doux\n- Facilite la respiration légère",
			],

			'recettes' => [
				<<<RECETTE
Huile Anti-Cellulite & Drainage
Usage : massage des cuisses, fesses et jambes
Mélange :
- 3 gouttes d’HE Cèdre de l’Atlas
- 3 gouttes d’HE Pamplemousse
- 2 gouttes d’HE Cyprès
- 1 c. à soupe d’huile végétale (amande douce ou macadamia)
Effet : active le drainage, améliore la circulation et raffermit.
RECETTE,

				<<<RECETTE
Synergie Repousse des Cheveux
Usage : massage du cuir chevelu (2× par semaine)
Mélange :
- 2 gouttes d’HE Cèdre de l’Atlas
- 2 gouttes d’HE Romarin à cinéole
- 1 c. à soupe d’huile de ricin ou de coco
Effet : stimule la pousse et renforce le cuir chevelu.
RECETTE,

				<<<RECETTE
Diffusion Ancrage & Anti-Stress
Usage : soirée, méditation, détente
Mélange :
- 4 gouttes d’HE Cèdre de l’Atlas
- 3 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Orange douce
Effet : calme le mental et apporte stabilité émotionnelle.
RECETTE,

				<<<RECETTE
Huile Jambes Légères
Usage : massage de bas en haut
Mélange :
- 3 gouttes d’HE Cèdre de l’Atlas
- 3 gouttes d’HE Menthe poivrée
- 2 gouttes d’HE Citron
- 1 c. à soupe d’huile végétale
Effet : stimule la circulation, rafraîchit et diminue la lourdeur.
RECETTE,

				<<<RECETTE
Soin Barbe ou Cheveux Masculin Boisé
Usage : soin nourrissant et parfumé
Mélange :
- 2 gouttes d’HE Cèdre de l’Atlas
- 2 gouttes d’HE Santal (ou Patchouli)
- 1 c. à soupe d’huile de jojoba
Effet : odeur boisée masculine, nourrit et discipline la barbe ou les cheveux.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Ne pas utiliser en continu (cure courte).",
				"Éviter l’ingestion.",
				"Pas pour les enfants de moins de 6 ans.",
			],
		],
		[
			'name' => 'Citron',
			'latin' => 'Citrus limon',
			'description' => <<<TEXT
Originaire du bassin méditerranéen, l’huile essentielle de Citron est fraîche, pétillante et purifiante.
Elle est utilisée pour la digestion, l’assainissement de l’air, la concentration et l’éclat de la peau.
Son parfum zesté apporte énergie, clarté mentale et vitalité.
Odeur fraîche, zestée et pétillante.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Agrumes',

			'images' => [
				'citron-1.jpg',
				'citron-2.jpg',
				'citron-3.jpg',
			],

			'bienfaits' => [
				"Purifiante et assainissante\n- Antibactérienne et antiseptique\n- Assainit l’air et élimine les mauvaises odeurs\n- Renforce l’immunité\n- Idéale en hiver pour éviter les infections",

				"Système digestif\n- Facilite la digestion\n- Réduit les nausées\n- Stimule la détox du foie\n- Diminue les ballonnements",

				"Concentration et clarté mentale\n- Tonique nerveux\n- Améliore la concentration\n- Redonne énergie et motivation\n- Aide en cas de fatigue mentale",

				"Beauté de la peau\n- Astringente et purifiante\n- Resserre les pores\n- Régule les peaux grasses\n- Éclat du teint et anti-imperfections",
			],

			'recettes' => [
				<<<RECETTE
Diffusion Purifiante & Anti-Odeurs
Usage : diffusion 10 à 15 minutes
Mélange :
- 5 gouttes d’HE Citron
- 3 gouttes d’HE Eucalyptus radié
- 2 gouttes d’HE Pin sylvestre
Effet : purifie l’air et apporte fraîcheur et vitalité.
RECETTE,

				<<<RECETTE
Synergie Anti-Nausée
Usage : inhalation douce
Mélange :
- 1 goutte d’HE Citron
- 1 goutte d’HE Basilic (optionnel)
Effet : réduit les nausées et aide la digestion.
RECETTE,

				<<<RECETTE
Huile de Massage Détox & Circulation
Usage : massage des jambes et du ventre
Mélange :
- 3 gouttes d’HE Citron
- 3 gouttes d’HE Cèdre de l’Atlas
- 2 gouttes d’HE Cyprès
- 1 c. à soupe d’huile végétale
Effet : stimule la circulation, raffermit et aide le drainage.
RECETTE,

				<<<RECETTE
Soin Anti-Imperfections (usage le soir uniquement)
Usage : application locale
Mélange :
- 1 goutte d’HE Citron
- 1 c. à café d’huile de jojoba
Effet : purifie la peau et resserre les pores.
RECETTE,

				<<<RECETTE
Spray Maison Purifiant
Usage : assainissement intérieur
Recette pour 50 ml :
- 30 gouttes d’HE Citron
- 20 gouttes d’HE Lavande vraie
Compléter avec alcool à 70 %
Effet : désinfecte et parfume l’intérieur.
RECETTE,
			],

			'precautions' => [
				"Photosensibilisante : ne pas s’exposer au soleil après application.",
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux bébés de moins de 3 mois.",
				"Demander l’avis d’un professionnel en cas de traitement médical.",
			],
		],
		[
			'name' => 'Rose Damascena',
			'latin' => 'Rosa damascena',
			'description' => <<<TEXT
L’huile essentielle de Rose Damascena est l’une des plus précieuses au monde.
Extraite des pétales délicats de la rose de Damas, elle est réputée pour ses propriétés
apaisantes, harmonisantes et régénérantes.
Elle soutient l’équilibre émotionnel, adoucit la peau et aide à restaurer
une harmonie intérieure profonde.
Son parfum floral et envoûtant apporte douceur, réconfort et bien-être.
Odeur florale, douce, riche et envoûtante.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '5ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Fleurs',

			'images' => [
				'rose-damascena-1.jpg',
				'rose-damascena-2.jpg',
				'rose-damascena-3.jpg',
			],

			'bienfaits' => [
				"Émotionnel & nervosité\n- Apaise le stress et les tensions émotionnelles\n- Harmonise l’humeur\n- Aide en cas d’anxiété ou de chagrin\n- Favorise le lâcher-prise et la détente profonde",

				"Peau & anti-âge\n- Régénérante cellulaire\n- Tonifie et raffermit la peau\n- Réduit les rougeurs et apaise les irritations\n- Idéale pour les peaux matures, sensibles ou sèches",

				"Féminité & confort hormonal\n- Soutient l’équilibre féminin\n- Apaise les inconforts du cycle menstruel\n- Aide en cas de fatigue émotionnelle liée aux fluctuations hormonales",

				"Immunité & vitalité\n- Légèrement tonique\n- Aide à renforcer la vitalité générale\n- Soutient en période de fatigue ou de baisse d’énergie",
			],

			'recettes' => [
				<<<RECETTE
Roll-On Émotionnel Apaisant
Usage : poignets, plexus solaire, nuque
Mélange :
- 2 gouttes d’HE Rose Damascena
- 4 gouttes d’HE Lavande vraie
- 4 gouttes d’HE Orange douce
Compléter avec huile végétale
Effet : calme les émotions, apporte douceur et harmonie.
RECETTE,

				<<<RECETTE
Soin Anti-Âge & Éclat
Usage : visage, le soir
Mélange :
- 1 goutte d’HE Rose Damascena
- 1 c. à café d’huile d’argan ou de rose musquée
Effet : raffermit, régénère et illumine le teint.
RECETTE,

				<<<RECETTE
Diffusion Relaxante & Harmonisante
Usage : en soirée ou méditation
Mélange :
- 3 gouttes d’HE Rose Damascena
- 3 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Bois de santal (ou Cèdre)
Effet : crée une atmosphère douce et réconfortante.
RECETTE,

				<<<RECETTE
Massage Confort Féminin
Usage : massage du bas du ventre
Mélange :
- 2 gouttes d’HE Rose Damascena
- 3 gouttes d’HE Sauge sclarée
- 1 c. à café d’huile végétale
Effet : apaise les inconforts et détend les tensions féminines.
RECETTE,

				<<<RECETTE
Soin Peau Sensible & Rougeurs
Usage : application locale
Mélange :
- 1 goutte d’HE Rose Damascena
- 1 c. à café d’huile de calendula
Effet : apaise, réduit les rougeurs et adoucit la peau.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Éviter le contact avec les yeux.",
				"Déconseillée aux femmes enceintes et allaitantes.",
			],
		],
		[
			'name' => 'Ciste',
			'latin' => 'Cistus ladaniferus',
			'description' => <<<TEXT
L’huile essentielle de Ciste est reconnue pour son puissant pouvoir régénérant et réparateur.
Extraite d’un arbuste méditerranéen résineux, elle est utilisée pour favoriser la cicatrisation,
arrêter les saignements et soutenir les peaux abîmées.
Elle agit également sur l’équilibre émotionnel en apportant stabilité et recentrage.
Son parfum chaud, résineux et légèrement ambré invite au calme et à la réparation intérieure.
Odeur chaude, résineuse, légèrement ambrée.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Fleurs',

			'images' => [
				'ciste-1.jpg',
				'ciste-2.jpg',
				'ciste-3.jpg',
			],

			'bienfaits' => [
				"Cicatrisante & régénératrice\n- Favorise la réparation des tissus\n- Accélère la cicatrisation\n- Soutient les peaux abîmées ou fragilisées",

				"Arrêt des saignements (hémostatique)\n- Aide à stopper les petits saignements\n- Utile en cas de coupure superficielle ou d’épistaxis léger",

				"Système immunitaire\n- Tonique immunitaire\n- Aide en cas de convalescence\n- Soutient l’organisme en période de fatigue",

				"Émotionnel & énergétique\n- Stabilisante et recentrante\n- Aide en cas de choc émotionnel\n- Apporte calme intérieur et ancrage\n- Idéale pour retrouver équilibre et sérénité",
			],

			'recettes' => [
				<<<RECETTE
Soin Cicatrices
Usage : application locale (le soir)
Mélange :
- 1 goutte d’HE Ciste
- 1 c. à café d’huile de rose musquée
Effet : favorise la régénération de la peau et améliore l’aspect des cicatrices.
RECETTE,

				<<<RECETTE
Synergie Peaux Abîmées
Usage : zones sèches ou fragilisées
Mélange :
- 2 gouttes d’HE Ciste
- 2 gouttes d’HE Lavande vraie
- 1 c. à café d’huile de calendula
Effet : apaise, répare et nourrit la peau.
RECETTE,

				<<<RECETTE
Diffusion Apaisante & Méditative
Usage : moments de calme et de recentrage
Mélange :
- 3 gouttes d’HE Ciste
- 3 gouttes d’HE Encens
- 2 gouttes d’HE Cèdre de l’Atlas
Effet : recentre, harmonise et apaise profondément.
RECETTE,

				<<<RECETTE
Roll-On Anti-Choc Émotionnel
Usage : poignets, plexus solaire, nuque
Mélange :
- 2 gouttes d’HE Ciste
- 3 gouttes d’HE Camomille sauvage
- 5 gouttes d’HE Lavande vraie
Compléter avec huile végétale
Effet : calme le mental et apaise les émotions intenses.
RECETTE,

				<<<RECETTE
Baume Réparateur Maison
Usage : zones très sèches ou fendillées
Mélange :
- 1 goutte d’HE Ciste
- 2 gouttes d’HE Géranium rosat
- 1 c. à soupe de beurre de karité
Effet : nourrit, répare et protège les peaux abîmées.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Éviter le contact avec les yeux.",
			],
		],
		[
			'name' => 'Cyprès',
			'latin' => 'Cupressus sempervirens',
			'description' => <<<TEXT
L’huile essentielle de Cyprès est reconnue pour son action puissante sur la circulation
et le système respiratoire.
Tonifiante, décongestionnante et équilibrante, elle aide à réduire les jambes lourdes,
la rétention d’eau et les toux persistantes.
Son parfum frais et boisé apporte structure, calme et harmonie intérieure.
Odeur fraîche, boisée, légèrement résineuse.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Bois',

			'images' => [
				'cypres-1.jpg',
				'cypres-2.jpg',
				'cypres-3.jpg',
			],

			'bienfaits' => [
				"Circulation & drainage\n- Tonique veineux\n- Améliore la circulation sanguine\n- Réduit la sensation de jambes lourdes\n- Aide en cas de rétention d’eau",

				"Respiratoire\n- Décongestionnante\n- Aide à calmer la toux sèche et persistante\n- Facilite la respiration\n- Idéale en cas d’encombrement léger",

				"Système nerveux & émotionnel\n- Apaisante et stabilisante\n- Aide en cas de stress ou agitation\n- Favorise la concentration\n- Soutient en période de transition ou de changement",

				"Drainage lymphatique\n- Aide à éliminer les toxines\n- Utile dans les soins détox du corps\n- Soutient le système lymphatique fatigué",
			],

			'recettes' => [
				<<<RECETTE
Huile Jambes Légères
Usage : massage de bas en haut
Mélange :
- 3 gouttes d’HE Cyprès
- 3 gouttes d’HE Citron
- 2 gouttes d’HE Menthe poivrée
- 1 c. à soupe d’huile végétale
Effet : stimule la circulation, réduit la lourdeur et rafraîchit.
RECETTE,

				<<<RECETTE
Synergie Anti-Toux Sèche
Usage : application sur la poitrine et le haut du dos
Mélange :
- 2 gouttes d’HE Cyprès
- 2 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Eucalyptus radié
- 1 c. à soupe d’huile végétale
Effet : calme la toux et apaise les bronches.
RECETTE,

				<<<RECETTE
Diffusion Clarté & Apaisement
Usage : bureau ou salon
Mélange :
- 4 gouttes d’HE Cyprès
- 3 gouttes d’HE Romarin
- 3 gouttes d’HE Citron
Effet : favorise la concentration, purifie l’air et apaise le mental.
RECETTE,

				<<<RECETTE
Huile Anti-Cellulite & Fermeté
Usage : massage des zones concernées
Mélange :
- 3 gouttes d’HE Cyprès
- 3 gouttes d’HE Cèdre de l’Atlas
- 2 gouttes d’HE Pamplemousse
- 1 c. à soupe d’huile végétale
Effet : active le drainage et raffermit la peau.
RECETTE,

				<<<RECETTE
Roll-On Anti-Stress Structurant
Usage : poignets, nuque, plexus solaire
Mélange :
- 3 gouttes d’HE Cyprès
- 4 gouttes d’HE Lavande vraie
- 3 gouttes d’HE Orange douce
Compléter avec huile végétale
Effet : équilibre les émotions et calme l’esprit.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Ne pas utiliser en continu (cure courte).",
				"Pas pour les enfants de moins de 6 ans.",
				"Déconseillée aux femmes enceintes et allaitantes.",
			],
		],
		[
			'name' => 'Eucalyptus',
			'latin' => 'Eucalyptus radiata',
			'description' => <<<TEXT
L’huile essentielle d’Eucalyptus est l’une des plus utilisées pour libérer la respiration.
Fraîche, purifiante et dynamisante, elle dégage les voies respiratoires,
renforce l’immunité et assainit l’air.
Douce mais très efficace, elle convient parfaitement en période hivernale
et apporte une sensation immédiate de fraîcheur et de clarté.
Odeur fraîche, camphrée, légèrement boisée.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Bois',

			'images' => [
				'eucalyptus-radiata-1.jpg',
				'eucalyptus-radiata-2.jpg',
				'eucalyptus-radiata-3.jpg',
			],

			'bienfaits' => [
				"Respiratoire\n- Décongestionne les voies respiratoires\n- Facilite la respiration\n- Apaise la toux et les gênes bronchiques\n- Idéale en période de rhume ou de grippe",

				"Immunité\n- Stimule les défenses naturelles\n- Purifiante et antivirale\n- Aide à prévenir les infections saisonnières",

				"Assainissante & fraîcheur\n- Purifie l’air\n- Élimine les mauvaises odeurs\n- Apporte une sensation de fraîcheur immédiate",

				"Tonique mental\n- Clarifie l’esprit\n- Améliore la concentration\n- Rafraîchit et revitalise en cas de fatigue",
			],

			'recettes' => [
				<<<RECETTE
Baume Respiratoire
Usage : application sur la poitrine et le haut du dos
Mélange :
- 3 gouttes d’HE Eucalyptus radiata
- 2 gouttes d’HE Ravintsara
- 2 gouttes d’HE Menthe poivrée
- 1 c. à soupe de beurre de karité
Effet : libère les voies respiratoires et apaise la toux.
RECETTE,

				<<<RECETTE
Diffusion Purifiante
Usage : diffusion 10 à 15 minutes
Mélange :
- 5 gouttes d’HE Eucalyptus radiata
- 3 gouttes d’HE Citron
- 2 gouttes d’HE Pin sylvestre
Effet : assainit l’air et apporte fraîcheur et énergie.
RECETTE,

				<<<RECETTE
Inhalation Décongestionnante
Usage : inhalation au-dessus d’un bol d’eau chaude
Mélange :
- 2 gouttes d’HE Eucalyptus radiata
- 1 goutte d’HE Lavande vraie
Effet : dégage le nez et calme les irritations respiratoires.
RECETTE,

				<<<RECETTE
Massage Immunité
Usage : application sur le haut du dos et la plante des pieds
Mélange :
- 3 gouttes d’HE Eucalyptus radiata
- 3 gouttes d’HE Ravintsara
- 1 c. à soupe d’huile végétale
Effet : soutient l’immunité et favorise une récupération plus rapide.
RECETTE,

				<<<RECETTE
Spray Maison Fraîcheur
Usage : assainissement de la pièce
Recette pour 50 ml :
- 20 gouttes d’HE Eucalyptus radiata
- 20 gouttes d’HE Citron
- 10 gouttes d’HE Lavande vraie
Compléter avec alcool à 70 %
Effet : purifie l’air et offre une odeur fraîche instantanée.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Demander l’avis d’un professionnel en cas de traitement médical.",
				"Déconseillée aux enfants de moins de 3 ans.",
				"Éviter le contact avec les yeux.",
			],
		],
		[
			'name' => 'Genévrier',
			'latin' => 'Pelargonium graveolens',
			'description' => <<<TEXT
L’huile essentielle de Genévrier est reconnue pour ses puissantes propriétés détoxifiantes
et drainantes.
Extraite des baies du genévrier, elle aide à éliminer les toxines, soutient les reins
et améliore la circulation.
Elle est également appréciée pour apaiser les douleurs articulaires et musculaires.
Son parfum frais, boisé et légèrement poivré apporte un effet purifiant et revigorant.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Aiguilles',

			'images' => [
				'genevrier-1.jpg',
				'genevrier-2.jpg',
				'genevrier-3.jpg',
			],

			'bienfaits' => [
				"Détox & drainage\n- Favorise l’élimination des toxines\n- Soutient le système rénal\n- Réduit la rétention d’eau",

				"Articulations & muscles\n- Anti-inflammatoire doux\n- Apaise les douleurs articulaires\n- Soulage les tensions musculaires\n- Idéale après un effort physique",

				"Circulation\n- Tonifie la circulation sanguine\n- Améliore le drainage lymphatique\n- Aide à diminuer les gonflements",

				"Émotionnel & énergétique\n- Purifiante mentalement\n- Aide à libérer les émotions stagnantes\n- Apporte clarté, légèreté et renouvellement intérieur",
			],

			'recettes' => [
				<<<RECETTE
Huile Détox & Anti-Cellulite
Usage : massage des cuisses, fesses et hanches
Mélange :
- 3 gouttes d’HE Genévrier
- 3 gouttes d’HE Pamplemousse
- 2 gouttes d’HE Cèdre de l’Atlas
- 1 c. à soupe d’huile végétale
Effet : active le drainage et aide à réduire la cellulite.
RECETTE,

				<<<RECETTE
Massage Articulations & Muscles
Usage : zones douloureuses ou tendues
Mélange :
- 3 gouttes d’HE Genévrier
- 2 gouttes d’HE Eucalyptus citronné
- 2 gouttes d’HE Lavandin
- 1 c. à soupe d’huile végétale
Effet : apaise les douleurs et relâche les tensions musculaires.
RECETTE,

				<<<RECETTE
Diffusion Purifiante Mentalement
Usage : le matin ou en méditation
Mélange :
- 4 gouttes d’HE Genévrier
- 3 gouttes d’HE Citron
- 2 gouttes d’HE Romarin
Effet : clarifie l’esprit et apporte énergie et légèreté.
RECETTE,

				<<<RECETTE
Bain Détox Relaxant
Usage : bain tiède
Mélange :
- 2 gouttes d’HE Genévrier
- 2 gouttes d’HE Lavande vraie
À diluer dans une base neutre
Effet : détente profonde et élimination des tensions et lourdeurs.
RECETTE,

				<<<RECETTE
Soin Jambes Légères
Usage : massage de bas en haut
Mélange :
- 3 gouttes d’HE Genévrier
- 3 gouttes d’HE Cyprès
- 2 gouttes d’HE Menthe poivrée
- 1 c. à soupe d’huile végétale
Effet : réduit la lourdeur et stimule la circulation.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Ne pas utiliser en continu (cure courte).",
				"Ne pas utiliser sur une peau sensible ou irritée.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Ne pas utiliser en cas d’insuffisance rénale.",
			],
		],
		[
			'name' => 'Géranium',
			'latin' => 'Pelargonium graveolens',
			'description' => <<<TEXT
L’huile essentielle de Géranium est reconnue pour ses propriétés équilibrantes,
purifiantes et régénérantes.
Très appréciée en cosmétique pour ses effets sur la peau, elle aide également
à harmoniser les émotions et à soutenir la circulation.
Son parfum floral, doux et légèrement sucré apporte confort et bien-être.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Fleurs',

			'images' => [
				'geranium-1.jpg',
				'geranium-2.jpg',
				'geranium-3.jpg',
			],

			'bienfaits' => [
				"Peau & beauté\n- Régénérante cellulaire\n- Resserre les pores\n- Équilibre les peaux grasses, mixtes ou irritées\n- Aide en cas d’imperfections, rougeurs et petites crevasses",

				"Émotionnel & stress\n- Harmonise l’humeur\n- Réduit l’anxiété et la tension nerveuse\n- Apporte confort émotionnel\n- Soutient en cas de fatigue psychique",

				"Circulation & tonus\n- Tonique circulatoire\n- Aide à diminuer la sensation de jambes lourdes\n- Utile en cas de gonflement léger ou de rétention d’eau",

				"Anti-infectieuse douce\n- Antibactérienne\n- Assainissante\n- Soutient l’immunité de manière douce",
			],

			'recettes' => [
				<<<RECETTE
Soin Anti-Imperfections
Usage : application locale (le soir)
Mélange :
- 1 goutte d’HE Géranium
- 1 c. à café d’huile de jojoba
Effet : purifie, resserre les pores et accélère la réparation cutanée.
RECETTE,

				<<<RECETTE
Huile Éclat & Anti-Âge
Usage : visage, le soir
Mélange :
- 2 gouttes d’HE Géranium
- 1 goutte d’HE Rose Damascena (optionnel)
- 1 c. à café d’huile de rose musquée
Effet : régénère, tonifie et améliore l’aspect de la peau.
RECETTE,

				<<<RECETTE
Diffusion Harmonisation & Confort
Usage : soirée ou relaxation
Mélange :
- 4 gouttes d’HE Géranium
- 3 gouttes d’HE Lavande vraie
- 3 gouttes d’HE Orange douce
Effet : calme le stress et harmonise l’ambiance.
RECETTE,

				<<<RECETTE
Huile Jambes Légères
Usage : massage de bas en haut
Mélange :
- 3 gouttes d’HE Géranium
- 3 gouttes d’HE Cyprès
- 2 gouttes d’HE Menthe poivrée
- 1 c. à soupe d’huile végétale
Effet : stimule la circulation et réduit la sensation de lourdeur.
RECETTE,

				<<<RECETTE
Roll-On Émotionnel Douceur
Usage : poignets, nuque, plexus solaire
Mélange :
- 3 gouttes d’HE Géranium
- 3 gouttes d’HE Camomille sauvage
- 4 gouttes d’HE Lavande vraie
Compléter avec huile végétale
Effet : apaise, adoucit et rééquilibre les émotions.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Éviter le contact avec les yeux.",
				"Ne pas utiliser sur une peau sensible ou irritée.",
				"Ne pas utiliser en continu (cure courte).",
			],
		],
		[
			'name' => 'Gingembre',
			'latin' => 'Zingiber officinale',
			'description' => <<<TEXT
L’huile essentielle de Gingembre est reconnue pour son action tonique,
réchauffante et digestive.
Extraite du rhizome, elle stimule l’énergie du corps, améliore la digestion
et apaise les douleurs musculaires.
Son parfum chaud, épicé et légèrement citronné apporte vitalité, courage
et motivation.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Herbacées / Aromatiques',

			'images' => [
				'gingembre-1.jpg',
				'gingembre-2.jpg',
				'gingembre-3.jpg',
			],

			'bienfaits' => [
				"Digestion & confort intestinal\n- Facilite la digestion\n- Réduit les ballonnements\n- Soulage les nausées légères et le mal des transports\n- Tonifie l’ensemble du système digestif",

				"Tonique général & vitalité\n- Stimule l’énergie\n- Aide en cas de fatigue physique ou mentale\n- Renforce la motivation et l’élan intérieur",

				"Muscles & articulations\n- Réchauffant\n- Apaise les douleurs musculaires\n- Soulage les tensions articulaires\n- Idéal après un effort sportif",

				"Circulation\n- Active la microcirculation\n- Réchauffe les extrémités froides\n- Tonifie la circulation sanguine",
			],

			'recettes' => [
				<<<RECETTE
Huile Digestive & Anti-Ballonnements
Usage : massage circulaire du ventre
Mélange :
- 3 gouttes d’HE Gingembre
- 2 gouttes d’HE Basilic
- 2 gouttes d’HE Citron
- 1 c. à soupe d’huile végétale
Effet : facilite la digestion et réduit l’inconfort digestif.
RECETTE,

				<<<RECETTE
Huile Chauffante Muscles & Articulations
Usage : application sur les zones douloureuses ou tendues
Mélange :
- 3 gouttes d’HE Gingembre
- 2 gouttes d’HE Eucalyptus citronné
- 2 gouttes d’HE Lavandin
- 1 c. à soupe d’huile végétale
Effet : apaise les tensions et réchauffe la zone.
RECETTE,

				<<<RECETTE
Diffusion Vitalité & Motivation
Usage : matin, bureau ou avant un effort
Mélange :
- 4 gouttes d’HE Gingembre
- 3 gouttes d’HE Citron
- 2 gouttes d’HE Menthe poivrée
Effet : dynamise et stimule la motivation.
RECETTE,

				<<<RECETTE
Huile de Massage Circulatoire
Usage : massage des jambes, mains ou pieds
Mélange :
- 3 gouttes d’HE Gingembre
- 3 gouttes d’HE Cèdre de l’Atlas
- 2 gouttes d’HE Cyprès
- 1 c. à soupe d’huile végétale
Effet : améliore la circulation et réchauffe les extrémités.
RECETTE,

				<<<RECETTE
Roll-On Anti-Nausées
Usage : poignets ou inhalation douce
Mélange :
- 2 gouttes d’HE Gingembre
- 3 gouttes d’HE Citron
Compléter avec huile végétale
Effet : réduit les sensations de nausée et apaise.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Ne pas utiliser sur une peau sensible ou irritée.",
				"Déconseillée aux femmes enceintes et allaitantes.",
			],
		],
		[
			'name' => 'Girofle',
			'latin' => 'Syzygium aromaticum',
			'description' => <<<TEXT
L’huile essentielle de Girofle est une huile très puissante, reconnue pour son action
anti-infectieuse, antiseptique et antalgique.
Issue des clous de girofle, elle est particulièrement efficace pour soulager
les douleurs dentaires, stimuler l’immunité et purifier l’organisme.
Son parfum chaud, épicé et profond apporte une sensation de force et de protection.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Fleurs',

			'images' => [
				'girofle-1.jpg',
				'girofle-2.jpg',
				'girofle-3.jpg',
			],

			'bienfaits' => [
				"Anti-infectieuse puissante\n- Antibactérienne majeure\n- Antivirale et antifongique\n- Idéale pour renforcer l’immunité\n- Soutient l’organisme en période d’infections saisonnières",

				"Douleurs dentaires & buccales\n- Anesthésiante locale\n- Apaise les douleurs dentaires\n- Assainit la sphère buccale\n- Utile en attendant une consultation dentaire",

				"Tonique & stimulante\n- Redonne énergie et vitalité\n- Aide en cas de fatigue profonde\n- Stimule la circulation",

				"Digestion\n- Facilite la digestion\n- Apaise les ballonnements\n- Soutient le système digestif paresseux",
			],

			'recettes' => [
				<<<RECETTE
Soulagement Douleur Dentaire (usage très localisé)
Usage : application au coton-tige autour de la zone douloureuse
(ne jamais appliquer sur une gencive irritée)
Mélange :
- 1 goutte d’HE Girofle
- 1 c. à café d’huile végétale
Effet : apaise temporairement la douleur en attendant une consultation dentaire.
RECETTE,

				<<<RECETTE
Diffusion Anti-Infectieuse
Usage : diffusion 5 à 10 minutes
Mélange :
- 2 gouttes d’HE Girofle
- 4 gouttes d’HE Orange douce
- 3 gouttes d’HE Cannelle feuille
Effet : assainit l’air et renforce l’immunité.
RECETTE,

				<<<RECETTE
Huile Digestive Réchauffante
Usage : massage du ventre
Mélange :
- 2 gouttes d’HE Girofle
- 2 gouttes d’HE Gingembre
- 2 gouttes d’HE Citron
- 1 c. à soupe d’huile végétale
Effet : facilite la digestion et réduit les ballonnements.
RECETTE,

				<<<RECETTE
Massage Énergie & Circulation
Usage : massage des jambes, mains ou du dos
Mélange :
- 2 gouttes d’HE Girofle
- 3 gouttes d’HE Cèdre de l’Atlas
- 2 gouttes d’HE Pamplemousse
- 1 c. à soupe d’huile végétale
Effet : stimule la circulation et redonne tonus et vitalité.
RECETTE,

				<<<RECETTE
Spray Maison Purifiant
Usage : assainissement de la pièce
Recette pour 50 ml :
- 10 gouttes d’HE Girofle
- 20 gouttes d’HE Eucalyptus
- 20 gouttes d’HE Citron
Compléter avec alcool à 70 %
Effet : purifie l’air et diffuse une odeur épicée chaleureuse.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Déconseillée aux enfants de moins de 6 ans.",
				"Ne pas utiliser sur une peau sensible ou irritée.",
			],
		],
		[
			'name' => 'Inule visqueuse',
			'latin' => 'Inula viscosa',
			'description' => <<<TEXT
L’huile essentielle d’Inule visqueuse est reconnue pour ses propriétés puissantes
sur la sphère respiratoire.
Rare et précieuse, elle aide à dégager les voies respiratoires, calme la toux tenace
et favorise l’évacuation du mucus.
Elle est également appréciée pour son action apaisante sur le stress et son soutien
en période de grande fatigue.
Son parfum herbacé et balsamique rappelle les plantes sauvages méditerranéennes.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Fleurs',

			'images' => [
				'inule-visqueuse-1.jpg',
				'inule-visqueuse-2.jpg',
				'inule-visqueuse-3.jpg',
			],

			'bienfaits' => [
				"Respiratoire\n- Dégage les voies respiratoires\n- Apaise la toux grasse ou encombrée\n- Favorise l’expectoration\n- Utile en cas de bronchite, mucus persistant ou toux profonde",

				"Anti-catarrhale\n- Aide à éliminer le mucus\n- Libère la respiration\n- Idéale en période hivernale ou après une infection",

				"Système nerveux\n- Apaisante\n- Réduit le stress intérieur\n- Soutient en cas de fatigue nerveuse ou émotionnelle",

				"Anti-inflammatoire douce\n- Utile pour calmer certaines inflammations légères\n- Aide à soulager les tensions respiratoires et thoraciques",
			],

			'recettes' => [
				<<<RECETTE
Baume Respiratoire Profond
Usage : application sur la poitrine et le haut du dos
Mélange :
- 2 gouttes d’HE Inule visqueuse
- 3 gouttes d’HE Eucalyptus radiata
- 2 gouttes d’HE Ravintsara
- 1 c. à soupe de beurre de karité
Effet : dégage les bronches et apaise la toux persistante.
RECETTE,

				<<<RECETTE
Inhalation Anti-Mucus
Usage : inhalation au-dessus d’un bol d’eau chaude
Mélange :
- 1 goutte d’HE Inule visqueuse
- 1 goutte d’HE Eucalyptus
- 1 goutte d’HE Pin sylvestre
Effet : facilite l’expectoration et libère la respiration.
RECETTE,

				<<<RECETTE
Diffusion Respiration & Apaisement
Usage : diffusion 5 à 10 minutes
Mélange :
- 3 gouttes d’HE Inule visqueuse
- 3 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Citron
Effet : calme le stress tout en ouvrant la respiration.
RECETTE,

				<<<RECETTE
Massage Confort Bronchique
Usage : massage du thorax
Mélange :
- 2 gouttes d’HE Inule visqueuse
- 2 gouttes d’HE Romarin à cinéole
- 1 goutte d’HE Menthe poivrée
- 1 c. à soupe d’huile végétale
Effet : aide à mieux respirer et diminue l’inconfort bronchique.
RECETTE,

				<<<RECETTE
Roll-On Anti-Stress Respiratoire
Usage : poignets et nuque
Mélange :
- 2 gouttes d’HE Inule visqueuse
- 4 gouttes d’HE Lavande vraie
- 4 gouttes d’HE Orange douce
Compléter avec huile végétale
Effet : apaise les émotions et facilite la respiration.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Ne pas utiliser en continu (cure courte).",
				"Déconseillée aux enfants de moins de 6 ans.",
				"À utiliser avec prudence chez les personnes asthmatiques.",
			],
		],
		[
			'name' => 'Laurier noble',
			'latin' => 'Laurus nobilis',
			'description' => <<<TEXT
L’huile essentielle de Laurier Noble est une huile puissante, connue pour renforcer
la confiance en soi, soutenir le système respiratoire et booster l’immunité.
Antibactérienne, antivirale et expectorante, elle est très utilisée en période hivernale.
Son parfum aromatique, frais et légèrement épicé apporte clarté mentale,
courage et détermination.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Plantes',

			'images' => [
				'laurier-noble-1.jpg',
				'laurier-noble-2.jpg',
				'laurier-noble-3.jpg',
			],

			'bienfaits' => [
				"Respiratoire\n- Décongestionnante\n- Facilite l’expectoration\n- Apaise les toux grasses ou tenaces\n- Utile en cas de bronchite, sinusite ou encombrement",

				"Immunité\n- Antibactérienne et antivirale\n- Renforce les défenses naturelles\n- Idéale en prévention hivernale",

				"Confiance & émotionnel\n- Stimule la confiance en soi\n- Aide à dépasser le stress et les peurs\n- Améliore la concentration\n- Apporte courage et motivation",

				"Muscles & articulations\n- Anti-inflammatoire douce\n- Apaise les douleurs musculaires\n- Soutient en cas de tensions cervicales ou articulaires",
			],

			'recettes' => [
				<<<RECETTE
Massage Respiratoire & Immunité
Usage : application sur le thorax et le haut du dos
Mélange :
- 3 gouttes d’HE Laurier noble
- 2 gouttes d’HE Eucalyptus radiata
- 2 gouttes d’HE Ravintsara
- 1 c. à soupe d’huile végétale
Effet : ouvre la respiration et renforce l’immunité.
RECETTE,

				<<<RECETTE
Diffusion Courage & Clarté
Usage : travail, concentration
Mélange :
- 4 gouttes d’HE Laurier noble
- 3 gouttes d’HE Citron
- 2 gouttes d’HE Romarin à cinéole
Effet : améliore la confiance, la clarté d’esprit et la motivation.
RECETTE,

				<<<RECETTE
Huile de Massage Anti-Douleurs
Usage : zones tendues ou douloureuses
Mélange :
- 3 gouttes d’HE Laurier noble
- 3 gouttes d’HE Gingembre
- 2 gouttes d’HE Lavandin
- 1 c. à soupe d’huile végétale
Effet : soulage les tensions musculaires et articulaires.
RECETTE,

				<<<RECETTE
Roll-On Confiance & Présence
Usage : poignets, nuque, plexus solaire
Mélange :
- 3 gouttes d’HE Laurier noble
- 3 gouttes d’HE Orange douce
- 4 gouttes d’HE Lavande vraie
Compléter avec huile végétale
Effet : calme l’esprit et renforce la confiance personnelle.
RECETTE,

				<<<RECETTE
Bain Respiratoire
Usage : bain tiède
Mélange :
- 2 gouttes d’HE Laurier noble
- 2 gouttes d’HE Lavande vraie
À diluer dans une base neutre
Effet : détente profonde et ouverture respiratoire.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Ne pas utiliser en continu (cure courte).",
				"Éviter le contact avec les yeux.",
				"Ne pas utiliser sur une peau sensible ou irritée.",
			],
		],
		[
			'name' => 'Lavande',
			'latin' => 'Lavandula angustifolia',
			'description' => <<<TEXT
L’huile essentielle de Lavande Vraie est l’une des plus polyvalentes et apaisantes
de l’aromathérapie.
Calmante, cicatrisante et relaxante, elle aide à réduire le stress, favoriser le sommeil,
apaiser la peau et soulager les douleurs musculaires légères.
Son parfum floral et doux apporte harmonie, paix intérieure et détente profonde.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Herbacées / Aromatiques',

			'images' => [
				'lavande-1.jpg',
				'lavande-2.jpg',
				'lavande-3.jpg',
			],

			'bienfaits' => [
				"Stress & sommeil\n- Calmante et relaxante\n- Réduit l’anxiété et les tensions nerveuses\n- Facilite l’endormissement\n- Idéale en cas d’agitation mentale ou de stress",

				"Peau & cicatrisation\n- Cicatrisante et régénérante\n- Apaise les irritations, brûlures légères et coups de soleil\n- Purifie les petites imperfections\n- Convient aux peaux sensibles",

				"Douleurs musculaires\n- Détend les muscles\n- Soulage les tensions dans la nuque, les épaules et le dos\n- Utile après un effort ou en cas de stress physique",

				"Bien-être émotionnel\n- Apporte paix intérieure\n- Harmonise l’humeur\n- Réduit l’irritabilité\n- Soutient en période de fatigue psychique",
			],

			'recettes' => [
				<<<RECETTE
Roll-On Sommeil & Relaxation
Usage : poignets, nuque, plexus solaire
Mélange :
- 4 gouttes d’HE Lavande vraie
- 4 gouttes d’HE Camomille sauvage
- 2 gouttes d’HE Orange douce
Compléter avec huile végétale
Effet : apaise l’esprit et facilite l’endormissement.
RECETTE,

				<<<RECETTE
Huile de Massage Détente
Usage : nuque, épaules et dos
Mélange :
- 3 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Marjolaine à coquilles
- 1 goutte d’HE Basilic
- 1 c. à soupe d’huile végétale
Effet : relâche les tensions musculaires et nerveuses.
RECETTE,

				<<<RECETTE
Soin Peau Apaisée
Usage : application locale
Mélange :
- 1 goutte d’HE Lavande vraie
- 1 c. à café d’huile de calendula
Effet : apaise les irritations, rougeurs et sensibilités cutanées.
RECETTE,

				<<<RECETTE
Diffusion Sérénité
Usage : soirée, méditation ou chambre
Mélange :
- 5 gouttes d’HE Lavande vraie
- 3 gouttes d’HE Géranium
- 2 gouttes d’HE Encens
Effet : calme l’ambiance et favorise la détente profonde.
RECETTE,

				<<<RECETTE
Bain Relaxant
Usage : bain tiède
Mélange :
- 3 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Orange douce
À diluer dans une base neutre
Effet : relaxation complète du corps et de l’esprit.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Éviter le contact avec les yeux.",
			],
		],
		[
			'name' => 'Marjolaine',
			'latin' => 'Origanum majorana',
			'description' => <<<TEXT
L’huile essentielle de Marjolaine à Coquilles est une huile profondément apaisante,
connue pour calmer le système nerveux, réduire le stress et favoriser un sommeil réparateur.
Elle aide également à relâcher les tensions musculaires, apaiser les douleurs digestives
et harmoniser les émotions.
Son parfum doux, herbacé et légèrement épicé apporte réconfort, chaleur
et tranquillité intérieure.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Plantes',

			'images' => [
				'marjolaine-1.jpg',
				'marjolaine-2.jpg',
				'marjolaine-3.jpg',
			],

			'bienfaits' => [
				"Stress & système nerveux\n- Puissamment relaxante\n- Calme le stress, l’anxiété et l’agitation intérieure\n- Aide à réduire les pensées envahissantes\n- Utile en cas de fatigue nerveuse ou de surmenage",

				"Sommeil\n- Facilite l’endormissement\n- Améliore la qualité du sommeil\n- Idéale pour les réveils nocturnes liés au stress",

				"Douleurs & tensions\n- Détend les muscles\n- Apaise les tensions dans la nuque, les épaules et le dos\n- Soulage les crampes et spasmes",

				"Digestion & bien-être abdominal\n- Antispasmodique douce\n- Réduit les crampes digestives liées au stress\n- Facilite la digestion nerveuse",
			],

			'recettes' => [
				<<<RECETTE
Roll-On Anti-Stress
Usage : poignets, nuque, plexus solaire
Mélange :
- 4 gouttes d’HE Marjolaine à coquilles
- 4 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Orange douce
Compléter avec huile végétale
Effet : calme rapidement les tensions et apporte sérénité.
RECETTE,

				<<<RECETTE
Huile de Massage Détente Musculaire
Usage : nuque, épaules et dos
Mélange :
- 3 gouttes d’HE Marjolaine à coquilles
- 2 gouttes d’HE Lavandin
- 1 goutte d’HE Basilic
- 1 c. à soupe d’huile végétale
Effet : relâche les tensions physiques liées au stress.
RECETTE,

				<<<RECETTE
Synergie Sommeil Profond
Usage : diffusion 10 minutes le soir
Mélange :
- 4 gouttes d’HE Marjolaine à coquilles
- 3 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Camomille sauvage
Effet : prépare le corps et l’esprit au repos.
RECETTE,

				<<<RECETTE
Massage Digestion Nerveuse
Usage : massage du ventre en mouvements circulaires
Mélange :
- 2 gouttes d’HE Marjolaine à coquilles
- 2 gouttes d’HE Basilic
- 1 goutte d’HE Citron
- 1 c. à soupe d’huile végétale
Effet : apaise les crampes digestives liées au stress.
RECETTE,

				<<<RECETTE
Bain Relaxant
Usage : bain tiède
Mélange :
- 3 gouttes d’HE Marjolaine à coquilles
- 2 gouttes d’HE Lavande vraie
À diluer dans une base neutre
Effet : libère les tensions et favorise le lâcher-prise.
RECETTE,
			],

			'precautions' => [
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Toujours bien diluer, jamais pure.",
				"Ne pas utiliser en continu (cure courte).",
				"Éviter en cas d’hypotension.",
			],
		],
		[
			'name' => 'Menthe verte',
			'latin' => 'Mentha spicata',
			'description' => <<<TEXT
L’huile essentielle de Menthe Verte est reconnue pour son parfum doux et frais,
moins puissant que la menthe poivrée mais tout aussi bénéfique.
Digestive, rafraîchissante et équilibrante, elle est idéale pour apaiser
les inconforts digestifs, stimuler la concentration et apporter une sensation
de fraîcheur mentale et physique.
Son odeur sucrée et mentholée est très appréciée en diffusion.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Herbacées / Aromatiques',

			'images' => [
				'menthe-verte-1.jpg',
				'menthe-verte-2.jpg',
				'menthe-verte-3.jpg',
			],

			'bienfaits' => [
				"Digestion\n- Facilite la digestion\n- Apaise les ballonnements\n- Réduit les crampes digestives légères\n- Utile en cas de nausées ou de digestion lente",

				"Concentration & clarté mentale\n- Stimule la concentration\n- Clarifie l’esprit\n- Aide en cas de fatigue mentale\n- Idéale pour le travail ou les études",

				"Respiration\n- Légèrement expectorante\n- Apaise l’encombrement léger\n- Apporte une sensation de fraîcheur respiratoire",

				"Émotionnel & bien-être\n- Rafraîchissante émotionnellement\n- Apaise l’irritabilité\n- Apporte légèreté et détente mentale",
			],

			'recettes' => [
				<<<RECETTE
Massage Digestif Doux
Usage : massage du ventre en mouvements circulaires
Mélange :
- 3 gouttes d’HE Menthe verte
- 2 gouttes d’HE Basilic
- 1 goutte d’HE Citron
- 1 c. à soupe d’huile végétale
Effet : soulage les ballonnements et les inconforts digestifs.
RECETTE,

				<<<RECETTE
Diffusion Clarté & Fraîcheur
Usage : bureau, matin ou étude
Mélange :
- 4 gouttes d’HE Menthe verte
- 3 gouttes d’HE Citron
- 2 gouttes d’HE Romarin
Effet : améliore la concentration et rafraîchit l’ambiance.
RECETTE,

				<<<RECETTE
Inhalation Anti-Nausée
Usage : inhalation douce
Mélange :
- 1 goutte d’HE Menthe verte
- 1 goutte d’HE Citron
Effet : réduit la sensation de nausée et clarifie l’esprit.
RECETTE,

				<<<RECETTE
Huile Rafraîchissante Muscles & Pieds
Usage : massage local
Mélange :
- 3 gouttes d’HE Menthe verte
- 2 gouttes d’HE Lavandin
- 1 goutte d’HE Eucalyptus
- 1 c. à soupe d’huile végétale
Effet : détente légère et sensation de fraîcheur immédiate.
RECETTE,

				<<<RECETTE
Soin Activité Mentale
Usage : poignets ou nuque
Mélange :
- 3 gouttes d’HE Menthe verte
- 3 gouttes d’HE Ylang-Ylang
Compléter avec huile végétale
Effet : équilibre entre concentration et détente mentale.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Prudence chez les personnes épileptiques.",
				"Déconseillée aux enfants de moins de 6 ans.",
			],
		],
		[
			'name' => 'Menthe pouliot',
			'latin' => 'Mentha pulegium',
			'description' => <<<TEXT
L’huile essentielle de Menthe Pouliot est une huile très concentrée,
traditionnellement reconnue pour ses propriétés respiratoires,
digestives et purifiantes.

Son parfum frais, mentholé et herbacé apporte une sensation stimulante
et rafraîchissante. Toutefois, en raison de sa richesse en cétones
neurotoxiques, elle doit être utilisée avec une extrême prudence,
uniquement en diffusion ou en usage olfactif très limité.

Odeur fraîche, mentholée et herbacée.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Plantes',

			'images' => [
				'menthe-pouliot-1.jpg',
				'menthe-pouliot-2.jpg',
				'menthe-pouliot-3.jpg',
			],

			'bienfaits' => [
				"Respiratoire (usage olfactif uniquement)\n- Favorise une respiration plus claire\n- Aide à dégager légèrement les voies respiratoires\n- Apporte une sensation de fraîcheur mentale",

				"Digestion (traditionnel)\n- Soutient la digestion\n- Peut réduire la sensation de lourdeur digestive",

				"Stimulante & tonique\n- Tonifie l’esprit\n- Apporte clarté mentale et énergie\n- Utile en cas de fatigue mentale",

				"Purifiante\n- Assainissante en diffusion\n- Aide à éliminer les odeurs tenaces\n- Apporte une atmosphère fraîche et nette",
			],

			'recettes' => [
				<<<RECETTE
Diffusion Fraîcheur & Clarté
Usage : diffusion très courte (5 minutes maximum)
Mélange :
- 1 goutte d’HE Menthe pouliot
- 4 gouttes d’HE Citron
- 2 gouttes d’HE Eucalyptus
Effet : assainit l’air et apporte fraîcheur et clarté mentale.
RECETTE,

				<<<RECETTE
Brève Inhalation Tonifiante
Usage : inspiration douce à distance
- 1 goutte d’HE Menthe pouliot sur un mouchoir
Effet : stimule et clarifie l’esprit rapidement.
RECETTE,

				<<<RECETTE
Spray Maison Purifiant
Usage : assainissement de l’air
Recette pour 50 ml :
- 3 gouttes d’HE Menthe pouliot
- 20 gouttes d’HE Citron
- 20 gouttes d’HE Lavande
Compléter avec alcool à 70 %
Effet : désodorise et purifie l’air ambiant.
RECETTE,

				<<<RECETTE
Diffusion Anti-Odeurs
Usage : diffusion courte (3 à 5 minutes)
Mélange :
- 1 goutte d’HE Menthe pouliot
- 3 gouttes d’HE Pin sylvestre
- 3 gouttes d’HE Orange douce
Effet : neutralise les odeurs et rafraîchit la pièce.
RECETTE,

				<<<RECETTE
Mélange Respiratoire Doux (diffusion)
Usage : diffusion très courte
Mélange :
- 1 goutte d’HE Menthe pouliot
- 4 gouttes d’HE Eucalyptus radié
- 2 gouttes d’HE Ravintsara
Effet : soutien respiratoire léger par diffusion.
RECETTE,
			],

			'precautions' => [
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Interdite par voie interne.",
				"Déconseillée sur la peau (usage cutané interdit).",
				"Déconseillée aux enfants et adolescents de moins de 16 ans.",
			],
		],
		[
			'name' => 'Menthe poivrée',
			'latin' => 'Mentha × piperita',
			'description' => <<<TEXT
L’huile essentielle de Menthe Poivrée est l’une des plus rafraîchissantes
et stimulantes de l’aromathérapie.
Reconnue pour ses effets sur la digestion, les maux de tête, la fatigue
et la respiration, elle apporte une sensation immédiate de fraîcheur
et de clarté mentale.
Son parfum intense et mentholé en fait une huile incontournable.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Herbacées / Aromatiques',

			'images' => [
				'menthe-poivree-1.jpg',
				'menthe-poivree-2.jpg',
				'menthe-poivree-3.jpg',
			],

			'bienfaits' => [
				"Digestion\n- Facilite la digestion\n- Apaise les nausées et le mal des transports\n- Réduit ballonnements et inconforts digestifs\n- Tonifie le système digestif",

				"Maux de tête & migraines\n- Effet rafraîchissant et calmant\n- Aide à diminuer les tensions au niveau des tempes\n- Utile en cas de fatigue oculaire ou mentale",

				"Fatigue & concentration\n- Stimule l’esprit\n- Améliore la concentration\n- Redonne énergie en cas de coup de fatigue\nEffet « coup de fouet » naturel",

				"Respiratoire\n- Décongestionnante\n- Aide à dégager le nez\n- Apporte une sensation de respiration plus libre",
			],

			'recettes' => [
				<<<RECETTE
Roll-On Maux de Tête
Usage : tempes et nuque (éviter le contour des yeux)
Mélange :
- 2 gouttes d’HE Menthe poivrée
- 4 gouttes d’HE Lavande vraie
- 4 gouttes d’HE Eucalyptus
Compléter avec huile végétale
Effet : soulage les tensions et les maux de tête.
RECETTE,

				<<<RECETTE
Huile Digestive
Usage : massage du ventre en mouvements circulaires
Mélange :
- 2 gouttes d’HE Menthe poivrée
- 2 gouttes d’HE Basilic
- 1 goutte d’HE Citron
- 1 c. à soupe d’huile végétale
Effet : facilite la digestion et réduit les ballonnements.
RECETTE,

				<<<RECETTE
Diffusion Clarté & Énergie
Usage : matin, étude ou travail
Mélange :
- 4 gouttes d’HE Menthe poivrée
- 3 gouttes d’HE Citron
- 2 gouttes d’HE Romarin
Effet : stimule la concentration et dynamise l’ambiance.
RECETTE,

				<<<RECETTE
Huile Rafraîchissante Pieds & Jambes
Usage : massage local
Mélange :
- 3 gouttes d’HE Menthe poivrée
- 2 gouttes d’HE Lavandin
- 1 goutte d’HE Eucalyptus radié
- 1 c. à soupe d’huile végétale
Effet : rafraîchit et apaise les jambes lourdes et les pieds fatigués.
RECETTE,

				<<<RECETTE
Inhalation Anti-Nausée
Usage : inhalation sur mouchoir
Mélange :
- 1 goutte d’HE Menthe poivrée
- 1 goutte d’HE Citron
Effet : réduit les nausées et apporte une clarté mentale immédiate.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Éviter le contact avec les yeux.",
				"Déconseillée aux enfants de moins de 6 ans.",
			],
		],
		[
			'name' => 'Myrte',
			'latin' => 'Myrtus communis',
			'description' => <<<TEXT
L’huile essentielle de Myrte est reconnue pour ses propriétés respiratoires
douces et équilibrantes.
Elle aide à dégager les voies respiratoires, apaise la toux et soutient
le système immunitaire.

Elle est également appréciée pour ses effets purifiants, tonifiants
et harmonisants sur le mental.
Son parfum frais, légèrement camphré et herbacé en fait une huile douce,
adaptée à toute la famille (faiblement dosée).
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Fleurs',

			'images' => [
				'myrte-1.jpg',
				'myrte-2.jpg',
				'myrte-3.jpg',
			],

			'bienfaits' => [
				"Respiratoire\n- Décongestionnante douce\n- Apaise la toux légère\n- Aide à dégager le nez et les bronches\n- Utile en cas de sinusite ou d’encombrement léger",

				"Immunité\n- Soutient les défenses naturelles\n- Antivirale douce\n- Aide en prévention hivernale",

				"Purifiante\n- Assainit l’air\n- Aide à équilibrer les peaux grasses (en application diluée)\n- Action douce mais efficace",

				"Émotionnel & bien-être\n- Favorise la tranquillité mentale\n- Apporte clarté et sérénité\n- Aide à réduire les tensions intérieures",
			],

			'recettes' => [
				<<<RECETTE
Baume Respiratoire Doux
Usage : poitrine et haut du dos
Mélange :
- 3 gouttes d’HE Myrte
- 2 gouttes d’HE Eucalyptus radié
- 2 gouttes d’HE Lavande vraie
- 1 c. à soupe de beurre de karité
Effet : apaise la toux et dégage doucement les voies respiratoires.
RECETTE,

				<<<RECETTE
Diffusion Purifiante & Respiratoire
Usage : diffusion 10 minutes
Mélange :
- 4 gouttes d’HE Myrte
- 3 gouttes d’HE Citron
- 2 gouttes d’HE Ravintsara
Effet : purifie l’air et soutient la respiration.
RECETTE,

				<<<RECETTE
Massage Immunité
Usage : haut du dos
Mélange :
- 3 gouttes d’HE Myrte
- 3 gouttes d’HE Ravintsara
- 1 c. à soupe d’huile végétale
Effet : renforce les défenses naturelles.
RECETTE,

				<<<RECETTE
Soin Peau Équilibrante
Usage : application locale (le soir)
Mélange :
- 1 goutte d’HE Myrte
- 1 c. à café d’huile de jojoba
Effet : purifie et équilibre les peaux grasses.
RECETTE,

				<<<RECETTE
Bain Détente Respiratoire
Usage : bain tiède
Mélange :
- 3 gouttes d’HE Myrte
- 2 gouttes d’HE Lavande
À mélanger dans une base neutre
Effet : détente profonde et respiration libérée.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Éviter le contact avec les yeux.",
				"Déconseillée aux enfants de moins de 3 ans.",
			],
		],
		[
			'name' => 'Origan',
			'latin' => 'Origanum vulgare',
			'description' => <<<TEXT
L’huile essentielle d’Origan est l’une des plus puissantes anti-infectieuses
de toute l’aromathérapie.
Très concentrée en carvacrol, elle combat efficacement les bactéries,
virus et champignons.

Utilisée avec précaution et toujours fortement diluée, elle soutient
l’immunité, aide en cas d’infections résistantes et revitalise
profondément l’organisme.
Son parfum chaud, épicé et intense en fait une huile à usage
principalement thérapeutique.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Herbacées / Aromatiques',

			'images' => [
				'origan-1.jpg',
				'origan-2.jpg',
				'origan-3.jpg',
			],

			'bienfaits' => [
				"Anti-infectieuse majeure\n- Antibactérienne très puissante\n- Antivirale\n- Antifongique\n- Idéale en cas d’infections difficiles ou récidivantes",

				"Immunité\n- Stimule fortement les défenses naturelles\n- Tonique général\n- Soutient l’organisme en période d’infection ou de grande fatigue",

				"Digestive\n- Favorise une digestion plus efficace\n- Réduit les fermentations intestinales\n- Utile en cas de troubles digestifs d’origine infectieuse",

				"Tonique physique\n- Redonne énergie et vitalité\n- Aide à lutter contre la fatigue profonde\n- Soutient l’organisme en convalescence",
			],

			'recettes' => [
				<<<RECETTE
Huile Anti-Infectieuse Puissante
Usage : application sur le haut du dos ou la plante des pieds
Mélange :
- 1 goutte d’HE Origan
- 5 gouttes d’HE Ravintsara
- 5 gouttes d’HE Tea tree
- 1 c. à soupe d’huile végétale
Effet : soutien immunitaire puissant en cas d’infection.
RECETTE,

				<<<RECETTE
Diffusion Purifiante Intense
Usage : diffusion très courte (3 à 5 minutes maximum)
Mélange :
- 1 goutte d’HE Origan
- 4 gouttes d’HE Citron
- 3 gouttes d’HE Eucalyptus radié
Effet : assainit fortement l’air ambiant.
RECETTE,

				<<<RECETTE
Massage Confort Digestif
Usage : massage de l’abdomen (faiblement dosé)
Mélange :
- 1 goutte d’HE Origan
- 2 gouttes d’HE Basilic
- 2 gouttes d’HE Gingembre
- 1 c. à soupe d’huile végétale
Effet : réduit les inconforts digestifs d’origine infectieuse.
RECETTE,

				<<<RECETTE
Spray Purifiant Maison
Usage : assainissement de l’air
Recette pour 50 ml :
- 5 gouttes d’HE Origan
- 20 gouttes d’HE Citron
- 20 gouttes d’HE Lavande vraie
Compléter avec alcool à 70 %
Effet : désinfecte l’air et élimine les mauvaises odeurs.
RECETTE,

				<<<RECETTE
Huile Convalescence
Usage : massage du haut du dos
Mélange :
- 1 goutte d’HE Origan
- 3 gouttes d’HE Romarin à cinéole
- 3 gouttes d’HE Ravintsara
- 1 c. à soupe d’huile végétale
Effet : revitalise et soutient l’organisme affaibli.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Déconseillée aux enfants et adolescents de moins de 16 ans.",
				"Éviter le contact avec les yeux.",
				"Ne pas utiliser en continu (cure courte).",
			],
		],
		[
			'name' => 'Romarin',
			'latin' => 'Rosmarinus officinalis',
			'description' => <<<TEXT
L’huile essentielle de Romarin à cinéole est reconnue pour ses puissantes
propriétés respiratoires, tonifiantes et stimulantes.
Elle aide à dégager les bronches, renforce l’immunité et améliore
la concentration.

Son parfum frais, aromatique et légèrement camphré apporte énergie,
clarté et vitalité.
C’est une huile essentielle incontournable en hiver et en période
de fatigue mentale ou physique.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Aiguilles',

			'images' => [
				'romarin-1.jpg',
				'romarin-2.jpg',
				'romarin-3.jpg',
			],

			'bienfaits' => [
				"Respiratoire\n- Décongestionnante\n- Facilite l’expectoration\n- Apaise la toux et l’encombrement\n- Idéale en cas de bronchite légère, rhume ou sinusite",

				"Immunité\n- Tonique général\n- Stimule les défenses naturelles\n- Aide en prévention et soutien hivernal",

				"Concentration & fatigue\n- Booste la mémoire et la clarté mentale\n- Améliore la concentration\n- Aide en cas de fatigue intellectuelle\n- Revitalise l’esprit",

				"Muscles & circulation\n- Décontractant doux\n- Stimule la microcirculation\n- Apaise les tensions musculaires",
			],

			'recettes' => [
				<<<RECETTE
Baume Respiratoire
Usage : application sur la poitrine et le haut du dos
Mélange :
- 3 gouttes d’HE Romarin
- 2 gouttes d’HE Eucalyptus radié
- 2 gouttes d’HE Ravintsara
- 1 c. à soupe de beurre de karité
Effet : dégage les bronches et apaise la toux.
RECETTE,

				<<<RECETTE
Diffusion Clarté & Énergie
Usage : travail, étude ou période de fatigue
Mélange :
- 4 gouttes d’HE Romarin
- 3 gouttes d’HE Citron
- 2 gouttes d’HE Menthe poivrée
Effet : stimule la concentration et le dynamisme mental.
RECETTE,

				<<<RECETTE
Huile Anti-Fatigue
Usage : massage du dos et de la nuque
Mélange :
- 3 gouttes d’HE Romarin
- 2 gouttes d’HE Gingembre
- 1 goutte d’HE Lavande vraie
- 1 c. à soupe d’huile végétale
Effet : revitalise le corps et aide à lutter contre la fatigue.
RECETTE,

				<<<RECETTE
Huile de Massage Circulatoire
Usage : massage des jambes et des pieds
Mélange :
- 3 gouttes d’HE Romarin
- 3 gouttes d’HE Cyprès
- 2 gouttes d’HE Cèdre de l’Atlas
- 1 c. à soupe d’huile végétale
Effet : stimule la circulation et soulage les jambes lourdes.
RECETTE,

				<<<RECETTE
Soin Cheveux & Cuir Chevelu
Usage : massage du cuir chevelu (2× par semaine)
Mélange :
- 2 gouttes d’HE Romarin
- 2 gouttes d’HE Cèdre de l’Atlas
- 1 c. à soupe d’huile de ricin
Effet : stimule la pousse et purifie le cuir chevelu.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Déconseillée aux enfants de moins de 6 ans.",
				"Éviter le contact avec les yeux.",
			],
		],
		[
			'name' => 'Sauge sclarée',
			'latin' => 'Salvia officinalis',
			'description' => <<<TEXT
L’huile essentielle de Sauge sclarée est reconnue pour son action équilibrante
sur le système hormonal féminin, ainsi que pour ses effets relaxants
et antispasmodiques.
Elle aide à apaiser les tensions émotionnelles, soutient le cycle menstruel
et accompagne les périodes de déséquilibres hormonaux.

Son parfum herbacé, doux et légèrement musqué apporte sérénité,
énergie et harmonie intérieure.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Plantes',

			'images' => [
				'sauge-sclaree-1.jpg',
				'sauge-sclaree-2.jpg',
				'sauge-sclaree-3.jpg',
			],

			'bienfaits' => [
				"Équilibre féminin & cycle\n- Aide à réguler le cycle menstruel\n- Apaise les douleurs de règles\n- Soutient en cas de syndrome prémenstruel (SPM)\n- Utile en période de ménopause (bouffées de chaleur, irritabilité)",

				"Relaxante & anti-stress\n- Réduit les tensions nerveuses\n- Apaise l’anxiété\n- Favorise le lâcher-prise\n- Utile en cas de fatigue émotionnelle",

				"Antispasmodique\n- Soulage les crampes abdominales\n- Apaise les spasmes musculaires\n- Utile en cas de tensions dans le ventre ou le bas du dos",

				"Tonique & énergétique\n- Redonne motivation\n- Apaise la lassitude mentale\n- Harmonise et élève l’humeur",
			],

			'recettes' => [
				<<<RECETTE
Massage Confort Féminin
Usage : massage du bas du ventre et du bas du dos
Mélange :
- 3 gouttes d’HE Sauge sclarée
- 3 gouttes d’HE Lavande vraie
- 1 goutte d’HE Géranium
- 1 c. à soupe d’huile végétale
Effet : apaise les douleurs menstruelles et les tensions associées.
RECETTE,

				<<<RECETTE
Diffusion Détente & Harmonie
Usage : soirée, relaxation
Mélange :
- 4 gouttes d’HE Sauge sclarée
- 3 gouttes d’HE Orange douce
- 2 gouttes d’HE Lavande vraie
Effet : calme l’esprit et équilibre les émotions.
RECETTE,

				<<<RECETTE
Roll-On Anti-Stress Féminin
Usage : poignets, nuque ou plexus solaire
Mélange (roll-on 10 ml) :
- 3 gouttes d’HE Sauge sclarée
- 3 gouttes d’HE Géranium
- 4 gouttes d’HE Lavande vraie
Compléter avec une huile végétale
Effet : apaise le stress et les fluctuations émotionnelles.
RECETTE,

				<<<RECETTE
Bain Harmonie & Relaxation
Usage : bain tiède
Mélange :
- 3 gouttes d’HE Sauge sclarée
- 2 gouttes d’HE Lavande vraie
- À mélanger dans une base neutre
Effet : détente profonde et apaisement du mental.
RECETTE,

				<<<RECETTE
Huile Anti-Spasmes Digestifs
Usage : massage du ventre en mouvements circulaires
Mélange :
- 2 gouttes d’HE Sauge sclarée
- 2 gouttes d’HE Basilic
- 1 goutte d’HE Citron
- 1 c. à soupe d’huile végétale
Effet : apaise les crampes digestives et les tensions abdominales.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Déconseillée aux enfants et adolescents de moins de 16 ans.",
				"Peut provoquer une légère somnolence.",
			],
		],
		[
			'name' => 'Arbre à thé',
			'latin' => 'Melaleuca alternifolia',
			'description' => <<<TEXT
L’huile essentielle d’Arbre à thé est l’une des plus polyvalentes
et incontournables en aromathérapie.
Antibactérienne, antifongique et antivirale, elle purifie la peau,
renforce l’immunité et aide à lutter contre les infections.

Son parfum frais, médicinal et légèrement boisé en fait une huile
essentielle de référence pour l’hygiène, la peau et la protection naturelle.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Aiguilles',

			'images' => [
				'arbre-a-the-1.jpg',
				'arbre-a-the-2.jpg',
				'arbre-a-the-3.jpg',
			],

			'bienfaits' => [
				"Anti-infectieuse puissante\n- Antibactérienne, antifongique et antivirale\n- Purifie l’air et soutient le système immunitaire\n- Idéale en cas d’infections cutanées ou respiratoires",

				"Peau & imperfections\n- Assèche les boutons et purifie la peau\n- Réduit les rougeurs et inflammations locales\n- Aide en cas d’acné légère, mycoses, petites coupures\n- Soutient la réparation cutanée",

				"Immunité\n- Renforce les défenses naturelles\n- Aide en période de fatigue ou d’infections répétées\n- Soutien idéal en période hivernale",

				"Hygiène & bien-être\n- Désodorise naturellement\n- Purifie les espaces (diffusion ou spray)\n- Utile dans les produits maison (ménage, hygiène)",
			],

			'recettes' => [
				<<<RECETTE
Soin Boutons & Imperfections
Usage : application locale
Mélange :
- 1 goutte d’HE Arbre à thé
- 1 c. à café d’huile de jojoba
Effet : purifie et assèche les imperfections.
RECETTE,

				<<<RECETTE
Spray Purifiant Maison
Usage : assainissement de l’air
Recette pour 50 ml :
- 20 gouttes d’HE Arbre à thé
- 20 gouttes d’HE Citron
- 10 gouttes d’HE Lavande vraie
Compléter avec alcool à 70 %
Effet : désinfecte et purifie l’air ambiant.
RECETTE,

				<<<RECETTE
Huile Immunité & Protection
Usage : massage du haut du dos
Mélange :
- 3 gouttes d’HE Arbre à thé
- 3 gouttes d’HE Ravintsara
- 1 c. à soupe d’huile végétale
Effet : soutient les défenses naturelles.
RECETTE,

				<<<RECETTE
Huile Anti-Mycoses (pieds, ongles)
Usage : application locale
Mélange :
- 2 gouttes d’HE Arbre à thé
- 2 gouttes d’HE Lavande vraie
- 1 c. à café d’huile végétale
Effet : purifie et assainit les zones concernées.
RECETTE,

				<<<RECETTE
Diffusion Purification & Hygiène
Usage : diffusion 10 minutes
Mélange :
- 4 gouttes d’HE Arbre à thé
- 3 gouttes d’HE Eucalyptus radié
- 2 gouttes d’HE Citron
Effet : assainit l’air et rafraîchit l’ambiance.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Éviter le contact avec les yeux.",
				"Ne pas utiliser sur une peau très sensible ou irritée.",
			],
		],
		[
			'name' => 'Thym',
			'latin' => 'Thymus vulgaris',
			'description' => <<<TEXT
L’huile essentielle de Thym à linalol est une huile douce mais très efficace,
reconnue pour ses propriétés anti-infectieuses, tonifiantes et équilibrantes.
Elle soutient l’immunité, aide à combattre les infections légères
et purifie la peau.

Son parfum herbacé, frais et légèrement floral en fait une huile
polyvalente, bien tolérée et adaptée même aux peaux sensibles
lorsqu’elle est correctement diluée.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Plantes',

			'images' => [
				'thym-linalol-1.jpg',
				'thym-linalol-2.jpg',
				'thym-linalol-3.jpg',
			],

			'bienfaits' => [
				"Immunité\n- Stimule les défenses naturelles\n- Aide en cas de fatigue hivernale\n- Soutient l’organisme en cas d’infections légères",

				"Anti-infectieuse douce\n- Antibactérienne\n- Antifongique légère\n- Antivirale\n- Convient mieux que d’autres thyms aux personnes sensibles",

				"Peau & purification\n- Purifie les peaux à imperfections\n- Apaise les rougeurs\n- Soutient la réparation des tissus cutanés",

				"Émotionnel & vitalité\n- Tonifie l’esprit\n- Aide en cas de fatigue physique et mentale\n- Apporte clarté et motivation",
			],

			'recettes' => [
				<<<RECETTE
Huile Immunité Douce
Usage : massage du haut du dos
Mélange :
- 3 gouttes d’HE Thym à linalol
- 3 gouttes d’HE Ravintsara
- 1 c. à soupe d’huile végétale
Effet : renforce les défenses naturelles en douceur.
RECETTE,

				<<<RECETTE
Diffusion Protection & Clarté
Usage : diffusion 10 minutes
Mélange :
- 4 gouttes d’HE Thym à linalol
- 3 gouttes d’HE Citron
- 2 gouttes d’HE Lavande vraie
Effet : purifie l’air et stimule la vitalité.
RECETTE,

				<<<RECETTE
Soin Peau Purifiant
Usage : application locale (le soir)
Mélange :
- 1 goutte d’HE Thym à linalol
- 1 c. à café d’huile de jojoba
Effet : réduit les imperfections et apaise les rougeurs.
RECETTE,

				<<<RECETTE
Massage Anti-Fatigue
Usage : massage du dos et de la nuque
Mélange :
- 3 gouttes d’HE Thym à linalol
- 2 gouttes d’HE Romarin à cinéole
- 1 goutte d’HE Gingembre
- 1 c. à soupe d’huile végétale
Effet : redonne énergie et motivation.
RECETTE,

				<<<RECETTE
Bain Respiratoire & Tonifiant
Usage : bain tiède
Mélange :
- 3 gouttes d’HE Thym à linalol
- 2 gouttes d’HE Eucalyptus radié
- À mélanger dans une base neutre
Effet : tonifie l’organisme et soutient respiration et immunité.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Déconseillée aux enfants de moins de 3 ans.",
				"Éviter le contact avec les yeux.",
			],
		],
		[
			'name' => 'Verveine',
			'latin' => 'Lippia citriodora',
			'description' => <<<TEXT
L’huile essentielle de Verveine odorante est une huile précieuse,
reconnue pour son puissant effet calmant, anti-stress et harmonisant.
Son parfum citronné, doux et enveloppant aide à apaiser les émotions,
améliorer le sommeil et réduire l’anxiété.

Elle soutient également la digestion nerveuse et offre un effet
tonifiant doux sur la peau.
C’est une huile idéale pour retrouver bien-être, douceur
et équilibre intérieur.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Plantes',

			'images' => [
				'verveine-1.jpg',
				'verveine-2.jpg',
				'verveine-3.jpg',
			],

			'bienfaits' => [
				"Émotionnel & stress\n- Puissant anti-stress naturel\n- Calme l’agitation mentale\n- Apaise l’anxiété et les tensions émotionnelles\n- Aide en cas de fatigue nerveuse",

				"Sommeil\n- Facilite l’endormissement\n- Améliore la qualité du sommeil\n- Idéale le soir en diffusion ou en massage",

				"Digestion\n- Apaise les spasmes digestifs\n- Réduit les ballonnements\n- Soutient la digestion d’origine nerveuse",

				"Beauté de la peau\n- Tonifie et raffermit la peau\n- Apaise les irritations légères\n- Utile pour lutter contre le stress cutané",
			],

			'recettes' => [
				<<<RECETTE
Diffusion Anti-Stress
Usage : soirée, relaxation
Mélange :
- 4 gouttes d’HE Verveine odorante
- 3 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Orange douce
Effet : apaise profondément l’esprit et calme les tensions.
RECETTE,

				<<<RECETTE
Roll-On Sérénité
Usage : poignets ou nuque
Mélange (roll-on 10 ml) :
- 3 gouttes d’HE Verveine odorante
- 4 gouttes d’HE Camomille sauvage
- 3 gouttes d’HE Lavande vraie
Compléter avec une huile végétale
Effet : réduit l’anxiété et apporte harmonie émotionnelle.
RECETTE,

				<<<RECETTE
Soin Peau Tonifiant
Usage : visage (le soir)
Mélange :
- 1 goutte d’HE Verveine odorante
- 1 c. à café d’huile de jojoba
Effet : tonifie la peau et apaise les rougeurs.
RECETTE,

				<<<RECETTE
Huile Digestive Anti-Stress
Usage : massage du bas du ventre
Mélange :
- 2 gouttes d’HE Verveine odorante
- 2 gouttes d’HE Basilic
- 1 goutte d’HE Citron
- 1 c. à soupe d’huile végétale
Effet : calme les spasmes et les inconforts digestifs liés au stress.
RECETTE,

				<<<RECETTE
Bain Relaxant
Usage : bain tiède
Mélange :
- 3 gouttes d’HE Verveine odorante
- 2 gouttes d’HE Lavande vraie
- À mélanger dans une base neutre
Effet : détente profonde et relâchement émotionnel.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Déconseillée aux enfants de moins de 6 ans.",
				"Éviter le contact avec les yeux.",
			],
		],
		[
			'name' => 'Ylang-Ylang',
			'latin' => 'Cananga odorata',
			'description' => <<<TEXT
L’huile essentielle d’Ylang-Ylang est réputée pour son parfum floral exotique
et ses puissantes propriétés relaxantes.
Elle harmonise les émotions, apaise le stress, soutient le système
cardiovasculaire et apporte un effet équilibrant sur le système nerveux.

Très appréciée en cosmétique, elle prend soin de la peau et des cheveux.
Son odeur douce, sensuelle et enveloppante invite à la détente,
au lâcher-prise et à l’amour de soi.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Herbacées / Aromatiques',

			'images' => [
				'ylang-ylang-1.jpg',
				'ylang-ylang-2.jpg',
				'ylang-ylang-3.jpg',
			],

			'bienfaits' => [
				"Stress & émotions\n- Apaise les tensions nerveuses\n- Réduit l’anxiété et l’irritabilité\n- Aide à stabiliser les émotions\n- Idéale en cas de surcharge émotionnelle",

				"Bien-être cardiaque\n- Aide à réguler le rythme cardiaque\n- Apaise les palpitations liées au stress\n- Favorise une relaxation profonde",

				"Beauté de la peau\n- Équilibre les peaux grasses\n- Resserre les pores\n- Améliore l’éclat du teint\n- Apaise les rougeurs",

				"Cheveux\n- Tonifie le cuir chevelu\n- Apporte brillance et souplesse\n- Renforce les cheveux secs ou ternes",
			],

			'recettes' => [
				<<<RECETTE
Diffusion Relaxante & Harmonisante
Usage : soirée, détente
Mélange :
- 4 gouttes d’HE Ylang-Ylang
- 3 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Orange douce
Effet : calme les tensions et crée une atmosphère apaisante.
RECETTE,

				<<<RECETTE
Huile Anti-Stress & Cœur Apaisé
Usage : massage de la nuque et du thorax
Mélange :
- 3 gouttes d’HE Ylang-Ylang
- 3 gouttes d’HE Lavande vraie
- 1 goutte d’HE Géranium
- 1 c. à soupe d’huile végétale
Effet : détente émotionnelle et apaisement intérieur.
RECETTE,

				<<<RECETTE
Soin Cheveux Brillance
Usage : massage du cuir chevelu et des longueurs
Mélange :
- 2 gouttes d’HE Ylang-Ylang
- 1 goutte d’HE Romarin à cinéole
- 1 c. à soupe d’huile de coco
Effet : nourrit, apporte brillance et vitalité aux cheveux.
RECETTE,

				<<<RECETTE
Élixir Beauté Peau Équilibrante
Usage : visage (le soir)
Mélange :
- 1 goutte d’HE Ylang-Ylang
- 1 c. à café d’huile de jojoba
Effet : équilibre les peaux grasses et améliore l’éclat du teint.
RECETTE,

				<<<RECETTE
Bain Sensoriel Relaxant
Usage : bain tiède
Mélange :
- 3 gouttes d’HE Ylang-Ylang
- 2 gouttes d’HE Lavande vraie
- À mélanger dans une base neutre
Effet : relaxation profonde et apaisement émotionnel.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Déconseillée aux enfants de moins de 6 ans.",
			],
		],
		[
			'name' => 'Orange',
			'latin' => 'Citrus sinensis',
			'description' => <<<TEXT
L’huile essentielle d’Orange douce est connue pour son parfum fruité,
doux et réconfortant.
Apaisante, harmonisante et digestive, elle aide à réduire le stress,
favoriser la détente et améliorer l’ambiance d’une pièce.

Très appréciée en diffusion, elle crée une atmosphère chaleureuse,
positive et rassurante.
C’est une huile essentielle douce, idéale pour toute la famille.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Agrumes',

			'images' => [
				'orange-douce-1.jpg',
				'orange-douce-2.jpg',
				'orange-douce-3.jpg',
			],

			'bienfaits' => [
				"Stress & émotions\n- Apaise l’anxiété et les tensions\n- Harmonise l’humeur\n- Aide en cas d’agitation mentale\n- Favorise la détente et le lâcher-prise",

				"Sommeil\n- Facilite l’endormissement\n- Idéale pour les enfants et les adultes\n- Calme le système nerveux",

				"Digestion\n- Aide à réduire les ballonnements\n- Facilite la digestion lente\n- Apaise les spasmes digestifs légers",

				"Ambiance & bien-être\n- Parfume naturellement l’espace\n- Purifie et rafraîchit l’air\n- Apporte joie, optimisme et chaleur",
			],

			'recettes' => [
				<<<RECETTE
Diffusion Relaxante & Positive
Usage : soirée, détente, chambre
Mélange :
- 5 gouttes d’HE Orange douce
- 3 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Ylang-Ylang
Effet : calme l’ambiance et apporte douceur et réconfort.
RECETTE,

				<<<RECETTE
Roll-On Sérénité
Usage : poignets ou nuque
Mélange (roll-on 10 ml) :
- 4 gouttes d’HE Orange douce
- 3 gouttes d’HE Lavande vraie
- 3 gouttes d’HE Camomille sauvage
Compléter avec une huile végétale
Effet : apaise le stress et les tensions émotionnelles.
RECETTE,

				<<<RECETTE
Mélange Anti-Ballonnements
Usage : massage du ventre (dilué)
Mélange :
- 3 gouttes d’HE Orange douce
- 2 gouttes d’HE Basilic
- 1 goutte d’HE Gingembre
- 1 c. à soupe d’huile végétale
Effet : facilite la digestion et réduit les inconforts digestifs.
RECETTE,

				<<<RECETTE
Spray Maison Parfumé
Usage : ambiance intérieure
Recette pour 50 ml :
- 20 gouttes d’HE Orange douce
- 15 gouttes d’HE Citron
- 10 gouttes d’HE Lavande vraie
Compléter avec alcool à 70 %
Effet : parfum naturel et ambiance chaleureuse.
RECETTE,

				<<<RECETTE
Bain Détente & Bonne Humeur
Usage : bain tiède
Mélange :
- 4 gouttes d’HE Orange douce
- 2 gouttes d’HE Lavande vraie
- À mélanger dans une base neutre
Effet : détente globale et amélioration de l’humeur.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Photosensibilisante : ne pas s’exposer au soleil après application.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Ne pas utiliser sur une peau très sensible ou irritée.",
			],
		],
		[
			'name' => 'Encens',
			'latin' => 'Boswellia carterii',
			'description' => <<<TEXT
L’huile essentielle d’Encens est une huile sacrée, reconnue pour ses
propriétés apaisantes, régénérantes et spirituelles.
Elle calme le mental, favorise la méditation, soutient la respiration
et aide la peau à se régénérer.

Son parfum résineux, chaud et profond est utilisé depuis des millénaires
pour créer une atmosphère de paix, d’ancrage et de connexion intérieure.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Médicinales marocaines',

			'images' => [
				'encens-1.jpg',
				'encens-2.jpg',
				'encens-3.jpg',
			],

			'bienfaits' => [
				"Stress & émotionnel\n- Apaise l’esprit et réduit l’anxiété\n- Favorise la détente profonde\n- Aide en cas de surcharge mentale\n- Idéale pour calmer les pensées avant le sommeil",

				"Respiration\n- Décongestionne légèrement\n- Favorise une respiration ample et apaisée\n- Utile en cas de gêne respiratoire légère ou pendant la méditation",

				"Peau & régénération\n- Accélère la cicatrisation\n- Tonifie et raffermit la peau\n- Réduit les rides et soutient les peaux matures\n- Apaise les irritations et inflammations légères",

				"Spiritualité & méditation\n- Aide à la concentration intérieure\n- Favorise l’ancrage et la connexion spirituelle\n- Crée une atmosphère de paix et de sérénité",
			],

			'recettes' => [
				<<<RECETTE
Diffusion Méditation & Paix Intérieure
Usage : méditation, yoga, relaxation
Mélange :
- 4 gouttes d’HE Encens
- 3 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Orange douce
Effet : atmosphère calme, profonde et harmonisante.
RECETTE,

				<<<RECETTE
Soin Anti-Âge & Régénération
Usage : application visage (le soir)
Mélange :
- 1 goutte d’HE Encens
- 1 c. à café d’huile de rose musquée
Effet : régénère, tonifie et illumine la peau.
RECETTE,

				<<<RECETTE
Huile Respiratoire Apaisante
Usage : massage de la poitrine
Mélange :
- 3 gouttes d’HE Encens
- 2 gouttes d’HE Eucalyptus radié
- 1 goutte d’HE Myrte
- 1 c. à soupe d’huile végétale
Effet : respiration plus calme et fluide.
RECETTE,

				<<<RECETTE
Roll-On Sérénité
Usage : poignets ou nuque
Mélange (roll-on 10 ml) :
- 3 gouttes d’HE Encens
- 4 gouttes d’HE Lavande vraie
- 3 gouttes d’HE Géranium
Compléter avec une huile végétale
Effet : apaise le stress et recentre l’esprit.
RECETTE,

				<<<RECETTE
Bain Détente Profonde
Usage : bain tiède
Mélange :
- 3 gouttes d’HE Encens
- 2 gouttes d’HE Ylang-Ylang
- À mélanger dans une base neutre
Effet : relaxation profonde et sensation de paix intérieure.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Éviter le contact avec les yeux.",
			],
		],
		[
			'name' => 'Néroli',
			'latin' => 'Citrus aurantium amara (fleur)',
			'description' => <<<TEXT
L’huile essentielle de Néroli, issue des délicates fleurs d’oranger amer,
est l’une des huiles les plus précieuses et apaisantes de l’aromathérapie.
Calmante, harmonisante et régénérante, elle soutient le système nerveux,
la peau et les émotions.

Son parfum floral, doux, réconfortant et légèrement sucré apporte
apaisement, bien-être et réconfort profond.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '5ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Médicinales marocaines',

			'images' => [
				'neroli-1.jpg',
				'neroli-2.jpg',
				'neroli-3.jpg',
			],

			'bienfaits' => [
				"Stress & émotions\n- Puissant anti-stress naturel\n- Apaise les crises d’anxiété\n- Soutient en cas de choc émotionnel\n- Favorise l’harmonie intérieure et la détente",

				"Sommeil & nervosité\n- Aide à calmer l’agitation mentale\n- Favorise l’endormissement\n- Idéale pour les nuits agitées liées au stress",

				"Peau & anti-âge\n- Régénérante cellulaire exceptionnelle\n- Améliore l’élasticité de la peau\n- Apaise rougeurs et irritations\n- Idéale pour les peaux matures, sèches ou sensibles",

				"Harmonisation du cœur\n- Aide à retrouver joie, douceur et confiance\n- Utile en cas de tristesse ou surcharge émotionnelle",
			],

			'recettes' => [
				<<<RECETTE
Roll-On Anti-Stress Émotionnel
Usage : poignets, nuque, plexus solaire
Mélange (roll-on 10 ml) :
- 3 gouttes d’HE Néroli
- 4 gouttes d’HE Lavande vraie
- 3 gouttes d’HE Orange douce
Compléter avec une huile végétale
Effet : apaise les émotions et recentre.
RECETTE,

				<<<RECETTE
Soin Éclat & Anti-Âge
Usage : application visage (le soir)
Mélange :
- 1 goutte d’HE Néroli
- 1 c. à café d’huile d’argan ou de rose musquée
Effet : régénère, raffermit et illumine la peau.
RECETTE,

				<<<RECETTE
Diffusion Sommeil & Sérénité
Usage : en soirée
Mélange :
- 4 gouttes d’HE Néroli
- 3 gouttes d’HE Lavande vraie
- 2 gouttes d’HE Verveine
Effet : calme l’esprit et prépare au sommeil.
RECETTE,

				<<<RECETTE
Huile Harmonie Cardiaque
Usage : massage léger du thorax
Mélange :
- 2 gouttes d’HE Néroli
- 3 gouttes d’HE Encens
- 1 goutte d’HE Ylang-Ylang
- 1 c. à soupe d’huile végétale
Effet : apaise le cœur et libère les tensions émotionnelles.
RECETTE,

				<<<RECETTE
Bain Relaxant Fleur d’Oranger
Usage : bain tiède
Mélange :
- 3 gouttes d’HE Néroli
- 2 gouttes d’HE Orange douce
- À mélanger dans une base neutre
Effet : détente profonde et bien-être émotionnel.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Éviter le contact avec les yeux.",
			],
		],
		[
			'name' => 'Eucalyptus Radiata',
			'latin' => 'Eucalyptus radiata',
			'description' => <<<TEXT
L’huile essentielle d’Eucalyptus Radiata est l’une des plus douces et
polyvalentes de la famille des eucalyptus.
Reconnue pour ses propriétés respiratoires, antivirales et énergisantes,
elle dégage les voies respiratoires tout en respectant les personnes sensibles.

Son parfum frais, léger et légèrement fruité en fait une huile idéale
pour toute la famille (à partir de 3 ans).
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '10ml',

			'category' => 'Huiles essentielles',
			'gamme' => 'Plantes',

			'images' => [
				'eucalyptus-radiata-1.jpg',
				'eucalyptus-radiata-2.jpg',
				'eucalyptus-radiata-3.jpg',
			],

			'bienfaits' => [
				"Respiratoire\n- Dégage les voies respiratoires\n- Apaise la toux et le nez encombré\n- Facilite la respiration\n- Utile en cas de rhume, sinusite légère ou bronchite douce",

				"Immunité\n- Antivirale douce\n- Renforce les défenses naturelles\n- Idéale en prévention hivernale",

				"Fatigue & clarté mentale\n- Stimule l’énergie\n- Aide à retrouver concentration et vitalité\n- Légèrement tonifiante",

				"Purification de l’air\n- Assainit l’atmosphère\n- Élimine les mauvaises odeurs\n- Crée une ambiance fraîche et légère",
			],

			'recettes' => [
				<<<RECETTE
Baume Respiratoire Doux
Usage : poitrine et haut du dos
Mélange :
- 3 gouttes d’HE Eucalyptus radiata
- 2 gouttes d’HE Ravintsara
- 2 gouttes d’HE Lavande vraie
- 1 c. à soupe de beurre de karité
Effet : dégage les bronches et apaise la toux.
RECETTE,

				<<<RECETTE
Diffusion Respiratoire & Prévention
Usage : diffusion 10 minutes
Mélange :
- 5 gouttes d’HE Eucalyptus radiata
- 3 gouttes d’HE Citron
- 2 gouttes d’HE Myrte
Effet : purifie l’air et soutient l’immunité.
RECETTE,

				<<<RECETTE
Inhalation Anti-Encombrement
Usage : inhalation au-dessus d’un bol d’eau chaude
Mélange :
- 2 gouttes d’HE Eucalyptus radiata
- 1 goutte d’HE Menthe poivrée (adultes uniquement)
Effet : libère rapidement le nez et la respiration.
RECETTE,

				<<<RECETTE
Huile Anti-Fatigue & Clarté
Usage : massage de la nuque et du haut du dos
Mélange :
- 3 gouttes d’HE Eucalyptus radiata
- 2 gouttes d’HE Romarin
- 1 goutte d’HE Citron
- 1 c. à soupe d’huile végétale
Effet : stimule l’énergie et la concentration.
RECETTE,

				<<<RECETTE
Spray Assainissant Maison
Usage : assainissement de l’air
Recette pour 50 ml :
- 20 gouttes d’HE Eucalyptus radiata
- 15 gouttes d’HE Citron
- 10 gouttes d’HE Lavande vraie
Compléter avec de l’alcool à 70 %
Effet : assainit et rafraîchit l’ambiance de la pièce.
RECETTE,
			],

			'precautions' => [
				"Toujours bien diluer, jamais pure.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Éviter le contact avec les yeux.",
				"Déconseillée aux enfants de moins de 3 ans.",
			],
		],
		[
			'name' => 'Argan',
			'latin' => 'Argania spinosa',
			'description' => <<<TEXT
L’huile végétale d’Argan, originaire du Maroc, est l’une des huiles les plus
riches en antioxydants et acides gras essentiels.
Nourrissante, réparatrice et anti-âge, elle protège la peau du vieillissement,
renforce les cheveux et apporte éclat et souplesse.

Sa texture douce et son parfum délicat en font un soin d’exception pour la peau,
les ongles et les cheveux.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '60ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Plantes',

			'images' => [
				'argan-1.jpg',
				'argan-2.jpg',
				'argan-3.jpg',
			],

			'bienfaits' => [
				"Peau\n- Nourrit et hydrate en profondeur\n- Régénérante et anti-âge\n- Améliore l’élasticité de la peau\n- Apaise les irritations et rougeurs\n- Convient aux peaux sèches, matures et sensibles",

				"Cheveux\n- Renforce et nourrit la fibre capillaire\n- Apporte éclat et brillance\n- Réduit les frisottis\n- Protège les pointes sèches et abîmées",

				"Ongles & cuticules\n- Fortifie les ongles cassants\n- Adoucit et répare les cuticules\n- Prévient le dédoublement",

				"Protection\n- Riche en vitamine E (antioxydant puissant)\n- Protège du vieillissement prématuré\n- Aide à lutter contre les agressions extérieures",
			],

			'recettes' => [
				<<<RECETTE
Soin Visage Anti-Âge
Usage : application le soir
Mélange :
- 3 à 4 gouttes d’huile d’Argan pure
Effet : nourrit, régénère et raffermit la peau.
RECETTE,

				<<<RECETTE
Sérum Cheveux Éclat
Usage : pointes et longueurs
Mélange :
- 4 gouttes d’huile d’Argan
- 1 goutte d’HE Ylang-Ylang (optionnel)
Effet : brillance, douceur et nutrition intense.
RECETTE,

				<<<RECETTE
Soin Corps Nourrissant
Usage : après la douche, sur peau légèrement humide
Mélange :
- Huile d’Argan pure ou associée à une huile végétale d’amande douce
Effet : peau douce, souple et réparée.
RECETTE,

				<<<RECETTE
Bain d’Huile Capillaire
Usage : avant shampoing
Mélange :
- 1 c. à soupe d’huile d’Argan
- Quelques gouttes d’HE Romarin (optionnel)
Effet : nourrit profondément et renforce la fibre capillaire.
RECETTE,

				<<<RECETTE
Soin Ongles Fortifiants
Usage : massage des ongles et cuticules
Mélange :
- 2 gouttes d’huile d’Argan
- 1 goutte d’HE Citron (optionnel)
Effet : ongles plus solides et cuticules nourries.
RECETTE,
			],

			'precautions' => [
				"Éviter le contact avec les yeux.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Figue de Barbarie',
			'latin' => 'Opuntia ficus-indica',
			'description' => <<<TEXT
L’huile végétale de Figue de Barbarie est l’une des huiles les plus rares
et précieuses.
Exceptionnellement riche en vitamine E, acides gras essentiels et stérols,
elle est reconnue pour son puissant effet anti-âge, raffermissant et
régénérant.

Très légère, elle pénètre rapidement sans laisser de film gras et apporte
éclat, élasticité et douceur à la peau.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Plantes',

			'images' => [
				'figue-barbarie-1.jpg',
				'figue-barbarie-2.jpg',
				'figue-barbarie-3.jpg',
			],

			'bienfaits' => [
				"Anti-âge & raffermissante\n- Puissant antioxydant naturel\n- Lutte contre le relâchement cutané\n- Réduit l’apparence des rides et ridules\n- Améliore la fermeté et l’élasticité de la peau",

				"Hydratante & nourrissante\n- Hydrate en profondeur sans graisser\n- Redonne souplesse et confort aux peaux sèches\n- Protège la peau de la déshydratation",

				"Éclat du teint\n- Illumine la peau\n- Estompe les taches brunes et cicatrices légères\n- Unifie le teint",

				"Réparation cutanée\n- Apaise les rougeurs et irritations\n- Favorise la régénération des peaux abîmées\n- Convient aux peaux sensibles et réactives",
			],

			'recettes' => [
				<<<RECETTE
Sérum Anti-Âge Deluxe
Usage : visage, le soir
Mélange :
- 3 à 4 gouttes d’huile de Figue de Barbarie pure
Effet : raffermit, lisse et régénère la peau.
RECETTE,

				<<<RECETTE
Soin Contour des Yeux
Usage : matin ou soir
Mélange :
- 1 goutte d’huile de Figue de Barbarie
Appliquer par tapotements légers sous les yeux
Effet : réduit cernes, poches et ridules.
RECETTE,

				<<<RECETTE
Huile Éclat du Teint
Usage : matin, avant la crème
Mélange :
- 2 gouttes d’huile de Figue de Barbarie
- 1 goutte d’huile d’Argan (optionnel)
Effet : peau lumineuse, douce et rebondie.
RECETTE,

				<<<RECETTE
Soin Anti-Taches (usage le soir)
Usage : application locale
Mélange :
- 2 gouttes d’huile de Figue de Barbarie
- 1 goutte d’HE Citron
Effet : aide à atténuer les taches pigmentaires et cicatrices.
RECETTE,

				<<<RECETTE
Soin Précieux pour les Mains
Usage : quotidien
Mélange :
- Quelques gouttes d’huile de Figue de Barbarie pure
Effet : nourrit, protège et prévient le vieillissement des mains.
RECETTE,
			],

			'precautions' => [
				"Conserver à l’abri de la chaleur et de la lumière.",
				"Photosensibilisante uniquement si associée à des huiles essentielles d’agrumes (usage le soir).",
				"Éviter le contact avec les yeux.",
			],
		],
		[
			'name' => 'Rose Musquée',
			'latin' => 'Rosa rubiginosa',
			'description' => <<<TEXT
L’huile végétale de Rose Musquée est l’une des plus réputées pour la
régénération de la peau.
Riche en acides gras essentiels, vitamine A naturelle (rétinol végétal)
et antioxydants, elle favorise le renouvellement cellulaire, atténue
les cicatrices et lutte contre les signes du vieillissement.

C’est une huile précieuse, idéale pour les soins du visage, des cicatrices
et des taches pigmentaires.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Fleurs',

			'images' => [
				'rose-musquee-1.jpg',
				'rose-musquee-2.jpg',
				'rose-musquee-3.jpg',
			],

			'bienfaits' => [
				"Anti-âge & régénérante\n- Riche en vitamine A (rétinol végétal)\n- Stimule la production de collagène\n- Atténue rides et ridules\n- Améliore l’élasticité et la fermeté de la peau",

				"Cicatrices & marques\n- Favorise la réparation cutanée\n- Réduit l’apparence des cicatrices anciennes ou récentes\n- Aide à atténuer vergetures et marques d’acné",

				"Taches pigmentaires\n- Unifie le teint\n- Aide à diminuer les taches brunes liées au soleil, à l’âge ou à l’acné",

				"Peaux sèches, abîmées ou sensibles\n- Nourrit intensément\n- Apaise les rougeurs\n- Améliore la douceur et la souplesse de la peau",
			],

			'recettes' => [
				<<<RECETTE
Soin Anti-Âge Visage
Usage : le soir
Mélange :
- 3 gouttes d’huile de Rose Musquée
Appliquer sur le visage et le cou
Effet : peau raffermie, lissée et régénérée.
RECETTE,

				<<<RECETTE
Soin Cicatrices & Vergetures
Usage : 2 fois par jour
Mélange :
- 2 à 3 gouttes d’huile de Rose Musquée pure
Effet : atténue progressivement cicatrices et marques.
RECETTE,

				<<<RECETTE
Soin Anti-Taches (usage le soir)
Usage : application locale
Mélange :
- 2 gouttes d’huile de Rose Musquée
- 1 goutte d’HE Citron
Effet : aide à éclaircir les taches brunes et unifie le teint.
RECETTE,

				<<<RECETTE
Sérum Éclat du Teint
Usage : le matin
Mélange :
- 2 gouttes d’huile de Rose Musquée
- 1 goutte d’huile d’Argan
Effet : illumine le teint et nourrit la peau.
RECETTE,

				<<<RECETTE
Huile Réparatrice Peaux Sensibles
Usage : quotidien
Mélange :
- 3 gouttes d’huile de Rose Musquée
- 1 goutte d’HE Lavande vraie (optionnel)
Effet : apaise rougeurs, tiraillements et inconforts cutanés.
RECETTE,
			],

			'precautions' => [
				"Conserver de préférence au réfrigérateur pour préserver ses actifs.",
				"Éviter l’exposition au soleil après association avec des huiles essentielles d’agrumes.",
				"Éviter le contact avec les yeux.",
			],
		],
		[
			'name' => 'Fenouil',
			'latin' => 'Foeniculum vulgare',
			'description' => <<<TEXT
L’huile végétale de Fenouil (macérât huileux) est reconnue pour ses
propriétés tonifiantes, raffermissantes et digestives.
Riche en actifs aromatiques doux issus des graines de fenouil, elle aide
à améliorer le confort digestif, raffermir la peau et soutenir le
bien-être féminin.

Son parfum chaud et anisé en fait une huile agréable pour les soins du
ventre et du corps.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Fleurs',

			'images' => [
				'fenouil-1.jpg',
				'fenouil-2.jpg',
				'fenouil-3.jpg',
			],

			'bienfaits' => [
				"Confort digestif\n- Apaise les ballonnements\n- Réduit les tensions abdominales\n- Aide en cas de digestion lente\n- Idéale en massage du ventre",

				"Fermeté & tonus de la peau\n- Raffermissante douce\n- Améliore l’élasticité cutanée",

				"Bien-être féminin\n- Apaise les tensions prémenstruelles\n- Détend le bas-ventre\n- Apporte un effet calmant et harmonisant",

				"Hydratante & nourrissante\n- Protège la peau de la déshydratation\n- Laisse la peau douce et souple\n- Convient à tous types de peau",
			],

			'recettes' => [
				<<<RECETTE
Massage Confort Digestif
Usage : massage du ventre en mouvements circulaires
Mélange :
- 1 c. à café d’huile végétale de Fenouil
- (Optionnel : 1 goutte d’HE Basilic ou d’HE Orange douce)
Effet : apaise ballonnements et tensions abdominales.
RECETTE,

				<<<RECETTE
Huile Raffermissante Corps
Usage : cuisses, bras, ventre
Mélange :
- Huile végétale de Fenouil pure
Effet : améliore le tonus et l’élasticité de la peau.
RECETTE,

				<<<RECETTE
Soin Bien-Être Féminin
Usage : massage du bas du ventre
Mélange :
- 1 c. à café d’huile végétale de Fenouil
- (Optionnel : 1 goutte d’HE Sauge sclarée)
Effet : calme les tensions du cycle et apporte douceur émotionnelle.
RECETTE,

				<<<RECETTE
Huile Corps Hydratante
Usage : soin quotidien
Mélange :
- Huile végétale de Fenouil pure ou associée à une huile d’amande douce
Effet : peau souple, douce et nourrie.
RECETTE,

				<<<RECETTE
Massage Détente du Soir
Usage : plexus solaire et ventre
Mélange :
- 1 c. à café d’huile végétale de Fenouil
- (Optionnel : 1 goutte d’HE Lavande vraie)
Effet : relaxation digestive et émotionnelle, favorise le lâcher-prise.
RECETTE,
			],

			'precautions' => [
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Ne pas utiliser sur une peau sensible ou irritée.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Lin',
			'latin' => 'Linum usitatissimum',
			'description' => <<<TEXT
L’huile végétale de Lin est une huile riche en oméga-3, reconnue pour ses
propriétés régénérantes, adoucissantes et apaisantes.
Très nourrissante, elle aide à restaurer les peaux sèches, sensibles ou
irritées. Elle protège également les cheveux abîmés et redonne vitalité
aux longueurs.

Sa texture douce et son action réparatrice en font une huile idéale pour
les soins du corps, des cheveux et des peaux fragiles.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Fleurs',

			'images' => [
				'lin-1.jpg',
				'lin-2.jpg',
				'lin-3.jpg',
			],

			'bienfaits' => [
				"Peau sèche & sensible\n- Nourrit intensément\n- Apaise les tiraillements\n- Réduit les rougeurs\n- Restaure le film hydrolipidique",

				"Anti-inflammatoire naturelle\n- Apaise les irritations cutanées\n- Calme les inflammations superficielles\n- Aide à restaurer les peaux agressées",

				"Cheveux secs & abîmés\n- Nourrit la fibre capillaire\n- Lisse les longueurs\n- Réduit la casse et les frisottis\n- Renforce la brillance naturelle",

				"Ongles & mains\n- Assouplit les cuticules\n- Renforce les ongles fragiles\n- Aide à prévenir le dédoublement",
			],

			'recettes' => [
				<<<RECETTE
Soin Peau Très Sèche
Usage : visage ou zones sèches
Mélange :
- 3 gouttes d’huile végétale de Lin pure
Effet : nourrit et apaise immédiatement la peau.
RECETTE,

				<<<RECETTE
Masque Capillaire Nourrissant
Usage : longueurs et pointes
Mélange :
- 1 c. à soupe d’huile végétale de Lin
- (Optionnel : 1 goutte d’HE Ylang-Ylang)
Effet : cheveux souples, brillants et réparés.
RECETTE,

				<<<RECETTE
Soin Apaisant Peau Irritée
Usage : zones sensibles
Mélange :
- 1 c. à café d’huile végétale de Lin
- (Optionnel : 1 goutte d’HE Lavande vraie)
Effet : calme rougeurs, tiraillements et irritations.
RECETTE,

				<<<RECETTE
Huile Corps Réparatrice
Usage : après la douche
Mélange :
- Huile végétale de Lin seule ou associée à l’huile d’Argan
Effet : peau douce, souple et nourrie.
RECETTE,

				<<<RECETTE
Soin Ongles Fragiles
Usage : quotidien
Mélange :
- 2 gouttes d’huile végétale de Lin
Masser ongles et cuticules
Effet : ongles plus forts et moins cassants.
RECETTE,
			],

			'precautions' => [
				"Conserver à l’abri de la chaleur et de la lumière.",
				"Utiliser dans les 3 mois après ouverture.",
				"Ne pas chauffer.",
				"Photosensibilisante : ne pas s’exposer au soleil après application.",
			],
		],
		[
			'name' => 'Ricin',
			'latin' => 'Ricinus communis',
			'description' => <<<TEXT
L’huile végétale de Ricin est l’une des plus connues pour ses bienfaits
fortifiants. Épaisse et très riche en acides gras, notamment en acide
ricinoléique, elle stimule naturellement la pousse des cheveux, des cils
et des sourcils.

Nourrissante, réparatrice et protectrice, elle est idéale pour renforcer
la fibre capillaire, hydrater les ongles et revitaliser les zones très
sèches de la peau.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Plantes',

			'images' => [
				'ricin-1.jpg',
				'ricin-2.jpg',
				'ricin-3.jpg',
			],

			'bienfaits' => [
				"Cheveux\n- Stimule la pousse\n- Renforce la fibre capillaire\n- Réduit la casse et les pointes fourchues\n- Apporte brillance et épaisseur\n- Idéale pour cheveux secs, cassants ou abîmés",

				"Cils & sourcils\n- Favorise une pousse plus dense\n- Renforce et épaissit naturellement\n- Apporte brillance",

				"Ongles & mains\n- Renforce les ongles fragiles\n- Prévient le dédoublement\n- Assouplit et nourrit les cuticules",

				"Peau\n- Hydrate intensément\n- Aide à réparer les zones très sèches\n- Apaise les irritations légères\n- Convient aux peaux sensibles (en petite quantité)",
			],

			'recettes' => [
				<<<RECETTE
Soin Pousse des Cheveux
Usage : cuir chevelu
Mélange :
- 1 c. à soupe d’huile végétale de Ricin
- 1 c. à soupe d’huile végétale de Coco ou d’Olive
Masser 10 minutes – laisser poser 1 heure
Effet : stimule la racine, renforce et épaissit les cheveux.
RECETTE,

				<<<RECETTE
Sérum Cils & Sourcils
Usage : chaque soir
Mélange :
- 1 goutte d’huile végétale de Ricin (pure ou diluée à 50 % avec du Jojoba)
Appliquer avec une brosse propre
Effet : épaissit et favorise la pousse.
RECETTE,

				<<<RECETTE
Soin Ongles Fortifiants
Usage : quotidien
Mélange :
- 2 gouttes d’huile végétale de Ricin
Masser ongles et cuticules
Effet : ongles plus résistants et moins cassants.
RECETTE,

				<<<RECETTE
Baume Réparateur Zones Sèches
Usage : coudes, talons, mains
Mélange :
- 1 c. à café d’huile végétale de Ricin
- 1 c. à café de beurre de Karité
Effet : nourrit profondément et répare la peau sèche.
RECETTE,

				<<<RECETTE
Masque Capillaire Réparateur
Usage : longueurs et pointes
Mélange :
- 2 c. à soupe d’huile végétale de Ricin
- 1 c. à soupe d’huile végétale d’Argan
Effet : brillance, douceur et réparation intense.
RECETTE,
			],

			'precautions' => [
				"Conserver à l’abri de la chaleur et de la lumière.",
				"Éviter l’ingestion.",
				"À éviter sur les peaux grasses.",
			],
		],
		[
			'name' => 'Coco',
			'latin' => 'Cocos nucifera',
			'description' => <<<TEXT
L’huile végétale de Coco est une huile incontournable, reconnue pour ses
propriétés nourrissantes, réparatrices et protectrices.
Riche en acides gras saturés, elle adoucit la peau, nourrit intensément
les cheveux et laisse un parfum délicat et exotique.

Solide à froid et liquide à la chaleur, elle est très polyvalente pour
les soins du corps, du visage et des cheveux.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Plantes',

			'images' => [
				'coco-1.jpg',
				'coco-2.jpg',
				'coco-3.jpg',
			],

			'bienfaits' => [
				"Peau\n- Hydrate en profondeur\n- Apaise les irritations et rougeurs\n- Laisse la peau douce et souple\n- Protège du dessèchement\n- Idéale pour peaux sèches ou sensibles",

				"Cheveux\n- Nourrit la fibre capillaire\n- Réduit les frisottis\n- Renforce les longueurs\n- Apporte brillance et douceur\n- Idéale pour cheveux secs, frisés ou bouclés",

				"Lèvres & zones sèches\n- Apaise les lèvres gercées\n- Adoucit coudes, talons et mains sèches\n- Protège des agressions extérieures",

				"Démaquillant naturel\n- Dissout maquillage et impuretés\n- Laisse la peau douce sans l’assécher",
			],

			'recettes' => [
				<<<RECETTE
Masque Cheveux Nourrissant
Usage : longueurs et pointes
Mélange :
- 1 à 2 c. à soupe d’huile végétale de Coco
Laisser poser 1 heure
Effet : cheveux nourris, brillants et réparés.
RECETTE,

				<<<RECETTE
Baume Hydratant Corps
Usage : quotidien
Mélange :
- Huile végétale de Coco pure
Effet : peau douce, souple et délicatement parfumée.
RECETTE,

				<<<RECETTE
Démaquillant Naturel
Usage : visage
Mélange :
- Quelques gouttes d’huile végétale de Coco
Masser puis rincer avec un linge chaud
Effet : dissout le maquillage en douceur.
RECETTE,

				<<<RECETTE
Soin Lèvres & Zones Très Sèches
Usage : selon les besoins
Mélange :
- Huile végétale de Coco pure
Effet : nourrit, répare et protège.
RECETTE,

				<<<RECETTE
Huile Après-Soleil Apaisante
Usage : peau échauffée (hors coup de soleil sévère)
Mélange :
- 1 c. à soupe d’huile végétale de Coco
- 1 goutte d’HE Lavande vraie (optionnel)
Effet : apaise, hydrate et adoucit la peau.
RECETTE,
			],

			'precautions' => [
				"Conserver à l’abri de la chaleur et de la lumière.",
				"À éviter sur les peaux grasses.",
			],
		],
		[
			'name' => 'Pépins de Raisin',
			'latin' => 'Vitis vinifera',
			'description' => <<<TEXT
L’huile végétale de Pépins de Raisin est une huile légère, pénétrante et
non grasse, très appréciée pour les soins du visage et du corps.
Riche en antioxydants, notamment en polyphénols, elle aide à renforcer la
barrière cutanée, resserrer les pores et protéger la peau du vieillissement
prématuré.

Sa texture fluide en fait également une excellente huile de massage.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Fruits',

			'images' => [
				'pepins-raisin-1.jpg',
				'pepins-raisin-2.jpg',
				'pepins-raisin-3.jpg',
			],

			'bienfaits' => [
				"Peaux mixtes à grasses\n- Régule la production de sébum\n- Resserre les pores\n- Légère et non comédogène\n- Aide à prévenir les imperfections",

				"Anti-âge naturelle\n- Riche en antioxydants\n- Protège la peau des radicaux libres\n- Améliore l’élasticité et la tonicité\n- Aide à prévenir rides et relâchement cutané",

				"Hydratante & adoucissante\n- Hydrate sans effet gras\n- Adoucit et assouplit la peau\n- Convient aux peaux sensibles",

				"Cheveux\n- Lisse et adoucit les longueurs\n- Apporte légèreté et brillance\n- Idéale pour cheveux fins ou regraissant vite",
			],

			'recettes' => [
				<<<RECETTE
Soin Visage Équilibrant
Usage : matin ou soir
Mélange :
- 3 gouttes d’huile végétale de Pépins de raisin
Effet : hydrate, régule le sébum et resserre les pores.
RECETTE,

				<<<RECETTE
Sérum Anti-Âge Léger
Usage : soir
Mélange :
- 2 gouttes Pépins de raisin
- 1 goutte d’huile de Rose musquée
Effet : peau plus ferme, souple et lumineuse.
RECETTE,

				<<<RECETTE
Huile de Massage Neutre
Usage : massage du corps
Mélange :
- Huile de Pépins de raisin pure
ou associée à Coco ou Argan
Effet : excellente glisse, peau douce et hydratée.
RECETTE,

				<<<RECETTE
Soin Cheveux Légers
Usage : pointes et longueurs
Mélange :
- 1 c. à café d’huile de Pépins de raisin
- 1 goutte d’HE Ylang-Ylang (optionnel)
Effet : brillance et douceur sans alourdir.
RECETTE,

				<<<RECETTE
Soin Peau Sensible
Usage : zones sèches ou irritées
Mélange :
- Huile de Pépins de raisin pure
ou associée à l’huile de Calendula
Effet : apaise, protège et renforce la peau fragile.
RECETTE,
			],

			'precautions' => [
				"Ne pas chauffer.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Soja',
			'latin' => 'Glycine max',
			'description' => <<<TEXT
L’huile végétale de Soja est une huile douce, polyvalente et riche en acides
gras essentiels (oméga-3, 6 et 9).
Hydratante, assouplissante et réparatrice, elle convient aussi bien aux soins
du visage qu’aux massages corporels.

Sa texture fluide, légère et agréable en fait une excellente base pour les
mélanges aromatiques et les soins quotidiens. Elle aide à maintenir
l’élasticité de la peau tout en renforçant la barrière cutanée.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Plantes',

			'images' => [
				'soja-1.jpg',
				'soja-2.jpg',
				'soja-3.jpg',
			],

			'bienfaits' => [
				"Hydratante & adoucissante\n- Hydrate en profondeur\n- Rend la peau douce et souple\n- Protège de la déshydratation\n- Convient aux peaux sensibles et réactives",

				"Anti-âge douce\n- Riche en vitamine E (antioxydante)\n- Aide à prévenir le vieillissement cutané\n- Améliore l’élasticité de la peau\n- Contribue à la fermeté naturelle",

				"Peaux mixtes à sèches\n- Légère mais nutritive\n- Régule la peau sans la graisser\n- Idéale comme huile de jour",

				"Corps & massage\n- Excellente glisse pour les massages\n- Nourrit sans laisser de film lourd\n- Base idéale pour les synergies d’huiles essentielles",
			],

			'recettes' => [
				<<<RECETTE
Soin Visage Équilibrant
Usage : matin
Mélange :
- 3 gouttes d’huile végétale de Soja
Effet : hydrate, assouplit et régule la peau.
RECETTE,

				<<<RECETTE
Huile Anti-Âge Légère
Usage : soir
Mélange :
- 2 gouttes d’huile de Soja
- 1 goutte d’huile de Rose musquée
Effet : améliore la fermeté et l’éclat du teint.
RECETTE,

				<<<RECETTE
Huile de Massage Relaxante
Usage : corps
Mélange :
- Huile de Soja pure
- Optionnel : 3 gouttes d’HE Lavande vraie pour 1 c. à soupe
Effet : glisse parfaite, peau douce et détendue.
RECETTE,

				<<<RECETTE
Soin Corps Hydratant
Usage : quotidien
Mélange :
- Huile de Soja pure
ou associée à Coco ou Amande douce
Effet : peau nourrie, souple et élastique.
RECETTE,

				<<<RECETTE
Soin Cheveux Légers
Usage : pointes
Mélange :
- 1 c. à café d’huile de Soja
Effet : nourrit les pointes sans alourdir.
RECETTE,
			],

			'precautions' => [
				"Conserver à l’abri de la chaleur et de la lumière.",
				"Utiliser dans les 6 mois après ouverture.",
			],
		],
		[
			'name' => 'Amande douce',
			'latin' => 'Prunus amygdalus dulcis',
			'description' => <<<TEXT
L’huile végétale d’Amande Douce est l’une des huiles les plus appréciées pour
ses propriétés nourrissantes, apaisantes et protectrices.

Idéale pour les peaux sensibles, sèches ou irritées, elle adoucit, hydrate
et soulage les inconforts cutanés. Grâce à sa douceur exceptionnelle,
elle convient parfaitement aux bébés, aux femmes enceintes
et aux peaux délicates.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Fruits',

			'images' => [
				'amande-douce-1.jpg',
				'amande-douce-2.jpg',
				'amande-douce-3.jpg',
			],

			'bienfaits' => [
				"Peau sèche & sensible\n- Hydrate intensément\n- Apaise les irritations et démangeaisons\n- Adoucit et assouplit la peau\n- Préserve le film hydrolipidique",

				"Soin grossesse & bébé\n- Idéale pour le massage bébé\n- Apaise l’érythème fessier (hors irritation ouverte)\n- Prévient les vergetures pendant la grossesse\n- Ultra-douce et très bien tolérée",

				"Corps\n- Excellent soin après-douche\n- Adoucit les zones rugueuses (coudes, genoux)\n- Laisse la peau souple et satinée",

				"Cheveux\n- Nourrit les longueurs\n- Apporte douceur et brillance\n- Apaise le cuir chevelu irrité",
			],

			'recettes' => [
				<<<RECETTE
Huile Hydratante Corps
Usage : quotidien
Mélange :
- Huile d’amande douce pure après la douche
Effet : peau douce, souple et nourrie.
RECETTE,

				<<<RECETTE
Soin Massage Bébé
Usage : massage doux
Mélange :
- Huile d’amande douce pure
Effet : hydrate et apaise la peau délicate.
RECETTE,

				<<<RECETTE
Prévention Vergetures
Usage : ventre, hanches, cuisses
Mélange :
- 1 c. à soupe d’huile d’amande douce
Effet : améliore l’élasticité de la peau.
RECETTE,

				<<<RECETTE
Masque Cheveux Adoucissant
Usage : longueurs
Mélange :
- 1 c. à soupe d’huile d’amande douce
- Optionnel : 1 goutte d’HE Ylang-Ylang
Effet : nourrit, adoucit et apporte brillance.
RECETTE,

				<<<RECETTE
Soin Peau Sensible & Irritée
Usage : zones sèches ou sensibles
Mélange :
- Huile d’amande douce pure
Effet : apaise rougeurs, tiraillements et inconforts.
RECETTE,
			],

			'precautions' => [
				"Conserver à l’abri de la chaleur et de la lumière.",
				"Peut être comédogène pour les peaux grasses.",
			],
		],
		[
			'name' => 'Amande amère',
			'latin' => 'Prunus amygdalus amara',
			'description' => <<<TEXT
L’huile d’Amande Amère est appréciée pour son parfum délicat,
caractéristique et légèrement sucré.

Utilisée en cosmétique après purification, elle adoucit la peau,
parfume naturellement les soins et apporte un effet tonifiant.
Très prisée dans les rituels beauté traditionnels, elle est utilisée
pour sublimer la peau, prévenir les taches et raffermir certaines zones
du corps.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Fruits',

			'images' => [
				'amande-amere-1.jpg',
				'amande-amere-2.jpg',
				'amande-amere-3.jpg',
			],

			'bienfaits' => [
				"Peau\n- Adoucit et assouplit la peau\n- Tonifie les tissus cutanés\n- Améliore l’éclat du teint\n- Parfume naturellement les soins corporels",

				"Tonicité & Beauté du corps\n- Effet raffermissant doux\n- Idéale pour bras, ventre, cuisses\n- Favorise une peau plus lisse",

				"Taches & uniformité du teint\n- Aide à estomper légèrement les taches foncées\n- Donne un aspect lumineux\n- Utilisation principalement le soir",

				"Cheveux\n- Parfume et adoucit les longueurs\n- Apporte brillance\n- Nourrit les cheveux secs (en mélange)",
			],

			'recettes' => [
				<<<RECETTE
Huile Parfumée pour le Corps
Usage : après la douche
Mélange :
- Huile d’amande amère pure (usage cosmétique)
Effet : peau douce, satinée et délicatement parfumée.
RECETTE,

				<<<RECETTE
Soin Éclat & Taches Légères
Usage : le soir
Mélange :
- 1 c. à café d’huile d’amande amère
- Optionnel : 1 goutte de Citron (soir uniquement)
Effet : unifie le teint et illumine la peau.
RECETTE,

				<<<RECETTE
Huile Raffermissante Corps
Usage : zones à tonifier
Mélange :
- Huile d’amande amère pure
Effet : peau plus lisse et plus tonique.
RECETTE,

				<<<RECETTE
Soin Cheveux Parfumés
Usage : longueurs
Mélange :
- 1 c. à café d’huile d’amande amère
- 1 c. à café d’huile de coco (optionnel)
Effet : nourrit, parfume et apporte brillance.
RECETTE,

				<<<RECETTE
Huile de Massage Parfumée
Usage : massage bien-être
Mélange :
- Huile d’amande amère seule
- ou diluée dans de l’huile d’amande douce
Effet : glisse parfaite et parfum doux et réconfortant.
RECETTE,
			],

			'precautions' => [
				"Éviter l’ingestion.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Éviter le contact avec les yeux.",
				"Ne pas utiliser sur une peau sensible ou irritée.",
				"Déconseillée aux enfants de moins de 6 ans.",
			],
		],
		[
			'name' => 'Noyau d’abricot',
			'latin' => 'Prunus armeniaca',
			'description' => <<<TEXT
L’huile végétale de Noyau d’Abricot est une huile douce,
illuminatrice et revitalisante. Très appréciée pour son effet
bonne mine naturel, elle redonne éclat et souplesse à la peau.

Riche en vitamines A et E, elle nourrit, protège et convient
parfaitement aux peaux ternes, fatiguées, sensibles ou déshydratées.
Sa texture légère et pénétrante en fait une excellente huile
de soin quotidien.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Fruits',

			'images' => [
				'abricot-1.jpg',
				'abricot-2.jpg',
				'abricot-3.jpg',
			],

			'bienfaits' => [
				"Éclat & Bonne Mine\n- Illumine naturellement le teint\n- Revitalise les peaux ternes et fatiguées\n- Apporte un effet coup d’éclat immédiat",

				"Peau Sèche ou Sensible\n- Hydrate et nourrit en profondeur\n- Apaise les rougeurs\n- Rend la peau douce et souple",

				"Anti-Âge Doux\n- Riche en antioxydants\n- Aide à prévenir les signes du vieillissement\n- Améliore l’élasticité de la peau",

				"Corps & Massage\n- Texture légère et pénétrante\n- Très agréable au toucher\n- Idéale comme huile de massage ou base aromatique",
			],

			'recettes' => [
				<<<RECETTE
Soin Bonne Mine Quotidien
Usage : matin
Mélange :
- 3 à 4 gouttes d’huile de noyau d’abricot pure
Effet : teint lumineux, peau hydratée et éclat naturel.
RECETTE,

				<<<RECETTE
Sérum Anti-Âge Doux
Usage : soir
Mélange :
- 2 gouttes noyau d’abricot
- 1 goutte huile de rose musquée
Effet : peau lissée, souple et revitalisée.
RECETTE,

				<<<RECETTE
Huile de Massage Peau Sensible
Usage : corps
Mélange :
- Huile de noyau d’abricot pure
Effet : glisse parfaite, peau douce et confortable.
RECETTE,

				<<<RECETTE
Soin Après-Soleil
Usage : peau échauffée (sans coup de soleil sévère)
Mélange :
- 1 c. à café d’huile de noyau d’abricot
- Optionnel : 1 goutte Lavande vraie
Effet : apaise, nourrit et répare la peau.
RECETTE,

				<<<RECETTE
Masque Cheveux Douceur
Usage : longueurs
Mélange :
- 1 c. à soupe huile de noyau d’abricot
- 1 c. à soupe huile de jojoba (optionnel)
Effet : nourrit sans alourdir, apporte brillance et douceur.
RECETTE,
			],

			'precautions' => [
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Avocat',
			'latin' => 'Persea americana',
			'description' => <<<TEXT
L’huile végétale d’Avocat est une huile riche, nourrissante
et réparatrice, particulièrement appréciée pour les peaux
sèches, matures ou sensibles.

Grâce à sa forte teneur en vitamines A, D et E ainsi qu’en
acides gras essentiels, elle apaise, protège et régénère la
peau en profondeur. C’est également une huile précieuse
pour les cheveux secs, ternes ou abîmés.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Fruits',

			'images' => [
				'avocat-1.jpg',
				'avocat-2.jpg',
				'avocat-3.jpg',
			],

			'bienfaits' => [
				"Peau Sèche, Sensible ou Mature\n- Hydrate intensément\n- Apaise rougeurs et irritations\n- Régénère les tissus cutanés\n- Améliore l’élasticité et la souplesse",

				"Anti-Âge\n- Riche en antioxydants\n- Aide à prévenir le relâchement cutané\n- Lisse les ridules\n- Favorise le renouvellement cellulaire",

				"Protection & Réparation\n- Protège du dessèchement\n- Renforce la barrière cutanée\n- Idéale après exposition au soleil ou au froid",

				"Cheveux\n- Nourrit la fibre capillaire\n- Répare les cheveux secs et cassants\n- Apporte brillance et douceur\n- Apaise le cuir chevelu sec",
			],

			'recettes' => [
				<<<RECETTE
Soin Visage Nourrissant
Usage : soir
Mélange :
- 3 gouttes d’huile d’avocat pure
Effet : nourrit, apaise et régénère la peau.
RECETTE,

				<<<RECETTE
Soin Anti-Âge Régénérant
Usage : visage et cou
Mélange :
- 2 gouttes huile d’avocat
- 1 goutte huile de rose musquée
Effet : peau plus ferme, revitalisée et souple.
RECETTE,

				<<<RECETTE
Baume Réparateur Corps
Usage : zones très sèches (genoux, coudes, mains)
Mélange :
- Huile d’avocat pure
Effet : réparation intense et confort immédiat.
RECETTE,

				<<<RECETTE
Masque Cheveux Réparateur
Usage : longueurs et pointes
Mélange :
- 1 c. à soupe huile d’avocat
- 1 c. à soupe huile de coco (optionnel)
Effet : nourrit, lisse et renforce les cheveux secs.
RECETTE,

				<<<RECETTE
Soin Après-Soleil Apaisant
Usage : peau échauffée
Mélange :
- 1 c. à café huile d’avocat
- Optionnel : 1 goutte Lavande vraie
Effet : apaise, protège et régénère la peau.
RECETTE,
			],

			'precautions' => [
				"À éviter sur peau grasse.",
				"Conserver à l’abri de la chaleur et de la lumière.",
				"Utiliser dans les 3 mois après ouverture.",
			],
		],
		[
			'name' => 'Graines de cresson',
			'latin' => 'Lepidium sativum',
			'description' => <<<TEXT
L’huile végétale de Graines de Cresson est réputée pour ses
propriétés fortifiantes, purifiantes et stimulantes.

Riche en vitamines, minéraux et composés soufrés naturels,
elle renforce les cheveux, purifie la peau et favorise une
croissance capillaire saine. Très utilisée dans la cosmétique
orientale traditionnelle, elle est particulièrement appréciée
pour lutter contre la chute de cheveux et renforcer les racines.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Plantes',

			'images' => [
				'cresson-1.jpg',
				'cresson-2.jpg',
				'cresson-3.jpg',
			],

			'bienfaits' => [
				"Cheveux & Cuir Chevelu\n- Fortifie les racines\n- Réduit la chute de cheveux\n- Stimule la pousse naturelle\n- Apaise le cuir chevelu irrité\n- Idéale pour cheveux fins, fragiles ou cassants",

				"Peau\n- Purifie et équilibre les peaux mixtes à grasses\n- Aide à réduire les petites imperfections\n- Riche en antioxydants\n- Apaise les rougeurs légères",

				"Ongles\n- Renforce les ongles fragiles\n- Favorise la croissance\n- Nourrit les cuticules",

				"Tonus & Vitalité\n- Riche en vitamines A, C et E\n- Contient des minéraux (fer, calcium)\n- Apporte énergie et résistance aux tissus",
			],

			'recettes' => [
				<<<RECETTE
Soin Anti-Chute Intensif
Usage : cuir chevelu
Mélange :
- 1 c. à soupe huile de cresson
- Optionnel : 2 gouttes HE Romarin à cinéole
Effet : stimule la pousse et renforce les racines.
RECETTE,

				<<<RECETTE
Masque Cheveux Renforçant
Usage : racines et longueurs
Mélange :
- 1 c. à soupe huile de cresson
- 1 c. à soupe huile de ricin
Effet : nourrit, épaissit et fortifie les cheveux.
RECETTE,

				<<<RECETTE
Soin Purifiant du Visage
Usage : le soir
Mélange :
- 3 gouttes huile de cresson
- Optionnel : 1 goutte HE Tea Tree (peaux grasses)
Effet : purifie, équilibre et améliore la clarté du teint.
RECETTE,

				<<<RECETTE
Soin Ongles & Cuticules
Usage : quotidien
Mélange :
- 2 gouttes huile de cresson
Effet : ongles plus forts et cuticules nourries.
RECETTE,

				<<<RECETTE
Huile Corps Vitalité
Usage : massage corps
Mélange :
- Huile de cresson pure ou mélangée à amande douce
Effet : peau nourrie, tonifiée et revitalisée.
RECETTE,
			],

			'precautions' => [
				"Ne pas utiliser sur une peau sensible ou irritée.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Cumin',
			'latin' => 'Nigella sativa',
			'description' => <<<TEXT
L’huile végétale de Cumin (Nigelle) est une huile traditionnelle
reconnue pour ses puissantes propriétés purifiantes,
apaisantes et fortifiantes.

Riche en acides gras essentiels et en thymoquinone, elle
soutient l’immunité, améliore la qualité de la peau, réduit
les imperfections et renforce les cheveux. Très polyvalente,
elle convient particulièrement aux peaux mixtes, grasses
ou sujettes aux irritations.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Épices',

			'images' => [
				'cumin-1.jpg',
				'cumin-2.jpg',
				'cumin-3.jpg',
			],

			'bienfaits' => [
				"Peau\n- Purifie et équilibre la production de sébum\n- Réduit les imperfections et points noirs\n- Apaise rougeurs et irritations\n- Idéale pour peaux mixtes, grasses ou acnéiques",

				"Anti-Inflammatoire Naturelle\n- Calme les inflammations cutanées\n- Aide en cas d’eczéma léger ou psoriasis doux\n- Apaise démangeaisons et irritations",

				"Cheveux & Cuir Chevelu\n- Réduit la chute de cheveux\n- Fortifie les racines\n- Apaise les cuirs chevelus sensibles\n- Apporte brillance et tonus",

				"Immunité & Vitalité (usage externe)\n- Stimule la circulation locale\n- Apporte chaleur et énergie\n- Tonique pour le corps",
			],

			'recettes' => [
				<<<RECETTE
Soin Anti-Imperfections
Usage : application locale
Mélange :
- 2 gouttes huile de cumin (nigelle)
- Optionnel : 1 goutte HE Tea Tree
Effet : purifie la peau et réduit les boutons.
RECETTE,

				<<<RECETTE
Huile Anti-Chute Cheveux
Usage : cuir chevelu
Mélange :
- 1 c. à soupe huile de cumin (nigelle)
- 1 c. à café huile de ricin (optionnel)
Effet : stimule la pousse et renforce les racines.
RECETTE,

				<<<RECETTE
Soin Peau Sensible & Rougeurs
Usage : le soir
Mélange :
- 3 gouttes huile de cumin
- 1 goutte huile de jojoba (optionnel)
Effet : apaise, régule et renforce la barrière cutanée.
RECETTE,

				<<<RECETTE
Huile Tonique Corps
Usage : massage
Mélange :
- Huile de cumin pure ou diluée dans huile d’amande douce
Effet : redonne énergie et soulage les tensions musculaires.
RECETTE,

				<<<RECETTE
Masque Cuir Chevelu Purifiant
Usage : 1 fois par semaine
Mélange :
- 1 c. à soupe huile de cumin
- 1 c. à soupe huile de coco
Effet : apaise les irritations et purifie le cuir chevelu.
RECETTE,
			],

			'precautions' => [
				"Ne pas utiliser sur une peau sensible ou irritée.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Fenugrec',
			'latin' => 'Trigonella foenum-graecum',
			'description' => <<<TEXT
L’huile végétale de Fenugrec est traditionnellement utilisée
pour son effet raffermissant, galbant et nourrissant.

Riche en phyto-nutriments, vitamines et protéines végétales,
elle stimule naturellement la tonicité des tissus, favorise
le galbe naturel (poitrine, hanches, fessiers) et nourrit
profondément la peau. Elle est également appréciée pour
renforcer les cheveux et apaiser les irritations cutanées.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Épices',

			'images' => [
				'fenugrec-1.jpg',
				'fenugrec-2.jpg',
				'fenugrec-3.jpg',
			],

			'bienfaits' => [
				"Raffermissante & Galbante\n- Tonifie les tissus cutanés\n- Favorise le galbe naturel (poitrine, hanches, fessiers)\n- Améliore l’élasticité de la peau\n- Très utilisée dans les soins féminins orientaux",

				"Nourrissante & Régénérante\n- Hydrate en profondeur\n- Adoucit et assouplit la peau\n- Riche en vitamines A, B, D et en acides gras essentiels",

				"Cheveux\n- Renforce la fibre capillaire\n- Stimule la pousse\n- Réduit la casse\n- Apporte brillance et douceur",

				"Confort Cutané\n- Apaise les irritations\n- Aide à réduire les rougeurs\n- Idéale pour peaux sèches ou sensibles",
			],

			'recettes' => [
				<<<RECETTE
Soin Galbant Poitrine
Usage : massage circulaire quotidien
Mélange :
- 1 c. à café huile de fenugrec pure
Effet : améliore la tonicité et le galbe naturel.
RECETTE,

				<<<RECETTE
Huile Raffermissante Corps
Usage : cuisses, fessiers, ventre
Mélange :
- Huile de fenugrec pure
- Optionnel : 1 goutte HE Géranium ou Ylang-Ylang
Effet : peau plus tonique, ferme et lisse.
RECETTE,

				<<<RECETTE
Masque Cheveux Fortifiant
Usage : racines et longueurs
Mélange :
- 1 c. à soupe huile de fenugrec
- 1 c. à soupe huile de ricin
Effet : stimule la pousse et renforce les cheveux.
RECETTE,

				<<<RECETTE
Soin Peau Sèche & Sensible
Usage : visage ou zones localisées
Mélange :
- 3 gouttes huile de fenugrec
Effet : apaise, nourrit et adoucit la peau.
RECETTE,

				<<<RECETTE
Huile de Massage Relaxante & Tonique
Usage : massage corps
Mélange :
- Huile de fenugrec pure ou diluée dans huile d’amande douce
Effet : détente musculaire, chaleur et tonification.
RECETTE,
			],

			'precautions' => [
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Ne pas utiliser sur une peau sensible ou irritée.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Ail',
			'latin' => 'Allium sativum',
			'description' => <<<TEXT
L’huile végétale d’Ail est connue dans la tradition comme
un puissant fortifiant naturel.

Riche en composés soufrés, vitamines et antioxydants,
elle stimule la pousse des cheveux, purifie le cuir chevelu
et renforce les racines. Elle est également utilisée pour
ses propriétés purifiantes et protectrices sur la peau.
C’est une huile très active, à utiliser préférentiellement
en mélange.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Plantes',

			'images' => [
				'ail-1.jpg',
				'ail-2.jpg',
				'ail-3.jpg',
			],

			'bienfaits' => [
				"Cheveux & Cuir Chevelu\n- Stimule la pousse des cheveux\n- Fortifie les racines\n- Réduit la chute de cheveux\n- Assainit le cuir chevelu (pellicules, démangeaisons)\n- Améliore la densité et l’épaisseur",

				"Purifiante pour la Peau\n- Aide à réduire les imperfections\n- Purifie les zones sujettes aux boutons\n- Soutient la réparation cutanée",

				"Ongles\n- Renforce les ongles cassants\n- Aide à protéger des champignons (usage externe)\n- Nourrit les cuticules",

				"Protection & Vitalité\n- Riche en antioxydants\n- Tonifie les tissus\n- Stimule la microcirculation locale",
			],

			'recettes' => [
				<<<RECETTE
Soin Anti-Chute Cheveux
Usage : cuir chevelu
Mélange :
- 1 c. à café huile d’ail
- 1 c. à café huile de nigelle
- 1 c. à café huile de ricin
Effet : stimule la pousse et renforce les racines.
RECETTE,

				<<<RECETTE
Masque Cheveux Fortifiant
Usage : avant shampoing
Mélange :
- 1 c. à soupe huile d’ail
- 1 c. à soupe huile de coco
Effet : nourrit, purifie et renforce les cheveux.
RECETTE,

				<<<RECETTE
Soin Purifiant Peau
Usage : uniquement dilué
Mélange :
- 1 goutte huile d’ail
- 1 c. à café huile de jojoba
Effet : aide à réduire boutons et imperfections.
RECETTE,

				<<<RECETTE
Soin Ongles Cassants
Usage : 3 à 4 fois par semaine
Mélange :
- 2 gouttes huile d’ail
- 2 gouttes huile d’argan
Effet : renforce les ongles et assainit les cuticules.
RECETTE,

				<<<RECETTE
Huile Chauffante Massage Local
Usage : zones froides ou tendues
Mélange :
- 1 c. à café huile d’ail
- 1 c. à soupe huile d’amande douce
Effet : stimule la circulation locale et tonifie.
RECETTE,
			],

			'precautions' => [
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Ne pas utiliser sur une peau sensible ou irritée.",
				"Toujours utiliser diluée (huile très active).",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Moringa',
			'latin' => 'Moringa oleifera',
			'description' => <<<TEXT
L’huile végétale de Moringa, aussi appelée huile de Ben,
est une huile précieuse riche en vitamines A, B, C et E
ainsi qu’en acides gras essentiels.

Protectrice, antioxydante et ultra nourrissante,
elle convient à tous types de peau, en particulier
les peaux sèches, matures et déshydratées.
Sa grande stabilité à l’oxydation en fait une huile
idéale pour le visage, le corps et les cheveux.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Plantes',

			'images' => [
				'moringa-1.jpg',
				'moringa-2.jpg',
				'moringa-3.jpg',
			],

			'bienfaits' => [
				"Peau\n- Hydrate intensément\n- Protège de la déshydratation\n- Améliore la fermeté et l’élasticité\n- Apaise rougeurs et irritations\n- Convient aux peaux sèches, matures, mixtes et sensibles",

				"Anti-Âge & Antioxydante\n- Riche en vitamine E\n- Combat les radicaux libres\n- Aide à prévenir rides et relâchement\n- Soutient le renouvellement cellulaire",

				"Cheveux & Cuir Chevelu\n- Nourrit en profondeur\n- Apporte brillance et douceur\n- Fortifie les racines\n- Apaise le cuir chevelu sec\n- Idéale pour cheveux secs, abîmés ou cassants",

				"Corps\n- Assouplit et adoucit la peau\n- Protège des agressions extérieures\n- Excellent soin après-soleil",
			],

			'recettes' => [
				<<<RECETTE
Soin Visage Haute Nutrition
Usage : matin ou soir
Mélange :
- 3 gouttes d’huile de moringa pure
Effet : hydrate, lisse et illumine le teint.
RECETTE,

				<<<RECETTE
Sérum Anti-Âge Quotidien
Usage : soir
Mélange :
- 2 gouttes moringa
- 1 goutte rose musquée
Effet : peau plus ferme et régénérée.
RECETTE,

				<<<RECETTE
Masque Cheveux Réparateur
Usage : longueurs et pointes
Mélange :
- 1 c. à soupe huile de moringa
- (Optionnel : 1 goutte Ylang-Ylang)
Effet : nourrit, renforce et apporte brillance.
RECETTE,

				<<<RECETTE
Huile Corps Protection
Usage : après la douche
Mélange :
- Huile de moringa pure
Effet : peau douce, souple et durablement hydratée.
RECETTE,

				<<<RECETTE
Soin Cuir Chevelu Sec
Usage : massage du cuir chevelu
Mélange :
- 1 c. à café moringa
- 1 c. à café avocat (optionnel)
Effet : apaise et nourrit le cuir chevelu.
RECETTE,
			],

			'precautions' => [
				"Conserver à l’abri de la chaleur et de la lumière.",
				"Usage externe uniquement.",
			],
		],
		[
			'name' => 'Nigelle',
			'latin' => 'Nigella sativa',
			'description' => <<<TEXT
L’huile végétale de Nigelle est une huile traditionnelle
aux propriétés purifiantes, apaisantes et fortifiantes.

Riche en acides gras essentiels et en thymoquinone,
elle soutient la peau, les cheveux et le bien-être global.
Très appréciée pour les peaux à imperfections et
les cuirs chevelus sensibles, elle est utilisée depuis
des siècles pour ses vertus protectrices et réparatrices.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Herbacées / Aromatiques',

			'images' => [
				'nigelle-1.jpg',
				'nigelle-2.jpg',
				'nigelle-3.jpg',
			],

			'bienfaits' => [
				"Peau à Imperfections\n- Purifie et régule le sébum\n- Réduit boutons et points noirs\n- Apaise rougeurs et inflammations\n- Convient aux peaux mixtes à grasses",

				"Peau Sensible & Réactive\n- Anti-inflammatoire naturelle\n- Apaise démangeaisons et irritations\n- Aide en cas d’eczéma léger ou psoriasis doux",

				"Cheveux & Cuir Chevelu\n- Réduit la chute de cheveux\n- Fortifie les racines\n- Apaise les cuirs chevelus irrités\n- Aide à lutter contre les pellicules",

				"Protection & Équilibre\n- Riche en antioxydants\n- Protège la peau des agressions extérieures\n- Aide à renforcer la barrière cutanée",
			],

			'recettes' => [
				<<<RECETTE
Soin Anti-Imperfections
Usage : application locale
Mélange :
- 2 gouttes huile de nigelle
- (Optionnel : 1 goutte Tea tree)
Effet : purifie et aide à résorber les boutons.
RECETTE,

				<<<RECETTE
Soin Apaisant Peau Sensible
Usage : soir
Mélange :
- 3 gouttes nigelle
- 1 goutte jojoba (optionnel)
Effet : apaise rougeurs et inconforts.
RECETTE,

				<<<RECETTE
Huile Anti-Chute Cheveux
Usage : cuir chevelu
Mélange :
- 1 c. à soupe nigelle
- 1 c. à café ricin
Effet : stimule la pousse et renforce les racines.
RECETTE,

				<<<RECETTE
Masque Cuir Chevelu Purifiant
Usage : 1 fois/semaine
Mélange :
- 1 c. à soupe nigelle
- 1 c. à soupe coco
Effet : apaise, purifie et nourrit le cuir chevelu.
RECETTE,

				<<<RECETTE
Huile Corps Protectrice
Usage : massage
Mélange :
- Nigelle pure ou diluée dans amande douce
Effet : peau nourrie, protégée et apaisée.
RECETTE,
			],

			'precautions' => [
				"Ne pas utiliser sur une peau sensible ou irritée.",
				"Déconseillée aux femmes enceintes, allaitantes.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Oignon',
			'latin' => 'Allium cepa',
			'description' => <<<TEXT
L’huile d’Oignon est reconnue pour ses propriétés fortifiantes,
purifiantes et stimulantes.

Riche en composés soufrés, antioxydants et vitamines,
elle est particulièrement utilisée pour stimuler la pousse
des cheveux, renforcer les racines et assainir le cuir chevelu.
En soin cutané, elle aide à purifier la peau et à soutenir
la régénération.

Son odeur caractéristique s’atténue fortement
lorsqu’elle est utilisée en mélange.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Plantes',

			'images' => [
				'oignon-1.jpg',
				'oignon-2.jpg',
				'oignon-3.jpg',
			],

			'bienfaits' => [
				"Cheveux & Cuir Chevelu\n- Stimule la pousse des cheveux\n- Renforce les racines\n- Réduit la chute\n- Assainit le cuir chevelu\n- Aide à lutter contre pellicules et démangeaisons",

				"Fortifiante & Stimulante\n- Active la microcirculation locale\n- Tonifie les tissus\n- Soutient la vitalité capillaire",

				"Peau\n- Purifiante\n- Aide à réduire les imperfections\n- Soutient la réparation cutanée (usage dilué)",

				"Ongles\n- Renforce les ongles fragiles\n- Aide à prévenir la casse\n- Nourrit les cuticules",
			],

			'recettes' => [
				<<<RECETTE
Soin Anti-Chute & Pousse
Usage : cuir chevelu
Mélange :
- 1 c. à café huile d’oignon
- 1 c. à café huile de ricin
- 1 c. à café huile de nigelle
Effet : stimule la pousse et fortifie les racines.
RECETTE,

				<<<RECETTE
Masque Cheveux Fortifiant
Usage : avant shampoing
Mélange :
- 1 c. à soupe huile d’oignon
- 1 c. à soupe huile de coco
Effet : nourrit, renforce et assainit le cuir chevelu.
RECETTE,

				<<<RECETTE
Soin Cuir Chevelu Purifiant
Usage : massage local
Mélange :
- 1 c. à café huile d’oignon
- 1 c. à soupe huile d’amande douce
Effet : apaise démangeaisons et purifie.
RECETTE,

				<<<RECETTE
Soin Ongles Fortifiants
Usage : 3 fois/semaine
Mélange :
- 2 gouttes huile d’oignon
- 2 gouttes huile d’argan
Effet : ongles plus résistants et cuticules nourries.
RECETTE,

				<<<RECETTE
Huile Corps Tonifiante (locale)
Usage : zones ciblées
Mélange :
- 1 c. à café huile d’oignon
- 1 c. à soupe huile de soja ou amande douce
Effet : stimule la circulation locale et tonifie.
RECETTE,
			],

			'precautions' => [
				"Déconseillée aux femmes enceintes, allaitantes.",
				"Ne pas utiliser sur une peau sensible ou irritée.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Pépins de Courge',
			'latin' => 'Cucurbita pepo',
			'description' => <<<TEXT
L’huile végétale de Pépins de Courge est une huile riche,
nutritive et fortifiante, reconnue pour ses bienfaits sur
les cheveux, la peau et le bien-être global.

Naturellement riche en zinc, phytostérols et acides gras
essentiels, elle soutient la vitalité capillaire, renforce
la peau et aide à préserver l’équilibre cutané.

Sa texture nourrissante en fait une excellente huile
de soin ciblé.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Plantes',

			'images' => [
				'pepins-courge-1.jpg',
				'pepins-courge-2.jpg',
				'pepins-courge-3.jpg',
			],

			'bienfaits' => [
				"Cheveux & Cuir Chevelu\n- Fortifie les racines\n- Aide à freiner la chute des cheveux\n- Stimule la pousse\n- Apaise les cuirs chevelus sensibles\n- Particulièrement adaptée aux cheveux fins ou clairsemés",

				"Peau\n- Nourrit et protège la peau\n- Aide à maintenir l’élasticité cutanée\n- Apaise les peaux sèches ou fragilisées\n- Riche en antioxydants naturels",

				"Anti-Âge & Protection\n- Riche en phytostérols\n- Protège la peau du vieillissement prématuré\n- Soutient la régénération cutanée",

				"Ongles\n- Renforce les ongles cassants\n- Nourrit les cuticules\n- Aide à prévenir le dédoublement",
			],

			'recettes' => [
				<<<RECETTE
Soin Anti-Chute Cheveux
Usage : cuir chevelu
Mélange :
- 1 c. à soupe huile de pépins de courge
- 1 c. à café huile de ricin
Effet : renforce les racines et stimule la pousse.
RECETTE,

				<<<RECETTE
Masque Cheveux Fortifiant
Usage : longueurs et racines
Mélange :
- 1 c. à soupe courge
- 1 c. à soupe huile de nigelle
Effet : cheveux plus forts, plus denses et brillants.
RECETTE,

				<<<RECETTE
Soin Peau Nourrissant
Usage : soir
Mélange :
- 3 gouttes huile de pépins de courge
- (Optionnel : 1 goutte huile d’argan)
Effet : nourrit et protège la peau.
RECETTE,

				<<<RECETTE
Huile Ongles & Cuticules
Usage : quotidien
Mélange :
- 2 gouttes huile de pépins de courge
- Masser ongles et cuticules
Effet : ongles plus solides et mieux nourris.
RECETTE,

				<<<RECETTE
Huile Corps Fortifiante
Usage : massage
Mélange :
- Huile de pépins de courge pure ou diluée dans amande douce
Effet : peau nourrie, protégée et revitalisée.
RECETTE,
			],

			'precautions' => [
				"À éviter sur peau grasse.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Sésame',
			'latin' => 'Sesamum indicum',
			'description' => <<<TEXT
L’huile végétale de Sésame est une huile ancestrale,
nourrissante et protectrice, très utilisée dans les
rituels ayurvédiques et orientaux.

Riche en acides gras essentiels, vitamine E et
antioxydants naturels (sésamol, sésamine),
elle protège la peau, soutient la régénération
cutanée et favorise l’élimination des toxines.

Sa texture enveloppante en fait une excellente
huile de massage.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Plantes',

			'images' => [
				'sesame-1.jpg',
				'sesame-2.jpg',
				'sesame-3.jpg',
			],

			'bienfaits' => [
				"Peau\n- Nourrit et protège la peau\n- Renforce la barrière cutanée\n- Apaise les peaux sèches et sensibles\n- Protège des agressions extérieures (froid, vent, pollution)",

				"Détox & Massage\n- Favorise l’élimination des toxines (massage)\n- Stimule la circulation\n- Idéale pour massages drainants et relaxants",

				"Anti-Âge Naturelle\n- Riche en antioxydants\n- Aide à prévenir le vieillissement cutané\n- Améliore l’élasticité et la souplesse de la peau",

				"Cheveux\n- Nourrit les cheveux secs\n- Apaise le cuir chevelu\n- Apporte brillance et douceur",
			],

			'recettes' => [
				<<<RECETTE
Massage Détoxifiant
Usage : massage du corps
Mélange :
- Huile de sésame pure
Effet : élimination des toxines et détente profonde.
RECETTE,

				<<<RECETTE
Huile Corps Protectrice
Usage : quotidien
Mélange :
- Huile de sésame pure
Effet : peau nourrie, protégée et souple.
RECETTE,

				<<<RECETTE
Soin Peau Sèche & Sensible
Usage : soir
Mélange :
- 3 gouttes huile de sésame
- (Optionnel : 1 goutte Lavande vraie)
Effet : apaise et nourrit la peau.
RECETTE,

				<<<RECETTE
Bain d’Huile Capillaire
Usage : avant shampoing
Mélange :
- 1 c. à soupe sésame
- (Optionnel : 1 goutte Ylang-Ylang)
Effet : nourrit les cheveux et apaise le cuir chevelu.
RECETTE,

				<<<RECETTE
Huile Après-Soleil
Usage : peau échauffée
Mélange :
- 1 c. à café huile de sésame
- 1 goutte Lavande vraie (optionnel)
Effet : apaise et protège la peau.
RECETTE,
			],

			'precautions' => [
				"Peut être comédogène pour les peaux grasses.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Pois Chiches',
			'latin' => 'Cicer arietinum',
			'description' => <<<TEXT
L’huile de Pois Chiches est traditionnellement utilisée
dans les soins naturels pour renforcer les cheveux,
améliorer leur texture et favoriser une pousse saine.

Riche en protéines végétales, vitamines et minéraux,
elle nourrit le cuir chevelu, fortifie la fibre
capillaire et apporte douceur et brillance.

En soin cutané, elle aide à adoucir la peau et à
préserver son équilibre naturel.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Plantes',

			'images' => [
				'pois-chiches-1.jpg',
				'pois-chiches-2.jpg',
				'pois-chiches-3.jpg',
			],

			'bienfaits' => [
				"Cheveux & Cuir Chevelu\n- Renforce la fibre capillaire\n- Aide à réduire la casse\n- Favorise une pousse plus forte\n- Nourrit le cuir chevelu\n- Apporte brillance et douceur\n- Idéale pour cheveux secs, ternes ou fragiles",

				"Fortifiante Naturelle\n- Riche en protéines végétales\n- Apporte structure et résistance aux cheveux\n- Améliore la qualité des longueurs",

				"Peau\n- Adoucit et assouplit la peau\n- Aide à maintenir l’hydratation\n- Convient aux peaux normales à sèches",

				"Tradition & Beauté Naturelle\n- Très utilisée dans les rituels de beauté orientaux\n- Appréciée pour les soins capillaires naturels",
			],

			'recettes' => [
				<<<RECETTE
Soin Cheveux Fortifiant
Usage : cuir chevelu et longueurs
Mélange :
- 1 c. à soupe huile de pois chiches
- 1 c. à soupe huile de ricin ou coco
Effet : cheveux plus forts, nourris et brillants.
RECETTE,

				<<<RECETTE
Masque Capillaire Nourrissant
Usage : avant shampoing
Mélange :
- 1 c. à soupe huile de pois chiches
- 1 c. à soupe huile d’argan
Effet : nourrit intensément et renforce les cheveux.
RECETTE,

				<<<RECETTE
Soin Brillance Longueurs
Usage : pointes
Mélange :
- Quelques gouttes huile de pois chiches
Effet : douceur et éclat naturel.
RECETTE,

				<<<RECETTE
Huile Corps Adoucissante
Usage : après la douche
Mélange :
- Huile de pois chiches pure ou mélangée à amande douce
Effet : peau souple et confortable.
RECETTE,

				<<<RECETTE
Soin Cuir Chevelu Nourrissant
Usage : massage doux
Mélange :
- 1 c. à café huile de pois chiches
Effet : nourrit le cuir chevelu et améliore la vitalité capillaire.
RECETTE,
			],

			'precautions' => [
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Jojoba',
			'latin' => 'Simmondsia chinensis',
			'description' => <<<TEXT
L’huile végétale de Jojoba est en réalité une cire liquide
dont la composition est très proche du sébum humain.

Elle régule naturellement la production de sébum,
protège la peau de la déshydratation et convient à tous
les types de peau, y compris les peaux grasses, mixtes,
sensibles ou à imperfections.

Très stable à l’oxydation, elle est idéale pour le visage,
le corps et les cheveux.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '15ml',

			'category' => 'Huiles végétales',
			'gamme' => 'Plantes',

			'images' => [
				'jojoba-1.jpg',
				'jojoba-2.jpg',
				'jojoba-3.jpg',
			],

			'bienfaits' => [
				"Peau\n- Régule la production de sébum\n- Hydrate sans graisser\n- Protège et renforce la barrière cutanée\n- Apaise les peaux sensibles\n- Convient aux peaux grasses, mixtes, sèches et acnéiques",

				"Peau à Imperfections\n- Non comédogène\n- Aide à équilibrer la peau\n- Réduit brillances et inconforts",

				"Cheveux\n- Régule le cuir chevelu\n- Apaise les démangeaisons\n- Renforce les longueurs\n- Apporte brillance sans alourdir",

				"Ongles & Barbe\n- Fortifie les ongles\n- Assouplit les cuticules\n- Idéale pour les soins de la barbe",
			],

			'recettes' => [
				<<<RECETTE
Soin Visage Quotidien
Usage : matin ou soir
Mélange :
- 3 gouttes d’huile de jojoba pure
Effet : hydrate, régule et protège la peau.
RECETTE,

				<<<RECETTE
Soin Peau Grasse & Mixte
Usage : quotidien
Mélange :
- Huile de jojoba pure
Effet : régulation du sébum et peau équilibrée.
RECETTE,

				<<<RECETTE
Soin Cuir Chevelu
Usage : massage
Mélange :
- 1 c. à café huile de jojoba
Effet : apaise et régule le cuir chevelu.
RECETTE,

				<<<RECETTE
Soin Ongles & Cuticules
Usage : quotidien
Mélange :
- 2 gouttes jojoba
Effet : ongles plus forts et cuticules nourries.
RECETTE,

				<<<RECETTE
Base de Mélange pour Huiles Essentielles
Usage : support neutre
Mélange :
- Huile de jojoba + huiles essentielles
Effet : excellente tolérance et pénétration optimale.
RECETTE,
			],

			'precautions' => [
				"Éviter le contact avec les yeux.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Eau Florale Lavande',
			'latin' => 'Lavandula angustifolia',
			'description' => <<<TEXT
L’hydrolat de Lavande est une eau florale douce,
apaisante et purifiante, obtenue lors de la distillation
de la lavande vraie.

Très bien toléré, il convient à toute la famille
et s’utilise aussi bien pour la peau que pour le
bien-être émotionnel.

Rééquilibrant et calmant, il est idéal pour apaiser
la peau, rafraîchir le visage et favoriser la détente.

Odeur fraîche, florale, douce et herbacée.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '200ml',

			'category' => 'Hydrolats',
			'gamme' => 'Herbacées / Aromatiques',

			'images' => [
				'hydrolat-lavande-1.jpg',
				'hydrolat-lavande-2.jpg',
				'hydrolat-lavande-3.jpg',
			],

			'bienfaits' => [
				"Peau\n- Apaise les irritations et rougeurs\n- Purifie la peau en douceur\n- Équilibre les peaux mixtes à grasses\n- Aide à calmer les peaux sensibles ou réactives",

				"Peau à Imperfections\n- Aide à réduire boutons et inflammations\n- Nettoie et assainit sans dessécher\n- Convient aux peaux jeunes ou acnéiques",

				"Apaisant & Bien-Être\n- Calme le stress et les tensions légères\n- Favorise la détente\n- Idéal en brume relaxante",

				"Après-Soleil & Petits Bobos\n- Apaise la peau échauffée\n- Soulage les petites irritations, piqûres ou rougeurs",
			],

			'recettes' => [
				<<<RECETTE
Lotion Visage Apaisante
Usage : matin et soir
- Appliquer à l’aide d’un coton ou en brume
Effet : apaise, purifie et équilibre la peau.
RECETTE,

				<<<RECETTE
Brume Rafraîchissante
Usage : visage et corps
- Vaporiser selon besoin
Effet : rafraîchit, calme et détend.
RECETTE,

				<<<RECETTE
Soin Peau à Imperfections
Usage : local ou global
- Appliquer pur sur la peau propre
Effet : aide à assainir et calmer les boutons.
RECETTE,

				<<<RECETTE
Après-Soleil Naturel
Usage : peau échauffée
- Vaporiser généreusement
Effet : apaise rougeurs et sensation de chaleur.
RECETTE,

				<<<RECETTE
Brume Détente & Sommeil
Usage : oreiller ou linge
- Vaporiser légèrement
Effet : favorise relaxation et endormissement.
RECETTE,
			],

			'precautions' => [
				"Usage externe uniquement.",
				"Éviter le contact avec les yeux.",
				"Conserver au réfrigérateur après ouverture.",
				"Utiliser dans les 6 mois après ouverture.",
			],
		],
		[
			'name' => 'Eau Florale de Rose',
			'latin' => 'Rosa damascena',
			'description' => <<<TEXT
L’hydrolat de Rose est une eau précieuse, symbole
de beauté, de douceur et d’harmonie.

Obtenue par distillation des pétales de rose,
elle est reconnue pour ses propriétés hydratantes,
apaisantes et régénérantes.

Adaptée à tous les types de peau, elle est
particulièrement appréciée pour les peaux sèches,
sensibles ou matures.

Son parfum délicat et floral apporte bien-être,
douceur et réconfort émotionnel.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '200ml',

			'category' => 'Hydrolats',
			'gamme' => 'Fleurs',

			'images' => [
				'hydrolat-rose-1.jpg',
				'hydrolat-rose-2.jpg',
				'hydrolat-rose-3.jpg',
			],

			'bienfaits' => [
				"Peau\n- Hydrate et rafraîchit\n- Apaise les rougeurs et irritations\n- Adoucit et tonifie la peau\n- Convient aux peaux sensibles et délicates",

				"Anti-Âge & Régénérante\n- Tonifie les tissus cutanés\n- Aide à prévenir le vieillissement prématuré\n- Redonne éclat et élasticité\n- Idéale pour peaux matures ou fatiguées",

				"Éclat du Teint\n- Illumine le teint\n- Unifie la peau\n- Apporte un effet bonne mine naturel",

				"Bien-Être & Émotionnel\n- Apaise le stress et les tensions\n- Favorise la détente\n- Apporte douceur et réconfort émotionnel",
			],

			'recettes' => [
				<<<RECETTE
Lotion Visage Hydratante
Usage : matin et soir
- Appliquer à l’aide d’un coton ou en brume
Effet : hydrate, apaise et tonifie la peau.
RECETTE,

				<<<RECETTE
Brume Rafraîchissante & Apaisante
Usage : visage et corps
- Vaporiser selon besoin
Effet : rafraîchit et calme les sensations d’inconfort.
RECETTE,

				<<<RECETTE
Soin Anti-Âge Doux
Usage : avant le sérum ou la crème
- Vaporiser sur peau propre
Effet : prépare la peau et améliore l’absorption des soins.
RECETTE,

				<<<RECETTE
Masque Visage Naturel
Usage : 1 fois par semaine
Mélange :
- Hydrolat de rose + argile blanche
Effet : peau lumineuse, douce et revitalisée.
RECETTE,

				<<<RECETTE
Brume Bien-Être Émotionnel
Usage : visage, cou ou linge
- Vaporiser légèrement
Effet : apaise le mental et favorise l’harmonie.
RECETTE,
			],

			'precautions' => [
				"Usage externe uniquement.",
				"Éviter le contact avec les yeux.",
				"Conserver au réfrigérateur après ouverture.",
				"Utiliser dans les 6 mois après ouverture.",
			],
		],
		[
			'name' => "Eau Florale d'Orange Amère",
			'latin' => 'Citrus aurantium amara',
			'description' => <<<TEXT
L’hydrolat de Fleur d’Oranger, aussi appelée hydrolat
de Néroli, est une eau florale douce, réconfortante
et apaisante.

Obtenue par distillation des fleurs d’oranger amer,
elle est reconnue pour ses propriétés calmantes,
adoucissantes et harmonisantes.

Elle convient à tous les types de peau et à toute la
famille, et est particulièrement appréciée pour son
parfum floral délicat aux notes légèrement sucrées.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '200ml',

			'category' => 'Hydrolats',
			'gamme' => 'Agrumes',

			'images' => [
				'hydrolat-orange-amere-1.jpg',
				'hydrolat-orange-amere-2.jpg',
				'hydrolat-orange-amere-3.jpg',
			],

			'bienfaits' => [
				"Peau\n- Apaise et adoucit la peau\n- Hydrate et rafraîchit\n- Convient aux peaux sensibles et délicates\n- Aide à calmer les rougeurs",

				"Peau Sèche ou Terne\n- Redonne éclat et luminosité\n- Adoucit les peaux fatiguées\n- Favorise une peau plus souple",

				"Bien-Être & Émotionnel\n- Calme le stress et l’anxiété\n- Favorise la détente\n- Apporte réconfort et sérénité",

				"Sommeil\n- Aide à l’endormissement\n- Apaise l’agitation nerveuse\n- Idéale en brume du soir",
			],

			'recettes' => [
				<<<RECETTE
Lotion Visage Apaisante
Usage : matin et soir
- Appliquer à l’aide d’un coton ou en brume
Effet : apaise, hydrate et adoucit la peau.
RECETTE,

				<<<RECETTE
Brume Détente & Anti-Stress
Usage : visage, cou ou corps
- Vaporiser selon besoin
Effet : calme les tensions et favorise la relaxation.
RECETTE,

				<<<RECETTE
Brume Sommeil
Usage : oreiller ou linge de lit
- Vaporiser légèrement
Effet : prépare au sommeil et apaise l’esprit.
RECETTE,

				<<<RECETTE
Soin Peau Sèche & Sensible
Usage : avant la crème
- Vaporiser sur peau propre
Effet : adoucit et prépare la peau aux soins.
RECETTE,

				<<<RECETTE
Brume Bébé & Enfant
Usage : atmosphère ou peau (hors visage direct)
- Vaporiser légèrement
Effet : apaise, rassure et enveloppe en douceur.
RECETTE,
			],

			'precautions' => [
				"Usage externe uniquement.",
				"Éviter le contact avec les yeux.",
				"Conserver au réfrigérateur après ouverture.",
				"Utiliser dans les 6 mois après ouverture.",
			],
		],
		[
			'name' => 'Hydrolat de Romarin',
			'latin' => 'Rosmarinus officinalis',
			'description' => <<<TEXT
L’hydrolat de Romarin est une eau florale tonifiante,
purifiante et stimulante.

Obtenu par distillation des sommités fleuries de
romarin, il est reconnu pour ses bienfaits sur la
peau, les cheveux et la vitalité mentale.

Rafraîchissant et clarifiant, il est particulièrement
apprécié pour les peaux mixtes à grasses et les
cuirs chevelus fatigués.
Odeur fraîche, herbacée, aromatique et tonique.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '200ml',

			'category' => 'Hydrolats',
			'gamme' => 'Aiguilles',

			'images' => [
				'hydrolat-romarin-1.jpg',
				'hydrolat-romarin-2.jpg',
				'hydrolat-romarin-3.jpg',
			],

			'bienfaits' => [
				"Peau\n- Purifie et assainit la peau\n- Resserre les pores\n- Régule l’excès de sébum\n- Idéal pour peaux mixtes à grasses",

				"Peau à Imperfections\n- Aide à réduire boutons et brillances\n- Nettoie la peau en douceur\n- Apporte une sensation de fraîcheur",

				"Cheveux & Cuir Chevelu\n- Stimule le cuir chevelu\n- Aide à freiner la chute des cheveux\n- Apporte vitalité et brillance\n- Convient aux cheveux fins ou gras",

				"Tonus & Clarté Mentale\n- Revitalisant et stimulant\n- Aide à la concentration\n- Apporte un effet coup de frais",
			],

			'recettes' => [
				<<<RECETTE
Lotion Visage Purifiante
Usage : matin et soir
- Appliquer à l’aide d’un coton ou en brume
Effet : nettoie, purifie et resserre les pores.
RECETTE,

				<<<RECETTE
Brume Tonique du Matin
Usage : visage ou nuque
- Vaporiser au réveil
Effet : stimule, rafraîchit et dynamise.
RECETTE,

				<<<RECETTE
Soin Cuir Chevelu Stimulant
Usage : après shampoing
- Vaporiser directement sur le cuir chevelu
Effet : tonifie, fortifie et stimule la pousse.
RECETTE,

				<<<RECETTE
Eau de Rinçage Cheveux
Usage : après lavage
Mélange :
- Hydrolat de romarin + eau
Effet : cheveux plus brillants, légers et revitalisés.
RECETTE,

				<<<RECETTE
Brume Purifiante
Usage : visage ou atmosphère
- Vaporiser selon besoin
Effet : sensation de propreté, d’énergie et de clarté.
RECETTE,
			],

			'precautions' => [
				"Déconseillée aux enfants de moins de 3 ans.",
				"Usage externe uniquement.",
				"Éviter le contact avec les yeux.",
				"Conserver au réfrigérateur après ouverture.",
				"Utiliser dans les 6 mois après ouverture.",
			],
		],
		[
			'name' => 'Hydrolat de Menthe Verte',
			'latin' => 'Mentha spicata',
			'description' => <<<TEXT
L’hydrolat de Menthe Verte est une eau florale
rafraîchissante, purifiante et tonique.

Obtenu par distillation des feuilles de menthe verte,
il apporte une sensation immédiate de fraîcheur et
de légèreté.

Plus doux que l’hydrolat de menthe poivrée, il
convient à un usage quotidien pour la peau, le
cuir chevelu et le bien-être général.
Odeur fraîche, herbacée, douce et mentholée.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '200ml',

			'category' => 'Hydrolats',
			'gamme' => 'Herbacées / Aromatiques',

			'images' => [
				'hydrolat-menthe-verte-1.jpg',
				'hydrolat-menthe-verte-2.jpg',
				'hydrolat-menthe-verte-3.jpg',
			],

			'bienfaits' => [
				"Peau\n- Rafraîchit et tonifie la peau\n- Purifie en douceur\n- Resserre les pores\n- Convient aux peaux mixtes à grasses",

				"Peau Fatiguée & Terne\n- Redonne éclat et vitalité\n- Réveille le teint\n- Idéal en brume du matin",

				"Apaisant & Confort\n- Apaise les échauffements légers\n- Calme les sensations d’inconfort\n- Idéal en été ou après le soleil",

				"Bien-Être & Clarté\n- Apporte une sensation de fraîcheur mentale\n- Aide à la concentration\n- Effet tonique et stimulant léger",
			],

			'recettes' => [
				<<<RECETTE
Brume Rafraîchissante Visage
Usage : selon besoin
- Vaporiser sur le visage ou le corps
Effet : rafraîchit et tonifie la peau.
RECETTE,

				<<<RECETTE
Lotion Peau Mixte à Grasse
Usage : matin et soir
- Appliquer à l’aide d’un coton
Effet : purifie et équilibre la peau.
RECETTE,

				<<<RECETTE
Brume Tonique du Matin
Usage : visage ou nuque
- Vaporiser au réveil
Effet : coup de frais et réveil en douceur.
RECETTE,

				<<<RECETTE
Après-Soleil Apaisant
Usage : peau échauffée
- Vaporiser généreusement
Effet : apaise et rafraîchit.
RECETTE,

				<<<RECETTE
Brume Bien-Être & Concentration
Usage : visage ou atmosphère
- Vaporiser légèrement
Effet : sensation de clarté et d’énergie douce.
RECETTE,
			],

			'precautions' => [
				"Usage externe uniquement.",
				"Éviter le contact avec les yeux.",
				"Déconseillée aux enfants de moins de 3 ans.",
				"Conserver au réfrigérateur après ouverture.",
				"Utiliser dans les 6 mois après ouverture.",
			],
		],
		[
			'name' => 'Hydrolat de Camomille',
			'latin' => 'Matricaria recutita',
			'description' => <<<TEXT
L’hydrolat de Camomille est une eau florale
douce, apaisante et calmante, particulièrement
adaptée aux peaux sensibles, réactives ou irritées.

Obtenu par distillation des fleurs de camomille,
il est reconnu pour ses propriétés anti-inflammatoires
naturelles et son action calmante sur la peau
comme sur les émotions.

Très bien toléré, il convient à toute la famille.
Odeur douce, florale et légèrement herbacée.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '200ml',

			'category' => 'Hydrolats',
			'gamme' => 'Fleurs',

			'images' => [
				'hydrolat-camomille-1.jpg',
				'hydrolat-camomille-2.jpg',
				'hydrolat-camomille-3.jpg',
			],

			'bienfaits' => [
				"Peau Sensible & Réactive\n- Apaise les rougeurs et irritations\n- Calme les démangeaisons\n- Adoucit la peau\n- Idéal pour peaux fragiles, atopiques ou sujettes aux inconforts",

				"Peau Sèche & Irritée\n- Hydrate en douceur\n- Réduit la sensation de tiraillement\n- Soutient la réparation cutanée",

				"Contour des Yeux\n- Apaise les yeux fatigués ou irrités\n- Aide à décongestionner\n- Convient aux yeux sensibles",

				"Bien-Être & Émotionnel\n- Calme les tensions nerveuses\n- Apaise l’agitation émotionnelle\n- Favorise la détente et le réconfort",
			],

			'recettes' => [
				<<<RECETTE
Lotion Visage Apaisante
Usage : matin et soir
- Appliquer à l’aide d’un coton ou en brume
Effet : calme, adoucit et protège la peau.
RECETTE,

				<<<RECETTE
Soin Peau Irritée
Usage : zones sensibles
- Vaporiser directement ou appliquer en compresse
Effet : réduit rougeurs et inconforts.
RECETTE,

				<<<RECETTE
Contour des Yeux
Usage : compresses
- Imbiber des cotons et poser quelques minutes
Effet : apaise yeux fatigués et sensibles.
RECETTE,

				<<<RECETTE
Brume Bébé & Enfant
Usage : visage ou corps (hors yeux)
- Vaporiser légèrement
Effet : apaise et rassure en douceur.
RECETTE,

				<<<RECETTE
Brume Détente & Sommeil
Usage : visage ou linge
- Vaporiser le soir
Effet : calme le mental et favorise l’endormissement.
RECETTE,
			],

			'precautions' => [
				"Usage externe uniquement.",
				"Éviter le contact avec les yeux.",
				"Conserver au réfrigérateur après ouverture.",
				"Utiliser dans les 6 mois après ouverture.",
			],
		],
		[
			'name' => 'Eau Florale de Géranium',
			'latin' => 'Pelargonium graveolens',
			'description' => <<<TEXT
L’hydrolat de Géranium est une eau florale
équilibrante, purifiante et tonifiante, très
appréciée pour les soins de la peau.

Obtenu par distillation des feuilles et fleurs
de géranium rosat, il aide à réguler le sébum,
resserrer les pores et redonner éclat au teint.

Son parfum floral, doux et légèrement rosé
apporte également une sensation de bien-être
et d’harmonie émotionnelle.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '200ml',

			'category' => 'Hydrolats',
			'gamme' => 'Fleurs',

			'images' => [
				'hydrolat-geranium-1.jpg',
				'hydrolat-geranium-2.jpg',
				'hydrolat-geranium-3.jpg',
			],

			'bienfaits' => [
				"Peau Mixte à Grasse\n- Régule la production de sébum\n- Resserre les pores\n- Purifie la peau en douceur\n- Idéal pour peaux mixtes, grasses ou à imperfections",

				"Peau Terne & Fatiguée\n- Tonifie et rafraîchit\n- Redonne éclat et luminosité\n- Améliore l’aspect général de la peau",

				"Peau Sensible\n- Apaise les légères rougeurs\n- Aide à rééquilibrer la peau\n- Convient aux peaux réactives (hors irritation sévère)",

				"Bien-Être & Émotionnel\n- Harmonise les émotions\n- Apporte sensation d’équilibre et de douceur\n- Aide à relâcher les tensions légères",
			],

			'recettes' => [
				<<<RECETTE
Lotion Visage Équilibrante
Usage : matin et soir
- Appliquer à l’aide d’un coton ou en brume
Effet : régule, purifie et rafraîchit la peau.
RECETTE,

				<<<RECETTE
Brume Tonique du Matin
Usage : visage ou cou
- Vaporiser au réveil
Effet : réveille le teint et apporte fraîcheur.
RECETTE,

				<<<RECETTE
Soin Peau à Imperfections
Usage : local ou global
- Appliquer pur sur peau propre
Effet : aide à équilibrer et purifier la peau.
RECETTE,

				<<<RECETTE
Brume Rafraîchissante & Bien-Être
Usage : visage ou corps
- Vaporiser selon besoin
Effet : sensation d’harmonie et de fraîcheur.
RECETTE,

				<<<RECETTE
Brume Après-Douche
Usage : corps
- Vaporiser après la toilette
Effet : peau tonifiée et délicatement parfumée.
RECETTE,
			],

			'precautions' => [
				"Usage externe uniquement.",
				"Éviter le contact avec les yeux.",
				"Déconseillée aux enfants de moins de 3 ans.",
				"Conserver au réfrigérateur après ouverture.",
				"Utiliser dans les 6 mois après ouverture.",
			],
		],
		[
			'name' => 'Hydrolat d’Origan',
			'latin' => 'Origanum vulgare',
			'description' => <<<TEXT
L’hydrolat d’Origan est une eau florale
puissante, purifiante et stimulante.

Obtenu par distillation des sommités fleuries
d’origan, il est reconnu pour ses propriétés
assainissantes et tonifiantes.

Plus doux que l’huile essentielle d’origan,
il reste néanmoins très actif et s’utilise
principalement en usage ciblé, notamment
pour les peaux à imperfections et en soutien
de l’immunité.

Odeur herbacée, puissante, chaude et aromatique.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '200ml',

			'category' => 'Hydrolats',
			'gamme' => 'Plantes',

			'images' => [
				'hydrolat-origan-1.jpg',
				'hydrolat-origan-2.jpg',
				'hydrolat-origan-3.jpg',
			],

			'bienfaits' => [
				"Peau à Imperfections\n- Purifie et assainit la peau\n- Aide à réduire boutons et inflammations\n- Convient aux peaux grasses ou à tendance acnéique",

				"Purifiant & Assainissant\n- Aide à nettoyer la peau en profondeur\n- Utile pour les zones sujettes aux bactéries\n- Soutient l’hygiène cutanée",

				"Tonus & Vitalité\n- Effet stimulant\n- Apporte énergie et dynamisme\n- Utile en période de fatigue",

				"Soutien Naturel (usage externe)\n- Traditionnellement utilisé pour accompagner les périodes hivernales\n- Aide à renforcer les défenses cutanées",
			],

			'recettes' => [
				<<<RECETTE
Lotion Purifiante Peau Grasse
Usage : local ou global
- Appliquer à l’aide d’un coton (dilué si peau sensible)
Effet : assainit et purifie la peau.
RECETTE,

				<<<RECETTE
Soin Local Boutons
Usage : application ciblée
- Appliquer pur sur la zone concernée
Effet : aide à réduire l’inflammation.
RECETTE,

				<<<RECETTE
Brume Tonique (diluée)
Usage : visage ou corps
- Diluer 50 % hydrolat + 50 % eau
Effet : stimule et rafraîchit.
RECETTE,

				<<<RECETTE
Soin Hygiène Cutanée
Usage : zones localisées
- Appliquer avec un coton
Effet : sensation de propreté et d’assainissement.
RECETTE,

				<<<RECETTE
Brume Purifiante Atmosphère
Usage : air ambiant
- Vaporiser légèrement
Effet : ambiance plus saine et fraîche.
RECETTE,
			],

			'precautions' => [
				"Usage externe uniquement.",
				"Ne pas utiliser en continu (cure courte).",
				"Ne pas utiliser sur une peau sensible ou irritée.",
				"Déconseillée aux enfants de moins de 6 ans.",
				"Éviter le contact avec les yeux.",
				"Conserver au réfrigérateur après ouverture.",
				"Utiliser dans les 6 mois après ouverture.",
			],
		],
		[
			'name' => 'Romarin',
			'latin' => 'Rosmarinus officinalis',
			'description' => <<<TEXT
Le romarin est une herbe aromatique emblématique
du bassin méditerranéen, reconnue depuis l’Antiquité
pour ses propriétés stimulantes, digestives et purifiantes.

Utilisé aussi bien en cuisine que dans les soins naturels,
il soutient la digestion, stimule l’énergie mentale
et contribue au bien-être général.

Son parfum herbacé, frais et puissant évoque
la vitalité et la clarté.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '100g',

			'category' => 'Herbes séchées',
			'gamme' => 'Aiguilles',

			'images' => [
				'romarin-seche-1.jpg',
				'romarin-seche-2.jpg',
				'romarin-seche-3.jpg',
			],

			'bienfaits' => [
				"Digestion\n- Stimule la digestion\n- Réduit les ballonnements\n- Aide en cas de digestion lente ou lourde\n- Favorise le confort digestif",

				"Tonus & Mémoire\n- Plante stimulante\n- Favorise la concentration et la clarté mentale\n- Aide à lutter contre la fatigue physique et intellectuelle",

				"Circulation & Détox\n- Stimule la circulation\n- Aide à éliminer les toxines\n- Soutient le foie et les fonctions d’élimination",

				"Immunité & Protection\n- Plante naturellement purifiante\n- Soutient l’organisme en période de fatigue ou de changement de saison",
			],

			'recettes' => [
				<<<RECETTE
Infusion Digestive
Usage : après les repas
Préparation :
- 1 c. à café de romarin séché
- Infuser 10 minutes dans une tasse d’eau chaude
Effet : facilite la digestion et réduit les ballonnements.
RECETTE,

				<<<RECETTE
Infusion Tonique
Usage : le matin ou en cas de fatigue
Préparation :
- Romarin + eau chaude
Effet : stimule l’énergie et la concentration.
RECETTE,

				<<<RECETTE
Bain Aromatique Revitalisant
Usage : bain
Préparation :
- Une poignée de romarin infusée dans de l’eau chaude
- Verser dans l’eau du bain
Effet : tonifiant et décontractant.
RECETTE,

				<<<RECETTE
Eau de Rinçage Cheveux
Usage : après shampoing
Préparation :
- Infusion de romarin refroidie
Effet : apporte brillance, fortifie les cheveux et stimule le cuir chevelu.
RECETTE,

				<<<RECETTE
Cuisine & Assaisonnement
Usage : plats salés
Utilisation :
- Viandes, légumes rôtis, pommes de terre, sauces
Effet : parfume les plats et facilite leur digestion.
RECETTE,
			],

			'precautions' => [
				"À consommer avec modération.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Lavande (Herbe)',
			'latin' => 'Lavandula angustifolia',
			'description' => <<<TEXT
La lavande est une herbe aromatique emblématique,
reconnue pour ses vertus apaisantes, relaxantes
et équilibrantes.

Utilisée depuis des siècles en infusion, en bain
ou en usage traditionnel, elle aide à calmer le stress,
favoriser le sommeil et apaiser les inconforts digestifs légers.

Son parfum floral doux et réconfortant en fait
une plante incontournable du bien-être naturel.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '60g',

			'category' => 'Herbes séchées',
			'gamme' => 'Herbacées / Aromatiques',

			'images' => [
				'lavande-sechee-1.jpg',
				'lavande-sechee-2.jpg',
				'lavande-sechee-3.jpg',
			],

			'bienfaits' => [
				"Relaxation & Stress\n- Plante calmante naturelle\n- Apaise les tensions nerveuses\n- Aide à réduire l’anxiété et l’agitation\n- Favorise la détente mentale",

				"Sommeil\n- Facilite l’endormissement\n- Améliore la qualité du sommeil\n- Idéale en infusion du soir",

				"Digestion\n- Apaise les spasmes digestifs légers\n- Réduit les ballonnements liés au stress\n- Favorise un confort digestif doux",

				"Bien-Être Général\n- Aide à retrouver équilibre et sérénité\n- Plante réconfortante en période de fatigue émotionnelle",
			],

			'recettes' => [
				<<<RECETTE
Infusion Relaxante
Usage : le soir
Préparation :
- 1 c. à café de fleurs de lavande séchées
- Infuser 5 à 10 minutes dans une tasse d’eau chaude
Effet : apaise le mental et favorise le sommeil.
RECETTE,

				<<<RECETTE
Infusion Anti-Stress
Usage : en journée
Préparation :
- Lavande seule ou associée à la verveine
Effet : calme les tensions et apporte sérénité.
RECETTE,

				<<<RECETTE
Bain Apaisant
Usage : bain
Préparation :
- Une poignée de lavande infusée dans de l’eau chaude
- Verser dans l’eau du bain
Effet : détente musculaire et relaxation profonde.
RECETTE,

				<<<RECETTE
Sachet Parfumé
Usage : armoire, oreiller
Préparation :
- Fleurs de lavande séchées dans un sachet
Effet : parfum naturel et ambiance relaxante.
RECETTE,

				<<<RECETTE
Cuisine & Infusion Aromatique
Usage : modéré
Utilisation :
- Infusions, desserts, miel aromatisé
Effet : apporte une note florale douce et digestive.
RECETTE,
			],

			'precautions' => [
				"À consommer avec modération.",
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Moringa Oleifera',
			'latin' => 'Moringa oleifera',
			'description' => <<<TEXT
Le moringa est une herbe aromatique exceptionnelle,
souvent surnommée « arbre de vie » en raison de sa
richesse nutritionnelle remarquable.

Utilisé traditionnellement en infusion ou en cuisine,
il est reconnu pour ses propriétés revitalisantes,
reminéralisantes et protectrices.

Riche en vitamines, minéraux, protéines végétales
et antioxydants, il soutient l’organisme, renforce
l’énergie et contribue au bien-être général.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '60g',

			'category' => 'Herbes séchées',
			'gamme' => 'Plantes',

			'images' => [
				'moringa-seche-1.jpg',
				'moringa-seche-2.jpg',
				'moringa-seche-3.jpg',
			],

			'bienfaits' => [
				"Vitalité & Énergie\n- Plante hautement nutritive\n- Aide à lutter contre la fatigue\n- Soutient l’énergie physique et mentale\n- Idéale en période de faiblesse ou de surmenage",

				"Immunité & Protection\n- Riche en antioxydants naturels\n- Soutient les défenses naturelles\n- Aide l’organisme à se protéger des agressions extérieures",

				"Détox & Équilibre\n- Soutient les fonctions d’élimination\n- Aide à purifier l’organisme\n- Contribue à l’équilibre général",

				"Nutrition Naturelle\n- Riche en vitamines A, C et E\n- Source de fer, calcium et protéines végétales\n- Soutient l’équilibre nutritionnel",
			],

			'recettes' => [
				<<<RECETTE
Infusion Revitalisante
Usage : matin ou journée
Préparation :
- 1 c. à café de feuilles de moringa séchées
- Infuser 5 à 10 minutes dans une tasse d’eau chaude
Effet : boost d’énergie et soutien général.
RECETTE,

				<<<RECETTE
Infusion Détox
Usage : cure courte
Préparation :
- Moringa seul ou associé à la menthe
Effet : aide à purifier et revitaliser l’organisme.
RECETTE,

				<<<RECETTE
Boisson Tonique
Usage : quotidien
Préparation :
- Infusion de moringa refroidie
- À boire dans la journée
Effet : hydratation et apport nutritif naturel.
RECETTE,

				<<<RECETTE
Usage Culinaire
Usage : cuisine
Utilisation :
- Soupes, sauces, plats mijotés (ajout en fin de cuisson)
Effet : enrichit les plats en nutriments essentiels.
RECETTE,

				<<<RECETTE
Bain Revitalisant
Usage : bain
Préparation :
- Infusion concentrée de moringa ajoutée à l’eau du bain
Effet : sensation de vitalité et détente corporelle.
RECETTE,
			],

			'precautions' => [
				"Déconseillée aux femmes enceintes et allaitantes.",
				"À consommer avec modération.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Tea Tree (Herbes à thé)',
			'latin' => 'Melaleuca alternifolia',
			'description' => <<<TEXT
L’arbre à thé, aussi appelé Tea Tree, est une plante
aromatique reconnue pour ses puissantes propriétés
purifiantes et protectrices.

Utilisé traditionnellement sous forme d’infusion
légère, de vapeur ou en usage externe, il est
apprécié pour soutenir l’hygiène naturelle,
purifier l’organisme et accompagner les périodes
de fatigue.

Son arôme frais et herbacé évoque la propreté,
la clarté et la vitalité.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '100g',

			'category' => 'Herbes séchées',
			'gamme' => 'Herbacées / Aromatiques',

			'images' => [
				'tea-tree-herbe-1.jpg',
				'tea-tree-herbe-2.jpg',
				'tea-tree-herbe-3.jpg',
			],

			'bienfaits' => [
				"Purification\n- Plante naturellement assainissante\n- Soutient l’hygiène interne (usage traditionnel)\n- Contribue à une sensation de propreté et de légèreté",

				"Immunité & Protection\n- Soutient les défenses naturelles\n- Utile en période hivernale ou de fatigue\n- Plante tonique et protectrice",

				"Respiration\n- Aide à dégager les voies respiratoires\n- Apporte une sensation de respiration plus libre\n- Utilisée en infusion légère ou inhalation végétale",

				"Tonus & Clarté\n- Apporte énergie et vitalité\n- Aide à retrouver concentration et dynamisme",
			],

			'recettes' => [
				<<<RECETTE
Infusion Purifiante Légère
Usage : occasionnel
Préparation :
- Quelques feuilles séchées de tea tree
- Infuser brièvement 3 à 5 minutes
Effet : sensation de purification et de légèreté.
RECETTE,

				<<<RECETTE
Inhalation Végétale
Usage : respiration
Préparation :
- Feuilles de tea tree dans un bol d’eau chaude
Effet : aide à dégager les voies respiratoires.
RECETTE,

				<<<RECETTE
Bain Aromatique Purifiant
Usage : bain
Préparation :
- Infusion concentrée de feuilles ajoutée à l’eau du bain
Effet : sensation de propreté et de revitalisation.
RECETTE,

				<<<RECETTE
Usage Externe Traditionnel
Usage : compresses
Préparation :
- Infusion refroidie appliquée sur la peau
Effet : aide à purifier et rafraîchir la peau.
RECETTE,

				<<<RECETTE
Mélange d’Herbes Purifiantes
Usage : infusion combinée
Association :
- Tea tree + thym ou romarin (faible dose)
Effet : soutien purifiant et tonifiant.
RECETTE,
			],

			'precautions' => [
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Déconseillée aux enfants de moins de 6 ans.",
				"À consommer avec modération.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],
		[
			'name' => 'Marjolaine',
			'latin' => 'Origanum majorana',
			'description' => <<<TEXT
La marjolaine est une herbe aromatique douce et
chaleureuse, traditionnellement utilisée pour
ses vertus calmantes, digestives et
rééquilibrantes.

Appréciée en infusion comme en cuisine, elle
aide à apaiser le stress, favoriser la digestion
et soutenir le bien-être général.

Son parfum délicat, herbacé et légèrement
sucré invite à la détente et à l’harmonie.
TEXT,
			'purchase_price' => 10,
			'margin' => 50,
			'sale_price' => 15,
			'contenance' => '100g',

			'category' => 'Herbes séchées',
			'gamme' => 'Plantes',

			'images' => [
				'marjolaine-herbe-1.jpg',
				'marjolaine-herbe-2.jpg',
				'marjolaine-herbe-3.jpg',
			],

			'bienfaits' => [
				"Relaxation & Stress\n- Plante calmante naturelle\n- Apaise les tensions nerveuses\n- Aide à réduire l’anxiété légère\n- Favorise la détente mentale et corporelle",

				"Sommeil\n- Aide à l’endormissement\n- Améliore la qualité du sommeil\n- Idéale en infusion du soir",

				"Digestion\n- Apaise les spasmes digestifs\n- Réduit ballonnements et inconforts\n- Favorise une digestion douce",

				"Bien-Être Général\n- Aide à retrouver équilibre et sérénité\n- Soutient le confort en période de fatigue nerveuse",
			],

			'recettes' => [
				<<<RECETTE
Infusion Relaxante
Usage : le soir
Préparation :
- 1 c. à café de marjolaine séchée
- Infuser 5 à 10 minutes dans une tasse d’eau chaude
Effet : calme le mental et favorise le sommeil.
RECETTE,

				<<<RECETTE
Infusion Digestive
Usage : après les repas
Préparation :
- Marjolaine seule ou associée à la menthe
Effet : facilite la digestion et réduit les ballonnements.
RECETTE,

				<<<RECETTE
Bain Apaisant
Usage : bain
Préparation :
- Une poignée de marjolaine infusée dans de l’eau chaude, verser dans le bain
Effet : détente musculaire et relaxation profonde.
RECETTE,

				<<<RECETTE
Cuisine & Assaisonnement
Usage : plats salés
Utilisation :
- Soupes, légumes, sauces, viandes blanches
Effet : parfume les plats et soutient la digestion.
RECETTE,

				<<<RECETTE
Tisane Confort & Sérénité
Usage : en journée
Préparation :
- Marjolaine + verveine ou camomille
Effet : apaise les tensions et favorise l’harmonie.
RECETTE,
			],

			'precautions' => [
				"Déconseillée aux femmes enceintes et allaitantes.",
				"Ne pas utiliser en continu (cure courte).",
				"À consommer avec modération.",
				"Conserver à l’abri de la chaleur et de la lumière.",
			],
		],

	];

	public function load(ObjectManager $manager): void
	{
		$categories = [];
		$gammes = [];
		$categoryImages = [
			'Herbes séchées'   => 'herbes-aromatiques-6934664e5b33b021807825.jpg',
			'Huiles essentielles' => 'huiles-essentielles-6934661dbcdac699813704.jpg',
			'Huiles végétales' => 'huiles-vegetales-6934663c7167e024090756.jpg',
			'Hydrolats'        => 'hydrolats-693466422ae57654307535.jpg',
		];
		$categoryDescriptions = [
			'Huiles essentielles' =>
			'Nos huiles essentielles sont 100 % pures et naturelles, extraites par distillation ou pression à froid. Elles sont idéales pour l’aromathérapie, le bien-être, les soins naturels et l’équilibre émotionnel.',

			'Huiles végétales' =>
			'Les huiles végétales nourrissent, protègent et réparent la peau et les cheveux. Riches en acides gras essentiels et vitamines, elles sont parfaites comme soin naturel ou base de mélange.',

			'Hydrolats' =>
			'Les hydrolats, aussi appelés eaux florales, sont doux et bien tolérés. Ils conviennent aux soins du visage, du corps et au bien-être quotidien, même pour les peaux sensibles.',

			'Herbes séchées' =>
			'Nos herbes séchées sont sélectionnées avec soin pour leurs vertus traditionnelles. Utilisées en infusion, cuisine ou rituel bien-être, elles accompagnent naturellement votre quotidien.',
		];

		foreach ($this->productsData as $data) {

			/** CATEGORY */
			if (!isset($categories[$data['category']])) {
				$category = new Category();
				$category->setName($data['category']);
				$category->setSlug($this->slugger->slug($data['category'])->lower());
				$category->setIsActive(true);
				$manager->persist($category);
				$categories[$data['category']] = $category;
			}
			// IMAGE DE CATÉGORIE
			if (isset($categoryImages[$data['category']])) {
				$category->setImage($categoryImages[$data['category']]);
			}
			// DESCRIPTION
			if (isset($categoryDescriptions[$data['category']])) {
				$category->setDescription($categoryDescriptions[$data['category']]);
			}

			/** GAMME */
			if (!isset($gammes[$data['gamme']])) {
				$gamme = new Gammes();
				$gamme->setName($data['gamme']);
				$gamme->setIsActive(true);
				$manager->persist($gamme);
				$gammes[$data['gamme']] = $gamme;
			}

			/** PRODUCT */
			$product = new Product();
			$product->setName($data['name']);
			$product->setSlug($this->slugger->slug($data['name'])->lower());
			$product->setDescription($data['description']);
			$product->setPurchasePrice($data['purchase_price']);
			$product->setMargin((string) $data['margin']);
			$product->setSalePrice($data['sale_price']);
			$product->setContenance($data['contenance']);
			$product->setStock(50);
			$product->setPrice(10);
			$product->setIsActive(true);
			$product->setCategory($categories[$data['category']]);
			$product->setGamme($gammes[$data['gamme']]);
			$manager->persist($product);

			/** BIENFAITS */
			foreach ($data['bienfaits'] as $text) {
				$b = new Bienfaits();
				$b->setDescription($text);
				$b->addProduct($product);
				$manager->persist($b);
			}

			/** RECETTES */
			foreach ($data['recettes'] as $text) {
				$r = new Recettes();
				$r->setDescription($text);
				$r->addProduct($product);
				$manager->persist($r);
			}

			/** PRECAUTIONS */
			foreach ($data['precautions'] as $text) {
				$p = new Precaution();
				$p->setDescription($text);
				$p->addProduct($product);
				$manager->persist($p);
			}

			$defaultImages = [
				'herbes-aromatiques-6934664e5b33b021807825.jpg',
				'huiles-essentielles-6934661dbcdac699813704.jpg',
				'huiles-vegetales-6934663c7167e024090756.jpg',
				'hydrolats-693466422ae57654307535.jpg',
			];
			$data['images'] = $defaultImages;

			/** IMAGES */
			foreach ($data['images'] as $i => $filename) {
				$img = new ProductImage();
				$img->setFilename($filename);
				$img->setAlt($product->getName());
				$img->setIsMain($i === 0);   // image principale
				$img->setPosition($i + 1);   // ordre 1 → 4
				$img->setProduct($product);

				$manager->persist($img);
			}
		}

		$manager->flush();
	}
}
