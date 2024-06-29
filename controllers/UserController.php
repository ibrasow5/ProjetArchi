<?php
require_once __DIR__ . '/../config/connexion.php';
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct($connexion) {
        $this->userModel = new User($connexion);
    }

    // Méthode pour récupérer le rôle de l'utilisateur
    public function getRole() {
        return isset($_SESSION['username']['role']) ? $_SESSION['username']['role'] : '';
    }

    // Méthode pour récupérer tous les utilisateurs
    public function getAllUsers() {
        return $this->userModel->getAllUsers();
    }

    // Méthode pour récupérer un utilisateur par son ID
    public function getUserById($id) {
        return $this->userModel->getUserById($id);
    }

    // Méthode pour modifier un utilisateur
    public function updateUser($id, $username, $role) {
        return $this->userModel->updateUser($id, $username, $role);
    }

    // Méthode pour supprimer un utilisateur
    public function deleteUser($id) {
        return $this->userModel->deleteUser($id);
    }

    // Méthode pour supprimer le token d'un utilisateur
    public function deleteToken($id) {
        return $this->userModel->deleteToken($id);
    }
}
?>
