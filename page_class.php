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
      print_r($_REQUEST);

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
      
      echo 'form';
     
    }

    protected function post() {  

    }
  }

  class homepage extends page {
    public $form;
    public function __construct() {
      echo '<h1>Welcome to your bank</h1>';
   
      $form= '<FORM action="page_class.php?page=login" method ="post">
             <INPUT type="submit" value="login">
            </FORM>';
      echo $form;
      
      echo '<a href="page_class.php?page=newuser">Register for a new account</a>'.'<br>';

    } 
  }
  class login extends page{
  
  public function __construct() {  
  $form = '<FORM action="page_class.php?page=debitcredit" method="post">
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

    public function __construct() {
      $form=    '<FORM action="page_class.php?page=login" method="post">
    <P>
    <LABEL for="accountnumber">Account Number: </LABEL>
              <INPUT type="text" id="accountnumber"><BR>
    <LABEL for="username">Username: </LABEL>
              <INPUT type="text" id="username"><BR>
    <LABEL for="password">Password: </LABEL>
              <INPUT type="password" id="password"><BR>
    <LABEL for="firstname">First name: </LABEL>
              <INPUT type="text" id="firstname"><BR>
    <LABEL for="lastname">Last name: </LABEL>
              <INPUT type="text" id="lastname"><BR>
    <LABEL for="email">Email: </LABEL>
              <INPUT type="text" id="email"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
   </FORM>';
  echo $form;
  } 
 }
  class debitcredit extends page{

    public function __construct() {
      $form=    '<FORM action="page_class.php?page=debitcredit" method="post">
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
