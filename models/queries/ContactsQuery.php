<?php 

namespace app\models\queries;

use yii\db\ActiveQuery;

	class ContactsQuery extends ActiveQuery {
		
		public function active() {

			return $this->andWhere(['in_b_contacts.status' => 1]);
			
		}
		
	}