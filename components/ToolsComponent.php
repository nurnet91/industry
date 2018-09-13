<?php

namespace app\components;
use Yii;
use \yii\base\Component;
use yii\httpclient\Client;
use common\models\Smslog;

class ToolsComponent extends Component{
    public function ucfirst($text) {
        mb_internal_encoding("UTF-8");
        return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
    }
    public function getFirst($text) {
        mb_internal_encoding("UTF-8");
        return mb_strtoupper(mb_substr($text, 0, 1));
    }
    public function wordsCut($str = null,$length_str = 200,$points = "...")
    {
        mb_internal_encoding("UTF-8");
        $str = $str." ";
        $return_str = null;
        if($str == null){return;}
        if(strlen($str) == 0){return;}
        $pattern = '#(.*?)\s#';
        preg_match_all($pattern,$str,$words);
        $words = $words[1];
        foreach ($words as $word)
        {
            if(strlen(trim($return_str." ".$word)) > $length_str){
                $return_str .= $points;
                break;
            }
            $return_str .= " ".$word;
        }
        return $return_str;
    }
    function abbrName($name = "title"){
        if($name == null){return;}
        preg_match_all("#[a-zA-ZА-Яа-я\`\'\-]+#u",$name,$data);
        $last_name = $data[0][0];
        $first_name = $data[0][1];
        $father_name = $data[0][2];
        $abbs = [];
        if(@$this->getFirst($first_name)):
            $abbs[] = $this->getFirst($first_name);
        endif;
        if(@$this->getFirst($father_name)):
            $abbs[] = $this->getFirst($father_name);
        endif;
        $abbs[] = $last_name;
        $abbs_string = @implode(".",$abbs);

        return $abbs_string;
    }
    public function isSessionHasRemove($keys = []){
        $session = \Yii::$app->session;
        foreach ($keys as $key) {
            if($session->has($key)) {
                $session->remove($key);
            }
        }
    }
    public function getNextDate(){
        if(Yii::$app->settings->has('maxday','Order')) {
            $maxday = Yii::$app->settings->get('maxday', 'Order');
            if ($maxday > 0) {
                $next_date_number = $maxday;
            } else {
                $next_date_number = 7;
            }
        }else {
            $next_date_number = 7;
        }
        $date = new \DateTime();
        $interval = 'P'.$next_date_number.'D';
        $date->add(new \DateInterval($interval));
        return ['y'=>$date->format('Y'),'m'=>(integer)$date->format('m')-1,'d'=>(integer)$date->format('d')];
    }
}