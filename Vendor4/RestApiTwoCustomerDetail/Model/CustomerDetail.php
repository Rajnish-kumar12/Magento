<?php

namespace Vendor4\RestApiTwoCustomerDetail\Model;

use Vendor4\RestApiTwoCustomerDetail\Api\CustomerDetailInterface;
use Vendor4\RestApiTwoCustomerDetail\Api\Data\CustomerDetailResponseInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class CustomerDetail implements CustomerDetailInterface
{
    protected $customerRepository;
    protected $customerDetailResponse;

    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        CustomerDetailResponseInterface $customerDetailResponse
    ) {
        $this->customerRepository = $customerRepository;
        $this->customerDetailResponse = $customerDetailResponse;
    }

    public function getCustomerByEmail($email)
    {
        try {
            $customer = $this->customerRepository->get($email);

            $this->customerDetailResponse->setId($customer->getId());
            $this->customerDetailResponse->setEmail($customer->getEmail());
            $this->customerDetailResponse->setFirstName($customer->getFirstname());
            $this->customerDetailResponse->setLastName($customer->getLastname());

            return $this->customerDetailResponse;
        } catch (NoSuchEntityException $e) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __("Customer with email %1 doesn't exist", $email)
            );
        }
    }
}
