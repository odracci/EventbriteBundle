<?php

namespace SFBCN\EventbriteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * A form type to persist the Event entity
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class EventType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title',              'text')
            ->add('description',        'textarea')
            ->add('start_date',         'datetime')
            ->add('end_date',           'datetime')
            ->add('timezone',           'timezone')
            ->add('privacy',            'choice', array('choices' => array('0' => 'Private', '1' => 'Public')))
            ->add('personalized_url',   'text')
            ->add('venue',              'venue')
            ->add('organizer',          'organizer')
            ->add('capacity',           'integer')
            ->add('currency',           'text')
            ->add('status',             'text')
        ;
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'sfbcn_eventbritebundle_eventtype';
    }

    /**
     * Get default options for this form
     *
     * @return array
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class'      => 'SFBCN\EventbriteBundle\Entity\Event',
            'csrf_protection' => true,
            'intention'       => 'sfbcn_eventbrite_event'
        );
    }
}
