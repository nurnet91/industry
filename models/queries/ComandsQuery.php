<?php 

namespace app\models\queries;

use yii\db\ActiveQuery;

	class ComandsQuery extends ActiveQuery {
		
		public function active() {

			return $this->andWhere(['in_b_commands.status' => 1]);
			
		}
		
	}