<?php
include '../wxgzh.php';
include '../includes/curl.php';
setMenu();
function setMenu(){
		$token = getAccessToken();
		$url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$token;
		$menu = [
			'button'=>[
				[
					'name' => '一只小狗',
					'sub_button'=>[
						[
							'type' => 'view',
							'name' => '首页',
							'url' =>'https://www.cnblogs.com/liusuifeng/p/10671860.html',
							'sub_button' => [],
						],
						[
							'type' => 'miniprogram',
							'name' => '我的小程序',
							'url' =>'https://du1986.com',
							'appid' =>'wx1a5b77b1374d2385',
							'pagepath' =>'pages/index',
							'sub_button' => [],
						],
						[
							'type' => 'pic_sysphoto',
							'name' => '拍照测试',
							'key' =>'take_photo',
							'sub_button' => [],
						],
						
					],
				],
				[
					'name' => 'view_limited',
					'type' => '图文测试',
					'media_id' => 'pic_word',
				],
				[
					'name'=> '历史纪录', 
		            'type'=> 'view', 
		            'url'=> 'http://www.du1986.com/history'
				]
				
			],
		];
		$result = curlPost(http_build_query($menu),$url,'post');
		echo $result;
}
function getMenu(){
	$token = getAccessToken();
	$url = 'https://api.weixin.qq.com/cgi-bin/menu/get?access_token='.$token;
	$result = curlPost('',$url);
	echo $result;
}
