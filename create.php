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
            </div>
        </div>
        
    </div>
<?php require 'footer.php'; ?>