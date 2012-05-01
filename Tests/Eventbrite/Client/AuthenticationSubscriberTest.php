<?php

namespace Tests\Eventbrite\Client;

use SFBCN\EventbriteBundle\Eventbrite\Client\AuthenticationSubscriber;
use Mockery as m;

/**
 * Testsuite for \SFBCN\EventbriteBundle\Eventbrite\Client\AuthenticationSubscriber
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class AuthenticationSubscriberTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AuthenticationSubscriber
     */
    private $object;

    /**
     * Sets up the fixture
     */
    protected function setUp()
    {
        $this->object = new AuthenticationSubscriber('test', 'test');
    }

    /**
     * Tears down the fixture
     */
    protected function tearDown()
    {
        $this->object = null;
    }

    /**
     * Test case for SFBCN\EventbriteBundle\Eventbrite\Client\AuthenticationSubscriber::getSubscribedEvents
     *
     * @covers SFBCN\EventbriteBundle\Eventbrite\Client\AuthenticationSubscriber::getSubscribedEvents
     */
    public function testGetSubscribedEvents()
    {
        $this->assertEquals(array('request.before_send' => 'beforeSend'), AuthenticationSubscriber::getSubscribedEvents());
    }

    /**
     * Test case for SFBCN\EventbriteBundle\Eventbrite\Client\AuthenticationSubscriber::beforeSend
     *
     * @covers SFBCN\EventbriteBundle\Eventbrite\Client\AuthenticationSubscriber::beforeSend
     */
    public function testBeforeSend()
    {
        $query = m::mock('Guzzle\Common\Collection');
        $query->shouldReceive('add')->with('app_key', 'test')->once();
        $query->shouldReceive('add')->with('user_key', 'test')->once();

        $request = m::mock('Guzzle\Http\Message\Request');
        $request->shouldReceive('getQuery')->twice()->andReturn($query);

        $event = m::mock('Guzzle\Common\Event');
        $event->shouldReceive('offsetGet')->with('request')->once()->andReturn($request);

        $this->assertNull($this->object->beforeSend($event));
    }
}