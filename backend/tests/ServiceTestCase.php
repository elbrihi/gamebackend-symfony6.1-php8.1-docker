<?php

namespace App\Tests;

use App\DTO\LowestPriceEnquiry;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ServiceTestCase extends WebTestCase
{
    protected ContainerInterface $container;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->container = static::createClient()->getContainer();

        // dd($this->container);
    }
}