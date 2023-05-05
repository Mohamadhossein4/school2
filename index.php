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
        <th>delete</th>
        <th>edit</th>

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
  <td><a href='delete.php?id=" . $a['stud_id'] . "&&page=2'>delete</a> </td>
    <td><a href='edit.php?id=" . $a['stud_id'] . "&&page=2'>edit</a> </td>
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
<?php
$query = "SELECT * FROM student WHERE student=" . $id;
$result = $db->prepare($query);
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);
if (isset($_POST['submit2'])) {
    $name = $_POST['name1'];
    $family = $_POST['family1'];
    $id = $_POST['id1'];
    $query = "UPDATE student SET name='" . $name . "'" . ",family='" . $family . "'" . ",id=" . $id . " WHERE student=" . $id;
    $edit = $db->prepare($query);
    $edit->execute();
}