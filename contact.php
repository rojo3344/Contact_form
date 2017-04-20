	
<?php  require_once('functions/form_process.php') ; ?>	


<!DOCTYPE html>
<html lang="en">

 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Robert J">
    <title>Contact</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/contact.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"></link>
    <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --> 
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

 </head>
 <body >

    <!-- Navigation -->

     <?php  include 'menu_footer/menu.html' ; ?>
    <div class="main_box">
        
          <div class="wrapper" >
                          
                         <h3 class="form_h3">Contact Form</h3>
                         <?php   
                         if(!empty($message)){      ?>
                         <h5 class="message"><?php  echo $message ; ?> </h5>
                         <?php }else{ ?>
                          <h5>Enter your details and inquiry below.</h5> 
                         <?php }; ?>
                          <form  method="POST" action="contact.php">                         
                        <span class="error"> 
                        
                        </span>
                         <div  class="form-group ">                            
                           <h5 id="message"><?php //Display message if there is an error in form
                           if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
                              echo "Invalid email format"."<br/>"; 

                                }
                                if(!empty($phone)&& (!filter_var($phone, FILTER_VALIDATE_INT) === 0 || filter_var($phone, FILTER_VALIDATE_INT) === false)) {
                                    echo("Phone must be numeric")."<br/>";
                                 }
                            if($messageErr!=""){                               
                                //Looping through each required field to see if it is blank
                                foreach ($messageErr as $message) {
                                   echo $message." <br/>"; 
                                }
                              }  
                              
                              ?> 
                           </h5>
                           <label>First Name</label>
                          <input class="form-control" name= "first_name"  maxlength="255" size="8" value="<?php  if(isset($firstname)){ echo $firstname; } ?>"/>
                         </div>
                          
                       <div  class="form-group ">                                 
                          <label>Last Name</label>                       
                          <input class="form-control"  name= "last_name"  maxlength="255" size="14" value="<?php if(isset($lastname)){ echo $lastname; } ?>"/>
                       </div>                 
                     
                       <div class="form-group">
                          <label   for="email">Email </label>                     
                          <input class="form-control"  name="email"  type="text" maxlength="255" value="<?php if(isset($email)){ echo $email; } ?>"/> 
                       </div>
                
                      <div class="form-group">
                         <label   for="element_3">Phone </label>
                         <span > <?php echo $phoneErr;?></span>
                         <input class="form-control" name="phone"  maxlength="15" value="<?php if(isset($phone)){ echo $phone; } ?>" type="text"> 
                     </div>	 
                                   
                    <div class="form-group">
                      <label   for="text_area">Your inquiry</label>
                      <textarea  type="textarea"  class="form-control"  name="comment" rows="7"><?php if(isset($comment)){ echo $comment; } ?></textarea> 
                   </div> 

                  <input type="hidden" name="form_id" value="" />
                 <input class="submit_button"  type="submit" name="submit" value="Submit" />

          </form>	
		 
     </div>
       <!--footer-->
        <?php  include 'menu_footer/footer.html' ; ?>                
  </div>       
		 
	
 </body>
</html>