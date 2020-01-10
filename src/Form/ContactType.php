<?php

namespace App\Form;

use App\Form\Model\ContactFormModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	/*
    	 * add permet d'ajouter des champs à la classe de formulaire
    	 *    - nom du champ de saisie récupéré dans la vue du formulaire
    	 *    - type du champ
    	 * le paramètre options permet de récupérer des informations du modèle relié à la classe de formulaire
    	 * il est recommandé d'utiliser le nom des propriétés du modèle pour le nom des champs
    	 */
        $builder
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', EmailType::class)
            ->add('message', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
    	/*
    	 * data_class : permet de relier la classe de formulaire à un modèle
    	 * la constante ::class renvoie l'espace de noms d'une classe PHP
    	 */
        $resolver->setDefaults([
            'data_class' => ContactFormModel::class
        ]);
    }
}
