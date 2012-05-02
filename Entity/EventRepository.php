<?php

namespace SFBCN\EventbriteBundle\Entity;

use SFBCN\EventbriteBundle\Eventbrite\AbstractRepository;
use SFBCN\EventbriteBundle\Entity\Event;
use SFBCN\EventbriteBundle\Eventbrite\Client;

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
     * @return \SFBCN\EventbriteBundle\Entity\Event
     */
    public function findEvent($eventId)
    {
        return $this->_executeCommand('event_get', array('id' => $eventId));
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
        return $this->_executeCommand('event_search', $eventParams);
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

    /**
     * Maps an entity from an XML/JSON representation to an object representation
     *
     * @param string $entity
     *
     * @return \SFBCN\EventbriteBundle\Entity\Event
     */
    public function map($entity)
    {
        $event = new Event();

        $event->setId((string) $entity->id);
        $event->setBackgroundColor((string) $entity->background_color);
        $event->setBoxBackgroundColor((string) $entity->box_background_color);
        $event->setBoxBorderColor((string) $entity->box_border_color);
        $event->setBoxHeaderBackgroundColor((string) $entity->box_header_background_color);
        $event->setBoxHeaderTextColor((string) $entity->box_header_text_color);
        $event->setBoxTextColor((string) $entity->box_text_color);
        $event->setLinkColor((string) $entity->link_color);
        $event->setNumAtendee((int) $entity->num_atendee_rows);
        $event->setTitle((string) $entity->title);
        $event->setDescription((string) $entity->description);
        $event->setStartDate(\DateTime::createFromFormat('Y-m-d H:i:s', (string) $entity->start_date));
        $event->setEndDate(\DateTime::createFromFormat('Y-m-d H:i:s', (string) $entity->end_date));
        $event->setTimezone(new \DateTimeZone((string) $entity->timezone));
        $event->setUrl((string) $entity->url);
        $event->setCapacity((int) $entity->capacity);
        $event->setCreated(\DateTime::createFromFormat('Y-m-d H:i:s', (string) $entity->created));
        $event->setModified(\DateTime::createFromFormat('Y-m-d H:i:s', (string) $entity->modified));
        $event->setPrivacy((string) $entity->privacy);
        $event->setUrl((string) $entity->url);
        $event->setLogo((string) $entity->logo);
        $event->setLogoSsl((string) $entity->logo_ssl);
        $event->setStatus((string) $entity->status);
        $event->setTextColor((string) $entity->text_color);

        return $event;
    }
}