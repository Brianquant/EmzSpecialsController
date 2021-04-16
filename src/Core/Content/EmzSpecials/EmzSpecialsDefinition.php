<?php

declare(strict_types=1);

namespace EmzSpecialsCollection\Core\Content\EmzSpecials;


use Shopware\Core\System\Country\CountryDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FloatField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;


class EmzSpecialsDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'emz_specials_collection';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getCollectionClass(): string
    {
        return EmzCollection::class;
    }

    public function getEntityClass(): string
    {
        return EmzSpecialsEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            new BoolField('active', 'active'),
            (new StringField('name', 'name'))->addFlags(new Required()),
            (new StringField('text', 'text'))->addFlags(new Required()),
            new FkField('country_id', 'CountryId', CountryDefinition::class),
            new ManyToOneAssociationField(
                'country',
                'country_id',
                CountryDefinition::class,
                'id'
            )

        ]);
    }
}
