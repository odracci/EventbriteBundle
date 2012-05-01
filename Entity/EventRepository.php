<?php

namespace SFBCN\EventbriteBundle\Entity;

use SFBCN\EventbriteBundle\Eventbrite\AbstractRepository;

/**
 * An EventRepository class to extract Events from the
 * domain model
 */
class EventRepository extends AbstractRepository
{
    /**
     * Gets an event by its ID
     *
     * @param int $eventId
     *
     * @return object
     */
    public function findEvent($eventId)
    {
        $response = $this->getClient()->event_get(array('id' => $eventId));
        $body = new \SimpleXMLElement($response->getBody(true));

        return $this->map($body);
    }

    /**
     * Maps an entity from an XML representation to an object representation
     *
     * @param string $entity
     *
     * @return object
     */
    public function map($entity)
    {

    }
}