<?php 

	namespace app\components;

	use Yii;

	class NFormat {
		
		public function dt($dt) {

			$dt1 = explode(' ', $dt);

	        if (isset($dt1[1]) AND strlen($dt1[0]) != 10) {

	            unset($dt1[1]);
	            
	        }

	        $dt2 = explode('.', $dt1[0]);

	        if (count($dt2) > 1) {

	            $dt3 = array_reverse($dt2);

	            $dt = implode('-', $dt3);

	            if (isset($dt1[1])) {

	                $dt .= ' ' . $dt1[1];
	                
	            }

	        }

	        return $dt;
			
		}

		public static function orderList($start = 0, $end = 50, $counter = 1) {

			$list = [];

			if ($end >= $start) {
				
				for ($i=$start; $i <= $end; $i+=$counter) { 

					$list[$i] = $i;
					
				}

			}

			return $list;
			
		}
		
	}