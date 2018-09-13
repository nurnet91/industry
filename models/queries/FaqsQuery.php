<?php 

namespace app\models\queries;

use yii\db\ActiveQuery;

	class FaqsQuery extends ActiveQuery {
		
		public function active() {

			return $this->andWhere(['in_b_faqs.status' => 1]);
			
		}
		
	}