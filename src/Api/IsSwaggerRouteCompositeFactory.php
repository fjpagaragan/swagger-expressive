<?php

namespace Reliv\SwaggerExpressive\Api;

use Psr\Container\ContainerInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class IsSwaggerRouteCompositeFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return IsSwaggerRouteComposite
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ContainerInterface $serviceContainer
    ) {
        $appConfig = $serviceContainer->get('config');

        $compositeServiceNames = [];

        if (array_key_exists('swagger-expressive-is-swagger-route', $appConfig)) {
            $compositeServiceNames = $appConfig['swagger-expressive-is-swagger-route'];
        }

        $compositeServices = [];

        foreach ($compositeServiceNames as $compositeServiceName) {
            $compositeServices[] = $serviceContainer->get($compositeServiceName);
        }

        return new IsSwaggerRouteComposite(
            $compositeServices
        );
    }
}
