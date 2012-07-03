<?php
if ($_GET['randomId'] != "3EMgs2DqgJE1G1bH1v9FJ8959EGTaLwhKGY15tlsVIBiTFuhKKfaUCwAiBSade_e") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
