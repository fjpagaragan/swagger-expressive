<?php

namespace Reliv\SwaggerExpressive\Api;

use Psr\Container\ContainerInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class BuildSwaggerConfigCompositeFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return BuildSwaggerConfigComposite
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ContainerInterface $serviceContainer
    ) {
        $appConfig = $serviceContainer->get('config');

        $compositeServiceNames = [];

        if (array_key_exists('swagger-expressive-build-swagger-config', $appConfig)) {
            $compositeServiceNames = $appConfig['swagger-expressive-build-swagger-config'];
        }

        $compositeServices = [];

        foreach ($compositeServiceNames as $compositeServiceName) {
            $compositeServices[] = $serviceContainer->get($compositeServiceName);
        }

        return new BuildSwaggerConfigComposite(
            $compositeServices
        );
    }
}
