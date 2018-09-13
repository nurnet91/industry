<?php

namespace app\widgets;

use app\models\CommentForm;
use app\widgets\CommentView;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\data\Pagination;

class CommentsWidget extends Widget
{
    public $model;
    public $PostAction ='comments';

    public function init()
    {
        if (!$this->model)
        {
            throw new InvalidConfigException('Specify the products.');
        }
    }

    public function run()
    {
        $form_model = new CommentForm();
        //TODO сдесь надо поправит sql что бы пагинатция точно все children взял
        $comments = $this->model->getComments()
            ->orderBy(['parent_id'=>SORT_DESC,'id' => SORT_DESC, 'created_at' => SORT_DESC])->user()->likes();
        $count = clone $comments;
        $pages = new Pagination([
            'totalCount' => $count->count(),
            'pageSize' => 10
        ]);
        $postModels = $comments->offset($pages->offset)->limit($pages->limit)->all();

        $items = $this->treeRecursive($postModels, null);

        return $this->render('comments', [
            'model' => $this->model,
            'items' => $items,
            'form_model' => $form_model,
            'pagination'=>$pages,
            'action'=>$this->PostAction,
        ]);
    }

    public function treeRecursive(&$comments, $parentId)
    {
        $items = [];

        foreach ($comments as $comment)
        {
            if ($comment->parent_id == $parentId)
            {
                $items[] = new CommentView($comment, $this->treeRecursive($comments, $comment->id));
            }
        }

        return $items;
    }
}