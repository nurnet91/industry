<?php

use yii\helpers\ArrayHelper;

function t($message, $attr = []){return Yii::t('app', $message, $attr);}

	function short($string, $max = 255, $deff = '...'){
	   if(mb_strlen($string, 'utf-8') >= $max){
	       $string = mb_substr($string, 0, $max - 1, 'utf-8') . $deff;
	   } 
	   return $string;
	}


    function isVideo($fileName) {

        $videoExtensions = ['mp4', 'flv', 'm4v', 'wmv', 'ogg', 'webm'];

        foreach ($videoExtensions as $extension){
            if(substr($fileName, strrpos($fileName, '.') + 1) == $extension){
                return true;
            }
        }
        return false;
    }

    function wordsCut($str = null, $length_str = 200, $points = "...")
    {
        mb_internal_encoding("UTF-8");
        $str = $str . " ";
        $return_str = null;
        if ($str == null) {
            return;
        }
        if (strlen($str) == 0) {
            return;
        }
        $pattern = '#(.*?)\s#';
        preg_match_all($pattern, $str, $words);
        $words = $words[1];
        foreach ($words as $word) {
            if (strlen(trim($return_str . " " . $word)) > $length_str) {
                $return_str .= $points;
                break;
            }
            $return_str .= " " . $word;
        }
        return $return_str;
    }

	function dd($value = "") {
		echo "<pre>";
		var_export($value);
		echo "</pre>";
		exit;
	}

	function ddv($value = "") {
		echo "<pre>";
		var_export($value);
		echo "</pre>";
	}

	function kk($value = "") {
		echo "<pre>";
		var_dump($value);
		echo "</pre>";
		exit;
	}
    function qq($value = "") {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
        exit;
    }

	function kkv($value = "") {
		echo "<pre>";
		var_dump($value);
		echo "</pre>";
	}

	function monthsList() {
		return [
			1 	=> t('January'),
			2 	=> t('February'),
			3 	=> t('March'),
			4 	=> t('April'),
			5 	=> t('May'),
			6 	=> t('June'),
			7 	=> t('Jule'),
			8 	=> t('August'),
			9 	=> t('September'),
			10 	=> t('October'),
			11 	=> t('November'),
			12 	=> t('December'),
		];
	}
	function dayList(){
	    $array =[];
        for($i=1;$i<=31;$i++) {
            $array[$i] = $i;
        }
        return $array;
    }
    function yearList(){
        $array =[];
        for($i=date('Y');$i<=date('Y')+10;$i++) {
            $array[$i] = $i;
        }
        return $array;
    }

	function noPhotoSrc() {
		return "/images/no_photo.png";
	}

	function extensions($video) {
        if($video){
            return "png,jpg,jpeg,gif,mp4,flv,m4v";
        }else{
            return "png,jpg,jpeg";
        }

	}

	function getRecordsByClass($id, $isArr = false, $class){
//        kk($class::findByLang()->andWhere(['id' => $id])->one());
        if($isArr){
            $ids = explode(',', $id);
            $arr = null;
            foreach ($ids as $key => $newId){
                $arr[$key] = $class::findOne($newId)->name;
            }

            return implode(', ', $arr);
        }else{
            return $class::findOne($id);
        }
    }
