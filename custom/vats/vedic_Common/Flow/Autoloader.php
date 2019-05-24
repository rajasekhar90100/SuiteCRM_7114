<?php

namespace Flow;

class Autoloader
{
    /**
     * Directory path
     *
     * @var string
     */
    private $dir;

    /**
     * Constructor
     *
     * @param string|null $dir
     */
    public function __construct($dir = null)
    {
        if (is_null($dir)) {
            $dir = __DIR__.'/..';
        }

        $this->dir = $dir;
    }

    /**
     * Return directory path
     *
     * @return string
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * Register
     *
     * @codeCoverageIgnore
     * @param string|null $dir
     */
    public static function register($dir = null)
    {
        ini_set('unserialize_callback_func', 'spl_autoload_call');
        spl_autoload_register(array(new self($dir), 'autoload'));
    }

    /**
     * Handles autoloading of classes
     *
     * @param string $class A class name
     *
     * @return boolean Returns true if the class has been loaded
     */
    public function autoload($class)
    {
		require 'custom/vats/Flow/ConfigInterface.php';
		require 'custom/vats/Flow/Config.php';
		require 'custom/vats/Flow/RequestInterface.php';
		require 'custom/vats/Flow/Request.php';
		require 'custom/vats/Flow/File.php';
		require 'custom/vats/Flow/Basic.php';
    }
}
