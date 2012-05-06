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
     * @var string
     */
    private $id;

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
     * The venue country name.
     *
     * @var string
     */
    private $country;

    /**
     * 2-letter country code, according to the ISO-3166-1 alpha-2 format.
     *
     * @var string
     */
    private $countryCode;

    /**
     * The venue GeoLocation in WGS84 (Longitude).
     *
     * @var double
     */
    private $longitude;

    /**
     * The venue GeoLocation in WGS84 (Latitude).
     *
     * @var double
     */
    private $latitude;

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
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return string
     */
    public function getLatLong()
    {
        return $this->getLatitude() . ' / ' . $this->getLongitude();
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Serializes a Venue into an array
     *
     * @return array
     */
    public function toArray()
    {
        $entity = array(
            'name'          => $this->getName(),
            'address'       => $this->getAddress(),
            'address_2'     => $this->getAddress2(),
            'city'          => $this->getCity(),
            'region'        => $this->getRegion(),
            'postal_code'   => $this->getPostalCode(),
            'country_code'  => $this->getCountryCode(),
            'latitude'      => $this->getLatitude(),
            'longitude'     => $this->getLongitude(),
            'Lat-Long'      => $this->getLatLong()
        );

        if (null !== $this->getId()) {
            $entity['id'] = $this->getId();
        }

        return $entity;
    }
}
