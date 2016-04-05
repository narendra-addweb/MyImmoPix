<?php   $user_ID = get_current_user_id();?>

<article id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>
    <div class="entry-content"><?php 
  
			if(isset($_GET['pid']) && !empty($_GET['pid'])){
				$pid = $_GET['pid'];
			}

			//Query for before images...
			$arrBeforeImg = array();
			$showposts = -1;
    	$projectStatus = 2;
			//-----------------------------
			$argsBefore = array(
				'post_status' => 'any',
				'post_type'   => 'attachment',
				'posts_per_page'=> $showposts,
				'author'=> $user_ID,
				'meta_query' => array(
					array(
					'key'     => 'group_id',
					'value'   => $pid,
					'compare' => '=',
					'type'    => 'numeric',
					),
					array(
						'key'     => 'image_status',
						'value'   => $projectStatus,
						'compare' => '=',
						'type'    => 'numeric',
					),
				),
			);
			$countBefore = count(query_posts( $argsBefore ));
			
			while(have_posts()) : the_post();
				$feat_image =  wp_get_attachment_url( get_the_ID() );
				$img =  vt_resize('',$feat_image,350, 200,false);//Proportionally resize

				$filePath = explode("/", $img["url"]);
				$fileName = end($filePath);
				
				$arrBeforeImg[$fileName] = $img;
			endwhile;  wp_reset_query(); // end of the loop.


			//Query for after images...
    	$showposts = -1;
    	$projectStatus = 3;
			//-----------------------------
			$args2 = array(
				'post_status' => 'any',
				'post_type'   => 'attachment',
				'posts_per_page'=>-1,
				'author'=> $user_ID,
				'meta_query' => array(
					array(
					'key'     => 'group_id',
					'value'   => $pid,
					'compare' => '=',
					'type'    => 'numeric',
					),
					array(
						'key'     => 'image_status',
						'value'   => $projectStatus,
						'compare' => '=',
						'type'    => 'numeric',
					),
				),
			);
			$count2 = count(query_posts( $args2 ));
			?><div class="row topmargin">  <div class="col-lg-12 col-md-12">
          <div class="col-lg-3 col-md-3"><strong><?php echo get_str_Project()?>  ID   <?php echo '#'.$pid;?></strong></div>
          <div class="col-lg-3 col-md-3"><strong><?php echo $count2;?> Photos </strong></div>
          <div class="col-lg-3 col-md-3"><strong><?php echo get_str_closetxt()?></strong></div>
          <div class="col-lg-3 col-md-3"></div>
      </div></div><?php

			$feat_image = '';
			$newimageid='';
      while(have_posts()) : the_post();
        $feat_image =  wp_get_attachment_url( get_the_ID() );
				$img =  vt_resize('',$feat_image,350, 200,false);//Proportionally resize
			 	
				$newimageid = get_the_ID();
				if(!empty($newimageid)){
					$new_feat_image =  wp_get_attachment_url( $newimageid );
					$full_image = wp_get_attachment_image_src( $newimageid, 'small');
				}
				$filePath = explode('/', $img['url']);
				$fileName = end($filePath);
				
				$beforeImg = $arrBeforeImg[$fileName];
				?><div class="row topmargin">
					<div class="col-lg-12 col-md-12">
      			<div class="">
             	<div class="col-lg-6 col-md-6 divimage" id="div<?php echo get_the_id();?>">
             		<img src="<?php echo $beforeImg['url'] ?>"  />
             		<span class="imgid" ><strong><?php echo '#'.get_the_id();?></strong></span><span>&nbsp;&nbsp;<strong><?php print(get_str_originaltxt());?></strong></span>
             	</div>
              <div class="col-lg-6 col-md-6 divimage mainlink" id="">
             		<a href="<?php echo get_bloginfo("url") ?>/downloadimg.php?img=<?php echo str_replace(get_bloginfo("url") . '/',"",$new_feat_image); ?>"><img src="<?php echo $img['url'] ?>" style="padding:10px 10px 2px 10px"  /><?php echo get_str_downloadimg()?></a>
              </div>
      			</div>
      		</div>
      	</div> 
      <?php endwhile;  wp_reset_query(); // end of the loop.  ?> 
    </div><!-- .entry-content -->
   
   
   
   
    <div class="container">
        <?php edit_post_link( __( 'Edit', 'commercegurus' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    </div>
</article><!-- #post-## -->
