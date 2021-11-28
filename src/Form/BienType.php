<?php

namespace App\Form;

use App\Entity\Bien;
use App\Entity\Rayon;
use Symfony\Component\Form\AbstractType;


use Symfony\Component\Form\FormBuilderInterface;


use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class BienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ref')
            ->add('description',TextareaType::class)
            ->add('unite')
            ->add('categorie')
            
            ->add('emplacement')
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bien::class,
        ]);
    }
}
