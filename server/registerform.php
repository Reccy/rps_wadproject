<?php
    $username = $_POST["Username"]; //Get username
    $password = $_POST["Password"]; //Get password
    $checked = $_POST["Checked"]; //Get if the user checked the box (true/false)
    
    $username = trim($username);
    $password = trim($password); //Trim details for sanitization
    
    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username))
    {
        echo"error_special_chars";
        exit();
    }
    
    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password))
    {
        echo"error_special_chars";
        exit();
    }
    
    if($checked == "false"){
        echo"error_unchecked_box";
        exit();
    } else if($checked != "true" && $checked != "false"){
        echo"error_unknown";
        exit();
    }
    
    $username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS); //Sanitize details
    
    $password = password_hash($password,PASSWORD_BCRYPT); //Hash and salt password
    
    if (file_exists('users.xml')) {  //Write XML file
        $xml = simplexml_load_file('users.xml');
        $sxe = new SimpleXMLElement($xml->asXML());
        
        for($i = 0; $i < $sxe->count(); $i++){
            if($sxe->user[$i]->details->username == $username){
                echo "user_exists"; //If user exists, return error
                exit();
            }
        }
        
        $user = $sxe->addChild("user");
        $details = $user->addChild("details");
        $score = $user->addChild("score");
        $details->addChild("username",$username);
        $details->addChild("password",$password);
        $score->addChild("wins",0);
        $score->addChild("losses",0);
        $score->addChild("streaks",0);
        $score->addChild("ratio",0);
    } else {
        echo "error_unknown"; //Error handling
        exit();
    }

    $sxe->asXML("users.xml");
    
    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($sxe->asXML());
    $dom->save("users.xml");
    
    echo "user_added"; //Successfully added user
    exit();
?>