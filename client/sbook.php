<?php 
             $dc=new DataClass();
            
             $query="";
             $result="";
             $msg="";
             $regid=$_SESSION['regid'];
                    
?>    
    <table>
    <tr>
    <?php
        $query="select * from bookdata";
        $tb=$dc->getTable($query);
        while($rw=mysqli_fetch_array($tb))
        {
        

        if($rw['qty'] == 0){
            ?>
            <td>
            <div class="card">
                <img src="<?php echo '../upload/'.$rw['image']; ?>" alt="Book Image">
                <div class="card-content">
                    <h3>Book Name: <?php echo $rw['bname']; ?></h3>
                    <p>Author: <?php echo $rw['aname']; ?></p>
                    <p>Price: <?php echo $rw['price']; ?></p>
                    
                    <form method="post">
                        <label for="qty">Qty : </label> <h4 style="color:red">Out of Stoke!!</h4>
                                          
                        <br>
                        <button name="btncart" style="background-color:red"  disabled="disabled">BUY</button>
                        
                    </form>
            </div>
    
        </td>
        <?php }else{ ?>
            <td>
            <div class="card">
                <img src="<?php echo '../upload/'.$rw['image']; ?>" alt="Book Image">
                <div class="card-content">
                    <h3>Book Name: <?php echo $rw['bname']; ?></h3>
                    <p>Author: <?php echo $rw['aname']; ?></p>
                    <p>Price: <?php echo $rw['price']; ?></p>
                    <form method="post">
                        <label for="qty">Qty : </label><input type="number" id="qty" name="qty" value="1" min="1"> 
                        <input type="hidden" name="bid" value="<?php echo $rw['bid']; ?>">                  
                        <input type="hidden" name="qty1" value="<?php echo $rw['qty']; ?>">                  
                 
                        <br>
                        <button name="btncart">BUY</button>
                    </form>
            </div>
    
        </td>
    <?php
        }
        
        }
?>
    </tr>
</table>

<?php
    if(isset($_POST['btncart']))
    {
        $qty = $_POST['qty'];
        $bid = $_POST['bid'];
        $qty1 = $_POST['qty1'];
        $total = $qty1-$qty ; 

        $query = "update bookdata set qty = ". $total ." where bid = ". $bid;

        // echo $query . "<br>";
        $result=$dc->saveRecord($query);
        if(!$result)
        {
            $msg="Record not Save...";
            return;
        }
        // echo "<script> alert(". $qty1 ."); </script>";
        $query = "insert into cart (bid,qty,regid,status) values (".$bid. ",". $qty . ",". $regid.",'pending');";

            // echo $query . "<br>";

            $result=$dc->saveRecord($query);
            if($result)
            {
                header('location:cart.php');
            }
            else
            {
                $msg="Record not Save...";
            }    
    }
?>
    
    
    