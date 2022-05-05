<?php
    require 'db.php';
    $sql = 'SELECT * FROM profile';
    $statement = $connection->prepare($sql);
    $statement->execute();
    $profile = $statement->fetchAll(PDO::FETCH_OBJ);

?>
<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>All Users</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($profile as $user): ?>
                    <tr>
                        <td><?= $user->id ;?></td>
                        <td><?= $user->name ;?></td>
                        <td><?= $user->address ;?></td>
                        <td><?= $user->email ;?></td>
                        <td><?= $user->phone_number ;?></td>
                        <td>
                            <a href="edit.php?id=<?= $user->id; ?>" class="btn btn-info">Edit</a>
                            <a onclick="return confirm('Are you sure you want to delete this user\'s profile?')" href="delete.php?id=<?= $user->id; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>