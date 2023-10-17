<?php
require __DIR__ . '/../Config/RedirectIfAuth.php';
session_destroy();
header("Location: http://gate.test/?action=login");
