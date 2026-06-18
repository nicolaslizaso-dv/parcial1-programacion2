<?php
Usuario::logout();
header("Location: index.php?sec=home");
exit();