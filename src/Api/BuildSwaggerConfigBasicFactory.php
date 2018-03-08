<?php

namespace Reliv\SwaggerExpressive\Api;

use Psr\Container\ContainerInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class BuildSwaggerConfigBasicFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return BuildSwaggerConfigBasic
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ContainerInterface $serviceContainer
    ) {
        return new BuildSwaggerConfigBasic(
            $serviceContainer->get(BuildPathParameters::class)
        );
    }
}
