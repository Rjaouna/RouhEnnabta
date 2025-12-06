<?php

namespace App\Controller\Api;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;


#[Route('/api/categories')]
class CategoryController extends AbstractController
{
	#[Route('', methods: ['GET'])]
	public function index(CategoryRepository $repo): JsonResponse
	{
		$categories = $repo->findAll();

		$data = array_map(fn(Category $c) => [
			'id' => $c->getId(),
			'name' => $c->getName(),
			'slug' => $c->getSlug(),
			'description' => $c->getDescription(),
			'isActive' => $c->isActive(),
		], $categories);

		return $this->json($data);
	}

	#[Route('', methods: ['POST'])]
	public function create(
		Request $request,
		EntityManagerInterface $em,
		SluggerInterface $slugger
	): JsonResponse {
		$data = json_decode($request->getContent(), true);

		$category = new Category();
		$category->setName($data['name']);

		// ✅ SLUG AUTO
		$slug = $slugger->slug($data['name'])->lower();
		$category->setSlug($slug);

		$category->setDescription($data['description'] ?? null);
		$category->setIsActive($data['isActive'] ?? true);

		$em->persist($category);
		$em->flush();

		return $this->json(['message' => 'Catégorie créée'], 201);
	}

	#[Route('/{id}', methods: ['DELETE'])]
	public function delete(
		int $id,
		CategoryRepository $repo,
		EntityManagerInterface $em
	): JsonResponse {
		$category = $repo->find($id);

		if (!$category) {
			return $this->json(['error' => 'Catégorie introuvable'], 404);
		}

		$em->remove($category);
		$em->flush();

		return $this->json(['message' => 'Catégorie supprimée']);
	}
	#[Route('/{id}', methods: ['GET'])]
	public function show(
		int $id,
		CategoryRepository $repo
	): JsonResponse {
		$category = $repo->find($id);

		if (!$category) {
			return $this->json(['error' => 'Catégorie introuvable'], 404);
		}

		return $this->json([
			'id' => $category->getId(),
			'name' => $category->getName(),
			'slug' => $category->getSlug(),
			'description' => $category->getDescription(),
			'isActive' => $category->isActive(),
		]);
	}
	#[Route('/{id}', methods: ['PUT'])]
	public function update(
		int $id,
		Request $request,
		CategoryRepository $repo,
		EntityManagerInterface $em,
		SluggerInterface $slugger
	): JsonResponse {
		$category = $repo->find($id);

		if (!$category) {
			return $this->json(['error' => 'Catégorie introuvable'], 404);
		}

		$data = json_decode($request->getContent(), true);

		$category->setName($data['name']);

		// ✅ RE-GÉNÉRATION SLUG
		$slug = $slugger->slug($data['name'])->lower();
		$category->setSlug($slug);

		$category->setDescription($data['description'] ?? null);
		$category->setIsActive($data['isActive'] ?? true);

		$em->flush();

		return $this->json(['message' => 'Catégorie mise à jour']);
	}
}
