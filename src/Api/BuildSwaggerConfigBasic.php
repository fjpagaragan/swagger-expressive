<?php

namespace Reliv\SwaggerExpressive\Api;

use Reliv\SwaggerExpressive\ConfigKey;
use Reliv\SwaggerExpressive\Options;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class BuildSwaggerConfigBasic implements BuildSwaggerConfig
{
    protected $buildPathParameters;

    /**
     * @param BuildPathParameters $buildPathParameters
     */
    public function __construct(
        BuildPathParameters $buildPathParameters
    ) {
        $this->buildPathParameters = $buildPathParameters;
    }

    /**
     * @param array $swaggerConfig
     * @param array $options
     *
     * @return array $swaggerConfig
     * @throws \Exception
     */
    public function __invoke(
        array $swaggerConfig,
        array $options = []
    ): array {
        $routeConfig = Options::getArray(
            $options,
            self::OPTION_ROUTE_CONFIG
        );

        $swaggerConfig['basePath'] = Options::getString(
            $swaggerConfig,
            'basePath',
            '/'
        );

        $swaggerConfig['paths'] = $this->buildSwaggerPaths(
            $routeConfig
        );

        return $swaggerConfig;
    }

    /**
     * @param array $routeConfig
     *
     * @return array
     * @throws \Exception
     */
    protected function buildSwaggerPaths(
        array $routeConfig
    ): array {
        $swaggerPaths = [];

        foreach ($routeConfig as $key => $routeData) {
            $path = Options::getString(
                $routeData,
                'path'
            );

            if (empty($path)) {
                throw new \Exception(
                    'Path is required in route config'
                );
            }
            $configName = BuildRouteName::invoke(
                $key,
                $routeData
            );
            $swaggerPathData = $this->buildSwaggerPathData(
                $configName,
                $path,
                $routeData
            );

            if (array_key_exists($path, $swaggerPaths)) {
                $swaggerPaths[$path] = array_merge($swaggerPaths[$path], $swaggerPathData);
                continue;
            }

            $swaggerPaths[$path] = $swaggerPathData;
        }

        return $swaggerPaths;
    }

    /**
     * @param string $name
     * @param string $path
     * @param array $routeData
     *
     * @return array
     */
    protected function buildSwaggerPathData(
        string $name,
        string $path,
        array $routeData
    ): array {
        $swaggerPathData = [];

        $swaggerConfig = Options::getArray(
            $routeData,
            ConfigKey::SWAGGER,
            []
        );

        $allowedMethods = Options::getArray(
            $routeData,
            'allowed_methods',
            []
        );

        if (is_string($allowedMethods)) {
            $allowedMethods = [$allowedMethods];
        }

        foreach ($allowedMethods as $allowedMethod) {
            $allowedMethod = strtolower($allowedMethod);

            $data = Options::getArray(
                $swaggerConfig,
                $allowedMethod,
                []
            );

            $data['description'] = Options::getString(
                $data,
                'description',
                'Name: ' . $name
            );

            $data['operationId'] = Options::getString(
                $swaggerPathData,
                'operationId',
                '[' . $allowedMethod . ']' . $name
            );

            $data['produces'] = Options::getArray(
                $data,
                'produces',
                ['application/json']
            );

            $parameters = Options::getArray(
                $data,
                'parameters',
                []
            );

            $data['parameters'] = $this->buildPathParameters->__invoke(
                $parameters,
                $path
            );

            $data['responses'] = Options::getArray(
                $data,
                'responses',
                [
                    "default" => [
                        'description' => "undefined"
                    ]
                ]
            );

            $swaggerPathData[$allowedMethod] = $data;
        }

        return $swaggerPathData;
    }
}
