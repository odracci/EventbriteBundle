<?php

namespace SFBCN\EventbriteBundle\Form\ChoiceList;

use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface;
use SFBCN\EventbriteBundle\Entity\UserRepository;

/**
 * A concrete ChoiceList to show all the venues associated to the
 * current user
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class VenueChoiceList implements ChoiceListInterface
{
    /**
     * @var \SFBCN\EventbriteBundle\Entity\UserRepository
     */
    private $userRepository;

    /**
     * @var bool
     */
    protected $loaded = false;

    /**
     * @var array
     */
    protected $choices = array();

    /**
     * @param \SFBCN\EventbriteBundle\Entity\UserRepository $userRepository
     */
    public function setUserRepository($userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Entity\UserRepository
     */
    public function getUserRepository()
    {
        return $this->userRepository;
    }

    /**
     * @return boolean
     */
    public function isLoaded()
    {
        return $this->loaded;
    }

    /**
     * Class constructor
     *
     * @param \SFBCN\EventbriteBundle\Entity\UserRepository $userRepository
     */
    public function __construct(\SFBCN\EventbriteBundle\Entity\UserRepository $userRepository)
    {
        $this->setUserRepository($userRepository);
    }

    /**
     * Returns a list of choices
     *
     * @return array
     */
    public function getChoices()
    {
        if (!$this->isLoaded()) {
            $this->load();
        }

        return $this->choices;
    }

    /**
     * Initializes the list of Venues
     */
    protected function load()
    {
        $this->loaded = true;

        $venues = $this->getUserRepository()->getVenues();

        foreach ($venues as $venue) {
            $this->choices[$venue->getId()] = $venue->getName();
        }
    }
}