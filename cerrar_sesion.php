<?php
SESSION_START();
SESSION_destroy();
echo "see you lather";
header("Location: index.php");
?>
