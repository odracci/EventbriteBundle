<?php

namespace SFBCN\EventbriteBundle\Tests\Entity\Mapper;

use SFBCN\EventbriteBundle\Entity\Mapper\Event;
use SFBCN\EventbriteBundle\Entity\Organizer;
use SFBCN\EventbriteBundle\Entity\Ticket;
use SFBCN\EventbriteBundle\Eventbrite\Mapper;
use Mockery as m;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-05-05 at 00:41:33.
 */
class EventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \SFBCN\EventbriteBundle\Entity\Mapper\Event
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
     * @covers SFBCN\EventbriteBundle\Entity\Mapper\Event::map
     */
    public function testMap()
    {
        $entity = simplexml_load_string(<<<EOX
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
    <category></category>
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
    <repeats>no</repeats>
    <start_date>2012-04-06 13:00:00</start_date>
    <status>Completed</status>
    <tags></tags>
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

        $organizer = new Organizer();
        $ticket = new Ticket();

        $mapper = m::mock('\SFBCN\EventbriteBundle\Eventbrite\Mapper');
        $mapper->shouldReceive('map')->twice()->andReturn($organizer, $ticket);

        $this->object = new Event($mapper);
        $result = $this->object->map($entity);

        $this->assertInstanceOf('\SFBCN\EventbriteBundle\Entity\Event', $result);
        $this->assertEquals('3033452137', $result->getId());
        $this->assertEquals('FFFFFF', $result->getBackgroundColor());
        $this->assertEquals('FFFFFF', $result->getBoxBackgroundColor());
        $this->assertEquals('D5D5D3', $result->getBoxBorderColor());
        $this->assertEquals('EFEFEF', $result->getBoxHeaderBackgroundColor());
        $this->assertEquals('000000', $result->getBoxTextColor());
        $this->assertEquals(0, $result->getCapacity());
        $this->assertEquals('2012-02-26 11:38:13', $result->getCreated()->format('Y-m-d H:i:s'));
        $this->assertEquals('<P>Test</P>', $result->getDescription());
        $this->assertEquals('2012-04-06 16:00:00', $result->getEndDate()->format('Y-m-d H:i:s'));
        $this->assertEquals('EE6600', $result->getLinkColor());
        $this->assertEquals('2012-04-27 04:36:42', $result->getModified()->format('Y-m-d H:i:s'));
        $this->assertEquals(0, $result->getNumAtendee());
        $this->assertEquals($organizer, $result->getOrganizer());
        $this->assertEmpty($result->getPassword());
        $this->assertEquals('Private', $result->getPrivacy());
        $this->assertEquals('2012-04-06 13:00:00', $result->getStartDate()->format('Y-m-d H:i:s'));
        $this->assertEquals(\SFBCN\EventbriteBundle\Entity\Event::STATUS_COMPLETED, $result->getStatus());
        $this->assertEquals('005580', $result->getTextColor());
        $this->assertEquals(array($ticket), $result->getTickets());
        $this->assertEquals('US/Pacific', $result->getTimezone()->getName());
        $this->assertEquals('Test', $result->getTitle());
        $this->assertEmpty($result->getTitleTextColor());
        $this->assertEquals('http://www.eventbrite.com/event/3033452137', $result->getUrl());
    }
}
