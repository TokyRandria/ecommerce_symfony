<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\PhotoArticle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle')
            ->add('description')
            ->add('prixHT')
            ->add('quantite')
            ->add('valeurdeclinaison')
            ->add('produitref')
            ->add('images' ,EntityType::class,[
                'class' => PhotoArticle::class,
                'multiple' => true
    ])
//            ->add('images', FileType::class,['image_property'=>'images'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
