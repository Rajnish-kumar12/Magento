<?php

namespace Vendor4\RestApiTwoCustomerDetail\Api\Data;

interface CustomerDetailResponseInterface
{
    /**
     * Set Customer ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get Customer ID
     *
     * @return int
     */
    public function getId();

    /**
     * Set Customer Email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * Get Customer Email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set Customer First Name
     *
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName);

    /**
     * Get Customer First Name
     *
     * @return string
     */
    public function getFirstName();

    /**
     * Set Customer Last Name
     *
     * @param string $lastName
     * @return $this
     */
    public function getLastName();

    /**
     * Get Customer Last Name
     *
     * @return string
     */
    public function setLastName($lastName);
}
