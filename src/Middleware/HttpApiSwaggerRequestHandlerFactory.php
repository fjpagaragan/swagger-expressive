<?php

namespace Reliv\SwaggerExpressive\Middleware;

use Psr\Container\ContainerInterface;
use Reliv\SwaggerExpressive\Api\BuildSwaggerConfig;
use Reliv\SwaggerExpressive\Api\IsSwaggerRoute;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class HttpApiSwaggerRequestHandlerFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return HttpApiSwaggerRequestHandler
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ContainerInterface $serviceContainer
    ) {
        $appConfig = $serviceContainer->get('config');

        $debug = false;
        if (array_key_exists('debug', $appConfig)) {
            $debug = (bool)$appConfig['debug'];
        }

        return new HttpApiSwaggerRequestHandler(
            $appConfig['routes'],
            $appConfig['swagger-expressive'],
            $serviceContainer->get(IsSwaggerRoute::class),
            $serviceContainer->get(BuildSwaggerConfig::class),
            $debug
        );
    }
}
