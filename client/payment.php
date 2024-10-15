<?php
    session_start();
    include('../class/DataClass.php');
    $dc=new DataClass;
    $regid = $_SESSION['regid'];
    $total = $_SESSION['total'];
    $cardid = $_SESSION['cardid'];
    $currdate = date('Y-m-d');
    $orderID = $_SESSION['orderID'];

    $query = "UPDATE cart SET status = 'success', paydate = '$currdate' WHERE regid = $regid AND orderid = '$orderID'";
    $result = $dc->saveRecord($query);
        if($result)
        {
            $query = "INSERT INTO payment (regid, cardid, total, paydate, orderid) VALUES ($regid, $cardid, $total, '$currdate', '$orderID')";
            $result = $dc->saveRecord($query);
            if($result)
            {
            $payid = $dc->getLastInsertedId();  
            $_SESSION['payid'] = $payid;

            echo '<script>';
            echo 'alert("Successfuly make payment..");';
            echo "window.location='recipt.php';";
            echo '</script>';
            }else{
            echo '<script>';
            echo 'alert("Feild to make payment..");';
            echo '</script>';
            }
            
        }else{
        echo '<script>';
        echo 'alert("Feild to make payment..");';
        echo '</script>';
        }
    

                if(!isset($_SERVER['HTTP_REFERER']))
                {
                   echo "<script> 
                         alert('do not directly go to this page');
                         window.location='../register.php';
                         </script>";
                    exit;
                }
            ?>
