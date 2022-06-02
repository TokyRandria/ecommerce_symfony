<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for($prod = 1; $prod <= 10; $prod++){
            $produit = new Produit();
            $produit->setLibelle($faker->text(15));
            $produit->setReference($faker->text(10));
            $produit->setDescription($faker->text());
            $produit->setPrixReference($faker->numberBetween(90, 15000));
            $produit->setImageRep($faker->image(null, 640, 480));

            //On va chercher une référence de catégorie
            $famille = $this->getReference('cat-'. rand(1, 8));
            $produit->setFamille($famille);


            $this->setReference('prod-'.$prod, $produit);
            $manager->persist($produit);
        }


        $manager->flush();
    }
}
