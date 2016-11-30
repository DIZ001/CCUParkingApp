<?php
$pagetitle = "Login Confirmation";
require_once "_header.php";
?>
            <p>Thank you for logging in! <a href='login.php'>Return to Login page</a> <a href='logout.php'>Click here to LOGOUT.</p>
            <?php
                echo "<table>
                <tr><th>User ID: </th><td> ". $_SESSION['id'] . "</td></tr>
                <tr><th>User Email: </th><td> ". $_SESSION['email'] . "</td></tr>
                <tr><th>User Status: </th><td> ". $_SESSION['status'] . "</td></tr></table>";
            ?>
<?php
require_once "_footer.php";
?>