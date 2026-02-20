<?php
require 'process.php';

// Process form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_task'])) {
