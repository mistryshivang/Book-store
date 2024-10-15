<?php
    $regid=$_SESSION['regid'];
    $query="select * from users where regid='$regid'";  
    $rw=$dc->getrow($query);
    
?>
<div class="content">
    <div class="profile">
        <span class="lebal">USER NAME : </span><P><?php echo ($rw['name']); ?></P>
        <span class="lebal">EMAIL ID : </span><P><?php echo ($rw['email']); ?></P>
        <span class="lebal">PASSWORD : </span><p><?php echo ($rw['password']); ?></p>
        <span class="lebal">ADDRESS : </span><p><?php echo ($rw['address']); ?></p>
        <button class="button1" name = "updatepro" >Update</button>
    </div>
</div>
<?php 
 if(isset($_POST['updatepro']))
 {
    $_SESSION['trans']="update";
    header("location:updatepro.php");
 }