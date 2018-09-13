<?php 

namespace app\models\queries;

use yii\db\ActiveQuery;

	class WordQuery extends ActiveQuery {
		
		public function active() {

			return $this->andWhere(['in_b_words.status' => 1]);
			
		}
		
	}