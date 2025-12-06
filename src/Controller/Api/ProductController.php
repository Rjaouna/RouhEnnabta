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
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/products')]
class ProductController extends AbstractController
{
	#[Route('', methods: ['GET'])]
	public function index(ProductRepository $repo): JsonResponse
	{
		$products = $repo->findAll();

		$data = array_map(fn(Product $p) => [
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
		], $products);

		return $this->json($data);
	}

	#[Route('', methods: ['POST'])]
	public function create(
		Request $request,
		EntityManagerInterface $em,
		CategoryRepository $categoryRepo,
		GammesRepository $gammeRepo
	): JsonResponse {
		$data = json_decode($request->getContent(), true);

		$product = new Product();
		$product->setName($data['name']);
		$product->setSlug($data['slug']);
		$product->setDescription($data['description']);
		$product->setPurchasePrice($data['purchasePrice']);
		$product->setMargin($data['margin']);

		// calcul prix de vente
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
}
