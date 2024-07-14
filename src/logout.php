<?php
include "../inc/connect.inc";

session_start();
session_destroy();

header("location: /");
exit;
