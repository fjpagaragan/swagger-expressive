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
use Reliv\SwaggerExpressive\Middleware\HttpApiSwagger;
use Reliv\SwaggerExpressive\Middleware\HttpApiSwaggerDebugFactory;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ModuleConfigFactoriesAsConfig
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => [
                'config_factories' => [
                    BuildPathParameters::class => [
                        'factory' => BuildPathParametersCurlyBracketsFactory::class,
                    ],
                    BuildSwaggerConfig::class => [
                        'factory' => BuildSwaggerConfigCompositeFactory::class,
                    ],
                    BuildSwaggerConfigBasic::class => [
                        'factory' => BuildSwaggerConfigBasicFactory::class,
                    ],
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
                        'factory' => HttpApiSwaggerDebugFactory::class,
                    ],
                ],
            ],
        ];
    }
}
