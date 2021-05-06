<?php

namespace Controllers;

require_once(__DIR__ . '/../Models/Posts.php');
class PostsController
{
    public function index()
    {
        $post = new \Models\Posts();
        echo json_encode(
            $post->get_posts_with_relation(
                /* $relationtable */
                'maangal_post_categories',
                /* Relation Columns To Extract */
                'maangal_post_categories.name as category_name,maangal_post_categories.id as category_id',
                /* Relation ON */
                'maangal_post_categories.id',
                /* TABLE COLUMNS TO EXTRACT */
                'maangal_posts.id as post_id,title,contents,date_posted',
                /* ORDER */
                'maangal_posts.id DESC',
                /* LIMIT */
                15
            ),
            JSON_PRETTY_PRINT
        );
    }
}

/* $post = new PostsController();
echo "<pre>";
echo $post->index();
echo "</pre>";
 */