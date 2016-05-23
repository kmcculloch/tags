<?php
// vim: set ft=php.symfony :

namespace Tagt\Command;

use Tagt\Parameters;
use Symfony\Component\Console\Command\Command;

/**
 * Shared behavior for tagt commands.
 */
class TagtCommand extends Command
{
    // Common storage for application parameters.
    protected $parameters;

    /**
     * Class constructor.
     *
     * @param string     $name
     * @param Parameters $parameters
     */
    public function __construct($name, Parameters $parameters)
    {
        parent::__construct($name);
        $this->parameters = $parameters;
    }

    /**
     * Get parameter value.
     *
     * @param string $value
     *   Parameter name.
     *
     * @return string
     *   Parameter value.
     */
    public function getParameter($value)
    {
        return $this->parameters->get($value);
    }
}
