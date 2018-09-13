<div class="news-box__body">
    <div class="news-box__title-head  content-text">
        <h3><?=$model->title?></h3>
    </div>
    <span class="news-box__date"><?=Yii::$app->formatter->asDate($model->created_at,'d.M.Y')?></span>
    <span class="news-box__author"><i class="fa fa-user"></i><a href="<?=$model->user->singleLink?>">ITE</a></span>
    <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
        <img src="/images/temp/news-poster1.jpg" alt="">
        <a data-fancybox href="https://vimeo.com/191947042" class="news-box__play  btn-play"><i class="fa fa-play" aria-hidden="true"></i></a>
    </div>
    <div class="news-box__info  flex justify-content-between align-items-center">
        <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i><?=$model->countLikes?></div>
        <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i><?=$model->views?></div>
    </div>
    <div class="dotted-box  dotted-box_news">
        <div class="dotted-box__in">
            <div class="dotted-box__item  dotted-box__item_left">Продолжительность</div>
            <div class="dotted-box__item  dotted-box__item_right">3:23</div>
        </div>
        <div class="dotted-box__in">
            <div class="dotted-box__item  dotted-box__item_left">Язык</div>
            <div class="dotted-box__item  dotted-box__item_right">Английский</div>
        </div>
    </div>
    <div class="news-box__content  content-text">
        <p><?=wordsCut($model->description,'200','....')?></p>
    </div>
</div>
<div class="news-box__foot  flex  justify-content-between  align-items-center">
    <a href="<?=$model->singleLink?>" class="news-box__btn  button  button_blue">
        <span class="btn__in">Смотреть</span>
    </a>
    <div class="news-box__settings">
        <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
        <a href="#" class="news-box__settings-link  news-box__settings-link_favour <?=$class?>" data-favorite_id="<?=$model->id?>">
            <i class="fa fa-bookmark" aria-hidden="true"></i>
            <i class="fa fa-bookmark-o" aria-hidden="true"></i>
        </a>
    </div>
</div>

