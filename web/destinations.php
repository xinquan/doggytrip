<?php
function getDestnationInfo($dest_id)
{
		global $destnations;
		return $destnations[$dest_id];
}
$destnations = array(
		'maldives' => array(
				'name' => '马尔代夫',
				'intro' => '马尔代夫是海岛度假旅行的代表，也是我们开通的第一个目的地，麦兜小朋友是这样形容马尔代夫的“马尔代夫，那里蓝天白云，椰林树影，水清沙幼，坐落于印度洋的世外桃源…… ”。<br/>目前我们有代理马尔代夫的旅行社<span class="sharp_num">28</span>家，他们中有的是大牌的旅行社，有的是专做海岛的专业旅行社，也有是马尔代夫专营旅行社，还有一些，如Atoll Paradise，是马尔代夫当地的旅行社（可能需要懂一些英文），这些旅行社提供的方案和价格各有不同，供你选择。',
				'image' => 'http://maldiveshoneymoonpackage.com/images/maldives1.jpg'
		),
		'fiji' => array(
				'name' => '斐济',
				'intro' => '斐济位于西南太平洋中心，是南太平洋地区的交通枢纽，也是著名的海岛旅游盛地，<br/>目前我们有代理斐济的旅行社<span class="sharp_num">28</span>家，他们中有的是大牌的旅行社，有的是专做海岛的专业旅行社，也有是斐济专营旅行社，这些旅行社提供的方案和价格各有不同，供你选择。',
				'image' => 'http://i2.sinaimg.cn/travel/2011/0504/U5270P704DT20110504114425.jpg'
		),
);
?>
