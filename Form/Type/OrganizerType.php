<?php

namespace SFBCN\EventbriteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use SFBCN\EventbriteBundle\Form\DataTransformer\VenueToIdTransformer;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormFactoryInterface;

use SFBCN\EventbriteBundle\Form\ChoiceList\OrganizerChoiceList;
use SFBCN\EventbriteBundle\Form\DataTransformer\OrganizerToIdTransformer;

/**
 * A form field type to show all the organizers
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class OrganizerType extends AbstractType
{
    /**
     * @var \SFBCN\EventbriteBundle\Form\ChoiceList\OrganizerChoiceList
     */
    private $organizerChoiceList;

    /**
     * @var \SFBCN\EventbriteBundle\Form\DataTransformer\OrganizerToIdTransformer
     */
    private $organizerToIdTransformer;

    /**
     * @param \SFBCN\EventbriteBundle\Form\ChoiceList\OrganizerChoiceList $organizerChoiceList
     */
    public function setOrganizerChoiceList(OrganizerChoiceList $organizerChoiceList)
    {
        $this->organizerChoiceList = $organizerChoiceList;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Form\ChoiceList\VenueChoiceList
     */
    public function getOrganizerChoiceList()
    {
        return $this->organizerChoiceList;
    }

    /**
     * Class constructor. Set up the dependencies
     *
     * @param \SFBCN\EventbriteBundle\Form\ChoiceList\VenueChoiceList $organizerChoiceList
     * @param \SFBCN\EventbriteBundle\Form\DataTransformer\OrganizerToIdTransformer $organizerToIdTransformer
     */
    public function __construct(OrganizerChoiceList $organizerChoiceList, OrganizerToIdTransformer $organizerToIdTransformer)
    {
        $this->setOrganizerChoiceList($organizerChoiceList);
        $this->setOrganizerToIdTransformer($organizerToIdTransformer);
    }

    /**
     * @param \SFBCN\EventbriteBundle\Form\DataTransformer\OrganizerToIdTransformer $organizerToIdTransformer
     */
    public function setOrganizerToIdTransformer(OrganizerToIdTransformer $organizerToIdTransformer)
    {
        $this->organizerToIdTransformer = $organizerToIdTransformer;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Form\DataTransformer\OrganizerToIdTransformer
     */
    public function getOrganizerToIdTransformer()
    {
        return $this->organizerToIdTransformer;
    }

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
                ->add('organizer', 'choice', array('choice_list' => $this->getOrganizerChoiceList()))
                ->appendClientTransformer($this->getOrganizerToIdTransformer())
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
        return 'organizer';
    }
}
