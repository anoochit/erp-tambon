<?
if($admin_submit <>'' ){
	if(check_name($per_name) ==''){
		$image=$_FILES['image']['name'];
		if ($image <> "") include("include/add_news_files1.php");
		if($year1<>'') $birthday = ($year1-543)."-".$month1."-".$date1;
		if($year2<>'')$date_contain = ($year2-543)."-".$month2."-".$date2;
		if($year3<>'')$date_start = ($year3-543)."-".$month3."-".$date3;
		$max_file_id = file_id();
		$query="INSERT INTO person  (  user_id ,ps_tname_id , name  , birthday , fa_name , mo_name , id_person , tax_id ,ss_id , num_address , road , soi , 
		subdistrict , district , county ,zip_code,address , phone ,blood ,race ,nationality , faith , image , 
		mate_name , office , ruck , tel , type_work ,reseve ,id_serv ,date_contain,date_start  )
		VALUES (  '$max_file_id','$ps_tname_id' , '$per_name' ,
		 '".$birthday."' , 
		'$fa_name' , '$mo_name' , '$id_person' , '$tax_id' ,'$ss_id' , '$num_address' , '$road' , '$soi' , '$subdistrict' 
		 , '$district' , '$county' ,'$zip_code','$address' , '$phone' ,'$blood' ,'$race' ,'$nationality' , '$faith' , 
		'$image' , '$mate_name' , '$office' , '$ruck' , '$tel' ,'$type_work' ,'$reseve','$id_serv' ,'".$date_contain."','".$date_start."' ) ";
		$result=mysql_query($query);	

		echo "<br><br><center><font color=red  size=3>บันทึกข้อมูลเรียบร้อยแล้ว</font>		</center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=personnel_story&user_id=$max_file_id\">\n";
	}else{
		echo "<br><br><center><font color=red  size=3>ชื่อสกุลซ้ำกรุณากรอกข้อมูลใหม่</font>		</center><br><br>";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ทะเบียนประวัติพนักงาน</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
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
function result1(){
		var num1 =document.form1.div_id.value;
		var num2 =document.form1.pos_id.value;
		var url = 'ajax_1.php?num1=' + num1+'&num2='+num2; 
		xmlhttp = uzXmlHttp();
		xmlhttp.open("GET", url, false);
		xmlhttp.send(null); 
		result = xmlhttp.responseText;
 		p =result.split(',')
		document.form1.per_id1.value  = p[0];
		document.form1.per_id.value  = p[1];
	}
</script>
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
                    document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
               } 
          }
     };
     req.open("GET", "ajax_2.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}
</script>
<script language="javascript">
	function validate(theForm) 
	{
		if (  document.form1.per_name.value =='' || document.form1.per_name.value == ' ')
           {
           alert("กรุณากรอกชื่อสกุล");
           document.form1.per_name.focus();           
           return false;
           }
		return true;
	}
</script>
<script language="JavaScript" type="text/javascript">
	function validate(theForm) 
	{
		if (  document.add_user.div_name.value=='' || document.add_user.div_name.value==' ' )
           {
           alert("กรุณาเลือกกอง");
           document.add_user.div_name.focus();           
           return false;
           }
		   if (  document.add_user.sub_name.value=='' || document.add_user.sub_name.value==' ' )
           {
           alert("กรุณาเลือกฝ่าย");
           document.add_user.sub_name.focus();           
           return false;
           }
		    if (  document.add_user.level.value=='' || document.add_user.level.value==' ' )
           {
           alert("กรุณาเลือกระดับการใช้งาน");
           document.add_user.level.focus();           
           return false;
           }
		    if (  document.add_user.u_name.value=='' || document.add_user.u_name.value==' ' )
           {
           alert("กรุณากรอกชื่อผู้ใช้");
           document.add_user.u_name.focus();           
           return false;
           }
		    if (  document.add_user.u_surname.value=='' || document.add_user.u_surname.value==' ' )
           {
           alert("กรุณากรอกนามสกุลผู้ใช้");
           document.add_user.u_surname.focus();           
           return false;
           }
		    if (  document.add_user.user_name.value=='' || document.add_user.user_name.value==' ' )
           {
           alert("กรุณากรอก Username");
           document.add_user.user_name.focus();           
           return false;
           }
		   if (  document.add_user.password.value=='' || document.add_user.password.value==' ' )
           {
           alert("กรุณากรอก Password");
           document.add_user.password.focus();           
           return false;
           }
			return true;
	}
</script>
<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" onsubmit="return godel();">
  <table width="100%" border="1" cellpadding="0" cellspacing="0">
    <tr>
      <td width="100%" height="30" align="center" class="lgBar1"  >&nbsp;ทะเบียนประวัติพนักงาน</td>
    </tr>
  </table>
  <div align="center" >
<div style="border:0px solid; width:98%; border-color:#0000FF"  >
<fieldset>
	<legend align="left" >
	<span class="pageName"  >ส่วนที่ 1 : ข้อมูลส่วนตัว</span>
	</legend>
	<br>
	<table width="100%"  cellpadding="0" cellspacing="0" border="0"  align="left">
      <tr>
        <td width="177" class="style_h"><div align="left"> คำนำหน้าชื่อ
          &nbsp;&nbsp; </div></td>
        <td width="254"><div align="left">
            <?
			$query="select *  from ps_tname_ref order by ps_tname_item";
			$result=mysql_query($query);
			?>
            <select name="ps_tname_id">
              <?
			while($d =mysql_fetch_array($result)){
            ?>
              <option value="<? echo $d[ps_tname_id];?>"
		<?
		if($ps_tname_id == $d[ps_tname_id] or $d[ps_tname_id]  =='00') echo "selected";
		?>
		<? echo $d[ps_tname_item];?></option>
              <? }?>
            </select>
          &nbsp;&nbsp; </div></td>
        <td  height="30" class="style_h"><div align="left"> ชื่อ-สกุล  &nbsp;&nbsp; <font color="#FF0000">*</font></div></td>
        <td width="190"><div align="left">
            <input name="per_name" type="text" id="per_name" value="<?=$per_name?>" size="30" maxlength="100" />
        </div></td>
      </tr>
	  <tr><td width="177" height="30" class="style_h"><div align="left">เลขประจำตัวประชาชน</div></td>
        <td ><div align="left">
            <input name="id_person" type="text" size="20" maxlength="13" value="<?=$id_person?>"  />
        </div></td>
	
        <td class="style_h" ><div align="left">เลขประจำตัวผู้เสียภาษี</div></td>
        <td width="190"><div align="left">
            <input name="tax_id" type="text" size="20" maxlength="31"  value="<?=$tax_id?>"/>
        </div></td>	
		</tr>
		<tr>
        <td width="177" class="style_h"><div align="left">เลขประจำตัวบัตรประกันสังคม</div></td>
        <td width="254"><div align="left">
            <input name="ss_id" type="text" size="20" maxlength="31" value="<?=$ss_id?>" />
        </div></td>
		        <td width="187" height="30" class="style_h"><div align="left">เลขบัตรข้าราชการ</div></td>
        <td ><div align="left">
            <input name="id_serv" type="text" size="20" maxlength="13" value="<?=$d[id_serv]?>"  />
        </div></td>
      </tr>
      <tr>
        <td width="177" class="style_h"><div align="left">วัน เดือน ปี เกิด </div></td>
        <td  height="30"   colspan="3"><div align="left" class="entry">วันที่ 
        <select name="date1" id="date1">
          <option value=1 selected>1</option>
          <option value=2>2</option>
          <option value=3>3</option>
          <option value=4>4</option>
          <option value=5>5</option>
          <option value=6>6</option>
          <option value=7>7</option>
          <option value=8>8</option>
          <option value=9>9</option>
          <option value=10>10</option>
          <option value=11>11</option>
          <option value=12>12</option>
          <option value=13>13</option>
          <option value=14>14</option>
          <option value=15>15</option>
          <option value=16>16</option>
          <option value=17>17</option>
          <option value=18>18</option>
          <option value=19>19</option>
          <option value=20>20</option>
          <option value=21>21</option>
          <option value=22>22</option>
          <option value=23>23</option>
          <option value=24>24</option>
          <option value=25>25</option>
          <option value=26>26</option>
          <option value=27>27</option>
          <option value=28>28</option>
          <option value=29>29</option>
          <option value=30>30</option>
          <option value=31>31</option>
        </select>
        &nbsp;เดือน 
        <select name="month1" id="month1">
          <option value="01" selected>มกราคม</option>
          <option value=02>กุมภาพันธ์</option>
          <option value=03>มีนาคม</option>
          <option value=04>เมษายน</option>
          <option value=05>พฤษภาคม</option>
          <option value=06>มิถุนายน</option>
          <option value=07>กรกฎาคม</option>
          <option value=08>สิงหาคม</option>
          <option value=09>กันยายน</option>
          <option value=10>ตุลาคม</option>
          <option value=11>พฤศจิกายน</option>
          <option value=12>ธันวาคม</option>
        </select>
        &nbsp; พ.ศ. 
        <input name="year1" type="text" id="year1" size="5">
</div></td>
      </tr>
     <tr>
        <td height="30" class="style_h"><div align="left">วันที่บรรจุ &nbsp;&nbsp; </div></td>
        <td  height="30" colspan="3"><div align="left">วันที่ 
        <select name="date2" id="date2">
          <option value=1 selected>1</option>
          <option value=2>2</option>
          <option value=3>3</option>
          <option value=4>4</option>
          <option value=5>5</option>
          <option value=6>6</option>
          <option value=7>7</option>
          <option value=8>8</option>
          <option value=9>9</option>
          <option value=10>10</option>
          <option value=11>11</option>
          <option value=12>12</option>
          <option value=13>13</option>
          <option value=14>14</option>
          <option value=15>15</option>
          <option value=16>16</option>
          <option value=17>17</option>
          <option value=18>18</option>
          <option value=19>19</option>
          <option value=20>20</option>
          <option value=21>21</option>
          <option value=22>22</option>
          <option value=23>23</option>
          <option value=24>24</option>
          <option value=25>25</option>
          <option value=26>26</option>
          <option value=27>27</option>
          <option value=28>28</option>
          <option value=29>29</option>
          <option value=30>30</option>
          <option value=31>31</option>
        </select>
        &nbsp;เดือน 
        <select name="month2" id="month2">
          <option value="01" selected>มกราคม</option>
          <option value=02>กุมภาพันธ์</option>
          <option value=03>มีนาคม</option>
          <option value=04>เมษายน</option>
          <option value=05>พฤษภาคม</option>
          <option value=06>มิถุนายน</option>
          <option value=07>กรกฎาคม</option>
          <option value=08>สิงหาคม</option>
          <option value=09>กันยายน</option>
          <option value=10>ตุลาคม</option>
          <option value=11>พฤศจิกายน</option>
          <option value=12>ธันวาคม</option>
        </select>
        &nbsp; พ.ศ. 
        <input name="year2" type="text" id="year2" size="5">
</div></td>
		   </tr>
	  <tr>
        <td width="177" class="style_h"><div align="left">วันเริ่มปฏิบัติราชการ</div></td>
        <td height="30" colspan="3"><div align="left">วันที่ 
        <select name="date3" id="date3">
          <option value=1 selected>1</option>
          <option value=2>2</option>
          <option value=3>3</option>
          <option value=4>4</option>
          <option value=5>5</option>
          <option value=6>6</option>
          <option value=7>7</option>
          <option value=8>8</option>
          <option value=9>9</option>
          <option value=10>10</option>
          <option value=11>11</option>
          <option value=12>12</option>
          <option value=13>13</option>
          <option value=14>14</option>
          <option value=15>15</option>
          <option value=16>16</option>
          <option value=17>17</option>
          <option value=18>18</option>
          <option value=19>19</option>
          <option value=20>20</option>
          <option value=21>21</option>
          <option value=22>22</option>
          <option value=23>23</option>
          <option value=24>24</option>
          <option value=25>25</option>
          <option value=26>26</option>
          <option value=27>27</option>
          <option value=28>28</option>
          <option value=29>29</option>
          <option value=30>30</option>
          <option value=31>31</option>
        </select>
        &nbsp;เดือน 
        <select name="month3" id="month3">
          <option value="01" selected>มกราคม</option>
          <option value=02>กุมภาพันธ์</option>
          <option value=03>มีนาคม</option>
          <option value=04>เมษายน</option>
          <option value=05>พฤษภาคม</option>
          <option value=06>มิถุนายน</option>
          <option value=07>กรกฎาคม</option>
          <option value=08>สิงหาคม</option>
          <option value=09>กันยายน</option>
          <option value=10>ตุลาคม</option>
          <option value=11>พฤศจิกายน</option>
          <option value=12>ธันวาคม</option>
        </select>
        &nbsp; พ.ศ. 
        <input name="year3" type="text" id="year3" size="5">
</div></td>
      </tr>
      <tr>
		 <td width="207" class="style_h"><div align="left">ประเภทข้าราชการ</div></td>
        <td width="349" colspan="3"><div align="left">
            <input name="type_work" type="text" size="20"  value="<?=$d[type_work]?>"/>
        </div></td>
      </tr>
      <tr>
        <td class="style_h" ><div align="left">สัญชาติ</div></td>
        <td width="254"><div align="left">
          <input name="nationality" type="text" size="20"  value="<?=$nationality?>" />
        </div></td>
        <td width="110" class="style_h"><div align="left">เชื้อชาติ</div></td>
        <td width="190"><div align="left">
            <input name="race" type="text" size="20"  value="<?=$race?>" />
        </div></td>
      </tr>
      <tr>
        <td class="style_h" ><div align="left">ศาสนา</div></td>
        <td width="254"><div align="left">
            <input name="faith" type="text" size="20"  value="<?=$faith?>"/>
        </div></td>
        <td width="110" class="style_h"><div align="left">กรุ๊ปแลือด</div></td>
        <td width="190"><div align="left">
            <input name="blood" type="text" size="20"  value="<?=$blood?>"/>
        </div></td>
      </tr>
      <tr>
          <td width="177" class="style_h"><div align="left">ชื่อบิดา</div></td>
                <td  ><div align="left">
                    <input name="fa_name" type="text" size="30"  value="<?=$fa_name?>"/>
                </div></td>
		  <td width="110" class="style_h"><div align="left">ชื่อมารดา</div></td>
                <td  ><div align="left">
                    <input name="mo_name" type="text" size="30"  value="<?=$mo_name?>"/>
                </div></td>
        </tr>
		<tr>
	  <td width="177" class="style_h"><div align="left">สมัคร กบข. </div></td>
        <td  height="30"  colspan="3"><div align="left">
		  <input  type="radio" name="reseve" value="Y"  <? if($reseve == 'Y') echo "checked"?>/> &nbsp;&nbsp;สะสม&nbsp;&nbsp;
		    <input type="radio" name="reseve" value="N" <? if($reseve == 'N') echo "checked"?>/> &nbsp;&nbsp;ไม่สะสม&nbsp;&nbsp;
		  </div>		  </td>
	    </tr>
		   <tr>
	  <td width="177" class="style_h"><div align="left">รูปภาพ </div></td>
        <td  height="30"  colspan="3"><div align="left">
		  <input type="file" name="image" size="40"  value="<?=$image?>"maxlength="255">
		  </div>		  </td>
		  </tr>
      <tr>
        <td colspan="4" ><br />
            <fieldset>
            <legend align="left" > <span class="pageName"  >ที่อยู่ตามทะเบียนบ้าน </span> </legend>
              <br />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" class="style_h"><div align="left">เลขที่ </div></td>
                <td width="19%"><div align="left">
                    <input name="num_address" type="text"  size="10"  value="<?=$num_address?>"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">ถนน</div></td>
                <td width="19%"><div align="left">
                    <input name="road" type="text" size="10"  value="<?=$road?>"/>
                </div></td>
                <td width="10%" class="style_h"><div align="left">ซอย</div></td>
                <td width="24%"><div align="left">
                    <input name="soi" type="text" size="10"   value="<?=$soi?>"/>
                </div></td>
              </tr>
              <tr>
                <td width="20%" class="style_h"><div align="left">ตำบล </div></td>
                <td width="19%"><div align="left">
                    <input name="subdistrict" type="text"  value="<?=$subdistrict?>" size="10"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">อำเภอ</div></td>
                <td width="19%"><div align="left">
                    <input name="district" type="text"   value="<?=$district?>"size="10"/>
                </div></td>
                <td width="10%" class="style_h"><div align="left">จังหวัด</div></td>
                <td width="24%"><div align="left">
                    <input name="county"  value="<?=$county?>" type="text" size="10" />
                </div></td>
              </tr>
              <tr>
                <td width="20%" class="style_h"><div align="left">รหัสไปรษณีย์</div></td>
                <td width="19%"><div align="left">
                    <input name="zip_code"  value="<?=$zip_code?>" type="text" size="10"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">โทรศัพท์</div></td>
                <td width="19%" colspan="2"><div align="left">
                    <input name="phone" type="text" size="20"  value="<?=$phone?>" maxlength="31"/>
                </div></td>

                <td width="24%"><div align="left"></div></td>
              </tr>
              <tr>
                <td width="20%" class="style_h"><div align="left">ที่อยู่ที่ติดต่อได้ </div></td>
                <td  colspan="5"><div align="left">
                    <input name="address" type="text" size="80"  value="<?=$address?>"/>
                </div></td>
              </tr>
            </table>
            </fieldset></td>
      </tr>
	   <tr>
        <td colspan="4" ><br />
            <fieldset>
            <legend align="left" > <span class="pageName"  >ข้อมูลคู่สมรส</span> </legend>
              <br />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
        <td width="134"  height="30" class="style_h"><div align="left"> ชื่อคู่สมรส &nbsp;&nbsp; </div></td>
        <td width="308"><div align="left">
            <input name="mate_name" type="text" id="mate_name" value="<?=$mate_name?>" size="20" maxlength="100" />
        </div></td>
		<td width="168" class="style_h" ><div align="left">สถานที่ทำงาน</div>		</td>
		<td width="324" ><div align="left">
                <input name="office" type="text" size="25" maxlength="255"value="<?=$office?>" /></div>           </td>
      </tr>
              <tr>
        <td  height="30" class="style_h"><div align="left"> ตำแหน่ง&nbsp;&nbsp; </div></td>
        <td width="308"><div align="left">
            <input name="ruck" type="text" id="ruck" value="<?=$ruck?>" size="25" maxlength="100" />
        </div></td>
		<td class="style_h" ><div align="left">เบอร์โทร</div>		</td>
		<td ><div align="left">
                <input name="tel" type="text" size="10" maxlength="255"value="<?=$tel?>" /></div>           </td>
      </tr>
            </table>
            </fieldset></td>
      </tr>
      <tr>
        <td colspan="10" height="30" align="center"><!--return godel(); -->
		<input name="admin_submit" type="submit" value="บันทึกข้อมูล" onClick="return validate();" />
          &nbsp;
          <input name="back"  type="button"value=" กลับ "  onclick="window.navigate('index.php')"/>        </td>
      </tr>
    </table>
	<br>
</fieldset>

</div>
</div>
</form>
</body>
</html>
<?
function file_id(){

	$sql1 = "SELECT max(user_id) as max FROM person  ";
	$result1 = mysql_query($sql1);
	$rs1 = mysql_fetch_array($result1);
	if($rs1["max"] == '' or $rs1["max"] == ''){
		return 1;
	}else{
		return $rs1["max"] + 1;
	}
}
?><script language="javascript">
function godel()
{
	if (confirm("คุณต้องการบันทึกข้อมูล ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
function godel_1()
{
	if (confirm("คุณต้องการบันทึกข้อมูลที่แก้ไข ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
<?
function check_name($name){
	$sql1 ="select *  from person  where  name  ='$name' ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['name'];
}
?>