<html>
    <head>
        <?php include('head.php'); ?> 
        <link rel="stylesheet" href="../client/cart.css"> 
        <?php 
             $dc=new DataClass();
             $tqty = 0;
             $total = 0;
             $query="";
             $result="";
             $msg="";
             $regid=$_SESSION['regid'];
            
        ?>
        <?php
            if(isset($_POST['btnback']))
            {
                echo "<script> window.location='history.php';</script>";
            }
        ?>
    </head>
    <body>
    <form method="post">
            <div class="banner">
                <?php require('navbar.php') ?>
                <div class="content">
            <div class="container"> 
                <div id="alerts"></div>
                    <div class="cart-container">
                       <h2>View Details</h2>
                       <table>
                         <thead>
                           <tr>
                           <th><strong>Book</strong></th>
                           <th><strong>Payment Date</strong></th>
                           <th><strong>Price</strong></th>
                           <th><strong>Order Quantity</strong></th>
                           <th><strong>Total Price</strong></th>
                           <th>   </th>
                         </tr>
                         </thead>
                         <tbody id="carttable">
                         <?php
                            $orderID = $_SESSION['orderID'];
                            $query = "SELECT b.bid as bid, b.bname as bname, c.qty as qty, b.price as price, paydate 
                                      FROM cart c, bookdata b 
                                      WHERE c.bid = b.bid AND status = 'success'  AND c.orderid = '$orderID'";
                            $tb = $dc->getTable($query);
                            
                            while ($rw = mysqli_fetch_array($tb)) {
                                $tprice = $rw['qty'] * $rw['price'];
                            ?>
                                <tr>
                                    <td><?php echo $rw['bname'] ?></td>
                                    <td><?php echo $rw['paydate'] ?></td>
                                    <td>₹.<?php echo $rw['price'] ?></td>
                                    <td><?php echo $rw['qty'] ?></td>
                                    <td>₹.<?php echo $tprice ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                          <tr><button name="btnback">BACK</button></tr>
                         </tbody>
                       </table>
                       <hr>
                       
                    </div>
             </div>
        </div>
            </div>
        </form>
    </body>
</html>

<?php

  if(isset($_POST['btndelete']))
  {

        $query = "update bookdata set qty = qty +  ". $_POST['qty'] ." where bid = ". $_POST['bid'];

        // echo $query . "<br>";
        $result=$dc->saveRecord($query);
        if(!$result)
        {
            $msg="Record not Save...";
            return;
        }
        $query = "delete from cart where cid = ". $_POST['cid'];

        // echo $query . "<br>";
        $result=$dc->saveRecord($query);
        if(!$result)
        {
            $msg="Record not Save...";
            return;
        }
        header("location:showbook.php");

  }

  if(isset($_POST['btncheckout']))
  {
    $_SESSION['total'] = $total;
    // header("location:showcard.php");
    echo "<script> window.location='showcard.php';</script>";
  }
?>