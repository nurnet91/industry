<?php

namespace app\widgets;

use yii\base\Widget;

class Breadcrumb extends Widget
{
	public function run()
	{
		return $this->render('breadcrumb');
	}
}