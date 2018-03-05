<?php

namespace Reliv\SwaggerExpressive\Middleware;

use Psr\Container\ContainerInterface;
use Reliv\SwaggerExpressive\Api\BuildSwaggerConfig;
use Reliv\SwaggerExpressive\Api\IsSwaggerRoute;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class HttpApiSwaggerFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return HttpApiSwagger
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ContainerInterface $serviceContainer
    ) {
        $appConfig = $serviceContainer->get('config');

        return new HttpApiSwagger(
            $appConfig,
            $appConfig['swagger-expressive'],
            $serviceContainer->get(IsSwaggerRoute::class),
            $serviceContainer->get(BuildSwaggerConfig::class),
            false
        );
    }
}
