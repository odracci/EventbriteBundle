<?php

namespace SFBCN\EventbriteBundle\Eventbrite;

/**
 * A Eventbrite event
 *
 * @category Eventbrite
 * @package SFBCN\EventbriteBundle
 * @subpackage Eventbrite
 */
class Ticket
{
    /**
     * @var \SFBCN\EventbriteBundle\Eventbrite\Event
     */
    private $event;

    /**
     * 0 for fixed-price tickets, 1 for donations.
     * 0 will be used by default if not provided.
     *
     * @var boolean
     */
    private $isDonation;

    /**
     * The ticket name. (required)
     *
     * @var string
     */
    private $name;

    /**
     * The ticket description.
     *
     * @var string
     */
    private $description;

    /**
     * The ticket price. Enter 0.00 for free tickets. Leave blank for a donation amount.
     *
     * @var float
     */
    private $price;

    /**
     * The number of tickets available. Not required for donations.
     *
     * @var int
     */
    private $quantity;

    /**
     * The date and time when ticket sales start,
     * in ISO 8601 format (e.g., “2007-12-31 23:59:59″)
     *
     * @var \DateTime
     */
    private $startSales;

    /**
     * The date and time when ticket sales stop,
     * in ISO 8601 format (e.g., "2007-12-31 23:59:59")
     *
     * @var \DateTime
     */
    private $endSales;

    /**
     * 0 to add the Eventbrite service fee on top of ticket price, or 1 to include it in the ticket price.
     * 0 will be used by default if not provided.
     *
     * @var boolean
     */
    private $includeFee;

    /**
     * The minimum number of tickets per order.
     *
     * @var int
     */
    private $min;

    /**
     * The maximum number of tickets per order.
     *
     * @var int
     */
    private $max;

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
     * @param \DateTime $endSales
     */
    public function setEndSales(\DateTime $endSales)
    {
        $this->endSales = $endSales;
    }

    /**
     * @return \DateTime
     */
    public function getEndSales()
    {
        return $this->endSales;
    }

    /**
     * @param \SFBCN\EventbriteBundle\Eventbrite\Event $event
     */
    public function setEvent(\SFBCN\EventbriteBundle\Eventbrite\Event $event)
    {
        $this->event = $event;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Eventbrite\Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param boolean $includeFee
     */
    public function setIncludeFee($includeFee)
    {
        $this->includeFee = (boolean) $includeFee;
    }

    /**
     * @return boolean
     */
    public function getIncludeFee()
    {
        return $this->includeFee;
    }

    /**
     * @param boolean $isDonation
     */
    public function setIsDonation($isDonation)
    {
        $this->isDonation = (boolean) $isDonation;
    }

    /**
     * @return boolean
     */
    public function getIsDonation()
    {
        return $this->isDonation;
    }

    /**
     * @param int $max
     */
    public function setMax($max)
    {
        $this->max = $max;
    }

    /**
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param int $min
     */
    public function setMin($min)
    {
        $this->min = $min;
    }

    /**
     * @return int
     */
    public function getMin()
    {
        return $this->min;
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
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param \DateTime $startSales
     */
    public function setStartSales(\DateTime $startSales)
    {
        $this->startSales = $startSales;
    }

    /**
     * @return \DateTime
     */
    public function getStartSales()
    {
        return $this->startSales;
    }
}