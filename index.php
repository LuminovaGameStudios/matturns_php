<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:matturns.database.windows.net,1433; Database = Matturns", "matturns_admin", "ap#rvBNFTi7KpZ");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>