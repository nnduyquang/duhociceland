<?php

namespace App\Repositories\Backend\Locale;

interface LocaleRepositoryInterface
{
    public function getAllLocale();

    public function createNewLocale($request);

    public function showEditLocale($id);

    public function updateLocale($request, $id);

    public function deleteLocale($id);
}