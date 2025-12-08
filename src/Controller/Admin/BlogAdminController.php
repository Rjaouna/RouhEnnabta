<?php

namespace App\Controller\Admin;

use App\Entity\Blog;
use App\Repository\BlogRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/blog')]
class BlogAdminController extends AbstractController
{
	#[Route('/', name: 'admin_blog_page', methods: ['GET'])]
	public function page(): Response
	{
		return $this->render('admin/blog/index.html.twig');
	}

	#[Route('/list', name: 'admin_blog_list', methods: ['GET'])]
	public function list(BlogRepository $repository): JsonResponse
	{
		$blogs = $repository->findAll();

		$data = [];

		foreach ($blogs as $blog) {
			$data[] = [
				'id'       => $blog->getId(),
				'name'     => $blog->getName(),
				'content'  => $blog->getContent(),
				'isActive' => $blog->isActive(),
				'image'    => $blog->getImage(), // ✅ STRING maintenant
			];
		}

		return new JsonResponse($data);
	}

	#[Route('/create', name: 'admin_blog_create', methods: ['POST'])]
	public function create(Request $request, EntityManagerInterface $em): JsonResponse
	{
		try {
			$name = $request->request->get('name');
			if (!$name || $name === 'undefined') {
				return new JsonResponse(['error' => 'Titre obligatoire'], 400);
			}

			$blog = new Blog();
			$blog->setName($name);
			$blog->setContent($request->request->get('content'));
			$blog->setIsActive(false);

			if ($request->files->has('imageFile')) {
				$blog->setImageFile($request->files->get('imageFile'));
			}

			$em->persist($blog);
			$em->flush();

			return new JsonResponse(['success' => true]);
		} catch (\Throwable $e) {
			return new JsonResponse([
				'error' => $e->getMessage(),
				'trace' => $this->getParameter('kernel.environment') === 'dev'
					? $e->getTraceAsString()
					: null
			], 500);
		}
	}

	#[Route('/{id}', name: 'admin_blog_update', methods: ['POST'])]
	public function update(Blog $blog, Request $request, EntityManagerInterface $em): JsonResponse
	{
		$blog->setName($request->request->get('name'));
		$blog->setContent($request->request->get('content'));
		$blog->setIsActive($request->request->getBoolean('isActive'));

		if ($request->files->has('imageFile')) {
			$blog->setImageFile($request->files->get('imageFile'));
		}

		$em->flush();

		return new JsonResponse(['success' => true]);
	}

	#[Route('/{id}', name: 'admin_blog_delete', methods: ['DELETE'])]
	public function delete(Blog $blog, EntityManagerInterface $em): JsonResponse
	{
		$em->remove($blog);
		$em->flush();

		return new JsonResponse(['success' => true]);
	}
}
