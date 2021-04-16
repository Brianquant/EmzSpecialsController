<?php

declare(strict_types=1);

namespace EmzSpecialsCollection\Storefront\Subscriber;

use Shopware\Core\Framework\Context;
use Shopware\Storefront\Page\GenericPageLoadedEvent;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Storefront\Page\Product\ProductPageLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Shopware\Storefront\Page\LandingPage\LandingPageLoadedEvent;
use Shopware\Storefront\Pagelet\Footer\FooterPageletLoadedEvent;
use EmzSpecialsCollection\Core\Content\EmzSpecials\EmzCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;


class SectionSubscriber implements EventSubscriberInterface
{
    /*
     * @var SystemConfigService
     */
    private $systemConfigService;

    /*
     * @var EntityRepositoryInterface
     */
    private $shopFinderRepository;

    public function __construct(
        SystemConfigService $systemConfigService,
        EntityRepositoryInterface $shopFinderRepository
    ) {
        $this->systemConfigService = $systemConfigService;
        $this->shopFinderRepository = $shopFinderRepository;
    }

    public static function getSubscribedEvents()
    {
        return [
            GenericPageLoadedEvent::class => 'onSectionPageletLoaded'
        ];
    }

    public function onSectionPageletLoaded(GenericPageLoadedEvent $event): void
    {
        if (!$this->systemConfigService->get('EmzSpecialsCollection.config.showInStorefront')) {
            return;
        }

        $shops = $this->fetchShop($event->getContext());

        $event->getPage()->addExtension('emz_specials_collection', $shops);
    }

    private function fetchShop(Context $context): EmzCollection
    {
        $criteria = new Criteria();
        $criteria->addAssociation('country');
        $criteria->addFilter(new EqualsFilter('active', '1'));
        $criteria->setLimit(4);

        return $this->shopFinderRepository->search($criteria, $context)->getEntities();
    }
}
