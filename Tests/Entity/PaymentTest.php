<?php

namespace SFBCN\EventbriteBundle\Tests\Entity;

use SFBCN\EventbriteBundle\Entity\Payment;
use SFBCN\EventbriteBundle\Entity\Event;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-05-09 at 08:41:09.
 */
class PaymentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \SFBCN\EventbriteBundle\Entity\Payment
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Payment;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->object = null;
    }

    /**
     * @covers SFBCN\EventbriteBundle\Entity\Payment::toArray
     */
    public function testToArray()
    {
        $event = new Event();
        $event->setId(1);

        $this->object->setAcceptCash(true);
        $this->object->setAcceptCheck(true);
        $this->object->setAcceptGoogle(true);
        $this->object->setAcceptInvoice(true);
        $this->object->setAcceptPaypal(true);
        $this->object->setEvent($event);
        $this->object->setGoogleMerchantId(1);
        $this->object->setGoogleMerchantKey('test');
        $this->object->setInstructionsCash('Test');
        $this->object->setInstructionsCheck('Test');
        $this->object->setInstructionsInvoice('Test');
        $this->object->setPaypalEmail('test@gmail.com');

        $result = $this->object->toArray();

        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('accept_cash', $result);
        $this->assertTrue($result['accept_cash']);
        $this->assertArrayHasKey('accept_check', $result);
        $this->assertTrue($result['accept_check']);
        $this->assertArrayHasKey('accept_google', $result);
        $this->assertTrue($result['accept_google']);
        $this->assertArrayHasKey('accept_invoice', $result);
        $this->assertTrue($result['accept_invoice']);
        $this->assertArrayHasKey('accept_paypal', $result);
        $this->assertTrue($result['accept_paypal']);
        $this->assertArrayHasKey('event_id', $result);
        $this->assertEquals(1, $result['event_id']);
        $this->assertArrayHasKey('google_merchant_id', $result);
        $this->assertEquals(1, $result['google_merchant_id']);
        $this->assertArrayHasKey('google_merchant_key', $result);
        $this->assertEquals('test', $result['google_merchant_key']);
        $this->assertArrayHasKey('instructions_cash', $result);
        $this->assertEquals('Test', $result['instructions_cash']);
        $this->assertArrayHasKey('instructions_check', $result);
        $this->assertEquals('Test', $result['instructions_check']);
        $this->assertArrayHasKey('instructions_invoice', $result);
        $this->assertEquals('Test', $result['instructions_invoice']);
        $this->assertArrayHasKey('paypal_email', $result);
        $this->assertEquals('test@gmail.com', $result['paypal_email']);
    }
}
