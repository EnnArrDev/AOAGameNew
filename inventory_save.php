<?PHP

//----------------------------------------------------------------------------//
//----Save Inventory Request---------------------------------------------------//
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

$player_id = $json['player_id'];
$slot_id = $json['slot_id'];
$item_id = $json['item_id'];
$item_amount = $json['item_amount'];

if($item_id == 'None'){
  $item_id = NULL;  
}

if($item_amount == 'None'){
  $item_amount = NULL;  
}


//Check if that already exists
$statement = $pdo->prepare('SELECT * FROM `inventory` WHERE `user_id` = :user_id AND `slot_id` = :slot_id');

//Excecute
$statement->execute(['user_id' => $player_id,'slot_id' => $slot_id]);

//Load all results into rows
$results = $statement->fetchAll();

//Verify any results returned
if($results){

  //Loop through each result
  foreach($results as $row){    
    //Update
    $statement = $pdo->prepare('UPDATE inventory SET `item_id`=:item_id, `item_amount`=:item_amount WHERE `user_id` = :user_id AND `slot_id` = :slot_id');
    
    //Excecute
    $statement->execute(['user_id' => $player_id, 'slot_id' => $slot_id, 'item_id' => $item_id, 'item_amount' => $item_amount,]);        
  }  

}else{  
  //Insert 
  $statement = $pdo->prepare('INSERT INTO inventory (`user_id`,`slot_id`,`item_id`,`item_amount`) VALUES (:user_id, :slot_id, :item_id, :item_amount)');
  
  //Excecute
  $statement->execute(['user_id' => $player_id, 'slot_id' => $slot_id, 'item_id' => $item_id, 'item_amount' => $item_amount,]);
}




$inventory_save_success = 1;
?>