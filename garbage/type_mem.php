
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="javascript">
function godel()
{
	if (confirm("�س��ͧ���ź�����Ź�� ���������"))
	{
		return true;
	}
		return false;
}
</script>
<?
//----------ź--------------
if($del =='del'){
$sql = "DELETE FROM  passwd WHERE pwd_username ='$u_ser' ";
  //echo $sql ;
   $result = mysql_query($sql);
        //echo "<center><img src=\"images_/i_animated_loading_32_2.gif\" width=\"42\" height=\"42\"></center><br>";
		echo "<br><br><center><font color=darkgreen>��س����ѡ�����к����ѧ�ӡ��ź������</font></center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=user\">\n";
		//mysql_close();	
}
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<?
//-----------�ʴ�������-------------------
    $sql=" Select  tmcode,tmname from type_mem  order by tmcode ";
	//$sql .= " LIMIT $start,$limit";
	//echo $sql;
		$result=mysql_query($sql);
		$num_rows=mysql_num_rows($result);
		?>
		
	 <table width="65%" cellspacing="1" border="0" style="border-collapse:collapse;"  align="center">
	 <tr bgcolor="#99CCFF" class="lgBar">				
    <td height="30"  colspan="6"  style="border: #000000 1px solid;">
      <div align="left">&nbsp;&nbsp;&nbsp;[ <a href="?action=add_type_mem" class="catLink1">	���������Ż������������ԡ��</a> ]</td> 
	  
<!--		 <td width="5%">&nbsp;</td> -->
	 </tr>
     <tr class="lgBar" bgcolor="#99CCFF">					 
	<td width="18%" height="28"  align="center" style="border: #000000 1px solid;" > ����    </td>
	   <td width="66%" style="border: #000000 1px solid;"  align="center">�������������ԡ��      </td>

     <td width="16%" style="border: #000000 1px solid;" align="center" >&nbsp;���       </td>
	 <!--td width="10%" style="border: #000000 1px solid;" align="center" >&nbsp;ź	   </td>  -->
	 </tr>
	 <?
if($result)
		while ($d =mysql_fetch_array($result)){
		$r++;
	?>
		<tr class="bmText" >
<td  align="center" style="border: #000000 1px solid;" >&nbsp;&nbsp;<?=$d[tmcode]?></td>
	   <td  align="left" style="border: #000000 1px solid;" >&nbsp;&nbsp;<?=$d[tmname]?></td>
	   
		<td align="center" style="border: #000000 1px solid;" ><a href="?action=edit_type_mem&TMCODE=<? echo $d[tmcode]?>"> <img src="images/Modify.png" border="0" /></a></td>
   	   </tr>
	   <? }?>
	    <!--<tr  class="bmText"><td height="40" colspan="20" style="border: #000000 1px solid;" >  -->
  
    <?
/*
	 echo "<center>";
	$page = ceil($total/$limit); // ��� record ������ ��ô��� �ӹǹ�����ʴ��ͧ����˹��

	for($i=1;$i<=$page;$i++){
		if($_GET['page']==$i){ //��ҵ���� page �ç �Ѻ �Ţ���ǹ��
			echo "[<a href='?action=add_user1&start=".$limit*($i-1)."&page=$i&div_name=$div_name&sub_name=$sub_name&level1=$level1&status=$status'> $i </A>]"; //��駤� ��˹�� ���͹䢷�� 1
		}else{
			echo "[ <a href='?action=add_user1&start=".$limit*($i-1)."&page=$i&div_name=$div_name&sub_name=$sub_name&level1=$level1&status=$status'> $i </A> ]"; //��駤� ��˹�� ���͹䢷�� 2
		}
	}

echo "</center>";
*/
?>
<!--  </td>
  </tr> -->
   <? // }elseif($total <=0){?>
     <!--<tr class="lgBar"><td colspan="10" style="border: #000000 1px solid;"  height="30" align="center"> ��辺������</td>
 </tr> -->
 <? // }?>
	 </table>


</body>
</html>
