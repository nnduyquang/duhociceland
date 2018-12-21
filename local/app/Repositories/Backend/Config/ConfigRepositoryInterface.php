<?php

namespace App\Repositories\Backend\Config;

interface ConfigRepositoryInterface
{
    public function getAllConfig();

    public function updateAllConfig($request);
}
