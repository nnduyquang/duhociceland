<?php

namespace App\Repositories\Backend\Config;

use App\Repositories\EloquentRepository;

class ConfigRepository extends EloquentRepository implements ConfigRepositoryInterface{
    public function getModel()
    {
        return \App\Config::class;
    }

    public function getAllConfig()
    {
        return $this->_model->getAllConfig();
    }

    public function updateAllConfig($request)
    {
//        dd($request->all());
        foreach ($request->all() as $key=>$val)
        {
            $this->_model->updateConfig($key,$val);
        }


//        $config=$this->_model->getAllConfig();
    }


}