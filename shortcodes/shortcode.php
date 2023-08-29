<?php
/*
Plugin Name: shortcodes
Plugin URI: https://mywebsite.com/
Description: my plugin description
Author: My Name
Author URI: https://Mypersonalwensite.com/
Text Domain: myfirstplugin
Domain Path: /languages/
Version: 1.0.0
*/

//login => function login(){}

function login_shortcode($attributes){
    var_dump($attributes);
    return '<h1>Wordpres '. $attributes['role']  .' Login Page</h1>';
}

add_shortcode('login','login_shortcode');

function login_page_shortcode(){
    return '
   <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">نام کاربری</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">رمز عبور</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">پذیرش قوانین</label>
  </div>
  <button type="submit" class="btn btn-primary">عضویت</button>
</form>
    ';
}

add_shortcode('login_page','login_page_shortcode');
