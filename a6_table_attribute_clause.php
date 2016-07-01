<?php 
session_start();
error_reporting(E_ALL & ~E_NOTICE);
?>
<html>	
<body>
<?php
include "connect.php";
$query1=array("select","where",",","class","there","find","by","enter","from","who","to","received","receiving","receives","receive","obtains","obtain","obtaining","obtained","what","in","show","with","then","than","tell","number","no","and","also","me","list","out","which","is","the","a","an","for","are","of","has","having","have","had","been");

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
	echo "</br><font size='6'><center>Relation, Attributes and Clauses</br></br>";
	$k=0;
	for($j=0;$j<$length;$j++) 
	{
		if($tokens[$j]!='0')
		{
			$new_array1[$k]=$tokens[$j];			
			$k++;
		}
	}
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
		{
			$length=count($new_array3[$row]);

			for ($col = 0; $col < $length; $col++) 
			{
				if($new_array1[$j]==$new_array3[$row][$col])
				{ 
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
					$flag=1;	
				}
			}
		}
		if($flag=='0')
		{
			$values_added[$e]=$new_array1[$j];
			$e++;
			$values_1[$a]=$new_array1[$j];
			$a++;
		}					
	}	
	?>
	<table border="1" cellpadding="5" cellspacing="0">
	<font size='5'><tr><th>Token</th><th>Domain Name</th><th>Domain Type</th></tr>
	<?php	
	$lk=0;
	$er=0;
	$ty=0;
	$jo=0;
	$ro=0;
	$re=0;
	for($ij=0; $ij < count($noun_added); $ij++)
	{
		for($jk=0; $jk < count($noun1); $jk++)
		{ 
			$len=count($noun1[$jk]);
			for($rs=0; $rs < $len; $rs++)
			{ 
				if($noun_added[$ij]==$noun1[$jk][$rs])
				{
					?><tr><td><?php echo $noun_added[$ij]; ?></td>
					<td><?php echo $noun2[$jk];
						$noun2_type[$lk]=$noun2[$jk];
						$noun2_added[$lk]=$noun_added[$ij];			
					?></td><?php
					for($kl=0; $kl<count($table_values); $kl++)
					{
						if($noun2_type[$lk]==$table_values[$kl])
						{ ?> 
							<td><?php echo "Relation Name-".$table_values[$kl]; 
							$relation_added[$er]=$noun2_added[$lk];
							$er++;
							$relation_name[$ty]=$table_values[$kl];
							$ty++;
					?></td></tr>	<?php
						}
					}
					for($km=0;$km<count($table);$km++)
					{ $flag1=0;
						for($lm=0;$lm<count($table[$km]); $lm++)
						{
							if($noun2_type[$lk]===$table[$km][$lm])
							{ ?>
								<td><?php echo "Attribute Name-".$table[$km][$lm]; ?></td></tr>	<?php 
								$attribute_added[$jo]=$noun2_added[$lk];
								$attribute_relation[$re]=$table_values[$km];
								$attribute_name[$ro]=$table[$km][$lm];
								$jo++;
								$ro++;
								$re++;
								$flag1=1;	
							}
						}
						if($flag1=='1')
						{
							break;
						}
					}
					$lk++;			
				}
			}
		}
	}
	$new_a=$new_array1;
	$gf=0;
	$u=0;
	$attribute_added1=$attribute_added;
