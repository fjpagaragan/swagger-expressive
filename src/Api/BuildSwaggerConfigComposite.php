<?php

namespace Reliv\SwaggerExpressive\Api;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class BuildSwaggerConfigComposite implements BuildSwaggerConfig
{
    protected $buildSwaggerConfigs = [];

    /**
     * @param array $buildSwaggerConfigs
     */
    public function __construct(
        array $buildSwaggerConfigs
    ) {
        /** @var BuildSwaggerConfig $buildSwaggerConfig */
        foreach ($buildSwaggerConfigs as $buildSwaggerConfig) {
            $this->add(
                $buildSwaggerConfig
            );
        }
    }

    /**
     * @param BuildSwaggerConfig $buildSwaggerConfig
     *
     * @return void
     */
    public function add(BuildSwaggerConfig $buildSwaggerConfig)
    {
        $this->buildSwaggerConfigs[] = $buildSwaggerConfig;
    }

    /**
     * @param array $swaggerConfig
     *
     * @return array
     */
    public function __invoke(
        array $swaggerConfig
    ): array {
        /** @var BuildSwaggerConfig $buildSwaggerConfig */
        foreach ($this->buildSwaggerConfigs as $buildSwaggerConfig) {
            $swaggerConfig = $buildSwaggerConfig->__invoke(
                $swaggerConfig
            );
        }

        return $swaggerConfig;
    }
}
