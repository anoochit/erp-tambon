<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="JavaScript" type="text/javascript">
function check_number(ch){
var sum = 0;
	for(var i=0 ; i<ch.length ; i++)
	{
		digit = ch.charAt(i);
		if(digit ==" " ){
			sum =sum+1; 
		}
	} 
	if(sum == ch.length){
		return true;
	}else{
		return false;
	}
}
	function validate(theForm) 
	{
		var v1 = document.add_group.group_name.value;
		 if ( v1.length == 0  ||  check_number(v1) == true)
           {
           alert("กรุณากรอกชื่อประเภทเอกสาร");
           document.add_group.group_name.focus();           
           return false;
           }
			return true;
	}
</script>
<br>
<form name="add_group" action="add_group_recieve.php" method="post" onsubmit="return validate()">
<table >
<tr>
	<td><div>ชื่อประเภทเอกสาร</div>
	</td>
	<td>
	<input type="text" name="group_name" value="" size="65">
	</td>
</tr>
<tr>
	<td colspan="2" align="center">
	<input type="submit" name="save_group" value="บันทึก">
	</td>
</tr>
</table>
</form>
