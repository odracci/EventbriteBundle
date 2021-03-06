<?php

namespace SFBCN\EventbriteBundle\Tests\Entity;

use SFBCN\EventbriteBundle\Entity\OrganizerRepository;
use SFBCN\EventbriteBundle\Entity\Organizer;
use Mockery as m;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-05-05 at 00:32:30.
 */
class OrganizerRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OrganizerRepository
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
     * @covers SFBCN\EventbriteBundle\Entity\OrganizerRepository::getOrganizerEvents
     */
    public function testGetOrganizerEvents()
    {
        $command = m::mock('\Guzzle\Service\Command\AbstractCommand');

        $response = simplexml_load_string(<<<EOX
<?xml version="1.0" encoding="UTF-8" ?>
<events>
    <event>
        <id>1</id>
    </event>
    <event>
        <id>2</id>
    </event>
</events>
EOX
        );

        $mapper = m::mock('\SFBCN\EventbriteBundle\Eventbrite\Mapper');
        $mapper->shouldReceive('map')->twice()->andReturn('#event1#', '#event2#');

        $organizer = new Organizer();
        $organizer->setId(1);

        $client = m::mock('stdClass');
        $client->shouldReceive('getCommand')->with('organizer.events', array('id' => 1))->once()->andReturn($command);
        $client->shouldReceive('execute')->with($command)->once()->andReturn($response);

        $this->object = new OrganizerRepository($client, $mapper);
        $result = $this->object->getOrganizerEvents($organizer);

        $this->assertInternalType('array', $result);
        for ($i = 0; $i < sizeof($result); $i++) {
            $this->assertEquals('#event' . ($i + 1) . '#', $result[$i]);
        }
    }

    /**
     * @covers SFBCN\EventbriteBundle\Entity\OrganizerRepository::findOrganizer
     */
    public function testFindOrganizer()
    {
        $command = m::mock('\Guzzle\Service\Command\AbstractCommand');

        $response = simplexml_load_string(<<<EOX
<?xml version="1.0" encoding="UTF-8" ?>
<organizer>
    <id>1</id>
    <name>Test</name>
    <description>Test</description>
    <url>#url#</url>
</organizer>
EOX
        );

        $mapper = m::mock('\SFBCN\EventbriteBundle\Eventbrite\Mapper');
        $mapper->shouldReceive('map')->with($response)->once()->andReturn('#organizer#');

        $client = m::mock('stdClass');
        $client->shouldReceive('getCommand')->with('organizer.get', array('id' => 1))->once()->andReturn($command);
        $client->shouldReceive('execute')->with($command)->once()->andReturn($response);

        $this->object = new OrganizerRepository($client, $mapper);
        $result = $this->object->findOrganizer(1);

        $this->assertEquals('#organizer#', $result);
    }
}
