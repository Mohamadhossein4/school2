<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "school2";
$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
?>
    <table border="1">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>family</th>
        </tr>
        <?php
        $query = "SELECT * FROM student";
        $result = $db->prepare($query);
        $result->execute();
        while($a=$result->fetch(PDO::FETCH_ASSOC)){
            echo " 
<tr>
<td>" . $a['id'] . "</td>
<td>" . $a['name'] . "</td>
<td>" . $a['family'] . "</td>
</tr>
";
        }
        ?>
    </table>
    <form method="post">
        <input type="text" name="id" >
        <input type="text" name="name" >
        <input type="text" name="family" >
        <input type="submit" name="submit1" value="run">
    </form>
<?php
if (isset($_POST['submit1'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $family=$_POST['family'];
    $query="INSERT INTO student(id,name,family) values ($id,'$name','$family')";
    $result = $db->prepare($query);
    $result->execute();
}

?>