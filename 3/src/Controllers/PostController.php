<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Models\Post;

class PostController extends Controller
{
    private $requestParams;

    public function __construct()
    {
        $this->initParams();
    }

    private function initParams(): void
    {
        $this->requestParams = $_POST;
    }

    private function getParams(string $paramName): string | null
    {
        return isset($this->requestParams[$paramName])
        ? $this->requestParams[$paramName]
        : null;

    }

    private function setParam(string $paramName, string $paramValue): void
    {
        $this->requestParams[$paramName] = $paramValue;
    }

    private function validateBeforeInsert(): void
    {
        $this->setParam('name', htmlspecialchars($this->getParams('name')));
        $this->setParam('text', htmlspecialchars($this->getParams('text')));
    }

    private function validateBeforeDelete()
    {
        // проверяем, что запрос был отправлен через по нажатию по кнопке
        $this->getParams('buttonDelete') == null ?: $this->showWarning();
        $this->setParam('id', htmlspecialchars($this->getParams('id')));
    }

    private function validateBeforeUpdate()
    {
        // проверяем, что запрос был отправлен через по нажатию по кнопке
        $this->getParams('buttonUpdate') == null ?: $this->showWarning();
        $this->setParam('id', htmlspecialchars($this->getParams('id')));
        $this->setParam('text', htmlspecialchars($this->getParams('text')));
    }

    public function add(): void
    {
        $this->validateBeforeInsert();
        Post::insert($this->getParams('name'), $this->getParams('text'));
        header('Location: /');
    }

    public function delete(): void
    {
        $this->validateBeforeDelete();
        Post::delete($this->getParams('id'));
        header('Location: /');
    }

    public function update(): void
    {
        $this->validateBeforeUpdate();
        Post::update($this->getParams('id'), $this->getParams('text'));
        header('Location: /');
    }

    private function showWarning(): void
    {
        echo "Something went wrong with request, return back";
        die();
    }
}
