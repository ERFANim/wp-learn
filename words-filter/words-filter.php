<?php
/*
Plugin Name: فیلتر سازی کلمات
Plugin URI: https://mywebsite.com/
Description: یک افزونه برای فیلتر سازی کلمات در محتوای وردپرس
Author: عرفان
Author URI: https://Mypersonalwensite.com/
Text Domain: wordsFilter
Domain Path: /languages/
Version: 1.0.0
*/

define('WF_PLUGIN_DIR',plugin_dir_path(__FILE__));
define('WF_PLUGIN_URL',plugin_dir_url(__FILE__));
define('WF_PLUGIN_INC',WF_PLUGIN_DIR.'/inc/');

function wf_filter_words($content){

    $word1 = 'وردپرس';
    $wordLength = mb_strlen($word1);
    $replace1 = str_repeat('*',$wordLength);
    $content = preg_replace("/{$word1}/",$replace1,$content);
    
    $word2 = 'خوش';
    $replace2 = '';
    $content = preg_replace("/{$word2}/",$replace2,$content);
    
    $word3 = 'آمدید';
    $replace3 = '<a href="#">آمدید</a>';
    $content = preg_replace("/{$word3}/",$replace3,$content);
    
    /*or do this
    $pattern=array('1','2','3');
    $replace=array('one','two','tree');
    $content = preg_replace($pattern,$replace, $content);
    */
    
    return $content;
}


add_filter('the_content','wf_filter_words');

