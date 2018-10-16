<?php

namespace Reliv\SwaggerExpressive;

use Reliv\SwaggerExpressive\Api\BuildPathParameters;
use Reliv\SwaggerExpressive\Api\BuildPathParametersCurlyBracketsFactory;
use Reliv\SwaggerExpressive\Api\BuildSwaggerConfig;
use Reliv\SwaggerExpressive\Api\BuildSwaggerConfigBasic;
use Reliv\SwaggerExpressive\Api\BuildSwaggerConfigBasicFactory;
use Reliv\SwaggerExpressive\Api\BuildSwaggerConfigCompositeFactory;
use Reliv\SwaggerExpressive\Api\IsAllowedSwagger;
use Reliv\SwaggerExpressive\Api\IsAllowedSwaggerAnyFactory;
use Reliv\SwaggerExpressive\Api\IsSwaggerRoute;
use Reliv\SwaggerExpressive\Api\IsSwaggerRouteCompositeFactory;
use Reliv\SwaggerExpressive\Api\IsSwaggerRouteSwaggerKey;
use Reliv\SwaggerExpressive\Api\IsSwaggerRouteSwaggerKeyFactory;
use Reliv\SwaggerExpressive\Middleware\HttpApiIsAllowedSwagger;
use Reliv\SwaggerExpressive\Middleware\HttpApiIsAllowedSwaggerFactory;
use Reliv\SwaggerExpressive\Middleware\HttpApiIsAllowedSwaggerMiddleware;
use Reliv\SwaggerExpressive\Middleware\HttpApiIsAllowedSwaggerMiddlewareFactory;
use Reliv\SwaggerExpressive\Middleware\HttpApiSwagger;
use Reliv\SwaggerExpressive\Middleware\HttpApiSwaggerFactory;
use Reliv\SwaggerExpressive\Middleware\HttpApiSwaggerRequestHandler;
use Reliv\SwaggerExpressive\Middleware\HttpApiSwaggerRequestHandlerFactory;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ModuleConfigZFServiceManager
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => [
                'factories' => [
                    BuildPathParameters::class => BuildPathParametersCurlyBracketsFactory::class,
                    BuildSwaggerConfig::class => BuildSwaggerConfigCompositeFactory::class,
                    BuildSwaggerConfigBasic::class => BuildSwaggerConfigBasicFactory::class,
                    IsAllowedSwagger::class => IsAllowedSwaggerAnyFactory::class,
                    IsSwaggerRoute::class => IsSwaggerRouteCompositeFactory::class,
                    IsSwaggerRouteSwaggerKey::class => IsSwaggerRouteSwaggerKeyFactory::class,
                    HttpApiIsAllowedSwagger::class => HttpApiIsAllowedSwaggerFactory::class,
                    HttpApiSwagger::class => HttpApiSwaggerFactory::class,

                    HttpApiIsAllowedSwaggerMiddleware::class => HttpApiIsAllowedSwaggerMiddlewareFactory::class,
                    HttpApiSwaggerRequestHandler::class => HttpApiSwaggerRequestHandlerFactory::class,
                ],
            ],
        ];
    }
}
