<?php

//setting error reporting

ini_set('display_errors', 'On');
error_reporting(E_ALL);
$dsname = 'mysql:dbname=nmd33;host=sql2.njit.edu';
$user = 'nmd33';
$password = 'uphill58';
try {
                $db = new PDO($dsname, $user, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connection successfull! <br>';
} catch (PDOException $e) {

                echo 'Connection failed!: ' . $e->getMessage() . '<br>';

}

try {
                $statement = $db->prepare("SELECT * FROM accounts where id<6");
                $statement->execute();
                $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
                $result = $statement->fetchAll();
                }

catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();

}
echo '  Accounts table returned this records: are ' ;
print_r(count($result));
echo '<br>';
   echo '<table border="3">';
 echo '<tr><th>id</th><th>email</th><th>fname</th><th>lname</th><th>phone</th><th>birthday</th><th>gender</th><th>password</th></tr>';
foreach ($result as $row)

{
    echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['email'].'</td>';
        echo '<td>'.$row['fname'].'</td>';
        echo '<td>'.$row['lname'].'</td>';
        echo '<td>'.$row['phone'].'</td>';
        echo '<td>'.$row['birthday'].'</td>';
        echo '<td>'.$row['gender'].'</td>';
        echo '<td>'.$row['password'].'</td>';
    echo '</tr>';
}
echo '</table>';
?>