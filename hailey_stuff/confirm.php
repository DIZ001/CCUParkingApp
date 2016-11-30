<?php
$pagetitle = "Login Confirmation";
require_once "_header.php";
?>
            <p>Thank you for logging in!</p>
            <?php
                echo "<table>
                <tr><th>User ID</th><td> ". $_SESSION['id'] . "</td></tr>
                <tr><th>User Name</th><td> ". $_SESSION['name'] . "</td></tr>
                <tr><th>User Status</th><td> ". $_SESSION['status'] . "</td></tr></table>";
            ?>
<?php
require_once "_footer.php";
?>