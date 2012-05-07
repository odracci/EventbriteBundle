# EventbriteBundle #

A Symfony2 bundle to interact with Eventbrite API. Uses [Guzzle](/guzzle/guzzle) to perform requests to the Eventbrite API
and extract information from it.

## Installation ##

To install **EventbriteBundle** into your Symfony2 project, add these lines to your deps file

```ini
[guzzle]
    git=git://github.com/guzzle/guzzle.git

[EventbriteBundle]
    git=git://github.com/symfony-barcelona/EventbriteBundle.git
    target=/bundles/SFBCN/EventbriteBundle
```

On the ```autoload.php``` file add an entry with the ```SFBCN``` and ```Guzzle``` namespaces

```php
<?php
$loader->registerNamespaces(array(
    // ...
    'Guzzle'    => __DIR__ . '/../vendor/guzzle/src',
    'SFBCN'     => __DIR__ . '/../vendor/bundles'
));
```

On the ```AppKernel.php``` file add a new instance of the SFBCNEventbriteBundle class to the ```$bundles``` array var

```php
<?php
$bundles = array(
    // ...
    new SFBCN\EventbriteBundle\SFBCNEventbriteBundle(),
);
```

## Usage ##

The ```EventbriteBundle``` by default register 2 main services and several repository services

* ```eventbrite.persister```. Deals with persisting entities back to Eventbrite.
* ```eventbrite.mapper```. Maps XML serialized entities to its object representation.
* Repository classes
  * ```eventbrite.events```
  * ```eventbrite.organizers```
  * ```eventbrite.venues```
  * (to be added)

So from another service/controller, something like this could be done

```php
<?php
namespace SFBCN\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventsController extends Controller
{
    public function indexAction()
    {
        return array(
            'event' => $this->get('eventbrite.events')->findEvent('1');
        );
    }
}

```
(To be documented)