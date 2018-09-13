<?php 

namespace app\models\queries;

use yii\db\ActiveQuery;

	class ProjectsQuery extends ActiveQuery {
		
		public function active() {

			return $this->andWhere(['in_b_projects.status' => 1]);
			
		}
		
	}