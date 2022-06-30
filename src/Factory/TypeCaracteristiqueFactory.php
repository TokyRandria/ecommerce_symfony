<?php

namespace App\Factory;

use App\Entity\TypeCaracteristique;
use App\Repository\TypeCaracteristiqueRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<TypeCaracteristique>
 *
 * @method static TypeCaracteristique|Proxy createOne(array $attributes = [])
 * @method static TypeCaracteristique[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static TypeCaracteristique|Proxy find(object|array|mixed $criteria)
 * @method static TypeCaracteristique|Proxy findOrCreate(array $attributes)
 * @method static TypeCaracteristique|Proxy first(string $sortedField = 'id')
 * @method static TypeCaracteristique|Proxy last(string $sortedField = 'id')
 * @method static TypeCaracteristique|Proxy random(array $attributes = [])
 * @method static TypeCaracteristique|Proxy randomOrCreate(array $attributes = [])
 * @method static TypeCaracteristique[]|Proxy[] all()
 * @method static TypeCaracteristique[]|Proxy[] findBy(array $attributes)
 * @method static TypeCaracteristique[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static TypeCaracteristique[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static TypeCaracteristiqueRepository|RepositoryProxy repository()
 * @method TypeCaracteristique|Proxy create(array|callable $attributes = [])
 */
final class TypeCaracteristiqueFactory extends ModelFactory
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
            'nom' => self::faker()->word(),
            'valeur_est_unique' => self::faker()->boolean(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(TypeCaracteristique $typeCaracteristique): void {})
        ;
    }

    protected static function getClass(): string
    {
        return TypeCaracteristique::class;
    }
}
