<?php
$sqlTable = $_GET['table'];
if(sqlTable == 'TBL_StudentData') {
    $sqlCommand = "INSERT INTO $sqlTable (UID, Strand, Section) VALUES ($_GET['uid'], $_GET['strand'], $_GET['section'])";
} elseif(sqlTable == 'TBL_PretestAnswers' || sqlTable == 'TBL_PosttestAnswers') {
    $sqlCommand = "INSERT INTO $sqlTable (UID, Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10) VALUES ($_GET['uid'], $_GET['q1'], $_GET['q2'], $_GET['q3'], $_GET['q4'], $_GET['q5'], $_GET['q6'], $_GET['q7'], $_GET['q8'], $_GET['q9'], $_GET['q10'])";
} else {
    echo 'error: no table';
}
print_r($sqlCommand);
try {
    $conn = new PDO("sqlsrv:server = tcp:matturns.database.windows.net,1433; Database = Matturns", "matturns_admin", "ap#rvBNFTi7KpZ");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $stmt = $conn->prepare($sqlCommand);
        $stmt->execute();
    
        $results = $stmt->fetchAll();
    
        print_r($results);
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