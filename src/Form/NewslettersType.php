<?php

namespace App\Form;

use App\Form\Model\NewslettersFormModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class NewslettersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
            	'constraints' => [
		            new NotBlank([
			            'message' => "L'email est obligatoire"
		            ]),
		            new Email([
				        'message' => "L'email est incorrect"
		           ])
	            ]
            ])
	        ->add('subscriptions', ChoiceType::class, [
	        	'choices' => $options['data']->getList(),
		        'multiple' => true,
		        'expanded' => true,
		        'constraints' => [
		        	new Count([
		        		'min' => 1,
				        'minMessage' => "Vous devez sélectionner une newsletter au minimum"
		        	])
		        ]
	        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewslettersFormModel::class
        ]);
    }
}
