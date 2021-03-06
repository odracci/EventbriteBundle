<?php

namespace SFBCN\EventbriteBundle\Eventbrite;

use SFBCN\EventbriteBundle\Entity\Event;
use Guzzle\Service\Client;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;
use Guzzle\Common\Collection;
use Mockery as m;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-05-01 at 00:37:43.
 */
class PersisterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Persister
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

    /**
     * testSave data provider
     *
     * @return array
     */
    public function saveDataProvider()
    {
        return array(
            array('.new', false),
            array('.update', true)
        );
    }

    /**
     * Test case for SFBCN\EventbriteBundle\Eventbrite\Service::save
     *
     * @param string $suffix
     * @param boolean $forceUpdate
     *
     * @covers SFBCN\EventbriteBundle\Eventbrite\Service::save
     * @dataProvider saveDataProvider
     */
    public function testSave($suffix, $forceUpdate)
    {
        $response = simplexml_load_string('<?xml version="1.0" encoding="utf-8"?><process><id>1</id></process>');
        $command = m::mock('\Guzzle\Service\Command\AbstractCommand');

        $entity = m::mock('\SFBCN\EventbriteBundle\Entity\Event');
        $entity->shouldReceive('toArray')->andReturn(array('key1' => 'value1', 'key2' => 'value2'));
        $entity->shouldReceive('setId')->with(1)->once();

        $client = m::mock(new Client());
        $classParts = array_slice(explode('\\', get_class($entity)), -1);
        $client->shouldReceive('getCommand')->with(strtolower($classParts[0]) . $suffix, array('key1' => 'value1', 'key2' => 'value2'))->andReturn($command);
        $client->shouldReceive('execute')->with($command)->once()->andReturn($response);

        $this->object = new Persister($client);
        $this->assertInstanceOf('\SFBCN\EventbriteBundle\Entity\Event', $this->object->save($entity, $forceUpdate));
    }
}
