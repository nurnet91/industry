<?php 

namespace app\models\queries;

use yii\db\ActiveQuery;

	class ReviewQuery extends ActiveQuery {
		
		public function active() {

			return $this->andWhere(['in_b_reviews.status' => 1]);
			
		}
		
		public function pos($pos) {

			return $this->andWhere(['in_b_reviews.position' => $pos]);
			
		}
		
	}