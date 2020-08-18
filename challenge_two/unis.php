<?php
session_start();
include 'service/API.php';
// connect to database
$pdo = [];
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=nordech_challenge",
        "root",
        "",
        [
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => false,
        ]
    );
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
};
function insertUniversities($data, $pdo) //using external csv file
{
    $id = 1;
    $file = fopen("unis_temp.csv", "w");
    $csv_data = "";
    foreach ($data as $row) {
        $csv_data .= $id . ",";
        $id++;
        $row->domain = json_encode($row->domain); //encoding to json to store as text
        $row->webPage = json_encode($row->webPage);
        foreach ($row as $key => $value) {
            $csv_data .= $value . ", ";
        }
        //remove the last comma
        $csv_data .= "\n";
    }

    fwrite($file, $csv_data); //write to the file

    //let mysql read the file and insert the data
    $query = "load data infile '" . $_SERVER['DOCUMENT_ROOT'] . "/nordech-candidate-technical-test/challenge_two/unis_temp.csv' into table universities FIELDS TERMINATED BY ',' ENCLOSED BY '\"'LINES TERMINATED BY '\\n'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetch();
}
function printUniversities($pdo){
    $api = new API();
    $unis = $api->getUniversities();
    insertUniversities($unis, $pdo);
    $table = "";
    foreach ($unis as $uni) {
        $table .= "<tr>";

        $uni->domain = json_decode($uni->domain)[0]; //decoding json and showing just the first link for sake of simlicity
        $uni->webPage = json_decode($uni->webPage)[0];
        foreach ($uni as $key => $value) {
            $table .= "<td>".$value ."</td>";
        }
        $table .= "</tr>";
    }
        return $table;
    }
if ($_SESSION['login_success'] ?? false == true && $_SESSION['user_found'] ?? false == true) { //checking for the user to be logged in

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge Two</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
    <div class="container">
        <table>
            <tr>
                <th>Website</th>
                <th>Country</th>
                <th>Domain</th>
                <th>Name</th>
            </tr>
            <?=printUniversities($pdo)?>
        </table>
    </div>
</body>

</html>
<?php
}
?>