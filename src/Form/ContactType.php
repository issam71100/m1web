<?php

namespace App\Form;

use App\Form\Model\ContactFormModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	/*
    	 * add permet d'ajouter des champs à la classe de formulaire
    	 * le paramètre options permet de récupérer des informations du modèle relié à la classe de formulaire
    	 * il est recommandé d'utiliser le nom des propriétés du modèle pour le nom des champs
    	 */
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('email')
            ->add('message')
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
