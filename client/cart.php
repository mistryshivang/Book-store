<html>
    <head>
        <?php include('head.php'); ?> 
        <link rel="stylesheet" href="cart.css"> 
        <?php 
             $dc=new DataClass();
             $tqty = 0;
             $total = 0;
             $query="";
             $result="";
             $msg="";
             $regid=$_SESSION['regid'];
        ?>
        
    </head>
    <body>
            <div class="banner">
                <?php require('navbar.php') ?>
                <div class="content">
            <div class="container"> 
                <div id="alerts"></div>
                    <div class="cart-container">
                       <h2>Cart</h2>
                       <table>
                         <thead>
                           <tr>
                           <th><strong>Book</strong></th>
                           <th><strong>Price</strong></th>
                           <th><strong>Unit</strong></th>
                           <th><strong>Total Price</strong></th>
                           <th>   </th>
                         </tr>
                         </thead>
                         <tbody id="carttable">
                         <?php
                            $query="select b.bid as bid ,b.bname as bname,cid,c.qty as qty,b.price as price from cart c, bookdata b where c.bid=b.bid and status = 'pending' and c.regid= $regid";
                            $tb=$dc->getTable($query);
                            
                            while($rw=mysqli_fetch_array($tb))
                            {
                              global $tqty,$total;
                              $tprice = $rw['qty'] * $rw['price'];
                              $tqty += $rw['qty'];
                              $total += $tprice;  
                              ?>
                         
                            <tr>
                                <td><?php echo $rw['bname'] ?></td>
                                <td>₹.<?php echo $rw['price'] ?></td>
                                <td><?php echo $rw['qty'] ?></td>
                                <td>₹.<?php echo $tprice ?></td>
                                <td>
                                  <form method="post">
                                    <input type="hidden" name="bid" value="<?php echo $rw['bid'] ?>">
                                    <input type="hidden" name="qty" value="<?php echo $rw['qty'] ?>">                                    
                                    <input type="hidden" name="cid" value="<?php echo $rw['cid'] ?>">                                    
                                    <button name="btndelete" >Delete </button>
                                  </form></td>
                            </tr>
                          <?php
                            }
                            ?>
                          
                         </tbody>
                       </table>
                       <hr>
                       <table id="carttotals">
                         <tr>
                           <td><strong>Items</strong></td>
                           <td><strong>Total</strong></td>
                         </tr>
                         <tr>
                           <td>No. <span id="itemsquantity"><?php echo $tqty; ?></span></td>
                          
                           <td>₹<span id="total"><?php echo $total; ?></span></td>
                         </tr></table>
                        <div class="cart-buttons"> 
                          <form method="post">
                            
                            <?php
                              if($tqty<1)
                              {
                                echo "<button disabled='disabled'>Checkout</button>";
                              }
                              else {
                               echo "<button name='btncheckout'>Checkout</button>";
                              }
                            
                            ?>
                            
                          </form> 
                       </div>
                     </div>
             </div>
        </div>
            </div>
        
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
    $orderID = uniqid('ORDER_');
    $_SESSION['orderID'] = $orderID;
    // header("location:showcard.php");
    $query = "UPDATE cart SET orderid = '$orderID' WHERE regid = $regid AND status = 'pending'";
    $result = $dc->saveRecord($query);
      
    echo "<script> window.location='showcard.php';</script>";
  
  
  }
?>