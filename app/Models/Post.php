<?php
namespace App\Models;

/**
 * Class Post
 * @package App\Models
 */
class Post
{
    public $id;
    public $text;
    public $title;

    public function __construct($id, $title, $text)
    {
        $this->id = $id;
        $this->text = $text;
        $this->title = $title;
    }

    /**
     * Find a specific post
     * @param $id
     * @return Post
     * @throws \Exception
     */
    public static function find($id)
    {
        $text = cache()->remember("posts.text.{$id}", '60', function () use ($id) {
            return 'dit is text voor ' . $id;
        });
        $title = cache()->remember("posts.title.{$id}", '60', function () use ($id) {
            return 'dit is title voor ' . $id;
        });
        return new Post($id, $title, $text);
    }

    /**
     * Gets all the posts
     * @return array
     */
    public static function getAllPosts()
    {
        $posts = [];
        $i = 1;
        while ($i < 10) {
            $posts[] = new Post($i, 'title ' . $i, 'dit is de text van post  ' . $i);
            $i++;
        }
        $collection = collect($posts);
        $totalItems = $collection->count();
        return $collection->all();
    }

}
