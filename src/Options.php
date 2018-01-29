<?php

namespace Reliv\SwaggerExpressive;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class Options
{
    /**
     * @param array  $options
     * @param string $key
     * @param null   $default
     *
     * @return mixed|null
     */
    public static function get(
        array $options,
        string $key,
        $default = null
    ) {
        if (array_key_exists($key, $options)) {
            return $options[$key];
        }

        return $default;
    }

    /**
     * @param array  $options
     * @param string $key
     * @param null   $default
     *
     * @return string|null
     */
    public static function getString(
        array $options,
        string $key,
        $default = null
    ) {
        if (array_key_exists($key, $options)) {
            return (string)$options[$key];
        }

        return $default;
    }

    /**
     * @param array  $options
     * @param string $key
     * @param null   $default
     *
     * @return array|null
     */
    public static function getArray(
        array $options,
        string $key,
        $default = null
    ) {
        if (array_key_exists($key, $options)) {
            return (array)$options[$key];
        }

        return $default;
    }
}
