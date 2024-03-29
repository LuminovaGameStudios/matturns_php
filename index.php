<?php
$sqlTable = $_GET['table'];
$sqlCommand;
if($sqlTable == 'TBL_StudentData') {
    $sqlCommand = "INSERT INTO " . $sqlTable . " (UID, Strand, Section) VALUES (" . $_GET['uid'] . ", " . $_GET['strand'] . ", " . intval($_GET['section']) . ")"; 
} elseif($sqlTable == 'TBL_PretestAnswers' || $sqlTable == 'TBL_PosttestAnswers') {
    $sqlCommand = "INSERT INTO " . $sqlTable . " (UID, Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10) VALUES (" . $_GET['uid'] . ", " . $_GET['q1'] . ", " . $_GET['q2'] . ", " . $_GET['q3'] . ", " . $_GET['q4'] . ", " . $_GET['q5'] . ", " . $_GET['q6'] . ", " . $_GET['q7'] . ", " . $_GET['q8'] . ", " . $_GET['q9'] . ", " . $_GET['q10'] . ")";
} else {
    echo 'error: no table';
}

// echo var_dump($sqlTable) . "<br>";
// echo var_dump($_GET['uid']) . "<br>";
// echo var_dump($_GET['strand']) . "<br>";
// echo var_dump($_GET['section']) . "<br>";

try {
    $conn = new PDO("sqlsrv:server = tcp:matturns.database.windows.net,1433; Database = Matturns", "matturns_admin", "ap#rvBNFTi7KpZ");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $stmt = $conn->prepare($sqlCommand);
         if ($sqlTable == 'TBL_StudentData') {
            $uid = $_GET['uid'];
            $strand = $_GET['strand'];
            $section = intval($_GET['section']);

            $stmt->bindValue(1, $uid);
            $stmt->bindValue(2, $strand);
            $stmt->bindValue(3, $section);

            $stmt->execute();
        } elseif ($sqlTable == 'TBL_PretestAnswers' || $sqlTable == 'TBL_PosttestAnswers') {
            $uid = $_GET['uid'];
            $q1 = $_GET['q1'];
            $q2 = $_GET['q2'];
            $q3 = $_GET['q3'];
            $q4 = $_GET['q4'];
            $q5 = $_GET['q5'];
            $q6 = $_GET['q6'];
            $q7 = $_GET['q7'];
            $q8 = $_GET['q8'];
            $q9 = $_GET['q9'];
            $q10 = $_GET['q10'];

            $stmt->bindValue(1, $uid);
            $stmt->bindValue(2, $q1);
            $stmt->bindValue(3, $q2);
            $stmt->bindValue(4, $q3);
            $stmt->bindValue(5, $q4);
            $stmt->bindValue(6, $q5);
            $stmt->bindValue(7, $q6);
            $stmt->bindValue(8, $q7);
            $stmt->bindValue(9, $q8);
            $stmt->bindValue(10, $q9);
            $stmt->bindValue(11, $q10);

            $stmt->execute();
        }
    }
    catch (PDOException $e) {
        print("Error querying the database.");
        die(print_r($e));
    }
    
    $conn = null;
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>