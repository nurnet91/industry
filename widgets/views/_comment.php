<?php
//
//use common\models\Admin;
//use common\models\User;
//use yii\helpers\Html;
//use yii\widgets\ActiveForm;
//
//$class = '';
//
use app\models\Users;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$class = '';
if( $item->comments->parent_id !== 0 )
{
	$class = '<div class="comments-publication-box__answere-to-person  margin-b-10  gutters">ответил '.$user_parent.'</div>';
}
$text = $item->comments->description;
$date = $item->comments->date;
$likes = $item->comments->getCountLikes();
$user = $item->comments->user;
if(!empty($user->info)){
    $info = $user->info;
}
if(!empty($user->companyInfo)){
    $info = $user->companyInfo;
}
else{
    $info = $user->username;
}
$id = $item->comments->id;
$div = '';
$class = '';
if($user->id !== Yii::$app->user->id ){
    $div = '<div class="row  justify-content-end">
                    <a href="" class="comments-publication-box__answer  gutters">'.t("Ответить").'</a>
           </div>';
    $class = 'comment-likes-button';
}
?>




<ul class="">
    <li class="comment-item" data-id="<?=$id?>">
        <div class="comments-publication-box">
            <div class="comments-publication-box__head  row  align-items-center  justify-content-between">
                <div class="gutters">
                    <div class="row  align-items-center">
                        <div class="comments-publication-box__name  gutters  margin-b-10"><?=$info?></div>
                        <button data-comment_id="<?=$id?>" class="comments-publication-box__like  margin-b-10 <?=$class?>"><i class="fa fa-thumbs-o-up"
                                                                                           aria-hidden="true"></i>
                            <span class="counters"><?=$likes?></span></button>
                        <a href="#" class="comments-publication-box__answere-icon  margin-b-10">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                 class="comments-publication-box__answere-svg">
                                <path d="M64 240c0 49.6 21.4 95 57 130.7-12.6 50.3-54.3 95.2-54.8 95.8-2.2 2.3-2.8 5.7-1.5 8.7 1.3 2.9 4.1 4.8 7.3 4.8 66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 27.4 0 53.7-3.6 78.4-10L72.9 186.4c-5.6 17.1-8.9 35-8.9 53.6zm569.8 218.1l-114.4-88.4C554.6 334.1 576 289.2 576 240c0-114.9-114.6-208-256-208-65.1 0-124.2 20.1-169.4 52.7L45.5 3.4C38.5-2 28.5-.8 23 6.2L3.4 31.4c-5.4 7-4.2 17 2.8 22.4l588.4 454.7c7 5.4 17 4.2 22.5-2.8l19.6-25.3c5.4-6.8 4.1-16.9-2.9-22.3z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="comments-publication-box__date  gutters  margin-b-10"><?=$date?></div>
            </div>

            <div class="comments-publication-box__content  content-text">
                <p><?=$text?></p>
            </div>
            <?=$div?>



        </div>
        <div class="reply-block"></div>
        <?php foreach ($item->children as $children): ?>

            <?= $this->render('_comment', ['item' => $children, 'user_parent' => $info]) ?>

        <?php endforeach; ?>
    </li>
</ul>
