<?php

namespace SFBCN\EventbriteBundle\Eventbrite;

/**
 * The Repository interface declaration
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
interface RepositoryInterface
{
    /**
     * Maps an entity from an XML representation to an object representation
     *
     * @param string $entity
     *
     * @return object
     */
    public function map($entity);
}
