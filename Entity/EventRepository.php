<?php

namespace SFBCN\EventbriteBundle\Entity;

use SFBCN\EventbriteBundle\Eventbrite\AbstractRepository;

class EventRepository extends AbstractRepository
{
    /**
     * Gets an event by its ID
     *
     * @param int $eventId
     * @return object
     */
    public function findEvent($eventId)
    {
        $response = $this->getClient()->event_get(array('id' => $eventId));
        $body = $response->getBody();
        return $this->map($body->read($body->getContentLength()));
    }

    /**
     * Maps an entity from an XML representation to an object representation
     *
     * @param string $entity
     * @return object
     */
    public function map($entity)
    {

    }
}