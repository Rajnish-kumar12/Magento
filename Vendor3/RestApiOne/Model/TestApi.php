<?php

namespace Vendor3\RestApiOne\Model;

use Vendor3\RestApiOne\Api\RestApiInterface;

class TestApi implements RestApiInterface
{
    public function test()
    {
        return "Test Api Completed!";
    }
}
