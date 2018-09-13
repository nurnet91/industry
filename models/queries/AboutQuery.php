<?php 

namespace app\models\queries;

use yii\db\ActiveQuery;

	class AboutQuery extends ActiveQuery {
		
		public function active() {

			return $this->andWhere(['in_b_about.status' => 1]);
			
		}
		
	}