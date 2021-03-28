<?php

namespace App\Form;

use App\Entity\Inscription;
use Symfony\Component\Form\AbstractType;
use IT\InputMaskBundle\Form\Type\TextMaskType;
use IT\InputMaskBundle\Form\Type\EmailMaskType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Prenom', null, ['label' => 'Prénom'])
            ->add('Email', EmailMaskType::class)
            ->add('Secu', TextMaskType::class, [
                'label' => 'Numéro de sécurité sociale', 'mask' => '9 99 99 99 999 999 99'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
