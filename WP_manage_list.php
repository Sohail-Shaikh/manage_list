<?php
/*
  Plugin Name: Manage_list
  Description: Management system to manage the user detail like add user, Delete user, Update User Information.
  Version: 1.0
  Author: Sohail Shaikh
  License: GPLv2+
  Text Domain: WP_manage_list
*/

class WP_manage_list{
    function __construct() {	
        add_action('admin_menu',array($this,'wpa_add_menu'));
        //add_action( 'admin', array( $this, 'wpa_install' ));
        // add_action( 'wp_enqueue_scripts',array($this,'load_ajax_scripts') );
        // add_action('wp_enqueue_scripts', array($this,'enqueue_public_scripts_and_styles'));
        register_activation_hook(__FILE__,array($this,'wpa_install'));
        register_deactivation_hook(__FILE__,array($this,'wpa_uninstall'));
        // add_action('wp_print_scripts', 'load_ajax_scripts');
         add_action( 'wp_ajax_my_action', 'my_action' );
    }
    /*
      * Actions perform at loading of admin menu
      */
    public static function wpa_add_menu() {
        add_menu_page('Main Menu','Home','manage_options','Sub-menu','main_menu_output');
        add_submenu_page('Sub-menu','User List','User List','manage_options','menu-list',array( __CLASS__,'wpa_page_file_path'));
        add_submenu_page('Sub-menu','Add User','Add User','manage_options','menu-add',array(__CLASS__,'wpa_page_file_path'));
        // add_submenu_page('Sub-menu','Main Menu'.' Settings','<b style="color:#f9845b">Settings</b>','manage_options','menu-settings',array(__CLASS__,'wpa_page_file_path'));
        // die();
    }
    /*
     * Actions perform on loading of menu pages
     */
    public static function wpa_page_file_path()
    {
    	$screen = get_current_screen();
    	if (strpos($screen->base,'menu-add' )!==false) 
        {
            require_once plugin_dir_path(__FILE__) . 'php/user_register.php';
		    
        }
        elseif(strpos($screen->base,'menu-list')!==false) {
            require_once plugin_dir_path(__FILE__) . 'php/user_lists.php';
        }
        else
        {
        	//echo 'error';
        	return false;
        }
    	// require_once plugin_dir_path(__FILE__) . 'php/detail.php';
        wp_enqueue_script('jquery');
        wp_enqueue_media();
        wp_register_script( 'media-lib-uploader-js', plugins_url( 'media-lib-uploader.js' , __FILE__ ), array('jquery') );
        wp_enqueue_script( 'media-lib-uploader-js' );
        wp_register_script( 'script_file', plugin_dir_url( __FILE__ ) . 'JS/ajax.js', array('jquery'), null,''  );
       
       wp_localize_script( 'script_file', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php')));
        wp_enqueue_script( 'script_file'  );
        

        
    }
    /*
     * Actions perform on activation of plugin
     */
    public function enqueue_public_scripts_and_styles()
    {    
        //public styles
        // wp_enqueue_style(
        //     $this->content_type_name . '_public_styles', 
        //     $this->directory . '/css/' . $this->content_type_name . '_public_styles.css'
        // );
        //public scripts
        wp_enqueue_script(
            'ajax', 
             '/JS/ajax.js', 
            array('jquery') ); 
    }

    public static function wpa_install() {
    	global $wpdb;
    	$charset_collate = $wpdb->get_charset_collate();
   		$table = $wpdb->prefix.'manage_list'; 
		$sql = "CREATE TABLE  $table(
				list_id int(10),
				FirstName varchar(55),
				LastName varchar(55),
				user_gender varchar(10),
				user_no int(10),
				user_city varchar(55),
			    user_dob varchar(55),
				user_email varchar(55),
				user_mobile_no varchar(55),
				user_img varchar(55),
				user_lang varchar(55)
	    		)$charset_collate;";
		require_once(ABSPATH.'wp-admin/includes/upgrade.php');
		$wpdb->query($sql);
    }
    /*
     * Actions perform on de-activation of plugin
     */
    function wpa_uninstall() {  	
    }

    public function WP_Update()
    {
    	require_once plugin_dir_path(__FILE__) . 'php/user_register.php';
        if(isset($_POST['update-form']))
        {
            $a=implode(',',$_POST['user_lang']);
            $language=array("user_lang"=>"$a");
            $insert_var=array_merge($_POST,$language);
            unset($insert_var['update-form']);
            global $wpdb;
            $table = $wpdb->prefix.'manage_list';
            $where=array("user_no"=>$insert_var['user_no']);
            $insert=$wpdb->update($table,$insert_var,$where);
            if($insert)
            {
                echo"<script>alert('data is updated');</script>";
            }
            else
            {
                echo"error";
            }

        }
    }
    public static function load_ajax_scripts() {
        // wp_register_script( 'script_file', get_template_directory_uri(). '/JS/ajax.js', '', null,''  );
       // wp_enqueue_script( 'script_file', plugin_dir_url( __FILE__ ) . '/JS/ajax.js', array('jquery') );
        // wp_localize_script('script_file','ajax_obj',array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
        wp_enqueue_script(
            'ajax', 
             '/JS/ajax.js', 
            array('jquery') );
        }
        
    function my_action()
    {
        if ( isset($_REQUEST) ) {
     
             print_r($_REQUEST);
             
            // Let's take the data that was sent and do something with it
           
         
            // Now we'll return it to the javascript function
            // Anything outputted will be returned in the response
            //echo $fruit;
             
            // If you're debugging, it might be useful to see what was sent in the $_REQUEST
            // print_r($_REQUEST);
         
        }
         
        // Always die in functions echoing ajax content
       die();
    }
}
$object1=new WP_manage_list();
add_action( 'wp_default_scripts', function( $scripts ) {
if ( ! empty( $scripts->registered['jquery'] ) ) {
$jquery_dependencies = $scripts->registered['jquery']->deps;
$scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
}
} );
function delete_ajax_request() {
 
    // The $_REQUEST contains all the data sent via ajax
    if ( isset($_REQUEST) ) {
        // print_r($_REQUEST);
        if(isset($_POST['info']['id']))
        {
            global $wpdb;
            $delete = $wpdb->query("DELETE from wp_manage_list WHERE user_no=".$_POST['info']['id']."");
        }
     
    }
     
    // Always die in functions echoing ajax content
   die();
}
add_action( 'wp_ajax_delete_ajax_request','delete_ajax_request' );
// 

add_action('wp_ajax_insert_ajax_request', 'insert_ajax_request');
add_action( 'wp_ajax_insert_ajax_request','insert_ajax_request' );

function insert_ajax_request() {
 
    // The $_REQUEST contains all the data sent via ajax
    if ( isset($_REQUEST) ) {
        
        print_r($_REQUEST);
        print_r($_REQUEST['arr']);
        echo "hii";  
    }
    wp_die();
    // Always die in functions echoing ajax content
}


