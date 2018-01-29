<?php

namespace Reliv\SwaggerExpressive;

use Reliv\SwaggerExpressive\Middleware\HttpApiIsAllowedSwagger;
use Reliv\SwaggerExpressive\Middleware\HttpApiSwagger;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ModuleConfigRoutes
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            'routes' => [
                /**
                 * Swagger
                 */
                'docs.swagger.json' => [
                    'name' => 'docs.swagger.json',
                    'path' => '/docs/swagger.json',
                    'middleware' => [
                        'acl' => HttpApiIsAllowedSwagger::class,
                        'api' => HttpApiSwagger::class,
                    ],
                    'options' => [
                    ],
                    'allowed_methods' => ['GET'],
                    /* ConfigKey::SWAGGER */
                    'swagger' => [
                        'get' => [
                            'description' => 'Produces Swagger JSON',
                            //'operationId' => 'zrcms.api.swagger.json',
                            'produces' => [
                                'application/json',
                            ],
                            'parameters' => [
                                /* EXAMPLE
                                [
                                    'name' => 'limit',
                                    'in' => 'query',
                                    'description' => 'maximum number of results to return',
                                    'required' => false,
                                    'type' => 'integer',
                                    'format' => 'int32',
                                ]
                                */
                            ],
                            'responses' => [
                                200 => [
                                    'description' => 'swagger object response',
                                    'schema' => [
                                        'type' => 'object',
                                        'items' => ['$ref' => '#/definitions/Swagger',],
                                    ],
                                ],
                                /*
                                'default' => [
                                    'description' => 'unexpected error',
                                    'schema' => ['$ref' => '#/definitions/ErrorModel',],
                                ],
                                 */
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
