<?php

namespace SFBCN\EventbriteBundle\Entity;

use SFBCN\EventbriteBundle\Eventbrite\AbstractRepository;

class EventRepository extends AbstractRepository
{
    /**
     * Gets an event by its ID
     *
     * @param int $eventId
     * @return stdClass
     */
    public function findEvent($eventId)
    {
        return $this->getClient()->event_get(array('id' => $eventId));
    }
}