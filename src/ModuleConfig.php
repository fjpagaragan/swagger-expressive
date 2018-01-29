<?php

namespace Reliv\SwaggerExpressive;

use Reliv\SwaggerExpressive\Api\IsAllowedSwagger;
use Reliv\SwaggerExpressive\Api\IsAllowedSwaggerAnyFactory;
use Reliv\SwaggerExpressive\Api\IsSwaggerRoute;
use Reliv\SwaggerExpressive\Api\IsSwaggerRouteCompositeFactory;
use Reliv\SwaggerExpressive\Api\IsSwaggerRouteSwaggerKey;
use Reliv\SwaggerExpressive\Api\IsSwaggerRouteSwaggerKeyFactory;
use Reliv\SwaggerExpressive\Middleware\HttpApiIsAllowedSwagger;
use Reliv\SwaggerExpressive\Middleware\HttpApiIsAllowedSwaggerFactory;
use Reliv\SwaggerExpressive\Middleware\HttpApiSwagger;
use Reliv\SwaggerExpressive\Middleware\HttpApiSwaggerFactory;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ModuleConfig
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => [
                'config_factories' => [
                    IsAllowedSwagger::class => [
                        // Over-ride this
                        'factory' => IsAllowedSwaggerAnyFactory::class,
                    ],
                    IsSwaggerRoute::class => [
                        'factory' => IsSwaggerRouteCompositeFactory::class,
                    ],
                    IsSwaggerRouteSwaggerKey::class => [
                        'factory' => IsSwaggerRouteSwaggerKeyFactory::class,
                    ],

                    HttpApiIsAllowedSwagger::class => [
                        'factory' => HttpApiIsAllowedSwaggerFactory::class,
                    ],
                    HttpApiSwagger::class => [
                        'factory' => HttpApiSwaggerFactory::class,
                    ],
                ],
            ],

            'swagger-expressive-is-swagger-route' => [
                IsSwaggerRouteSwaggerKey::class => IsSwaggerRouteSwaggerKey::class,
            ],
        ];
    }
}
