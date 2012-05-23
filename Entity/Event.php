<?php

namespace SFBCN\EventbriteBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * A Eventbrite event entity
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class Event
{
    const STATUS_DRAFT     = 'Draft';
    const STATUS_LIVE      = 'Live';
    const STATUS_COMPLETED = 'Completed';

    const PRIVACY_PUBLIC  = 1;
    const PRIVACY_PRIVATE = 0;

    /**
     * The event ID
     *
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\MaxLength(255)
     */
    private $title;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @Assert\DateTime()
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @Assert\DateTime()
     */
    private $endDate;

    /**
     * @var \DateTimeZone
     *
     * @Assert\NotBlank()
     */
    private $timezone;

    /**
     * @var string
     *
     * @Assert\Url()
     */
    private $url;

    /**
     * @var int
     *
     * @Assert\Choice(choices = {"0" => "Private", "1" => "Public"})
     */
    private $privacy;

    /**
     * @var string
     *
     * @Assert\MaxLength(255)
     */
    private $personalizedUrl;

    /**
     * @var \SFBCN\EventbriteBundle\Entity\Venue
     *
     * @Assert\NotNull()
     * @Assert\Type(type="SFBCN\EventbriteBundle\Entity\Venue")
     */
    private $venue;

    /**
     * @var \SFBCN\EventbriteBundle\Entity\Organizer
     *
     * @Assert\NotNull()
     * @Assert\Type(type="SFBCN\EventbriteBundle\Entity\Organizer")
     */
    private $organizer;

    /**
     * @var array
     */
    private $tickets;

    /**
     * @var int
     *
     * @Assert\NotNull()
     */
    private $capacity;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     *
     * @Assert\Choice(choices = {"draft" => "Draft", "live" => "Live"})
     */
    private $status;

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
     * @var \DateTime
     *
     * @Assert\DateTime()
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @Assert\DateTime()
     */
    private $modified;

    /**
     * @var string
     */
    private $password;

    /**
     * @var int
     */
    private $numAtendee;

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
     * @param \SFBCN\EventbriteBundle\Entity\Organizer $organizer
     */
    public function setOrganizer(\SFBCN\EventbriteBundle\Entity\Organizer $organizer)
    {
        $this->organizer = $organizer;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Entity\Organizer
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

    /**
     * @param string|\DateTimeZone $timezone
     */
    public function setTimezone($timezone)
    {
        if (!($timezone instanceof \DateTimeZone)) {
            $timezone = new \DateTimeZone($timezone);
        }

        $this->timezone = $timezone;
    }

    /**
     * @return \DateTimeZone
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
     * @param \SFBCN\EventbriteBundle\Entity\Venue $venue
     */
    public function setVenue(\SFBCN\EventbriteBundle\Entity\Venue $venue)
    {
        $this->venue = $venue;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Entity\Venue
     */
    public function getVenue()
    {
        return $this->venue;
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
     * @param \DateTime $created
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    /**
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logoSsl
     */
    public function setLogoSsl($logoSsl)
    {
        $this->logoSsl = $logoSsl;
    }

    /**
     * @return string
     */
    public function getLogoSsl()
    {
        return $this->logoSsl;
    }

    /**
     * @param int $numAtendee
     */
    public function setNumAtendee($numAtendee)
    {
        $this->numAtendee = $numAtendee;
    }

    /**
     * @return int
     */
    public function getNumAtendee()
    {
        return $this->numAtendee;
    }

    /**
     * Get the remaining spaces for the event
     *
     * @return int
     */
    public function getRemainingSpaces()
    {
        return $this->getCapacity() - $this->getNumAtendee();
    }

    /**
     * Serialize this entity into an array
     *
     * @return array
     */
    public function toArray()
    {
        $result = array(
            'title'                         => $this->getTitle(),
            'background_color'              => $this->getBackgroundColor(),
            'box_background_color'          => $this->getBoxBackgroundColor(),
            'box_header_background_color'   => $this->getBoxHeaderBackgroundColor(),
            'box_border_color'              => $this->getBoxBorderColor(),
            'box_header_text_color'         => $this->getBoxHeaderTextColor(),
            'box_text_color'                => $this->getBoxTextColor(),
            'capacity'                      => $this->getCapacity(),
            'currency'                      => $this->getCurrency(),
            'description'                   => $this->getDescription(),
            'end_date'                      => $this->getEndDate()->format('Y-m-d H:i:s'),
            'link_color'                    => $this->getLinkColor(),
            'organizer_id'                  => $this->getOrganizer()->getId(),
            'personalized_url'              => $this->getPersonalizedUrl(),
            'privacy'                       => $this->getPrivacy(),
            'start_date'                    => $this->getStartDate()->format('Y-m-d H:i:s'),
            'status'                        => $this->getStatus(),
            'text_color'                    => $this->getTextColor(),
            'timezone'                      => $this->getTimezone()->getName(),
            'title_text_color'              => $this->getTitleTextColor(),
            'venue_id'                      => $this->getVenue()->getId()
        );

        if (null !== $this->getId()) {
            $result['id'] = $this->getId();
        }

        return $result;
    }
}