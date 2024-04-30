<?php

namespace VendorGiftCard\GiftCard\Model;

use VendorGiftCard\GiftCard\Api\GiftCardManagementInterface;
use VendorGiftCard\GiftCard\Api\Data\GiftCardResponseInterface;
use Magento\GiftCardAccount\Helper\Data as GiftCardHelper;
use Magento\GiftCardAccount\Model\GiftcardaccountFactory;
use Magento\Store\Model\StoreManagerInterface;

class GiftCardRedeem implements GiftCardManagementInterface
{
    protected $giftCardHelper;
    protected $giftCardFactory;
    protected $storeManager;
    protected $redeemResponse;

    public function __construct(
        GiftCardHelper $giftCardHelper,
        GiftcardaccountFactory $giftCardFactory,
        StoreManagerInterface $storeManager,
        GiftCardResponseInterface $redeemResponse
    ) {
        $this->giftCardHelper = $giftCardHelper;
        $this->giftCardFactory = $giftCardFactory;
        $this->storeManager = $storeManager;
        $this->redeemResponse = $redeemResponse;
    }

    public function redeemGiftCard($websiteId, $giftCardCode, $amount)
    {
        try {
            $this->storeManager->setCurrentStore($websiteId);

            $giftCard = $this->giftCardFactory->create()->loadByCode($giftCardCode);

            if ($giftCard && $giftCard->getWebsiteId() == $websiteId) {
                if ($amount <= $giftCard->getBalance()) {
                    // Charge the gift card with the specified amount
                    $this->giftCardFactory->create()
                        ->load($giftCard->getId())
                        ->charge($amount)
                        ->save();
                    $this->redeemResponse->setStatus(true);
                    $this->redeemResponse->setMessage("Redeemed successfully of amount: $$amount");
                    $this->redeemResponse->setData(['gift_card_id' => $giftCard->getId()]);
                } else {
                    $remainingBalance = $giftCard->getBalance();
                    $this->redeemResponse->setStatus(false);
                    $this->redeemResponse->setMessage("Error: Insufficient balance on the gift card. Your gift card balance is $remainingBalance.");
                }
            } else {
                $this->redeemResponse->setStatus(false);
                $this->redeemResponse->setMessage("Unable to redeem");
            }
        } catch (\Exception $e) {
            $this->redeemResponse->setStatus(false);
            $this->redeemResponse->setMessage($e->getMessage());
        }

        return $this->redeemResponse;
    }
}
