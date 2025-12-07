<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\ProductImage;
use App\Form\ProductImageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ProductImageController extends AbstractController
{
    #[Route('/product/image', name: 'app_product_image')]
    public function index(): Response
    {
        return $this->render('product_image/index.html.twig', [
            'controller_name' => 'ProductImageController',
        ]);
    }

    #[Route('/admin/product/{id}/images', name: 'admin_product_images')]
    public function images(
        Product $product,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $image = new ProductImage();
        $image->setProduct($product);

        $form = $this->createForm(ProductImageType::class, $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // première image = image principale
            if ($product->getProductImages()->count() === 0) {
                $image->setIsMain(true);
            }

            $em->persist($image);
            $em->flush();

            return $this->redirectToRoute('admin_product_images', [
                'id' => $product->getId()
            ]);
        }

        return $this->render('admin/product/images.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/product/image/{id}/delete', name: 'admin_product_image_delete', methods: ['DELETE'])]
    public function delete(
        ProductImage $image,
        EntityManagerInterface $em
    ): JsonResponse {

        // Sécurité simple (ROLE_ADMIN)
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        // Supprimer le fichier physique
        $filePath = $this->getParameter('kernel.project_dir') . '/public/uploads/products/' . $image->getFilename();
        if ($image->getFilename() && file_exists($filePath)) {
            unlink($filePath);
        }

        // Supprimer en base
        $em->remove($image);
        $em->flush();

        return new JsonResponse([
            'success' => true
        ]);
    }

    #[Route('/admin/product/image/{id}/main', name: 'admin_product_image_main', methods: ['POST'])]
    public function setMain(
        ProductImage $image,
        EntityManagerInterface $em
    ): JsonResponse {

        // Sécurité
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $product = $image->getProduct();

        // Retirer le statut "principal" aux autres images
        foreach ($product->getProductImages() as $img) {
            $img->setIsMain(false);
        }

        // Mettre celle-ci en principale
        $image->setIsMain(true);

        $em->flush();

        return new JsonResponse([
            'success' => true,
            'imageId' => $image->getId()
        ]);
    }
}
