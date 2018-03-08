<?php

namespace Reliv\SwaggerExpressive\Api;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface BuildPathParameters
{
    /**
     * @param array  $parameters
     * @param string $path
     *
     * @return array $parameters
     */
    public function __invoke(
        array $parameters,
        string $path
    ): array;
}
