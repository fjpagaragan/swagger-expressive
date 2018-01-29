<?php

namespace Reliv\SwaggerExpressive\Middleware;

use Psr\Container\ContainerInterface;
use Reliv\SwaggerExpressive\Api\IsAllowedSwagger;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class HttpApiIsAllowedSwaggerFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return HttpApiIsAllowedSwagger
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ContainerInterface $serviceContainer
    ) {
        return new HttpApiIsAllowedSwagger(
            $serviceContainer->get(IsAllowedSwagger::class),
            [],
            401,
            false
        );
    }
}
