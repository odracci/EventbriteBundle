<?php

namespace SFBCN\EventbriteBundle\Eventbrite\Client;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * An event subscriber to inject the authentication to an Eventbrite
 * request
 */
class AuthenticationSubscriber implements EventSubscriberInterface
{
    /**
     * @var string
     */
    private $appKey;

    /**
     * @var string
     */
    private $userKey;

    /**
     * @param string $appKey
     */
    public function setAppKey($appKey)
    {
        $this->appKey = $appKey;
    }

    /**
     * @return string
     */
    public function getAppKey()
    {
        return $this->appKey;
    }

    /**
     * @param string $userKey
     */
    public function setUserKey($userKey)
    {
        $this->userKey = $userKey;
    }

    /**
     * @return string
     */
    public function getUserKey()
    {
        return $this->userKey;
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     *
     * @api
     */
    static public function getSubscribedEvents()
    {
        return array('request.before_send' => 'beforeSend');
    }

    /**
     * Class constructor
     *
     * @param string $appKey
     * @param string $userKey
     */
    public function __construct($appKey, $userKey)
    {
        $this->setAppKey($appKey);
        $this->setUserKey($userKey);
    }

    /**
     * @param Guzzle\Common\Event $event
     */
    public function beforeSend(\Guzzle\Common\Event $event)
    {
        /** @var $request \Guzzle\Http\Message\Request */
        $request = $event['request'];

        $request->getQuery()->add('app_key', $this->getAppKey());
        $request->getQuery()->add('user_key', $this->getUserKey());
    }
}