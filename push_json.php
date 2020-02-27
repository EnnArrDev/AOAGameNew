<pre>
<?PHP

// API URL
$url = 'http://alcon.jaryth.net/aoa/index.php';

// Create a new cURL resource
$ch = curl_init($url);

//Auth Request Test
/**
$data = array(
    'request' => 'auth',
    'username' => 'jaryth',
    'password' => 'password'
);
**/

//Inventory Load Request Test
/**
$data = array(
    'request' => 'inventory_load',
    'player_id' => '2',
);
**/

$data = array(
    'request' => 'inventory_save',
    'player_id' => '3',
    'slot_id' => '2',
    'item_id' => 'NULL',
    'item_amount' => 'NULL',
);


$payload = json_encode($data);

echo 'SENDING DATA: ' . PHP_EOL;
echo $payload;       
echo PHP_EOL . PHP_EOL;

// Attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// Return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the POST request
$result = curl_exec($ch);

echo 'RETURN DATA: ' . PHP_EOL;
print_r($result);

echo PHP_EOL . PHP_EOL;

echo 'PARSED DATA: ' . PHP_EOL;   
print_r(json_decode($result, true));

// Close cURL resource
curl_close($ch);
?>
</pre>