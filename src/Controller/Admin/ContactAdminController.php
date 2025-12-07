<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/contacts')]
class ContactAdminController extends AbstractController
{
	#[Route('', name: 'admin_contacts')]
	public function index(ContactRepository $contactRepository): Response
	{
		$contacts = $contactRepository->findBy([], ['id' => 'DESC']);

		return $this->render('admin/contact/index.html.twig', [
			'contacts' => $contacts,
		]);
	}

	#[Route('/{id}', name: 'admin_contacts_show')]
	public function show(Contact $contact, EntityManagerInterface $em): Response
	{
		if (!$contact->isRead()) {
			$contact->setIsRead(true);
			$em->flush();
		}

		return $this->render('admin/contact/show.html.twig', [
			'contact' => $contact,
		]);
	}

	#[Route('/{id}/delete', name: 'admin_contacts_delete')]
	public function delete(Contact $contact, EntityManagerInterface $em): Response
	{
		$em->remove($contact);
		$em->flush();

		$this->addFlash('success', 'Message supprimé');

		return $this->redirectToRoute('admin_contacts');
	}
}
