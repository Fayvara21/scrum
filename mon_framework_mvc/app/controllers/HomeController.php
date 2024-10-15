<?php
// app/controllers/HomeController.php

class HomeController extends Controller
{
    public function index()
    {
        $this->view('home', ['message' => 'Bienvenue sur la page d\'accueil !']);
    }

    public function about()
    {
        $this->view('about', ['info' => 'Informations sur notre site.']);
    }
}
