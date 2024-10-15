<html>
    <head>
        <?php include('head.php'); ?> 
        <link rel="stylesheet" href="cart.css">
        <?php 
             $dc=new DataClass();
             $query="";
             $result="";
             $msg="";
             $regid=$_SESSION['regid'];
             echo $regid;
        ?>
        <?php
            if(isset($_POST['btnaddcard']))
            {
                header("location:card.php");
            }
            if(isset($_POST['btnpay']))
            {
                $_SESSION['cardid']=$_POST['btnpay'];
                header('location:payment.php');
            }
        ?>
    </head>
    <body>
            <div class="banner">
                <?php require('navbar.php') ?>
                <div class="content">
                    <form method="post">
                    <table>
                        <tr>
                            <td collspan="2"><h3>Saved Cards</h3></td>
                            <td collspan="2"><button name="btnaddcard">Add Card</button></td>
                        </tr>
                        <tr>
                            <?php
                                $query="select * from card where regid=$regid";
                                $tb=$dc->getTable($query);
                                while($rw=mysqli_fetch_array($tb))
                                {
                            ?>
                            <td>
                                <div class="card" style="background-image: linear-gradient( 90.2deg,  rgba(79,255,255,1) 0.3%, rgba(0,213,255,1) 99.8% );color:black;padding:2%;margin-bottom:5%;width:400px;height:150px">
                                        <div class="card-body">
                                            <h3 class="card-title"><?php echo $rw['cardnum']?></h3>
                                            <h4 class="card-text"><?php echo $rw['cardhol']?></h4>
                                            <p class="card-text">expires :<?php echo $rw['exmo']."/".$rw['exye']?></p>
                                            <button name="btnpay"  value="<?php echo $rw['cardid'] ?>">PAYMENT</button>
                                        </div>
                                </div>
                            </td>
                            <?php
                                 }
                            ?>

                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        
    </body>
</html>




<html>
    <head>
        <?php include('head.php'); ?>     
    </head>
    <body>
        <form action="" method="post">
            <div class="banner">
                <?php require('navbar.php') ?>
                <video autoplay loop muted plays-inline>
                    <source src="../image/bookvideo1.mp4" type="video/mp4">
                </video>
                <div class="content">
                    <h1>WELCOME TO <br>Client Side</h1>
                </div>
            </div>
        </form>
    </body>
</html>