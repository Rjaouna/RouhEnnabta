<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/products')]
class ProductController extends AbstractController
{
	#[Route('/admin/products', name: 'admin_product_index')]
	public function index(): Response
	{
		return $this->render('admin/product/index.html.twig');
	}
}
