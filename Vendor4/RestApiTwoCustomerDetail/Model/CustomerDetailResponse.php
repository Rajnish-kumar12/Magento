<?php

namespace Vendor4\RestApiTwoCustomerDetail\Model;

use Vendor4\RestApiTwoCustomerDetail\Api\Data\CustomerDetailResponseInterface;

class CustomerDetailResponse implements CustomerDetailResponseInterface
{
    protected $id;
    protected $email;
    protected $firstName;
    protected $lastName;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }
}
