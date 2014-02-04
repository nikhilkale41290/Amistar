<?php
if ($_GET['randomId'] != "IzJNQnrJbiKRhGb8l5_JB8LAlOE9o7kD33b6h3rs58Sb1eVdL0vzqdKnBdXhKNMg") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
