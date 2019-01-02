<?php

namespace App\Repositories\Backend\Locale;
use App\Repositories\EloquentRepository;

class LocaleRepository extends EloquentRepository implements LocaleRepositoryInterface
{
    public function getModel()
    {
        return \App\Locale::class;
    }

    public function getAllLocale()
    {
        return $this->getAll();
    }

    public function createNewLocale($request)
    {
        $data = [];
        $parameters = $this->_model->prepareParameters($request);
        $result = $this->_model->create($parameters->all());
        return $data;
    }

    public function showEditLocale($id)
    {
        $data = [];
        $data['locale'] = $this->find($id);
        return $data;
    }

    public function updateLocale($request, $id)
    {
        $data = [];
        $parameters = $this->_model->prepareParameters($request);
        $result = $this->update($id, $parameters->all());
        return $data;
    }

    public function deleteLocale($id)
    {
        $data = [];
        $this->delete($id);
        return $data;
    }


}