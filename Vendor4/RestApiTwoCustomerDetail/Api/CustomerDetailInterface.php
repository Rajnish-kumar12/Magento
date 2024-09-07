<?php

namespace Vendor4\RestApiTwoCustomerDetail\Api;

interface CustomerDetailInterface
{
    /**
     * Get customer details by email
     *
     * @param string $email
     * @return \Brainvire\RestApiTwoCustomerDetail\Api\Data\CustomerDetailResponseInterface
     */
    public function getCustomerByEmail($email);
}
