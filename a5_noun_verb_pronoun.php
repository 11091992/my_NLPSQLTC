<?php 
session_start();
error_reporting(E_ALL & ~E_NOTICE);
?>
<html>	
<body>
<?php
include "connect.php";
$query1=array("select","where",",","class","there","find","by","from","who","to","enter","received","receiving","receives","receive","obtains","obtain","obtaining","obtained","what","in","show","with","then","than","tell","number","no","and","also","me","list","out","which","is","the","a","an","for","are","of","has","having","have","had","been");

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
if(isset($_SESSION['query']))
{
	$query=$_GET['pid'];
	$query=strtolower($query);
	$query=str_replace(array('.', ','), '' , $query);
	$tokens_full = explode(" ",$query);
	$tokens=$tokens_full;
	$length=count($tokens);
	$j=0;
	$length1=count($query1);
	for($i=0;$i<$length;$i++)
	{
		for($k=0;$k<$length1;$k++)
		{
			if($tokens[$i] == $query1[$k])
			{
				$tokens[$i]=0;
			}
		}
	}
	echo "</br><font size='6'><center>Categorizing tokens based on Grammer</br></br>";
	$k=0;
	for($j=0;$j<$length;$j++) 
	{
	?><?php
		if($tokens[$j]!='0')
		{
			$new_array1[$k]=$tokens[$j];			
			$k++;
		}
	}
	?>
	<table border="1" cellpadding="5" cellspacing="0">
	<font size='5'>
	<tr><th>Token</th><th>Speech Tagger</th></tr>
	<?php
	$w=count($new_array1);
	$a=0;
	$b=0;
	$c=0;
	$d=0;
	$e=0;
	$rt=0;
	$er=0;
	$ty=0;
    for($j=0;$j<$w;$j++)
	{
		$flag=0;
		$t=count($new_array3);
		for ($row = 0; $row <$t; $row++) 
		{?><tr>
			<?php
			$length=count($new_array3[$row]);

			for ($col = 0; $col < $length; $col++) 
			{
				if($new_array1[$j]==$new_array3[$row][$col])
				{ ?>
					<td><?php echo $new_array1[$j]; ?></td>
					<td><?php echo $new_array4[$row]; ?></td>
					<?php 
					if($new_array4[$row]=='noun')
					{
						$noun_added[$b]=$new_array1[$j];
						$b++;
						$noun_in_array[$rt]=$new_array3[$row][$col];
						$rt++;
					}
					else
					if($new_array4[$row]=='pronoun')
					{
						$pronoun_added[$c]=$new_array1[$j];
						$c++;	
						$pronoun_in_array[$er]=$new_array3[$row][$col];
						$er++;						
					}
					else
					if($new_array4[$row]=='verb')
					{
						$verb_added[$d]=$new_array1[$j];
						$d++;
						$verb_in_array[$ty]=$new_array3[$row][$col];
						$ty++;
					}
					?>					
					<?php
					$flag=1;
			
						
				}
			}
			?>	</tr>				
			<?php
		}
		if($flag=='0')
		{
			?>
			<tr><td><?php echo $new_array1[$j]; ?></td>
			<td><?php echo "values"; ?></td>
			<td><?php 
			$values_added[$e]=$new_array1[$j];
						$e++;?></td>
			</tr><?php
			$values_1[$a]=$new_array1[$j];
			$a++;
		}					
	}	?></font></table></br><?php
		if(isset($_POST['next4']))
	{
		$query=$_POST['this'];
		header("location: a6_table_attribute_clause.php?pid=$query");	
	}
}
?>
<form id="me" method="post" action="a6_table_attribute_clause.php?pid=<?php echo $query; ?>">
<input type="hidden" name="this" value="<?php echo $query; ?>"/>
<center><input type="submit" name="next4" value="Next"/>
</form>
</body>
</html>