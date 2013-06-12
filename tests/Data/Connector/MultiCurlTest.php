<?php

namespace Test\Data\Connector;

use Data\Connector\Curl\Factory;
/**
 * Test multi curl
 *
 * @author dcardin
 */
class MultiCurlTest extends \Test\BaseUnitTest{
    public function testSingleUrl(){  
        $curlHandle = Factory::create('http://www.iana.org/');
        $this->assertTrue(is_resource($curlHandle));
    }
}

