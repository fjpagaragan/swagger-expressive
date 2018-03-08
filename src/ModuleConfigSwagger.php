<?php

namespace Reliv\SwaggerExpressive;

use Reliv\SwaggerExpressive\Api\BuildSwaggerConfigBasic;
use Reliv\SwaggerExpressive\Api\IsSwaggerRouteSwaggerKey;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ModuleConfigSwagger
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            'swagger-expressive' => [
                'swagger' => '2.0',
                'info' => [
                    'version' => '1.0.0',
                    'title' => 'Swagger',
                    //'description' => 'APIs',
                    //'contact' => ['name' => '',],
                    //'license' => ['name' => '',],
                ],
                'host' => '',
                'basePath' => '/',
                'schemes' => ['https',],
                'consumes' => ['application/json',],
                'produces' => ['application/json',],
                'paths' => [
                ],
                'definitions' => [
                    'Swagger' => [
                        'type' => 'object',
                        'properties' => [
                            'swagger' => [
                                'type' => 'string',
                                'format' => 'string',
                            ],
                            'info' => [
                                'type' => 'object',
                                'format' => 'object',
                            ],
                            'host' => [
                                'type' => 'string',
                                'format' => 'string',
                            ],
                            'basePath' => [
                                'type' => 'string',
                                'format' => 'string',
                            ],
                            'schemes' => [
                                'type' => 'array',
                                'format' => 'array',
                            ],
                            'consumes' => [
                                'type' => 'array',
                                'format' => 'array',
                            ],
                            'produces' => [
                                'type' => 'array',
                                'format' => 'array',
                            ],
                            'paths' => [
                                'type' => 'object',
                                'format' => 'object',
                            ],
                            'definitions' => [
                                'type' => 'object',
                                'format' => 'object',
                            ],
                        ],
                    ],
                ],
            ],
            'swagger-expressive-build-swagger-config' => [
                BuildSwaggerConfigBasic::class => BuildSwaggerConfigBasic::class,
            ],
            'swagger-expressive-is-swagger-route' => [
                IsSwaggerRouteSwaggerKey::class => IsSwaggerRouteSwaggerKey::class,
            ],
        ];
    }
}
