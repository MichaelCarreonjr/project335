<?php
    require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
    <title>Document</title>
</head> 
<body>
<div class="card">
  <div class="card-body">
  <section class="new section" id="new">
  <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Order Form</h3>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation" method="POST">

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="fullname" placeholder="Full Name" required>
                               <div class="valid-feedback">Username field is valid!</div>
                               <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="number" name="cellphonenumber" placeholder="Cellphone Number" required>
                                 <div class="valid-feedback">Contact Number field is valid!</div>
                                 <div class="invalid-feedback">Contact Number field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="number" name="quantity" placeholder="Quantity" required>
                                 <div class="valid-feedback">Quantity field is valid!</div>
                                 <div class="invalid-feedback">Quantity field cannot be blank!</div>
                            </div>

                           <div class="col-md-12">
                                <select class="form-select mt-3" name="size" required>
                                      <option selected disabled value="">Select Size</option>
                                      <option value="Small">Small</option>
                                      <option value="Medium">Medium</option>
                                      <option value="Large">Large</option>
                                      <option value="Extra-Large">Extra-Large</option>
                               </select>
                            </div>  
                            

                               <div class="col-md-12">
                                <select class="form-select mt-3" name="product" required>
                                      <option selected disabled value="">Select Product</option>
                                      <option value="Lanyard">Lanyard</option>    
                                      <option value="College Uniform">College Uniform</option>
                                      <option value="Department Polo">Department Polo</option>
                                      <option value="CITE Shirt">CITE Shirt</option>
                                      <option value="Pants">Pants</option>
                                      <option value="Corporate Attire">Corporate Attire</option>
                               </select>
                           </div>
                           <br>

                           <input type="submit" name="submit" value="Submit" class="sign-in_btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>

<?php
include "database.php";

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $cellphonenumber = $_POST['cellphonenumber'];
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];
    $product = $_POST['product'];

    $sql = "INSERT INTO products (fullname, cellphonenumber, quantity, size, product, status) VALUES ('$fullname', '$cellphonenumber', '$quantity', '$size', '$product', 'Pending')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
</body>
</html>
