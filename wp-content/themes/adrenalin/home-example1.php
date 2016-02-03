<div class="entry-content">
                            
					
        
         <div class="row topmargin"><div class="col-lg-6 col-md-6">
        
                    <?php $rows = get_field('new_sample',70610);?>
					<div class="exampimage">
					<ul class="bxslider1">
					<?php if($rows){
					foreach($rows as $row) {
					?>   
					<li class="ba-slider" style="width:100px;">
					<img  id=""  src="<?php echo  $row['after']; ?>"  />       
					<div class="resize">
					<img id="" src="<?php echo  $row['before']; ?>"  />
					</div>
					<span class="handle"></span>
					</li>
					<?php }}?>
					</ul></div>    
					<div id="bx-pager1" class="col-lg-4 col-md-3">
					<ul class="bx_pager_ul">
					<?php if($rows){$k=0; foreach($rows as $row) {if($k==4){break;}?>
					<li><a data-slide-index="<?php echo $k++;?>" href="javascript:void(0);"><img  width="100" height="80"id=""  src="<?php echo  $row['after']; ?>"  /> <div class="resize">
					<img id="" src="<?php echo  $row['before']; ?>"  />
					</div></a></li>
					<?php } }?>
					
					</ul>
					</div>
					
				</div></div> 
        
    </div><!-- .entry-content -->
	