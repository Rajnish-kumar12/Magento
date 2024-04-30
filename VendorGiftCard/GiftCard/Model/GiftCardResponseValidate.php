<?php

namespace VendorGiftCard\GiftCard\Model;

use VendorGiftCard\GiftCard\Api\Data\GiftCardResponseValidateInterface;

class GiftCardResponseValidate implements GiftCardResponseValidateInterface
{
    /**
     * @var int|null The status code of the response.
     */
    protected $statusCode;

    /**
     * @var int|null The ID of the gift card.
     */
    protected $giftCardId;

    /**
     * @var bool|null The status of the response.
     */
    protected $status;

    /**
     * @var string|null The message of the response.
     */
    protected $message;

    /**
     * @var array|null The data of the response.
     */
    protected $data;

    /**
     * Get the status code of the response.
     *
     * @return int|null The status code of the response.
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the status code of the response.
     *
     * @param int $statusCode The status code of the response.
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Get the gift card ID from the response.
     *
     * @return int|null The ID of the gift card.
     */
    public function getGiftCardId()
    {
        return $this->giftCardId;
    }

    /**
     * Set the gift card ID in the response.
     *
     * @param int $giftCardId The ID of the gift card.
     * @return $this
     */
    public function setGiftCardId($giftCardId)
    {
        $this->giftCardId = $giftCardId;
        return $this;
    }

    /**
     * Get the status of the response.
     *
     * @return bool|null The status of the response.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the status of the response.
     *
     * @param bool $status The status of the response.
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get the message of the response.
     *
     * @return string|null The message of the response.
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the message of the response.
     *
     * @param string $message The message of the response.
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Get the data of the response.
     *
     * @return array|null The data of the response.
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the data of the response.
     *
     * @param array $data The data of the response.
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }
}
