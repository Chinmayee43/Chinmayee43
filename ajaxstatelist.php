<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
include("databaseconnection.php");
?>
<div class="container">
State <br>
    <div id='loadajaxstate'>
    <select name="state" id="state" >
    </select>
    </div>
</div>
<div id="loading"></div>