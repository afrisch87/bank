<?php

    $obj = new program();

   
class program {

    public function __construct() {
      if(isset($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
        $obj = new $page();
      } else {
   
        $obj = new homepage();
      } 
      //print_r($_REQUEST);

    }
}  

  class page {
    
    public function __construct() {
    
      if($_SERVER['REQUEST_METHOD'] == 'GET') {
	        $this->get();

      }  else {
		$this->post();
      }
    }
    
    protected function get() {
      
    }

    protected function post() {  

    }
  }

  class homepage extends page {
    public $form;
    public function __construct() {
      echo '<h1>Welcome to your bank</h1>';
   
      $form= '<FORM action="bankproject.php?page=login" method ="post">
             <INPUT type="submit" value="login">
            </FORM>';
      echo $form;
      
      echo '<a href="bankproject.php?page=newuser">Register for a new account</a>'.'<br>';

    } 
  }
  class login extends page{
  
  public function __construct() {  
  $form = '<FORM action="bankproject.php?page=debitcredit" method="post">
    <P>
    <LABEL for="username">Username: </LABEL>
              <INPUT type="text" id="username"><BR>
    <LABEL for="password">Password </LABEL>
              <INPUT type="password" id="password"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
   </FORM>';
  
  echo $form;

  }
  } 

  class newuser extends page{
  
    public $username;
    public $password;
    public $firstname;
    public $lastname;
    public $userinfo;
    public $accountnumber;  
   
  public function get() { 
    $form = '<FORM action="bankproject.php?page=newuser" method="post">
    <P>
    <LABEL for="username">Username: </LABEL>
              <INPUT type="text" name="username" id="username"><BR>
    <LABEL for="password">Password: </LABEL>
              <INPUT type="password" name="password" id="password"><BR>
    <LABEL for="firstname">First name: </LABEL>
              <INPUT type="text" name="firstname" id="firstname"><BR>
    <LABEL for="lastname">Last name: </LABEL>
              <INPUT type="text" name="lastname"id="lastname"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
   </P>
   </FORM>';
    echo $form;
  
  }
 

  
    public function post() {
    
      if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])) {   
      $this->username = $_POST['username'];
      $this->password = $_POST['password'];
      $this->firstname = $_POST['firstname'];
      $this->lastname = $_POST['lastname']; 
      
      $this->userinfo = array($this->username,$this->password,$this->firstname,$this->lastname);
      $this->accountnumber = mt_rand(100000,999999);   
      
      array_unshift($this->userinfo, "$this->accountnumber");
      
      echo '<br> Hi, ' . "$this->firstname " . $this->lastname . '<br>'; 
      echo 'Your account number is: ' . $this->accountnumber . '<br>';   
     
      print_r($this->userinfo);
    } else {
  
      echo 'You have not completed the form! Please enter all fields to continue.<br>';

      echo '<br>'.'<a href "bankproject.php?page=newuser"> Return to New User Form </a>' . '<br>'; 
    } 
    }
    public function __destruct() {
    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])) { 
     $full = $this->userinfo;
     $fp = fopen('userinfo.csv', 'a');
      fputcsv($fp, $full);

      fclose($fp); 
       echo '<FORM action="bankproject.php?page=login" method="post">
    <P>
        <INPUT type="submit" value="Login to your Account"><BR>
    </p>
    </FORM>';
     }
     // echo '<br>'.'<a href "bankproject.php?page=newuser"> Return to New User Form </a>' . '<br>'; 
  }
 }

  
  class debitcredit extends page{
 
    public function __construct() {
    
    $form=    '<FORM action="bankproject.php?page=debitcredit" method="post">
    <P>
    <LABEL for="amount">Amount: </LABEL>
              <INPUT type="text" id="ammount"><BR>
    <LABEL for="source">Source:</LABEL>
              <INPUT type="source" id="source"><BR>
    <LABEL for="debit">Debit </LABEL>
              <INPUT type="radio" name="type" id="debit">
    <LABEL for="credit">Credit </LABEL>
              <INPUT type="radio" name="type" id="creit"><BR>
    <INPUT type="submit" value="Submit"> <INPUT type="reset">
    </P>
   </FORM>';
  echo $form;
  }
 }

?>
