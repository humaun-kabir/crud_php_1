<?php

    $conn = mysqli_connect('localhost','root','','stdpro');
    
    if(isset($_POST['btn'])){

        $stdname = $_POST['stdname'];
        $stdreg = $_POST['stdreg'];

        if(!empty($stdname) && !empty($stdreg)){
            $query = "INSERT INTO student(stdname,stdreg) VALUE('$stdname','$stdreg')";

            $createquery = mysqli_query($conn,$query);

            if($createquery){
                echo "your data is inserted";
            }
            
        }else{
            echo "Field should not be empty";
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD PHP</title>
</head>

<body>

    <div class="container shadow m-5 p-3">
        <form action="" method="post" class="d-flex justify-content-around">
            <input class="form-control" type="text" name="stdname" placeholder="Enter your name">
            <input class="form-control" type="number" name="stdreg" placeholder="Enter your REG">
            <input class="btn btn-success" type="submit" value="send" name="btn">
        </form>
    </div>

    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>Std ID</th>
                <th>Std Name</th>
                <th>Reg</th>
                <th></th>
                <th></th>
            </tr>

            <?php
                $query = "SELECT * FROM student";
                $readquery = mysqli_query($conn,$query);
                if($readquery->num_rows > 0){
                    while($read = mysqli_fetch_assoc($readquery)){
                        $stdid = $read['id'];
                        $stdname = $read['stdname'];
                        $stdreg = $read['stdreg'];
                    


            ?>

            <tr>
                <td><?php echo $stdid; ?></td>
                <td><?php echo $stdname; ?></td>
                <td><?php echo $stdreg; ?></td>
                <td></td>
                <td></td>
                
            </tr>

            <?php } } else{
                echo "No data to show";
            } ?>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    
</body>

</html>

