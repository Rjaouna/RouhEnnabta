<?php

namespace App\Controller\Api;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;


#[Route('/api/categories')]
class CategoryController extends AbstractController
{
	// =====================
	// LIST
	// =====================
	#[Route('', methods: ['GET'])]
	public function index(CategoryRepository $repo): JsonResponse
	{
		$categories = $repo->findAll();

		return $this->json(array_map(static fn(Category $c) => [
			'id'          => $c->getId(),
			'name'        => $c->getName(),
			'slug'        => $c->getSlug(),
			'description' => $c->getDescription(),
			'isActive'    => $c->isActive(),
			'image'       => $c->getImage(),
		], $categories));
	}

	// =====================
	// SHOW
	// =====================
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
			'id'          => $category->getId(),
			'name'        => $category->getName(),
			'slug'        => $category->getSlug(),
			'description' => $category->getDescription(),
			'isActive'    => $category->isActive(),
			'image'       => $category->getImage(),
		]);
	}

	// =====================
	// CREATE
	// =====================
	#[Route('', methods: ['POST'])]
	public function create(
		Request $request,
		EntityManagerInterface $em,
		SluggerInterface $slugger
	): JsonResponse {
		$category = new Category();

		$name = (string) $request->get('name');
		$category->setName($name);
		$category->setSlug($slugger->slug($name)->lower());

		$category->setDescription($request->get('description'));
		$category->setIsActive(true);

		/** @var UploadedFile|null $image */
		if ($image = $request->files->get('image')) {
			$category->setImageFile($image);
		}

		$em->persist($category);
		$em->flush();

		return $this->json([
			'message' => 'Catégorie créée',
			'image'   => $category->getImage(),
		], 201);
	}

	// =====================
	// UPDATE
	// =====================
	#[Route('/{id}', methods: ['POST'])]
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

		$name = (string) $request->get('name');
		$category->setName($name);
		$category->setSlug($slugger->slug($name)->lower());

		$category->setDescription($request->get('description'));
		$category->setIsActive(true);

		/** @var UploadedFile|null $image */
		if ($image = $request->files->get('image')) {
			$category->setImageFile($image);
		}

		$em->flush();

		return $this->json(['message' => 'Catégorie mise à jour']);
	}
	// =====================
	// DELETE
	// =====================
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
}
