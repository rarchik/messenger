<?php

    $log_che = $_POST["login"];
    $pass_che = $_POST["pass"];
    $passc_che = $_POST["passc"];

    if ($pass_che == $passc_che) {
        $link = mysqli_connect("localhost", "root", "usbw", "first");

        $sql = "SELECT `id`FROM `test`";
        $result = mysqli_query($link, $sql);
        $result = mysqli_fetch_array($result);
        $id = count($result) + 1;

        $sql = "INSERT INTO `test`(`id`, `login`, `password`, `name`, `lastname`, `mail`) VALUES (".$id.",'".$log_che."','".$pass_che."','none','none','none')";
        $result = mysqli_query($link, $sql);
        $result = mysqli_fetch_array($result);
        ?>
        <script type="text/javascript">
            window.location.href = '../index.html'
        </script>
        <?php
    }
    else{
        ?>
        <script type="text/javascript">
            window.location.href = '../reg.html'
            div = document.getElementById("err")
            div.innerHTML ='<p class= "err">Пароли не совподают</p>'
        </script>
        <?php
    }



?>