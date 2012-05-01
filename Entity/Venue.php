<?php

namespace SFBCN\EventbriteBundle\Entity;

/**
 * A venue class for Eventbrite events
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class Venue
{
    /**
     * The venue ID
     *
     * @var int
     */
    private $id;

    /**
     * The Eventbrite related organizer
     *
     * @var \SFBCN\EventbriteBundle\Entity\Organizer
     */
    private $organizer;

    /**
     * The venue name. (required)
     *
     * @var string
     */
    private $name;

    /**
     * The venue adress (line 1).
     *
     * @var string
     */
    private $address;

    /**
     * The venue adress (line 2).
     *
     * @var string
     */
    private $address2;

    /**
     * The venue city.
     *
     * @var string
     */
    private $city;

    /**
     * The venue state/province/county/territory depending on the country.
     * 2-letter state code is required for US addresses.
     *
     * @var string
     */
    private $region;

    /**
     * The postal code of the venue. (optional)
     *
     * @var string
     */
    private $postalCode;

    /**
     * 2-letter country code, according to the ISO-3166-1 alpha-2 format.
     *
     * @var string
     */
    private $countryCode;

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address2
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
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
     * @param \SFBCN\EventbriteBundle\Entity\Organizer $organizer
     */
    public function setOrganizer(\SFBCN\EventbriteBundle\Eventbrite\Organizer $organizer)
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
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
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
     * Serializes a Venue into an array
     *
     * @return array
     */
    public function toArray()
    {
        $entity = array(
            'organizer_id'  => $this->getOrganizer()->getId(),
            'name'          => $this->getName(),
            'address'       => $this->getAddress(),
            'address_2'     => $this->getAddress2(),
            'city'          => $this->getCity(),
            'region'        => $this->getRegion(),
            'postal_code'   => $this->getPostalCode(),
            'country_code'  => $this->getCountryCode()
        );

        if (null !== $this->getId()) {
            $entity['id'] = $this->getId();
        }

        return $entity;
    }
}
