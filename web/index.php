<?php
	$_REQUEST["no_headers"] = 1;
	include "header.php";

  if ($config["DEVICE_INITIAL_SETUP_COMPLETED"] !== "1") {
    header("Location: wizard.php");
    die;
  }

	header("Location: view.php");
	die;
?>
