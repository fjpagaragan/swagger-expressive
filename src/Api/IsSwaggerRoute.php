<?php

namespace Reliv\SwaggerExpressive\Api;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface IsSwaggerRoute
{
    /**
     * @param mixed $key
     * @param array $routeData
     *
     * @return bool
     */
    public function __invoke(
        $key,
        array $routeData
    ):bool;
}
