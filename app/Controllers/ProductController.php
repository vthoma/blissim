<?php

namespace App\Controllers;

use App\Models\Product;
use App\Support\Controller;
use App\Support\Validator;
use Config\Database;

class ProductController extends Controller
{

    public function index()
    {
        $productModel = new Product($this->getDB());
        $products = $productModel->all();

        $this->view('index', ['products' => $products]);
    }

    /**
     * Action d'affichage d'un produit
     */
    public function show($id)
    {
        $productModel = new Product($this->getDB());
        $product = $productModel->findById($id);

        $currentPage = $_GET['page'] ?? 1;

        $nbCommentsPerPage = 8;
        $nbComments = $productModel->countCommentsForProduct($id);
        $nbPages = ceil($nbComments / $nbCommentsPerPage);
        if ($_GET['page'] > $nbPages) {
            require VIEWS . '404.php';
            exit;
        }
        $offset = ($currentPage - 1) * $nbCommentsPerPage;

        $comments = $productModel->getCommentsForProduct($id, $nbCommentsPerPage, $offset);

        $this->view('show', [
            'product' => $product,
            'comments' => $comments,
            'paginate' => [
                'nbPages' => $nbPages,
                'currentPage' => $currentPage,
            ],
        ]);
    }

    /**
     * Action d'ajout d'un commentaire
     */
    public function addComment($id)
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'comment' => ['required', 'string']
        ]);

        if ($errors) {
            $_SESSION['errors'] = $errors;
            return header('Location: /product/' . $id);
        }
        $productModel = new Product($this->getDB());
        $productModel->addComment($id, $_POST['comment']);

        return header('Location: /product/' . $id);
    }
}