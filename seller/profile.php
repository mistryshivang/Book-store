<html>
    <head>
        <?php include('head.php'); ?>
        <style>
        .profile{
            height: 520px;
            width: 800px;
            background-color: rgb(255, 255, 255);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 40%;
            left: 30%;
            border-radius: 10px;
            backdrop-filter: blur(15px);
            border: 2px solid blanchedalmond;
            box-shadow: 0 0 40px rgba(5, 4, 15, 0.6);
            padding: 50px 35px;
            margin-top: 7%;
        }
        .profile *{
            font-family: "Poppins", sans-serif;
            color: black;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }
        .lebal{
            text-align: left;
            display: block;
            font-size: 16px;
            font-weight: 500;
            background-color: bisque;
            padding: 5px;
        }
        .button1 {
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            border: 2px solid rgb(50, 194, 230);
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
    </head>
    <body>
        <form action="" method="post">
            <div class="banner">
                <?php require('navbar.php') ?>
                <?php require('pro.php') ?>
            </div>
        </form>
        
    </body>
</html>