<?php

namespace App\Factory;

use App\Entity\PhotoArticle;
use App\Repository\PhotoArticleRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<PhotoArticle>
 *
 * @method static PhotoArticle|Proxy createOne(array $attributes = [])
 * @method static PhotoArticle[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static PhotoArticle|Proxy find(object|array|mixed $criteria)
 * @method static PhotoArticle|Proxy findOrCreate(array $attributes)
 * @method static PhotoArticle|Proxy first(string $sortedField = 'id')
 * @method static PhotoArticle|Proxy last(string $sortedField = 'id')
 * @method static PhotoArticle|Proxy random(array $attributes = [])
 * @method static PhotoArticle|Proxy randomOrCreate(array $attributes = [])
 * @method static PhotoArticle[]|Proxy[] all()
 * @method static PhotoArticle[]|Proxy[] findBy(array $attributes)
 * @method static PhotoArticle[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static PhotoArticle[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static PhotoArticleRepository|RepositoryProxy repository()
 * @method PhotoArticle|Proxy create(array|callable $attributes = [])
 */
final class PhotoArticleFactory extends ModelFactory
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
            'photoRep' => self::faker()->imageUrl(640,480,'animals',true),
        ];
    }
    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(PhotoArticle $photoArticle): void {})
        ;
    }
    protected static function getClass(): string
    {
        return PhotoArticle::class;
    }
}
