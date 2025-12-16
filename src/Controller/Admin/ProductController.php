<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/products')]
class ProductController extends AbstractController
{
	#[Route('/admin/products', name: 'admin_product_index')]
	public function index(): Response
	{
		return $this->render('admin/product/index.html.twig');
	}
	#[Route('/produit/{slug}', name: 'product_show')]
	public function show(
		#[MapEntity(mapping: ['slug' => 'slug'])] Product $product,
		ProductRepository $repo
	): Response {

		if (!$product->isActive()) {
			throw $this->createNotFoundException();
		}

		// 🔥 Produits liés de la même gamme (max 6), en excluant le produit actuel
		$relatedProducts = $repo->createQueryBuilder('p')
			->where('p.gamme = :gamme')
			->andWhere('p.id != :id')
			->andWhere('p.isActive = true')
			->setParameter('gamme', $product->getGamme())
			->setParameter('id', $product->getId())
			->setMaxResults(6)
			->orderBy('p.id', 'DESC')
			->getQuery()
			->getResult();

		return $this->render('product/show.html.twig', [
			'product' => $product,
			'relatedProducts' => $relatedProducts, // <= 🔥 renvoyé à la vue
		]);
	}
}
