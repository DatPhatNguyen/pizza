<?php
     // check GET request id param
    include('./config/db_connect.php');
    if(isset($_POST['delete'])) {
        $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);
        $sql = "DELETE from pizzas where id= $id_to_delete";
        if(mysqli_query($conn, $sql)) {
            // success
            header('Location: index.php');
        }
        else {
            // failure
            echo 'query error' .mysqli_error($conn);
        }
    }
     if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn,$_GET['id']);
        // make sql
        $sql = "SELECT * FROM pizzas where id = $id";
        // get the query 
        $result = mysqli_query($conn,$sql);
        //fetch the result in array format
        $pizza = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        mysqli_close($conn);
     }  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Hot</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php  include('./template/header.php'); ?>
    <div class="container text-center detail-container">
        <?php if($pizza): ?>
        <h2>Your Order:</h2>
        <h3><?php echo htmlspecialchars($pizza['title']); ?></h3>
        <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?> </p>
        <p><?php echo date($pizza['created_at']); ?></p>
        <h3>Ingredients</h3>
        <p><?php echo htmlspecialchars ($pizza['ingredients']); ?></p>
        <form action="detail.php" method="POST" class="detail-form">
            <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
            <input type="submit" name="delete" value="Delete" class="btn btn-outline-primary">
        </form>
        <?php else: ?>
        <h5 class="my-4">No such pizza exists</h5>
        <?php endif; ?>
    </div>
    <?php  include('./template/footer.php'); ?>
</body>

</html>