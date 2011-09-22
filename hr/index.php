<?
session_start();
include('config.inc.php');

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title><?=$site?></title>

<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">

.login {
	font-family: Tahoma;
	font-size: 12pt;
	color: #2E578A;
	font-weight: lighter;
	line-height: normal;
}

-->
</style>
<script language="JavaScript" src="calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
<style type="text/css">
<!--
.style11 {font-size: 100%}
-->
</style>
</head>
<body  bgcolor="#FFFFFF" >
<center>

<table id="background_tabel" width="900"   border='0' cellpadding='0' cellspacing='0'>
<tr>
  <td height="100%"rowspan="2" valign="top" background="images/MIS1/images/MIS_03.jpg"><!-- ส่วนเมนูด้านซ้าย -->
    <? include('menu.php')?>
	</td>
		<td height="75"  bgcolor='#FFFFFF' colspan="2" valign="top"  background="images/MIS1/images/MIS_03.jpg">
    <!-- ส่วนเมนูด้านบน -->
  <?include('header.php')?>
<table id='body' width='100%' height="447" border="0"  align="center" cellpadding="0" cellspacing="0">
	<td width="657" align="left" valign="top" background="images/MIS1/images/MIS_03.jpg" ><br>
	<?

	if($_SESSION['username'] <>''){
		if($_REQUEST["action"]  == 'add_person'){ include("add_person.php"); }//เพิ่มหนังสือใหม่
		elseif($_REQUEST["action"]  == 'personnel_story'){ include("personnel_story.php");}
		elseif($_REQUEST["$action"]  == 'add_vacation'){ include("add_vacation.php");}
		elseif($_REQUEST["action"] == "backup") {include("backup.php");} // backup ข้อมูล
		elseif($_REQUEST["action"]  == 'find_person'){ include("find_person.php");}
		elseif($_REQUEST["action"]  == 'find_person_1'){ include("find_person_1.php");}
		elseif($_REQUEST["action"]  == 'add_person_h'){ include("add_person_h.php"); }//เพิ่มหนังสือใหม่
		elseif($_REQUEST["action"]  == 'personnel_story_h'){ include("personnel_story_h.php");}
		//รายงาน
		elseif($_REQUEST["action"]  == 'report_num_per'){ include("report_num_per.php");}
		elseif($_REQUEST["action"]  == 'report_la'){ include("report_la.php");}
		elseif($_REQUEST["action"]  == 'report_late'){ include("report_late.php");}
		elseif($_REQUEST["action"]  == 'report_train'){ include("report_train.php");}
		elseif($_REQUEST["action"]  == 'report_pay'){ include("report_pay.php");}
		elseif($_REQUEST["action"]  == 'report_law'){ include("report_law.php");}
		elseif($_REQUEST["action"]  == 'report_coin'){ include("report_coin.php");}
		elseif($_REQUEST["action"]  == 'report_dep_sec'){ include("report_dep_sec.php");}
		elseif($_REQUEST["action"]  == 'report_his'){ include("report_his.php");}
		elseif($_REQUEST["action"]  == 'report_his_h'){ include("report_his_h.php");}
		elseif($_REQUEST["action"]  == 'user'){ include("user.php");}
		elseif($_REQUEST["action"] == "dep_manage")include("dep_manage.php");
		elseif($_REQUEST["action"] == "add_subdivision")include("add_subdivision.php");
		elseif($action ==''){ echo "<center><br><br><br><br><br><span class='style3'>ยินดีต้อนรับเข้าสู่ระบบ</span></center>"; //
		//include("find_person.php");
		?>
		
		<?
		}
	}elseif($_SESSION['username'] == '' ) {
	?><br>
			<br>
	<form name="ff" action="login.php" method="post" >
	<table width="300" height="200" border="0" cellspacing="1" cellpadding="1" align="center"  background="images/MIS/images/Blue.png">
  <tr>
    <td align="center" colspan="2" style="border: #7292B8 1px solid;">
	<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center"  bordercolor="#5FB0F7">
  <tr>
    <td height="48" colspan="2" align="center" class="menuBar_login style11">
			เข้าสู่ระบบ</td>
  </tr>
   
	<tr>
    <td width="40%" align="center" height="35" class="login">
	ชื่อพนักงาน	</td>
	 <td width="60%" align="center" >
<input  type="text" name="user_name"></td>
  </tr>
      <tr class="login">
    <td width="40%" align="center" height="35" >
	รหัสผ่าน	</td>
	 <td width="60%" align="center">
	<input type="password"name="password" >	</td>
  </tr>
  <tr>
	 <td  align="center"  colspan="2" height="50">
<input type="submit" name="go"  value="เข้าสู่ระบบ">&nbsp;&nbsp;
<input  type="reset" name="ffff" value="ยกเลิก"></td>
  </tr>
</table></td>
  </tr>
</table>
</form>
			<?
	} 
	?>	</td>
  </tr>
  </table>
	</td>
	
	
</tr>

</table>
<table  width="900" >
<tr bgcolor="#FFFFFF">
	<td  background="images/MIS1/images/MIS_03.jpg">
	<? include("footer.php")?>	</td>
</tr>
</table>


</td>
</tr>

</center>
</body>
</html>