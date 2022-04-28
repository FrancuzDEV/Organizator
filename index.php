<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizator</title>
    <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <center>
        <br><br>
        <h2>Lista Rzeczy do zrobienia 😉</h2>
        <div class="line"></div>
        <br><br>
    <?php
        session_start();
        include 'App/main.inc.php';
        function getIpAddress()
        {
            $ipAddress = '';
            if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
                // to get shared ISP IP address
                $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
            } else if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                // check for IPs passing through proxy servers
                // check if multiple IP addresses are set and take the first one
                $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                foreach ($ipAddressList as $ip) {
                    if (! empty($ip)) {
                        // if you prefer, you can check for valid IP address here
                        $ipAddress = $ip;
                        break;
                    }
                }
            } else if (! empty($_SERVER['HTTP_X_FORWARDED'])) {
                $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
            } else if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
                $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
            } else if (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
                $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
            } else if (! empty($_SERVER['HTTP_FORWARDED'])) {
                $ipAddress = $_SERVER['HTTP_FORWARDED'];
            } else if (! empty($_SERVER['REMOTE_ADDR'])) {
                $ipAddress = $_SERVER['REMOTE_ADDR'];
            }
            return $ipAddress;
        }
        $ip = getIpAddress();
        $object = new Api;
        $object->SelectAllObjects($ip);
    ?>
    <br><br>
    <h2>Zrobione 😉</h2>
    <div class="line"></div>
    <?php
        $ip = getIpAddress();
        $object->SelectAllObjectsDo($ip);
    ?>

        <br>
        <h2>Dodaj Rzecz do zrobienia</h2>
        <br><br>
        <div class="line"></div><br>
        <form action="App/add.php" method="post">
            <input type="text" name='cel' require placeholder="Wpisz Cel"></input><br><br>
            <button type='submit'>Potwierdź</button>
            <br><br>
        </form>

    </center>
</body>
</html>