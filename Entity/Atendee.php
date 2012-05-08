<?php

namespace SFBCN\EventbriteBundle\Entity;

/**
 * Atendee entity
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class Atendee
{
    /**
     * The atendee ID
     *
     * @var string
     */
    private $id;

    /**
     * Th event id
     *
     * @var string
     */
    private $event_id;

    /**
     * @var string
     */
    private $ticket_id;

    /**
     * The quantity of tickets purchased.
     *
     * @var int
     */
    private $quantity;

    /**
     * The ticket currency, in 3-letter ISO 4217 format (e.g., "USD").
     *
     * @var string
     */
    private $currency;

    /**
     * The amount paid by the attendee.
     *
     * @var float
     */
    private $amount_paid;

    /**
     * comma separated list of barcodes "0814847311126137001, 0814847311126137002, 0814847311126137003".
     *
     * @var array
     */
    private $barcode;

    /**
     * The Eventbrite order ID.
     *
     * @var string
     */
    private $order_id;

    /**
     * The type/status of order (Free Order, PayPal Completed, Pay By Check, etc).
     *
     * @var string
     */
    private $order_type;

    /**
     * The date and time the event was created, in ISO 8601 format (e.g., "2007-12-31 23:59:59").
     *
     * @var \DateTime
     */
    private $created;

    /**
     * The date and time the event was last modified, in ISO 8601 format (e.g., "2007-12-31 23:59:59").
     *
     * @var \DateTime
     */
    private $modified;

    /**
     * For repeat events only. Date the attendee has selected.
     *
     * @var \DateTime
     */
    private $event_date;

    /**
     * Discount code and amount used by the attendee.
     *
     * @var string
     */
    private $discount;

    /**
     * Optional notes.
     *
     * @var string
     */
    private $notes;

    /**
     * Email address of the attendee.
     *
     * @var string
     */
    private $email;

    /**
     * Prefix of the attendee.
     *
     * @var string
     */
    private $prefix;

    /**
     * First name of the attendee.
     *
     * @var string
     */
    private $first_name;

    /**
     * Last name of the attendee.
     *
     * @var string
     */
    private $last_name;

    /**
     * Suffix of the attendee.
     *
     * @var string
     */
    private $suffix;

    /**
     * Home address of the attendee.
     *
     * @var string
     */
    private $home_address;

    /**
     * Line 2 of the home address of the attendee.
     *
     * @var string
     */
    private $home_address_2;

    /**
     * Home city of the attendee.
     *
     * @var string
     */
    private $home_city;

    /**
     * Home postal code of the attendee.
     *
     * @var string
     */
    private $home_postal_code;

    /**
     * Home state/province/county of the attendee.
     *
     * @var string
     */
    private $home_region;

    /**
     * Home country name of the attendee.
     *
     * @var string
     */
    private $home_country;

    /**
     * Home country code of the attendee, in 2-letter ISO 3166 format (e.g., "US").
     *
     * @var string
     */
    private $home_country_code;

    /**
     * Home phone of the attendee.
     *
     * @var string
     */
    private $home_phone;

    /**
     * Cell phone of the attendee.
     *
     * @var string
     */
    private $cell_phone;

    /**
     * Shipping address of the attendee.
     *
     * @var string
     */
    private $ship_address;

    /**
     * Line 2 of the shipping address of the attendee.
     *
     * @var string
     */
    private $ship_address_2;

    /**
     * Shipping city of the attendee.
     *
     * @var string
     */
    private $ship_city;

    /**
     * Shipping postal code of the attendee.
     *
     * @var string
     */
    private $ship_postal_code;

    /**
     * Shipping state/province/county of the attendee.
     *
     * @var string
     */
    private $ship_region;

    /**
     * Shipping country name of the attendee.
     *
     * @var string
     */
    private $ship_country;

    /**
     * Shipping country code of the attendee, in 2-letter ISO 3166 format (e.g., “US”).
     *
     * @var string
     */
    private $ship_country_code;

    /**
     * Work address of the attendee.
     *
     * @var string
     */
    private $work_address;

    /**
     * Line 2 of the work address of the attendee.
     *
     * @var string
     */
    private $work_address_2;

    /**
     * Work city of the attendee.
     *
     * @var string
     */
    private $work_city;

    /**
     * Work postal code of the attendee.
     *
     * @var string
     */
    private $work_postal_code;

    /**
     * Work state/province/county of the attendee.
     *
     * @var string
     */
    private $work_region;

    /**
     * Work country name of the attendee.
     *
     * @var string
     */
    private $work_country;

    /**
     * Work country code of the attendee, in 2-letter ISO 3166 format (e.g., "US").
     *
     * @var string
     */
    private $work_country_code;

    /**
     * Work phone of the attendee.
     *
     * @var string
     */
    private $work_phone;

    /**
     * Job title of the attendee.
     *
     * @var string
     */
    private $job_title;

    /**
     * Company of the attendee.
     *
     * @var string
     */
    private $company;

    /**
     * Website link of the attendee.
     *
     * @var string
     */
    private $website;

    /**
     * Blog of the attendee.
     *
     * @var string
     */
    private $blog;

    /**
     * Gender of the attendee.
     *
     * @var string
     */
    private $gender;

    /**
     * Birth date of the attendee.
     *
     * @var \DateTime
     */
    private $birth_date;

    /**
     * Age of the attendee.
     *
     * @var int
     */
    private $age;

    /**
     * Array of 'answer' objects containing the following attributes: question_id, question, question_type, answer_text
     *
     * @var array
     */
    private $answers;

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param float $amount_paid
     */
    public function setAmountPaid($amount_paid)
    {
        $this->amount_paid = $amount_paid;
    }

    /**
     * @return float
     */
    public function getAmountPaid()
    {
        return $this->amount_paid;
    }

    /**
     * @param array $answers
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;
    }

    /**
     * @return array
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * @param array $barcode
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
    }

    /**
     * @return array
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @param \DateTime $birth_date
     */
    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * @param string $blog
     */
    public function setBlog($blog)
    {
        $this->blog = $blog;
    }

    /**
     * @return string
     */
    public function getBlog()
    {
        return $this->blog;
    }

    /**
     * @param string $cell_phone
     */
    public function setCellPhone($cell_phone)
    {
        $this->cell_phone = $cell_phone;
    }

    /**
     * @return string
     */
    public function getCellPhone()
    {
        return $this->cell_phone;
    }

    /**
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated($created)
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
     * @param string $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    /**
     * @return string
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param \DateTime $event_date
     */
    public function setEventDate($event_date)
    {
        $this->event_date = $event_date;
    }

    /**
     * @return \DateTime
     */
    public function getEventDate()
    {
        return $this->event_date;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $home_address
     */
    public function setHomeAddress($home_address)
    {
        $this->home_address = $home_address;
    }

    /**
     * @return string
     */
    public function getHomeAddress()
    {
        return $this->home_address;
    }

    /**
     * @param string $home_address_2
     */
    public function setHomeAddress2($home_address_2)
    {
        $this->home_address_2 = $home_address_2;
    }

    /**
     * @return string
     */
    public function getHomeAddress2()
    {
        return $this->home_address_2;
    }

    /**
     * @param string $home_city
     */
    public function setHomeCity($home_city)
    {
        $this->home_city = $home_city;
    }

    /**
     * @return string
     */
    public function getHomeCity()
    {
        return $this->home_city;
    }

    /**
     * @param string $home_country
     */
    public function setHomeCountry($home_country)
    {
        $this->home_country = $home_country;
    }

    /**
     * @return string
     */
    public function getHomeCountry()
    {
        return $this->home_country;
    }

    /**
     * @param string $home_country_code
     */
    public function setHomeCountryCode($home_country_code)
    {
        $this->home_country_code = $home_country_code;
    }

    /**
     * @return string
     */
    public function getHomeCountryCode()
    {
        return $this->home_country_code;
    }

    /**
     * @param string $home_phone
     */
    public function setHomePhone($home_phone)
    {
        $this->home_phone = $home_phone;
    }

    /**
     * @return string
     */
    public function getHomePhone()
    {
        return $this->home_phone;
    }

    /**
     * @param string $home_postal_code
     */
    public function setHomePostalCode($home_postal_code)
    {
        $this->home_postal_code = $home_postal_code;
    }

    /**
     * @return string
     */
    public function getHomePostalCode()
    {
        return $this->home_postal_code;
    }

    /**
     * @param string $home_region
     */
    public function setHomeRegion($home_region)
    {
        $this->home_region = $home_region;
    }

    /**
     * @return string
     */
    public function getHomeRegion()
    {
        return $this->home_region;
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
     * @param string $job_title
     */
    public function setJobTitle($job_title)
    {
        $this->job_title = $job_title;
    }

    /**
     * @return string
     */
    public function getJobTitle()
    {
        return $this->job_title;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
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
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $order_id
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param string $order_type
     */
    public function setOrderType($order_type)
    {
        $this->order_type = $order_type;
    }

    /**
     * @return string
     */
    public function getOrderType()
    {
        return $this->order_type;
    }

    /**
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
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
     * @param string $ship_address
     */
    public function setShipAddress($ship_address)
    {
        $this->ship_address = $ship_address;
    }

    /**
     * @return string
     */
    public function getShipAddress()
    {
        return $this->ship_address;
    }

    /**
     * @param string $ship_address_2
     */
    public function setShipAddress2($ship_address_2)
    {
        $this->ship_address_2 = $ship_address_2;
    }

    /**
     * @return string
     */
    public function getShipAddress2()
    {
        return $this->ship_address_2;
    }

    /**
     * @param string $ship_city
     */
    public function setShipCity($ship_city)
    {
        $this->ship_city = $ship_city;
    }

    /**
     * @return string
     */
    public function getShipCity()
    {
        return $this->ship_city;
    }

    /**
     * @param string $ship_country
     */
    public function setShipCountry($ship_country)
    {
        $this->ship_country = $ship_country;
    }

    /**
     * @return string
     */
    public function getShipCountry()
    {
        return $this->ship_country;
    }

    /**
     * @param string $ship_country_code
     */
    public function setShipCountryCode($ship_country_code)
    {
        $this->ship_country_code = $ship_country_code;
    }

    /**
     * @return string
     */
    public function getShipCountryCode()
    {
        return $this->ship_country_code;
    }

    /**
     * @param string $ship_postal_code
     */
    public function setShipPostalCode($ship_postal_code)
    {
        $this->ship_postal_code = $ship_postal_code;
    }

    /**
     * @return string
     */
    public function getShipPostalCode()
    {
        return $this->ship_postal_code;
    }

    /**
     * @param string $ship_region
     */
    public function setShipRegion($ship_region)
    {
        $this->ship_region = $ship_region;
    }

    /**
     * @return string
     */
    public function getShipRegion()
    {
        return $this->ship_region;
    }

    /**
     * @param string $suffix
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
    }

    /**
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @param string $ticket_id
     */
    public function setTicketId($ticket_id)
    {
        $this->ticket_id = $ticket_id;
    }

    /**
     * @return string
     */
    public function getTicketId()
    {
        return $this->ticket_id;
    }

    /**
     * @param string $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $work_address
     */
    public function setWorkAddress($work_address)
    {
        $this->work_address = $work_address;
    }

    /**
     * @return string
     */
    public function getWorkAddress()
    {
        return $this->work_address;
    }

    /**
     * @param string $work_address_2
     */
    public function setWorkAddress2($work_address_2)
    {
        $this->work_address_2 = $work_address_2;
    }

    /**
     * @return string
     */
    public function getWorkAddress2()
    {
        return $this->work_address_2;
    }

    /**
     * @param string $work_city
     */
    public function setWorkCity($work_city)
    {
        $this->work_city = $work_city;
    }

    /**
     * @return string
     */
    public function getWorkCity()
    {
        return $this->work_city;
    }

    /**
     * @param string $work_country
     */
    public function setWorkCountry($work_country)
    {
        $this->work_country = $work_country;
    }

    /**
     * @return string
     */
    public function getWorkCountry()
    {
        return $this->work_country;
    }

    /**
     * @param string $work_country_code
     */
    public function setWorkCountryCode($work_country_code)
    {
        $this->work_country_code = $work_country_code;
    }

    /**
     * @return string
     */
    public function getWorkCountryCode()
    {
        return $this->work_country_code;
    }

    /**
     * @param string $work_phone
     */
    public function setWorkPhone($work_phone)
    {
        $this->work_phone = $work_phone;
    }

    /**
     * @return string
     */
    public function getWorkPhone()
    {
        return $this->work_phone;
    }

    /**
     * @param string $work_postal_code
     */
    public function setWorkPostalCode($work_postal_code)
    {
        $this->work_postal_code = $work_postal_code;
    }

    /**
     * @return string
     */
    public function getWorkPostalCode()
    {
        return $this->work_postal_code;
    }

    /**
     * @param string $work_region
     */
    public function setWorkRegion($work_region)
    {
        $this->work_region = $work_region;
    }

    /**
     * @return string
     */
    public function getWorkRegion()
    {
        return $this->work_region;
    }

    /**
     * @param string $event_id
     */
    public function setEventId($event_id)
    {
        $this->event_id = $event_id;
    }

    /**
     * @return string
     */
    public function getEventId()
    {
        return $this->event_id;
    }
}
