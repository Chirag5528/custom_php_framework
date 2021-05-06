<?php

namespace Controllers;

require_once(__DIR__ . '/../Models/Categories.php');
class CategoriesController
{
    public function index()
    {
        $categories = new \Models\Categories();
        echo json_encode(
            $categories->get_categories(),
            JSON_PRETTY_PRINT
        );
    }
}
