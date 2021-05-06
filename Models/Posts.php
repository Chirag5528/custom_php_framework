<?php

namespace Models;

use \Traits\SanitizeableTrait;
use \Traits\ValidateableTrait;

require_once(__DIR__ . '/../config/Database.php');
require_once(__DIR__ . '/../traits/SanitizeableTrait.php');
require_once(__DIR__ . '/../traits/ValidateableTrait.php');

class Posts extends \Config\Database
{

    private $conn;

    private $table = 'maangal_posts';

    public function __construct()
    {
        parent::__construct();
        $this->conn = $this->connection();
    }

    protected function add_posts()
    {
    }

    public function get_posts($columns = "*", $order = "id DESC", $limit = 10): array
    {
        $posts = mysqli_query($this->conn, "SELECT * FROM $this->table ORDER BY $order LIMIT $limit");

        if (mysqli_num_rows($posts) == 0) {
            return [
                "message" => "No Records Found"
            ];
        }

        return mysqli_fetch_all($posts, MYSQLI_ASSOC);
    }

    public function get_posts_with_relation($relation = 'maangal_post_categories', $relationColumn = "name as category_name", $relationOn = 'maangal_post_categories.id', $columns = "*", $order = "id DESC", $limit = 10)
    {
        $posts = mysqli_query($this->conn, "SELECT $columns, $relationColumn FROM $this->table LEFT JOIN $relation ON $this->table.cat_id = $relationOn ORDER BY $order LIMIT $limit");

        if (mysqli_num_rows($posts) == 0) {
            return [
                "message" => "No Records Found"
            ];
        }

        return mysqli_fetch_all($posts, MYSQLI_ASSOC);
    }

    protected function get_post_by_id()
    {
    }

    public function get_posts_by_category()
    {
    }

    protected function update_posts()
    {
    }

    protected function delete_posts()
    {
    }
}

$posts = new Posts();
