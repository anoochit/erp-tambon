<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<?
if($del == 'delete'){
	$file_name = $_REQUEST["n_file"];
	$file_id = $_REQUEST["file_id"];
	
	unlink("files_data/$file_name"); 
	$sql_del = "DELETE FROM file_record WHERE file_name='$file_name' ";
	$result_del = mysql_query($sql_del);
}
?>
<script language="JavaScript" type="text/javascript">
// ����� XmlHttp Object
function uzXmlHttp(){
var xmlhttp = false;
try{
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
try{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}catch(e){
xmlhttp = false;
}
}

if(!xmlhttp && document.createElement){
xmlhttp = new XMLHttpRequest();
}
return xmlhttp;
}
// End XmlHttp Object


</script>

<script language="JavaScript" type="text/javascript">
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

//dochange �ж١���¡������ա�����͡ ��¡�� Combobox ��觨з��������¡ AJAX ������ͧ�͢����ŶѴ仨ҡ Server
function dochange(src, val) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () { 
          if (req.readyState==4) {
               if (req.status==200) {
                    document.getElementById(src).innerHTML=req.responseText; //�Ѻ��ҡ�Ѻ��
               } 
          }
     };
     req.open("GET", "temp.php?data="+src+"&val="+val); //���ҧ connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //�觤��
}


</script>
<script language="JavaScript" type="text/javascript">
//------------------------------function  ����Ҩҡ form-------------------------
	function validate(theForm) 
	{
		var v2 = document.add_receive.status1[0].checked;
			var v3 = document.add_receive.status1[1].checked;
		   if (  v2 == false   && v3 ==false )
           {
           alert("��س����͡ʶҹС�ô��Թ���");
           document.add_receive.status1[0].focus();           
           return false;
           }
			return true;
	}
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<center>
<table name="body" width="657" cellpadding="0" cellspacing="0">

