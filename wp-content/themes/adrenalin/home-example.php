<div class="entry-content">
                            
					
        
         <div class="row topmargin"><div class="">
        
                    <?php $rows = get_field('sample',67473);?>
					<div class="col-lg-7 col-md-7 exampimage">
					<ul class="bxslider">
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
					<div id="bx-pager" class="mbx-pager">
					<ul class="bx_pager_ul">
					<?php if($rows){$k=0; foreach($rows as $row) {if($k==8){break;}?>
					<li><a data-slide-index="<?php echo $k++;?>" href="javascript:void(0);"><img  width="150" height="120"id=""  src="<?php echo  $row['after']; ?>"  /> <div class="resize">
					<img id="" src="<?php echo  $row['before']; ?>"  />
					</div></a></li>
					<?php } }?>
					
					</ul>
					</div>
					
				</div></div> 
        
    </div><!-- .entry-content -->
	