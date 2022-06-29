<?php

namespace App\Factory;

use App\Entity\Taxe;
use App\Repository\TaxeRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Taxe>
 *
 * @method static Taxe|Proxy createOne(array $attributes = [])
 * @method static Taxe[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Taxe|Proxy find(object|array|mixed $criteria)
 * @method static Taxe|Proxy findOrCreate(array $attributes)
 * @method static Taxe|Proxy first(string $sortedField = 'id')
 * @method static Taxe|Proxy last(string $sortedField = 'id')
 * @method static Taxe|Proxy random(array $attributes = [])
 * @method static Taxe|Proxy randomOrCreate(array $attributes = [])
 * @method static Taxe[]|Proxy[] all()
 * @method static Taxe[]|Proxy[] findBy(array $attributes)
 * @method static Taxe[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Taxe[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static TaxeRepository|RepositoryProxy repository()
 * @method Taxe|Proxy create(array|callable $attributes = [])
 */
final class TaxeFactory extends ModelFactory
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
            'libelle' => self::faker()->firstName(),
            'taux_taxe' => self::faker()->randomFloat(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Taxe $taxe): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Taxe::class;
    }
}
