<?php
session_start();
if(isset($_POST["reset"])){
    session_unset();
}

if(isset($_POST["low"])){
    $_SESSION["bet"] = rand(-25, 100);
    $_SESSION["risk"] = "Low Risk";
}else if(isset($_POST["moderate"])){
    $_SESSION["bet"] = rand(-100, 1000);
    $_SESSION["risk"] = "Moderate Risk";
}else if(isset($_POST["high"])){
    $_SESSION["bet"] = rand(-500, 2500);
    $_SESSION["risk"] = "High Risk";
}else if(isset($_POST["severe"])){
    $_SESSION["bet"] = rand(-3000, 5000);
    $_SESSION["risk"] = "Severe Risk";
}

if($_SESSION["chance"] > 0){
    $_SESSION["money"] = $_SESSION["money"] + $_SESSION["bet"];
    $_SESSION["chance"] = $_SESSION["chance"] - 1;
}

if($_SESSION["chance"] <= 0){
    $_SESSION["messages"][] = "<p>GAME OVER!</p>";
}else if($_SESSION["chance"] < 10){
    $class = ($_SESSION["chance"] <= 0)?"":($_SESSION["bet"] > 0)?"success":"danger";
    $_SESSION["messages"][] = "<p class='".$class."'>[".$_SESSION["datetime"]."] You pushed ".$_SESSION['risk'].". Value is ".$_SESSION['bet'].". Your current money now is ".$_SESSION['money']." with ".$_SESSION["chance"]." chance(s) left.</p>";
}


header("Location: index.php");
?>