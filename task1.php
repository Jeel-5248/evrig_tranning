<?php
require_once('lib/common.php');
?>
<?php
                                        //ajax
// $action=$_POST['action'];
// if($action=='submit_data'){
//     $name = htmlspecialchars($_POST['name']);
//     $email = htmlspecialchars($_POST['email']);
//     $message = htmlspecialchars($_POST['message']);
//     if (empty($name)) {
//     $nameError = 'Please Enter Name';
// }
// if (empty($email)) {
//     $emailError = 'Please Enter email';
// }
// if (empty($email)) {
//     $messageError = 'Please Enter Message';
// }
//     if (!empty($name) && !empty($email) && !empty($message)) {
//         $nameRegx = "/^[A-Za-z\s]*$/";
//         $emailRegx = "/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/";
//         if (!preg_match($nameRegx, $name) || !preg_match($emailRegx, $email)) {
//             if (!preg_match($nameRegx, $name)) {
//                 $nameError = 'Please Enter Valid Name';
//             }
//             if (!preg_match($emailRegx, $email)) {
//                 $emailError = 'Please Enter Valid email in formate 123@gmail.com';
//             }
//         } else {
//             $file = json_decode(file_get_contents('main.json'), true);
           
//                 $file[] = ["name" => $name,  "email" => $email, "message" => trim($message)];
//                 file_put_contents('main.json', json_encode($file, JSON_PRETTY_PRINT));
//                 // header("Location: home.php");
//                 // echo 'success';
//                 $success = 'Thank you for submitting your details are here';
//         }
//     }    

//     exit();
// }
                                        //end ajax
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    if (!empty($name) && !empty($email) && !empty($message)) {
        $nameRegx = "/^[A-Za-z\s]*$/";
        $emailRegx = "/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/";
        if (!preg_match($nameRegx, $name) || !preg_match($emailRegx, $email)) {
            if (!preg_match($nameRegx, $name)) {
                $nameError = 'Please Enter Valid Name';
            }
            if (!preg_match($emailRegx, $email)) {
                $emailError = 'Please Enter Valid email in formate 123@gmail.com';
            }
        } else {
            $file = json_decode(file_get_contents('main.json'), true);
           
                $file[] = ["name" => $name,  "email" => $email, "message" => trim($message)];
                file_put_contents('main.json', json_encode($file, JSON_PRETTY_PRINT));
                header("Location: home.php");
                $success = 'Thank you for submitting your details are here';
        }
    }    
    if (empty($name)) {
        $nameError = 'Please Enter Name';
    }
    if (empty($email)) {
        $emailError = 'Please Enter email';
    }
    if (empty($email)) {
        $messageError = 'Please Enter Message';
    }
}
if (isset($_POST['reset'])) {
    $name = '';
    $email = '';
    $message = '';
}
?>
<div class='container-fluid'>
    <form action='home.php' method='post' id='basicForm'>
        <div class='col-md-6'>
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name='name' value="<?php echo $name; ?>" placeholder="Enter your name">
            <span class='text-danger' id='nameError'><?php echo $nameError; ?></span>
        </div>
        <div class='col-md-6'>
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name='email' value="<?php echo $email; ?>" placeholder="Enter your email">
            <span class='text-danger' id='emailError'><?php echo $emailError; ?></span>
        </div>
        <div class='col-md-6'>
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name='message' rows='15' cols='10' placeholder="Enter your message">
            <?php echo $message; ?>
            </textarea>
            <span class='text-danger' id='messageError'><?php echo $messageError; ?></span>
        </div>
        <span class='text-danger' id='error'><?php echo $error; ?></span>
        <div>
            <button class="btn btn-primary mt-4" type="submit" name='submit' id='submit'>Submit</button>
            <button class="btn btn-warning mt-4" type="reset" name='reset' id='reset'>Reset</button>
        </div>
    </form>
</div>
<?php
require_once('lib/footer.php')
?>