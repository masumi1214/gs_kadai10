<?php
session_start();
echo session_id();//私に割り振られたキー
echo $_SESSION["name"];
echo $_SESSION["url"];
