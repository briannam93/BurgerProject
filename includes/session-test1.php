<?php
//session-test1.php

//this is how to start a session
//if we use sessions at all, we must use this command 
error_reporting(0);
session_start();

if(isset(echo $_SESSION['Burger']))
{//show session data
    echo $_SESSION['Burger'];
}

else{//inform user
 echo"currently no session data";   
}



//$_SESSION['FavoriteColor']="Pink";
