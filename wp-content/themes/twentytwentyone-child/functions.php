<?php 
/* Child theme generated with WPS Child Theme Generator */
            
if ( ! function_exists( 'b7ectg_theme_enqueue_styles' ) ) {            
    add_action( 'wp_enqueue_scripts', 'b7ectg_theme_enqueue_styles' );
    
    function b7ectg_theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ) );
    }
}


//ajax contact form data mail
function invio_mail(){
 
	$subject='Form data';
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$phn=$_POST['phno'];
	$comment=$_POST['comment'];
	$to = $_POST['email'];
  //$to.= 'Bcc: <'. get_bloginfo('admin_email') . '>'. "\r\n";
	$body  = 'From: admin' ;
	$body .="<html>
	<body>
	<h3>Fistname:". $fname ."</h3>
	<h3>Lastname:". $lname ."</h3>
	<h3>Phone No:". $phn ."</h3>
  <h3>Comment:". $comment ."</h3>
	<body>
	</html>";
	$headers = array('Content-Type: text/html; charset=UTF-8','From: kavita <kavita@plutustec.com>');
	wp_mail( $to, $subject, $body, $headers );
  $admin_email = get_option( 'admin_email' );
  //echo $admin_email;
  wp_mail($admin_email,$subject, $body, $headers);
  exit();
}
add_action( 'wp_ajax_sendmail', 'invio_mail' );
add_action( 'wp_ajax_nopriv_sendmail', 'invio_mail' );

add_action('wp_footer', 'sendmail');
function sendmail(){
    ?>
    <script>
     
         jQuery(document).ready(function() {   
            jQuery('#submit').click( function() {	
                
                     var fname = jQuery('#firstName').val();
                     var lname = jQuery('#lastName').val();
                     var email = jQuery('#emailAddress').val();
                     var phno = jQuery('#phoneNumber').val();
                     var comment = jQuery('#exampleFormControlTextarea1').val();
            
                $.ajax({
                    type        : 'POST', 
                    url         : "<?php echo admin_url('admin-ajax.php'); ?>",
                    data        : {
			        	action: 'sendmail',
			        	fname : fname,
						lname : lname,
					    email : email,
						phno : phno,
                		comment : comment,
			        },
                    dataType    : 'json',
                    encode      : true
                }).done(function(data) {
                    console.log(data);        
                }).fail(function(data) {
                    console.log(data);
                });
                
            });
          });

         
    </script>
<?php }



//insert data
function insert_data(){
    global $wpdb;
    if(isset($_POST['btn_submit'])){
   
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
      $email = $_POST['email'];
      $contactno = $_POST['phoneno'];
      $comment = $_POST['comment'];
      $tablename = $wpdb->prefix."customtable";
      $insert_sql = "INSERT INTO ".$tablename."(`firstname`, `lastname`,`email`, `phoneno`, `comment`) 
      values('". $fname ."','". $lname ."','". $email ."','". $contactno ."','". $comment ."') ";
         $wpdb->query($insert_sql);
        
        
    }
    
  
}
add_action('init', 'insert_data');
   ?>

<?php 
//custom table
function scratchcode_create_payment_table() {
 
    global $wpdb;
 
    $table_name = $wpdb->prefix . "customtable";
 
    $charset_collate = $wpdb->get_charset_collate();
 
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
      id bigint(20) NOT NULL AUTO_INCREMENT,
      firstname VARCHAR(255) NOT NULL,
      lastname VARCHAR(255) NOT NULL,
      email VARCHAR(255) NOT NULL,
      phoneno VARCHAR(255) NOT NULL,
      comment VARCHAR(255) NOT NULL,
      PRIMARY KEY id (id)
    ) $charset_collate;";
 
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}    
add_action('init', 'scratchcode_create_payment_table');


//show all saved record
add_shortcode( 'data_listing', 'display_data' );
function display_data()
{ ?>
<div class="container">
  <div class="row">
  <?php
         global $wpdb;
         $tablename = $wpdb->prefix."customtable";
  $entries = $wpdb->get_results("SELECT * FROM ".$tablename." order by id asc ");
  $total_rows = $wpdb->num_rows;
 // print_r($_GET);
 $page_number=(get_query_var('paged')) ? get_query_var('paged') : 1;
//echo $page_number;
$limit = 3;  // variable to store the number of rows per page  
$offset = ($page_number - 1) * $limit;  // get the initial page number
//echo $offset;
$total_pages = ceil ($total_rows / $limit);   // get the required number of pages
//echo $total_pages;
$entriesList = $wpdb->get_results("SELECT * FROM ".$tablename." order by id asc LIMIT " . $offset . ',' . $limit);
//echo $wpdb->last_query;
    ?>
       <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">E-mail</th>
            <th scope="col">Phone no</th>
            <th scope="col">Comment</th>
          </tr>
        </thead>
        <?php
        foreach($entriesList as $entry){
          $id = $entry->id;
          $fname = $entry->firstname;
          $lname = $entry->lastname;
          $email = $entry->email;
          $phno = $entry->phoneno;
          $comment = $entry->comment; ?> 
        <tbody>
          <tr>
          <td><?php echo $id;?></td>
            <td><?php echo $fname;?></td>
            <td><?php echo $lname;?></td>
            <td><?php echo $email;?></td>
            <td><?php echo $phno;?></td>
            <td><?php echo $comment;?></td>
          </tr>
          <?php } ?>
          </tbody>
      </table>
    </div>
    
  </div>
</div> 
<?php 

global $wp_query;

$big = 999999999;
$search_for   = array( $big, '#038;' );
$replace_with = array( '%#%', '' );
$tag = '<div class="pagination">' . PHP_EOL;
$tag .= paginate_links( array(
        'base'              => str_replace( $search_for, $replace_with, esc_url( get_pagenum_link( $big ) ) ),
        'format'            => '?paged=%#%',
        'current'           =>  max( 1, get_query_var('paged') ),
        'total'             => $total_pages,
        'prev_next'         => True,
        'prev_text'         => __('«'),
        'next_text'         => __('»'),
        'before_page_number' => '<span>',
        'after_page_number'  => '</span>'
    ) ) . PHP_EOL;

$tag .= '</div>' . PHP_EOL;
echo $tag;
}
?>

<?php

//include "../../../wp-load.php";

//$headers = "MIME-Version: 1.0" . "\r\n";
//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//$headers .= 'From: <example@gmail.com>' . "\r\n";
//$headers .= 'Bcc: <'. get_bloginfo('admin_email') . '>'. "\r\n";


//mail("example2@gmail.com","Form Application",$admin_email_body,$headers);*/

?>