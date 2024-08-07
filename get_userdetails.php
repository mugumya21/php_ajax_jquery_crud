<?php 

$servername = 'localhost';
$username = 'root';
$serverpassword = '';
$databasename = 'precedural_php';

$connection  =  mysqli_connect($servername, $username,  $serverpassword, $databasename);

if(!$connection){

    die('connection failed'. mysqli_connect_error());
}



$id = $_POST['id'];

$sql = "SELECT * FROM users where id = '$id'";

$result = $connection->query($sql);
if($row = $result->fetch_assoc()){
echo '
<form method="POST">
    <input type="hidden" value="'.$row['id'].'" name="id">
    <label class="form-label">Name</label>


    <div class="form-group">

        <input type="text" name="name" class="form-control" value="'.$row['name'].'">
    </div>
    <label for="">Email</label>

    <div class="form-group">

        <input type="email" name="email" class="form-control" value="'.$row['email'].'">
    </div>

</form>';

}

?>
