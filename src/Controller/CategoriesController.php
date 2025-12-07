<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Category;
use App\Repository\ProductRepository;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;



final class CategoriesController extends AbstractController
{
    #[Route('/categories', name: 'app_categories')]
    public function index(): Response
    {
        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
        ]);
    }

    #[Route('/categories/{slug}', name: 'category_show')]
    public function show(
        #[MapEntity(mapping: ['slug' => 'slug'])] Category $category
    ): Response {
        if (!$category->isActive()) {
            throw $this->createNotFoundException();
        }

        return $this->render('categories/show.html.twig', [
            'category' => $category,
            'products' => $category->getProducts(),
        ]);
    }
}
