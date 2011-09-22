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
		var v1 = document.login.user.value;
      	var v2 = document.login.pwd.value;
		 if ( v1.length == 0  ||  check_number(v1) == true)
           {
           alert("กรุณาลงชื่อผู้ใช้");
           document.login.user.focus();           
           return false;
           }
		if (v2.length == 0   ||  check_number(v2) == true )
           {
          	  alert("กรุณากรอกรหัสผ่านของท่าน");
		 	  document.login.pwd.focus();       
         	  return false;
           }
			return true;
	}
</script>
<center>
<table width="200" border="0" cellpadding="0" cellspacing="0" >
<tr>
	<td><div>
<form name="login" method="post" action="login_.php" onsubmit="return validate()">
		 สำหรับเจ้าหน้าที่เข้าใช้ระบบ :
		 <table border="0">
		 <tr>
		 <td>		
		Username : </td>
		<td><input type ="text" name="user" size="16">
		</td>
		</tr>
		<tr>
		<td>
		Password : 
		</td>
		<td><input type ="password" name="pwd" size="16"> 
		</td>
		</tr>
		<tr>
		<td colspan="2" align="right">
		<input type="submit" name="login" value="เข้าสู่ระบบ">
		</td>
		</tr>
		</table>
		</form>
</div>
	</td>
	</tr>
</table>
</center>