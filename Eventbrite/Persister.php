<?php
/**
 * Eventbrite service definition
 *
 * @category Service
 * @package SFBCN\EventbriteBundle
 * @subpackage Eventbrite
 */

namespace SFBCN\EventbriteBundle\Eventbrite;

/**
 * Eventbrite service
 *
 * @category Eventbrite
 * @package SFBCN\EventbriteBundle
 * @subpackage Eventbrite
 */
class Service
{
    /**
     * @var \Eventbrite\Client
     */
    private $client;

    /**
     * The Eventbrite app key
     *
     * @var string
     */
    private $appKey;

    /**
     * The Eventbrite user key
     *
     * @var string
     */
    private $userKey;

    /**
     * Class constructor
     *
     * @param string $appKey
     * @param string $userKey
     */
    public function __construct($appKey, $userKey)
    {
        $this->setAppKey($appKey);
        $this->setUserKey($userKey);
    }

    /**
     * @param string $appKey
     */
    public function setAppKey($appKey)
    {
        $this->appKey = $appKey;
    }

    /**
     * @return string
     */
    public function getAppKey()
    {
        return $this->appKey;
    }

    /**
     * @param \Eventbrite\Client $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return \Eventbrite\Client
     */
    public function getClient()
    {
        if (null === $this->client) {
            $this->client = new EventbriteClient(
                array(
                    'app_key'  => $this->getAppKey(),
                    'user_key' => $this->getUserKey()
                )
            );
        }

        return $this->client;
    }

    /**
     * @param string $userKey
     */
    public function setUserKey($userKey)
    {
        $this->userKey = $userKey;
    }

    /**
     * @return string
     */
    public function getUserKey()
    {
        return $this->userKey;
    }

    /**
     * Saves an Eventbrite entity
     *
     * @param mixed $entity
     */
    public function save($entity)
    {
        if ($entity instanceof \SFBCN\EventbriteBundle\Eventbrite\Venue) {
            return $this->saveVenue($entity);
        }

        if ($entity instanceof \SFBCN\EventbriteBundle\Eventbrite\Organizer) {
            return $this->saveOrganizer($entity);
        }

        if ($entity instanceof \SFBCN\EventbriteBundle\Eventbrite\Ticket) {
            return $this->saveTickets((array) $entity);
        }

        if ($entity instanceof \SFBCN\EventbriteBundle\Eventbrite\Event) {
            return $this->saveEvent($entity);
        }
    }

    /**
     * Set the default values for the entity
     *
     * @param $entity
     * @param array $defaultValues
     */
    private function setDefaultValues($entity, array $defaultValues)
    {
        foreach ($defaultValues as $property => $value) {
            if (method_exists($this, ($setter = 'set' . ucfirst($property)))) {
                $entity->{$setter}($value);
            }
        }
    }

    private function saveVenue(\SFBCN\EventbriteBundle\Eventbrite\Venue $venue)
    {
        if (null !== $venue->getId()) {
            $this->getClient()->venue_update($venue->toArray());
        } else {
            $this->getClient()->venue_new($venue->toArray());
        }
    }

    private function saveOrganizer(\SFBCN\EventbriteBundle\Eventbrite\Organizer $organizer)
    {

    }

    private function saveTickets(array $tickets)
    {

    }

    private function saveEvent(\SFBCN\EventbriteBundle\Eventbrite\Event $event)
    {

    }
}
