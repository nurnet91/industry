<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\models\Thread;
use yii\widgets\ListView;

?>
<?= ListView::widget([
    'dataProvider'     => (new Thread())->searchByUser($id),
    'itemView'         => '/elements/forum/_thread',
    'summary'          => '',
    'emptyText'        => t( 'No threads have been added yet.'),
    'emptyTextOptions' => ['tag' => 'td', 'class' => 'text-muted', 'colspan' => 4],
    'options'          => ['tag' => 'tbody'],
    'itemOptions'      => ['tag' => 'tr', 'class' => 'podium-thread-line']
]);
