<?php

namespace app\widgets;

use app\models\Comments;

class CommentView
{
    public $comments;

    public $children;

    public function __construct(Comments $comments, array $children)
    {
        $this->comments = $comments;
        $this->children = $children;
    }
}