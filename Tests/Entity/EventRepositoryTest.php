<?php

namespace SFBCN\EventbriteBundle\Tests\Entity;

use SFBCN\EventbriteBundle\Entity\EventRepository;
use SFBCN\EventbriteBundle\Entity\Event;
use Mockery as m;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-05-01 at 23:26:31.
 */
class EventRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EventRepository
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
     * @covers SFBCN\EventbriteBundle\Entity\EventRepository::findEvent
     */
    public function testFindEvent()
    {
        $command = m::mock('\Guzzle\Service\Command\AbstractCommand');

        $response = simplexml_load_string(<<<EOX
<?xml version="1.0" encoding="UTF-8" ?>
<event>
    <id>1</id>
    <background_color>FFFFFF</background_color>
    <box_background_color>FFFFFF</box_background_color>
    <box_border_color>D5D5D3</box_border_color>
    <box_header_background_color>EFEFEF</box_header_background_color>
    <box_header_text_color>005580</box_header_text_color>
    <box_text_color>000000</box_text_color>
    <capacity>0</capacity>
    <created>2012-02-26 11:38:13</created>
    <description>&lt;P&gt;Test&lt;/P&gt;</description>
    <end_date>2012-04-06 16:00:00</end_date>
    <link_color>EE6600</link_color>
    <modified>2012-04-27 04:36:42</modified>
    <num_attendee_rows>0</num_attendee_rows>
    <organizer>
        <description>Test</description>
        <id>1995458109</id>
        <long_description></long_description>
        <name>Test</name>
        <url>http://www.eventbrite.com/org/1995458109</url>
    </organizer>
    <password></password>
    <privacy>Private</privacy>
    <start_date>2012-04-06 13:00:00</start_date>
    <status>Completed</status>
    <text_color>005580</text_color>
    <tickets>
        <ticket>
            <currency>USD</currency>
            <description></description>
            <end_date>2012-04-06 12:00:00</end_date>
            <id>13780767</id>
            <max>None</max>
            <min>1</min>
            <name>Free</name>
            <price>0.00</price>
            <quantity_available>100</quantity_available>
            <quantity_sold>0</quantity_sold>
            <type>0</type>
            <visible>false</visible>
        </ticket>
    </tickets>
    <timezone>US/Pacific</timezone>
    <title>Test</title>
    <title_text_color></title_text_color>
    <url>http://www.eventbrite.com/event/3033452137</url>
    <venue>
        <Lat-Long>41.292571 / -73.679426</Lat-Long>
        <address>Old Bedford Rd</address>
        <address_2></address_2>
        <city>Goldens Bridge</city>
        <country>United States</country>
        <country_code>US</country_code>
        <id>1932369</id>
        <latitude>41.292571</latitude>
        <longitude>-73.679426</longitude>
        <name>Test</name>
        <postal_code>10526</postal_code>
        <region>NY</region>
    </venue>
</event>
EOX
        );

        $mapper = m::mock('\SFBCN\EventbriteBundle\Eventbrite\Mapper');
        $mapper->shouldReceive('map')->with($response)->once()->andReturn('#event#');

        $client = m::mock('stdClass');
        $client->shouldReceive('getCommand')->with('event_get', array('id' => 1))->once()->andReturn($command);
        $client->shouldReceive('execute')->with($command)->once()->andReturn($response);

        $this->object = new EventRepository($client, $mapper);
        $result = $this->object->findEvent(1);

        $this->assertEquals('#event#', $result);
    }

    /**
     * @covers \SFBCN\EventbriteBundle\Entity\EventRepository::searchEvent
     */
    public function testSearchEvent()
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

        $client = m::mock('stdClass');
        $client->shouldReceive('getCommand')->with('event_search', array('test' => 'test'))->once()->andReturn($command);
        $client->shouldReceive('execute')->with($command)->once()->andReturn($response);

        $this->object = new EventRepository($client, $mapper);
        $result = $this->object->searchEvent(array('test' => 'test'));

        $this->assertInternalType('array', $result);
        for ($i = 0; $i < sizeof($result); $i++) {
            $this->assertEquals('#event' . ($i + 1) . '#', $result[$i]);
        }
    }

    /**
     * @covers \SFBCN\EventbriteBundle\Entity\EventRepository::copyEvent
     */
    public function testCopyEvent()
    {
        $command = m::mock('\Guzzle\Service\Command\AbstractCommand');

        $searchResponse = simplexml_load_string(<<<EOX
<?xml version="1.0" encoding="utf-8"?>
<process>
    <id>2</id>
</process>
EOX
        );

        $findResponse = simplexml_load_string(<<<EOX
<?xml version="1.0" encoding="utf-8"?>
<event>
    <id>2</id>
</event>
EOX
        );

        $client = m::mock('stdClass');
        $client->shouldReceive('getCommand')->with('event_copy', array('id' => 1, 'event_name' => 'test'))->once()->andReturn($command);
        $client->shouldReceive('getCommand')->with('event_get', array('id' => 2))->once()->andReturn($command);
        $client->shouldReceive('execute')->twice()->andReturn($searchResponse, $findResponse);

        $mapper = m::mock('\SFBCN\EventbriteBundle\Eventbrite\Mapper');
        $mapper->shouldReceive('map')->with($findResponse)->once()->andReturn('#event#');

        $this->object = new EventRepository($client, $mapper);

        $this->assertEquals('#event#', $this->object->copyEvent(1, 'test'));
    }

    /**
     * @covers \SFBCN\EventbriteBundle\Entity\EventRepository::getDiscounts
     */
    public function testGetDiscounts()
    {
        $command = m::mock('\Guzzle\Service\Command\AbstractCommand');

        $response = simplexml_load_string(<<<EOX
<?xml version="1.0" encoding="UTF-8" ?>
<discounts>
    <discount>
        <code>test@gmail.com</code>
        <discount_id>4748093</discount_id>
        <percent_off>0.00</percent_off>
        <quantity_available>1</quantity_available>
        <quantity_sold>0</quantity_sold>
        <tickets>all</tickets>
    </discount>
    <discount>
        <code>theunic@gmail.com</code>
        <discount_id>4748083</discount_id>
        <percent_off>5.00</percent_off>
        <quantity_available>1</quantity_available>
        <quantity_sold>0</quantity_sold>
        <tickets>all</tickets>
    </discount>
</discounts>
EOX
        );

        $mapper = m::mock('\SFBCN\EventbriteBundle\Eventbrite\Mapper');
        $mapper->shouldReceive('map')->twice()->andReturn('#discount1#', '#discount2#');

        $client = m::mock('stdClass');
        $client->shouldReceive('getCommand')->with('event_list_discounts', array('id' => 'test'))->once()->andReturn($command);
        $client->shouldReceive('execute')->with($command)->once()->andReturn($response);

        $this->object = new EventRepository($client, $mapper);
        $result = $this->object->getDiscounts('test');

        $this->assertInternalType('array', $result);
        for ($i = 0; $i < sizeof($result); $i++) {
            $this->assertEquals('#discount' . ($i + 1) . '#', $result[$i]);
        }
    }
}