<?
if($admin_submit <>'' ){
	if(check_name($per_name) ==''){
		$image=$_FILES['image']['name'];
		if ($image <> "") include("include/add_news_files1.php");
		if($year1<>'') $birthday = ($year1-543)."-".$month1."-".$date1;
		if($year2<>'')$date_contain = ($year2-543)."-".$month2."-".$date2;
		if($year3<>'')$date_start = ($year3-543)."-".$month3."-".$date3;
		$max_file_id = file_id();
		$query="INSERT INTO person  (  user_id ,ps_tname_id , name  , birthday , 
			race ,nationality , faith , image , sex , blood ,  id_person , tax_id ,ss_id , occu_old ,occu_new,
		 	fa_name , fa_nation , fa_faith , fa_occu ,   
		 	mo_name , mo_nation , mo_faith , mo_occu ,   
			 mate_name , mate_nation , mate_faith , mate_occu ,   
			num_address , road , moo , subdistrict , district , county ,phone ,mobile ,
			num_address_old , road_old , moo_old , subdistrict_old , district_old , county_old , phone_old ,mobile_old ,
			place_con , num_address_con , road_con , moo_con , subdistrict_con , district_con , county_con ,phone_con ,mobile_con , type_mem  , status_ma )
		VALUES (  '$max_file_id','$ps_tname_id' , '$per_name' , '".$birthday."' , 
		'$race' ,'$nationality' , '$faith' , '$image' , '$sex' , '$blood' ,  '$id_person' , '$tax_id' ,'$ss_id' , '$occu_old' ,'$occu_new',
		 	'$fa_name' , '$fa_nation' , '$fa_faith' , '$fa_occu' ,   
		 	'$mo_name' , '$mo_nation' , '$mo_faith' , '$mo_occu',   
			 '$mate_name' , '$mate_nation' , '$mate_faith' , '$mate_occu' ,   
			'$num_address' , '$road' , '$moo' , '$subdistrict' , '$district' , '$county' , '$phone' ,'$mobile' ,
			'$num_address_old' , '$road_old' , '$moo_old' , '$subdistrict_old' , '$district_old' , '$county_old' ,'$phone_old' ,'$mobile_old' ,
			'$place_con' , '$num_address_con' , '$road_con' ,'$moo_con' , '$subdistrict_con' , '$district_con' , '$county_con' ,'$phone_con' ,'$mobile_con','1' , '$status_ma') ";
		$result=mysql_query($query);	

		echo "<br><br><center><font color=red  size=3>บันทึกข้อมูลเรียบร้อยแล้ว</font>		</center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=personnel_story_h&user_id=$max_file_id\">\n";
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
// เริ่ม XmlHttp Object
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

//dochange จะถูกเรียกเมื่อมีการเลือก รายการ Combobox ซึ่งจะทำให้ไปเรียก AJAX เพื่อร้องขอข้อมูลถัดไปจาก Server
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
	//------------------------------function  นี้มาจาก form-------------------------
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
	//------------------------------function  นี้มาจาก form-------------------------
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
      <td width="100%" height="30" align="center" class="lgBar1"  >&nbsp;นายก/รองนายก/สมาชิกสภา ฯลฯ</td>
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
        <td width="269" class="style_h"><div align="left"> คำนำหน้าชื่อ / ยศ
          &nbsp;&nbsp; </div></td>
        <td width="308"><div align="left">
            <?
			$query="select *  from ps_tname_ref order by ps_tname_item";
			$result=mysql_query($query);
			?>
            <select name="ps_tname_id" class="text">
              <?
			while($d =mysql_fetch_array($result)){
				
	?>
              <option value="<? echo $d[ps_tname_id];?>"
		<?
		if($ps_tname_id == $d[ps_tname_id] or $d[ps_tname_id]  =='00') echo "selected";
		?>
		><? echo $d[ps_tname_item];?></option>
              <? }?>
            </select>
          &nbsp;&nbsp; </div></td>
        <td  height="30" class="style_h"><div align="left"> ชื่อ-สกุล  &nbsp;&nbsp; <font color="#FF0000">*</font></div></td>
        <td width="519"><div align="left">
            <input name="per_name" type="text" id="per_name" value="<?=$per_name?>" size="25" maxlength="100"class="text" />
        </div></td>
      </tr>
	  <tr><td width="269" height="30" class="style_h"><div align="left">เลขประจำตัวประชาชน</div></td>
        <td ><div align="left">
            <input name="id_person" type="text" size="15" maxlength="20" value="<?=$id_person?>" class="text" />
        </div></td>
	
        	
        <td width="202" class="style_h"><div align="left">วัน เดือน ปี เกิด </div></td>
        <td  height="30"   colspan="3" class="style_h"><div align="left" >วันที่ 
        <select name="date1" id="date1" class="text">
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
        <select name="month1" id="month1" class="text">
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
        <input name="year1" type="text" id="year1" size="3" class="text" maxlength="4">
            </div></td>
      </tr>
      <tr>
        <td class="style_h" ><div align="left">สัญชาติ</div></td>
        <td width="308"><div align="left">
          <input name="nationality" type="text" size="10"  value="<?=$nationality?>" class="text"/>
        </div></td>
        <td width="202" class="style_h"><div align="left">เชื้อชาติ</div></td>
        <td width="519"><div align="left">
            <input name="race" type="text" size="10"  value="<?=$race?>"class="text" />
        </div></td>
      </tr>
      <tr>
        <td class="style_h" ><div align="left">ศาสนา</div></td>
        <td width="308"><div align="left">
            <input name="faith" type="text" size="10"  value="<?=$faith?>" class="text">
        </div></td>
        <td width="202" class="style_h"><div align="left">กรุ๊ปแลือด</div></td>
        <td width="519"><div align="left">
            <input name="blood" type="text" size="10"  value="<?=$blood?>" class="text"/>
        </div></td>
      </tr>
	  
	  <tr>
		<td width="269" class="style_h"><div align="left">เพศ</div></td>
                <td  ><div align="left">
                    <input name="sex" size="15"  value="หญิง"  type="radio" <? if($sex =='หญิง') echo "checked"?> class="text"/> &nbsp;&nbsp;หญิง&nbsp;&nbsp;
					<input name="sex" size="15"  value="ชาย"  type="radio" <? if($sex =='ชาย') echo "checked"?> class="text"/> &nbsp;&nbsp;ชาย
                </div></td>
<td width="202" class="style_h"><div align="left">สถานภาพครอบครัว</div></td>
                <td  ><div align="left"><select name="status_ma" class="text">
				<option value="">- - - เลือก - -  -</option>
				<option value="โสด">โสด</option>
				<option value="สมรส">สมรส</option>
				<option value="หม้าย">หม้าย</option>
				<option value="หย่าร้าง">หย่าร้าง</option>
                  </select>
                </div></td>
	    </tr>
		<tr>
        <td class="style_h" ><div align="left">อาชีพเดิม</div></td>
        <td width="308"><div align="left">
          <input name="occu_old" type="text" size="15"  value="<?=$occu_old?>" class="text"/>
        </div></td>
        <td width="202" class="style_h"><div align="left">อาชีพปัจจุบัน</div></td>
        <td width="519"><div align="left">
            <input name="occu_new" type="text" size="15"  value="<?=$occu_new?>"class="text" />
        </div></td>
      </tr>
	  <tr>
                <td   colspan="4"><div align="left">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
     <td width="338"  class="style_h"><div align="left">บิดาชื่อ</div></td>
    <td width="357"><div align="left"><input name="fa_name" type="text" size="15"  value="<?=$fa_name?>" class="text"/></div></td>
     <td width="100"  class="style_h"><div align="left">สัญชาติ</div></td>
    <td width="100">&nbsp;
      <input name="fa_nation" type="text" size="5"  value="<?=$fa_nation?>" class="text"/></td>
      <td width="100"  class="style_h"><div align="left">ศาสนา</div></td>
    <td width="100">&nbsp;
      <input name="fa_faith" type="text" size="5"  value="<?=$fa_faith?>" class="text"/></td>
     <td width="100"  class="style_h"><div align="left">อาชีพ</div></td>
    <td width="100">&nbsp;
      <input name="fa_occu" type="text" size="5"  value="<?=$fa_occu?>" class="text"/></td>
  </tr>


  <tr>
     <td width="338"  class="style_h"><div align="left">มารดาชื่อ</div></td>
    <td width="357"><div align="left"><input name="mo_name" type="text" size="15"  value="<?=$mo_name?>" class="text"/></div></td>
     <td width="100"  class="style_h"><div align="left">สัญชาติ</div></td>
    <td width="100">&nbsp;
      <input name="mo_nation" type="text" size="5"  value="<?=$mo_nation?>" class="text"/></td>
      <td width="100"  class="style_h"><div align="left">ศาสนา</div></td>
    <td width="100">&nbsp;
      <input name="mo_faith" type="text" size="5"  value="<?=$mo_faith?>" class="text"/></td>
     <td width="100"  class="style_h"><div align="left">อาชีพ</div></td>
    <td width="100">&nbsp;
      <input name="mo_occu" type="text" size="5"  value="<?=$mo_occu?>" class="text"/></td>
  </tr>

  <tr>
     <td width="338"  class="style_h"><div align="left">คู่สมรสชื่อ</div></td>
    <td width="357"><div align="left"><input name="mate_name" type="text" size="15"  value="<?=$mate_name?>" class="text"/></div></td>
     <td width="100"  class="style_h"><div align="left">สัญชาติ</div></td>
    <td width="100">&nbsp;
      <input name="mate_nation" type="text" size="5"  value="<?=$mate_nation?>" class="text"/></td>
      <td width="100"  class="style_h"><div align="left">ศาสนา</div></td>
    <td width="100">&nbsp;
      <input name="mate_faith" type="text" size="5"  value="<?=$mate_faith?>" class="text"/></td>
     <td width="100"  class="style_h"><div align="left">อาชีพ</div></td>
    <td width="100">&nbsp;
      <input name="mate_occu" type="text" size="5"  value="<?=$mate_occu?>" class="text"/></td>
  </tr>
</table>

                </div></td>

	    </tr>
		   <tr>
	  <td width="269" class="style_h"><div align="left">รูปภาพ </div></td>
        <td  height="30"  colspan="3"><div align="left">
		  <input type="file" name="image" size="40"  value="<?=$image?>"maxlength="255" class="text">
		  </div>		  </td>
		  </tr>
		  
		    <tr>
        <td colspan="4" ><br />
            <fieldset>
            <legend align="left" > <span class="logout"  >ภูมิลำเนาเดิม </span> </legend>
              <br />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" class="style_h"><div align="left">เลขที่ </div></td>
                <td width="19%"><div align="left">
                    <input name="num_address_old" type="text"  size="10"  value="<?=$num_address_old?>" class="text"/>
                </div></td> 
				<td width="10%" class="style_h"><div align="left">หมู่ที่</div></td>
                <td width="24%"><div align="left">
                    <input name="moo_old" type="text" size="10"   value="<?=$moo_old?>" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">ถนน</div></td>
                <td width="19%"><div align="left">
                    <input name="road_old" type="text" size="10"  value="<?=$road_old?>" class="text"/>
                </div></td>
              </tr>
              <tr>
             
               <td width="20%" class="style_h"><div align="left">ตำบล </div></td>
                <td width="19%"><div align="left">
                    <input name="subdistrict_old" type="text"  value="<?=$subdistrict_old?>" size="10" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">อำเภอ</div></td>
                <td width="19%"><div align="left">
                    <input name="district_old" type="text"   value="<?=$district_old?>"size="10" class="text"/>
                </div></td>
				   <td width="10%" class="style_h"><div align="left">จังหวัด</div></td>
                <td width="24%"><div align="left">
                    <input name="county_old"  value="<?=$county_old?>" type="text" size="10" class="text"/>
                </div></td>
              </tr>
              <tr>
                <td width="8%" class="style_h"><div align="left">โทรศัพท์หมายเลข</div></td>
                <td width="19%" ><div align="left">
                    <input name="phone_old" type="text" size="20"  value="<?=$phone_old?>" maxlength="31" class="text"/>
                </div></td>
				 <td width="8%" class="style_h"><div align="left">มือถือ</div></td>
                <td width="19%" ><div align="left">
                    <input name="mobile_old" type="text" size="20"  value="<?=$mobile_old?>" maxlength="31" class="text"/>
                </div></td>
              </tr>
   
            </table>
            </fieldset></td>
      </tr>
	  
      <tr>
        <td colspan="4" ><br />
            <fieldset>
            <legend align="left" > <span class="logout"  >ภูมิลำเนาปัจจุบัน </span> </legend>
              <br />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" class="style_h"><div align="left">เลขที่ </div></td>
                <td width="19%"><div align="left">
                    <input name="num_address" type="text"  size="10"  value="<?=$num_address?>" class="text"/>
                </div></td> 
				<td width="10%" class="style_h"><div align="left">หมู่ที่</div></td>
                <td width="24%"><div align="left">
                    <input name="moo" type="text" size="10"   value="<?=$moo?>" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">ถนน</div></td>
                <td width="19%"><div align="left">
                    <input name="road" type="text" size="10"  value="<?=$road?>" class="text"/>
                </div></td>
              </tr>
              <tr>
                 
               <td width="20%" class="style_h"><div align="left">ตำบล </div></td>
                <td width="19%"><div align="left">
                    <input name="subdistrict" type="text"  value="<?=$subdistrict?>" size="10" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">อำเภอ</div></td>
                <td width="19%"><div align="left">
                    <input name="district" type="text"   value="<?=$district?>"size="10" class="text"/>
                </div></td> 
				<td width="10%" class="style_h"><div align="left">จังหวัด</div></td>
                <td width="24%"><div align="left">
                    <input name="county"  value="<?=$county?>" type="text" size="10" class="text"/>
                </div></td>
              </tr>
              <tr>
	
                <td width="8%" class="style_h"><div align="left">โทรศัพท์หมายเลข</div></td>
                <td width="19%" ><div align="left">
                    <input name="phone" type="text" size="20"  value="<?=$phone?>" maxlength="31" class="text"/>
                </div></td> <td width="8%" class="style_h"><div align="left">มือถือ</div></td>
                <td width="19%" ><div align="left">
                    <input name="mobile" type="text" size="20"  value="<?=$mobile?>" maxlength="31" class="text"/>
                </div></td>
              </tr>
     
            </table>
            </fieldset></td>
      </tr>
	  
	  
	    <tr>
        <td colspan="4" ><span class="logout"><br />
            </span>
          <fieldset>
            <legend align="left" ><span class="logout"> สถานที่ที่สามารถติดต่อได้สะดวก</span>  </legend>
              <br />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
                <td width="20%" class="style_h"><div align="left">สถานที่ที่สามารถติดต่อได้สะดวก</div></td>
                <td  colspan="5"><div align="left">
                    <input name="place_con" type="text"  size="40"  value="<?=$place_con?>" class="text"/>
                </div></td> 
              </tr>
              <tr>
                <td width="20%" class="style_h"><div align="left">เลขที่ </div></td>
                <td width="19%"><div align="left">
                    <input name="num_address_con" type="text"  size="10"  value="<?=$num_address_con?>" class="text"/>
                </div></td> 
				<td width="10%" class="style_h"><div align="left">หมู่ที่</div></td>
                <td width="24%"><div align="left">
                    <input name="moo_con" type="text" size="10"   value="<?=$moo_con?>" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">ถนน</div></td>
                <td width="19%"><div align="left">
                    <input name="road_con" type="text" size="10"  value="<?=$road_con?>" class="text"/>
                </div></td>
              </tr>
              <tr>
                 
               <td width="20%" class="style_h"><div align="left">ตำบล </div></td>
                <td width="19%"><div align="left">
                    <input name="subdistrict_con" type="text"  value="<?=$subdistrict_con?>" size="10" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">อำเภอ</div></td>
                <td width="19%"><div align="left">
                    <input name="district_con" type="text"   value="<?=$district_con?>"size="10" class="text"/>
                </div></td> 
				<td width="10%" class="style_h"><div align="left">จังหวัด</div></td>
                <td width="24%"><div align="left">
                    <input name="county_con"  value="<?=$county_con?>" type="text" size="10" class="text"/>
                </div></td>
              </tr>
              <tr>
	
                <td width="8%" class="style_h"><div align="left">โทรศัพท์หมายเลข</div></td>
                <td width="19%" ><div align="left">
                    <input name="phone_con" type="text" size="20"  value="<?=$phone_con?>" maxlength="31" class="text"/>
                </div></td> <td width="8%" class="style_h"><div align="left">มือถือ</div></td>
                <td width="19%" ><div align="left">
                    <input name="mobile_con" type="text" size="20"  value="<?=$mobile_con?>" maxlength="31" class="text"/>
                </div></td>
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
	$sql1 ="select *  from person  where  name  ='$name'  and type_mem = 1 and status =0 ";
	$result = mysql_query($sql1);
	$rs = mysql_fetch_array($result);
	return $rs['name'];
}
?>