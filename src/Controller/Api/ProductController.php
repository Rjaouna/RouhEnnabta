<?php

namespace App\Controller\Api;

use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Repository\GammesRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/products')]
class ProductController extends AbstractController
{

	#[Route('', methods: ['GET'])]
	public function index(ProductRepository $repo): JsonResponse
	{
		$products = $repo->findAll();

		$data = array_map(function (Product $p) {

			// ✅ image principale par produit
			$mainImage = null;

			foreach ($p->getProductImages() as $img) {
				if ($img->isMain()) {
					$mainImage = $img->getFilename();
					break;
				}
			}

			return [
				'id' => $p->getId(),
				'name' => $p->getName(),
				'description' => $p->getDescription(),
				'purchasePrice' => $p->getPurchasePrice(),
				'margin' => $p->getMargin(),
				'salePrice' => $p->getSalePrice(),
				'stock' => $p->getStock(),
				'isActive' => $p->isActive(),
				'category' => $p->getCategory()?->getId(),
				'gamme' => $p->getGamme()?->getId(),
				'categoryName' => $p->getCategory()?->getName(),
				'gammeName' => $p->getGamme()?->getName(),

				// ✅ CE QUE TON JS ATTEND
				'mainImage' => $mainImage
			];
		}, $products);

		return $this->json($data);
	}


	#[Route('', methods: ['POST'])]
	public function create(
		Request $request,
		EntityManagerInterface $em,
		CategoryRepository $categoryRepo,
		GammesRepository $gammeRepo,
		SluggerInterface $slugger
	): JsonResponse {
		$data = json_decode($request->getContent(), true);

		$product = new Product();
		$product->setName($data['name']);

		// ✅ SLUG AUTO
		$slug = $slugger->slug($data['name'])->lower();
		$product->setSlug($slug);

		$product->setDescription($data['description']);
		$product->setPurchasePrice($data['purchasePrice']);
		$product->setMargin($data['margin']);

		// ✅ calcul prix de vente
		$salePrice = $data['purchasePrice'] + ($data['purchasePrice'] * $data['margin'] / 100);
		$product->setSalePrice($salePrice);

		$product->setStock($data['stock'] ?? 0);
		$product->setIsActive($data['isActive'] ?? true);

		if (!empty($data['category'])) {
			$product->setCategory($categoryRepo->find($data['category']));
		}

		if (!empty($data['gamme'])) {
			$product->setGamme($gammeRepo->find($data['gamme']));
		}

		$em->persist($product);
		$em->flush();

		return $this->json(['message' => 'Produit créé'], 201);
	}

	#[Route('/{id}', methods: ['PUT'])]
	public function update(
		int $id,
		Request $request,
		ProductRepository $repo,
		EntityManagerInterface $em,
		CategoryRepository $categoryRepo,
		GammesRepository $gammeRepo
	): JsonResponse {
		$product = $repo->find($id);

		if (!$product) {
			return $this->json(['error' => 'Produit introuvable'], 404);
		}

		$data = json_decode($request->getContent(), true);

		$product->setName($data['name']);
		$product->setSlug($data['slug']);
		$product->setDescription($data['description']);
		$product->setPurchasePrice($data['purchasePrice']);
		$product->setMargin($data['margin']);

		// recalcul prix
		$salePrice = $data['purchasePrice'] + ($data['purchasePrice'] * $data['margin'] / 100);
		$product->setSalePrice($salePrice);

		$product->setStock($data['stock']);
		$product->setIsActive($data['isActive']);

		$product->setCategory($categoryRepo->find($data['category']));
		$product->setGamme($gammeRepo->find($data['gamme']));

		$em->flush();

		return $this->json(['message' => 'Produit mis à jour']);
	}

	#[Route('/{id}', methods: ['DELETE'])]
	public function delete(
		int $id,
		ProductRepository $repo,
		EntityManagerInterface $em
	): JsonResponse {
		$product = $repo->find($id);

		if (!$product) {
			return $this->json(['error' => 'Produit introuvable'], 404);
		}

		$em->remove($product);
		$em->flush();

		return $this->json(['message' => 'Produit supprimé']);
	}

	// ===================== Search endpoint =====================

	#[Route('/search', methods: ['GET'])]
	public function search(
		Request $request,
		ProductRepository $repo
	): JsonResponse {
		$q = trim((string) $request->query->get('q'));

		if (strlen($q) < 2) {
			return $this->json([]);
		}

		$products = $repo->createQueryBuilder('p')
			->where('p.isActive = true')
			->andWhere('LOWER(p.name) LIKE :q')
			->setParameter('q', '%' . strtolower($q) . '%')
			->setMaxResults(5)
			->orderBy('p.name', 'ASC')
			->getQuery()
			->getResult();

		return $this->json(array_map(fn($p) => [
			'id'    => $p->getId(),
			'name'  => $p->getName(),
			'slug'  => $p->getSlug(),
			'price' => $p->getSalePrice(),
			'categorySlug' => $p->getCategory()?->getSlug(),
			'category' => $p->getCategory()?->getName(),
			'gamme'    => $p->getGamme()?->getName(),
		], $products));
	}
}
