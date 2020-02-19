<?php
if (isset($_SESSION["success"])) {
    echo "style='display:none'";
    echo "<script>window.localStorage.clear();</script>";
}
?>>