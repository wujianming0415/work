
<center>
	<div class="bg-primary row" style="margin:0 0;min-width: 1840px;">
		<div class="form-inline">
			<div class="text-left"><h2 style="margin: 20px 50px 10px;">直客点击和收入数据输入</h2></div>
			<div class="text-right ">
				<a href="click_income">
					<button class="btn btn-info" style="margin: 0 10px 10px;">数据汇总</button>
				</a>
				<a href="click_income_alter_view">
					<button class="btn btn-info" style="margin: 0 10px 10px;">详细数据</button>
				</a>
			</div>
		</div>
	</div>
	<div class="text-primary" style="text-align: center; margin-top: 20px; min-width: 1800px">
	<?php echo validation_errors(); ?>
	</div>
	<div class="row" style="text-align: center; margin: 20px; min-width: 1800px">
	<form method="post" accept-charset="utf-8" action="click_income_update">
	<div class="form-inline">
		<div class="input-group date form_date  col-md-3 "  data-date="<?php echo $week_time;?>" data-date-format="yyyy-mm-dd">
			<input id="datepicker_1"  class="form-control" name="week_time" size="16" type="text" value="<?php echo $week_time;?>"  onchange="setDay(this.value)" readonly> 
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-th"></span>
			</span>
		</div>
		<div class="input-group text-primary">
			<h3>请选择需要插入的周</h3>
		</div>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="hidden" id="save" name="save_data" value="save"/>
		<input type="submit" id="submit" class="btn btn-primary btn-lg" value="保存"/>
	</div>
	
		<table class="table table-hover table-bordered"  style="text-align: center; margin-top: 20px; min-width: 1800px;">
			<thead>
				<tr class="info">
			      <th style="width:100px;">ID</th>
			      <th style="width:100px;">市场</th>
			      <th style="width:200px;">网盟</th>
			      <th style="width:200px;">offer name</th>
			      <th style="width:120px;">类型</th>
			      <th style="width:120px;">短连接</th>
			      <th style="width:120px;">camp_id</th>
			      
			      <th style="width:120px;">周收入</th>
			      <th style="width:120px;"><input type="text" id="day_0" name="day_0" class="form-control"  value="<?php echo date('m月d日',strtotime($week_time));?>" readonly></th>
			      <th style="width:110px;"><input type="text" id="day_1" name="day_1" class="form-control"  value="<?php echo date('m月d日',strtotime($week_time)+86400);?>" readonly></th>
			      <th style="width:120px;"><input type="text" id="day_2" name="day_2" class="form-control"  value="<?php echo date('m月d日',strtotime($week_time)+2*86400);?>" readonly></th>
			      <th style="width:120px;"><input type="text" id="day_3" name="day_3" class="form-control"  value="<?php echo date('m月d日',strtotime($week_time)+3*86400);?>" readonly></th>
			      <th style="width:120px;"><input type="text" id="day_4" name="day_4" class="form-control"  value="<?php echo date('m月d日',strtotime($week_time)+4*86400);?>" readonly></th>
			      <th style="width:120px;"><input type="text" id="day_5" name="day_5" class="form-control"  value="<?php echo date('m月d日',strtotime($week_time)+5*86400);?>" readonly></th>
			      <th style="width:120px;"><input type="text" id="day_6" name="day_6" class="form-control"  value="<?php echo date('m月d日',strtotime($week_time)+6*86400);?>" readonly></th>
			    </tr>
			</thead>
			<?php foreach ($view as  $data_item): ?>
			<tr >
			  	<td>
			  		<input type="text" class="form-control" name="identify[]" id="identify"  value="<?php echo $data_item['identify']; ?>" placeholder="请输入">
				</td>
			  	<td>
			  		<input type="text" class="form-control" name="market[]" id="market"  value="<?php echo $data_item['market']; ?>" placeholder="请输入">
				</td>
			  	<td><input type="text" class="form-control" name="web_union[]" id="web_union" value="<?php echo $data_item['web_union']; ?>" placeholder="请输入"></td>
			  	<td><input type="text" class="form-control" name="offer_name[]" id="offer_name" value="<?php echo $data_item['offer_name']; ?>" placeholder="请输入"></td>
			  	<td><input type="text" class="form-control" name="type[]" id="type" value="<?php echo $data_item['type']; ?>" placeholder="请输入"></td>
			  	<td><input type="text" class="form-control" name="link[]" id="link" value="<?php echo $data_item['link']; ?>" placeholder="请输入"></td>
			  	<td><input type="text" class="form-control" name="camp_id[]" id="camp_id" value="<?php echo $data_item['camp_id']; ?>" placeholder="请输入"></td>
			  	
			  	<td><input type="text" class="form-control" name="income[]" id="income" value="" placeholder="请输入"></td>
			  	<td><input type="text" class="form-control" name="day_0[]" id="day_0" value="<?php echo $data_item['day_1']; ?>"  placeholder="请输入"></td>
			  	<td><input type="text" class="form-control" name="day_1[]" id="day_1" value="<?php echo $data_item['day_2']; ?>"  placeholder="请输入"></td>
			  	<td><input type="text" class="form-control" name="day_2[]" id="day_2" value="<?php echo $data_item['day_3']; ?>"  placeholder="请输入"></td>
			  	<td><input type="text" class="form-control" name="day_3[]" id="day_3" value="<?php echo $data_item['day_4']; ?>"  placeholder="请输入"></td>
			  	<td><input type="text" class="form-control" name="day_4[]" id="day_4" value="<?php echo $data_item['day_5']; ?>"  placeholder="请输入"></td>
			  	<td><input type="text" class="form-control" name="day_5[]" id="day_5" value="<?php echo $data_item['day_6']; ?>"  placeholder="请输入"></td>
			  	<td><input type="text" class="form-control" name="day_6[]" id="day_6" value="<?php echo $data_item['day_7']; ?>"  placeholder="请输入"></td>
			</tr>
			<?php endforeach ?>
		</table>
	</form>
</div>
		
</center>

<script type="text/javascript">
	function setDay(val)
	{	
		var date;
		var i;
		var d;
		var str;
		document.getElementById("submit").value = "查询";
		document.getElementById("save").value = "view";
		for(i = 0; i<7; i++){
			date = new Date(val);
			date = date.getTime()-date.getUTCDay()*86400000;
			d = new Date();
			date = date+i*86400000;
			d.setTime(date);
			str = d.toLocaleDateString();
			str_id="day_"+i;
			document.getElementById(str_id).value = str.slice(5);
		}
	}
</script>
