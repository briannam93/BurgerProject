<?php
/**
 * @package FoodTruck
 * @author Damien and Brianna
 * @version 0.1 2016/07/25
 * @link http://www.damiendev.net/sm16/demo/project2
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
# '../' works for a sub-folder.  use './' for the root  
require '../../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials
//Here's where the burgers are!
include 'includes/burger-array.php';
/*
//UNCOMMENT TO SEE Burgers!
dumpDie($burgers);
*/
 
/*
$config->metaDescription = 'Web Database ITC281 class website.'; #Fills <meta> tags.
$config->metaKeywords = 'SCCC,Seattle Central,ITC281,database,mysql,php';
$config->metaRobots = 'no index, no follow';
$config->loadhead = ''; #load page specific JS
$config->banner = ''; #goes inside header
$config->copyright = ''; #goes inside footer
$config->sidebar1 = ''; #goes inside left side of page
$config->sidebar2 = ''; #goes inside right side of page
$config->nav1["page.php"] = "New Page!"; #add a new page to end of nav1 (viewable this page only)!!
$config->nav1 = array("page.php"=>"New Page!") + $config->nav1; #add a new page to beginning of nav1 (viewable this page only)!!
*/
//END CONFIG AREA ----------------------------------------------------------
# Read the value of 'action' whether it is passed via $_POST or $_GET with $_REQUEST
if(isset($_REQUEST['act'])){$myAction = (trim($_REQUEST['act']));}else{$myAction = "";}
switch ($myAction) 
{//check 'act' for type of process
	case "display": # 2)Display user's name!
	 	showOrder();
	 	break;
	default: # 1)Ask user to enter their name 
	 	showForm();
}
function showForm()
{# shows form so user can enter their name.  Initial scenario
	get_header(); #defaults to header_inc.php
    global $burgers; // allows us to see the burger data
    echo '<h3>Burgers!</h3>';
    
    /*
    
    ' . xxx . '
    
    */
$i=0;
?>
    <form action='index.php' method='post'> <?php
    
    foreach($burgers as $burger)
    {
        
        //dumpDie($burger);
        echo '
        <p><strong>
        ' . $burger->Type . '</strong>: ' . $burger->Description . ' Burger for only $' . $burger->Price . ' <select name="'. $i .'">
  <option value="none">none</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select> </p>
        ';
        $i++;
    }
    
     ?> 
            <input type='submit' name='submit'>
                                     </form><?php
    if(isset($_POST['submit'])){
        echo '<br> <br><h2>Your Order</h2>';
    }
    
    $subtotal = 0;
    $max = sizeof($burgers);
            for($i=0; $i<=$max; $i++){
             if(isset($_POST[$i])){
                 $subtotal= $subtotal+ ($burgers[$i]->Price * ($_POST[$i]));
                 if($_POST[$i] != "none"){
            echo '<h3>'. $_POST[$i] . ' ' . $burgers[$i]->Type . '.</h3>';
                 }
                 }
            }
   echo   '<br> <br>';
    $tax = $subtotal*.096;
$taxFormatted = number_format($tax, 2);
$total = $subtotal + $tax; 
$totalFormatted = number_format($total, 2);
    
 ?>


<p>Subtotal:    $<?php echo $subtotal ?></p>
<p>Tax:     $<?php echo $taxFormatted; ?></p>
<p>Total:   $<?php echo $totalFormatted; 
	
    
	/*
    echo 
	'<script type="text/javascript" src="' . VIRTUAL_PATH . 'include/util.js"></script>
	<script type="text/javascript">
		function checkForm(thisForm)
		{//check form data for valid info
			if(empty(thisForm.YourName,"Please Enter Your Name")){return false;}
			return true;//if all is passed, submit!
		}
	</script>
	<h3 align="center">' . smartTitle() . '</h3>
	<p align="center">Please enter your name</p> 
	<form action="' . THIS_PAGE . '" method="post" onsubmit="return checkForm(this);">
		<table align="center">
			<tr>
				<td align="right">
					Name
				</td>
				<td>
					<input type="text" name="YourName" /><font color="red"><b>*</b></font> <em>(alphabetic only)</em>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="2">
					<input type="submit" value="Please Enter Your Name"><em>(<font color="red"><b>*</b> required field</font>)</em>
				</td>
			</tr>
		</table>
		<input type="hidden" name="act" value="display" />
	</form>
	';
    */
	get_footer(); #defaults to footer_inc.php
}
function showOrder()
{#form submits here we show entered name
	get_header(); #defaults to footer_inc.php
	if(!isset($_POST['YourName']) || $_POST['YourName'] == '')
	{//data must be sent	
		feedback("No form data submitted"); #will feedback to submitting page via session variable
		myRedirect(THIS_PAGE);
	}  
	
	if(!ctype_alnum($_POST['YourName']))
	{//data must be alphanumeric only	
		feedback("Only letters and numbers are allowed.  Please re-enter your name."); #will feedback to submitting page via session variable
		myRedirect(THIS_PAGE);
	}
	
	$myName = strip_tags($_POST['YourName']);# here's where we can strip out unwanted data
	
	echo '<h3 align="center">' . smartTitle() . '</h3>';
	echo '<p align="center">Your name is <b>' . $myName . '</b>!</p>';
	echo '<p align="center"><a href="' . THIS_PAGE . '">RESET</a></p>';
	get_footer(); #defaults to footer_inc.php
}
?>
