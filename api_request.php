
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, "https://api.trello.com/1/boards/670cdbb802e7d153f9f5553f?key=0b2e7b2c9467bca4b281573eb177b77c&token=ATTA949bbd3340a9de00e9bf136eed5672c00636bcebfff1aaa7452ab178eccc2cedD4F24C3D");

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

     $response = curl_exec($ch);


	curl_close($ch);      
    echo $response;
    echo '==========================================';
    $data = json_decode($response);
    echo $data;
    echo '==========================================';
    echo $data->id;

?>
</body>
</html>


