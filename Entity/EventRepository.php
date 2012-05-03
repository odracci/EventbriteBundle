<?php

namespace SFBCN\EventbriteBundle\Entity;

use SFBCN\EventbriteBundle\Eventbrite\AbstractRepository;
use SFBCN\EventbriteBundle\Entity\Event;
use SFBCN\EventbriteBundle\Eventbrite\Client;

/**
 * An EventRepository class to extract Events from the
 * domain model.
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class EventRepository extends AbstractRepository
{
    /**
     * Gets an event by its ID
     *
     * @param int $eventId
     *
     * @return \SFBCN\EventbriteBundle\Entity\Event
     */
    public function findEvent($eventId)
    {
        return $this->executeCommand('event_get', array('id' => $eventId));
    }

    /**
     * Events search
     *
     * @param array $eventParams
     *
     * @return mixed
     */
    public function searchEvent(array $eventParams)
    {
        return $this->executeCommand('event_search', $eventParams);
    }

    /**
     * This method duplicates an existing event, returning the new event. Events can not be copied from one user account
     * to another.
     *
     * @param string $eventId
     * @param string $newEventName
     *
     * @return \SFBCN\EventbriteBundle\Entity\Event
     *
     * @throws \SFBCN\EventbriteBundle\Eventbrite\Client\Exception
     */
    public function copyEvent($eventId, $newEventName)
    {
        $command = $this->getClient()->getCommand('event_copy', array('id' => $eventId, 'event_name' => $newEventName));
        $response = $this->getClient()->execute($command);

        // Error?
        if (isset($response->error)) {
            throw new Client\Exception($response->error->error_type . ': ' . $response->error->error_message);
        }

        return $this->findEvent((string) $response->process->id);
    }
}