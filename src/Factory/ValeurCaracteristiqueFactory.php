<?php

namespace App\Factory;

use App\Entity\ValeurCaracteristique;
use App\Repository\ValeurCaracteristiqueRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<ValeurCaracteristique>
 *
 * @method static ValeurCaracteristique|Proxy createOne(array $attributes = [])
 * @method static ValeurCaracteristique[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static ValeurCaracteristique|Proxy find(object|array|mixed $criteria)
 * @method static ValeurCaracteristique|Proxy findOrCreate(array $attributes)
 * @method static ValeurCaracteristique|Proxy first(string $sortedField = 'id')
 * @method static ValeurCaracteristique|Proxy last(string $sortedField = 'id')
 * @method static ValeurCaracteristique|Proxy random(array $attributes = [])
 * @method static ValeurCaracteristique|Proxy randomOrCreate(array $attributes = [])
 * @method static ValeurCaracteristique[]|Proxy[] all()
 * @method static ValeurCaracteristique[]|Proxy[] findBy(array $attributes)
 * @method static ValeurCaracteristique[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static ValeurCaracteristique[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ValeurCaracteristiqueRepository|RepositoryProxy repository()
 * @method ValeurCaracteristique|Proxy create(array|callable $attributes = [])
 */
final class ValeurCaracteristiqueFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'libelle' => self::faker()->country(),
            'typecaracteristique' => TypeCaracteristiqueFactory::random(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(ValeurCaracteristique $valeurCaracteristique): void {})
        ;
    }

    protected static function getClass(): string
    {
        return ValeurCaracteristique::class;
    }
}
