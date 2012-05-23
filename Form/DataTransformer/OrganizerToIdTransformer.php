<?php

namespace SFBCN\EventbriteBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Form\Exception\TransformationFailedException;

use SFBCN\EventbriteBundle\Entity\Organizer;

/**
 * A data transformer for the Organizer entity
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class OrganizerToIdTransformer implements DataTransformerInterface
{
    /**
     * @var \SFBCN\EventbriteBundle\Entity\OrganizerRepository
     */
    private $organizerRepository;

    /**
     * @param \SFBCN\EventbriteBundle\Entity\VenueRepository $organizerRepository
     */
    public function setOrganizerRepository(\SFBCN\EventbriteBundle\Entity\OrganizerRepository $organizerRepository)
    {
        $this->organizerRepository = $organizerRepository;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Entity\OrganizerRepository
     */
    public function getOrganizerRepository()
    {
        return $this->organizerRepository;
    }

    /**
     * Class constructor. Sets up the dependencies
     *
     * @param \SFBCN\EventbriteBundle\Entity\OrganizerRepository $organizerRepository
     */
    public function __construct(\SFBCN\EventbriteBundle\Entity\OrganizerRepository $organizerRepository)
    {
        $this->setOrganizerRepository($organizerRepository);
    }

    /**
     * Transforms a value from the original representation to a transformed representation.
     *
     * This method is called on two occasions inside a form field:
     *
     * 1. When the form field is initialized with the data attached from the datasource (object or array).
     * 2. When data from a request is bound using {@link Field::bind()} to transform the new input data
     *    back into the renderable format. For example if you have a date field and bind '2009-10-10' onto
     *    it you might accept this value because its easily parsed, but the transformer still writes back
     *    "2009/10/10" onto the form field (for further displaying or other purposes).
     *
     * This method must be able to deal with empty values. Usually this will
     * be NULL, but depending on your implementation other empty values are
     * possible as well (such as empty strings). The reasoning behind this is
     * that value transformers must be chainable. If the transform() method
     * of the first value transformer outputs NULL, the second value transformer
     * must be able to process that value.
     *
     * By convention, transform() should return an empty string if NULL is
     * passed.
     *
     * @param  mixed $value              The value in the original representation
     *
     * @return mixed                     The value in the transformed representation
     *
     * @throws UnexpectedTypeException   when the argument is not a string
     * @throws TransformationFailedException  when the transformation fails
     */
    public function transform($value)
    {
        if (!($value instanceof Organizer)) {
            throw new UnexpectedTypeException($value, 'SFBCN\EventbriteBundle\Entity\Organizer');
        }

        return $value->getId();
    }

    /**
     * Transforms a value from the transformed representation to its original
     * representation.
     *
     * This method is called when {@link Field::bind()} is called to transform the requests tainted data
     * into an acceptable format for your data processing/model layer.
     *
     * This method must be able to deal with empty values. Usually this will
     * be an empty string, but depending on your implementation other empty
     * values are possible as well (such as empty strings). The reasoning behind
     * this is that value transformers must be chainable. If the
     * reverseTransform() method of the first value transformer outputs an
     * empty string, the second value transformer must be able to process that
     * value.
     *
     * By convention, reverseTransform() should return NULL if an empty string
     * is passed.
     *
     * @param  mixed $value              The value in the transformed representation
     *
     * @return mixed                     The value in the original representation
     *
     * @throws UnexpectedTypeException   when the argument is not of the expected type
     * @throws TransformationFailedException  when the transformation fails
     */
    public function reverseTransform($value)
    {
        if (!is_string($value)) {
            throw new UnexpectedTypeException($value, 'string');
        }

        return $this->getOrganizerRepository()->findOrganizer($value);
    }
}
