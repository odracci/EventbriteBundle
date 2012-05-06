<?php

namespace SFBCN\EventbriteBundle\Entity;

/**
 * An Eventbrite ticket
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class Ticket
{
    /**
     * The ticket ID.
     *
     * @var string
     */
    private $id;

    /**
     * The ticket name.
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
     * 0 for fixed-price tickets, 1 for donations.
     *
     * @var int
     */
    private $type;

    /**
     * The maximum ticket quantity per order for this event.
     *
     * @var int
     */
    private $max;

    /**
     * The minimum ticket quantity per order for this event.
     *
     * @var int
     */
    private $min;

    /**
     * The ticket currency, in 3-letter ISO 4217 format (e.g., "USD").
     *
     * @var string
     */
    private $currency;

    /**
     * The ticket price (not provided if the ticket is a donation).
     *
     * @var float
     */
    private $price;

    /**
     * The date and time when ticket sales start, in ISO 8601 format (e.g., "2007-12-31 23:59:59").
     *
     * @var \DateTime
     */
    private $startDate;

    /**
     * The date and time when ticket sales stop, in ISO 8601 format (e.g., "2007-12-31 23:59:59").
     *
     * @var \DateTime
     */
    private $endDate;

    /**
     * Number of tickets for sale (requires authentication).
     *
     * @var int
     */
    private $quantityAvailable;

    /**
     * Number of tickets sold (requires authentication).
     *
     * @var int
     */
    private $quantitySold;

    /**
     * A boolean value indicating whether the ticket is visible on the event registration page.
     *
     * @var boolean
     */
    private $visible;

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

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
     * @param \DateTime $end_date
     */
    public function setEndDate($end_date)
    {
        $this->endDate = $end_date;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
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
     * @param int $quantity_available
     */
    public function setQuantityAvailable($quantity_available)
    {
        $this->quantityAvailable = $quantity_available;
    }

    /**
     * @return int
     */
    public function getQuantityAvailable()
    {
        return $this->quantityAvailable;
    }

    /**
     * @param int $quantity_sold
     */
    public function setQuantitySold($quantity_sold)
    {
        $this->quantitySold = $quantity_sold;
    }

    /**
     * @return int
     */
    public function getQuantitySold()
    {
        return $this->quantitySold;
    }

    /**
     * @param \DateTime $start_date
     */
    public function setStartDate($start_date)
    {
        $this->startDate = $start_date;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param boolean $visible
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    }

    /**
     * @return boolean
     */
    public function getVisible()
    {
        return $this->visible;
    }
}