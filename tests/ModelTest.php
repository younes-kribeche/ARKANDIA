<?php
namespace Tests;

require_once __DIR__ . '/../App/Models/UserModel.php';
require_once __DIR__ . '/../App/Models/ArticleModel.php';
require_once __DIR__ . '/../App/Models/BaseModel.php';
require_once __DIR__ . '/../config/database.php';

use PHPUnit\Framework\TestCase;
use App\Models\UserModel;
use App\Models\ArticleModel;
use App\Models\BaseModel;

class ModelTest extends TestCase
{
    private $db;
    private $userModel;
    private $articleModel;

    protected function setUp(): void
    {
        // Créer une connexion à la base de données de test
        $this->db = new \PDO('sqlite::memory:');
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        // Créer la table user pour les tests
        $this->db->exec("CREATE TABLE user (id INTEGER PRIMARY KEY, username TEXT, email TEXT)");

        // Insérer des données de test pour user
        $this->db->exec("INSERT INTO user (username, email) VALUES ('testuser', 'test@example.com')");

        // Créer la table artefact pour les tests
        $this->db->exec("CREATE TABLE artefact (id INTEGER PRIMARY KEY, name TEXT, magic_id INTEGER, personage_id INTEGER, kingdom_id INTEGER, power_id INTEGER)");

        // Insérer des données de test pour artefact
        $this->db->exec("INSERT INTO artefact (name, magic_id, personage_id, kingdom_id, power_id) VALUES ('Test Artefact', 1, 1, 1, 1)");

        // Créer la table magic pour les tests
        $this->db->exec("CREATE TABLE magic (id INTEGER PRIMARY KEY, name TEXT)");

        // Insérer des données de test pour magic
        $this->db->exec("INSERT INTO magic (name) VALUES ('Test Magic')");

        // Créer la table personage pour les tests
        $this->db->exec("CREATE TABLE personage (id INTEGER PRIMARY KEY, name TEXT)");

        // Insérer des données de test pour personage
        $this->db->exec("INSERT INTO personage (name) VALUES ('Test Personage')");

        // Créer la table kingdom pour les tests
        $this->db->exec("CREATE TABLE kingdom (id INTEGER PRIMARY KEY, name TEXT)");

        // Insérer des données de test pour kingdom
        $this->db->exec("INSERT INTO kingdom (name) VALUES ('Test Kingdom')");

        // Créer la table power pour les tests
        $this->db->exec("CREATE TABLE power (id INTEGER PRIMARY KEY, level INTEGER)");

        // Insérer des données de test pour power
        $this->db->exec("INSERT INTO power (level) VALUES (1)");

        // Initialiser les modèles
        $this->userModel = new UserModel($this->db);
        $this->articleModel = new ArticleModel($this->db);
    }

    public function testGetUserById()
    {
        $user = $this->userModel->getById(1);
        $this->assertIsArray($user);
        $this->assertEquals('testuser', $user['username']);
        $this->assertEquals('test@example.com', $user['email']);
    }

    public function testGetArtefactById()
    {
        $artefact = $this->articleModel->getArticle('artefact', 1);
        
        if ($artefact !== null) {
            $this->assertIsArray($artefact);
            $this->assertArrayHasKey('id', $artefact);
            $this->assertEquals('Test Artefact', $artefact['name']);
            $this->assertEquals('Test Magic', $artefact['magic_name']);
            $this->assertEquals('Test Personage', $artefact['personage_name']);
            $this->assertEquals('Test Kingdom', $artefact['kingdom_name']);
            $this->assertEquals(1, $artefact['power_level']);
        } else {
            $this->assertNull($artefact, "L'artefact avec l'ID 1 n'existe pas dans la table 'artefact'");
        }
    }

        public function testGetExistingArtefact()
    {
        $artefact = $this->articleModel->getArticle('artefact', 1);
        $this->assertIsArray($artefact);
        $this->assertArrayHasKey('id', $artefact);
        $this->assertEquals(1, $artefact['id']);
        $this->assertEquals('Test Artefact', $artefact['name']);
        $this->assertEquals('Test Magic', $artefact['magic_name']);
        $this->assertEquals('Test Personage', $artefact['personage_name']);
        $this->assertEquals('Test Kingdom', $artefact['kingdom_name']);
        $this->assertEquals(1, $artefact['power_level']);
}
    // Vous pouvez ajouter d'autres méthodes de test ici pour UserModel et ArticleModel
}