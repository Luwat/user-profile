<?php
    require 'db.php';
    $message = '';
    if (isset($_POST['name']) && isset($_POST['address']) && 
        isset($_POST['email']) && 
            isset($_POST['phone_number'])) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone_number = $_POST['phone_number'];

                $sql = 'INSERT INTO profile(name, address, email, phone_number) 
                VALUES(:name, :address, :email, :phone_number)';

                $statement = $connection->prepare($sql);
                if ($statement->execute([':name' => $name, ':address' => $address, ':email' => $email, ':phone_number' => $phone_number])) {
                    $message = 'Data inserted successfully';
                }
            }
?>

<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header ">
                <h2>Create Profile</h2>
            </div>
            <div class="card-body">
                <form  method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" id="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone-number">Phone Number:</label>
                        <input type="number" name="phone_number" id="phone_number" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-info">Create Profile</button>
                        
                    </div>
                </form>
                <?php if (!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
    </div>
<?php require 'footer.php'; ?>