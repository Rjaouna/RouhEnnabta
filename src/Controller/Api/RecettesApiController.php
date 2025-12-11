<?php

namespace App\Controller\Api;

use App\Entity\Recettes;
use App\Repository\RecettesRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/recettes')]
class RecettesApiController extends AbstractController
{
	#[Route('/', name: 'api_recettes_index', methods: ['GET'])]
	public function list(RecettesRepository $repo): JsonResponse
	{
		$recettes = $repo->findAll();

		$data = array_map(fn(Recettes $r) => [
			'id'          => $r->getId(),
			'description' => $r->getDescription(),
			'products'    => array_map(fn($p) => [
				'id'   => $p->getId(),
				'name' => $p->getName()
			], $r->getProduct()->toArray())
		], $recettes);

		return $this->json($data);
	}

	#[Route('/create', name: 'api_recettes_create', methods: ['POST'])]
	public function create(Request $request, EntityManagerInterface $em, ProductRepository $productRepo): JsonResponse
	{
		$data = json_decode($request->getContent(), true);

		if (empty($data['description'])) {
			return $this->json(['error' => 'La description est obligatoire'], 400);
		}

		$recette = new Recettes();
		$recette->setDescription($data['description']);

		if (isset($data['products'])) {
			foreach ($data['products'] as $productId) {
				$product = $productRepo->find($productId);
				if ($product) {
					$recette->addProduct($product);
				}
			}
		}

		$em->persist($recette);
		$em->flush();

		return $this->json(['message' => 'Recette créée', 'id' => $recette->getId()], 201);
	}

	#[Route('/edit/{id}', name: 'api_recettes_edit', methods: ['PUT'])]
	public function edit(?Recettes $recette, Request $request, EntityManagerInterface $em, ProductRepository $productRepo): JsonResponse
	{
		if (!$recette) {
			return $this->json(['error' => 'Recette introuvable'], 404);
		}

		$data = json_decode($request->getContent(), true);

		$recette->setDescription($data['description']);

		foreach ($recette->getProduct() as $p) {
			$recette->removeProduct($p);
		}

		if (isset($data['products'])) {
			foreach ($data['products'] as $productId) {
				$product = $productRepo->find($productId);
				if ($product) {
					$recette->addProduct($product);
				}
			}
		}

		$em->flush();

		return $this->json(['message' => 'Recette modifiée']);
	}

	#[Route('/delete/{id}', name: 'api_recettes_delete', methods: ['DELETE'])]
	public function delete(?Recettes $recette, EntityManagerInterface $em): JsonResponse
	{
		if (!$recette) {
			return $this->json(['error' => 'Recette introuvable'], 404);
		}

		$em->remove($recette);
		$em->flush();

		return $this->json(['message' => 'Recette supprimée']);
	}
}
