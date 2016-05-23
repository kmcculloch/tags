<?php
// vim: set ft=php.symfony :

namespace Tagt;

use Symfony\Component\Yaml\Yaml;

/**
 * A container for local configuration parameters.
 */
class Parameters
{
    private $parameters;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $yaml = Yaml::parse(file_get_contents(__DIR__.'/../../config/parameters.yml'));
        $this->parameters = $yaml['parameters'];
    }

    /**
     * Parameter value getter.
     *
     * @param string $value
     *   Parameter name.
     *
     * @return string
     *   Parameter value.
     */
    public function get($value)
    {
        return $this->parameters[$value];
    }
}