<tr>
	<td width="657" valign="top">
	<? 
	if($_REQUEST["add_add"] != "") {
		$file_id=$_REQUEST["file_id"];
		$dep_id = $_REQUEST["dep_id"];
			$stamp_date = date_format_sql($_REQUEST["access_date"]);
			$access_date = date_format_sql($_REQUEST["access_date"]);
			$sql_add = "UPDATE send_doc SET stamp_date = '$stamp_date',stamp_dateTime = NOW(),
			 access_date = '$access_date',access_dateTime = NOW()
			,remark ='$remark' ,status ='͹��ѵ�����'
			WHERE  file_id =$file_id and send_id = 0 ";
		$result_add = mysql_query($sql_add);
		 echo "<center><br><br><br><br><b><font color=\"#0000CC\">���Թ������º��������</font></b>";
		echo "<meta http-equiv='refresh' content='1; url=index.php?action=list_stamp'><br><br><br><br><br><br></center>";
}
	?>
	<? if($add =='add_receive'){
		$sql1 ="select * from send_doc s,documentary d
		 where s.file_id = d.file_id and d.file_id = $file_id  and s.send_id = 0 ";
		$result = mysql_query($sql1);
		$rs = mysql_fetch_array($result);
		$remark =$rs['remark'];
		$doc_id = $rs["doc_id"];
		$dep_id = $rs["dep_id"];
		$dep_name = $rs["dep_name"];
		$cat_id = $rs["cat_id"];
		$group_id = $rs["group_id"];
		$topic = $rs["topic"];
		$dep_ref = $rs["dep_ref"];
		$send_from = $rs["send_from"] ;
		$put_date = date_format_th($rs["put_date_on"]);
		$recieve_date = date_format_th($rs["recieve_date"]);
		$dmyarr = explode("-",$rs["finish_date"]);
		$finish_date = (trim($dmyarr[2])."/".trim($dmyarr[1])."/".(trim($dmyarr[0]) ));
		$file_id = $rs["file_id"];
		$permission = $rs["permission"] ;
		$receive_id = $rs["receive_id"] ;
		$rep_from = $rs["rep_from"] ;
		$a_status = $rs["a_status"];
		$c_status = $rs["c_status"];
		$status = $rs["status"] ;
			
	?>
	<form name="add_receive" method="post" enctype="multipart/form-data">
	<table name="add" cellpadding="1" cellspacing="1" border="0" bgcolor="#f4f7f9" width="100%">
	<tr>
	<td background="images/bar.gif"  align="left"height="30"  colspan="2" ><strong>˹ѧ�����͹��ѵ�</strong></td>
	</tr>
	<tr>
	<td width="157"><div>
		�ͧ 
		</div>	</td>
	<td><select name="depart" onChange="dochange('catagory', this.value)"   disabled="disabled">
      <option value="">--��س����͡--</option>
      <?
	$sql= "SELECT * FROM department ORDER BY dep_name";
	$result = mysql_query($sql);
	while($rs = mysql_fetch_array($result)){
		echo "<option value='".$rs["dep_id"] ."' " ;
		if($dep_id == $rs["dep_id"] ){
			echo "selected";
		}
		echo ">".$rs["dep_name"]."</option>";
	}
	?>
    </select>
	  <input type="hidden" name="dep_id" value="<?=$dep_id?>"></td>
</tr>
	<tr>
	<td width="157"><div>
		�Ţ����͡��� 
		</div>	</td>
	<td width="685"><input type="text" name="doc_id" value="<?echo $doc_id?>" size="40" maxlength="100" disabled="disabled" /></td>
</tr>
<tr>
	<td width="157"><div>
		ŧ�ѹ��� 
		</div>	</td>
	<td><input type="text" name="put_date" value="<?echo $put_date?>" size="10" maxlength="100" readonly="readonly"> </td>
</tr>
<tr>
	<td width="157"><div>
		�Ţ����Ѻ�͡��� 
		</div>	</td>
	<td><input type="text" name="receive_id" value="<? echo $receive_id?>" size="40" maxlength="100" disabled="disabled">	</td>
</tr>
<tr>
	<td width="157"><div>
		�ѹ����Ѻ�͡��� 
		</div>	</td>
	<td><input type="text" name="recieve_date" value="<?echo $recieve_date?>" size="10" maxlength="100" readonly="readonly"> </td>
</tr>

<tr>
	<td width="157"><div>
		����ͧ <strong><font color="#FF0000" >*</font></strong>
		</div>	</td>
	<td><input type="text" name="doc_topic" value="<? echo $topic;?>" size="80" maxlength="255" 
	<? if($dep_id <>$_SESSION['de_part'] ) echo "disabled=\"disabled\""?>>	</td>
</tr>
<tr>
  <th colspan="2" height="30" align="center">
    <div align="center">[&nbsp;&nbsp;<a href="javascript:popup('add_pic.php?file_id=<? echo $file_id;?>&add=add','',600,180)"   class="bar_add">�������</a>&nbsp;&nbsp;] </div></th>
  </tr>
<?
	$i =0;
	$query=" SELECT * FROM  file_record  WHERE file_id ='$file_id'  order by id ";
	$result=mysql_query($query);
	while ($news=mysql_fetch_array($result)) {
	  $i++;
?>
<tr>
	<td width="157" height="30"><div>
		��� <?=$i?>
		</div>	</td>
	<td>
	  <div align="left">
	    <?	if($news[file_name] != ""){ ?>
	    <a href="files_data/<?=$news[file_name]?>" target="_blank" >
	      <? 
	if($news[name_file] <>'') echo $news[name_file];
	else echo $news[file_name];
	?>
	      </a>
  &nbsp;&nbsp;
	    <? }?>
	</div>	</td>
</tr>
<? }?>

<tr>
	<td width="157"><div>
		��ҧ�֧ 
		</div>	</td>
	<td><input type="text" name="rep_from" value="<?=$rep_from?>" size="40" maxlength="100" disabled="disabled">	</td>
</tr>
<tr>
	<td width="157"><div>
		��觷�����Ҵ���
		</div>	</td>
	<td><input type="text" name="send_from" value="<?=$send_from?>" size="40" maxlength="100" disabled="disabled">	</td>
</tr>

<tr>
	<td width="157"><div>
		�ѹ�������ش
		</div>	</td>
	<td><input type="text" name="finish_date" value="<?echo $finish_date?>" size="10" maxlength="100" readonly="readonly"> 	</td>
</tr>
<tr>
	<td width="157"><div>
		�ҡ˹��§ҹ 
		</div>	</td>
	<td><input type="text" name="dep_ref" value="<?echo $dep_ref?>" size="40" maxlength="150" disabled="disabled">	</td>
</tr>
<tr>
	<td width="157"><div>
		���������͡���
		</div>	</td>
	<td><select name="a_status" disabled="disabled">
	<option  value="����" <? if($a_status == '����' or $a_status == '' ) echo "selected"?>>����</option>
	<option value="��ǹ" <? if($a_status == '��ǹ' ) echo "selected"?>>��ǹ</option>
	<option value="��ǹ�ҡ" <? if($a_status == '��ǹ�ҡ' ) echo "selected"?>>��ǹ�ҡ</option>
	<option value="��ǹ����ش" <? if($a_status == '��ǹ����ش' ) echo "selected"?>>��ǹ����ش</option>
	</select></td>
</tr>
<tr>
	<td width="157"><div>
		�дѺ�����Ѻ
		</div>	</td>
	<td><select name="c_status" disabled="disabled">
	<option  value="����" <? if($c_status == '����' or $c_status == '' ) echo "selected"?>>����</option>
	<option value="�Ѻ" <? if($c_status == '�Ѻ' ) echo "selected"?>>�Ѻ</option>
	<option value="�Ѻ�ҡ" <? if($c_status == '�Ѻ�ҡ' ) echo "selected"?>>�Ѻ�ҡ</option>
	<option value="���Դ" <? if($c_status == '���Դ' ) echo "selected"?>>���Դ</option>
	</select></td>
</tr>
<tr>
	<td width="157"><div>
		ʶҹ��͡��� 		</div>	</td>
	<td><select name="status" disabled="disabled">
	<option  value="����" <? if($status == '����' or $status == '' ) echo "selected"?>>����</option>
	<option value="¡��ԡ" <? if($status == '¡��ԡ' ) echo "selected"?>>¡��ԡ</option>
	</select></td>
</tr>
<tr>
	<td width="157" valign="top"><div>����� </div>	</td>

		<td><input type="radio" name="gp" value="all" <? if($permission =='all') echo "checked"?> onclick="Javascript: dep_check.style.visibility='hidden';" disabled="disabled"> �Ҹ�ó� 
	<input type="radio" name="gp" value="owner" disabled="disabled"  <? if($permission <> 'all') echo "checked"?>  onclick="Javascript: dep_check.style.visibility='visible';"> ੾�� <br>
		<div id="dep_check" >
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
	<?
	
	$dep_name = explode(",",$permission);
	$sql_dep = "SELECT * FROM department ORDER BY dep_name";
	$result = mysql_query($sql_dep);
	$g = 0;
	while($rs1 = mysql_fetch_array($result)){
	$g++;
	if($g == 1 or $g == 5 or $g==9 or $g ==13 or $g ==17){
		echo "<tr>";
	}
	?><td>
	<input type="checkbox" name="gp_only<? echo $i?>" disabled="disabled" value="<? echo $rs1["dep_name"]?>" <? 
	for($j=0;$j<=count($dep_name);$j++){
		if(trim($rs1["dep_name"]) ==trim($dep_name[$j])) {echo "checked";} 
	}
	?>><? echo $rs1["dep_name"]?></td>
	<? 
	if($g== 4 or $g ==10 or $g ==14 or $g ==18){
		echo "</tr>";
	}
?>
	<? 
			$j++;
		}
		
	?>
	</table>
	</div>
	<tr>
	<td width="157"><div>
		�ѹ���͹��ѵ�  <strong><font color="#FF0000" >*</font></strong>
		</div>	</td>
	<td width="685">
	  <input type="text" name="access_date" value="<? echo DATE('d/m/Y');?>" size="10" maxlength="100"  id="access_date"> 
	<IMG src="images/calendar.gif" width="20" height="13" border="0" alt="" onclick="showCalendar('access_date','DD/MM/YYYY');">	</td>
</tr>
	<tr>
	
	<td  ><div>
��ͤ�����ͷ��� <strong><font color="#FF0000" >*</font></strong></div></td>
<td   >
<textarea name="remark"  cols="40" rows="5"><?=$remark?></textarea>

	</div>	</td>
</tr>
<tr>

<td  height="30"    align="center" colspan="2">
<input type="submit" name="add_add" value=" ͹��ѵ� " onclick="return validate()"></td>
</tr>
	</table>
</form>
	<? }else{?>	
	<table cellpadding="0" cellspacing="0" border="0"  width="100%">
	<tr>
	<td background="images/bar.gif"  align="left"height="25"  colspan="13" ><strong>˹ѧ�����͹��ѵ�</strong></td>
	</tr>
	<tr>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="129"> �Ţ����͡���		</td>
			<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="125"> �Ţ����Ѻ�͡���		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="294"> ����ͧ		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="100"> ŧ�ѹ���		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td  background="images/bar.gif" align="center" height="25" width="98"> �ѹ����Ѻ		</td>
		<td background="images/bar.gif" align="center" height="25" width="1"> <IMG src="images/nbar.gif" width="1" height="25" border="0">		</td>
		<td background="images/bar.gif" align="center" height="25" width="97">�ѹ�����		</td>
	</tr>
	<?
include("day_func.php");
$sql = "SELECT d.doc_id,d.topic,d.put_date_on,d.recieve_date,d.finish_date,d.file_id,d.warning,d.receive_id ,s.send_date
FROM documentary d, send_doc s
Where d.file_id = s.file_id 
and s.send_id = 0
and d.type_doc = '�Ѻ���' 
and s.status  like '%��͹��ѵ�%'
group by s.file_id,s.send_id
ORDER BY d.finish_date DESC, d.put_date_on DESC 
";

$result = mysql_query($sql);
$x = 1;
while($rs=mysql_fetch_array($result)){

if($rs["finish_date"] != ""){

	$start_date = date_format_th($rs["put_date_on"]);
	$finish_date = date_format_th($rs["finish_date"]);
	$date_long = count_day($start_date,$finish_date);
	$green_date = green_day($finish_date,$date_long);
	$orange_date = orange_day($finish_date,$date_long);
	$red_date = red_day($finish_date,$date_long);
	$cur_date =  DATE('d/m/Y');
	if(trim($rs["warning"]) == "no"){ // ����ѹ����ش
			if($x%2 == 0) $color ='#B0D8FF';
 		 else $color ='#FFFFFF';
			//$color = "#FFFFFF";
	}else	if(date_diff1($cur_date,$finish_date) > 0 && trim($rs["warning"]) == "yes"){ // ����ѹ����ش // ᴧ
			$color = "#FF9191";
	}elseif(date_diff1($cur_date,$finish_date) <=0 && date_diff1($cur_date,$red_date) > 0 && trim($rs["warning"]) == "yes"){   //���
			$color = "#FFD6C1";
	}elseif( date_diff1($cur_date,$red_date) <= 0  && date_diff1($cur_date,$green_date)  > 0  && trim($rs["warning"]) == "yes"){  //����ͧ
			$color = "#FFFFAA";
	}elseif(date_diff1($cur_date,$green_date) <=0 && date_diff1($cur_date,$start_date) >= 0  && trim($rs["warning"]) == "yes"){  // �ѹ����
			$color = "#B0FFB0";
	}else {
		if($x%2 == 0) $color ='#B0D8FF';
 		 else $color ='#FFFFFF';
	}
}else {
		$color = "#FFFFFF";
}

?>
<tr bgcolor="<? echo $color?>" onmouseover= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#E0FFFF'" onmouseout="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
		<td align="center" height="25" width="1">		</td>
		<td align="left" height="25" width="129">&nbsp; <?echo $rs["doc_id"]?>		</td>
		<td  align="center" height="25" width="1">		</td>
		<td align="left" height="25" width="125">&nbsp; <?echo $rs["receive_id"]?>		</td>
		<td align="center" height="25" width="1">		</td>
		<td  align="left" height="25" width="294"> <a href="index.php?action=list_stamp&add=add_receive&file_id=<?echo $rs["file_id"]?>"  target="_self"  class="catLink5"><?echo $rs["topic"]?></a> <!-- <?=$green_date?>  <?=$orange_date?>  <?=$red_date?> <?= date_diff1($cur_date,$green_date) ?> /<?= date_diff1($cur_date,$orange_date) ?>/ <?= date_diff1($cur_date,$red_date) ?>/ <?= date_diff1($cur_date,$finish_date) ?> -->		</td>
		<td  align="center" height="25" width="1">		</td>
		<td align="center" height="25" width="100"> <?echo date_time($rs["put_date_on"])?>		</td>
		<td  align="center" height="25" width="1">		</td>
		<td align="center" height="25" width="98">
		<?
		if($rs["recieve_date"] == "" || $rs["recieve_date"] == "--" || $rs["recieve_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["recieve_date"]);
		}
		?>		</td>
		<td  align="center" height="25" width="1">		</td>
		<td align="center" height="25" width="97">
		<?
		if($rs["send_date"] == "" || $rs["send_date"] == "--" || $rs["send_date"] == "0000-00-00")	{
			echo " - ";
		}else {
			echo date_time($rs["send_date"]);
		}
		?>		</td>
	</tr><!--</a> -->
	<?$x = $x +1; }?>
</table>

<? }?>
</td>
</tr>
</table>
</center>
<? if($permission <>'all') {?>
<script language="JavaScript" type="text/javascript">
		document.getElementById('dep_check').style.visibility='visible';
	</script> 
	<? }else{?>
<script language="JavaScript" type="text/javascript">
		document.getElementById('dep_check').style.visibility='hidden';
	</script> 
	
	<? }?>
	<?
function up_file($old_file,$file_att,$file_att_type,$file_att_size,$name_file){
	$query="UPDATE file_record SET file_name='$file_att' , file_type='$file_att_type' ,
	file_size='$file_att_size',name_file ='$name_file'
	 WHERE file_name='$old_file'";
	$result=mysql_query($query);	
}
function add_file($max_file_id,$file_att,$file_att_type,$file_att_size,$name_file){
	$query="INSERT INTO file_record (file_id,  file_name, file_type, file_size,name_file ) VALUES('$max_file_id','$file_att','$file_att_type','$file_att_size','$name_file')";
	$result=mysql_query($query);	
}
	
	?><script type="text/javascript">  
function popup(url,name,windowWidth,windowHeight){       
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;    
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;      
    properties = "width="+windowWidth+",height="+windowHeight;   
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;      
    window.open(url,name,properties);   
}   
</script>  