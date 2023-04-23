<?php
session_start();
session_unset(); 
header("location: ../".$_GET["src"].".php");