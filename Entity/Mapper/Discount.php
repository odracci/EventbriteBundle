<?php

namespace SFBCN\EventbriteBundle\Entity\Mapper;

use SFBCN\EventbriteBundle\Eventbrite\AbstractMapper;
use SFBCN\EventbriteBundle\Entity\Discount as DiscountEntity;

/**
 * The Discount entity mapper.
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class Discount extends AbstractMapper
{
    /**
     * Maps an XML entity to an object entity
     *
     * @param \SimpleXMLElement $entity
     *
     * @return \SFBCN\EventbriteBundle\Entity\Discount
     */
    public function map(\SimpleXMLElement $entity)
    {
        $discount = new DiscountEntity();

        $discount->setAmountOff((float) $entity->amount_off);
        $discount->setCode((string) $entity->code);

        if ($entity->end_date) {
            $discount->setEndDate(\DateTime::createFromFormat('Y-m-d H:i:s', (string) $entity->end_date));
        }

        $discount->setId((string) $entity->discount_id);
        $discount->setPercentOff((float) $entity->percent_off);
        $discount->setQuantityAvailable((int) $entity->quantity_available);
        $discount->setQuantitySold((int) $entity->quantity_sold);

        if ($entity->start_date) {
            $discount->setStartDate(\DateTime::createFromFormat('Y-m-d H:i:s', (string) $entity->start_date));
        }

        $discount->setTickets((string) $entity->tickets);

        return $discount;
    }
}
