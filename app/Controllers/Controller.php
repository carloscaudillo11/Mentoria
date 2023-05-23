<?php


namespace App\Controllers;
use App\Models\CityModel;


class Controller extends BaseController
{
    public function index()
    {
        return view('navigation/home');
    }

    public function mentorados()
    {
        return view('navigation/mentorados');
    }

    public function mentores()
    {
        return view('navigation/mentores');
    }

    public function login()
    {
        return view('access/login');
    }

    public function register()
    {
        $model = new CityModel();
        $data['Municipio'] = $model->getCity();
        return view('access/register', $data);
    }

    public function loginAd()
    {
        return view('access/loginAd');
    }

    public function mentoradoPage()
    {
        return view('mentorado/mentoradoPage');
    }

    public function mentorPage()
    {
        return view('mentor/mentorPage');
    }

    public function adminPage()
    {
        return view('administrador/adminPage');
    }
    
}