<?php
// try {
//     $conn = new PDO("sqlsrv:server = tcp:matturns.database.windows.net,1433; Database = Matturns", "matturns_admin", "ap#rvBNFTi7KpZ");
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     try {
//         $sql = "SELECT * FROM TBL_StudentData";
//         $stmt = $conn->prepare($sql);
//         $stmt->execute();
    
//         $results = $stmt->fetchAll();
    
//         print_r($results);
//     }
//     catch (PDOException $e) {
//         print("Error querying the database.");
//         die(print_r($e));
//     }
    
//     $conn = null;
// }
// catch (PDOException $e) {
//     print("Error connecting to SQL Server.");
//     die(print_r($e));
// }

print_r($_GET['name']);

if($_GET['name'] == 'joel') {
    print_r('is joel');
} elseif ($_GET['name'] == 'test') {
    print_r('this is test');
} else {
    print_r($_GET['name']);
}
?>