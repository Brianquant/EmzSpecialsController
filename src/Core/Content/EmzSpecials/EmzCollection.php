<?php

declare(strict_types=1);

namespace EmzSpecialsCollection\Core\Content\EmzSpecials;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                      add(ShopFinderCollection $entity)
 * @method void                      set(string $key, ShopFinderCollection $entity)
 * @method ShopFinderCollection[]    getIterator()
 * @method ShopFinderCollection[]    getElements()
 * @method ShopFinderCollection|null get(string $key)
 * @method ShopFinderCollection|null first()
 * @method ShopFinderCollection|null last()
 */
class EmzCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return EmzSpecialsEntity::class;
    }
}
