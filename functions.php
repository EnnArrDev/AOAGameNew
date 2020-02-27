<?PHP

function getClientIP(){       
  if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)){
    return  $_SERVER["HTTP_X_FORWARDED_FOR"];  
  }elseif(array_key_exists('REMOTE_ADDR', $_SERVER)) { 
    return $_SERVER["REMOTE_ADDR"]; 
  }elseif(array_key_exists('HTTP_CLIENT_IP', $_SERVER)) {
   return $_SERVER["HTTP_CLIENT_IP"]; 
}

 return '0.0.0.0';
}

?>