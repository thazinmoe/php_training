<!DOCTYPE html>
<html>

<head>
    <title>Create Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-warning">
    <div class="container">
        <form action="php/create.php" class="bg-light" method="post">
            <h4 class="display-4 text-center">Create Page</h4>
            <hr><br>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="name">User Name</label>
                <input type="name" class="form-control" id="name" name="name" value="<?php if (isset($_GET['name'])) echo ($_GET['name']); ?>" placeholder="Enter user name">
            </div>         
            <div class="form-group">
                <label for="year">Year</label>
                <input type="name" class="form-control" id="year" name="year" value="<?php if (isset($_GET['year'])) echo ($_GET['year']); ?>" placeholder="Enter your year">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="<?php if (isset($_GET['age'])) echo ($_GET['age']); ?>" placeholder="Enter your age">
            </div>
            <button type="submit" class="btn btn-primary" name="create">Create</button>
            <a href="index.php" class="link-primary">View</a>
        </form>
    </div>
</body>

</html>