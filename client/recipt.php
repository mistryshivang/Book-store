<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <title>Generat Invoice</title>
    <link rel="stylesheet" href="recipt.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>Book Store Invoice</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>

<?php include('../class/DataClass.php'); ?>
<?php 
    session_start();
    $dc=new DataClass();
    $query="";
    $result="";
    $msg="";
?>
<?php 
    $payid=$_SESSION['payid'];
    $query = "select u.name as name,u.address as address,c.cardnum as cardnum,p.total as total,p.paydate as paydate from users u,card c,payment p where p.regid = u.regid and p.cardid= c.cardid and payid=$payid"; 
    $row = $dc->getrow($query);
?>
</head>
<body>
    <center>
    <form id="form1" action="home.php" method="post">
   
        
        <div id="dvContainer">
            <table class="body-wrap">
                            <tbody><tr>
                                <td></td>
                                <td class="container" width="600">
                                    
                                    <div class="content">
                                        <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                            <tbody><tr>
                                                <td class="content-wrap aligncenter">
                                                    <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                            <td class="content-block">
                                                                <h2>INVOICE</h2>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="content-block">
                                                                <table class="invoice">
                                                                    <tbody><tr>
                                                                        <td><h3>Name : <?php echo $row['name'] ?></h3><br><h3>Address : <?php echo $row['address'] ?></h3><br>Date : <?php echo $row['paydate'] ?><br>Card : <?php echo $row['cardnum'] ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                                                <tbody><tr>
                                                                                    <td>Payment For</td>
                                                                                    <td class="alignright">RS</td>
                                                                                </tr>
                                                                                <tbody><tr>
                                                                                    <td>Books</td>
                                                                                    <td class="alignright">₹<?php echo $row['total'] ?></td>
                                                                                </tr>
                                                                                <tr class="total">
                                                                                    <td class="alignright" width="80%">Total</td>
                                                                                    <td class="alignright">₹<?php echo $row['total'] ?></td>
                                                                                </tr>
                                                                            </tbody></table>
                                                                        </td>
                                                                        </tr>
                                                                    </tbody></table>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </div>
                                    </td>
                                <td></td>
                            </tr>
                        </tbody></table>
                    </div>
                    <div class="row" style="align-content: center;">
                    
                    <div>
                        <input type="button"  value="Download INvoice" id="btnPrint" style="align-items: center;" />
                        <input type="submit"  name="home" value="Back Home"/>
                        
                    </div>

    </div>
    </form>
    </center>
    <style type="text/css">
           

</style>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>
