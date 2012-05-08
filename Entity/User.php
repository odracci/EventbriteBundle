<?php

namespace SFBCN\EventbriteBundle\Entity;

/**
 * The Eventbrite User entity
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class User
{
    /**
     * The User ID.
     *
     * @var string
     */
    private $id;

    /**
     * The user email address.
     *
     * @var string
     */
    private $email;

    /**
     * The first name of the user.
     *
     * @var string
     */
    private $first_name;

    /**
     * The last name of the user.
     *
     * @var string
     */
    private $last_name;

    /**
     * API user key. A non-revokable access token, which should be stored in place of an email and password combo.
     * This field is not included in OAuth2.0 access_token-based API requests.
     *
     * @var string
     */
    private $user_key;

    /**
     * The date and time the user was created, in ISO 8601 format (e.g., "2007-12-31 23:59:59").
     *
     * @var \DateTime
     */
    private $date_created;

    /**
     * The date and time the user was last modified, in ISO 8601 format (e.g., "2007-12-31 23:59:59").
     *
     * @var \DateTime
     */
    private $date_modified;

    /**
     * An array of ‘subuser’ objects that may have been granted access to this account. Object attributes include: id, email
     *
     * @var array
     */
    private $subusers;

    /**
     * @param \DateTime $date_created
     */
    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @param \DateTime $date_modified
     */
    public function setDateModified($date_modified)
    {
        $this->date_modified = $date_modified;
    }

    /**
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->date_modified;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param array $subusers
     */
    public function setSubusers($subusers)
    {
        $this->subusers = $subusers;
    }

    /**
     * @return array
     */
    public function getSubusers()
    {
        return $this->subusers;
    }

    /**
     * @param string $user_key
     */
    public function setUserKey($user_key)
    {
        $this->user_key = $user_key;
    }

    /**
     * @return string
     */
    public function getUserKey()
    {
        return $this->user_key;
    }
}
