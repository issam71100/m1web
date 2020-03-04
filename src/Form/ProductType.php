<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use App\EventSubscriber\Form\ProductFormSubscriber;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            // le champ image est créé dans le souscripteur de formulaire
            //->add('slug')
	        /*
	         * champ en relation avec une entité
	         *   utiliser EntityType comme type de champ
	         *   class : cibler l'entité en relation
	         *   choice_label : propriété de l'entité à afficher dans le champ
	         *   placeholder: créer une option vide dans la liste déroulante
	         * */
	        ->add('category', EntityType::class, [
				'class' => Category::class,
	            'choice_label' => 'name',
	            'placeholder' => '',
	            'constraints' => [
	            	new NotBlank([
	            	    'message' => 'La catégorie est obligatoire'
		            ])
	            ]
            ])
        ;

        // ajout d'un soucripteur de formulaire
	    $builder->addEventSubscriber( new ProductFormSubscriber() );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
