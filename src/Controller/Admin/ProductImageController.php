<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\ProductImage;
use App\Form\ProductImageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
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
}
