<?php

namespace App\Controllers;

use App\Models\User;
use App\Support\Controller;
use App\Support\Validator;

class AuthController extends Controller
{
    /*
     * Action d'affichage du formulaire de connexion
     */z
    public function index()
    {
        $this->view('login', ['title' => 'Connexion']);
    }

    /*
     * Action de connexion d'un utilisateur
     */
    public function login()
    {
        $userModel = new User($this->getDB());
        $user = $userModel->getByUsername($_POST['name']);

        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'max:30']
        ]);

        if ($errors) {
            $_SESSION['errors'] = $errors;
            return header('Location: /login');
        }

        if (password_verify($_POST['password'], $user[0]->password)) {
            $_SESSION['id'] = $user[0]->id;
            $_SESSION['name'] = $user[0]->name;
            $_SESSION['email'] = $user[0]->email;
            return header('Location: /');
        } else {
            $_SESSION['errors']['connect'] = 'Vos identidfiants sont incorrects.';
            return header('Location: /login');
        }
    }

    /*
     * Action de déconnexion d'un utilisateur
     */
    public function logout()
    {
        session_destroy();
        return header('Location: /');
    }
}