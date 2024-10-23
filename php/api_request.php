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
    $members = [];
    function getMembers($boardID){
        global $ch;
        global $APIKey;
        global $APIToken;
        global $members;

        $url = 'https://api.trello.com/1/boards/'.$boardID.'/members?key='.$APIKey.'&token='.$APIToken;
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
        curl_setopt($ch, CURLOPT_URL, $url);
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
         $response = curl_exec($ch);
    
        curl_close($ch);      
        //echo $response;
        $data = json_decode($response, true);
        foreach ($data as $x) {
            // AJOUTE LES UTILISATEURS à LA BASE DE DONNEE:
            $members[] = $x["id"];
        }
        // foreach($members as $y){
        //     echo $y;
        // }
        return $members;
    }
    function getCards(){
        global $ch;
        global $APIId;
        global $APIKey;
        global $APIToken;
        
        $cards = array();

        $url = 'https://api.trello.com/1/boards/'.$APIId.'/cards?key='.$APIKey.'&token='.$APIToken;

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
        curl_setopt($ch, CURLOPT_URL, $url);
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
         $response = curl_exec($ch);
    
        curl_close($ch);      
        //echo $response;
        $data = json_decode($response, true);
        foreach ($data as $x){
            if (!empty($x['idMembers']['0']) and !empty($x['idMembers']['1'])){
                echo 'nom: '.$x['name']
                .', idTache:'.$x['id']
                .', délégué:'.$x['idMembers']['0'];
            }
            $cards[] = $x['id'];

        }
        return $cards;
    }
    
    function setCard($cardID, $listUserID){
        global $ch;
        global $APIKey;
        global $APIToken;
        
        $url = 'https://api.trello.com/1/cards/'.$cardID.'?key='.$APIKey.'&token='.$APIToken;

        $data = array("idMembers" => $listUserID);
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',  
            'Content-Length: ' . strlen(json_encode($data))
        ));
    
        $response = curl_exec($ch);
        
        curl_close($ch);      
        echo $response;


    }
    function moveCard($cardID, $listID){

        global $ch;
        global $APIKey;
        global $APIToken;
        
        $url = 'https://api.trello.com/1/cards/'.$cardID.'?key='.$APIKey.'&token='.$APIToken;

        $data = array("idList" => $listID);
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',  
            'Content-Length: ' . strlen(json_encode($data))
        ));
    
        $response = curl_exec($ch);
        
        curl_close($ch);      
        echo $response;

    }

    function addMember($boardID, $userID){

        global $ch;
        global $APIKey;
        global $APIToken;
        
        $url = 'https://api.trello.com/1/boards/'.$boardID.'/members/'.$userID.'?key='.$APIKey.'&token='.$APIToken;

        $data = array("type" => 'normal');
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',  
            'Content-Length: ' . strlen(json_encode($data))
        ));
    
        $response = curl_exec($ch);
        
        curl_close($ch);      
        echo $response;

    }

    function deleteMember($boardID, $userID){

        global $ch;
        global $APIKey;
        global $APIToken;
        
        $url = 'https://api.trello.com/1/boards/'.$boardID.'/members/'.$userID.'?key='.$APIKey.'&token='.$APIToken;

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',  
        ));
    
        $response = curl_exec($ch);
        
        curl_close($ch);      
        echo $response;

    }
    function descCard($cardID, $desc){
        global $ch;
        global $APIKey;
        global $APIToken;
        
        $url = 'https://api.trello.com/1/cards/'.$cardID.'?key='.$APIKey.'&token='.$APIToken;

        $data = array("desc" => $desc);
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',  
            'Content-Length: ' . strlen(json_encode($data))
        ));
    
        $response = curl_exec($ch);
        
        curl_close($ch);      
        echo $response;


    }



?>
</body>
</html>


