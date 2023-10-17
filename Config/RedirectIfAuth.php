<?php
session_start();

if (!isset($_SESSION['Token'])){
    header('Location:http://gate.test/?action=login', false);
}

