<?PHP

//----------------------------------------------------------------------------//
//----Check Login Attempt-----------------------------------------------------//
//----------------------------------------------------------------------------//

//--Username Validation---------------------------------------------------------
if(!empty($json['username'])){
 
  //Set username
  $user_name = $json['username'];
    
}else{
  $output['message'] = 'Username cannot be empty.';
  return;
} 

//--Password Validation---------------------------------------------------------
if(!empty($json['password'])){
 
  //Set password
  $user_password = $json['password'];
    
}else{
  $output['message'] = 'Password cannot be empty.';
  return;
}  

//--Database Query--------------------------------------------------------------
//Prepare statement for user search
$statement = $pdo->prepare('SELECT * FROM `users` WHERE `user_name` = :user_name');

//Search for user based on username
$statement->execute(['user_name' => $user_name]);

//Load all results into rows
$results = $statement->fetchAll();

//Verify any results returned
if($results){

  //Loop through each result
  foreach($results as $row){    
    //Verify password
    if(password_verify($user_password . $pepper, $row['user_password'])){
      //Load result into user info
      $player_info = $row;
      //Unset password for security reasons
      unset($player_info['user_password']);  
    }else{      
      //Throw error if password incorrect
      $output['message'] = 'Incorrect username or password.'; 
      return;
    }    
  }  

}else{  
  //No results returned means that username does not exist
  $output['message'] = 'There is no account for that username.';
  return;
}

//--User Login------------------------------------------------------------------
//Verify user data (Just a doublecheck)
if(empty($player_info)){
  $output['message'] = 'Login error has occored. Please contact an administrator.';
  return;
}

$auth_success = '1';

?>