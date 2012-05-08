<?php

namespace SFBCN\EventbriteBundle\Entity;

/**
 * An Eventbrite discount entity
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class Discount
{
    /**
     * The discount ID.
     *
     * @var string
     */
    private $id;

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
     * @var string
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
     * Number of times this discount has been used.
     *
     * @var int
     */
    private $quantitySold;

    /**
     * @var \SFBCN\EventbriteBundle\Entity\Event
     */
    private $event;

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
     * @param int $quantitySold
     */
    public function setQuantitySold($quantitySold)
    {
        $this->quantitySold = $quantitySold;
    }

    /**
     * @return int
     */
    public function getQuantitySold()
    {
        return $this->quantitySold;
    }

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
     * @param string $tickets
     */
    public function setTickets($tickets)
    {
        if (false !== strpos($tickets, ',')) {
            $this->tickets = array_map('trim', explode(',', $tickets));
        } else {
            $this->tickets = $tickets;
        }
    }

    /**
     * @return array
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * @param \SFBCN\EventbriteBundle\Entity\Ticket $ticket
     */
    public function addTicket(\SFBCN\EventbriteBundle\Entity\Ticket $ticket)
    {
        if (!in_array($ticket->getId(), $this->tickets)) {
            $this->tickets[] = $ticket;
        }
    }

    /**
     * @param \SFBCN\EventbriteBundle\Entity\Event $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Serializes the discount entity into an array
     *
     * @return array
     */
    public function toArray()
    {
        if (null === $this->getId() && null === $this->getEvent()) {
            throw new \BadMethodCallException('To serialize a discount into an array a Event must be provided');
        }

        $result = array(
            'code'                  => $this->getCode(),
            'amount_off'            => $this->getAmountOff(),
            'percent_off'           => $this->getPercentOff(),
            'tickets'               => implode(',', $this->getTickets()),
            'start_date'            => $this->getStartDate()->format('Y-m-d H:i:s'),
            'end_date'              => $this->getEndDate()->format('Y-m-d H:i:s'),
            'quantity_available'    => $this->getQuantityAvailable(),
            'quantity_sold'         => $this->getQuantitySold()
        );

        if (null !== $this->getId()) {
            $result['discount_id'] = $this->getId();
        } else {
            $result['event_id'] = $this->getEvent()->getId();
        }

        return $result;
    }
}