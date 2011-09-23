<?php
function detailFormGetMarkUp()
{
		$dest_id = secureGetParam('dest_id');
		$dest = getDestnationInfo($dest_id);
		//print_d($dest);
		//print_d($dest_id);
		return <<<HTML
					<div class="success-frame">
						我们基本上已经了解了你的旅行需求，关于目的地{$dest["name"]}，我们也有一定的了解，<br/>
						如果你愿意告诉我们你的偏好，旅行社们可能给你推荐更适合你的旅行计划。<br/>
						当然，你也可以跳过这些问题，直接<a href="">提交你的需求</a>。
					</div>
			<div id="detail_form">
				<form id="detail_basic_form" action="/detail_form.php" method="POST"> 
					<div>
						<h4>关于{$dest['name']}的一些细节问题：</h4>
					</div>
					<div>
						<div class="frm-heading">怎么称呼你：</div>
						<div class="frm-inputs">
							<input name="realname" placeholder="真实姓名"/>
							<select name="gender">
								<option value="m">先生</option>
								<option value="f">女士</option>
							</select>
						</div>
					</div>
					<div>
						<div class="frm-heading"></div>
						<div class="frm-inputs">
							<button type="submit" class="default">O了，提交我的信息 &gt;</button>
						</div>
					</div>
				</form>
			</div>
HTML;
}
?>
<?php
require("header_and_footer.php");
require("destinations.php");
require("common_functions.php");
$requestBasicInfo = array ();
$acceptingValue = array('realname', 'gender', 'num_adults', 'num_children', 'trip_status', 
	'budget', 'departure_date', 'num_nights', 'mobile_phone', 'extra_information');

foreach ($acceptingValue as $i)
{
	$requestBasicInfo[$i] = secureGetParam($i, "POST");

}
//print_d($requestBasicInfo);

echo headerGetMarkUp();
echo detailFormGetMarkUp();
echo footerGetMarkUp();
?>
