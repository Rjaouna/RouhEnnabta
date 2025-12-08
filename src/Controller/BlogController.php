<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Repository\BlogRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog_index', methods: ['GET'])]
    public function index(BlogRepository $blogRepository): Response
    {
		$blogs = $blogRepository->findPublished();

        return $this->render('blog/index.html.twig', [
            'blogs' => $blogs,
        ]);
    }

	#[Route('/blog/{id}', name: 'blog_show', methods: ['GET'])]
	public function show(Blog $blog): Response
	{
		if (!$blog->isActive()) {
			throw $this->createNotFoundException();
		}

		return $this->render('blog/show.html.twig', [
			'blog' => $blog,
		]);
	}
}
