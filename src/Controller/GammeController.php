<?php

namespace App\Controller;

use App\Entity\Gammes;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GammeController extends AbstractController
{
	#[Route('/gamme/{id}', name: 'gamme_show')]
	public function show(
		Gammes $gamme,
		ProductRepository $productRepository
	): Response {

		$products = $productRepository->findActiveByGamme($gamme);


		return $this->render('gamme/show.html.twig', [
			'gamme' => $gamme,
			'products' => $products,
		]);
	}
}
