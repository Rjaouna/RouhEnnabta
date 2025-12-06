<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/category', name: 'admin_category_')]
class CategoryController extends AbstractController
{
	#[Route('', name: 'index')]
	public function index(): Response
	{
		return $this->render('admin/category/index.html.twig');
	}
}
