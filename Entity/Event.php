<?php

namespace SFBCN\EventbriteBundle\Entity;

/**
 * A Eventbrite event
 *
 * @category Eventbrite
 * @package SFBCN\EventbriteBundle
 * @subpackage Eventbrite
 */
class Event
{
    const STATUS_DRAFT = 'draft';
    const STATUS_LIVE  = 'live';

    /**
     * The event ID
     *
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var string
     */
    private $timezone;

    /**
     * @var int
     */
    private $privacy;

    /**
     * @var string
     */
    private $personalizedUrl;

    /**
     * @var \SFBCN\EventbriteBundle\Eventbrite\Venue
     */
    private $venue;

    /**
     * @var \SFBCN\EventbriteBundle\Eventbrite\Organizer
     */
    private $organizer;

    /**
     * @var array
     */
    private $tickets;

    /**
     * @var int
     */
    private $capacity;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $customHeader;

    /**
     * @var string
     */
    private $customFooter;

    /**
     * @var string
     */
    private $backgroundColor;

    /**
     * @var string
     */
    private $textColor;

    /**
     * @var string
     */
    private $linkColor;

    /**
     * @var string
     */
    private $titleTextColor;

    /**
     * @var string
     */
    private $boxBackgroundColor;

    /**
     * @var string
     */
    private $boxTextColor;

    /**
     * @var string
     */
    private $boxBorderColor;

    /**
     * @var string
     */
    private $boxHeaderBackgroundColor;

    /**
     * @var string
     */
    private $boxHeaderTextColor;

    /**
     * @param string $backgroundColor
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * @param string $boxBackgroundColor
     */
    public function setBoxBackgroundColor($boxBackgroundColor)
    {
        $this->boxBackgroundColor = $boxBackgroundColor;
    }

    /**
     * @return string
     */
    public function getBoxBackgroundColor()
    {
        return $this->boxBackgroundColor;
    }

    /**
     * @param string $boxBorderColor
     */
    public function setBoxBorderColor($boxBorderColor)
    {
        $this->boxBorderColor = $boxBorderColor;
    }

    /**
     * @return string
     */
    public function getBoxBorderColor()
    {
        return $this->boxBorderColor;
    }

    /**
     * @param string $boxHeaderBackgroundColor
     */
    public function setBoxHeaderBackgroundColor($boxHeaderBackgroundColor)
    {
        $this->boxHeaderBackgroundColor = $boxHeaderBackgroundColor;
    }

    /**
     * @return string
     */
    public function getBoxHeaderBackgroundColor()
    {
        return $this->boxHeaderBackgroundColor;
    }

    /**
     * @param string $boxHeaderTextColor
     */
    public function setBoxHeaderTextColor($boxHeaderTextColor)
    {
        $this->boxHeaderTextColor = $boxHeaderTextColor;
    }

    /**
     * @return string
     */
    public function getBoxHeaderTextColor()
    {
        return $this->boxHeaderTextColor;
    }

    /**
     * @param string $boxTextColor
     */
    public function setBoxTextColor($boxTextColor)
    {
        $this->boxTextColor = $boxTextColor;
    }

    /**
     * @return string
     */
    public function getBoxTextColor()
    {
        return $this->boxTextColor;
    }

    /**
     * @param int $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

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
     * @param string $customFooter
     */
    public function setCustomFooter($customFooter)
    {
        $this->customFooter = $customFooter;
    }

    /**
     * @return string
     */
    public function getCustomFooter()
    {
        return $this->customFooter;
    }

    /**
     * @param string $customHeader
     */
    public function setCustomHeader($customHeader)
    {
        $this->customHeader = $customHeader;
    }

    /**
     * @return string
     */
    public function getCustomHeader()
    {
        return $this->customHeader;
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
     * @param string $linkColor
     */
    public function setLinkColor($linkColor)
    {
        $this->linkColor = $linkColor;
    }

    /**
     * @return string
     */
    public function getLinkColor()
    {
        return $this->linkColor;
    }

    /**
     * @param \SFBCN\EventbriteBundle\Eventbrite\Organizer $organizer
     */
    public function setOrganizer(\SFBCN\EventbriteBundle\Eventbrite\Organizer $organizer)
    {
        $this->organizer = $organizer;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Eventbrite\Organizer
     */
    public function getOrganizer()
    {
        return $this->organizer;
    }

    /**
     * @param string $personalizedUrl
     */
    public function setPersonalizedUrl($personalizedUrl)
    {
        $this->personalizedUrl = $personalizedUrl;
    }

    /**
     * @return string
     */
    public function getPersonalizedUrl()
    {
        return $this->personalizedUrl;
    }

    /**
     * @param int $privacy
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy;
    }

    /**
     * @return int
     */
    public function getPrivacy()
    {
        return $this->privacy;
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
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $textColor
     */
    public function setTextColor($textColor)
    {
        $this->textColor = $textColor;
    }

    /**
     * @return string
     */
    public function getTextColor()
    {
        return $this->textColor;
    }

    /**
     * @param array $tickets
     */
    public function setTickets(array $tickets)
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

    public function addTicket(\SFBCN\EventbriteBundle\Eventbrite\Ticket $ticket)
    {
        if (null === $this->tickets) {
            $this->tickets = array();
        }

        $this->tickets[] = $ticket;
    }

    /**
     * @param string $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $titleTextColor
     */
    public function setTitleTextColor($titleTextColor)
    {
        $this->titleTextColor = $titleTextColor;
    }

    /**
     * @return string
     */
    public function getTitleTextColor()
    {
        return $this->titleTextColor;
    }

    /**
     * @param \SFBCN\EventbriteBundle\Eventbrite\Venue $venue
     */
    public function setVenue(\SFBCN\EventbriteBundle\Eventbrite\Venue $venue)
    {
        $this->venue = $venue;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Eventbrite\Venue
     */
    public function getVenue()
    {
        return $this->venue;
    }
}