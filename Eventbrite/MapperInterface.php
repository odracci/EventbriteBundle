<?php

namespace SFBCN\EventbriteBundle\Eventbrite;

/**
 * Defines an interface for each mapper to implement. It's only
 * allowed to parse XML documents because with JSON it's not able
 * to know the name of the entity being mapped.
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
interface MapperInterface
{
    /**
     * Maps an XML entity to an object entity
     *
     * @param \SimpleXMLElement $entity
     *
     * @return object
     */
    public function map(\SimpleXMLElement $entity);
}
