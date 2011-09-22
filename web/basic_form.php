<?php
function basicFormGetMarkUp()
{
		$dest_id = secureGetParam('dest_id','GET');
		$dest = getDestnationInfo($dest_id);
		print_d($dest);
		print_d($dest_id);
		return <<<HTML
			<div id="dest_intro">
				<div id="title">
					<h3>{$dest['name']}</h3>
				</div>
				<div id="image">
					<img src="{$dest['image']}" />
				</div>
				<div id="intro">
					{$dest['intro']}
				</div>
			</div>
			<div id="basic_form">
			</div>
HTML;
}
?>
<?php
require("header_and_footer.php");
require("destinations.php");
require("common_functions.php");
echo headerGetMarkUp();
echo basicFormGetMarkUp();
echo footerGetMarkUp();
?>
