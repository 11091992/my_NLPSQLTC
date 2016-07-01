<?php 
session_start();
?>
<html>
<body>
<?php
include "connect.php";
$query1=array("select","where",",","class","there","enter","find","by","from","who","to","received","receiving","receives","receive","obtains","obtain","obtaining","obtained","what","in","show","with","then","than","tell","number","no","and","also","me","list","out","which","is","the","a","an","for","are","of","has","having","have","had","been");

$noun=array("student","students","marks","mark","subject","subjects","details","detail","information","data","faculty","taught","faculties","teacher","teachers","professor","professors","roll","registration","name","fname","names","age","year","years","taught","teach","teaches","code","id");
$noun2=array("student","subject","marks","name","subject_code","roll_no","age","taught_by","details");
$pronoun=array("its","it's","their","them","those","whose","his","her","him");
$verb=array("between","range","equal","equals","equalto","exactly","ranges","lies","greater","lesser","lower","below","less","above","more","higher","highest","largest","high","maximum","max","smallest","least","low","minimum","min");
$verb2=array("between","less than","greater than","max","min","equal to");
$clause_array=array();
$name=array("name","names","fname");
$age=array("age","ages","year","years");
$student=array("student","students");
$subject=array("subject","subjects");
$taught_by=array("faculty","faculties","teacher","taught","teach","teaches","teachers","professor","professors");
$roll_no=array("roll","registration","id","enrollment");
$marks=array("mark","marks","scores","score","scored");
$subject_code=array("code","id");

$range=array("between","range","ranges","lies");
$equals=array("equal","equals","equalto","exactly");
$greater_than=array("above","more","higher","greater");
$lower_than=array("lower","below","less","lesser");
$highest=array("highest","largest","high","maximum","max");
$smallest=array("smallest","least","low","minimum","min");
$arraym=array();
$subject_integer=array();
$student_string=array();
$subject_string=array();
$relation_attribute=array();
$attributes=array();
$array_m=array();
$arraym_unique=array();
$array_m_unique=array();
$clause=array();
$array=array();
$tf=array();
$attributes_m=array();
$array_merge=array();
$clause_relation=array();
$attribute_relation=array();
$attribute_added2=array();
$attribute_relation2=array();
$ert=array();
$details=array("details","detail","information","data");
$student_integer=array("roll_no","marks","age");
$new_array2=array("noun","pronoun","name","above","greater","below","highest","smallest","roll_no","BETWEEN","equals","marks","taught_by","subject_code","details");
$new_array4=array("noun","pronoun","verb");
$student_table=array("roll_no","name","age","subject_code","marks","details");
$table_values=array("student","subject");
$subject_table=array("name","taught_by","subject_code","details");
$verb2_symbols=array("BETWEEN", "<", ">", "MAX", "MIN","=");
$quantity_attribute=array("marks","age");
$ambiguous=array("name","id","details");
$name_ambiguity=array("name","taught_by");
$id_ambiguity=array("roll_no","subject_code");
$details_ambiguity=array("student","subject");
$ambiguos_array=array($name_ambiguity,$id_ambiguity,$details);
$integer_attributes=array($student_integer,$subject_integer);
$string_attributes=array($student_string,$subject_string);
$new_array3=array($noun,$pronoun,$verb);
$new_array=array($noun,$pronoun,$name,$greater_than,$lower_than,$highest,$smallest,$roll_no,$range,$equals,$marks,$taught_by,$subject_code,$details);
$noun1=array($student,$subject,$marks,$name,$subject_code,$roll_no,$age,$taught_by,$details);
$verb1=array($range,$lower_than,$greater_than,$highest,$smallest,$equals);
$table=array($student_table,$subject_table);
//$student_table1=array($roll_no,$name,$age,$subject_code,$marks);
//$subject_table1=array($name,$taught_by,$subject_code);

if(isset($_SESSION['query'])){
	//$query=$_SESSION['query'];
	$query=$_GET['pid'];
	$query2=strtolower($query);
	$tokens = explode(" ",$query2);
$length=count($tokens);
echo "</br><font size='6'><center>Tokens are";
?><table><?php
for($i=0;$i<=$length-1;$i++){?><tr><td><?php
echo "<font size='4'>".$i.") ". $tokens[$i];?></td></tr><?php
}?>
</table>
<?php
	if(isset($_POST['next2'])){
		$query3=$_POST['this'];
	header("location: a4_escape_words_remove.php?pid=$query3");
}
}
?>
<form id="me" method="post" action="a4_escape_words_remove.php?pid=<?php echo $query; ?>">
<input type="hidden" name="this" id="<?php echo $query; ?>"/>
<center><input type="submit" name="next2" value="Next"/>
</form>
</body>
</html>