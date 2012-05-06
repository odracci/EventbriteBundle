<?php

namespace SFBCN\EventbriteBundle\Entity\Mapper;

use SFBCN\EventbriteBundle\Eventbrite\AbstractMapper;
use SFBCN\EventbriteBundle\Entity\Ticket as TicketEntity;

/**
 * The Ticket entity mapper.
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class Ticket extends AbstractMapper
{
    /**
     * Maps an XML entity to an object entity
     *
     * @param \SimpleXMLElement $entity
     *
     * @return \SFBCN\EventbriteBundle\Entity\Ticket
     */
    public function map(\SimpleXMLElement $entity)
    {
        $ticket = new TicketEntity();

        $ticket->setCurrency((string) $entity->currency);
        $ticket->setDescription((string) $entity->description);
        $ticket->setEndDate(\DateTime::createFromFormat('Y-m-d H:i:s', (string) $entity->end_date));
        $ticket->setId((string) $entity->id);
        $ticket->setMax((int) $entity->max);
        $ticket->setMin((int) $entity->min);
        $ticket->setName((string) $entity->name);
        $ticket->setPrice((double) $entity->price);
        $ticket->setQuantityAvailable((int) $entity->quantity_available);
        $ticket->setQuantitySold((int) $entity->quantity_sold);
        $ticket->setStartDate(\DateTime::createFromFormat('Y-m-d H:i:s', (string) $entity->start_date));
        $ticket->setPrice((double) $entity->price);
        $ticket->setType((int) $entity->type);
        $ticket->setVisible('false' != $entity->visible);

        return $ticket;
    }
}
