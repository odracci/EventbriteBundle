<?php

namespace SFBCN\EventbriteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormFactoryInterface;

use SFBCN\EventbriteBundle\Form\ChoiceList\VenueChoiceList;
use SFBCN\EventbriteBundle\Form\DataTransformer\VenueToIdTransformer;

/**
 * A form field type to show all the venues
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class VenueType extends AbstractType
{
    /**
     * @var \SFBCN\EventbriteBundle\Form\ChoiceList\VenueChoiceList
     */
    private $venueChoiceList;

    /**
     * @var \SFBCN\EventbriteBundle\Form\DataTransformer\VenueToIdTransformer
     */
    private $venueToIdTransformer;

    /**
     * @param \SFBCN\EventbriteBundle\Form\ChoiceList\VenueChoiceList $venueChoiceList
     */
    public function setVenueChoiceList(VenueChoiceList $venueChoiceList)
    {
        $this->venueChoiceList = $venueChoiceList;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Form\ChoiceList\VenueChoiceList
     */
    public function getVenueChoiceList()
    {
        return $this->venueChoiceList;
    }

    /**
     * Class constructor. Set up the dependencies
     *
     * @param \SFBCN\EventbriteBundle\Form\ChoiceList\VenueChoiceList $venueChoiceList
     * @param \SFBCN\EventbriteBundle\Form\DataTransformer\VenueToIdTransformer $venueToIdTransformer
     */
    public function __construct(VenueChoiceList $venueChoiceList, VenueToIdTransformer $venueToIdTransformer)
    {
        $this->setVenueChoiceList($venueChoiceList);
        $this->setVenueToIdTransformer($venueToIdTransformer);
    }

    /**
     * @param \SFBCN\EventbriteBundle\Form\DataTransformer\VenueToIdTransformer $venueToIdTransformer
     */
    public function setVenueToIdTransformer(VenueToIdTransformer $venueToIdTransformer)
    {
        $this->venueToIdTransformer = $venueToIdTransformer;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Form\DataTransformer\VenueToIdTransformer
     */
    public function getVenueToIdTransformer()
    {
        return $this->venueToIdTransformer;
    }

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
                ->add('venue', 'choice', array('choice_list' => $this->getVenueChoiceList()))
                ->appendClientTransformer($this->getVenueToIdTransformer())
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form)
    {
        $view->set('widget', $form->getAttribute('widget'));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'venue';
    }
}
