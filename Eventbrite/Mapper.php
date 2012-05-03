<?php
/**
 * Eventbrite entity mapper definition
 *
 * @category Service
 * @package SFBCN\EventbriteBundle
 * @subpackage Eventbrite
 */

namespace SFBCN\EventbriteBundle\Eventbrite;

use SFBCN\EventbriteBundle\Eventbrite\MapperInterface;

/**
 * Eventbrite entity mapper
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class Mapper
{
    /**
     * @var array
     */
    private $mappers = array();

    /**
     * Maps an XML entity to its object representation
     *
     * @param \SimpleXMLElement $entity
     *
     * @return mixed
     */
    public function map(\SimpleXMLElement $entity)
    {
        // Decide which algorithm we are going to use
        $className = '\\SFBCN\\EventbriteBundle\\Entity\\Mapper\\' . ucfirst($entity->getName());
        if (!isset($this->mappers[$className])) {
            $this->mappers[$className] = new $className($this);
        }

        return $this->mappers[$className]->map($entity);
    }

    /**
     * Adds a mapper to the mapper stack
     *
     * @param \SFBCN\EventbriteBundle\Eventbrite\MapperInterface $mapper
     */
    public function addMapper(MapperInterface $mapper)
    {
        $this->mappers[get_class($mapper)] = $mapper;
    }
}