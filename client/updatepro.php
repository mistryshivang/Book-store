<html>
    <head>
        <?php include('head.php'); ?>
        <style>

            .form {
                height: 580px;
                width: 700px;
                background-color: rgba(255, 255, 255, 0.447);
                position: absolute;
                transform: translate(-50%, -50%);
                top: 50%;
                left: 70%;
                border-radius: 10px;
                backdrop-filter: blur(15px);
                border: 2px solid rgba(255, 255, 255, 0.043);
                box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
                padding: 10px 35px;
                margin-top: 7%;
            }
            .form * {
                font-family: "Poppins", sans-serif;
                color: black;
                letter-spacing: 0.5px;
                outline: none;
                border: none;
            }

            label {
                display: block;
                margin-top: 30px;
                font-size: 16px;
                font-weight: 500;
            }
            input {
                display: block;
                height: 50px;
                width: 100%;
                background-color: rgba(255, 255, 255, 0.05);
                border-radius: 3px;
                border: 2px solid black;
                padding: 0 10px;
                margin-top: 8px;
                font-size: 14px;
                font-weight: 300;
            }
            ::placeholder {
                color: black;
            }

            input:hover{
                outline: 2px solid #0001;
            }
            button {
                margin-top: 50px;
                width: 100%;
                background-color: #ffffff;
                color: #080710;
                padding: 15px 0;
                font-size: 18px;
                font-weight: 600;
                border-radius: 5px;
                border: 2px solid rgb(36, 198, 243);
                cursor: pointer;
            }
            body{
                background-image: url(../image/bg2.jpg);
            }
        </style>
        <?php 
            $dc=new DataClass();
                    $regid="";
                    $name="";
                    $email="";
                    $password="";
                    $address="";
                    $query="";
                    $result="";
                    $msg="";
        ?>
        <?php 
            if($_SESSION['trans']=='update')
            {
                $regid=$_SESSION['regid'];
                $query="select * from users where regid='$regid'";
                $rw=$dc->getrow($query);
                $name=$rw['name'];
                $email=$rw['email'];
                $password=$rw['password'];
                $address=$rw['address'];
            }
                if(isset($_POST['updatepro']))
                {
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $address=$_POST['address'];
                                                                                                                                       
                   
                    $regid=$_SESSION['regid'];
                    $query = "UPDATE users SET name = '" . $name . "', email = '" . $email . "', password = '" . $password . "', address = '". $address."' WHERE regid = " . $regid;
                    $result=$dc->saveRecord($query);
                    if($result)
                    {
                       
                        header('location:profile.php');
                    }
                    else
                    {
                        $msg="Record not Save...";
                    }
                    
                    
                }
        ?>


    </head>
    <body>
        
            <div class="banner">
                <?php require('navbar.php') ?>
                <div class="content">
                    <div class="form">
                        <form action="#" method="post">
                            <h3>Update Profile</h3>
                            <label for="username">Username</label>
                            <input type="text" name="name" value="<?php echo $name; ?>">
                                
                            <label for="email">Email-id</label>
                            <input type="email" name="email" value="<?php echo $email; ?>">
                            <label for="password">Password</label>
                            <input type="text" name="password" value="<?php echo $password; ?>">
                            <label for="Address">Address </label>
                            <input type="text" name="address" value="<?php echo $address; ?>">
                            
                            <button name="updatepro">update</button>
                        </form>
                    </div>
                <div>
            </div>
        
    </body>
</html>