<?php

namespace Reliv\SwaggerExpressive\Api;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface BuildSwaggerConfig
{
    const OPTION_ROUTE_CONFIG = 'route-config';

    /**
     * @param array $swaggerConfig
     * @param array $options
     *
     * @return array $swaggerConfig
     */
    public function __invoke(
        array $swaggerConfig,
        array $options = []
    ): array;
}
