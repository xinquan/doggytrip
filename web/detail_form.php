<?php
function getDestinationQuestions($dest_id)
{

	$sql = <<<SQL
	SELECT question_id, question_input_name, question_title, 
		 question_type, question_option_json, question_description
	FROM
		`DestinationQuestion`
	WHERE
		`dest_id` = "$dest_id";
SQL;
	$retval = do_mysqli_fetch_array($sql);
	return $retval;

}
function detailFormGetMarkUp()
{
		$dest_id = secureGetParam('dest_id');
		$dest = getDestinationInfo($dest_id);
		//print_d($dest);
		//print_d($dest_id);
		$dest_questions = getDestinationQuestions($dest_id);
		//print_d($dest_questions);
				$t = array(
					0 => array(
						'option_value' => 'op_1',
						'option_title' => 'tit_1'
					),
					1 => array(
						'option_value' => 'op_2',
						'option_title' => 'tit_2'
					)
				);

					$t = array(
						'option_value' => 'op_1',
						'option_title' => 'tit_1'
					);
					//print_d(json_encode($t));
		$questions_markup = "";
		foreach($dest_questions as $question)
		{
			$questions_markup .= <<<HTML
					<div>
						<div class="frm-heading">{$question["question_title"]}：</div>
						<div class="frm-inputs">
HTML;
			switch($question['question_type'])
			{
			case 'text':
				$text_option = json_decode($question["question_option_json"], true);
				//print_d($text_option);
				$questions_markup .= <<<HTML
								<input size="{$text_option['input_size']}" name="{$question['question_input_name']}" placeholder="{$text_option['input_place_holder']}"/> 
HTML;
				break;
			case 'single_option':
				$questions_markup .= <<<HTML
							<select name="{$question['question_input_name']}">
				
HTML;
				$select_options = json_decode($question["question_option_json"], true);
				foreach($select_options as $select_option)
				{
					$questions_markup .= <<<HTML
								<option value="{$select_option['option_value']}">{$select_option["option_title"]}</option>
HTML;
				}
				$questions_markup .= <<<HTML
							</select>
				
HTML;
				break;
			}

			$questions_markup .= <<<HTML
						</div>
					</div>
HTML;

			if(!empty($question['question_description']))
			$questions_markup .= <<<HTML
					<div>
						<div class="frm-heading">&nbsp;</div>
						<div class="frm-inputs">
							<span class="comment">{$question['question_description']}</span>
						</div>
					</div>
HTML;

			//print_d($questions_markup);
		}//foreach
		return <<<HTML
					<div class="success-frame">
						恭喜！你的旅行需求已经被提交。<br/><br/>
						关于目的地{$dest["name"]}，我们也有一定的了解，<br/>
						如果你愿意告诉我们你的偏好，旅行社们可能给你推荐更适合你的旅行计划。<br/><br/>
						当然，你也可以跳过这些问题，直接<a href="/request_submit.php?detail_skipped=1">提交你的需求</a>。
					</div>
			<div id="detail_form">
				<form id="frm_detail_form" action="/request_submit.php" method="POST"> 
					<div>
						<h4>关于{$dest['name']}的一些细节问题：</h4>
					</div>
					{$questions_markup}
					<div>
						<div class="frm-heading"></div>
						<div class="frm-inputs">
						<input type="hidden" name="dest_id" value="$dest_id">
							<button type="submit" class="default">O了，提交我的细节需求 &gt;</button>
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
/*

	+-------------------+---------------+------+-----+---------+----------------+
	| Field             | Type          | Null | Key | Default | Extra          |
	+-------------------+---------------+------+-----+---------+----------------+
	| req_id            | int(11)       | NO   | PRI | NULL    | auto_increment |
	| user_id           | varchar(128)  | NO   |     | NULL    |                |
	| real_name         | varchar(128)  | NO   |     | NULL    |                |
	| gender            | enum('m','f') | NO   |     | NULL    |                |
	| budget            | int(11)       | NO   |     | NULL    |                |
	| have_date         | enum('y','n') | NO   |     | NULL    |                |
	| departure_date    | varchar(128)  | YES  |     | NULL    |                |
	| trip_length       | tinyint(4)    | YES  |     | NULL    |                |
	| num_adults        | tinyint(4)    | NO   |     | NULL    |                |
	| num_children      | tinyint(4)    | NO   |     | NULL    |                |
	| mobile_phone      | varchar(128)  | NO   |     | NULL    |                |
	| email             | varchar(128)  | NO   |     | NULL    |                |
	| extra_information | blob          | YES  |     | NULL    |                |
	+-------------------+---------------+------+-----+---------+----------------+
	13 rows in set (0.00 sec)

 */
$acceptingValue = array('user_id', 'real_name', 'gender', 'budget', 'trip_status', 
	'departure_date', 'trip_length', 'num_adults', 'num_children', 'mobile_phone', 'email', 'extra_information');

foreach ($acceptingValue as $i)
{
	$requestBasicInfo[$i] = secureGetParam($i, "POST");

}



createRequestWithBasicInfo($requestBasicInfo);
function createRequestWithBasicInfo(&$requestBasicInfo)
{
	if(empty($requestBasicInfo['user_id']))
		$requestBasicInfo['user_id'] = 0;

	$requestBasicInfo['have_date'] = (empty($requestBasicInfo['departure_date'])) ? "n" : 'y';
	print_d($requestBasicInfo);
	$sql = <<<SQL
INSERT INTO `Request`
	SET
	`user_id` = {$requestBasicInfo['user_id']},
	`real_name` = "{$requestBasicInfo['real_name']}",
	`gender` = "{$requestBasicInfo['gender']}",
	`budget` = {$requestBasicInfo['budget']},
	`trip_status` = "{$requestBasicInfo['trip_status']}",
	`departure_date` = "{$requestBasicInfo['departure_date']}",
	`trip_length` = {$requestBasicInfo['trip_length']},
	`num_adults` = {$requestBasicInfo['num_adults']},
	`num_children` = {$requestBasicInfo['num_children']},
	`mobile_phone` = "{$requestBasicInfo['mobile_phone']}",
	`email` = "{$requestBasicInfo['email']}",
	`extra_information` = "{$requestBasicInfo['extra_information']}",
	`have_date` = "{$requestBasicInfo['have_date']}" ;
SQL;
	print_d($sql);
	$affected_rows = do_mysqli_update_db($sql);
	var_dump($affected_rows);

}

echo headerGetMarkUp();
echo detailFormGetMarkUp();
echo footerGetMarkUp();
?>
