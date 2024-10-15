<html>
    <head>
        <?php include('head.php'); ?>
        <link rel="stylesheet" href="../client/cart.css"> 
        <?php 
             $dc=new DataClass();
             $query="";
             $result="";
             $msg="";
             $regid=$_SESSION['regid'];
        ?>
        
        </style>
        <?php
            if(isset($_POST['btnview']))
            {
              $_SESSION['orderID'] = $_POST['orderid'];
              header("location:showdetails.php");
            //   echo "<script> window.location='showdetails.php';</script>";
            }
        ?>
    </head>
    <body>
        <div class="banner">
                <?php require('navbar.php') ?>
                <div class="content">
            <div class="container"> 
                <div id="alerts"></div>
                    <div class="cart-container">
                       <h2>History</h2>
                       <table>
                         <thead>
                           <tr>
                           <th><strong>Order Id</strong></th>
                           <th><strong>Total</strong></th>
                           <th><strong>Trasection Date</strong></th>
                           <th>   </th>
                         </tr>
                         </thead>
                         <tbody id="carttable">
                         <?php
                            $query = "SELECT DISTINCT orderid, total, paydate FROM payment";
                            $tb = $dc->getTable($query);
                            
                            
                            while ($rw = mysqli_fetch_array($tb)) {
                                ?>
                                    <tr>
                                        <td><?php echo $rw['orderid'] ?></td>
                                        <td>₹.<?php echo $rw['total'] ?></td>
                                        <td><?php echo $rw['paydate'] ?></td>
                                        <td>
                                            <form method="post">
                                                <input type="hidden" name="orderid" value="<?php echo $rw['orderid'] ?>">
                                                <button name="btnview" >View Details</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }
                            ?>
                          
                         </tbody>
                       
                        
                     </div>
             </div>
        </div>
            </div>
    </body>
</html>