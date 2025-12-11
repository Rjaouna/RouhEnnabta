<?php

namespace App\Controller\Admin;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/precautions')]
class PrecautionAdminController extends AbstractController
{
	#[Route('/', name: 'admin_precautions_index', methods: ['GET'])]
	public function index(ProductRepository $productRepo): Response
	{
		return $this->render('admin/precautions/index.html.twig', [
			'products' => $productRepo->findAll()
		]);
	}
}
