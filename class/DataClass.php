<?php

   class DataClass
   {
	  public $conn;
	  public $message;
	  	  
      public function __construct()
      {
	    $this->conn=mysqli_connect("localhost","root","","bookstore");
	  }		  
	  
	  public function getrow($query)
	  {
	    $tb=mysqli_query($this->conn,$query);
		$rw=mysqli_fetch_array($tb);
		return $rw;
      }
	  
	  public function getTable($query) 
	  {
        $tb=mysqli_query($this->conn,$query);
		return $tb;
	  }	
	 
	  public function saveRecord($query) //record insert,update,delete
	  {
	    $result=mysqli_query($this->conn,$query);
		return $result;
	  }
	  public function counter($query)
	  {
		$count=0;
		$tb=mysqli_query($this->conn,$query);
		$rw=mysqli_fetch_array($tb);
		$count=$rw['0'];
		return $count;
	  }
	  public function primarykey($query)
	  {
		$pk=0;
		$tb=mysqli_query($this->conn,$query);
		$rw=mysqli_fetch_array($tb);
		if($rw)
		{
			$pk=$rw[0];
			$pk=$pk+1;
		}
		return $pk;
	  }
	  public function getLastInsertedId() {
		return mysqli_insert_id($this->conn);  // Assuming $this->connection is your MySQL connection
	  }
	
   }

?> 