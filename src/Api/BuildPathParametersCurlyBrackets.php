<?php

namespace Reliv\SwaggerExpressive\Api;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class BuildPathParametersCurlyBrackets implements BuildPathParameters
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
    ): array {
        $m = [];

        preg_match_all("/\\{(.*?)\\}/", $path, $m);

        if (empty($m[1])) {
            return $parameters;
        }

        $parameterNames = $m[1];
        $parametersIndex = [];

        foreach ($parameters as $key => $parameterConfig) {
            if (array_key_exists('name', $parameterConfig)) {
                $parametersIndex[$parameterConfig['name']] = $key;
            }
        }

        foreach ($parameterNames as $parameterName) {
            if (array_key_exists($parameterName, $parametersIndex)) {
                // no change if it exists
                continue;
            }

            $parameters[] = [
                'in' => 'path',
                'name' => $parameterName,
                // Per the spec: path parameters are always required
                'required' => true,
            ];
        }

        return $parameters;

    }
}
