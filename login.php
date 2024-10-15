<html>
    <head>
        <?php include('head.php'); ?>
        <link rel="stylesheet" href="login.css">
        <?php include('class/DataClass.php');?>

        <?php 
        session_start();
        $dc=new dataclass();
        $regid="";
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
          $name=$_SESSION['name'];
          if(isset($_POST['btnlogin']))
          {
            $_SESSION['regid']=$_POST['btnlogin'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $query="select regid,name,email,password,utype from users where email='$email'";
            $rw=$dc->getrow($query);

            if($rw)
            {
                if($rw['password'] == $password)
                {
                    $_SESSION['regid']=$rw['regid'];
                    $_SESSION['name']=$rw['name'];
                    
                    if($rw['utype'] =='Admin')
                    {
                        header('location:admin/home.php');
                    }

                    if($rw['utype'] =='client')
                    {
                        header('location:client/home.php');
                    }

                    if($rw['utype'] =='seller')
                    {
                        header('location:seller/home.php');
                    }
                }
                else
                {
                  echo '<script>';
                  echo 'alert("invalid password.");';
                  echo '</script>';
                }
            }
            else
            {
              echo '<script>';
              echo 'alert("invalid Email.");';
              echo '</script>';
            }
        }         
      ?>
    </head>
    <body>
        
            <div class="banner">
                <?php require('navbar.php') ?>
                <?php require('log.php') ?>
            </div>
        
        
    </body>
</html>