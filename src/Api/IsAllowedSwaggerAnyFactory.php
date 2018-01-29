<?php

namespace Reliv\SwaggerExpressive\Api;

use Psr\Container\ContainerInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class IsAllowedSwaggerAnyFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return IsAllowedSwaggerAny
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ContainerInterface $serviceContainer
    ) {
        return new IsAllowedSwaggerAny();
    }
}
