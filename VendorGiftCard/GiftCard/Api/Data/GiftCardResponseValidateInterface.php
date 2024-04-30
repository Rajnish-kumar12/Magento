<?php

namespace VendorGiftCard\GiftCard\Api\Data;

interface GiftCardResponseValidateInterface
{
    /**
     * Get the status code of the response.
     *
     * @return int|null
     */
    public function getStatusCode();

    /**
     * Set the status code of the response.
     *
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode);

    /**
     * Get the status of the response.
     *
     * @return bool|null
     */
    public function getStatus();

    /**
     * Set the status of the response.
     *
     * @param bool $status
     * @return $this
     */
    public function setStatus($status);

    /**
     * Get the message of the response.
     *
     * @return string|null
     */
    public function getMessage();

    /**
     * Set the message of the response.
     *
     * @param string $message
     * @return $this
     */
    public function setMessage($message);

    /**
     * Get the data of the response.
     *
     * @return array|null
     */
    public function getData();

    /**
     * Set the data of the response.
     *
     * @param array $data
     * @return $this
     */
    public function setData(array $data);
}
