<?php

namespace Models;

require_once(__DIR__ . '/../config/Database.php');
require_once(__DIR__ . '/../traits/SanitizeableTrait.php');

require_once(__DIR__ . '/../traits/ValidateableTrait.php');

class Categories extends \Config\Database
{

    private $conn;

    private $table = 'maangal_post_categories';

    public function __construct()
    {
        parent::__construct();
        $this->conn = $this->connection();
    }

    protected function add_categories()
    {
    }

    public function get_categories($columns = "*", $order = "id DESC", $limit = 10): array
    {
        $categories = mysqli_query($this->conn, "SELECT * FROM $this->table ORDER BY $order LIMIT $limit");

        if (mysqli_num_rows($categories) == 0) {
            return [
                "message" => "No Records Found"
            ];
        }

        return mysqli_fetch_all($categories, MYSQLI_ASSOC);
    }
}
