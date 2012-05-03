<?php

namespace SFBCN\EventbriteBundle\Eventbrite;

/**
 * The Repository interface declaration
 *
 * @author Christian Soronellas <theunic@gmail.com>
 */
interface RepositoryInterface
{
    /**
     * Executes a command with a given arguments and maps the
     * response to the concerned entity
     *
     * @param string $commandName
     * @param array $commandArgs
     *
     * @return mixed
     */
    public function executeCommand($commandName, array $commandArgs);
}
