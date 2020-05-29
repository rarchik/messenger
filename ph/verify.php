<?php

    $log_che = $_POST["login"];
    $pass_che = $_POST["pass"];

    $link = mysqli_connect("localhost", "root", "usbw", "first");

    $sql = "SELECT * FROM `test` WHERE `login` = '" . $log_che . "'";
    $result = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($result);

    if ($result['login'] == $log_che and $result['password'] == $pass_che) {
        session_start();
        $_SESSION['id'] = $result['id'];
        ?><script type="text/javascript">
        window.location.href = 'profile.php'
        </script>
        <?php
    }
    else {
        ?><script type="text/javascript">
            window.location.href = 'index.php'
            div = document.getElementById("infapas")
            div.innerHTML ='<p class= "infapasst">Вы ввели неправельный логин или пароль</p>'
        </script><?php 
    }


?>