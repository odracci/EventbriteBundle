<?php
/**
 * Eventbrite service definition
 *
 * @category Service
 * @package SFBCN\EventbriteBundle
 * @subpackage Eventbrite
 */

namespace SFBCN\EventbriteBundle\Eventbrite;

use Guzzle\Service\Client;
use Guzzle\Http\Message\Request;

/**
 * Eventbrite service
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class Persister
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
     * Class constructor
     *
     * @param \Guzzle\Service\Client $client
     */
    public function __construct($client)
    {
        $this->setClient($client);
    }

    /**
     * Saves an Eventbrite entity
     *
     * @param mixed   $entity
     * @param boolean $forceUpdate
     *
     * @throws \SFBCN\EventbriteBundle\Eventbrite\Client\Exception
     *
     * @return mixed
     */
    public function save($entity, $forceUpdate = false)
    {
        $commandName = $this->_extractCommandName($entity, $forceUpdate);
        $command = $this->getClient()->getCommand($commandName, $entity->toArray());
        $response = $this->getClient()->execute($command);

        // Error?
        if (isset($response->error)) {
            throw new Client\Exception($response->error->error_type . ': ' . $response->error->error_message);
        }

        $entity->setId((string) $response->id);

        return $entity;
    }

    /**
     * Try to perform an update against Eventbrite
     *
     * @param mixed $entity
     *
     * @return mixed
     */
    public function update($entity)
    {
        return $this->save($entity, true);
    }

    /**
     * Given an entity, extract the command name to be called ("_new" or "_update")
     *
     * @param mixed   $entity
     * @param boolean $forUpdate
     *
     * @return string
     */
    private function _extractCommandName($entity, $forUpdate = false)
    {
        $class = get_class($entity);

        if (false !== strpos($class, '\\')) {
            $class = array_slice(explode('\\', $class), -1);
            $class = $class[0];
        }

        return strtolower($class) . '.' . ($forUpdate ? 'update' : 'new');
    }
}