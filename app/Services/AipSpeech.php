<?php
namespace App\Services;

/**
    百度语音合成api接口
    通过URL，直接把文字变语音输出
    更多请参看readme.md
    gethub https://github.com/qcomdd/hi-voice
    调用方式./voice.php?t=要合成语音的文字
    百度token有效期30天，缓存在文本文件（对目录有写要求）15天一更换
*/
error_reporting(E_ALL ^ E_NOTICE);
// header("content-type:audio/mp3;charset=utf-8");
//************基本定义
define('DS', DIRECTORY_SEPARATOR );
define('TEMP', storage_path('/temp/'));

class AipSpeech
{
    private $appkey = 'W3GEgH72md9DXxuPv1zGXelY',
        $secret = 'TLGQTKMulzvjapmSS9Tj02XYBjQoi6tA',
        $openUrl = 'https://openapi.baidu.com/oauth/2.0/token?',
        $urlVoice = 'http://tsn.baidu.com/text2audio?',
        $logName = 'bd_log.txt',
        $tokenName = 'bd_token.txt',
        $isLog = TRUE, $scope;

    public $access_token;
    
	function __construct(){
        global $n,$t;
    }

    function getVoice($txt, $title)
    {
        $tok = $this->getToken();
        $params = array(
            'tex' => $txt,
            'tok' => $tok,
            'spd' => 5,     // 语速，取值 0-9，默认为 5
            'pit' => 5,     // 音调，取值 0-9，默认为 5
            'vol' => 9,     // 音量，取值 0-9，默认为 5
            'per' => 0,     // 取值 0-1 ；0 为女声，1 为男声，默认为女声

            'cuid' => 'huajidian',
            'ctp' => 1,
            'lan' => 'zh'
        );

        $result = $this->file_get_content($this->urlVoice, $params);
        if (!$result) return 'Oauth2服务器连接失败';

        // 保存到文件
        $targetName = storage_path('/temp/') . $title . '.mp3';
        
        if(!is_array($result) && !is_file($targetName)){
            file_put_contents($targetName, $result);
        }

        return $targetName;
    }

    function _getToken()
    {
        //百度直接返回AccessToken
        $params = array(
            'client_id' => $this->appkey,
            'client_secret' => $this->secret,
            'grant_type' => 'client_credentials'
        );

        $c = $this->file_get_content($this->openUrl, $params);
        if (!$c) return 'Oauth2服务器连接失败';
        return $c;
    }

    function getToken()
    {
        $filename = TEMP . ($this->tokenName);
        $file = fopen($filename, 'a+') or die("Unable to open file!");
        $str = fread($file, 1024);
        $arr = json_decode($str, true);

        if (!$arr || !isset($arr['_time']) || time() > intval($arr['_time']))
        {
            $str = $this->_getToken();
            $arr = (array)json_decode($str, true);
            $arr['_time'] = time() + intval($arr['expires_in']) / 2;

            $string = json_encode($arr);//支持数组和对象;
            fclose($file);
            $file = fopen($filename, 'w+');
            fwrite($file, $string);
        }
        
        fclose($file);
        unset($file);
        $this->openid = $arr['refresh_token'];
        $this->access_token = $arr['access_token'];

        return $this->access_token;
    }
  
    function _log($data)
    {	
        if ($this->isLog)
        {
            $string = var_export($data, TRUE);//不加true和VAR_DUMP一样
            $file = fopen(TEMP . $this->logName, 'a+');
            fwrite($file, $string . "\r\n");
            fclose($file);
            unset($file);
        }
    }

    private function file_get_content($url, $par)
    {
        $ch = curl_init();
        $timeout = 30;
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($par));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
        return $file_contents;
    }
}
