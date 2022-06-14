<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options):void
    {
        $builder
        ->add('taxe', EntityType::class, [
            'class' => Taxe::class,
            'choice_label' => 'label',
            'expanded' => true,
            'label' => 'taux de taxe',
            'multiple' => false
        ]);
    }
}    