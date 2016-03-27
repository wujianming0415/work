
<center>
	<div class="row" style="text-align: center; margin: 20px 0px; width: 1840px; ">
		<div class="text-primary"><h2>直客收入整体分析数据表</h2></div>

		<form action="all_view" method="post" accept-charset="utf-8">
			<div class="form-inline">
				<div class="input-group date form_date  col-md-3 "  data-date="<?php echo $date_time[0];?>" data-date-format="yyyy-mm-dd">
					<input id="datepicker_1"  class="form-control" name="date_time_1" size="16" type="text" value="<?php echo $date_time[0];?>"  readonly> 
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-remove"></span>
					</span>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-th"></span>
					</span>
				</div>	
				&nbsp;&nbsp;&nbsp;&nbsp;
				<div class="input-group date form_date col-md-3 " data-date="<?php echo $date_time[1];?>" data-date-format="yyyy-mm-dd">
					<input id="datepicker_2"  class="form-control" name="date_time_2" size="16" type="text" value="<?php echo $date_time[1];?>" readonly> 
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-remove"></span>
					</span>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-th"></span>
					</span>
				</div>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<select class="form-control" name="country" >
					<?php if($country):?>
					<option><?php {echo $country;} ?></option>	
					<?php  endif;?>		
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
				    <option>other</option>
				</select>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" class="btn btn-info" value="查询"/>
			</div>
		</form>
		<div style="text-align: center; margin-top: 20px; width: 1800px; ">
			<span> *** 一次查询最多展示15条数据，若起止时间设置有误，则查询最近两个月记录 ***</span>
		</div>
		<table class="table table-hover table-bordered"  style="text-align: center; margin: 20px 20px; width: 1800px; ">
		  <thead>
		    <tr>
		      <th rowspan="2">日期</th>
		      <th rowspan="2">周UV</th>
		      <th rowspan="2">RPM</th>
		      <th colspan="2">电商</th>
		      <th colspan="2">游戏总体</th>
		      <th colspan="2">公司联运游戏</th>
		      <th colspan="2">337联运游戏</th>
		      <th rowspan="2">整体点击</th>
		      <th rowspan="2">ctr</th>
		      <th rowspan="2">点击对比上周</th>
		      <th rowspan="2">收入对比上周</th>
		      <th rowspan="2">整体收入</th>
		      <th rowspan="2">电商收入</th>
		      <th rowspan="2">公司联运</th>
		      <th rowspan="2">337联运</th>
		      <th rowspan="2">整体cpc</th>
		      <th rowspan="2">电商cpc</th>
		      <th rowspan="2">公司cpc</th>
		      <th rowspan="2">337cpc</th>
		      
		    </tr>
		    <tr>
		      <td>点击</td>
		      <td>ctr</td>
		      <td>点击</td>
		      <td>ctr</td>
		      <td>点击</td>
		      <td>ctr</td>
		      <td>点击</td>
		      <td>ctr</td>
		    </tr>
		  </thead>
		  <?php foreach ($result as  $data_item): ?>
		  <tr class="info">
		  	<td><?php echo $data_item['day_time'] ?></td>
		  	<td><?php echo $data_item['uv_week'] ?></td>
		  	<td><?php echo sprintf("%.2f", (double)$data_item['income_all']/(double)$data_item['uv_week']*1000) ?></td>
		  	<td><?php echo $data_item['click_nums_1'] ?></td>
		  	<td><?php echo sprintf("%.2f", (double)$data_item['click_nums_1']/(double)$data_item['uv_week']*100)."%" ?></td>
		  	<td><?php echo $data_item['click_nums_2']+$data_item['click_nums_3'] ?></td>
		  	<td><?php echo sprintf("%.2f", (double)($data_item['click_nums_2']+$data_item['click_nums_3'])/(double)$data_item['uv_week']*100)."%" ?></td>
		  	<td><?php echo $data_item['click_nums_2'] ?></td>
		  	<td><?php echo sprintf("%.2f", (double)$data_item['click_nums_2']/(double)$data_item['uv_week']*100)."%" ?></td>
		  	<td><?php echo $data_item['click_nums_3'] ?></td>
		  	<td><?php echo sprintf("%.2f", (double)$data_item['click_nums_3']/(double)$data_item['uv_week']*100)."%" ?></td>
		  	<td><?php echo $data_item['click_nums_1']+$data_item['click_nums_2']+$data_item['click_nums_3'] ?></td>
		  	<td><?php echo sprintf("%.2f", (double)$data_item['click_nums_all']/(double)$data_item['uv_week']*100)."%" ?></td>
		  	<td><?php echo ($data_item['click_compare_last']*100).'%' ?></td>
		  	<td><?php echo ($data_item['income_compare_last']*100).'%' ?></td>
		  	<td><?php echo "$".$data_item['income_all'] ?></td>
		  	<td><?php echo "$".$data_item['income_1'] ?></td>
		  	<td><?php echo "$".$data_item['income_2'] ?></td>
		  	<td><?php echo "$".$data_item['income_3'] ?></td>
		  	<td><?php echo sprintf("%.3f",$data_item['income_all']/$data_item['click_nums_all']) ?></td>
		  	<td><?php echo sprintf("%.3f",$data_item['income_1']/$data_item['click_nums_1']) ?></td>
		  	<td><?php echo sprintf("%.3f",$data_item['income_2']/$data_item['click_nums_2']) ?></td>
		  	<td><?php echo sprintf("%.3f",$data_item['income_3']/$data_item['click_nums_3']) ?></td>
		  <tr>
		  <?php endforeach ?>
		</table>
	</div>
		
</center>