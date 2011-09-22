<?php
function indexGetMarkUp()
{
		return <<<HTML
			   <div id="how_it_works">
					<div style="vertical-align:middle; height:200px; margin-top:120px;">	
				  How it works <br/>
				  Gonna put a video here.
				  	</div>
			   </div>
			   <div id="place_chooser">
				  <div>
					 <h2>你想去哪里？</h2>
				  </div>

				  <div>
					 <form id="form_dest_chooser" action="/basic_form.php" method="get">
					 <select id="select_dest_chooser" name="dest_id" onChange="document.getElementById('form_dest_chooser').submit();">
						<option value="maldives">马尔代夫</option>
						<option value="fiji">斐济</option>
						<option value="maltiues">毛里求斯</option>
						<option value="ageansea">希腊爱琴海</option>
						<option value="provonse">普罗旺斯</option>
					 </select>
				  </form>
				  </div>

			   </div>
HTML;
}
?>
<?php
require("header_and_footer.php");
echo headerGetMarkUp();
echo indexGetMarkUp();
echo footerGetMarkUp();
?>
