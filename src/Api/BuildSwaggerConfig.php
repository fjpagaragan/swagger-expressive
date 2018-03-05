<?php

namespace Reliv\SwaggerExpressive\Api;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface BuildSwaggerConfig
{
    /**
     * @param array $swaggerConfig
     *
     * @return array $swaggerConfig
     */
    public function __invoke(
        array $swaggerConfig
    ): array;
}
