
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
    $APIToken = "ATTA949bbd3340a9de00e9bf136eed5672c00636bcebfff1aaa7452ab178eccc2cedD4F24C3D";
    $APIKey = "0b2e7b2c9467bca4b281573eb177b77c";
    $APIId = "670cdbb802e7d153f9f5553f";

    function getMembers(){
        global $ch;
        global $APIId;
        global $APIKey;
        global $APIToken;

        $url = 'https://api.trello.com/1/boards/'.$APIId.'/members?key='.$APIKey.'&token='.$APIToken;
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
        curl_setopt($ch, CURLOPT_URL, $url);
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
         $response = curl_exec($ch);
    
        curl_close($ch);      
        echo $response;
        $data = json_decode($response, true);
        foreach ($data as $x) {
            echo "<p style='width:100px;height:100px;background-color:#20FFFF;'>".$x['fullName']."<p>";
          }
    }
    
    getMembers();





?>
</body>
</html>


