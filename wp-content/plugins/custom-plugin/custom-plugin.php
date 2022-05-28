<?php

/*
 
Plugin Name: Sajo_plugin
 
Plugin URI:
 
Description:  a footer plugin for using in your websites
 
Version: 0.1
 
Author: Sajo
 
Author URI: 
 
 
*/




defined('ABSPATH') or die( 'Sorry, you can\t access this file' );




function custom_plugin_register_settings() {
 
register_setting('custom_plugin_options_group', 'email');
 
register_setting('custom_plugin_options_group', 'copyright');
 
register_setting('custom_plugin_options_group', 'facebook_url');

register_setting('custom_plugin_options_group', 'twitter_url');

register_setting('custom_plugin_options_group', 'linkedin_url');
 
}
add_action('admin_init', 'custom_plugin_register_settings');

function custom_plugin_setting_page() {
 
    // add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' , string $icon_url = '');

     
    add_menu_page('sajo footer', 'Sajo Footer', 'manage_options', 'custom-plugin-setting-url', 'custom_page_html_form' , plugins_url('custom-plugin/img/sajo.png'));
     
    // custom_page_html_form is the function in which I have written the HTML for my custom plugin form.
}
    add_action('admin_menu', 'custom_plugin_setting_page');

    function custom_page_html_form() { ?>
        <div class="wrap">
            <h1>Sajo Footer</h1>
            <p>Please enter all nessacery information</p>
            <form method="post" action="">
                <?php settings_fields('custom_plugin_options_group'); ?>
     
            <table class="form-table">
     
                <tr>
                    <th><label for="first_field_id">Enter Your E-mail:</label></th>
     
                    <td>
                    <input type = 'text' class="regular-text" id="first_field_id" name="email" value="<?php echo get_option('email'); ?>">
                    </td>
                </tr>
     
                <tr>
                    <th><label for="second_field_id">Enter Your Copyright:</label></th>
                    <td>
                        <input type = 'text' class="regular-text" id="second_field_id" name="copyright" value="<?php echo get_option('copyright'); ?>">
                    </td>
                </tr>
     
                <tr>
                    <th><label for="third_field_id">Enter Your Facebook Url:</label></th>
                    <td>
                        <input type = 'text' class="regular-text" id="third_field_id" name="facebook_url" value="<?php echo get_option('facebook_url'); ?>">
                    </td>
                    </tr>
                <tr>
                    <th><label for="fourth_field_id">Enter Your Twitter Url:</label></th>
                    <td>
                        <input type = 'text' class="regular-text" id="fourth_field_id" name="twitter_url" value="<?php echo get_option('twitter_url'); ?>">
                    </td>
                </tr>
                <tr>
                    <th><label for="fifth_field_id">Enter Your Linkedin Url:</label></th>
                    <td>
                        <input type = 'text' class="regular-text" id="fifth_field_id" name="linkedin_url" value="<?php echo get_option('linkedin_url'); ?>">
                    </td>
                </tr>
            </table>
     
            <?php submit_button(); ?>
     
        </div>
    <?php } ?>

<?php
    function tryvary_include_inline_css()
{
    ?>
    <style>
        .footer{
        background: rgb(46,39,164);
        background: linear-gradient(90deg, rgba(46,39,164,1) 32%, rgba(9,9,121,1) 64%, rgba(0,212,255,1) 100%);
        color:black;
        display:flex;
        justify-content: space-between;
        align-items: center;padding:10px;
        width: 100%;
        margin:auto;
        color: white;
        font-size: 18px;
        padding-left: 5%;
        padding-right: 5%;
        }
        .contact a{
            color:white;
            text-decoration: none;
        }
        .copyright{
            display:flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }
        .links img{
            width:50px;
            height: auto;
        }
        /* .wp-menu-image img{
         width:10px !important;
        } */
    </style>
    <?php
}

add_action('wp_head', 'tryvary_include_inline_css', 100);



add_action( 'wp_footer', 'fooetr_footer' );


function fooetr_footer(){

  echo ('<div class="footer">
  <div class="contact"><a href = "mailto:');
  

  echo get_option("email");

  echo ('">Contact@gmail.com</a></div>
  <div class="copyright"><p>
  ');

  echo get_option("copyright");

  echo ('</p></div>
  <div class=""><a href=');

  echo get_option("facebook_url");

  echo ('><img src="https://img.icons8.com/ios-filled/344/ffffff/facebook-new.png" alt="facebook" width="30px"></a>
  <a href=');

  echo get_option("twitter_url");

  echo('><img src="https://img.icons8.com/ios-filled/344/ffffff/twitter-circled.png" alt="twitter" width="30px"></a>
  <a href=');

  echo get_option("linkedin_url");

  echo('><img src="https://img.icons8.com/ios-filled/344/ffffff/linkedin-circled.png" alt="linkedin" width="30px"></a></div>
  </div>
  ');
  




}
