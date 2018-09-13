<?php

namespace app\modules\bizley\podium\src\filters;


use app\modules\bizley\podium\src\models\User;
use app\modules\bizley\podium\src\Podium;
use Yii;

/**
 * Permission denied access rule
 * Redirects user with error message in case of no permission granted.
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.6
 */
class PermissionDeniedRule extends PodiumRoleRule
{
    /**
     * @var boolean whether this is an 'allow' rule or 'deny' rule.
     */
    public $allow = false;

    /**
     * @var string permission name.
     */
    public $perm;

    /**
     * @var string redirect route.
     */
    public $redirect;

    /**
     * Sets match and deny callbacks.
     */
    public function init()
    {
        parent::init();
        $this->matchCallback = function () {
            return !User::can($this->perm);
        };
        $this->denyCallback = function () {
            Yii::$app->session->addFlash('danger', Yii::t('podium/flash', 'You are not allowed to perform this action.'), true);
            return Yii::$app->response->redirect([Podium::getInstance()->prepareRoute($this->redirect)]);
        };
    }
}
