<html>
    <head>
        <?php include('head.php'); ?>
        <link rel="stylesheet" href="support.css">
        <?php include('class/DataClass.php');?>
        <?php 
       
        $dc=new dataclass();
        $mob="";
        $email="";
        $qry="";
        $query="";
        $result="";
        $msg="";
  ?>
  <?php
            if(isset($_POST['btnsupport']))
            {
              
              $mob=$_POST['mob'];
              $qry=$_POST['query'];
              $email=$_POST['email'];

              
                $query="insert into support(email,mob,query) values('$email',$mob,'$qry')";
                $result=$dc->saverecord($query);
                if($result)
                {
                    
                    echo '<script>';
                    echo 'alert("your query register successfully..");';
                    echo '</script>';
                }
                else
                {
                  echo '<script>';
                  echo 'alert("your query register unsuccessfully..");';
                  echo '</script>';
                }
              
          }
          ?>
    </head>
    <body>
        
            <div class="banner">
                <?php require('navbar.php') ?>
                <?php require('sup.php') ?>
            </div>
        
        
    </body>
</html>