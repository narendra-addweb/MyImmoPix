<?php
if(!empty($_GET['img'])) 
{ 
    $filename = basename($_GET['img']); // don't accept other directories 
    $size = @getimagesize($_GET['img']); 
	
   $fp = @fopen($_GET['img'], "rb"); 
   if ($size && $fp) 
   { 
      header("Content-type: {$size['mime']}"); 
      header("Content-Length: " . filesize($_GET[img])); 
      header("Content-Disposition: attachment; filename=$filename"); 
      header('Content-Transfer-Encoding: binary'); 
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');  
      fpassthru($fp); 
      exit; 
   } 
}

if(!empty($_GET['zip'])) 
{ 

  # send the file to the browser as a download
  header('Content-disposition: attachment; filename='.basename($_GET['zip']));
  header('Content-type: application/zip');
  header("Content-Transfer-Encoding: Binary");
  header("Content-Length: ".filesize($_GET['zip']));
  readfile(basename($_GET['zip']));
  exit;
}  
header("HTTP/1.0 404 Not Found"); 
?>

