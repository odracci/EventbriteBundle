<?php

namespace SFBCN\EventbriteBundle\Eventbrite;

/**
 * An Eventbrite discount
 *
 * @category Eventbrite
 * @package SFBCN\EventbriteBundle
 * @subpackage Eventbrite
 */
class Discount
{
    /**
     * The related event
     *
     * @var \SFBCN\EventbriteBundle\Eventbrite\Event
     */
    private $event;

    /**
     * The discount code. Spaces, apostrophes and non-alphanumeric characters are not allowed, except for dashes and
     * underscores. Examples: “earlybirdspecial_08″, “membersonly”, “dc121232″.
     *
     * @var string
     */
    private $code;

    /**
     * The fixed amount off the ticket price. Each discount code can have a fixed discount amount or a variable
     * (percentage) discount amount, but not both
     *
     * @var float
     */
    private $amountOff;

    /**
     * The percentage off the ticket price. Each discount code can have a fixed discount amount or a variable
     * (percentage) discount amount, but not both
     *
     * @var float
     */
    private $percentOff;

    /**
     * A list of ticket-type IDs for which the discount applies. If not provided, the discount will apply
     * to all ticket types for this event.
     *
     * @var array
     */
    private $tickets;

    /**
     * Maximum number of times this discount can be used. If not provided, no maximum is set.
     *
     * @var int
     */
    private $quantityAvailable;

    /**
     * The discount start date and time, in ISO 8601 format (e.g., “2007-12-31 23:59:59″).
     *
     * @var \DateTime
     */
    private $startDate;

    /**
     * The discount end date and time, in ISO 8601 format (e.g., “2007-12-31 23:59:59″).
     *
     * @var \DateTime
     */
    private $endDate;

    /**
     * @param float $amountOff
     */
    public function setAmountOff($amountOff)
    {
        $this->amountOff = $amountOff;
    }

    /**
     * @return float
     */
    public function getAmountOff()
    {
        return $this->amountOff;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param \DateTime $endDate
     */
    public function setEndDate(\DateTime $endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
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
     * @param float $percentOff
     */
    public function setPercentOff($percentOff)
    {
        $this->percentOff = $percentOff;
    }

    /**
     * @return float
     */
    public function getPercentOff()
    {
        return $this->percentOff;
    }

    /**
     * @param int $quantityAvailable
     */
    public function setQuantityAvailable($quantityAvailable)
    {
        $this->quantityAvailable = $quantityAvailable;
    }

    /**
     * @return int
     */
    public function getQuantityAvailable()
    {
        return $this->quantityAvailable;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate(\DateTime $startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param array $tickets
     */
    public function setTickets($tickets)
    {
        $this->tickets = $tickets;
    }

    /**
     * @return array
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * @param \SFBCN\EventbriteBundle\Eventbrite\Ticket $ticket
     */
    public function addTicket(\SFBCN\EventbriteBundle\Eventbrite\Ticket $ticket)
    {
        $this->tickets[] = $ticket;
    }
}