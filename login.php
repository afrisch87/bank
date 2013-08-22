<?php
if(!isset($_REQUEST['page'])) { 
	$_REQUEST['page'] = null;
}
if(!isset($_SESSION)) { 
	$_SESSION = null;
}
if(!isset($_POST['username'])) {
$_POST['username'] = null;
}
if(!isset($_POST['password'])) {
	$_POST['password'] = null;
}
if(!isset($_POST['firstname'])) {
$_POST['firstname'] = null;
}
if(!isset($_POST['lastname'])) {
	$_POST['lastname'] = null;
}
if(!isset($_POST['accountnumber'])) {
	$_POST['accountnumber'] = null;
}
$obj = new forms;
$obj->display_forms();  
//print_r($obj);

  class forms {
    public $login_form = '<FORM action="login.php?page=next" method="post">
                 <fieldset>
                   <LABEL for="username">Username: </LABEL>
                     <INPUT type="text" name="username" id="username"><BR>
                       <LABEL for="password">Password: </LABEL>
                     <INPUT type="text" name ="password" id="password"><BR>
                   <INPUT type="submit" value="Send"> <INPUT type="reset">
                </fieldset>
              </FORM>';

    public $info_form =  '<FORM action="login.php?page=next" method="post">
                            <fieldset>
                              <LABEL for="first_name">First Name: </LABEL>
                               <INPUT type="text" name="first_name" id="first_name"><BR>
                               <LABEL for="last_name">Last Name: </LABEL>                     
			        <INPUT type="text" name="last_name" id="last_name"><BR>
                               <LABEL for="account_number">Account Number: </LABEL>                       
			        <INPUT type="text" name="account_number" id="account_number"><BR>
                               <LABEL for="user_name">User Name: </LABEL>                       
                                <INPUT type="text" name="user_name" id="user_name"><BR>
                               <LABEL for="password">Password: </LABEL>                       
                                <INPUT type="text" name="password" id="password"><BR>
                               <INPUT type="submit" value="Send"> <INPUT type="reset">
                           </fieldset>
                         </FORM>';
    public $dbtcrt_form = '<FORM action="index.php?page=bankform" method="post">
                            <fieldset>
                              <LABEL for="amount">Amount: </LABEL>
                                <INPUT type="text" name="amount" id="lastname"><BR>
                                  <LABEL for="source">Source: </LABEL>
                                    <INPUT type="text" name="source" id="lastname"><BR>
                                  <INPUT type="radio" name="type" value="debit"> Debit<BR>
                                <INPUT type="radio" name="type" value="credit"> Credit<BR>
                              <INPUT type="checkbox" name="moretranstype" value="yes"> More Trans<BR>
                            <INPUT type="submit" value="Send"> <INPUT type="reset">
                          </fieldset>
                       </FORM>';

    public function display_forms() {
	if($_REQUEST['page'] == NULL) {
	  echo "<H1>Welcome to your Bank!</H1>";

	  echo ' <FORM action="login.php?page=login" method="post">
                 <p>
                   <INPUT type="submit" value="Log In"> 
                 </p>
                 </FORM>';
              
                      
          echo '<FORM action="login.php?page=info" method="post">
                 <p>
                   <INPUT type="submit" value="New User">
                 </p>
                 </FORM>';

	} elseif($_REQUEST['page'] == 'login') {
	    echo $this->login_form;
        } elseif($_REQUEST['page'] == 'info') {
  	    echo $this->info_form;
        } elseif($_REQUEST['page'] == 'next') {
            echo $this->dbtcrt_form;
        }  
    }  
    
  }

PRINT_R($_SERVER['REQUEST_METHOD'].'<br>');
  class user {
	public $username = null;
	public $first_name = null;
	public $last_name = null;
	public $account_number = null;
	public $password = null;
        
  }

    $user = new user(); 
 /*   $user->username = $_POST['username'];
    $user->first_name = $_POST['firstname'];
    $user->last_name = $_POST['lastname'];
    $user->account_number = $_POST['accountnumber'];
    $user->password = $_POST['password'];
  print_r($_POST);*/

  $userinfo = array();
  $users = array();
  $userinfo['username'] = $user;
  $users[] = $userinfo;
  print_r($userinfo);
  print_r($users);
  class users {
    function __construct() {
	$user = new user;
	$user->setProperties(); 
    }
  
    public function setProperties() {
  
      $user->username = $_POST['username'];
      $user->first_name = $_POST['firstname'];
      $user->last_name = $_POST['lastname'];
      $user->account_number = $_POST['accountnumber'];
      $user->password = $_POST['password'];
     print_r($_POST);
    }
  }
  
?>
