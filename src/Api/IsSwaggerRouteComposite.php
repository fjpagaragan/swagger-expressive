<?php

namespace Reliv\SwaggerExpressive\Api;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class IsSwaggerRouteComposite implements IsSwaggerRoute
{
    protected $isSwaggerRoutes = [];

    /**
     * @param array $isSwaggerRoutes
     */
    public function __construct(
        array $isSwaggerRoutes
    ) {
        /** @var IsSwaggerRoute $isSwaggerRoute */
        foreach ($isSwaggerRoutes as $isSwaggerRoute) {
            $this->add(
                $isSwaggerRoute
            );
        }
    }

    /**
     * @param IsSwaggerRoute $isSwaggerRoute
     *
     * @return void
     */
    public function add(IsSwaggerRoute $isSwaggerRoute)
    {
        $this->isSwaggerRoutes[] = $isSwaggerRoute;
    }

    /**
     * @param mixed $key
     * @param array $routeData
     *
     * @return bool
     */
    public function __invoke(
        $key,
        array $routeData
    ): bool {
        /** @var IsSwaggerRoute $isSwaggerRoute */
        foreach ($this->isSwaggerRoutes as $isSwaggerRoute) {
            $swaggerRoute = $isSwaggerRoute->__invoke(
                $key,
                $routeData
            );

            if ($swaggerRoute) {
                return true;
            }
        }

        return false;
    }
}
