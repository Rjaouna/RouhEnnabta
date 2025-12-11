<?php

namespace App\Controller\Api;

use App\Entity\Bienfaits;
use App\Repository\BienfaitsRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/bienfaits')]
class BienfaitsApiController extends AbstractController
{
	#[Route('/', name: 'api_bienfaits_index', methods: ['GET'])]
	public function list(BienfaitsRepository $repo): JsonResponse
	{
		$bienfaits = $repo->findAll();

		$data = array_map(fn(Bienfaits $b) => [
			'id'          => $b->getId(),
			'description' => $b->getDescription(),
			'products'    => array_map(fn($p) => [
				'id'   => $p->getId(),
				'name' => $p->getName()
			], $b->getProduct()->toArray())
		], $bienfaits);

		return $this->json($data);
	}

	#[Route('/create', name: 'api_bienfaits_create', methods: ['POST'])]
	public function create(Request $request, EntityManagerInterface $em, ProductRepository $productRepo): JsonResponse
	{
		$data = json_decode($request->getContent(), true);

		if (empty($data['description'])) {
			return $this->json(['error' => 'La description est obligatoire'], 400);
		}

		$bienfait = new Bienfaits();
		$bienfait->setDescription($data['description']);

		// 🔥 Ajout produits
		if (isset($data['products']) && is_array($data['products'])) {
			foreach ($data['products'] as $productId) {
				$product = $productRepo->find($productId);
				if ($product) {
					$bienfait->addProduct($product);
				}
			}
		}

		$em->persist($bienfait);
		$em->flush();

		return $this->json(['message' => 'Bienfait créé', 'id' => $bienfait->getId()], 201);
	}

	#[Route('/edit/{id}', name: 'api_bienfaits_edit', methods: ['PUT'])]
	public function edit(
		?Bienfaits $bienfait,
		Request $request,
		EntityManagerInterface $em,
		ProductRepository $productRepo
	): JsonResponse {

		if (!$bienfait) {
			return $this->json(['error' => 'Bienfait introuvable'], 404);
		}

		$data = json_decode($request->getContent(), true);

		$bienfait->setDescription($data['description']);

		// 🔥 Reset + ajout produits
		foreach ($bienfait->getProduct() as $p) {
			$bienfait->removeProduct($p);
		}

		if (isset($data['products'])) {
			foreach ($data['products'] as $productId) {
				$product = $productRepo->find($productId);
				if ($product) {
					$bienfait->addProduct($product);
				}
			}
		}

		$em->flush();

		return $this->json(['message' => 'Bienfait modifié']);
	}

	#[Route('/delete/{id}', name: 'api_bienfaits_delete', methods: ['DELETE'])]
	public function delete(?Bienfaits $bienfait, EntityManagerInterface $em): JsonResponse
	{
		if (!$bienfait) {
			return $this->json(['error' => 'Bienfait introuvable'], 404);
		}

		$em->remove($bienfait);
		$em->flush();

		return $this->json(['message' => 'Bienfait supprimé']);
	}
}
