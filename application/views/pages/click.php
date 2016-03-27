
<center>
	<div class="text-primary"><h2>模块点击统计数据显示</h2></div>
	<div class="text-danger" style="margin-top: 20px; max-width: 1000px">
		<?php echo $news; ?>
	</div>
	<div class="row" style="text-align: center; margin-top: 20px; max-width: 1000px; margin-bottom: 20px ! important;">
	
		<form action="click_view" method="post" accept-charset="utf-8">
			<div class="form-inline">
				<div class="input-group date form_date  col-md-3 "  data-date="<?php echo $date_time[0];?>" data-date-format="yyyy-mm-dd">
				  	<input id="datepicker_1"  class="form-control" name="date_time_1" size="16" type="text" value="<?php echo $date_time[0];?>" readonly> 
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
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="click_update"><input type="button" class="btn btn-info" value="更新数据"/></a>
			</div>
		</form>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				 	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				    <h4 class="modal-title" id="myModalLabel">修改统计数据</h4>
				</div>
				<form action="click_alter" method="post" accept-charset="utf-8">
		    	<div class="modal-body">
			    	<table class="table">
			    		<tr class=" span info">
					    	<td class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;国家：</td>
							<td class="col-md-4">
						    	<input type="text" id="country" name="country" class="form-control"  value="<?php echo $country ?>" readonly>
							</td>
						</tr>
					    <tr class= "info">
					    	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日期：</td>
					    	<td class="col-md-4">
						    	<input type="text" id="date_time" name="date_time" class="form-control"  readonly>
							</td>
						</tr>
						
					    <tr class="warning">
					    	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日活跃：</td>
					    	<td><input type="text" id="active_daily" name="active_daily" class="form-control"  placeholder="请输入"/></td>
					    </tr>
					    <tr class="warning">
					    	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电商：</td>
					    	<td><input type="text" id="click_nums_1" name="click_nums_1" class="form-control" onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
						    </tr>
					    <tr class="warning">
					    	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;公司联运游戏：</td>
					    	<td><input type="text" id="click_nums_2" name="click_nums_2" class="form-control"  onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
					    </tr>
					    <tr class="warning">
					    	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;337联运游戏：</td>
					    	<td><input type="text" id="click_nums_3" name="click_nums_3" class="form-control"  onblur="checkInteger(this.id, this.value)" placeholder="请输入"></td>
					    </tr>
					 </table>
		      	</div>
			  	<div class="modal-footer">
			 		<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<input type="submit" class="btn btn-primary" value="保存">
			  	</div>
			  </form>
			</div>
		</div>
	</div>
	
	<span> *** 一次查询最多展示31条数据，若起止时间设置有误，则查询最近15天记录 ***</span>
	<table class="table table-hover table-bordered"  style="text-align: center; margin-top: 20px; max-width: 1200px; margin-bottom: 20px ! important;">
	  <thead>
	    <tr>
	      <th rowspan="2">日期</th>
	      <th rowspan="2">日活跃</th>
	      <th colspan="2">电商</th>
	      <th colspan="2">公司联运游戏</th>
	      <th colspan="2">337联运游戏</th>
	      <th colspan="2">汇总</th>
	      <?php if($country !== 'other'):?>
		  <th rowspan="2">编辑</th>
		  <?php  endif;?>	
	      
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
	  <?php foreach ($view as  $data_item): ?>
	  <?php if($data_item['remark'] == '1'): ?>
	  <tr class="info">	  	
	    <td><?php {echo $data_item['date_time'];} else: ?></td>
	  <tr>
	    <td><?php {echo date('Y-m-d',$data_item['date_time']);} endif;?></td>	    
	    <td><?php echo $data_item['active_daily'] ?></td>
	    <td><?php echo $data_item['click_nums_1'] ?></td>
	    <td><?php echo sprintf("%.2f", (double)$data_item['click_nums_1']/(double)$data_item['active_daily']*100)."%" ?></td>
	    <td><?php echo $data_item['click_nums_2'] ?></td>
	    <td><?php echo sprintf("%.2f", (double)$data_item['click_nums_2']/(double)$data_item['active_daily']*100)."%" ?></td>
	    <td><?php echo $data_item['click_nums_3'] ?></td>
	    <td><?php echo sprintf("%.2f", (double)$data_item['click_nums_3']/(double)$data_item['active_daily']*100)."%" ?></td>
	    <td><?php echo $data_item['click_nums_all'] ?></td>
	    <td><?php echo sprintf("%.2f", (double)$data_item['click_nums_all']/(double)$data_item['active_daily']*100)."%" ?></td>
	  	<?php if($country !== 'other' && $data_item['remark'] == '1'):?>
	  	<td></td>
		  <?php  endif;?>	
	  	<?php if($country !== 'other' && $data_item['remark'] !== '1'):?>
	  	<td>
		  <button class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="getkey(<?php echo date('Ymd',$data_item['date_time']);?>,<?php echo $data_item['active_daily']; ?>,<?php echo $data_item['click_nums_1']; ?>,<?php echo $data_item['click_nums_2']; ?>,<?php echo $data_item['click_nums_3']; ?>)">修改</button>
		  </td>
		  <?php  endif;?>	
	  </tr>
	  <?php endforeach ?>
	</table>
</center>
<script type="text/javascript">
	function getkey(date_time,active_daily,nums_1,nums_2,nums_3){
		
		var str = ""+date_time;
		var time_date=str.slice(0,4)+"-"+str.slice(4,6)+"-"+str.slice(6,8);
		
		document.getElementById('date_time').value = time_date;
		document.getElementById('active_daily').value = active_daily;
		document.getElementById('click_nums_1').value = nums_1;
		document.getElementById('click_nums_2').value = nums_2;
		document.getElementById('click_nums_3').value = nums_3;
	}

</script>