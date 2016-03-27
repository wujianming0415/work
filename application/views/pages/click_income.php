
<center>
	<div class="bg-primary row" style="max-width: 1200px">
		<div class="form-inline">
			<div class="text-left"><h2>网盟市场分析数据显示</h2></div>
			<div class="text-right ">
        <a href="click_income_alter_view">
					<button class="btn btn-info" style="margin: 0 10px 10px;">详细数据</button>
				</a>
        <a href="click_income_update">
          <button class="btn btn-info" style="margin: 0 10px 10px;">更新数据</button>
        </a>
      </div>
		</div>
	</div>

	<div class="row" style="text-align: center; margin-top: 20px; max-width: 1200px; margin-bottom: 20px ! important;">
		<form action="click_income_view" method="post" accept-charset="utf-8">
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
				<input type="submit" class="btn btn-info" value="查询"/>
			</div>
		</form>
		<div style="text-align: center; margin-top: 20px; max-width: 1200px; margin-bottom: 20px ! important;">
			<span> *** 一次查询最多展示两个月数据，若起止时间设置有误，则查询最近一个月记录 ***</span>
		</div>
	
		<table class="table table-hover table-bordered"  style="text-align: center; margin-top: 20px; max-width: 1200px; margin-bottom: 20px ! important;">
			<thead>
				<tr class="info">
			      <th colspan="2" style="text-align: center;">ID</th>
			      <th >BR</th>
			      <th >TR</th>
			      <th >PL</th>
			      <th >FR</th>
			      <th >AR</th>
			      <th >ES</th>
			      <th >DE</th>
			      <th >IT</th>
			      <th >MX</th>
			      <th >IN</th>
			      <th >other</th>
			      <th >ALL</th>
				</tr>
			</thead>
			<?php foreach ($result as  $data_item): ?>
			<tr>
				<th rowspan="3" width="140"><?php echo $data_item['week_time'] ?></th>
				<td>点击</td>
				<td><?php echo $data_item['br_click'] ?></td>
				<td><?php echo $data_item['tr_click'] ?></td>
				<td><?php echo $data_item['pl_click'] ?></td>
				<td><?php echo $data_item['fr_click'] ?></td>
				<td><?php echo $data_item['ar_click'] ?></td>
				<td><?php echo $data_item['es_click'] ?></td>
				<td><?php echo $data_item['de_click'] ?></td>
				<td><?php echo $data_item['it_click'] ?></td>
				<td><?php echo $data_item['mx_click'] ?></td>
				<td><?php echo $data_item['in_click'] ?></td>
				<td><?php echo $data_item['other_click'] ?></td>
				<td><?php echo $data_item['all_click'] ?></td>
			</tr>
			<tr>
				<td>收入</td>
				<td><?php echo $data_item['br_income'] ?></td>
				<td><?php echo $data_item['tr_income'] ?></td>
				<td><?php echo $data_item['pl_income'] ?></td>
				<td><?php echo $data_item['fr_income'] ?></td>
				<td><?php echo $data_item['ar_income'] ?></td>
				<td><?php echo $data_item['es_income'] ?></td>
				<td><?php echo $data_item['de_income'] ?></td>
				<td><?php echo $data_item['it_income'] ?></td>
				<td><?php echo $data_item['mx_income'] ?></td>
				<td><?php echo $data_item['in_income'] ?></td>
				<td><?php echo $data_item['other_income'] ?></td>
				<td><?php echo $data_item['all_income'] ?></td>
			</tr>
			<tr>
				<td>CPC</td>
				<td><?php if($data_item['br_click'] != 0){echo sprintf("%.4f",  $data_item['br_income']/$data_item['br_click']);} ?></td>
				<td><?php if($data_item['tr_click'] != 0){echo sprintf("%.4f",  $data_item['tr_income']/$data_item['tr_click']);} ?></td>
				<td><?php if($data_item['pl_click'] != 0){echo sprintf("%.4f",  $data_item['pl_income']/$data_item['pl_click']);} ?></td>
				<td><?php if($data_item['fr_click'] != 0){echo sprintf("%.4f",  $data_item['fr_income']/$data_item['fr_click']);} ?></td>
				<td><?php if($data_item['ar_click'] != 0){echo sprintf("%.4f",  $data_item['ar_income']/$data_item['ar_click']);} ?></td>
				<td><?php if($data_item['es_click'] != 0){echo sprintf("%.4f",  $data_item['es_income']/$data_item['es_click']);} ?></td>
				<td><?php if($data_item['de_click'] != 0){echo sprintf("%.4f",  $data_item['de_income']/$data_item['de_click']);} ?></td>
				<td><?php if($data_item['it_click'] != 0){echo sprintf("%.4f",  $data_item['it_income']/$data_item['it_click']);} ?></td>
				<td><?php if($data_item['mx_click'] != 0){echo sprintf("%.4f",  $data_item['mx_income']/$data_item['mx_click']);} ?></td>
				<td><?php if($data_item['in_click'] != 0){echo sprintf("%.4f",  $data_item['in_income']/$data_item['in_click']);} ?></td>
				<td><?php if($data_item['other_click'] != 0){echo sprintf("%.4f",  $data_item['other_income']/$data_item['other_click']);} ?></td>
				<td><?php if($data_item['all_click'] != 0){echo sprintf("%.4f",  $data_item['all_income']/$data_item['all_click']);} ?></td>
			</tr>
			<?php endforeach ?>
			<tr>
				<th rowspan="3" width="140">Total</th>
				<td>点击</td>
				<td><?php echo $total['br_click'] ?></td>
				<td><?php echo $total['tr_click'] ?></td>
				<td><?php echo $total['pl_click'] ?></td>
				<td><?php echo $total['fr_click'] ?></td>
				<td><?php echo $total['ar_click'] ?></td>
				<td><?php echo $total['es_click'] ?></td>
				<td><?php echo $total['de_click'] ?></td>
				<td><?php echo $total['it_click'] ?></td>
				<td><?php echo $total['mx_click'] ?></td>
				<td><?php echo $total['in_click'] ?></td>
				<td><?php echo $total['other_click'] ?></td>
				<td><?php echo $total['all_click'] ?></td>
			</tr>
			<tr>
				<td>收入</td>
				<td><?php echo $total['br_income'] ?></td>
				<td><?php echo $total['tr_income'] ?></td>
				<td><?php echo $total['pl_income'] ?></td>
				<td><?php echo $total['fr_income'] ?></td>
				<td><?php echo $total['ar_income'] ?></td>
				<td><?php echo $total['es_income'] ?></td>
				<td><?php echo $total['de_income'] ?></td>
				<td><?php echo $total['it_income'] ?></td>
				<td><?php echo $total['mx_income'] ?></td>
				<td><?php echo $total['in_income'] ?></td>
				<td><?php echo $total['other_income'] ?></td>
				<td><?php echo $total['all_income'] ?></td>
			</tr>
			<tr>
				<td>CPC</td>
				<td><?php if($total['br_click'] != 0){echo sprintf("%.4f",  $total['br_income']/$total['br_click']);} ?></td>
				<td><?php if($total['tr_click'] != 0){echo sprintf("%.4f",  $total['tr_income']/$total['tr_click']);} ?></td>
				<td><?php if($total['pl_click'] != 0){echo sprintf("%.4f",  $total['pl_income']/$total['pl_click']);} ?></td>
				<td><?php if($total['fr_click'] != 0){echo sprintf("%.4f",  $total['fr_income']/$total['fr_click']);} ?></td>
				<td><?php if($total['ar_click'] != 0){echo sprintf("%.4f",  $total['ar_income']/$total['ar_click']);} ?></td>
				<td><?php if($total['es_click'] != 0){echo sprintf("%.4f",  $total['es_income']/$total['es_click']);} ?></td>
				<td><?php if($total['de_click'] != 0){echo sprintf("%.4f",  $total['de_income']/$total['de_click']);} ?></td>
				<td><?php if($total['it_click'] != 0){echo sprintf("%.4f",  $total['it_income']/$total['it_click']);} ?></td>
				<td><?php if($total['mx_click'] != 0){echo sprintf("%.4f",  $total['mx_income']/$total['mx_click']);} ?></td>
				<td><?php if($total['in_click'] != 0){echo sprintf("%.4f",  $total['in_income']/$total['in_click']);} ?></td>
				<td><?php if($total['other_click'] != 0){echo sprintf("%.4f",  $total['other_income']/$total['other_click']);} ?></td>
				<td><?php if($total['all_click'] != 0){echo sprintf("%.4f",  $total['all_income']/$total['all_click']);} ?></td>
			</tr>
			</table>
</div>
		
</center>
