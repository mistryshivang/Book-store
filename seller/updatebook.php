<html>
    <head>
        <?php include('head.php'); ?>  
        <link rel="stylesheet" href=".css">   
        <style>

            .form {
                height: 610px;
            width: 700px;
            background-color: rgba(255, 255, 255, 0.03);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 70%;
            border-radius: 10px;
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.1);
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
            margin-top: 10px;
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
                    $bid=$_SESSION['bid'];
                    $query="select * from bookdata where bid='$bid'";
                    $rw=$dc->getrow($query);
                    $bname=$rw['bname'];
                    $aname=$rw['aname'];
                    $image=$rw['image'];
                    $price=$rw['price'];
                    $qty=$rw['qty'];
                }
                    if(isset($_POST['updatebook']))
                    {
                        $bname=$_POST['bname'];
                        $aname=$_POST['aname'];
                        // $image=$_POST['image'];
                        $price=$_POST['price'];
                        $qty=$_POST['qty'];
                        $bid=$_SESSION['bid'];


                        if (isset($_FILES['img1']) && $_FILES['img1']['error'] == 0) {
                            $image = $_FILES['img1']['name']; 
                            $tmpimage = $_FILES['img1']['tmp_name']; 
                            $uploadDir = "../upload/";
                            $uploadFile = $uploadDir . basename($image);
                        
                            $query = "UPDATE bookdata SET bname = '" . $bname . "', aname = '". $aname ."', price = " . $price . ", image = '" . $image . "', qty = ". $qty." WHERE bid = " . $bid;
                            
                            if (move_uploaded_file($tmpimage, $uploadFile)) {
                                // echo '<script>alert("Book added successfully!");</script>';
                            } else {
                                echo '<script>alert("image not selected for this book");</script>';
                    
                            }
                        } else {
                            
                            echo 'No file uploaded or file upload error.';
                            
                            $query = "UPDATE bookdata SET bname = '" . $bname . "', aname = '". $aname ."', price = " . $price . ", qty = ". $qty." WHERE bid = " . $bid;

                        }
                    
                        
                        $result = $dc->saveRecord($query);
                    
                        if ($result) {
                            echo '<script>alert("Book updated successfully!");</script>';
                            header("location:showbook.php");
                        } else {
                            echo '<script>alert("Failed to update the book. Try again.");</script>';
                        }              
                        
                    }
            ?>
    </head>
    <body>
        
            <div class="banner">
                <?php require('navbar.php') ?>
                <div class="content">
                    <div class="form">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <h3>Update Book Details</h3>
                            <label for="book name">Book Name : </label>
                            <input type="text" name="bname" value="<?php echo $bname; ?>">
                                
                            <label for="aname ">Author Name : </label>
                            <input type="text" name="aname" value="<?php echo $aname; ?>">
                            <label for="price">Price</label>
                            <input type="text" name="price" value="<?php echo $price; ?>">
                            <label for="image">Image </label>
                            <input type="file" name="img1" value="<?php echo $image; ?>">
                            <label for="qty">Qty : </label>
                            <input type="text" name="qty" value="<?php echo $qty; ?>">

                            <button name="updatebook">update</button>
                        </form>
                    </div>
                <div>
            </div>
        
    </body>
</html>