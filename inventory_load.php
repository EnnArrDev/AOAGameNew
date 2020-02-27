<?PHP

//----------------------------------------------------------------------------//
//----Load Inventory Request---------------------------------------------------//
//----------------------------------------------------------------------------//

//--Player ID Validation--------------------------------------------------------
if(!empty($json['player_id'])){
 
  //Set username
  $player_id = $json['player_id'];
    
}else{
  $output['message'] = 'Player ID Cannot be empty.';
  return;
}

//Initalize some variables
$inventory = array();
$inventory['player_id'] = $player_id;
$inventory['inventory'] = array();



//--Database Query--------------------------------------------------------------
//Prepare statement for inventory search
$statement = $pdo->prepare('SELECT * FROM `inventory` WHERE `user_id` = :user_id');

//Search for user based on username
$statement->execute(['user_id' => $player_id]);

//Load all results into rows
$results = $statement->fetchAll();

//Verify any results returned
if($results){

  //Loop through each result
  foreach($results as $row){    
    $inventory['inventory'][] = $row;       
  }  

}else{  
  //No results returned means that username does not exist
  $output['status'] = '1';
  $output['message'] = 'Empty Inventory!';
  return;
}

$player_inventory = $inventory;
$inventory_load_success = '1';
return;
?>