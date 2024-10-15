<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="userdata.css">
    <?php include("head.php"); ?>
    <?php 
        $dc=new DataClass();
        $regid=$_SESSION['regid'];
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
    
    <div class="banner">

        <?php include("navbar.php"); ?>
        <video autoplay loop muted plays-inline>
            <source src="../image/bookvideo1.mp4" type="video/mp4">
        </video>
        <div class="content">
            <div class="container"> 
                <div id="alerts"></div>
                    <div class="cart-container">
                       <h2>User Data</h2>
                       <table>
                         <thead>
                           <tr>
                           
                           <th><strong>Email</strong></th>
                           <th><strong>Contect No.</strong></th>
                           <th><strong>Query</strong></th>
                         </tr>
                         </thead>
                         <?php
                            $query = "SELECT * FROM support";
                            $tb = $dc->getTable($query);
                            while ($rw = mysqli_fetch_array($tb)) {
                                ?>

                         <tbody id="carttable">
                            <tr>
                        
                                <td><?php echo $rw['email']; ?></td>
                                <td><?php echo $rw['mob']; ?></td>
                                <td><?php echo $rw['query']; ?></td>
                                <td><button>Response</button></td>
                            </tr>
                            <?php } ?>
                         </tbody>
                       </table>
                       <hr>
                       
                    </div>
                    
                    <div>
                  </div>
             </div>
        </div>
    </div>
</body>
    
</html>