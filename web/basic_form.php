<?php
function basicFormGetMarkUp()
{
		$dest_id = secureGetParam('dest_id');
		$dest = getDestinationInfo($dest_id);
		//print_d($dest);
		//print_d($dest_id);
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
				<form id="frm_basic_form" action="/detail_form.php" method="POST"> 
					<div>
						<h4>为了帮助旅行社们更好的为你服务，请提供你此次旅行的有关细节：</h4>
					</div>
					<div>
						<div class="frm-heading">怎么称呼你：</div>
						<div class="frm-inputs">
							<input name="real_name" placeholder="真实姓名"/>
							<select name="gender">
								<option value="m">先生</option>
								<option value="f">女士</option>
							</select>
						</div>
					</div>
					<div>
						<div class="frm-heading">一共几人：</div>
						<div class="frm-inputs">
							<input size="4" name="num_adults"/> 个成人，<input size="4" name="num_children"/>个小孩（12岁以下）
						</div>
					</div>
					<div>
						<div class="frm-heading">关于这次旅行：</div>
						<div class="frm-inputs">
							<select name="trip_status" onChange="var ov=document.getElementById('ovodc');if(this.value=='dc'){ov.style.display='block';}else{ov.style.display='none';}">
								<option value="dc">我有确切的计划和出发时间，万事具备，只欠旅行社的给力推荐和报价了</option>
									<!-- date clear -->
								<option value="dnc" selected>{$dest['name']}是我最近想去的地方，不过目前我还没有具体的时间计划</option>
									<!-- date not clear -->
								<option value="dd">{$dest['name']}是我梦想的旅行地，虽然现在没时间和闲钱，但先研究以下行情总是好的</option>
									<!-- dreaming dest -->
								<option value="oda">没确定好是不是去{$dest['name']}，{$dest['name']}貌似也不错，我要先研究研究</option>
									<!-- other dest available -->
							</select>
						</div>
					</div>
					<div id="ovodc" style="display:none;">
						<!-- only visiable on date clear -->
						<div>
							<div class="frm-heading">旅行时间：</div>
							<div class="frm-inputs">
								<input size="28" name="departure_date"/> 格式：YYYY/MM/DD，如2012/03/08
							</div>
						</div>
					<div>
						<div>
							<div class="frm-heading">在{$dest['name']}停留的时间：</div>
							<div class="frm-inputs">
								<select name="trip_length">
									<option value="3">4天3晚</option>
									<option value="4">5天4晚</option>
									<option value="5">6天5晚</option>
									<option value="6">7天6晚</option>
									<option value="7">8天7晚</option>
									<option value="8">9天8晚</option>
									<option value="9">10天9晚</option>
									<option value="10+">10晚以上（米人，羡慕ing）</option>
								</select>
							</div>
						</div>
						
					</div>
					</div> <!-- ovodc -->
					<div>
						<div class="frm-heading">此次旅行的总预算：</div>
						<div class="frm-inputs">
							<input size="6" name="budget"/> RMB 每人（所有花费，包含机票、酒店、签证等）
						</div>
					</div>
					<div>
						<div class="frm-heading">你的联系方式：</div>
						<div class="frm-inputs">
							<input size="28" name="mobile_phone"/>（请填写你的手机号码）
						</div>
					</div>
					<div>
						<div class="frm-heading"></div>
						<div class="frm-inputs">
							<span class="comment">如果有旅行社向你提供了相关的线路和报价，而你没有即时查看，我们可能通过短信方式通知你。</span>
						</div>
					</div>
					<div>
						<div class="frm-heading">其它补充信息：</div>
						<div class="frm-inputs">
							<textarea name="extra_information" rows="8" cols="60" placeholder="你可以在这里注明其它的信息，例如你是否已经购买了机票、你是否已经办理了护照等。"></textarea>
						</div>
					</div>
					<div>
						<div class="frm-heading"></div>
						<div class="frm-inputs">
						<input type="hidden" name="dest_id" value="$dest_id">
							<button type="submit" class="default">O了，提交我的需求 &gt;</button>
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
echo headerGetMarkUp();
echo basicFormGetMarkUp();
echo footerGetMarkUp();
?>
