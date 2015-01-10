<?php


function autoload_header_css()
{
    $files = config_item('header_css'); 
    load_css($files);
}
function autoload_header_js()
{
    $files = config_item('header_js'); 
    load_js($files);
}
function autoload_footer_js()
{
    $files = config_item('footer_js'); 
    load_js($files);
}

function load_css($files)
{
    foreach ($files as $file) {
    	if (strpos($file,'//') !== false) {
		   echo "<link href='".$file."' rel='stylesheet' type='text/css'>";
		}else{
			echo "<link href='".base_url().CSS.$file."' rel='stylesheet' type='text/css'>";
		}
    }
}
function load_js($files)
{
    foreach ($files as $file) {
    	if (strpos($file,'//') !== false) {
		    echo "<script src='".$file."''></script>";
		}else{
    		echo "<script src='".base_url().JS.$file."''></script>";
    	}
    }
}

?>