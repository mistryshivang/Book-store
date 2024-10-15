<html>
    <head>
        <?php include('head.php'); ?>
        <style>
            .form {
            height: 610px;
            width: 700px;
            background-color: rgba(255, 255, 255, 0.03);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 10px 35px;
            margin-top: 7%;
            }
            .form * {
            font-family: "Poppins", sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
            }
            .form h3 {
            font-size: 40px;
            font-weight: 700;
            line-height: 42px;
            text-align: center;
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
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
            }
            ::placeholder {
            color: #e1e1e1;
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
            cursor: pointer;
            }
            body{
                background-image: url(../image/bg2.jpg);
            }
        </style>
        


    </head>
    <body>
            <div class="banner">
                <?php require('navbar.php') ?>
                <?php require('abook.php') ?>
            </div>
        <?php 

$dc = new DataClass(); 
$regid = $_SESSION['regid']; 

$name = $aname = $price = $qty = $image = $tmpimage = "";
$msg = $query = $result = "";

if (isset($_POST['addbook'])) {
    $name = $_POST['name'];
    $aname = $_POST['aname'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    if (isset($_FILES['img1']) && $_FILES['img1']['error'] == 0) {
        $image = $_FILES['img1']['name']; 
        $tmpimage = $_FILES['img1']['tmp_name']; 
        $uploadDir = "../upload/";
        $uploadFile = $uploadDir . basename($image);
    
        $query = "INSERT INTO bookdata (bname, aname, price, image, qty, regid) VALUES ('$name', '$aname', $price, '$image', $qty, $regid)";
        
        if (move_uploaded_file($tmpimage, $uploadFile)) {
            // echo '<script>alert("Book added successfully!");</script>';
        } else {
            echo '<script>alert("image not selected for this book");</script>';

        }
    } else {
        
        echo 'No file uploaded or file upload error.';
        
        $query = "INSERT INTO bookdata (bname, aname, price, qty, regid) 
                  VALUES ('$name', '$aname', $price, $qty, $regid)";
    }

    
    $result = $dc->saveRecord($query);

    if ($result) {
        echo '<script>alert("Book added successfully!");</script>';
    } else {
        echo '<script>alert("Failed to add the book. Try again.");</script>';
    }
}
?>
    </body>
</html>