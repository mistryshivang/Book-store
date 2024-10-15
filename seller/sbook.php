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
    ?>
    
        <td>
            <div class="card">
                <img src="<?php echo '../upload/'.$rw['image']; ?>" alt="Book Image">
                <div class="card-content">
                    <h3>Book Name: <?php echo $rw['bname']; ?></h3>
                    <p>Author: <?php echo $rw['aname']; ?></p>
                    <p>Price: <?php echo $rw['price']; ?></p>
                    <p>Qty : <?php echo $rw['qty']; ?></p>
                    
                    <br>
                    <form action="#" method="post">
                        <button type="submit" name="btnupdate" value='<?php echo $rw['bid']; ?>'>Update</button>
                        
                    </form>
            </div>
    
        </td>

    <?php
        }
    ?>
        </tr>
    </table>

    <?php
        if(isset($_POST['btnupdate']))
        {
            $_SESSION['bid'] = $_POST['btnupdate'];
            $_SESSION['trans'] = "update";
            header("location:updatebook.php");
        }
    ?>
    
    
    