<?php

namespace App\Repositories\Frontend;

interface FrontendRepositoryInterface
{

    public function getFrontend();

    public function getContact();

    public function getAboutUs();

    public function getBlogs();

    public function getServices();

    public function getServicesDetail($path);

    public function getFrontendCommon();

    public function getAllMenuFrontend();
}