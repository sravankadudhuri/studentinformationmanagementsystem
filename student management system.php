<html>
<head>
<title>Student Management System</title>
</head>
<body>
<center><h1>STUDENT INFORMATION MANAGEMENT SYSTEM</h1></center>
<form name="studentinfo" method="post">
Enter Student Name:
<input type="text" name="sname">
<br><br>
Enter Student Age:
<input type="text" name="sage">
<br><br>
Enter Student Branch:
<input type="text" name="sbranch">
<br><br>
Enter Student Current Studying Year:
<input type="text" name="syear">
<br><br>
Enter Student Present Semester:
<input type="text" name="ssemester">
<br><br>
Enter Student Previous semester score in %:
<input type="text" name="sscore">
<br><br>
<center><input type="submit" name="submit" value="SUBMIT"></center>
<br><br>

</form>
<?php

{
$name=$_POST["sname"];
$age=$_POST["sage"];
$branch=$_POST["sbranch"];
$year=$_POST["syear"];
$semester=$_POST["ssemester"];
$score=$_POST["sscore"];
}
$q=mysql_connect("localhost","root"," ");
mysql_createdb($q,"student");
mysql_query("create table studentinfo(sname varchar(25),sage integer,sbranch varchar(5),syear integer,ssemester integer,sscore integer)");
mysql_query("insert into studentinfo values($name,$age,$branch,$year,$semester,$score)");
$query=result_query("select * from studentinfo");
$rows=mysql_num_rows;
?>
<table>
<tr>
<th>
student name
</th>

<th>
student age
</th>

<th>
student branch
</th>

<th>
student year
</th>

<th>
student semester
</th>

<th>
student score
</th>
</tr>
<?php
echo "<center><h1>LISTING ALL STUDENTS </h1></center>"."br";
echo "<tr>"."br";
for($i=0;$i<$rows;$i++)
{
echo "<td>";
echo fetch_query($query[$i]);
echo "</td>";
}
echo "</tr>";
?>
</table>
<table>
<?php
echo "<center><h1>LISTING ALL STUDENTS BASED ON PREVIOUS SEMESTER SCORE</h1></center>"."br";
$w=mysql_connect("localhost","root"," ");
mysql_createdb($w,"student");
$result=result_query("select * from studentinfo order by score");
$num=mysql_num_rows;
?>
<tr>
<th>
student name
</th>

<th>
student age
</th>

<th>
student branch
</th>

<th>
student year
</th>

<th>
student semester
</th>

<th>
student score
</th>
</tr>
<?php
echo "<tr>";
for($i=0;$i<$num;$i++)
{
echo "<td>";
echo fetch_query($result[$i]);
echo "</td>";

}
echo "</tr>"
?>
</table>
</body>
</html>




