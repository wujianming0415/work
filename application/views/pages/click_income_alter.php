
<center>
	<div class="bg-primary row" style="margin:0 0;min-width: 1840px;">
		<div class="form-inline">
			<div class="text-left"><h2 style="margin: 20px 50px 10px;">直客点击和收入完整数据</h2></div>
			<div class="text-right ">
				<a href="click_income">
					<button class="btn btn-info" style="margin: 0 10px 10px;">数据汇总</button>
				</a>
				<a href="click_income_update">
					<button class="btn btn-info" style="margin: 0 10px 10px;">更新数据</button>
				</a>
			</div>
		</div>
	</div>
	<div class="text-danger" style="margin-top: 20px; max-width: 1000px">
		<?php echo $news; ?>
	</div>
	<div class="row" style="text-align: center; margin: 20px; min-width: 1800px">
	<form action="click_income_alter_view" method="post" accept-charset="utf-8">
		<div class="form-inline">
			<div class="input-group date form_date  col-md-3 "  data-date="<?php echo $week_time;?>" data-date-format="yyyy-mm-dd">
				<input id="datepicker_1"  class="form-control" name="week_data" size="16" type="text" value="<?php echo $week_time;?>"  readonly> 
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-th"></span>
				</span>
			</div>
			<div class="input-group text-primary">
				<h3>请选择需要修改的周</h3>
			</div>
			<input type="submit" class="btn btn-info" value="查询"/>
		</div>
	</form>
	
		<table class="table table-hover table-bordered"  style="text-align: center; margin-top: 20px; min-width: 1800px;">
			<thead>
				<tr class="info">
				  <th style="width:100px;">identify</th>
			      <th style="width:50px;">ID</th>
			      <th style="width:50px;">市场</th>
			      <th style="width:200px;">网盟</th>
			      <th style="width:200px;">offer name</th>
			      <th style="width:120px;">类型</th>
			      <th style="width:120px;">短连接</th>
			      <th style="width:120px;">camp_id</th>  
			      <th style="width:120px;">周收入</th>

            <th style="width:120px;">周点击</th>
			      <th style="width:120px;"><input type="text" id="day_0" name="day_0" class="form-control"  value="<?php echo date('m月d日',strtotime($week_time)-date('w', strtotime($week_time))*86400);?>" readonly></th>
			      <th style="width:110px;"><input type="text" id="day_1" name="day_1" class="form-control"  value="<?php echo date('m月d日',strtotime($week_time)-date('w', strtotime($week_time))*86400+86400);?>" readonly></th>
			      <th style="width:120px;"><input type="text" id="day_2" name="day_2" class="form-control"  value="<?php echo date('m月d日',strtotime($week_time)-date('w', strtotime($week_time))*86400+2*86400);?>" readonly></th>
			      <th style="width:120px;"><input type="text" id="day_3" name="day_3" class="form-control"  value="<?php echo date('m月d日',strtotime($week_time)-date('w', strtotime($week_time))*86400+3*86400);?>" readonly></th>
			      <th style="width:120px;"><input type="text" id="day_4" name="day_4" class="form-control"  value="<?php echo date('m月d日',strtotime($week_time)-date('w', strtotime($week_time))*86400+4*86400);?>" readonly></th>
			      <th style="width:120px;"><input type="text" id="day_5" name="day_5" class="form-control"  value="<?php echo date('m月d日',strtotime($week_time)-date('w', strtotime($week_time))*86400+5*86400);?>" readonly></th>
			      <th style="width:120px;"><input type="text" id="day_6" name="day_6" class="form-control"  value="<?php echo date('m月d日',strtotime($week_time)-date('w', strtotime($week_time))*86400+6*86400);?>" readonly></th>
				  <th style="width:50px;">编辑</th>
				</tr>
			</thead>
			<?php foreach ($view as  $data_item): ?>
			<tr >
				<td><?php echo $data_item['id']; ?></td>
			  	<td><?php echo $data_item['identify']; ?></td>
				<td><?php echo $data_item['market']; ?></td>
			  	<td><?php echo $data_item['web_union']; ?></td>
			  	<td><?php echo $data_item['offer_name']; ?></td>
			  	<td><?php echo $data_item['type']; ?></td>
			  	<td><?php echo $data_item['link']; ?></td>
			  	<td><?php echo $data_item['camp_id']; ?></td>
			  	<td><?php echo $data_item['income']; ?></td>
			  	
          <td><?php echo $data_item['click_nums']; ?></td>
			  	<td><?php echo $data_item['day_1']; ?></td>
			  	<td><?php echo $data_item['day_2']; ?></td>
			  	<td><?php echo $data_item['day_3']; ?></td>
			  	<td><?php echo $data_item['day_4']; ?></td>
			  	<td><?php echo $data_item['day_5']; ?></td>
			  	<td><?php echo $data_item['day_6']; ?></td>
			  	<td><?php echo $data_item['day_7']; ?></td>
			  	<td>
			  		<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"  onclick="getkey(<?php echo $data_item['id'];?>,'<?php echo $data_item['identify'];?>','<?php echo $data_item['market']; ?>','<?php echo $data_item['web_union']; ?>','<?php echo  $data_item['offer_name'];?>','<?php echo  $data_item['type'];?>','<?php echo  $data_item['link'];?>','<?php echo  $data_item['camp_id'];?>','<?php echo  $data_item['income'];?>','<?php echo  $data_item['day_1'];?>','<?php echo  $data_item['day_2'];?>','<?php echo  $data_item['day_3'];?>','<?php echo  $data_item['day_4'];?>','<?php echo  $data_item['day_5'];?>','<?php echo  $data_item['day_6'];?>','<?php echo  $data_item['day_7'];?>')">修改</button>
			  	</td>
			</tr>
			<?php endforeach ?>
		</table>
		
		<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				 	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				    <h4 class="modal-title" id="myModalLabel">修改直客点击和收入数据</h4>
				</div>
				<form action="click_income_alter" method="post" accept-charset="utf-8">
		    	<div class="modal-body">
			    	<table class="table">
			    		<tr class=" span info">
					    	<td width="80px">identify：</td>
							<td width="200px">
						    	<input type="text" id="id" name="id" class="form-control"  value="" readonly>
							</td>
							<td >ID：</td>
							<td >
						    	<input type="text" id="identify" name="identify" class="form-control"  value="" >
							</td>
						</tr>
						<tr class= "info">
					    	<td >市场：</td>
							<td >
						    	<input type="text" id="market" name="market" class="form-control"  value="" >
							</td>
							<td >网盟：</td>
							<td >
						    	<input type="text" id="web_union" name="web_union" class="form-control"  value="" >
							</td>
						</tr>
						<tr class= "info">
					    	<td >offer name：</td>
							<td >
						    	<input type="text" id="offer_name" name="offer_name" class="form-control"  value="" >
							</td>
							<td >类型：</td>
							<td >
						    	<input type="text" id="type" name="type" class="form-control"  value="" >
							</td>
						</tr>
						<tr class= "info">
					    	<td >短连接：</td>
							<td >
						    	<input type="text" id="link" name="link" class="form-control"  value="" >
							</td>
							<td >camp_id：</td>
							<td >
						    	<input type="text" id="camp_id" name="camp_id" class="form-control"  value="" >
							</td>
						</tr>
						
					    <tr class="warning">
					    	<td>周收入：</td>
					    	<td><input type="text" id="income" name="income" class="form-control" placeholder="请输入"/></td>
					    	<td><?php echo date('m月d日',strtotime($week_time)-date('w', strtotime($week_time))*86400);?></td>
					    	<td><input type="text" id="date_1" name="day_1" class="form-control" placeholder="请输入"></td>
					    </tr>
					    <tr class="warning">
					    	<td><?php echo date('m月d日',strtotime($week_time)-date('w', strtotime($week_time))*86400+86400);?></td>
					    	<td><input type="text" id="date_2" name="day_2" class="form-control"  placeholder="请输入"></td>
					    	<td><?php echo date('m月d日',strtotime($week_time)-date('w', strtotime($week_time))*86400+2*86400);?></td>
					    	<td><input type="text" id="date_3" name="day_3" class="form-control"  placeholder="请输入"></td>
					    </tr>
					    <tr class="warning">
					    	<td><?php echo date('m月d日',strtotime($week_time)-date('w', strtotime($week_time))*86400+3*86400);?></td>
					    	<td><input type="text" id="date_4" name="day_4" class="form-control"  placeholder="请输入"></td>
					    	<td><?php echo date('m月d日',strtotime($week_time)-date('w', strtotime($week_time))*86400+4*86400);?></td>
					    	<td><input type="text" id="date_5" name="day_5" class="form-control" placeholder="请输入"></td>
					    </tr>
					    <tr class="warning">
					    	<td><?php echo date('m月d日',strtotime($week_time)-date('w', strtotime($week_time))*86400+5*86400);?></td>
					    	<td><input type="text" id="date_6" name="day_6" class="form-control"  placeholder="请输入"></td>
					    	<td><?php echo date('m月d日',strtotime($week_time)-date('w', strtotime($week_time))*86400+6*86400);?></td>
					    	<td><input type="text" id="date_7" name="day_7" class="form-control" placeholder="请输入"></td>
					    </tr>
					 </table>
			    </div>
          <input type="hidden" name="week_time" class="form-control"  value="<?php echo $week_time;?>">
			  	<div class="modal-footer">
			 		<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<input type="submit" class="btn btn-primary" value="保存">
			  	</div>
			  </form>
			</div>
		</div>
	</div>
</div>
		
</center>
<script type="text/javascript">
	function getkey(id,identify,market,web_union,offer_name,type,link,camp_id,income,day_1,day_2,day_3,day_4,day_5,day_6,day_7){

		document.getElementById('id').value = id;
		document.getElementById('identify').value = identify;
		document.getElementById('market').value = market;
		document.getElementById('web_union').value = web_union;
		document.getElementById('offer_name').value = offer_name;
		document.getElementById('type').value = type;
		document.getElementById('link').value = link;
		document.getElementById('camp_id').value = camp_id;
		document.getElementById('income').value = income;
		document.getElementById('date_1').value = day_1;
		document.getElementById('date_2').value = day_2;
		document.getElementById('date_3').value = day_3;
		document.getElementById('date_4').value = day_4;
		document.getElementById('date_5').value = day_5;
		document.getElementById('date_6').value = day_6;
		document.getElementById('date_7').value = day_7;
		
	}

</script>
