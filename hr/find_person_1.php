
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<script language=Javascript>
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //�Ѻ��ҡ�Ѻ��
               } 
          }
     };
     req.open("GET", "ajax_2.php?data="+src+"&val="+val); //���ҧ connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //�觤��
}

</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="save" action=""  method="post" enctype="multipart/form-data">
<table width="80%" border="0" cellspacing="1" cellpadding="1" align="center" >
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
		<table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#F4F7F9">
 		 	<tr  class="lgBar1" >
  		  		<td  height="25" colspan="4" ><div>���Һؤ��ҡ� ��¡/�ͧ��¡/����֡��/ʨ.  </div></td>
  			</tr>
			    
<tr>
	<td width="140" class="style_h"><div>
		���� - ʡ��
		</div>	</td>
	<td width="206"><div><input type="text" name="name" value="<? echo $name?>" size="20" maxlength="100" /></div></td>
	<td width="147" class="style_h"><div>
		�շ������˹�
		</div>	</td>
	<td width="274"><div><select name="year"><? ?>
<option value="" <? if($year =='' ) echo "selected"?>>- - ���͡ - -</option> 
	<?
	for($i=-20;$i<=1;$i++){
	?>
	<option value="<?=date("Y") + 543+$i?>" <?	if($year ==(date("Y") + 543+$i) ) echo "selected" ;
	?>><?=date("Y") + 543+$i?></option>
	<?
	}
	?>
	</select></div></td>
</tr>
			  <tr><td colspan="4" height="35" align="center"><input type="submit" name="go_search" value="����"></td></tr>
</table>

	</td>
</tr>
</table>
<br />
<table width="19%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td align="center"><a href="index.php?action=add_person_h" >�����ؤ��ҡ� </a></td>
  </tr>
</table>

<br />
<table width="98%" border="0" cellspacing="1" cellpadding="1"  align="center">
  <tr>
    <td  colspan="2" style="border: #7292B8 1px solid;"  >
<table name="body" width="100%" cellpadding="0" cellspacing="0">

<tr>
	<td width="100%" valign="top">

<table width="100%" cellpadding="0" cellspacing="0" border="1" align="center"  bordercolor="#FFFFFF">

	<tr  bgcolor="#60c0ff">
		<td  align="center" height="25" width="366"> ���� - ʡ��</td>
		<td   align="center" height="25" width="505">������</td>
		<td   align="center" height="25" width="397"> ���˹�	</td>

	</tr>
	
<? 
if($go_search  <> ""){
 $sql="SELECT *,p.user_id as user_id1 FROM (person p, ps_tname_ref ps)
 left outer join  work w  on w.user_id =p.user_id  ";
if($year ==''  and find_w_id() <>'' )$sql .= " and w.w_id in(".find_w_id().") "; 
$sql .= "  WHERE 1=1 and p.status =0 and p.ps_tname_id = ps.ps_tname_id";
$sql .= " and p.status =0  and p.ps_tname_id = ps.ps_tname_id ";
if($year <>'' ) $sql .=" AND year(w.start_work) = '".($year-543)."' ";
if(trim($name)  <>'')$sql .= " AND p.name  like '%".trim($name)."%' ";

$sql .= "	 and p.type_mem = 1 group by p.user_id  ";

$Per_Page =20;
if(!$Page){$Page=1;}
$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$result = mysql_query($sql);

$Page_start = ($Per_Page*$Page)-$Per_Page;
if($result)
$Num_Rows = mysql_num_rows($result);

if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else 
$Num_Pages =($Num_Rows/$Per_Page) +1;

$Num_Pages = (int)$Num_Pages;

if(($Page>$Num_Pages) || ($Page<0))

print "<center><b>�ӹǹ $Page �ҡ���� $Num_Pages �ѧ����բ�ͤ���<b></center>";
$sql .= " LIMIT $Page_start , $Per_Page";
$result1 = mysql_query($sql);
}
$x = 1;
$i = 0;
if($result1)
while($rs=mysql_fetch_array($result1)){

if($i%2 == 0) $bg ='#CCCCCC';
elseif($i%2 ==1) $bg ='#FFFFFF';
$i++;
?>
<tr bgcolor="<? echo $bg?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#B0D8FF'" onmouseout="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">

		<td   align="left"height="25" width="366" >&nbsp; <a href="index.php?action=personnel_story_h&user_id=<? echo $rs["user_id1"]?>"> <? 
		 if($rs[ps_tname_id] <>'00') 
		 echo $rs[ps_tname_item]."";
		  else "";
		  echo $rs["name"]?></a></td>
		<td  align="left" height="25" width="505">&nbsp; <? 
		if($year <>''){
				$tt = explode(",",find_command($rs["user_id1"] , $year ));
				if($tt[0] <>'' )	 echo find_command_show($tt[0] , "1");
				if($tt[1]  <>'')  echo find_command_show($tt[1] , "2");
		}else{
				$tt1 = explode(",",find_max_id($rs["user_id1"]));
				echo find_command_show($tt1[0], "1");
				echo find_command_show($tt1[1] , "2");
		}
		
		?></td>

		<td  align="left" height="25" width="397">&nbsp; <? echo $rs[position]?></td>

	</tr>  
	<?$x = $x +1;  }?>	