$jp=0;
for($wq=0;$wq<count($tokens_full);$wq++)
{	$flg3=0;
	if($tokens_full[$wq]==$attribute_added1[$u])
	{
		for($er=0;$er<count($relation_added);$er++)
		{
			if($tokens_full[$wq+1]==='of' && $tokens_full[$wq+2]===$relation_added[$er])
			{
				for($dr=0;$dr<count($relation_added);$dr++)
				{
					if($tokens_full[$wq+3]==='and' && $tokens_full[$wq+4]===$relation_added[$dr])
					{
						for($we=0;$we<count($attribute_added);$we++)
						{		
							if($tokens_full[$wq+4]===$attribute_added1[$we])
							{
								$attribute_added2[$jp]=$attribute_name[$u];
								$attribute_relation2[$jp]=$relation_name[$er];
								$jp++;
								$u++;
								$flg3=1;
							}
						}	
						if($flg3!='1')
						{
							$attribute_added2[$jp]=$attribute_name[$u];
							$attribute_relation2[$jp]=$relation_name[$er];
							$jp=$jp+1;
							$attribute_added2[$jp]=$attribute_name[$u];
							$attribute_relation2[$jp]=$relation_name[$dr];
							$jp++;
							$u++;
							$flg3=1;
						}
					}
				}
				if($flg3!='1')
				{
					$attribute_added2[$jp]=$attribute_name[$u];
					$attribute_relation2[$jp]=$relation_name[$er];
					$jp++;
					$u++;
					$flg3=1;
					break;
				}	
			}
			else
			if($tokens_full[$wq-1]===$relation_added[$er])
			{	
				$attribute_added2[$jp]=$attribute_name[$u];
				$attribute_relation2[$jp]=$relation_name[$er];		
				$jp++;
				$u++;
				$flg3=1;	
			}
		}
		for($edr=0;$edr<count($attribute_added1);$edr++)
		{
			if($tokens_full[$wq+1]==='of' && $tokens_full[$wq+2]===$attribute_added1[$edr])
			{
			$attribute_added2[$jp]=$attribute_name[$edr];
			$attribute_relation2[$jp]=$relation_name[$edr];
			$jp++;
			$u++;
			$flg3=1;	
			}
		}	
		for($r=0;$r<count($verb_added);$r++)
		{
			if($tokens_full[$wq+1]==='of' && $tokens_full[$wq+2]===$attribute_added1[$edr])
			{
				$attribute_added2[$jp]=$attribute_name[$edr];
				$attribute_relation2[$jp]=$relation_name[$edr];
				$jp++;
				$u++;
				$flg3=1;	
				}
			}	
		for($w=0;$w<count($new_array1);$w++)
		{	
			if($new_aaray1[$w]===$attribute_added[$u])
			{			
				for($f=0;$f<count($verb_added);$f++)
				{
					if($new_array1[$w+1]===$verb_added[$f])
					{
						$flg3=1;
						$u++;
					}
				}
			}
		}
		for($w=0;$w<count($new_array1);$w++)
		{	
			if($new_aaray1[$w]===$attribute_added1[$u])
			{
				for($f=0;$f<count($values_added);$f++)
				{
					if($new_array1[$w+1]===$values_added[$f])
					{
						$flg3=1;
						$u++;
					}
				}
			}
		}	
		if($flg3!='1')
		{
			$attribute_added2[$jp]=$attribute_name[$u];
			$attribute_relation2[$jp]=$attribute_relation[$u];
			$jp++;
			$u++;
			$flg3=1;
		}
	}
}
	$flg=0;
	$yu=0;
	$abc=0;
	$kl=0;
	$rew=0;
	for($i=0; $i<count($verb_added); $i++)
	{
		for($k=0; $k<count($verb1); $k++)
		{
			for($r=0;$r<count($verb1[$k]);$r++)
			{
				if($verb_added[$i]==$verb1[$k][$r])
				{
					$verb_added_type[$yu]=$verb2[$k];
					?><tr><td><?php echo $verb_added[$i]; ?></td>
					<td><?php echo $verb2[$k]; ?></td>
					<td><?php echo "WHERE clause-".$verb2[$k]; ?></td></tr>	<?php
					if($verb2[$k]==='max')
					{
						for($dgh=0; $dgh<count($new_array1); $dgh++)
						{
							if($new_array1[$dgh]===$verb_added[$i])
							{
								for($tuy=0; $tuy<count($attribute_added); $tuy++)
								{
									for($df=0;$df<count($quantity_attribute);$df++)
									{
										if($attribute_added[$tuy]===$quantity_attribute[$df])
										{
											if(($attribute_added[$tuy]===$new_array1[$dgh-1]) ||($attribute_added[$tuy]===$new_array1[$dgh+1])||($attribute_added[$tuy]===$new_array1[$dgh-2]) ||($attribute_added[$tuy]===$new_array1[$dgh+2]))
											{	
												$attributes_m[$rew]=$attribute_name[$tuy];
												$ruy="MAX(".$attribute_name[$tuy].")";
												$attributes[$abc]=$ruy;
												$relation_attribute[$kl]=$attribute_relation[$tuy];
												$kl++;
												$rew++;
												$abc++;
												$flg=1;
											}
										}
									}
								}
							}
						}
					}
					if($verb2[$k]==='min')
					{
						for($dgh=0; $dgh<count($new_array1); $dgh++)
						{
							if($new_array1[$dgh]===$verb_added[$i])
							{
								for($tuy=0; $tuy<count($attribute_added); $tuy++)
								{
									for($df=0;$df<count($quantity_attribute);$df++)
									{
										if($attribute_added[$tuy]===$quantity_attribute[$df])
										{
											if(($attribute_added[$tuy]===$new_array1[$dgh-1]) ||($attribute_added[$tuy]===$new_array1[$dgh+1])||($attribute_added[$tuy]===$new_array1[$dgh-2]) ||($attribute_added[$tuy]===$new_array1[$dgh+2]))
											{	
												$attributes_m[$rew]=$attribute_name[$tuy];
												$ruy="MIN(".$attribute_name[$tuy].")";
												$attributes[$abc]=$ruy;
												$relation_attribute[$kl]=$attribute_relation[$tuy];
												$kl++;
												$rew++;
												$abc++;
												$flg=1;
											}
										}
									}
								}
							}
						}
					}
					$yu++;
				}
			}
		}
	}
	$lg=0;
	$rf=0;
	for($i=0; $i<count($pronoun_added); $i++)
	{
		?><tr><td><?php echo $pronoun_added[$i]; ?></td>
		<td><?php echo "pronoun"; ?></td><?php
		for($rty=0;$rty<count($new_array1); $rty++)
		{
			if($new_array1[$rty]===$pronoun_added[$i])
			{
				for($ert=0;$ert<count($relation_added); $ert++)
				{
					for($rfg=$rty; $rfg>=0; $rfg--)
					{
						if($new_array1[$rfg]===$relation_added[$ert])
						{ 
							$found_relation[$ghj]=$relation_added[$ert];
							$fl=1;
							break;
						}
					}
				}
				if($fl=='0')
				{
					for($ert=0;$ert<count($attribute_added); $ert++)
					{
						if($new_array1[$rty+1]===$attribute_added[$ert])
						{
							for($ghj=0; $ghj<count($table);$ghj++)
							{
								for($yu=0;$yu<count($table[$ghj]);$yu++)
								{
									$attribute_added[$ert]===$table[$ghj][$yu];
									$found_relation[$ghj]=$table_values[$ghj];
									$ghj++;
									$fl=1;
								}
							}
						}
					}
				}
			}
		}	
		?><td><?php echo $found_relation[$ghj]; ?></td></tr><?php
	$ghj++;
	}
	$rk=0;
	$re=0;
	$top=0;
	$po=0;
	for($i=0; $i<count($values_added); $i++)
	{
		?><tr><td><?php echo $values_added[$i]; ?></td>
		<td><?php echo "value"; ?></td>
		<td><?php 
		if($values_added[$i])
		{
		if((string)(int)$values_added[$i] === $values_added[$i])
		{ 
			echo "Integer";
			$values_added_integer[$lg]=$values_added[$i];
				for($fgh=count($new_array1); $fgh>0; $fgh--)
				{	
					if($new_array1[$fgh]===$values_added_integer[$lg])
					{
						for($s=0;$s<count($attribute_added);$s++)
						{
							if($new_array1[$fgh-2]===$attribute_added[$s])
							{
								for($g=0;$g<count($verb_added);$g++)
								{
									if($new_array1[$fgh-1]===$verb_added[$g])
									{
										for($e=0;$e<count($verb2_symbols);$e++)
										{
											if($verb_added_type[$g] === $verb2[$e])
											{
												if($verb2_symbols[$e] != 'BETWEEN')
												{
													$ghi=$attribute_name[$s]."".$verb2_symbols[$e]."".$values_added_integer[$lg];
													$clause[$po]=$ghi;
													$po++;
													$clause_attribute[$rk]=$attribute_name[$s];
													$rk++;
													for($oi=$fgh-2;$oi>=0;$oi--)
													{
														for($ui=0;$ui<count($relation_added);$ui++)
														{
															if($new_array1[$oi]===$relation_added[$ui])
															{
																$clause_relation[$re]=$relation_name[$ui];
																$re++;
																break;
															}
														}
													}
												}
											}
										}	
									}
								}
							}
							else if($new_array1[$fgh-1]===$noun_added[$s])
							{
								$gop=$noun2_type[$s]."=".$values_added_integer[$lg];
								$clause[$po]=$gop;
								$po++;
								for($oi=$fgh-1;$oi>=0;$oi--)
								{
									for($ui=0;$ui<count($relation_added);$ui++)
									{
										if($new_array1[$oi]==$relation_added[$ui])
										{
											$clause_relation[$re]=$relation_name[$ui];
											$re++;
											break;
										}
									}
								}
								for($oi=$fgh-1;$oi>=0;$oi--)
								{
									for($ui=0;$ui<count($attribute_added);$ui++)
									{
										if($new_array1[$oi]==$attribute_added[$ui])
										{
											$clause_attribute[$rk]=$attribute_name[$ui];
											$rk++;
											break;
										}
									}
								}
							}
						}
						if((string)(int)$new_array1[$fgh-1] === $new_array1[$fgh-1])
						{
							for($s=0;$s<count($attribute_added);$s++)
							{
								if(($new_array1[$fgh-3]===$attribute_added[$s]) || ($new_array1[$fgh-4]===$attribute_added[$s]))
								{
									$gip=$attribute_name[$s]." BETWEEN ".$values_added_integer[$lg]." AND ".$values_added_integer[$lg-1];
									$clause[$po]=$gip;
									$po++;
									$clause_relation[$re]=$attribute_relation[$s];
									$re++;
									$clause_attribute[$rk]=$attribute_name[$s];
									$rk++;
									break;
								}						
							}								
						}	
					}				
				}
				$lg++;
		}	
		else
			if((string)(int)$values_added[$i] != $values_added[$i])
		{		$counter=0;
			$flag=0;
			echo "String";
			$values_added_string[$rf]=$values_added[$i];
			for($fgh=count($new_array1); $fgh>=0; $fgh--)
			{
				if($new_array1[$fgh]===$values_added[$i])
				{
					for($s=0;$s<count($attribute_added);$s++)
					{ 
						if($new_array1[$fgh-1]===$attribute_added[$s])
						{ 
							$gip=$attribute_name[$s]."=".$values_added[$i];
							$clause[$po]=$gip;
							$po++;
							$flag=1;
							$clause_attribute[$rk]=$attribute_name[$s];
							$rk++;
							for($oi=$fgh-1;$oi>=0;$oi--)
							{
								for($ui=0;$ui<count($relation_added);$ui++)
								{
									if($new_array1[$oi]==$relation_added[$ui])
									{
										$clause_relation[$re]=$relation_name[$ui];
										$re++;
										break;
									}
								}
							}
						}
						elseif($new_array1[$fgh-2]===$noun_added[$s])
						{
							for($ret=0;$ret<count($equals);$ret++)
							{
								if($new_array1[$fgh-1]===$equals[$ret])
								{
									$gip=$noun2_type[$s]."=".$values_added[$i];
									$clause[$po]=$gip;
									$po++;
									$flag=1;
									for($oi=$fgh-2;$oi>=0;$oi--)
									{
										for($ui=0;$ui<count($relation_added);$ui++)
										{
											if($new_array1[$oi]==$relation_added[$ui])
											{
												$clause_relation[$re]=$relation_name[$ui];
												$re++;
												break;
											}
										}
									}
									for($oi=$fgh-2;$oi>=0;$oi--)
									{
										for($ui=0;$ui<count($attribute_added);$ui++)
										{
											if($new_array1[$oi]==$attribute_added[$ui])
											{
												$clause_attribute[$rk]=$attribute_name[$ui];
												$rk++;
												break;
											}
										}
									}
								}
							}
						}
					}
				}
			}
			$rf++;
		}
		else 
			$top=1;
		}
	}
	?></font></table>
	
	<?php
	if($clause){?></br></br>
	<table border="1" cellpadding="5" cellspacing="0">
	<tr><th>Clause</th><th>Relation</th><th>Attribute</th></tr>
	<tr><?php
	for($b=0;$b<count($clause);$b++)
	{
	?>	
	<td><?php echo $clause[$b]; ?></td>
	<td><?php echo $clause_relation[$b]; ?></td>
	<td><?php echo $clause_attribute[$b]; ?></td>
	<?php }	?></tr>
	</table>
<?php }
	else 
	{
		echo "No values";
	}
	?>
	<?php
	if(isset($_POST['next9']))
	{
		$query=$_POST['this'];
		header("location: a7_ambiguity.php?pid=$query");	
	}
}
?>
<form id="me" method="post" action="a7_ambiguity.php?pid=<?php echo $query; ?>">
<input type="hidden" name="this" value="<?php echo $query; ?>"/>
</br><center><input type="submit" name="next9" value="Next"/>
</form>
</body>
</html>