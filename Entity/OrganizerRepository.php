<?php

namespace SFBCN\EventbriteBundle\Entity;

use SFBCN\EventbriteBundle\Eventbrite\AbstractRepository;
use SFBCN\EventbriteBundle\Entity\EventRepository;
use SFBCN\EventbriteBundle\Entity\Organizer;
use SFBCN\EventbriteBundle\Eventbrite\Client;

/**
 * An OrganizerRepository class to extract Organizers from the
 * domain model
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class OrganizerRepository extends AbstractRepository
{
    /**
     * Gets a list of the events organized by a given organizer
     *
     * @param Organizer $organizer
     *
     * @return array
     * @throws \SFBCN\EventbriteBundle\Eventbrite\Client\Exception
     */
    public function getOrganizerEvents(Organizer $organizer)
    {
        $response = $this->executeCommand('organizer_list_events', array('id' => $organizer->getId()));

        $events = array();
        foreach ($response->events as $event) {
            $events[] = $this->getMapper()->map($event);
        }

        return $events;
    }

    /**
     * Gets an organizer by its ID
     *
     * @param int $organizerId
     *
     * @return \SFBCN\EventbriteBundle\Entity\Organizer
     */
    public function findOrganizer($organizerId)
    {
        return $this->getMapper()->map($this->executeCommand('organizer_get', array('id' => $organizerId)));
    }
}