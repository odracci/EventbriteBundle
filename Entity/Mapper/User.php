<?php

namespace SFBCN\EventbriteBundle\Entity\Mapper;

use SFBCN\EventbriteBundle\Eventbrite\AbstractMapper;
use SFBCN\EventbriteBundle\Entity\User as UserEntity;

/**
 * The User entity mapper.
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
     * @return \SFBCN\EventbriteBundle\Entity\User
     */
    public function map(\SimpleXMLElement $entity)
    {
        $user = new UserEntity();

        $user->setDateCreated(\DateTime::createFromFormat('Y-m-d H:i:s', (string) $entity->date_created));
        $user->setDateModified(\DateTime::createFromFormat('Y-m-d H:i:s', (string) $entity->date_modified));
        $user->setEmail((string) $entity->email);
        $user->setFirstName((string) $entity->first_name);
        $user->setId((string) $entity->id);
        $user->setLastName((string) $entity->last_name);
        $user->setSubusers((array) $entity->subusers);
        $user->setUserKey((string) $entity->user_key);

        return $user;
    }
}
