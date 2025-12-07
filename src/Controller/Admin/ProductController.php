<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/products')]
class ProductController extends AbstractController
{
	#[Route('/admin/products', name: 'admin_product_index')]
	public function index(): Response
	{
		return $this->render('admin/product/index.html.twig');
	}
	#[Route('/produit/{slug}', name: 'product_show')]
	public function show(
		#[MapEntity(mapping: ['slug' => 'slug'])] Product $product
	): Response {
		if (!$product->isActive()) {
			throw $this->createNotFoundException();
		}

		return $this->render('product/show.html.twig', [
			'product' => $product,
		]);
	}
}
