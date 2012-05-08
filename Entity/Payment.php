<?php

namespace SFBCN\EventbriteBundle\Entity;

/**
 * The payment entity
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class Payment
{
    /**
     * The related event
     *
     * @var \SFBCN\EventbriteBundle\Entity\Event
     */
    private $event;

    /**
     * Accept PayPal payments
     *
     * @var boolean
     */
    private $accept_paypal;

    /**
     * Your PayPal email
     *
     * @var string
     */
    private $paypal_email;

    /**
     * Accept Google Checkout payments
     *
     * @var boolean
     */
    private $accept_google;

    /**
     * Google Checkout Merchant ID
     *
     * @var string
     */
    private $google_merchant_id;

    /**
     * Google Checkout Merchant Key
     *
     * @var string
     */
    private $google_merchant_key;

    /**
     * Accept 'Pay by Check' payments
     *
     * @var boolean
     */
    private $accept_check;

    /**
     * Instructions to attendees who want to pay by check.
     *
     * @var string
     */
    private $instructions_check;

    /**
     * Accept 'Pay with Cash' payments
     *
     * @var boolean
     */
    private $accept_cash;

    /**
     * Instructions to attendees who want to pay with cash.
     *
     * @var boolean
     */
    private $instructions_cash;

    /**
     * Accept 'Send an Invoice' payments
     *
     * @var boolean
     */
    private $accept_invoice;

    /**
     * Instructions to attendees who need to be sent an invoice.
     *
     * @var string
     */
    private $instructions_invoice;


    /**
     * @param boolean $accept_cash
     */
    public function setAcceptCash($accept_cash)
    {
        $this->accept_cash = $accept_cash;
    }

    /**
     * @return boolean
     */
    public function getAcceptCash()
    {
        return $this->accept_cash;
    }

    /**
     * @param boolean $accept_check
     */
    public function setAcceptCheck($accept_check)
    {
        $this->accept_check = $accept_check;
    }

    /**
     * @return boolean
     */
    public function getAcceptCheck()
    {
        return $this->accept_check;
    }

    /**
     * @param boolean $accept_google
     */
    public function setAcceptGoogle($accept_google)
    {
        $this->accept_google = $accept_google;
    }

    /**
     * @return boolean
     */
    public function getAcceptGoogle()
    {
        return $this->accept_google;
    }

    /**
     * @param boolean $accept_invoice
     */
    public function setAcceptInvoice($accept_invoice)
    {
        $this->accept_invoice = $accept_invoice;
    }

    /**
     * @return boolean
     */
    public function getAcceptInvoice()
    {
        return $this->accept_invoice;
    }

    /**
     * @param boolean $accept_paypal
     */
    public function setAcceptPaypal($accept_paypal)
    {
        $this->accept_paypal = $accept_paypal;
    }

    /**
     * @return boolean
     */
    public function getAcceptPaypal()
    {
        return $this->accept_paypal;
    }

    /**
     * @param \SFBCN\EventbriteBundle\Entity\Event $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return \SFBCN\EventbriteBundle\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param string $google_merchant_id
     */
    public function setGoogleMerchantId($google_merchant_id)
    {
        $this->google_merchant_id = $google_merchant_id;
    }

    /**
     * @return string
     */
    public function getGoogleMerchantId()
    {
        return $this->google_merchant_id;
    }

    /**
     * @param string $google_merchant_key
     */
    public function setGoogleMerchantKey($google_merchant_key)
    {
        $this->google_merchant_key = $google_merchant_key;
    }

    /**
     * @return string
     */
    public function getGoogleMerchantKey()
    {
        return $this->google_merchant_key;
    }

    /**
     * @param boolean $instructions_cash
     */
    public function setInstructionsCash($instructions_cash)
    {
        $this->instructions_cash = $instructions_cash;
    }

    /**
     * @return boolean
     */
    public function getInstructionsCash()
    {
        return $this->instructions_cash;
    }

    /**
     * @param string $instructions_check
     */
    public function setInstructionsCheck($instructions_check)
    {
        $this->instructions_check = $instructions_check;
    }

    /**
     * @return string
     */
    public function getInstructionsCheck()
    {
        return $this->instructions_check;
    }

    /**
     * @param string $instructions_invoice
     */
    public function setInstructionsInvoice($instructions_invoice)
    {
        $this->instructions_invoice = $instructions_invoice;
    }

    /**
     * @return string
     */
    public function getInstructionsInvoice()
    {
        return $this->instructions_invoice;
    }

    /**
     * @param string $paypal_email
     */
    public function setPaypalEmail($paypal_email)
    {
        $this->paypal_email = $paypal_email;
    }

    /**
     * @return string
     */
    public function getPaypalEmail()
    {
        return $this->paypal_email;
    }

    /**
     * Serializes a payment into an array
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'event_id' => $this->getEvent()->getId(),
            'accept_paypal' => $this->getAcceptPaypal(),
            'paypal_email' => $this->getPaypalEmail(),
            'accept_google' => $this->getAcceptGoogle(),
            'google_merchant_id' => $this->getGoogleMerchantId(),
            'google_merchant_key' => $this->getGoogleMerchantKey(),
            'accept_check' => $this->getAcceptCheck(),
            'instructions_check' => $this->getInstructionsCheck(),
            'accept_cash' => $this->getAcceptCash(),
            'instructions_cash' => $this->getInstructionsCash(),
            'accept_invoice' => $this->getAcceptInvoice(),
            'instructions_invoice' => $this->getInstructionsInvoice()
        );
    }
}
