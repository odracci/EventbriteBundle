<?php

namespace SFBCN\EventbriteBundle\Entity\Mapper;

use SFBCN\EventbriteBundle\Eventbrite\MapperInterface;
use SFBCN\EventbriteBundle\Entity\Organizer as OrganizerEntity;

/**
 * The Organizer entity mapper.
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class Organizer implements MapperInterface
{
    /**
     * Maps an XML entity to an object entity
     *
     * @param \SimpleXMLElement $entity
     *
     * @return \SFBCN\EventbriteBundle\Entity\Organizer
     */
    public function map(\SimpleXMLElement $entity)
    {
        $organizer = new OrganizerEntity();

        $organizer->setId((int) $entity->id);
        $organizer->setDescription((string) $entity->description);
        $organizer->setName((string) $entity->name);
        $organizer->setUrl((string) $entity->url);

        return $organizer;
    }
}
