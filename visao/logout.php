<?php

session_start(); //iniciamos a sessão que foi aberta
session_destroy(); //pei!!! destruimos a sessão ;)
session_unset();

  header('location:http://localhost/newbatutoriais/index.php');



