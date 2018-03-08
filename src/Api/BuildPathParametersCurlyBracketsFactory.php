<?php

namespace Reliv\SwaggerExpressive\Api;

use Psr\Container\ContainerInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class BuildPathParametersCurlyBracketsFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return BuildPathParametersCurlyBrackets
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(
        ContainerInterface $serviceContainer
    ) {
        return new BuildPathParametersCurlyBrackets();
    }
}
