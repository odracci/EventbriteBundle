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
        return $this->getMapper()->map($this->executeCommand('event.get', array('id' => $eventId)));
    }

    /**
     * Events search
     *
     * @param array $eventParams
     *
     * @return array
     */
    public function searchEvent(array $eventParams)
    {
        $entities = $this->executeCommand('event.search', $eventParams);

        $events = array();
        foreach ($entities->event as $entity) {
            $events[] = $this->getMapper()->map($entity);
        }

        return $events;
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
        $response = $this->executeCommand('event.copy', array('id' => $eventId, 'event_name' => $newEventName));

        return $this->findEvent((string) $response->id);
    }

    /**
     * Returns the list of discount codes for a given event.
     *
     * @param string $eventId
     *
     * @return array
     */
    public function getDiscounts($eventId)
    {
        $entities = $this->executeCommand('event.discounts', array('id' => $eventId));

        $discounts = array();
        foreach ($entities->discount as $discount) {
            $discounts[] = $this->getMapper()->map($discount);
        }

        return $discounts;
    }

    /**
     * Returns the list of atendees for a given even
     *
     * @param string $eventId
     * @param int $count
     * @param int $page
     * @param string  $doNotDisplay optional
     * @param boolean $showFullBarcodes
     *
     * @return array
     */
    public function getAtendees($eventId, $count = 50, $page = 1, $doNotDisplay = null, $showFullBarcodes = false)
    {
        $params = array(
            'id' => $eventId,
            'count' => $count,
            'page' => $page
        );

        if (null !== $doNotDisplay) {
            $params['do_not_display'] = $doNotDisplay;
        }

        if (false !== $showFullBarcodes) {
            $params['show_full_barcodes'] = $showFullBarcodes;
        }

        $entities = $this->executeCommand('event.atendees', $params);

        $atendees = array();
        foreach ($entities->atendee as $atendee) {
            $atendees[] = $this->getMapper()->map($atendee);
        }

        return $atendees;
    }
}