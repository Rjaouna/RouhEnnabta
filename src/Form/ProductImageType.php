<?php

namespace App\Form;

use App\Entity\ProductImage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ProductImageType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options): void
	{
		$builder
			->add('imageFile', FileType::class, [
				'required' => true,
				'label' => 'Image',
			])
			->add('isMain', CheckboxType::class, [
				'required' => false,
				'label' => 'Image principale',
			]);
	}
}
