<script type="text/javascript">
function setAll(){

	document.getElementById("country_2").value=document.getElementById("country_1").value;
	document.getElementById("country_3").value=document.getElementById("country_1").value;
	document.getElementById("country_4").value=document.getElementById("country_1").value;
	document.getElementById("country_5").value=document.getElementById("country_1").value;
	document.getElementById("country_6").value=document.getElementById("country_1").value;
	document.getElementById("country_7").value=document.getElementById("country_1").value;

}
function checkInteger(val_id, val)
{
	if(val!=''&&val!=null)
	{
		var g= /^\d+$/;
        if(!g.test(val)){
			
		  alert("请输入非负整数！");
		  document.getElementById(val_id).value='';
		  }
	}
    
}
</script>

<center>
<div class="bg-primary row" style="max-width: 1100px">
	<div class="form-inline">
		<div class="text-left"><h2> 模块点击统计数据输入</h2></div>
		<div class="text-right "><a href="click_data"><button class="btn btn-info" >查看数据</button></a></div>
	</div>
</div>

<div class="text-primary" style="margin-top: 50px; max-width: 1000px">
	<?php echo validation_errors(); ?>
</div>
<div>
	<form method="post" accept-charset="utf-8" action="click_update">
		<table class="table table-hover table-bordered"  style=" max-width: 1100px; ">
		  <thead>
		    <tr >
		      <th rowspan="2" class="col-md-2">日期</th>
		      <th rowspan="2" class="col-md-2">日活跃</th>
		      <th class="col-md-2">电商</th>
		      <th class="col-md-2">公司联运游戏</th>
		      <th class="col-md-2">337联运游戏</th>
		      <th class="col-md-1">国家/地区</th>
		    </tr>
		  </thead>
		  <tbody>
			  <tr>
			    <td>
			    	<div class="input-group date form_date" id="clock_to" data-date="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd">
						<input id="datepicker_1"  class="form-control" name="date_nums_1" size="16" type="text" value="<?php echo date('Y-m-d');?>" readonly> 
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-remove"></span>
						</span>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-th"></span>
						</span>
					</div>
				</td>
			    <td><input type="text" class="form-control" name="active_daily_1" id="active_daily_1" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control" name="click_nums_1_1" id="click_nums_1_1" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control" name="click_nums_2_1" id="click_nums_2_1" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control" name="click_nums_3_1" id="click_nums_3_1" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td>
			    	<select class="form-control" name="country_1" id="country_1" onchange="setAll()">	
			    		<option>ALL</option>
						<option>FR</option>
					    <option>PL</option>
					    <option>ES</option>
					    <option>MX</option>
					    <option>AR</option>
					    <option>DE</option>
					    <option>IT</option>
					    <option>TR</option>
					    <option>BR</option>
					    <option>IN</option>
					</select>
				</td>
			  </tr>
			  <tr>
			    <td>
			    	<div class="input-group date form_date" id="clock_to" data-date="<?php echo date('Y-m-d',time()-1*86400);?>" data-date-format="yyyy-mm-dd">
						<input id="datepicker_2"  class="form-control" name="date_nums_2" size="16" type="text" value="<?php echo date('Y-m-d',time()-1*86400);?>" readonly> 
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-remove"></span>
						</span>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-th"></span>
						</span>
					</div>
				</td>
			    <td><input type="text" class="form-control" name="active_daily_2" id="active_daily_2" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control" name="click_nums_1_2" id="click_nums_1_2" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control" name="click_nums_2_2" id="click_nums_2_2" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control" name="click_nums_3_2" id="click_nums_3_2" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td>
			    	<select class="form-control" name="country_2" id="country_2">
			    		<option>ALL</option>
						<option>FR</option>
					    <option>PL</option>
					    <option>ES</option>
					    <option>MX</option>
					    <option>AR</option>
					    <option>DE</option>
					    <option>IT</option>
					    <option>TR</option>
					    <option>BR</option>
					    <option>IN</option>
					</select>
				</td>
			  </tr>
			  <tr>
			    <td>
			    	<div class="input-group date form_date" id="clock_to" data-date="<?php echo date('Y-m-d',time()-2*86400);?>" data-date-format="yyyy-mm-dd">
						<input id="datepicker_3"  class="form-control" name="date_nums_3" size="16" type="text" value="<?php echo date('Y-m-d',time()-2*86400);?>" readonly> 
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-remove"></span>
						</span>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-th"></span>
						</span>
					</div>
				</td>
			    <td><input type="text" class="form-control"  name="active_daily_3" id="active_daily_3" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control"  name="click_nums_1_3" id="click_nums_1_3" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control"  name="click_nums_2_3" id="click_nums_2_3" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control"  name="click_nums_3_3" id="click_nums_3_3" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td>
			    	<select class="form-control" name="country_3" id="country_3">
			    		<option>ALL</option>
					    <option>FR</option>
					    <option>PL</option>
					    <option>ES</option>
					    <option>MX</option>
					    <option>AR</option>
					    <option>DE</option>
					    <option>IT</option>
					    <option>TR</option>
					    <option>BR</option>
					    <option>IN</option>
					</select>
				</td>
			  </tr>
			  <tr>
			    <td>
			    	<div class="input-group date form_date" id="clock_to" data-date="<?php echo date('Y-m-d',time()-3*86400);?>" data-date-format="yyyy-mm-dd">
						<input id="datepicker_4"  class="form-control" name="date_nums_4" size="16" type="text" value="<?php echo date('Y-m-d',time()-3*86400);?>" readonly> 
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-remove"></span>
						</span>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-th"></span>
						</span>
					</div>
				</td>
			    <td><input type="text" class="form-control"  name="active_daily_4" id="active_daily_4" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control"  name="click_nums_1_4" id="click_nums_1_4" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control"  name="click_nums_2_4" id="click_nums_2_4" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control"  name="click_nums_3_4" id="click_nums_3_4" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td>
			    	<select class="form-control" name="country_4" id="country_4">
			    		<option>ALL</option>
						<option>FR</option>
					    <option>PL</option>
					    <option>ES</option>
					    <option>MX</option>
					    <option>AR</option>
					    <option>DE</option>
					    <option>IT</option>
					    <option>TR</option>
					    <option>BR</option>
					    <option>IN</option>
					</select>
				</td>
			  </tr>
			  <tr>
			    <td>
			    	<div class="input-group date form_date" id="clock_to" data-date="<?php echo date('Y-m-d',time()-4*86400);?>" data-date-format="yyyy-mm-dd">
						<input id="datepicker_5"  class="form-control" name="date_nums_5" size="16" type="text" value="<?php echo date('Y-m-d',time()-4*86400);?>" readonly> 
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-remove"></span>
						</span>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-th"></span>
						</span>
					</div>
				</td>
			    <td><input type="text" class="form-control"  name="active_daily_5" id="active_daily_5" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control"  name="click_nums_1_5" id="click_nums_1_5" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control"  name="click_nums_2_5" id="click_nums_2_5" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control"  name="click_nums_3_5" id="click_nums_3_5" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td>
			    	<select class="form-control" name="country_5" id="country_5">
			    		<option>ALL</option>
					  	<option>FR</option>
					    <option>PL</option>
					    <option>ES</option>
					    <option>MX</option>
					    <option>AR</option>
					    <option>DE</option>
					    <option>IT</option>
					    <option>TR</option>
					    <option>BR</option>
					    <option>IN</option>
					</select>
				</td>
			  </tr>
			  <tr>
			    <td>
			    	<div class="input-group date form_date" id="clock_to" data-date="<?php echo date('Y-m-d',time()-5*86400);?>" data-date-format="yyyy-mm-dd">
						<input id="datepicker_6"  class="form-control" name="date_nums_6" size="16" type="text" value="<?php echo date('Y-m-d',time()-5*86400);?>" readonly> 
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-remove"></span>
						</span>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-th"></span>
						</span>
					</div>
				</td>
			    <td><input type="text" class="form-control"  name="active_daily_6" id="active_daily_6" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control"  name="click_nums_1_6" id="click_nums_1_6" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control"  name="click_nums_2_6" id="click_nums_2_6" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control"  name="click_nums_3_6" id="click_nums_3_6" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td>
			    	<select class="form-control" name="country_6" id="country_6">
			    		<option>ALL</option>
					 	<option>FR</option>
					    <option>PL</option>
					    <option>ES</option>
					    <option>MX</option>
					    <option>AR</option>
					    <option>DE</option>
					    <option>IT</option>
					    <option>TR</option>
					    <option>BR</option>
					    <option>IN</option>
					</select>
				</td>
			  </tr>
			  <tr>
			    <td>
			    	<div class="input-group date form_date" id="clock_to" data-date="<?php echo date('Y-m-d',time()-6*86400);?>" data-date-format="yyyy-mm-dd">
						<input id="datepicker_7"  class="form-control" name="date_nums_7" size="16" type="text" value="<?php echo date('Y-m-d',time()-6*86400);?>" readonly> 
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-remove"></span>
						</span>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-th"></span>
						</span>
					</div>
				</td>
			    <td><input type="text" class="form-control"  name="active_daily_7" id="active_daily_7" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control"  name="click_nums_1_7" id="click_nums_1_7" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control"  name="click_nums_2_7" id="click_nums_2_7" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td><input type="text" class="form-control"  name="click_nums_3_7" id="click_nums_3_7" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
			    <td>
			    	<select class="form-control" name="country_7" id="country_7">
			    		<option>ALL</option>
					  	<option>FR</option>
					    <option>PL</option>
					    <option>ES</option>
					    <option>MX</option>
					    <option>AR</option>
					    <option>DE</option>
					    <option>IT</option>
					    <option>TR</option>
					    <option>BR</option>
					    <option>IN</option>
					</select>
				</td>
			  </tr>
		  </tbody>
		</table>
		<input type="submit" class="btn btn-primary btn-lg" value="保存"/>
		<input type="reset" class="btn btn-default btn-lg" value="重置"/>
		
	</form>
</div>
</center>
