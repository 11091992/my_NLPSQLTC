<?php 
session_start();
error_reporting(E_ALL & ~E_NOTICE);
?>
<html>	
<body>
<?php
include "connect.php";
$query1=array("select","where",",","class","there","enter","find","by","from","along","who","to","received","studying","studies","study","receiving","receives","receive","obtains","obtain","obtaining","obtained","what","in","show","with","then","than","tell","number","no","and","also","me","list","out","which","is","the","a","an","for","are","of","has","having","have","had","been");

$noun=array("student","students","marks","mark","subject","subjects","subjectwise","details","detail","information","data","faculty","taught","faculties","teacher","teachers","professor","professors","roll","registration","name","fname","names","age","year","years","taught","teach","teaches","code","id");
$noun2=array("student","subject","teacher","marks","name","subject_code","roll_no","age","taught_by","details");
$pronoun=array("its","it's","their","them","those","whose","his","her","him");
$verb=array("between","range","equal","equals","equalto","exactly","ranges","lies","count","greater","lesser","lowest","lower","below","less","above","more","higher","highest","largest","high","maximum","max","smallest","least","low","minimum","min");
$verb2=array("between","less than","greater than","max","min","equal to");
$taught_by_ambiguity=array("taught_by","name","subject_code");
$many_string=array($taught_by_ambiguity);
$clause_array=array();
$student_fv=array();
$subject_fv=array();
$teacher_fv=array();
$clause_many_array=array();
$clause_many=array();
$name=array("name","names","fname");
$age=array("age","ages","year","years");
$student=array("student","students");
$subject=array("subject","subjects","subjectwise");
$teacher=array("teacher","faculty","professor","professors","faculties");
$taught_by=array("taught","teaches");
$roll_no=array("roll","registration","id","enrollment");
$marks=array("mark","marks","scores","score","scored");
$subject_code=array("code","id","teach","teaches");
$clause_many_array=array();
$relation_name=array();
$range=array("between","range","ranges","lies");
$equals=array("equal","equals","equalto","exactly");
$greater_than=array("above","more","higher","greater");
$lower_than=array("lower","below","less","lesser");
$highest=array("highest","largest","high","maximum","max","count","top");
$smallest=array("smallest","least","lowest","low","minimum","min","count","top");
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
$student_integer=array("roll_no","marks");
$new_array2=array("noun","pronoun","name","above","greater","below","highest","smallest","roll_no","BETWEEN","equals","marks","taught_by","subject_code","details");
$new_array4=array("noun","pronoun","verb");
$student_table=array("roll_no","name","subject_code","marks","details");
$teacher_table=array("taught_by","name","subject_code","age","details");
$table_values=array("student","subject","teacher");
$subject_table=array("name","taught_by","subject_code","details");
$verb2_symbols=array("BETWEEN", "<", ">", "MAX", "MIN","=");
$quantity_attribute=array("marks","age");
$ambiguous=array("name","id","details");
$name_ambiguity=array("name","taught_by");
$id_ambiguity=array("roll_no","subject_code");
$ambiguity=array("name");
$details_ambiguity=array("student","subject","teacher");
$ambiguos_array=array($name_ambiguity,$id_ambiguity,$details);
$integer_attributes=array($student_integer,$subject_integer,$teacher_integer);
$string_attributes=array($student_string,$subject_string,$teacher_string);
$new_array3=array($noun,$pronoun,$verb);
$new_array=array($noun,$pronoun,$name,$greater_than,$lower_than,$highest,$smallest,$roll_no,$range,$equals,$marks,$taught_by,$subject_code,$details);
$noun1=array($student,$subject,$teacher,$marks,$name,$subject_code,$roll_no,$age,$taught_by,$details);
$verb1=array($range,$lower_than,$greater_than,$highest,$smallest,$equals);
$table=array($student_table,$subject_table,$teacher_table);
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
	//echo "</br><font size='6'><center>Ambiguous Words</br></br>";
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
						$noun2_type[$lk]=$noun2[$jk];
						$noun2_added[$lk]=$noun_added[$ij];			
					
					for($kl=0; $kl<count($table_values); $kl++)
					{
						if($noun2_type[$lk]==$table_values[$kl])
						{ 
							$relation_added[$er]=$noun2_added[$lk];
							$er++;
							$relation_name[$ty]=$table_values[$kl];
							//echo $relation_name[$ty];
							$ty++;
						}
					}
					for($km=0;$km<count($table);$km++)
					{ $flag1=0;
						for($lm=0;$lm<count($table[$km]); $lm++)
						{
							if($noun2_type[$lk]===$table[$km][$lm])
							{ 
								$attribute_added[$jo]=$noun2_added[$lk];
								//echo $attribute_added[$jo];
								$attribute_relation[$re]=$table_values[$km];
								//echo $attribute_relation[$re];
								$attribute_name[$ro]=$table[$km][$lm];
							//	echo $attribute_name[$ro];
								$jo++;
								$ro++;
								$re++;
								$flag1=1;	
							}
						}
						/*if($flag1=='1')
						{
							break;
						}*/
					}
					$lk++;			
				}
			}
		}
	}
	if(count($relation_name)=='0')
	{
		if(count($attribute_name)>0)
		{$er=0;
			for($wd=0;$wd<count($attribute_relation);$wd++)
			{
				$relation_name1[$er]=$attribute_relation[$wd];	
				$er++;
			}
			$relation_name=array_unique($relation_name1);
			//echo $relation_name[1];
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
				{	$rf=$relation_name[$er];
					$gk=${$rf.'_table'};
					for($hj=0;$hj<count($gk)-1;$hj++)
					{
					if($attribute_name[$u]===$gk[$hj]){
						//echo "fd";
						$attribute_added2[$jp]=$attribute_name[$u];
						$attribute_relation2[$jp]=$relation_name[$er];
						$jp++;
					}
					}
					for($dr=0;$dr<count($relation_added);$dr++)
					{
						if($tokens_full[$wq+3]==='and' && $tokens_full[$wq+4]===$relation_added[$dr])
						{//echo "gvd";
							for($we=0;$we<count($attribute_added);$we++)
							{		
								if($tokens_full[$wq+4]===$attribute_added1[$we])
								{//echo "090";
								$attribute_added2[$jp]=$attribute_name[$u];
								$attribute_relation2[$jp]=$relation_name[$er];
								$jp++;
								$u++;
								$flg3=1;
							}
							}	
							if($flg3!='1')
							{//echo "yes2";
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
					{//echo "yes3";
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
				{	echo "yes4";
			$rf=$relation_name[$er];
					$gk=${$rf.'_table'};
					for($hj=0;$hj<count($gk)-1;$hj++)
					{
					if($attribute_name[$u]===$gk[$hj]){
						$attribute_added2[$jp]=$attribute_name[$u];
						$attribute_relation2[$jp]=$relation_name[$er];
						$jp++;
									$u++;
								$flg3=1;
					
					}
					}
					
	/*			$attribute_added2[$jp]=$attribute_name[$u];
				$attribute_relation2[$jp]=$relation_name[$er];		
				//echo $attribute_relation2[$jp];
				$jp++;
				$u++;
				$flg3=1;	
*/				}
			}
			for($edr=0;$edr<count($attribute_added1);$edr++)
			{
				if($tokens_full[$wq+1]==='of' && $tokens_full[$wq+2]===$attribute_added1[$edr])
				{//echo "yes6";
				$attribute_added2[$jp]=$attribute_name[$edr];
				$attribute_relation2[$jp]=$attribute_relation[$edr];
				$jp++;
				$u++;
				$flg3=1;	
				}
			}	
			for($r=0;$r<count($verb_added);$r++)
			{
			if($tokens_full[$wq+1]==='of' && $tokens_full[$wq+2]===$attribute_added1[$edr])
			{//echo "yes6";
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
			{//echo "yes7";
			$attribute_added2[$jp]=$attribute_name[$u];
	  // echo $attribute_added2[$jp];
			$attribute_relation2[$jp]=$attribute_relation[$u];
			$jp++;
			$u++;
			//$flg3=1;
			}
	$u++;
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
								if($flg!='1')
								{
									for($uy=0;$uy<count($relation_added);$uy++)
									{
										if(!$attribute_added)
										{
											if(($relation_added[$uy]===$new_array1[$dgh-1]) ||($relation_added[$uy]===$new_array1[$dgh+1])||($relation_added[$uy]===$new_array1[$dgh-2]) ||($relation_added[$uy]===$new_array1[$dgh+2]))
											{
												//echo "yes";
												$attributes_m[$rew]=$relation_name[$uy];
												$ruy="count(name)";
												$attributes[$abc]=$ruy;
												//$relation_attribute[$kl]=$attribute_relation[$tuy];
												//$kl++;
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
								if($flg!='1')
								{
									for($uy=0;$uy<count($relation_added);$uy++)
									{
										if(!$attribute_added)
										{
											if(($relation_added[$uy]===$new_array1[$dgh-1]) ||($relation_added[$uy]===$new_array1[$dgh+1])||($relation_added[$uy]===$new_array1[$dgh-2]) ||($relation_added[$uy]===$new_array1[$dgh+2]))
											{
												//echo "yes";
												$attributes_m[$rew]=$relation_name[$uy];
												$ruy="count(name)";
												$attributes[$abc]=$ruy;
												//$relation_attribute[$kl]=$attribute_relation[$tuy];
												//$kl++;
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
	$ghj++;
	}
	$jh=0;
	$red=0;
	$flagl=0;
	$pol=0;
	$rk=0;
	$re=0;
	$top=0;
	$po=0;
	for($i=0; $i<count($values_added); $i++)
	{
		if($values_added[$i])
		{
		if((string)(int)$values_added[$i] === $values_added[$i])
		{ 
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
															else
															{
																$clause_relation[$re]=$attribute_relation[$s];
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
								if($values_added_integer[$lg]<$values_added_integer[$lg-1])
									{
									$gip=$attribute_name[$s]." BETWEEN '".$values_added_integer[$lg]."' AND '".$values_added_integer[$lg-1]."'";
									$clause[$po]=$gip;
									$po++;
									$clause_relation[$re]=$attribute_relation[$s];
									$re++;
									$clause_attribute[$rk]=$attribute_name[$s];
									$rk++;                                     
									break;
									}
									else if($values_added_integer[$lg]>$values_added_integer[$lg-1])
									{
									$gip=$attribute_name[$s]." BETWEEN '".$values_added_integer[$lg-1]."' AND '".$values_added_integer[$lg]."'";
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
				}
				$lg++;
		}	
		else
		if((string)(int)$values_added[$i] != $values_added[$i])
		{		
			$counter=0;
			$flag=0;
			$values_added_string[$rf]=$values_added[$i];
			for($fgh=count($new_array1); $fgh>=0; $fgh--)
			{
				if($new_array1[$fgh]===$values_added[$i])
				{
					for($s=0;$s<count($attribute_added);$s++)
					{ 
						if($new_array1[$fgh-1]===$attribute_added[$s])
						{ //echo "yesf";
							for($oi=$fgh-1;$oi>=0;$oi--)
							{
								for($ui=0;$ui<count($relation_added);$ui++)
								{
									if($new_array1[$oi]===$relation_added[$ui])
									{ //echo "jdk";
										$clause_relation1[$red]=$relation_name[$ui];
									//	echo $clause_relation1[$red];
										$red++;
										break;
									}
								}
							}
							for($tyl=0;$tyl<count($many_string);$tyl++)
							{//echo $attribute_name[$s];
								for($df=0;$df<count($many_string[$tyl]);$df++)
								{//echo $attribute_name[$s];
									if($attribute_name[$s]===$many_string[$tyl][$df])
									{	$pol=0;
										//echo "yes";
										for($h=0;$h<count($many_string[$tyl]);$h++)
										{
											$g=$clause_relation1[$red-1];
											$f=${$g.'_table'};
											for($edv=0;$edv<count($f);$edv++)
											{	//echo count($f);
										$r=$f[$edv];
										//echo $r;
										//echo $many_string[$tyl][$h];
											if($many_string[$tyl][$h]===$r)
												{ //echo "hudhs";
													$gi=$clause_relation1[$red-1].".".$many_string[$tyl][$h]."='".$values_added[$i]."'";
													$clause_many[$pol]=$gi;
													$pol++;
													$flag=1;
												}
											}
										}
										$clause_many_array[$jh]=implode(" OR ",$clause_many);
										//echo $clause_many_array[$jh];
										$jh++;
										for ($i = 0; $i < count($ar); $i++) 
										{
											unset($clause_many[$i]);  
										}	
										$flagl=1;
									}
								}
							}
							if($flagl!='1')
							{
								$gip=$attribute_name[$s]."='".$values_added[$i]."'";
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
	?>
	
	<?php
	/*if($clause){?>
	<table>
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
	}*/
	?>
	<?php
	$flag7=0;
	$bv=0;
	for($tyo=0;$tyo<count($attribute_added2);$tyo++)
		{
			if($attribute_added2[$tyo]==="details")
			{
			$flag7=1;
			if($attribute_relation2[$tyo]==="student")
			{
				for($we=0;$we<count($student_table)-1;$we++)
				{
					$tf[$bv]=$attribute_relation2[$tyo].".".$student_table[$we];
					$bv++;
				}
			}
			else 
			if($attribute_relation[$tyo]==="subject")
			{
				for($we=0;$we<count($subject_table)-1;$we++)
				{
					$tf[$bv]=$attribute_relation2[$tyo].".".$subject_table[$we];
					$bv++;
				}					
			}				
			$attributes_array1 = array_merge($array,$tf);
			$attributes_array2=implode(",",array_unique($attributes_array1));			
			}
		}
	$iop=0;
	$clause=array_unique($clause);
	for($tu=1;$tu<count($clause);$tu++)
	{
		$clause_array[$iop]=$clause[$tu];
	}
	$jh=0;
	$jm=0;
	$jn=0;
	$bn=0;
	$ro=0;
	$jkl=0;
	for($fg=0;$fg<count($values_added);$fg++){
		for($j=0;$j<count($student_table)-1;$j++){
		$student_fv[$jm]=$student_table[$j]."='".$values_added[$fg]."'";
		$jm++;
		}
		for($l=0;$l<count($subject_table)-1;$l++){
			$subject_fv[$jh]=$subject_table[$l]."='".$values_added[$fg]."'";
		$jh++;
		}
		for($c=0;$c<count($teacher_table)-1;$c++){
			$teacher_fv[$jh]=$teacher_table[$c]."='".$values_added[$fg]."'";
		$jn++;
		}
	}
	$fgb=0;
	$ed=implode(' OR ',$student_fv);
	$edy=implode(' OR ',$subject_fv);
	$ek=implode(' OR ',$teacher_fv);	
	$student_sub="select subject_code from student where ".$ed;
	$subject_sub="select subject_code from subject where ".$edy;	
	$teacher_sub="select subject_code from teacher where ".$ek;	
	$clause_many_array_un=array_unique($clause_many_array);
	$ar=array_merge($clause_many_array_un,$clause_array);
	$rtu=implode("' AND '",$ar);
	//$rtu=array_unique($rtu);
	//echo $rtu;
	//$rtu=implode("'AND'",$clause_array);
	if($attributes_m)
	{ 
		$attributes_array = array_diff($attribute_added2, $attributes_m);
		if($attributes_array)
		{
			for($ed=0;$ed<count($attributes_array);$ed++)
			{
				for($ad=0;$ad<count($attribute_added2);$ad++)
				{						
					if($attributes_array[$ed]===$attribute_added2[$ad])
					{
						$arr= $attribute_relation2[$ed].".".$attribute_added2[$ad];
						$arraym[$bn]=$arr;
						$bn++;
					}
				}
			}
		}
		if($attributes)
		{
		for($s=0;$s<count($attributes);$s++)
		{
			//$arrayy_sub[$s]= $relation_attribute[$s].".".$attributes[$s];
			$array_m[$fd]=$attributes[$s];
			$fd++;
		}
		}
	$array_m_unique=array_unique($array_m);		
	$arraym_unique=array_unique($arraym);
	//$ert=array_merge($arraym_unique,$array_m_unique);
	}
	else
	{	
		for($ed=0;$ed<count($attribute_added2);$ed++)
		{//echo $attribute_added2[$ed];
			$arr[$ed]=$attribute_relation2[$ed].".".$attribute_added2[$ed];
		//echo $attribute_relation2[1];
		//echo $attribute_relation2[$ed].".".$attribute_added2[$ed];
			$array[$bn]=$arr[$ed];	
			//echo $array[$bn];
			$bn++;
		}
	}
	if($flag7=='1')
	{ 
		$ioy=$attributes_array2;
	}
	else
//	if(array_merge($arraym_unique,$array_m_unique))
	if($array_m_unique)
	{
		if(count($attribute_added)>1){
		//$ioy= implode(",",array_merge($arraym_unique,$array_m_unique));
		$ioy2=implode(",",array_unique($attribute_name));
		$ioy4=implode(",",$array_m_unique);
		}
		else{
		$ioy3=implode(",",$array_m_unique);
		$ioy=implode(",",$array_m_unique);
		}
	}
	else
	if(count($array)=='0' && (!array_merge($arraym_unique,$array_m_unique)) || ($clause_attribute===$attribute_name))
	{
		$ioy= "*";
	}
	else
	{//echo "dj";
		$ioy=implode(",",array_unique($array));
	}
	$hu=array_unique($relation_name);
	$hut=implode(",",$hu);
	if($ioy2)
	{
		$query_final="Select ".$ioy2." from ".$hut." where ".$attributes_m[0]." = (Select ".$ioy4." from ".$relation_attribute[0].")";
	}
	else
		if($ioy3)
	{
		//echo "yeslklkk;";
		$query_final="Select ".$ioy3." from ".$relation_name[0];
	}
	else
	if(count($hu)=='2')
	{
		if((($hu[0]=='student') && ($hu[1]=='subject'))||(($hu[1]=='student') && ($hu[0]=='subject')))
		{//echo "kdjf";
			$for_key='subject_code';
					$for_key_value=$hu[0].".".$for_key."=".$hu[1].".".$for_key;
		}
		else
		if((($hu[0]=='student') && ($hu[1]=='teacher'))||(($hu[1]=='student') && ($hu[0]=='teacher')))
		{
			$for_key='name';
		$for_key_value=$hu[0].".".$for_key."=".$hu[1].".".$for_key;
			}
		else
		if((($hu[0]=='subject') && ($hu[1]=='teacher'))||(($hu[1]=='subject') && ($hu[0]=='teacher')))
		{
			$for_key='subject_code';
			//echo "kdjf";
		$for_key_value=$hu[0].".".$for_key."=".$hu[1].".".$for_key;
		}
	}
	//else 
		echo $rtu;
	echo $clause[1];
	if($for_key){
	if($clause[0]){
		if($clause[1]){
	$query_final="Select ".$ioy." from ".$hut." where ".$clause[0]." AND ".$for_key_value." AND ".$rtu;
		}
		else
//echo "dwsd";		
	$query_final="Select ".$ioy." from ".$hut." where ".$clause[0]." AND ".$for_key_value;
	}
		else
			if($rtu){
			//echo "dsj";
			$query_final="Select ".$ioy." from ".$hut." where ".$for_key_value." AND ".$rtu;
			}
			else
			$query_final="Select ".$ioy." from ".$hut." where ".$for_key_value;	
	}
else
	if(!$for_key && !$ioy2){
		if($clause[0]){
			if($clause[1]){ //echo "yesjdks";
				$query_final="Select ".$ioy." from ".$hut." where ".$clause[0]." AND ".$rtu;
				//if()
				}
			else 
			//	echo "76286";
			$query_final="Select ".$ioy." from ".$hut." where ".$clause[0];
			}
			else if(!$clause[0] && $rtu){
			//	echo "jfd";
			$query_final="Select ".$ioy." from ".$hut." where ".$rtu;
			$result = mysql_query($query_final) or die(mysql_error());
			//while($row = mysql_fetch_row($result))
				$row = mysql_fetch_row($result);
			if(!$row)
			{
				//echo "jf";
				//$query_final="Select ".$ioy." from ".$hut." where ".$rtu." OR teacher.subject_code=(".$teacher_sub.")";
				$query_final1="Select ".$ioy." from ".$hut." where ".$rtu." OR teacher.subject_code IN (select subject_code from subject where ".$edy.")";
				echo $query_final1;
				$result1 = mysql_query($query_final1);// or die(mysql_error());
			//	$row1 = mysql_fetch_row($result1); 
				if(mysql_num_rows($result1)== '0')
				{ //echo "db";
				$query_final2="Select ".$ioy." from ".$hut." where ".$rtu." OR subject.subject_code=(".$subject_sub.")";
				echo $query_final2;
				$result2 = mysql_query($query_final2);// or die(mysql_error());
				//$row2 = mysql_fetch_row($result2); 
				if(mysql_num_rows($result2)== '0')
				{
				$query_final3="Select ".$ioy." from ".$hut." where ".$rtu." OR student.subject_code=(".$student_sub.")";	
				}
				}
			}
		}
		else
		$query_final="Select ".$ioy." from ".$hut;
		}	
		/*?>
		<table cellpadding="6" border="1">
		</tr>
<?php		for($ip=0;$ip<count($ambiguous);$ip++)
{
	for($wq=0;$wq<count($attribute_added);$wq++)
	{
	if($ambiguous[$ip]===$attribute_added[$wq]){
?>
		<td>
		<?php echo $attribute_added[$wq];?> 
		</td>
	<?php } }}?>
		</tr>
		</table>
		 
		<?php
		*/echo "</br></br>";
		echo "<a href='a1_NLquery.php'>enter query</a>";
			
			if($query_final3)
			{
	echo "<font size='6'><center><b>Final Query</b></font></br></br><font size='4'>".$query_final3."</br></br>";
$query_final=$query_final3;	
	}		
		else
			if($query_final2)
			{
	echo "</br></br><font size='6'><center><b>Final Query</b></font></br></br><font size='4'>".$query_final2."</br></br>";
			$query_final=$query_final2;
			}
			else
		if($query_final1)
			{
			echo "</br></br><font size='6'><center><b>Final Query</b></font></br></br><font size='4'>".$query_final1."</br></br>";
			$query_final=$query_final1;
			}
			else{
	echo "</br></br><font size='6'><center><b>Final Query</b></font></br></br><font size='4'>".$query_final."</br></br>";
		}			
	//echo "</br></br>";
	//echo "</br></br><font size='6'><center><b>RESULT</b></font></br></br><font size='4'>".$query_final."</br></br>";
	//$sql="Select student.name,subject.subject_code from student,subject where subject_code=gh234";
	$result = mysql_query($query_final) or die(mysql_error());

// Print the column names as the headers of a table
echo "<table border='1' cellpadding='6' cellspacing='0'><tr>";
echo "<th>S.No.</th>";
for($i = 0; $i < mysql_num_fields($result); $i++) {
    $field_info = mysql_fetch_field($result, $i);
    echo "<th>$field_info->name</th>";
}
$it=1;
// Print the data
while($row = mysql_fetch_row($result)) {
    echo "<tr><td>".$it.")</td>";
    foreach($row as $_column) {
        echo "<td>".$_column."</td>";
    }
	$it++;
    echo "</tr>";
}

echo "</table>";
?>
	<?php
	/*if(isset($_POST['next00']))
	{
		$query=$_POST['this'];
		header("location: a9_result.php?pid=$query");	
	}*/
}
?><!--</br></br>
<form id="me" method="post" action="a9_result.php?pid=<?php //echo $query; ?>">
<input type="hidden" name="this" value="<?php// echo $query; ?>"/>
<center><input type="submit" name="next00" value="Next"/>
</form>-->
</body>
</html>