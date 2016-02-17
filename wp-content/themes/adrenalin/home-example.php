<div class="entry-content">
	<div class="topmargin">
		<div class="">

			<?php $rows = get_field('sample',67473);?>
			<div class="col-lg-5 col-sm-5 exampimage">
				<ul class="bxslider"><?php 
				if($rows){
					foreach($rows as $row) {
						?><li class="ba-slider" style="width:100px;">
							<div class="home_exmple_after"><?php print get_str_before_after_example("A");?></div>
							<img  id=""  src="<?php echo  $row['after']; ?>"  />
							<div class="resize">
								<div class="home_exmple_before"><?php print get_str_before_after_example("B");?></div>
								<img id="" src="<?php echo  $row['before']; ?>"  />
							</div>
							<span class="handle"></span>
						</li><?php 
					}
				}
				?></ul>
				</div> <!-- col-5 -->
			<div id="bx-pager" class="col-lg-7 col-sm-7 mbx-pager">
				<ul class="bx_pager_ul">
				<?php if($rows){$k=0; foreach($rows as $row) {if($k==8){break;}?>
				<li><a data-slide-index="<?php echo $k++;?>" href="javascript:void(0);"><img  width="195" height="130" id=""  src="<?php echo  $row['after']; ?>"  /> <div class="resize">
				<img id="" src="<?php echo  $row['before']; ?>"  />
				</div></a></li>
				<?php } }?>

				</ul>
			</div> <!-- col-7 -->
		</div>
	</div> 
</div><!-- .entry-content -->
