<?php
$conn = mysqli_connect('localhost', 'mani1', 'mani2002', 'crms');
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
