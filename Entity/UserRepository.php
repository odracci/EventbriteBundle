<?php

namespace SFBCN\EventbriteBundle\Entity;

use SFBCN\EventbriteBundle\Eventbrite\AbstractRepository;
use SFBCN\EventbriteBundle\Eventbrite\Client;

/**
 * An UserRepository class to extract Users from the
 * domain model
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class UserRepository extends AbstractRepository
{
    /**
     * Gets the current authenticated user
     *
     * @return \SFBCN\EventbriteBundle\Entity\User
     */
    public function findUser()
    {
        return $this->getMapper()->map($this->executeCommand('user.get'));
    }

    /**
     * Retrieves the authenticated user.
     *
     * @param \SFBCN\EventbriteBundle\Entity\User $user optional
     * @param string $doNotDisplay optional
     * @param string $eventStatuses optional
     * @param string $sort optional
     *
     * @return array
     */
    public function getEvents(User $user = null, $doNotDisplay = null, $eventStatuses = null, $sort = null)
    {
        $params = array();

        if (null !== $user) {
            $params['user'] = $user->getEmail();
        }

        if (null !== $doNotDisplay) {
            $params['do_not_display'] = $doNotDisplay;
        }

        if (null !== $eventStatuses) {
            $params['event_statuses'] = $eventStatuses;
        }

        if (null !== $sort) {
            $params['asc_or_desc'] = $sort;
        }

        $entities = $this->executeCommand('user.events', $params);

        $events = array();
        foreach ($entities as $entity) {
            $events[] = $this->getMapper()->map($entity);
        }

        return $events;
    }

    /**
     * Retrieves the authenticated user venues
     *
     * @return array
     */
    public function getVenues()
    {
        $entities = $this->executeCommand('user.events');

        $venues = array();
        foreach ($entities as $entity) {
            $venues[] = $this->getMapper()->map($entity);
        }

        return $venues;
    }

    /**
     * Retrives the authenticated user organizers registered at Eventbrite
     *
     * @return array
     */
    public function getOrganizers()
    {
        $entities = $this->executeCommand('user.organizers');

        $organizers = array();
        foreach ($entities as $entity) {
            $organizers[] = $this->getMapper()->map($entity);
        }

        return $organizers;
    }
}