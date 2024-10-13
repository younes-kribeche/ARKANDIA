<?php

namespace App\Controllers;

use App\Repositories\ArticleRepository;
use App\Repositories\FigureRepository;

class ArticleController extends AbstractController {
    private $articleRepository;
    private $figureRepository;

    public function __construct() {
        $this->articleRepository = new ArticleRepository();
        $this->figureRepository = new FigureRepository();
    }

    public function all_articles($entityType) {
        $entityTypes = $this->articleRepository->getEntityTypes();

        if (!in_array($entityType, $entityTypes)) {
            http_response_code(404);
            $this->render('404', ['message' => 'Type d\'entité non trouvé']);
            return;
        }

        $articles = $this->articleRepository->getAllArticles($entityType);

        $this->render('articles/index', [
            'title' => ucfirst($entityType) . " - Arkandia",
            'entityType' => $entityType,
            'articles' => $articles
        ]);
    }

    public function showArticle($entityType, $id) {
        $article = $this->articleRepository->getArticleById($entityType, $id);
        
        if (!$article) {
            http_response_code(404);
            $this->render('404', ['message' => 'Article non trouvé']);
            return;
        }

        $figure = null;
        if ($entityType === 'figure') {
            $figure = $this->figureRepository->getFigureById($article->getEntityId());
        }

        $this->render('articles/index', [
            'title' => $article->getNameChapter1() . " - Arkandia",
            'article' => $article,
            'entityType' => $entityType,
            'figure' => $figure
        ]);
    }

    public static function getRoutes() {
        return [
            '/articles/{type}' => 'all_articles',
            '/article/{type}/{id}' => 'showArticle'
        ];
    }
}