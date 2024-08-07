<?php

include 'db_connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['userid'];
    $name = $_POST['username'];
    $email = $_POST['useremail'];


    
$sql = "UPDATE users SET `name` = '$name',  `email`= '$email' where id = $id";

$results = $connection->query($sql);
}

$connection->close();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precedural php</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">School Monitor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Users
                            <span class="visually-hidden"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Add User</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
include('db_connect.php');

?>
                    <?php
$sql = ' SELECT * FROM users order by id desc';

$results = $connection->query($sql);

$i =1;
                    while($row = $results->fetch_assoc()):?>

                    <tr class=''>
                        <th><?php echo $i++ ?></th>
                        <td class="myname"><?php echo $row['name'] ?></td>
                        <td class="myemail"><?php echo $row['email'] ?></td>
                        <td>
                            <button type="button" class='btn btn-success'
                                onclick="openEditModal(<?=$row['id']?>, '<?=$row['name']?>', '<?=$row['email']?>')">
                                Edit
                            </button>
                            <button class='btn btn-danger' href="delete.php?id=<?php echo $row['id'] ?>">Delete</button>
                        </td>
                    </tr>

                    <?php endwhile ?>



                </tbody>

            </table>

            <div class="modal" id="mymodal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <input type="hidden" id="userid" value="" name="userid">
                                <label class="form-label">Name</label>


                                <div class="form-group">

                                    <input type="text" name="username" id="username" class="form-control" value="">
                                </div>
                                <label for="">Email</label>

                                <div class="form-group">

                                    <input type="email" name="useremail" id="useremail" class="form-control" value="">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="updateform">Update</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"> </script>

    <script type="text/javascript" src="js/script.js">

    </script>
</body>

</html>
