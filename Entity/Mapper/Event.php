<?php

namespace SFBCN\EventbriteBundle\Entity\Mapper;

use SFBCN\EventbriteBundle\Eventbrite\AbstractMapper;
use SFBCN\EventbriteBundle\Entity\Event as EventEntity;

/**
 * The event entity mapper
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class Event extends AbstractMapper
{
    /**
     * Maps an XML entity to an object entity
     *
     * @param \SimpleXMLElement $entity
     *
     * @return \SFBCN\EventbriteBundle\Entity\Event
     */
    public function map(\SimpleXMLElement $entity)
    {
        $event = new EventEntity();

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

        // Associated entities
        $event->setOrganizer($this->getMapper()->map($entity->organizer));

        $tickets = array();
        if (isset($entity->tickets)) {
            foreach ($entity->tickets->ticket as $ticket) {
                $tickets[] = $this->getMapper()->map($ticket);
            }
        }
        $event->setTickets($tickets);

        return $event;
    }
}