<?php

namespace App\Form;

use DateTime;
use App\Entity\Actualite;
use Symfony\Component\Form\AbstractType;
use IT\InputMaskBundle\Form\Type\UrlMaskType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActualiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Titre')
            ->add('UrlImage', UrlMaskType::class)
            ->add('Alt')
            ->add('Accroche', CKEditorType::class)
            ->add('Texte', CKEditorType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actualite::class,
        ]);
    }
}
