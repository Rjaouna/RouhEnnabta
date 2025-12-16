<?php

namespace App\Controller\Api;

use App\Repository\GammesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/gammes', name: 'api_gammes_')]
class GammeApiController extends AbstractController
{
	#[Route('', name: 'list', methods: ['GET'])]
	public function list(GammesRepository $gammesRepository): JsonResponse
	{
		$gammes = $gammesRepository->findAll();

		$data = array_map(static function ($gamme) {
			return [
				'id'   => $gamme->getId(),
				'name' => $gamme->getName(),
			];
		}, $gammes);

		return $this->json($data);
	}
}
