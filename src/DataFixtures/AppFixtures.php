<?php

namespace App\DataFixtures;

use App\Entity\Famille;
use App\Factory\FamilleFactory;
use App\Factory\ProduitFactory;
use App\Factory\TaxeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($j=1 ;$j<=5;$j++){
            $famillep= new Famille();
            $famillep =$this->createFamille($manager);
            $manager->persist($famillep);
        }

        $familles = FamilleFactory::createMany(20,function() use ($famillep,) {
            return [
                'famille' => $familles[array_rand($famillep)],
            ];
        });

        $taxes = TaxeFactory::createMany(3);

        ProduitFactory::createMany(100,function() use ($familles,$taxes) {
            return [
                'famille' => $familles[array_rand($familles)],
                'taxe' => $taxes[array_rand($taxes)]
            ];
        });


        $manager->flush();
    }
    public function createFamille(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $famille = new Famille();
        $famille->setLibelle($faker->word());
        $famille->setImageRep($faker->imageUrl(300,300));
        $famille->setParent(null);
        $manager->persist($famille);

        return $famille;
    }
}