</table>
			</td>
</tr>
</table>
</td></tr> </table>
<div align="center"><br>
<center><FONT size="2" >�ըӹǹ ������
<B><?= $Num_Rows;?></B>&nbsp;��&nbsp;&nbsp;
�¡�� : <b> 
<?=$Num_Pages;?></b>&nbsp;˹��<BR>
&nbsp; ˹�� : 
<? /* ���ҧ������͹��Ѻ */
if($Prev_Page) 
echo " <a href='?action=find_person&Page=$Prev_Page&go_search=$go_search&div_id=$div_id&sub_id=$sub_id&pos_id=$pos_id&per_id=$per_id&name=$name&year=$year'><< ��͹��Ѻ </a>";
for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)

echo "[<a href='?action=find_person&Page=$i&go_search=$go_search&div_id=$div_id&sub_id=$sub_id&pos_id=$pos_id&per_id=$per_id&name=$name&year=$year'>$i</a>]";
else 
echo "<b> $i </b>";
}
/*���ҧ�����Թ˹�� */
if($Page!=$Num_Pages)
echo "<a href ='?action=find_person&Page=$Next_Page&go_search=$go_search&div_id=$div_id&sub_id=$sub_id&pos_id=$pos_id&per_id=$per_id&name=$name&year=$year'> ˹�ҶѴ�>> </a>";

?>
<br />

</font>
</center>
</div>
</form>
<?
function find_w_id(){
					
				$sql2="select max(start_work) as start_work ,user_id from work group by user_id ";
				$result2 = mysql_query($sql2);
				if($result2)
				$dd ="";
				while($rs2=mysql_fetch_array($result2)){
							 $sql="select  user_id,w_id from work where start_work = '$rs2[start_work]' and user_id ='$rs2[user_id]'  group by user_id ";
									$result1 = mysql_query($sql);
									if($result1)
									$rs1=mysql_fetch_array($result1);
											if($rs1[w_id] <>''){
												$dd .= $rs1[w_id].",";
											}
					}
					return substr($dd,0,strlen($dd)-1) ;
}

function find_max_id($user_id){
					
				$sql2="select max(start_work) as start_work ,user_id,w_id from work where user_id = '$user_id' and  command <>''
				group by start_work order by start_work  desc , w_id desc limit 3 ";
				$result2 = mysql_query($sql2);
				if($result2)
				$dd ="";
				while($rs2=mysql_fetch_array($result2)){
						$dd .= $rs2[w_id].",";
					}
					return substr($dd,0,strlen($dd)-1) ;
}


function find_command($user_id , $year ){
					
				 $sql2="SELECT * FROM work  where  user_id ='$user_id'   AND year(start_work) = '".($year-543)."' and  command <>'' order by start_work  desc , w_id desc limit 3 ";
				$result2 = mysql_query($sql2);
				if($result2)
				$dd ="";
				while($rs2=mysql_fetch_array($result2)){
						$dd .= $rs2[w_id].",";
						
				}
				return substr($dd,0,strlen($dd)-1) ;
}
function find_command_show($w_id , $num){
	
				 $sql2="SELECT * FROM work  where  w_id ='$w_id'  group by w_id  limit 1 ";
				$result2 = mysql_query($sql2);
				if($result2)
				$dd2 ='';
				while($rs2=mysql_fetch_array($result2)){
				
					if($rs2[command] <>'')   $dd2 .=  "<br>&nbsp;  ������Ţ��� ".$rs2[command];
					if($rs2[date_command] <>'0000-00-00') $dd2 .= " ŧ�ѹ��� ".date_2($rs2[date_command]);
				}

				return $dd2 ;
}
function find_command_show2($w_id){

				 $sql2="SELECT * FROM work  where  w_id ='$w_id'  group by w_id  limit 1 ";
				$result2 = mysql_query($sql2);
				if($result2)
				$dd2 ='';
				while($rs2=mysql_fetch_array($result2)){
					if($rs2[command] <>'')  $dd2 .=  "<br>&nbsp; <b>��û�Ѻ�дѺ��͹˹�� : </b>  ������Ţ��� ".$rs2[command];
					if($rs2[date_command] <>'0000-00-00') $dd2 .= " ŧ�ѹ��� ".date_2($rs2[date_command]);
				}
				return $dd2 ;
}

?>