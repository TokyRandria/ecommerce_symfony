<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Taxe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reference')
            ->add('libelle')
            ->add('description')
            ->add('prix_reference')
            ->add('ordre_affichage')
            ->add('image_rep')
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
