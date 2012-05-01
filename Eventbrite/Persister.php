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
        $method = $this->_extractMethod($entity, $forceUpdate);

        $request = $this->getClient()->get('/' . $method);
        $this->_setRequestQueryString($request, $entity);

        $response = $request->send();
        $xml = new \SimpleXMLElement($response->getBody(true));

        // Error?
        if (isset($xml->error)) {
            throw new Client\Exception($xml->error->error_type . ': ' . $xml->error->error_message);
        }

        $entity->setId((int) $xml->id);

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
     * Given an entity, extract the method to be called ("_new" or "_update")
     *
     * @param mixed   $entity
     * @param boolean $forUpdate
     *
     * @return string
     */
    private function _extractMethod($entity, $forUpdate = false)
    {
        $class = get_class($entity);

        if (false !== strpos($class, '\\')) {
            $class = array_slice(explode('\\', $class), -1);
            $class = $class[0];
        }

        return strtolower($class) . '_' . ($forUpdate ? 'update' : 'new');
    }

    /**
     * Given an entity and a Request object, set the query string params
     *
     * @param Guzzle\Http\Message\Request $request
     * @param mixed                       $entity
     */
    private function _setRequestQueryString(\Guzzle\Http\Message\Request $request, $entity)
    {
        foreach ($entity->toArray() as $key => $value) {
            $request->getQuery()->add($key, $value);
        }
    }
}