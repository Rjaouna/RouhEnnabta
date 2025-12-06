<?php

namespace App\Controller\Api;

use App\Entity\Gammes;
use App\Repository\GammesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/gammes')]
class GammesController extends AbstractController
{
	#[Route('', methods: ['GET'])]
	public function index(GammesRepository $repo): JsonResponse
	{
		$gammes = $repo->findAll();

		$data = array_map(fn(Gammes $g) => [
			'id' => $g->getId(),
			'name' => $g->getName(),
			'description' => $g->getDescription(),
			'isActive' => $g->isActive(),
		], $gammes);

		return $this->json($data);
	}

	#[Route('', methods: ['POST'])]
	public function create(
		Request $request,
		EntityManagerInterface $em
	): JsonResponse {
		$data = json_decode($request->getContent(), true);

		$gamme = new Gammes();
		$gamme->setName($data['name']);
		$gamme->setDescription($data['description'] ?? null);
		$gamme->setIsActive($data['isActive'] ?? true);

		$em->persist($gamme);
		$em->flush();

		return $this->json(['message' => 'Gamme créée'], 201);
	}

	#[Route('/{id}', methods: ['PUT'])]
	public function update(
		int $id,
		Request $request,
		GammesRepository $repo,
		EntityManagerInterface $em
	): JsonResponse {
		$gamme = $repo->find($id);

		if (!$gamme) {
			return $this->json(['error' => 'Gamme introuvable'], 404);
		}

		$data = json_decode($request->getContent(), true);

		$gamme->setName($data['name']);
		$gamme->setDescription($data['description'] ?? null);
		$gamme->setIsActive($data['isActive'] ?? true);

		$em->flush();

		return $this->json(['message' => 'Gamme mise à jour']);
	}

	#[Route('/{id}', methods: ['DELETE'])]
	public function delete(
		int $id,
		GammesRepository $repo,
		EntityManagerInterface $em
	): JsonResponse {
		$gamme = $repo->find($id);

		if (!$gamme) {
			return $this->json(['error' => 'Gamme introuvable'], 404);
		}

		$em->remove($gamme);
		$em->flush();

		return $this->json(['message' => 'Gamme supprimée']);
	}
	#[Route('/{id}', methods: ['GET'])]
	public function show(
		int $id,
		GammesRepository $repo
	): JsonResponse {
		$gamme = $repo->find($id);

		if (!$gamme) {
			return $this->json(['error' => 'Gamme introuvable'], 404);
		}

		return $this->json([
			'id' => $gamme->getId(),
			'name' => $gamme->getName(),
			'description' => $gamme->getDescription(),
			'isActive' => $gamme->isActive(),
		]);
	}
}
