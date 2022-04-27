<?php 

$db="C:\Users\mhend\OneDrive\Documents\School\WDD130\Personal Project\DataSite\DataBase.accdb";
if(!file_exists($db)){
    die("Could Not Find Database File");
}

$db = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=$db; Uid=; Pwd=;");

$sql = "SELECT * FROM Employees";

$result = $db->query($sql);

//echo("<pre>");
//print_r($result->fetchAll());

$row = [];

//$sql = "INSERT INTO Employees (EmployeeName, HireDate, HourlyRate, BenefitStatus) VALUES ('Mitch Coleman','4/26/22',15.12,'RPT')";

//echo($db->exec($sql));

?>

<table>

  <tr>
    <th>Employee ID</th>
    <th>Employee Name</th>
    <th>Hire Date</th>
    <th>Hourly Rate</th>
    <th>Status</th>
  </tr>

  <?php foreach($result->fetchAll() as $key => $row) { ?>
    <tr>
        <th><?php echo $row["EmployeeID"]; ?></th>
        <th><?php echo $row["EmployeeName"]; ?></th>
        <th><?php echo (date_parse($row["HireDate"])["month"]."/".date_parse($row["HireDate"])["day"]."/".date_parse($row["HireDate"])["year"]); ?></th>
        <th><?php echo "$".number_format($row["HourlyRate"],2,".",","); ?></th>
        <th><?php echo $row["BenefitStatus"]; ?></th>
    </tr>
  <?php } ?>

</table>