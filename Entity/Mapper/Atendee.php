<?php

namespace SFBCN\EventbriteBundle\Entity\Mapper;

use SFBCN\EventbriteBundle\Eventbrite\AbstractMapper;
use SFBCN\EventbriteBundle\Entity\Atendee as AtendeeEntity;

/**
 * The Atendee entity mapper.
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class Atendee extends AbstractMapper
{
    /**
     * Maps an XML entity to an object entity
     *
     * @param \SimpleXMLElement $entity
     *
     * @return \SFBCN\EventbriteBundle\Entity\Atendee
     */
    public function map(\SimpleXMLElement $entity)
    {
        $atendee = new AtendeeEntity();

        $atendee->setAge((int) $entity->age);
        $atendee->setAmountPaid((float) $entity->amount_paid);
        $atendee->setAnswers((array) $entity->answers);
        $atendee->setBarcode((string) $entity->barcode);
        $atendee->setBirthDate(\DateTime::createFromFormat('Y-m-d', (string) $entity->birthdate));
        $atendee->setBlog((string) $entity->blog);
        $atendee->setCellPhone((string) $entity->cell_phone);
        $atendee->setCompany((string) $entity->company);
        $atendee->setCreated(\DateTime::createFromFormat('Y-m-d H:i:s', (string) $entity->created));
        $atendee->setCurrency((string) $entity->currency);
        $atendee->setDiscount((string) $entity->discount);
        $atendee->setEmail((string) $entity->email);
        $atendee->setEventDate(\DateTime::createFromFormat('Y-m-d H:i:s', (string) $entity->event_date));
        $atendee->setEventId((string) $entity->event_id);
        $atendee->setFirstName((string) $entity->first_name);
        $atendee->setGender((string) $entity->gender);
        $atendee->setHomeAddress((string) $entity->home_address);
        $atendee->setHomeAddress2((string) $entity->home_address_2);
        $atendee->setHomeCity((string) $entity->home_city);
        $atendee->setHomeCountry((string) $entity->home_country);
        $atendee->setHomeCountryCode((string) $entity->home_country_code);
        $atendee->setHomePhone((string) $entity->home_phone);
        $atendee->setHomePostalCode((string) $entity->home_postal_code);
        $atendee->setHomeRegion((string) $entity->home_region);
        $atendee->setId((string) $entity->id);
        $atendee->setJobTitle((string) $entity->job_title);
        $atendee->setLastName((string) $entity->last_name);
        $atendee->setModified(\DateTime::createFromFormat('Y-m-d H:i:s', (string) $entity->modified));
        $atendee->setNotes((string) $entity->notes);
        $atendee->setOrderId((string) $entity->order_id);
        $atendee->setOrderType((string) $entity->order_type);
        $atendee->setPrefix((string) $entity->prefix);
        $atendee->setQuantity((int) $entity->quantity);
        $atendee->setShipAddress((string) $entity->ship_address);
        $atendee->setShipAddress2((string) $entity->ship_address_2);
        $atendee->setShipCity((string) $entity->ship_city);
        $atendee->setShipCountry((string) $entity->ship_country);
        $atendee->setShipCountryCode((string) $entity->ship_country_code);
        $atendee->setShipPostalCode((string) $entity->ship_postal_code);
        $atendee->setShipRegion((string) $entity->ship_region);
        $atendee->setSuffix((string) $entity->suffix);
        $atendee->setTicketId((string) $entity->ticket_id);
        $atendee->setWebsite((string) $entity->website);
        $atendee->setWorkAddress((string) $entity->work_address);
        $atendee->setWorkAddress2((string) $entity->work_address_2);
        $atendee->setWorkCity((string) $entity->work_city);
        $atendee->setWorkCountry((string) $entity->work_country);
        $atendee->setWorkCountryCode((string) $entity->work_country_code);
        $atendee->setWorkPhone((string) $entity->work_phone);
        $atendee->setWorkPostalCode((string) $entity->work_postal_code);
        $atendee->setWorkRegion((string) $entity->work_region);

        return $atendee;
    }
}
