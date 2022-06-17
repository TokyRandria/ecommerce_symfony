<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Taxe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reference', TextType::class,['attr' => [
        'class' => 'form-control'
    ],])
            ->add('libelle', TextType::class,['attr' => [
                'class' => 'form-control'
            ],])
            ->add('description', TextType::class,['attr' => [
                'class' => 'form-control'
            ],])
            ->add('prix_reference',IntegerType::class,['attr' => [
                'class' => 'form-control'
            ],])
            ->add('ordre_affichage',IntegerType::class,['attr' => [
                'class' => 'form-control'
            ],])
            ->add('image_rep', TextType::class,['attr' => [
                'class' => 'form-control'
            ],])
            ->add('famille')
           ->add('taxe')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
