<?php

namespace VendorGiftCard\GiftCard\Api;

interface GiftCardValidateInterface
{
    /**
     * @param int $websiteId
     * @param string $giftCardCode
     * @return \VendorGiftCard\GiftCard\Api\Data\GiftCardResponseValidateInterface
     */
    public function validateGiftCard($websiteId, $giftCardCode);
}
