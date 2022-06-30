<?php

namespace App\DataFixtures;

use App\Entity\Famille;
use App\Entity\PhotoArticle;
use App\Entity\ValeurCaracteristique;
use App\Factory\ArticleFactory;
use App\Factory\FamilleFactory;
use App\Factory\PhotoArticleFactory;
use App\Factory\ProduitFactory;
use App\Factory\SousFamilleFactory;
use App\Factory\TaxeFactory;
use App\Factory\TypeCaracteristiqueFactory;
use App\Factory\ValeurCaracteristiqueFactory;
use App\Repository\FamilleRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $familles = FamilleFactory::createMany(5);
       $sousfamilles = SousFamilleFactory::createMany(7,function() use ($familles) {
            return [
                'parent' => $familles[array_rand($familles)],
            ];
        });
       $sousfamilles2 = SousFamilleFactory::createMany(10,function() use ($sousfamilles) {
            return [
                'parent' => $sousfamilles[array_rand($sousfamilles)],
            ];
        });
        $taxes = TaxeFactory::createMany(3);

        $produit = ProduitFactory::createMany(40,function() use ($familles,$sousfamilles,$sousfamilles2,$taxes) {
            return [
               // 'famille' => $familles[array_rand($familles)],
               'famille' => $familles[array_rand(array(array_rand($familles),array_rand($sousfamilles),array_rand($sousfamilles2)))],
                'taxe' => $taxes[array_rand($taxes)]
            ];
        });
       $typecaracteristique =  TypeCaracteristiqueFactory::createMany(7);
       $valeurdeclinaison =ValeurCaracteristiqueFactory::createMany(10,function() use ($typecaracteristique) {
            return [
                'typeCaracteristique' => $typecaracteristique[array_rand($typecaracteristique)],
            ];
        });
        $photo = PhotoArticleFactory::createMany(30);
   /*     ArticleFactory::createMany( 50,function() use ($produit,$photo,$valeurdeclinaison){
            return [
                'image'=>$photo[array_rand($photo)],
                'produit'=>$produit[array_rand($produit)],
                'valeurdeclinaison'=>$valeurdeclinaison[array_rand($valeurdeclinaison)],
             ];
        });*/
        ArticleFactory::createMany( 50,function() use ($produit){
            return [
                'produitref'=>$produit[array_rand($produit)],
             ];
        });

        $manager->flush();
    }
}
