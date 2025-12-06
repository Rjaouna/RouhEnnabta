<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/gammes')]
class GammesController extends AbstractController
{
	#[Route('', name: 'admin_gammes_index')]
	public function index(): Response
	{
		return $this->render('admin/gammes/index.html.twig');
	}
}
