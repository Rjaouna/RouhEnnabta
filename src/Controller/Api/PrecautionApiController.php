<?php

namespace App\Controller\Api;

use App\Entity\Precaution;
use App\Repository\PrecautionRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/precautions')]
class PrecautionApiController extends AbstractController
{
	#[Route('/', name: 'api_precautions_index', methods: ['GET'])]
	public function list(PrecautionRepository $repo): JsonResponse
	{
		$precautions = $repo->findAll();

		$data = array_map(fn(Precaution $p) => [
			'id'          => $p->getId(),
			'description' => $p->getDescription(),
			'products'    => array_map(fn($prod) => [
				'id'   => $prod->getId(),
				'name' => $prod->getName()
			], $p->getProduct()->toArray())
		], $precautions);

		return $this->json($data);
	}


	#[Route('/create', name: 'api_precautions_create', methods: ['POST'])]
	public function create(
		Request $request,
		EntityManagerInterface $em,
		ProductRepository $productRepo
	): JsonResponse {

		$data = json_decode($request->getContent(), true);

		if (empty($data['description'])) {
			return $this->json(['error' => 'Description obligatoire'], 400);
		}

		$precaution = new Precaution();
		$precaution->setDescription($data['description']);

		// 🔥 Liaison aux produits
		if (isset($data['products']) && is_array($data['products'])) {
			foreach ($data['products'] as $productId) {
				$product = $productRepo->find($productId);
				if ($product) {
					$precaution->addProduct($product);
				}
			}
		}

		$em->persist($precaution);
		$em->flush();

		return $this->json([
			'message' => 'Précaution créée',
			'id'      => $precaution->getId()
		], 201);
	}


	#[Route('/edit/{id}', name: 'api_precautions_edit', methods: ['PUT'])]
	public function edit(
		?Precaution $precaution,
		Request $request,
		EntityManagerInterface $em,
		ProductRepository $productRepo
	): JsonResponse {

		if (!$precaution) {
			return $this->json(['error' => 'Précaution introuvable'], 404);
		}

		$data = json_decode($request->getContent(), true);

		$precaution->setDescription($data['description']);

		// 🔥 Mettre à jour les produits liés
		foreach ($precaution->getProduct() as $prod) {
			$precaution->removeProduct($prod);
		}

		if (isset($data['products'])) {
			foreach ($data['products'] as $productId) {
				$product = $productRepo->find($productId);
				if ($product) {
					$precaution->addProduct($product);
				}
			}
		}

		$em->flush();

		return $this->json(['message' => 'Précaution modifiée']);
	}


	#[Route('/delete/{id}', name: 'api_precautions_delete', methods: ['DELETE'])]
	public function delete(?Precaution $precaution, EntityManagerInterface $em): JsonResponse
	{
		if (!$precaution) {
			return $this->json(['error' => 'Précaution introuvable'], 404);
		}

		$em->remove($precaution);
		$em->flush();

		return $this->json(['message' => 'Précaution supprimée']);
	}
}
