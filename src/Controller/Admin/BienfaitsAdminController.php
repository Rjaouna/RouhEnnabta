<?php

namespace App\Controller\Admin;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/bienfaits')]
class BienfaitsAdminController extends AbstractController
{
	#[Route('/', name: 'admin_bienfaits_index', methods: ['GET'])]
	public function index(ProductRepository $productRepo): Response
	{
		return $this->render('admin/bienfaits/index.html.twig', [
			'products' => $productRepo->findAll()
		]);
	}
}
