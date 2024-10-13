<?php

namespace App\Controllers;

use App\Repositories\FigureRepository;

class HomeController extends AbstractController {
    private $figureRepository;

    public function __construct() {
        $this->figureRepository = new FigureRepository();
    }

    public function index() {
        $figures = $this->figureRepository->getAllFigures();

        $this->render('home/index', [
            'title' => "Accueil - Arkandia",
            'figures' => $figures
        ]);
    }

    public static function getRoutes() {
        return [
            '/' => 'index',
        ];
    }
}