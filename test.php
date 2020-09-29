<?php include "includes/db.php";?>
<?php include "includes/header.php";?>


<?php
//echo password_hash('secret', PASSWORD_BYCRYPT, array ('cost' => 12) );
echo loggedInUserId();

if(userLikedThisPost(84)){
    
  echo "User Liked It";  
    
    
    
}else{
    
    echo "User Did Not Like It";
}

?>