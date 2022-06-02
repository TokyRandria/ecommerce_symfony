<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TaxeFixtures extends Fixture
{
    private $counter = 1;
    public function load(ObjectManager $manager): void
    {
        $manager->flush();
    }
    public function createTaxe(string $Lib, Taxe $tax = null, ObjectManager $manager)
    {
        $taxe = new Categories();
        $taxe->setLibelle($Lib);
        $taxe->setTauxTaxe(20.1);

        $this->addReference('ta-'.$this->counter, $taxe);
        $this->counter++;

        return $taxe;
    }
    
}
