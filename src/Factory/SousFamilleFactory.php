<?php

namespace App\Factory;

use App\Entity\Famille;
use App\Repository\FamilleRepository;
use Doctrine\Persistence\ObjectManager;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Faker;

/**
 * @extends ModelFactory<Famille>
 *
 * @method static Famille|Proxy createOne(array $attributes = [])
 * @method static Famille[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Famille|Proxy find(object|array|mixed $criteria)
 * @method static Famille|Proxy findOrCreate(array $attributes)
 * @method static Famille|Proxy first(string $sortedField = 'id')
 * @method static Famille|Proxy last(string $sortedField = 'id')
 * @method static Famille|Proxy random(array $attributes = [])
 * @method static Famille|Proxy randomOrCreate(array $attributes = [])
 * @method static Famille[]|Proxy[] all()
 * @method static Famille[]|Proxy[] findBy(array $attributes)
 * @method static Famille[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Famille[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static FamilleRepository|RepositoryProxy repository()
 * @method Famille|Proxy create(array|callable $attributes = [])
 */
final class SousFamilleFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
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

    public function loadfamille(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($fam = 1; $fam <= 15; $fam++) {
            $famille = new Famille();
            $famille = $this->createFamille($manager);
            $manager->persist($famille);
        }
        $manager->flush();
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'Libelle' => self::faker()->word(),
            'image_rep' => self::faker()->imageUrl(300,300),
            'parent' => FamilleFactory::random(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Famille $famille): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Famille::class;
    }
}
