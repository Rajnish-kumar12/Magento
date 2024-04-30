<?php

namespace VendorGiftCard\GiftCard\Model;

use VendorGiftCard\GiftCard\Api\Data\GiftCardResponseInterface;

class GiftCardResponse implements GiftCardResponseInterface
{
    protected $statusCode;
    protected $status;
    protected $message;
    protected $data;

    /**
     * Get the status code of the response.
     *
     * @return int|null
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the status code of the response.
     *
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Get the status of the response.
     *
     * @return bool|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the status of the response.
     *
     * @param bool $status
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
     * @return string|null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the message of the response.
     *
     * @param string $message
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
     * @return array|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the data of the response.
     *
     * @param array $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Convert the response to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
            'data' => $this->data
        ];
    }
}
