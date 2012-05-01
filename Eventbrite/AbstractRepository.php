<?php

namespace SFBCN\EventbriteBundle\Eventbrite;

use Guzzle\Http\Client;

/**
 * The base repository class to inject the Guzzle client
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var \Guzzle\Http\Client
     */
    private $client;

    /**
     * @param \Guzzle\Http\Client $client
     */
    public function setClient(\Guzzle\Http\Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Guzzle\Http\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Class contructor
     * @param \Guzzle\Http\Client $client
     */
    public function __construct(\Guzzle\Http\Client $client)
    {
        $this->setClient($client);
    }
}