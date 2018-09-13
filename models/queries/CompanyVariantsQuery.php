<?php 

namespace app\models\queries;

use yii\db\ActiveQuery;

	class CompanyVariantsQuery extends ActiveQuery {
		
		public function active() {

			return $this->andWhere(['in_company_variants.status' => 1]);
			
		}
		
	}