<?php

namespace SFBCN\EventbriteBundle\Eventbrite;

/**
 * The abstract entity mapper
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
abstract class AbstractMapper implements MapperInterface
{
    /**
     * @var \SFBCN\EventbriteBundle\Eventbrite\Mapper
     */
    private $mapper;

    /**
     * @param \SFBCN\EventbriteBundle\Eventbrite\Mapper $mapper
     */
    public function setMapper(\SFBCN\EventbriteBundle\Eventbrite\Mapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Eventbrite\Mapper
     */
    public function getMapper()
    {
        return $this->mapper;
    }

    /**
     * Class constructor. Sets the mapper manager.
     *
     * @param Mapper $mapper
     */
    public function __construct(\SFBCN\EventbriteBundle\Eventbrite\Mapper $mapper)
    {
        $this->setMapper($mapper);
    }
}
