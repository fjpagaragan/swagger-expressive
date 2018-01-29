<?php

namespace Reliv\SwaggerExpressive\Api;

use Reliv\SwaggerExpressive\ConfigKey;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class IsSwaggerRouteSwaggerKey implements IsSwaggerRoute
{
    const SWAGGER = ConfigKey::SWAGGER;

    /**
     * @param mixed $key
     * @param array $routeData
     *
     * @return bool
     */
    public function __invoke(
        $key,
        array $routeData
    ): bool {
        return array_key_exists(self::SWAGGER, $routeData);
    }
}
