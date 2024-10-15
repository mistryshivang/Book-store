<html>
    <head>
        <?php include('head.php'); ?>
        <link rel="stylesheet" href="register.css">
        <?php include('class/DataClass.php');?>
        <?php 
       
        $dc=new dataclass();
        $regid="";
        $regdate="";
        $name="";
        $email="";
        $password="";
        $utype="";
        $query="";
        $result="";
        $msg="";
        $_SESSION['name']="";
  ?>
  <?php
            if(isset($_POST['btnregister']))
            {
              
              $name=$_POST['username'];
              $password=$_POST['password'];
              $utype="client";
              $email=$_POST['email'];
              $address = $_POST['address'];
              

            //   if($_POST['spaswword1']=$_POST['spassword2'])
            //   {
                $query="insert into users(name,email,password,address,utype) values('$name','$email','$password','$address','$utype')";
                $result=$dc->saverecord($query);
                if($result)
                {
                    $_SESSION['name']=$name;
                    echo '<script>';
                    echo 'alert("your registretion successfully..");';
                    echo '</script>';
                }
                else
                {
                  echo '<script>';
                  echo 'alert("your registretion unsuccessfully..");';
                  echo '</script>';
                }
            //   }
            //   else{
            //     echo '<script>';
            //     echo 'alert("your password not match with confirm password.");';
            //     echo '</script>';
            //   }
              
          }
          ?>
    </head>
    <body>
        <form action="" method="post">
            <div class="banner">
                <?php require('navbar.php') ?>
                <?php require('reg.php'); ?>
            </div>
        </form>
        
    </body>
</html>