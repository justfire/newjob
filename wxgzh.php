<?php
/**
  * wechat php test
  */
	function getAccessToken(){
		$appId = 'wx17f1b5a370764864';
		$appKey = '2fcf935bfa434bd2d160d276e070d17a';
		$grantType = 'client_credential';
		if(isset($_COOKIE['accessToken'])&&$_COOKIE['accessToken']){
			return $_COOKIE['accessToken'];
		}else{
			$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type='.$grantType.'&appid='.$appId.'&secret='.$appKey;
		$result = file_get_contents($url);
		$res = json_decode($result,true);
		if (isset($res['access_token'])){
			setcookie('accessToken',$res['access_token'],7100);
			echo 'success';
			return $res['access_token'];
		}else{
			error_log($result,3,'../log/log.log');
			echo 'fail';
			return '';
		}
		}
		
	}
	
	
?>
