<?php 
//kankariya-pre-primary-gallery-guj
$options= array();
$options_l=array(
	array(array( "name" => $themename." Options","type" => "title")));
function show_menu_avilable($pre){
	$name = $pre;
	$pre = str_replace(" ","_",$pre);
	$array =array(array('name'=>$name,'type'=>'section'),array( "type" => "open"), 							
		array( "name" => "Facebook URL",
			"desc" => "Enter Facebook Url",
			"id" => $pre."_facebook_url",
			"type" => "text",
			"std" => ""),
		array( "name" => "Twitter URL",
			"desc" => "Enter Twitter Url",
			"id" => $pre."_twitter_url",
			"type" => "text",
			"std" => ""),	
		array( "name" => "Linkedin URL",
			"desc" => "Enter Linkedin Url",
			"id" => $pre."_linkedin_url",
			"type" => "text",
			"std" => ""),
		array( "name" => "Google Plus URL",
			"desc" => "Enter Google Plus Url",
			"id" => $pre."_google_plus_url",
			"type" => "text",
			"std" => ""),
		
        array( "name" => "Website URL",
			"desc" => "Enter Website Url",
			"id" => $pre."_website_url",
			"type" => "text",
			"std" => ""),
        array( "name" => "Phone Number",
			"desc" => "Enter Phone Number",
			"id" => $pre."_phone_number",
			"type" => "text",
			"std" => ""),
        array( "name" => "Contact Number",
			"desc" => "Enter Contact Number",
			"id" => $pre."_contact_number",
			"type" => "text",
			"std" => ""),
        array( "name" => "Address",
			"desc" => "Enter address Number",
			"id" => $pre."_address_number",
			"type" => "textarea",
			"std" => ""),
		array( "name" => "Mobile Number",
			"desc" => "Enter Mobile Number",
			"id" => $pre."_mobile_number",
			"type" => "text",
			"std" => ""), 
		array( "name" => "Email Address",
			"desc" => "Enter Email Address",
			"id" => $pre."_email_address",
			"type" => "text",
			"std" => ""),
		array( "name" => "Footer",
			"desc" => "Enter Footer",
			"id" => $pre."_footer",
			"type" => "text",
			"std" => ""),
	array( "type" => "close"));
return 	$array;
} 
$check = get_option('option_1'); 
//print("<pre>");print_r($check); 

if(!empty($check)){
$list = explode(",",$check);	
$check = array();
foreach($list as $data){ 
	$checks = show_menu_avilable(strtolower($data)); 
	array_push($options_l,$checks);   
} 
foreach($options_l as $data){
	foreach($data as $eat){
		array_push($options,$eat);	  	
	}
} 
}  
  
function manage_html(){
	global $options;
	//print("<pre>");print_r($options);
	if(isset($_POST['action']) && $_POST['action'] == "save"){
		unset($_POST['action']);
		foreach ($_POST as $key=>$value) {					
                    update_option( $key,$value);
            }
	}
	 ?> 
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> Settings</h2>
  
<div class="rm_opts">
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<?php foreach ($options as $value) {
	
switch ( $value['type'] ) {
  
case "open":
?>
  
<?php break;
  
case "close":
?>
  
</div>
</div>
<br />
 
  
<?php break;
  
case "title":
?>
<p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>
 
  
<?php break;
  
case 'text':
?> 
<div class="rm_input rm_text">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
  
 </div>
<?php
break;
  
case 'textarea':
?>
 
<div class="rm_input rm_textarea">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    <textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
  
 </div>
   
<?php
break;
  
case 'select':
?>
 
<div class="rm_input rm_select">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
     
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
        <option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>
 
    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
  
case "checkbox":
?>
 
<div class="rm_input rm_checkbox">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
     
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
 
 
    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break;
case "section":
 
$i++;
 
?> 
<div class="rm_section">
<div class="rm_title"><h3><span class="inactive"></span><?php echo $value['name']; ?></h3><span class="submit">
</span><div class="clearfix"></div></div>
<div class="rm_options">  
<?php break;
  
}
}
?> 
<input type="submit" name="action" value="save" class="button button-primary button-large"/> 
</form>
<?php
} 