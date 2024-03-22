<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <br> <br>
    <div class="card text-center">
        <div class="card-header">
            CUSTOMER'S ORDER
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text"></p>
            <!-- <a href="#" class="btn btn-primary">Add Product</a> -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Cellphone Number</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Size</th>
                            <th scope="col">Products</th>
                            <th scope="col">Status</th> 
                           <th scope="col">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          require_once 'databases.php';

                            if (isset($mysqli)) {
                                $sql = "SELECT * FROM products";
                                if ($result = $mysqli->query($sql)) {
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_array()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['fullname'] . "</td>";
                                            echo "<td>" . $row['cellphonenumber'] . "</td>";
                                            echo "<td>" . $row['quantity'] . "</td>";
                                            echo "<td>" . $row['size'] . "</td>";
                                            echo "<td>" . $row['product'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";

                                          //  echo "<td>";

                                       echo  '<td> 
                                       <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                         <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="submit" value="Submit">Status</button>
                                         <div class="dropdown-menu">
                                           <a class="dropdown-item" href="pending.php">Pending</a>
                                           <a class="dropdown-item" href="cancel.php">Cancel</a>
                                           <a class="dropdown-item" href="claim.php">Claim</a>
                                         
                                         </div>
                                       </div>
                                     
                                             </td>';

                                            // Action buttons
                                           //echo '<td>
                                                  // <a href="update.php?id=' . $row['id'] . '" class="btn btn-info mr-3" title="Update Record" data-toggle="tooltip">
                                                    //   <span class="fa fa-pencil"></span> Update
                                                  //  </a>
                                                 //  <a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger" title="Delete Record" data-toggle="tooltip">
                                                    //    <span class="fa fa-trash"></span> Delete
                                                 //   </a>
                                                 //  </td>';
                                            
                                            echo "</tr>";

                                        }
                                        $result->free();
                                    } else {
                                        echo '<tr><td colspan="7" class="text-center">No records found</td></tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="7" class="text-center">Error executing query</td></tr>';
                                }
                                $mysqli->close();
                            } else {
                                echo '<tr><td colspan="7" class="text-center">Database connection error</td></tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
  <!--      <div class="card-footer text-muted">
            Footer
        </div> -->
    </div>

    <?php
include "database.php";

if (isset($_POST['submit'])) {
    $status = $_POST['status'];
    //$cellphonenumber = $_POST['cellphonenumber'];
    //$quantity = $_POST['quantity'];
    //$size = $_POST['size'];
    //$product = $_POST['product'];

    $sql = "INSERT INTO products (status) VALUES ('$status')";
    if ($conn->query($sql) === TRUE) {
        //header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

</body>
</html>
