<?php

namespace Dhii\Data\Object;

use Dhii\Util\String\StringableInterface;

/**
 * Functionality for reading data from a data object.
 *
 * @since [*next-version*]
 */
trait ReadTrait
{
    /**
     * Retrieve a piece of data, or all data, of this object.
     *
     * @since [*next-version*]
     *
     * @param string|StringableInterface|null $key     The key, for which to retrieve the data member.
     * @param mixed                           $default What to return if data member with specified key not found.
     *
     * @return array|mixed The data member, or all data, of this object.
     */
    public function getData($key = null, $default = null)
    {
        $data = &$this->_getData();
        if (is_null($key)) {
            return $data;
        }

        $key = (string) $key;
        if (!isset($data[$key])) {
            return $default;
        }

        return $data[$key];
    }

    /**
     * Check if data exists.
     *
     * @param string|StringableInterface|null $key The key of the data member to check.
     *                                             If null, checks if data is not empty.
     *
     * @return bool True if this object has the data; false otherwise;
     */
    public function hasData($key = null)
    {
        $data = &$this->_getData();
        if (is_null($key)) {
            return !empty($data);
        }

        return isset($data[$key]);
    }

    /**
     * @since [*next-version*]
     *
     * @return array A reference to the data.
     */
    abstract protected function &_getData();
}
