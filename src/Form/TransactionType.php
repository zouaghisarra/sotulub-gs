<?php

namespace App\Form;

use App\Entity\Magasin;
use App\Entity\Operation;
use App\Entity\Transaction;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qte')
            ->add('magasin_distination',EntityType::class, [
                
                'class' => Magasin::class,
                'required' => false,
                'choice_label' => 'annotation',
                'placeholder' => ' choisissez magasin distination'
            ])
            ->add('magasin_source',EntityType::class, [
                
                'class' => Magasin::class,
                'required' => false,
                'choice_label' => 'annotation',
                'placeholder' => ' choisissez magasin source'
            ]

            )
            
            ->add('prix_unitaire')
            
            ->add('bien')
            ->add('operation',EntityType::class, [
                
                'class' => Operation::class,
                'placeholder' => 'choisissez l operation'
            ])
            
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
        ]);
    }
}
