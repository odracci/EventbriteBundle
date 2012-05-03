<?php

namespace SFBCN\EventbriteBundle\Entity;

use SFBCN\EventbriteBundle\Eventbrite\AbstractRepository;
use SFBCN\EventbriteBundle\Entity\EventRepository;
use SFBCN\EventbriteBundle\Entity\Organizer;
use SFBCN\EventbriteBundle\Eventbrite\Client;

/**
 * An EventRepository class to extract Events from the
 * domain model
 */
class OrganizerRepository extends AbstractRepository
{
    /**
     * @var \SFBCN\EventbriteBundle\Entity\EventRepository
     */
    private $eventRepository;

    /**
     * @param \SFBCN\EventbriteBundle\Entity\EventRepository $eventRepository
     */
    public function setEventRepository(\SFBCN\EventbriteBundle\Entity\EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Entity\EventRepository
     */
    public function getEventRepository()
    {
        return $this->eventRepository;
    }

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
        $command = $this->getClient()->getCommand('organizer_list_events', array('id' => $organizer->getId()));
        $response = $this->getClient()->execute($command);

        // Error?
        if (isset($response->error)) {
            throw new Client\Exception($response->error->error_type . ': ' . $response->error->error_message);
        }

        $events = array();
        foreach ($response->events as $event) {
            $events[] = $this->getEventRepository()->map($event);
        }

        return $events;
    }

    /**
     * Gets an event by its ID
     *
     * @param int $organizerId
     *
     * @return \SFBCN\EventbriteBundle\Entity\Organizer
     */
    public function findOrganizer($organizerId)
    {
        return $this->executeCommand('organizer_get', array('id' => $organizerId));
    }

    /**
     * Maps an entity from an XML/JSON representation to an object representation
     *
     * @param string $entity
     *
     * @return \SFBCN\EventbriteBundle\Entity\Organizer
     */
    public function map($entity)
    {
        $organizer = new Organizer();

        $organizer->setId((int) $entity->id);
        $organizer->setDescription((string) $entity->description);
        $organizer->setName((string) $entity->name);
        $organizer->setUrl((string) $entity->url);

        return $organizer;
    }
}