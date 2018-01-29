<?php

namespace Reliv\SwaggerExpressive\Api;

use Psr\Http\Message\ServerRequestInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface IsAllowedSwagger
{
    /**
     * @param ServerRequestInterface $request
     * @param array                  $options
     *
     * @return bool
     */
    public function __invoke(
        ServerRequestInterface $request,
        array $options = []
    ): bool;
}
