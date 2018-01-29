<?php

namespace Reliv\SwaggerExpressive\Api;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class BuildRouteName
{
    /**
     * @param mixed $key
     * @param array $routeData
     *
     * @return string
     */
    public static function invoke(
        $key,
        array $routeData
    ): string {
        return (string)(array_key_exists('name', $routeData) ? $routeData['name'] : $key);
    }

    /**
     * @param mixed $key
     * @param array $routeData
     *
     * @return string
     */
    public function __invoke(
        $key,
        array $routeData
    ): string {
        return self::invoke($key, $routeData);
    }
}
