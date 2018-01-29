<?php

namespace Reliv\SwaggerExpressive\Api;

use Psr\Http\Message\ServerRequestInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class IsAllowedSwaggerAny implements IsAllowedSwagger
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
    ): bool {
        return true;
    }
}
