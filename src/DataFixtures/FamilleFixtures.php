<?php

namespace App\DataFixtures;

use App\Entity\Famille;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FamilleFixtures extends Fixture
{
    private $counter = 1;
    public function load(ObjectManager $manager): void
    {
        $parent = $this->createFamille('Lavage', null, $manager);
        
        $this->createFamille('Machines à laver', $parent, $manager);
        $this->createFamille('laves linge', $parent, $manager);
        $this->createFamille('seau', $parent, $manager);

        $parent = $this->createFamille('Table', null, $manager);

        $this->createFamille('table de bureau', $parent, $manager);
        $this->createFamille('table basse', $parent, $manager);
        $this->createFamille('table à manger', $parent, $manager);

        $manager->flush();
    }
    public function createFamille(string $name, Famille $parent = null, ObjectManager $manager)
    {
        $famille = new Famille();
        $famille->setLibelle($name);
        $famille->setImageRep("C:images");
        $famille->setParent($parent);
        $manager->persist($famille);

        $this->addReference('cat-'.$this->counter, $famille);
        $this->counter++;

        return $famille;
    }
}
