<?php

namespace App\Traits;

trait GetsSpeciesEndpoints
{
    /**
     *
     * This is the simplest way since for humans the species array comes back zero so we know in this case it will be
     * the endpoint https://swapi.dev/api/species/1/.
     *
     * @param array $response
     * @return mixed|string[]
     */
    protected function getSpeciesEndpoints(array $response)
    {
        return count($response['species']) > 0 ? $response['species'] : ['https://swapi.dev/api/species/1/'];
    }
}
