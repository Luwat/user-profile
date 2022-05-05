<?php
    require 'db.php';
    $id = $_GET['id'];
    $sql = 'SELECT * FROM profile WHERE id=:id';
    $statement = $connection->prepare($sql);
    $statement->execute([':id' => $id]);
    $user = $statement->fetch(PDO::FETCH_OBJ);


    if (isset($_POST['name']) && isset($_POST['address']) && 
        isset($_POST['email']) && 
            isset($_POST['phone_number']) && isset($_FILES['image'])) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone_number = $_POST['phone_number'];
                $image = $_FILES['image']['name'];
                $tempname = $_FILES['image']['tmp_name'];
                $folder = 'image/'.$image;
                move_uploaded_file($tempname, $folder);

                $sql = 'UPDATE profile SET name=:name, address=:address, 
                email=:email, phone_number=:phone_number, image=:image WHERE id=:id';

                $statement = $connection->prepare($sql);
                if ($statement->execute([':name' => $name, ':address' => $address, ':email' => $email, ':phone_number' => $phone_number, ':image' => $image, ':id' => $id])) {
                    header('Location: /user-profile/');
                }
            }
?>

<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header ">
                <h2>Update Profile</h2>
            </div>
            <div class="card-body">
                <form  method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" value="<?= $user->name; ?>" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" value="<?= $user->address; ?>" name="address" id="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" value="<?= $user->email; ?>" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone-number">Phone Number:</label>
                        <input type="number" value="<?= $user->phone_number; ?>" name="phone_number" id="phone_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" value="<?= $user->image; ?>" name="image" id="image" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-info">Update Profile</button>
                        
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