<?PHP

//----Config------------------------------------------------------------------//

//Initalize Vairables
//Setup our output
$output = array();
$output['status'] = '0';
$output['message'] = '[UNKNOWN STATUS]';
$auth_success = '0';
$inventory_load_success = '0';
$inventory_save_success = '0';

//----Load Assets-------------------------------------------------------------//

//Load our Config file
require_once('config.php');
require_once('functions.php');

//----Database Connection-----------------------------------------------------//

//Connect to database
try{
  //Try to connect
  $pdo = new PDO($db_dsn, $db_user, $db_pass, $db_options);
  
  //If something goes wrong
}catch(PDOException $e){
  //Set debug information
  $debug_data[] = 'Database Error: ' . $e->getMessage();
  $output['message'] = 'Unable to connect to Database. Please contact an administrator.';
  goto output;
}


//----Start Parsing Request---------------------------------------------------//

//Load raw data
$data = file_get_contents('php://input');

//Accept and decode the JSON
$json = json_decode($data, true);

//Check request type
if(!empty($json['request'])){

  
  //----Authentication Request------------------------------------------------//
  if($json['request'] == 'auth'){
  
    //Load auth script
    include('auth.php');
    
    //Check result of auth attempt
    if($auth_success){
      //Successful auth, update player
      $output['status'] = '1';
      $output['message'] = 'You are now logged in. Welcome back ' . $json['username'];
      $output['player_info'] = $player_info; 
      goto output; 
    }else{
      //An error must have happened
      if(empty($output['message'])){
        $output['message'] = 'Unknown login error. Please contact an administrator.';
      }
      goto output;      
    }  
 
  }
  
  //----Inventory Load Request------------------------------------------------//
  if($json['request'] == 'inventory_load'){
  
    //Load inventroy load script
    include('inventory_load.php');
    
    //Check result of attempt
    if($inventory_load_success){
      //Successful, update player
      $output['status'] = '1';
      $output['message'] = 'Successfully loaded Inventory';
      $output['player_inventory'] = $player_inventory; 
      goto output; 
    }else{
      //An error must have happened
      if(empty($output['message'])){
        $output['message'] = 'Unknown inventory error. Please contact an administrator.';
      }
      goto output;      
    }  
 
  }
  
  //----Inventory Save Request------------------------------------------------//
  if($json['request'] == 'inventory_save'){
  
    //Load auth script
    include('inventory_save.php');
    
    //Check result of Inventory Save attempt
    if($inventory_save_success){
      //Successful, update player
      $output['status'] = '1';
      $output['message'] = 'Successfully saved Inventory';
      //$output['player_inventory'] = $player_inventory; 
      goto output; 
    }else{
      //An error must have happened
      if(empty($output['message'])){
        $output['message'] = 'Unknown inventory error. Please contact an administrator.';
      }
      goto output;      
    }  
 
  }  
  
//If no request was made
}else{
  $output['message'] = 'No request was made.';
  goto output;
}












//----Output------------------------------------------------------------------//
output:

//Encode final message
$result = json_encode($output);

//Output message
echo $result;

//Remove the password from the log just in case
if(!empty($json['password'])){
  $json['password'] = '[REMOVED]';
}

$encoded_json = json_encode($json);

//Log the data
$log = date("Y-m-d") . '|' . date("H:i:s") . '|' . getClientIP() . '|' . $encoded_json . '|' . $result;     

file_put_contents('status.log', $log . PHP_EOL, FILE_APPEND);
?>