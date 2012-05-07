<?php

namespace SFBCN\EventbriteBundle\Entity;

use SFBCN\EventbriteBundle\Eventbrite\AbstractRepository;
use SFBCN\EventbriteBundle\Entity\EventRepository;
use SFBCN\EventbriteBundle\Entity\Organizer;
use SFBCN\EventbriteBundle\Eventbrite\Client;

/**
 * An VenueRepository class to extract Venues from the
 * domain model
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class VenueRepository extends AbstractRepository
{
    /**
     * Gets a venue by its ID
     *
     * @param int $venueId
     *
     * @return \SFBCN\EventbriteBundle\Entity\Venue
     */
    public function findVenue($venueId)
    {
        return $this->getMapper()->map($this->executeCommand('venue_get', array('id' => $venueId)));
    }
}