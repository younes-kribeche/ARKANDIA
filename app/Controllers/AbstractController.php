<?php

namespace App\Controllers;

abstract class AbstractController {
    protected function render(string $view, array $data = [], string $layout = 'layout') {
        // Extraire les variables pour les rendre accessibles dans la vue
        extract($data);
    
        // Définir le chemin absolu vers le dossier Views
        $viewsPath = __DIR__ . '/../Views/';
    
        // Capturer le contenu de la vue dans une variable
        ob_start();
        $viewFile = $viewsPath . $view . '.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            // Si la vue n'existe pas, afficher une erreur 404
            require_once $viewsPath . '404.php';
        }
        $content = ob_get_clean();
    
        // Rendre la vue avec le layout spécifié
        $this->renderLayout($layout, ['content' => $content] + $data);
    }

    protected function renderLayout(string $layout, array $variables = []) {
        // Extraire les variables pour les rendre accessibles dans le layout
        extract($variables);
    
        // Définir le chemin absolu vers le dossier Templates
        $templatesPath = __DIR__ . '/../Views/Templates/';
    
        // Capturer le contenu du layout
        ob_start();
        $layoutFile = $templatesPath . $layout . '.php';
        if (file_exists($layoutFile)) {
            include $layoutFile;
        } else {
            echo "Erreur : Layout '$layout' non trouvé.";
        }
        echo ob_get_clean();
    }

    protected function redirect(string $url, int $statusCode = 302) {
        if (!headers_sent()) {
            header('Location: ' . $url, true, $statusCode);
            exit;
        } else {
            echo "<script>window.location.href = '$url';</script>";
            exit;
        }
    }

    protected function validateRequiredFields(array $data, array $requiredFields): array {
        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                $errors[$field] = "Le champ $field est obligatoire.";
            }
        }

        return $errors;
    }

    protected function handleFormSubmission(array $requiredFields, callable $callback) {
        $formData = $_POST;

        $validationErrors = $this->validateRequiredFields($formData, $requiredFields);

        if (!empty($validationErrors)) {
            return ['errors' => $validationErrors] + $formData;
        } else {
            return call_user_func($callback, $formData);
        }
    }

    protected function handleImageUpload(string $inputName, string $uploadDir = 'img/') {
        if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === 0) {
            $file = $_FILES[$inputName];
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($file['type'], $allowedTypes)) {
                $filename = uniqid() . '-' . basename($file['name']);
                $uploadPath = $uploadDir . $filename;

                if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                    return $filename;
                } else {
                    throw new \Exception("Erreur lors du téléchargement de l'image.");
                }
            } else {
                throw new \Exception("Type de fichier non autorisé. Formats acceptés : JPEG, PNG, GIF.");
            }
        }
        return null;
    }
}