<?php

namespace SFBCN\EventbriteBundle\Tests\Form\ChoiceList;

use SFBCN\EventbriteBundle\Form\ChoiceList\VenueChoiceList;
use Mockery as m;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-05-16 at 08:35:22.
 */
class VenueChoiceListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var VenueChoiceList
     */
    protected $object;

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->object = null;
    }

    public function testNewVenueChoiceList()
    {
        $venue1 = m::mock('\SFBCN\EventbriteBundle\Entity\Venue');
        $venue1->shouldReceive('getId')->withNoArgs()->once()->andReturn(1);
        $venue1->shouldReceive('getName')->withNoArgs()->once()->andReturn('test1');

        $venue2 = m::mock('\SFBCN\EventbriteBundle\Entity\Venue');
        $venue2->shouldReceive('getId')->withNoArgs()->once()->andReturn(2);
        $venue2->shouldReceive('getName')->withNoArgs()->once()->andReturn('test2');

        $userRepository = m::mock('\SFBCN\EventbriteBundle\Entity\UserRepository');
        $userRepository->shouldReceive('getVenues')->once()->withNoArgs()->andReturn(array($venue1, $venue2));

        $this->object = new VenueChoiceList($userRepository);
        $result = $this->object->getChoices();

        $this->assertInternalType('array', $result);
        $this->assertCount(2, $result);
    }
}
