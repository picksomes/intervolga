<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Models\Post;

class HomeController extends Controller
{

    private function getCommentsList(): array
    {
        return Post::selectAll();
    }

    public function index(): void
    {
        $data = $this->getCommentsList();
        include_once ROOT . '/src/views/home.view.php';

    }

}
