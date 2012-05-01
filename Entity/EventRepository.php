<?php

namespace SFBCN\EventbriteBundle\Entity;

use SFBCN\EventbriteBundle\Eventbrite\AbstractRepository;
use SFBCN\EventbriteBundle\Entity\Event;

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
        $command = $this->getClient()->getCommand('event_get', array('id' => $eventId));
        $response = $this->getClient()->execute($command);
        $entity = simplexml_load_string($response->getBody(true));

        return $this->map($entity);
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

        $event->setId((int) $entity->id);
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