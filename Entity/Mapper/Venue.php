<?php

namespace SFBCN\EventbriteBundle\Entity\Mapper;

use SFBCN\EventbriteBundle\Eventbrite\AbstractMapper;
use SFBCN\EventbriteBundle\Entity\Venue as VenueEntity;

/**
 * The Venue entity mapper.
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class Venue extends AbstractMapper
{
    /**
     * Maps an XML entity to an object entity
     *
     * @param \SimpleXMLElement $entity
     *
     * @return \SFBCN\EventbriteBundle\Entity\Venue
     */
    public function map(\SimpleXMLElement $entity)
    {
        $venue = new VenueEntity();

        $venue->setAddress((string) $entity->address);
        $venue->setAddress2((string) $entity->address_2);
        $venue->setCity((string) $entity->city);
        $venue->setCountryCode((string) $entity->country_code);
        $venue->setCountry((string) $entity->country);
        $venue->setId((string) $entity->id);
        $venue->setLatitude((float) $entity->latitude);
        $venue->setLongitude((float) $entity->longitude);
        $venue->setName((string) $entity->name);
        $venue->setPostalCode((string) $entity->postal_code);
        $venue->setRegion((string) $entity->region);

        return $venue;
    }
}
