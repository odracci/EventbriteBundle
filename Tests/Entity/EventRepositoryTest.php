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

        $response = m::mock('\Guzzle\Http\Message\Response');
        $response->shouldReceive('getBody')->with(true)->andReturn(<<<EOX
<?xml version="1.0" encoding="utf-8"?>
<event>
    <id>1</id>
    <title>Best NYC New Year's Party</title>
    <description>Come spend New Year's Eve with us!</description>
    <start_date>2008-12-31 20:00:00</start_date>
    <end_date>2009-01-01 06:00:00</end_date>
    <timezone>US/Eastern</timezone>
    <url>http://dev-win.eventbrite.com/event/1003</url>
    <capacity>1000</capacity>
    <created>2007-11-03 12:47:06</created>
    <modified>2008-01-09 10:12:15</modified>
    <privacy>Public</privacy>
    <password>xxxxxxxx</password>
    <url>http://nycparty.eventbrite.com</url>
    <logo>http://images.eventbrite.com/logos/908163459.jpg</logo>
    <logo_ssl>https://www.eventbrite.com/php/logo.php?id=908163459.jpg</logo_ssl>
    <status>draft</status>
</event>
EOX
        );

        $client = m::mock('stdClass');
        $client->shouldReceive('getCommand')->with('event_get', array('id' => 1))->once()->andReturn($command);
        $client->shouldReceive('execute')->with($command)->once()->andReturn($response);

        $this->object = new EventRepository($client);
        $result = $this->object->findEvent(1);

        $this->assertInstanceOf('\SFBCN\EventbriteBundle\Entity\Event', $result);
    }

    /**
     * @covers SFBCN\EventbriteBundle\Entity\EventRepository::map
     */
    public function testMap()
    {
        $client = new \stdClass();
        $this->object = new EventRepository($client);
        $result = $this->object->map(simplexml_load_string(<<<EOX
<?xml version="1.0" encoding="UTF-8" ?>
<event>
    <id>3033452137</id>
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
        ));

        $this->assertEquals(3033452137, $result->getId());
        $this->assertEquals('FFFFFF', $result->getBackgroundColor());
        $this->assertEquals('FFFFFF', $result->getBoxBackgroundColor());
        $this->assertEquals('D5D5D3', $result->getBoxBorderColor());
        $this->assertEquals('EFEFEF', $result->getBoxHeaderBackgroundColor());
        $this->assertEquals('005580', $result->getBoxHeaderTextColor());
        $this->assertEquals('000000', $result->getBoxTextColor());
        $this->assertEquals('Test', $result->getTitle());
        $this->assertEquals('<P>Test</P>', $result->getDescription());
        $this->assertEquals(\DateTime::createFromFormat('Y-m-d H:i:s', '2012-04-06 13:00:00'), $result->getStartDate());
        $this->assertEquals(\DateTime::createFromFormat('Y-m-d H:i:s', '2012-04-06 16:00:00'), $result->getEndDate());
        $this->assertEquals(new \DateTimeZone('US/Pacific'), $result->getTimezone());
        $this->assertEquals('http://www.eventbrite.com/event/3033452137', $result->getUrl());
        $this->assertEquals(0, $result->getCapacity());
        $this->assertEquals(\DateTime::createFromFormat('Y-m-d H:i:s', '2012-02-26 11:38:13'), $result->getCreated());
        $this->assertEquals(\DateTime::createFromFormat('Y-m-d H:i:s', '2012-04-27 04:36:42'), $result->getModified());
        $this->assertEquals(Event::PRIVACY_PRIVATE, $result->getPrivacy());
        $this->assertNull($result->getPassword());
        $this->assertEquals(Event::STATUS_COMPLETED, $result->getStatus());
        $this->assertEquals('EE6600', $result->getLinkColor());
        $this->assertEquals(0, $result->getNumAtendee());
        $this->assertEquals('005580', $result->getTextColor());
    }
}