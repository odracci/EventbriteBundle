<?php

namespace SFBCN\EventbriteBundle\Eventbrite;

use Guzzle\Service\Client;
use Guzzle\Service\Inspector;
use Guzzle\Service\Description\ServiceDescription;
use SFBCN\EventbriteBundle\Eventbrite\Client\AuthenticationSubscriber;

/**
 * A factory class to generate Eventbrite API clients
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
class ClientFactory
{
    /**
     * Factory method to create a new Client
     *
     * @param array|Collection $config Configuration data. Array keys:
     *    base_url - Base URL of web service
     *
     * @return Client
     */
    public static function factory($config)
    {
        $default = array();
        $required = array('app_key', 'user_key', 'services_description_file', 'base_url');
        $config = Inspector::prepareConfig($config, $default, $required);

        $client = new Client($config->get('base_url'));

        $authenticationSubscriber = new AuthenticationSubscriber($config->get('appKey'), $config->get('userKey'));
        $client->getEventDispatcher()->addSubscriber($authenticationSubscriber);

        // Uncomment the following two lines to use an XML service description
        $client->setDescription(ServiceDescription::factory($config->get('services_description_file')));

        return $client;
    }
}
