<?php

namespace VendorGiftCard\GiftCard\Api;

interface GiftCardManagementInterface
{
    /**
     * @param int $websiteId
     * @param string $giftCardCode
     * @param int $amount
     * @return \VendorGiftCard\GiftCard\Api\Data\GiftCardResponseInterface
     */
    public function redeemGiftCard($websiteId, $giftCardCode, $amount);
}
