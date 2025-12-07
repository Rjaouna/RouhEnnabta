<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
	#[Route('/contact', name: 'app_contact', methods: ['GET'])]
	public function index(): Response
	{
		return $this->render('contact/index.html.twig');
	}

	#[Route('/contact/submit', name: 'app_contact_submit', methods: ['POST'])]
	public function submit(
		Request $request,
		EntityManagerInterface $em
	): JsonResponse {
		// Vérif CSRF
		$token = $request->request->get('_token');
		if (!$this->isCsrfTokenValid('contact_form', $token)) {
			return new JsonResponse([
				'success' => false,
				'message' => 'Token CSRF invalide.',
			], 400);
		}

		$name    = trim((string) $request->request->get('name'));
		$email   = trim((string) $request->request->get('email'));
		$subject = trim((string) $request->request->get('subject'));
		$message = trim((string) $request->request->get('message'));

		$errors = [];

		if ($name === '') {
			$errors['name'] = 'Le nom est obligatoire.';
		}

		if ($email === '') {
			$errors['email'] = 'L’email est obligatoire.';
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = 'L’email n’est pas valide.';
		}

		if ($subject === '') {
			$errors['subject'] = 'L’objet est obligatoire.';
		}

		if ($message === '') {
			$errors['message'] = 'Le message est obligatoire.';
		}

		if (!empty($errors)) {
			return new JsonResponse([
				'success' => false,
				'errors'  => $errors,
			], 422);
		}

		$contact = new Contact();
		$contact
			->setName($name)
			->setEmail($email)
			->setSubject($subject)
			->setMessage($message)
			->setIsRead(false);

		$em->persist($contact);
		$em->flush();

		return new JsonResponse([
			'success' => true,
			'message' => 'Votre message a bien été envoyé. Nous reviendrons vers vous rapidement.',
		]);
	}
}
