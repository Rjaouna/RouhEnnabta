<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
	#[Route('/produit/{slug}/recettes', name: 'product_recettes')]
	public function recettes(
		string $slug,
		ProductRepository $productRepository
	): Response {

		$product = $productRepository->findOneBy(['slug' => $slug]);

		if (!$product) {
			throw $this->createNotFoundException('Produit introuvable');
		}

		return $this->render('product/recettes.html.twig', [
			'product'  => $product,
			'recettes' => $product->getRecettes(),
		]);
	}
}
