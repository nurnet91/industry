<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\models\Thread;
use yii\widgets\ListView;

$filtersOn = false;
if (!isset($filters)) {
    $filters = null;
}
if (!empty($filters)) {
    foreach ($filters as $filter) {
        if ($filter) {
            $filtersOn = true;
            break;
        }
    }
}
?>
<?= ListView::widget([
    'dataProvider'     => (new Thread())->search($forum, $filters),
    'itemView'         => '/elements/forum/_thread',
    'summary'          => '',
    'emptyText'        => $filtersOn
                            ? t( 'No threads matching the filters can be found.')
                            : t( 'No threads have been added yet.'),
    'emptyTextOptions' => ['tag' => 'td', 'class' => 'text-muted', 'colspan' => 4],
    'options'          => ['tag' => 'tbody'],
    'itemOptions'      => ['tag' => 'tr', 'class' => 'podium-thread-line']
]);
