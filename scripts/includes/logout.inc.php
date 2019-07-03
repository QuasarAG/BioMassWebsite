<?php

session_start();
session_unset(); //delete variable from session
session_destroy();
header("Location: ../html/home.php");