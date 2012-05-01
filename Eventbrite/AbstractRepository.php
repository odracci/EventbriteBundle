<?php

namespace SFBCN\EventbriteBundle\Eventbrite;

use Guzzle\Service\Client;

/**
 * The base repository class to inject the Guzzle client
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var \Guzzle\Service\Client
     */
    private $client;

    /**
     * @param \Guzzle\Service\Client $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return \Guzzle\Service\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Class contructor
     * @param \Guzzle\Service\Client $client
     */
    public function __construct($client)
    {
        $this->setClient($client);
    }
}