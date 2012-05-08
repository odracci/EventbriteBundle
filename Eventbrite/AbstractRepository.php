<?php

namespace SFBCN\EventbriteBundle\Eventbrite;

use Guzzle\Service\Client;
use SFBCN\EventbriteBundle\Eventbrite\Mapper;
use SFBCN\EventbriteBundle\Eventbrite\Client\Exception as EventbriteClientException;

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
     * @var \SFBCN\EventbriteBundle\Eventbrite\Mapper
     */
    private $mapper;

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
     * @param \SFBCN\EventbriteBundle\Eventbrite\Mapper $mapper
     */
    public function setMapper(\SFBCN\EventbriteBundle\Eventbrite\Mapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Eventbrite\Mapper
     */
    public function getMapper()
    {
        return $this->mapper;
    }

    /**
     * Class contructor
     *
     * @param \Guzzle\Service\Client $client
     * @param \SFBCN\EventbriteBundle\Eventbrite\Mapper $mapper
     */
    public function __construct($client, Mapper $mapper)
    {
        $this->setClient($client);
        $this->setMapper($mapper);
    }

    /**
     * Executes a command with a given arguments
     *
     * @param string $commandName
     * @param array $commandArgs
     *
     * @throw \SFBCN\EventbriteBundle\Eventbrite\Client\Exception
     * @return \SimpleXMLElement
     */
    public function executeCommand($commandName, array $commandArgs = array())
    {
        $command = $this->getClient()->getCommand($commandName, $commandArgs);
        $response = $this->getClient()->execute($command);

        // Error?
        if (isset($response->error)) {
            throw new EventbriteClientException($response->error->error_type . ': ' . $response->error->error_message);
        }

        return $response;
    }
}