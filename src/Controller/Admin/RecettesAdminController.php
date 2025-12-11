<?php

namespace App\Controller\Admin;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/recettes')]
class RecettesAdminController extends AbstractController
{
	#[Route('/', name: 'admin_recettes_index')]
	public function index(ProductRepository $productRepo): Response
	{
		return $this->render('admin/recettes/index.html.twig', [
			'products' => $productRepo->findAll()
		]);
	}
}
