<?php
require_once('lib/common.php');
?>
<?php
 $success = 'Thank you for submitting your details are here';
 ?>
 <h3 class='text-success text-center'>
        <?php
        echo $success; ?>
    </h3>
    <?php
    if ($success != '') {

        $a = json_decode(file_get_contents('main.json'), true) ?>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">Sr</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($a as $key => $value) {
                    $sr += 1;
                ?>
                    <tr>
                        <th scope="row"><?php echo $sr; ?></th>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td><?php echo $value['message']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>
    <div class='col-md-4'>
        <button type='button' name='button' class='btn btn-primary text-light' ><a href='task1.php' class='text-light'>Back to Home</a></button>
    </div>
<?php
require_once('lib/footer.php')
?>