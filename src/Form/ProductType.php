<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
            	'constraints' => [
            		new NotBlank([
            		    'message' => "Le nom est obligatoire"
		            ])
	            ]
            ])
            ->add('description', TextareaType::class, [
	            'constraints' => [
		            new NotBlank([
                         'message' => "La description est obligatoire"
                     ])
                ]
            ])
            ->add('price', MoneyType::class, [
	            'constraints' => [
		            new NotBlank([
                         'message' => "Le prix est obligatoire"
                    ]),
		            new Positive([
		            	'message' => 'Le prix doit être positif'
		            ])
	            ]
            ])
            ->add('image', FileType::class, [
            	'data_class' => null, // permet d'indiquer qu'aucune classe ne va contenir les propriétés d'une image transférée
	            'constraints' => [
		            new NotBlank([
                         'message' => "L'image est obligatoire"
                    ]),
		            new Image([
		                'mimeTypes' => ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'],
			            'mimeTypesMessage' => "L'image n'est pas dans un format Web"
		            ])
	            ]
            ])
            //->add('slug')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
