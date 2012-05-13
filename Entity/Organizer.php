<?php

namespace SFBCN\EventbriteBundle\Entity;

/**
 * An Eventbrite organizer
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class Organizer
{
    /**
     * The organizer ID.
     *
     * @var int
     */
    private $id;

    /**
     * The organizer name.
     *
     * @var string
     */
    private $name;

    /**
     * The organizer description.
     *
     * @var string
     */
    private $description;

    /**
     * The organizer URL.
     *
     * @var string
     */
    private $url;

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Serializes to an array the organizer entity
     *
     * @return array
     */
    public function toArray()
    {
        $result = array(
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'url' => $this->getUrl()
        );

        if (null !== $this->getId()) {
            $result['id'] = $this->getId();
        }

        return $result;
    }
}
