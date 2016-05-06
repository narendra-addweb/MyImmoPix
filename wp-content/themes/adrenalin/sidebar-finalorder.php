
<div id="secondary" class="widget-area" role="complementary">
  
  <div class="row topmargin">
      <div class="col-lg-12 col-md-12"><strong><?php echo $ustr = get_str_ordersummary();?></strong></div>
      
  </div>
  
  <div class="row topmargin">
      <div class="col-lg-8 col-md-8 col-xs-8"><?php echo $ustr = get_str_orderfor();?></div>
      <div class="col-lg-2 col-md-2 col-xs-2 orderfor "><?php echo $_GET['order'];?></div>
  </div>
  
   <div class="row topmargin">
      <div class="col-lg-8 col-md-8 col-xs-8"><?php echo $ustr = get_str_servisecredit();?></div>
      <div class="col-lg-2 col-md-2 col-xs-2"><span id="servicetxt"><?php echo $_GET['order'];?></span></div>
  </div>
  <div class="row topmargin border-bot">
      <div class="col-lg-8 col-md-8 col-xs-8"><?php echo $ustr = get_str_availablecredit();?></div>
      <div class="col-lg-2 col-md-2 col-xs-2"><?php echo do_shortcode('[usercreditwoocommerce]');?></div>
  </div>
  
 </div>

