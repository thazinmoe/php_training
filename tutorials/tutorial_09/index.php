<?php include "php/read.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>ReadPae-Tutorial09</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-warning">
    <div class="container">
        <div class="box">
            <h4 class="display-4 text-center">Read Table Page</h4><br>
            <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET['success']; ?>
                </div>
            <?php } ?>
            <?php if (mysqli_num_rows($result)) { ?>
                <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>                           
                            <th scope="col">Year</th>
                            <th scope="col">Age</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                    
                        while ($rows = mysqli_fetch_assoc($result)) {                      
                        ?>
                            <tr>
                                <th scope="row"><?= $rows['id'] ?></th>
                                <td><?= $rows['name'] ?></td>                               
                                <td><?= $rows['year'] ?></td>
                                <td><?= $rows['age'] ?></td>

                                <td><a href="update.php?id=<?= $rows['id'] ?>" class="btn btn-success">Update</a>
                                <a href="php/delete.php?id=<?= $rows['id'] ?>" class="btn btn-danger">Delete</a>                                   
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
            <div class="link-right">
                <a href="create.php" class="link-primary font-weight-bold mr-5">Create</a>
                <a href="graph.php" class="link-primary font-weight-bold">View graph</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>