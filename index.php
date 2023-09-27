<?php
session_start();
require_once('lib/common.php');
?>
<?php
if (isset($_POST['submit'])) {
    $emailAddress = $_POST['email'];
    $password = $_POST['password'];
    $userName = $_POST['userName'];
    $fileName = basename($_FILES['fileToUpload']['name']);
    if (!empty($emailAddress) && !empty($password) && !empty($fileName)) {
        $targetDirectory = "uploads/"; // Directory where uploaded files will be stored
    $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
        $tmpfile = $_FILES['fileToUpload']['tmp_name'];
        $errorInfo = $_FILES['fileToUpload']['error'];
        $fileSize = $_FILES['fileToUpload']['size'];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if ($fileType == 'jpg' || $fileType == 'jpeg' || $fileType == 'pdf') {
            if ($fileSize < 500000) {
                move_uploaded_file($tmpfile, "uploads/". $fileName);
                $nameRegx = "/^[A-Za-z\s]*$/";
                $emailRegx = "/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/";
                $passwordRegx = "/\d{4,}$/";
                if (preg_match($emailRegx, $emailAddress) && preg_match($nameRegx, $userName) && preg_match($passwordRegx, $password)) {
                    setcookie('email', $emailAddress);
                    setcookie('name', $userName);
                    setcookie('password', $password);
                    $file = json_decode(file_get_contents('main.json'), true);
                    $file[$emailAddress] = ['name' => $userName, 'email' => $emailAddress, 'password' => $password];
                    file_put_contents('main.json', json_encode($file, JSON_PRETTY_PRINT));
                    $_SESSION['Login'] = true;
                    header("Location:login.php?file=" . urlencode(basename($targetFile)));
                    // echo "<p><a href='download.php?file=" . urlencode(basename($targetFile)) . "'>Download File</a></p>";
                }
                if (!(preg_match($emailRegx, $emailAddress))) {
                    $emailError = 'Your entered email Formate is incorrect';
                }
                if (!(preg_match($nameRegx, $userName))) {
                    $nameError = 'Your entered Name Formate is incorrect it must contain minmum 4 letter';
                }
                if (!preg_match($passwordRegx, $password)) {
                    $passwordError = 'Password Have at least four number';
                }
            } else {
                $fileError = 'size ismore than 5gb';
            }
        } else {
            $fileError = 'only jpg,jpeg and pdf allowed';
        }
       
        
    } else {
        $error = 'Please fill all the details';
    }
}
?>
<main>
    <div class='container-fluid'>
        <h3 class='text-center'>
            Welcome user Today is <?php echo date('d/m/y'); ?> And current time is<?php echo date('h:i:sa'); ?>
        </h3>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <form action='' method='post' enctype='multipart/form-data'>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email address</label>
                        <input type="email" id="email" name='email' value="<?php echo $_POST['email']; ?>" class="form-control" />
                        <span class='my-2 text-danger'><?php echo $emailError; ?></span>
                    </div>
                    <!-- User Name -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="userName">User Nmae</label>
                        <input type="text" id="userName" name='userName' value="<?php echo $userName ?>" class="form-control" />
                        <span class='my-2 text-danger'><?php echo $nameError; ?></span>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" name='password' value="<?php echo $password; ?>" class="form-control" />
                        <span>
                            <p class='text-success'><small>Password has only digits</small></p>
                        </span>
                        <span class='my-2 text-danger'><?php echo $passwordError; ?></span>
                    </div>
                    <!-- upload file -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="file">Upload File</label>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <span class='my-2 text-danger'><?php echo $fileError; ?></span>
                    </div>

                    <!-- Submit button -->
                    <button class="btn btn-primary mt-4" type="submit" name='submit' id='submit'>Submit</button>
                </form>
                <span class='my-3 mx-3 text-danger'><?php echo $error; ?></span>
            </div>
        </div>
    </div>
</main>
<?php
require_once('lib/footer.php');
?>