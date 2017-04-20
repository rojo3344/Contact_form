<?php

try {
    $servername= localhost;
    $dbname='XXXXXX' ;
    $username= 'XXXXX';
    $password= 'XXXXX';
          
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
    
    // set the PDO error mode to exception

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    if(isset($_POST['submit'])){
    $sql= "INSERT INTO form(first_name,last_name,email,phone,comment) 
    VALUES (:firstname,:lastname,:email,:phone,:comment)";
    
    // prepare sql and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':firstname',$firstname);
    $stmt->bindParam(':lastname',$lastname);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':phone',$phone);
    $stmt->bindParam(':comment',$comment);
       
    //Get the values from the form
    $firstname= trim($_POST['first_name']);
    $lastname= trim($_POST['last_name']);
    $email= trim($_POST['email']);
    $phone= trim($_POST['phone']);
    $comment= trim($_POST['comment']);
    
    //Start a new array to display the message
    $messageErr= array();
                
    $fields= array(
        "First name"=>$firstname,
        "Last name"=>$lastname,
        "Email"=>$email,
        "Comment"=>$comment);
    //Dynamically display the message
    foreach($fields as $key=>$field){
        
        if($field==""){
        $messageErr[$key]= $key." is required";         
        
    }else{
        
        $messageErr[$key]= "";    
    }
        
    }
    
    
   if($messageErr[$key]==""){
    $stmt->execute();
    $message= "The form was submmited successfully";
       $firstname=$lastname=$phone=$email=$comment= "";
                          
                  }             
       }
    }

catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    }


?>
