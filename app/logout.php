<?php
session_start();
session_destroy();
header('location:../app/pages/signin.php');