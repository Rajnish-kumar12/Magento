<?php

declare(strict_types=1);

namespace VendorGiftCard\GiftCard\Model;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\ObjectManager;
use Magento\GiftCardAccount\Api\GiftCardAccountRepositoryInterface;
use Magento\GiftCardAccount\Model\Spi\GiftCardAccountManagerInterface;
use Magento\CustomerBalance\Helper\Data as CustomerBalanceHelper;
use Magento\Store\Model\WebsiteFactory;
use VendorGiftCard\GiftCard\Api\GiftCardValidateInterface;
use VendorGiftCard\GiftCard\Api\Data\GiftCardResponseValidateInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class GiftCardValidate implements GiftCardValidateInterface
{
    protected $giftCardHelper;
    protected $storeManager;
    protected $manager;
    protected $repo;
    protected $customerBalanceHelper;
    protected $criteriaBuilder;
    protected $websiteFactory;
    protected $validateResponse;

    public function __construct(
        \Magento\GiftCardAccount\Helper\Data $giftCardHelper,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        GiftCardAccountManagerInterface $manager,
        GiftCardAccountRepositoryInterface $repo,
        CustomerBalanceHelper $customerBalanceHelper,
        SearchCriteriaBuilder $criteriaBuilder,
        WebsiteFactory $websiteFactory,
        GiftCardResponseValidateInterface $validateResponse
    ) {
        $this->giftCardHelper = $giftCardHelper;
        $this->storeManager = $storeManager;
        $this->manager = $manager;
        $this->repo = $repo;
        $this->customerBalanceHelper = $customerBalanceHelper;
        $this->criteriaBuilder = $criteriaBuilder;
        $this->websiteFactory = $websiteFactory;
        $this->validateResponse = $validateResponse;
    }

    public function validateGiftCard($websiteId, $giftCardCode)
    {
        try {
            // Get the website by ID
            $website = $this->websiteFactory->create()->load($websiteId);
            if (!$website || !$website->getId()) {
                throw new NoSuchEntityException(__("The website with ID %1 does not exist.", $websiteId));
            }

            // Request the gift card by code for the specific website
            $giftCard = $this->manager->requestByCode(
                $giftCardCode,
                (int)$website->getId(),
                null,
                true,
                true
            );

            $currency = $this->storeManager->getStore()->getBaseCurrency();
            $balance = $currency->convert($giftCard->getBalance());

            // Set response data
            $this->validateResponse->setStatus(true);
            $this->validateResponse->setStatusCode(200);
            $this->validateResponse->setMessage('Gift card validated successfully.');
            $this->validateResponse->setData(['balance' => $balance]);
        } catch (\InvalidArgumentException | NoSuchEntityException $e) {
            // Set response data for exception cases
            $this->validateResponse->setStatus(false);
            $this->validateResponse->setStatusCode(400);
            $this->validateResponse->setMessage('Invalid gift card code or expired.');
            $this->validateResponse->setData([]);
        }

        return $this->validateResponse;
    }
}
