<?
include('config.inc.php');

if($Go <> ''){
		if ($image <> ""){
				 include("include/add_news_files1.php");
			 	$upimage =" ,image = '$image' ";
		}else{
				$upimage ="  ";
		}
		if($year1<>'') $birthday = ($year1-543)."-".$month1."-".$date1;

		$sql_order = " UPDATE person  SET ps_tname_id = '$ps_tname_id' , name  =  '$per_name'  , birthday = '".$birthday."'  , race = '$race' ,nationality = '$nationality' , faith ='$faith'  , image =  '$image' , sex  = '$sex' ,
		blood = '$blood',  id_person = '$id_person', tax_id = '$tax_id' ,ss_id ='$ss_id'  , occu_old ='$occu_old'   ,occu_new = '$occu_new',fa_name ='$fa_name'  , fa_nation ='$fa_nation' , fa_faith = '$fa_faith', fa_occu = '$fa_occu' ,   
		mo_name = '$mo_name' , mo_nation ='$mo_nation'  , mo_faith ='$mo_faith'  , mo_occu =  '$mo_occu',   mate_name = '$mate_name'  , mate_nation = '$mate_nation' , mate_faith = '$mate_faith' , mate_occu = '$mate_occu' ,   
		num_address  = '$num_address', road = '$road' , moo =  '$moo' , subdistrict =  '$subdistrict', district  = '$district', county = '$county' ,phone ='$phone'   ,mobile = '$mobile' ,num_address_old = '$num_address_old', 
		road_old  = '$road_old' , moo_old =  '$moo_old' , subdistrict_old = '$subdistrict_old' , district_old  = '$district_old', county_old = '$county_old' , phone_old = '$phone_old' ,mobile_old = '$mobile_old' ,place_con ='$place_con'  , 
		num_address_con = '$num_address_con' , road_con = '$road_con', moo_con = '$moo_con'  , subdistrict_con = '$subdistrict_con'  , district_con = '$district_con', county_con  = '$county_con',phone_con ='$phone_con',
		mobile_con = '$mobile_con', status = '$status' , status_ma = '$status_ma'
		WHERE user_id = '$user_id' ";
		
		echo $sql_order."<br>";
		$result_open = mysql_query($sql_order);
		
		?>
<script language="JavaScript">
	window.opener.location.reload();
	window.close();
</script>   
<? }?>
<?
if($del == 'delete'){
	$image = $_REQUEST["image"];
	unlink("files/$image"); 
	$sql_del = "UPDATE person SET image =''  WHERE user_id='$user_id' ";
	$result_del = mysql_query($sql_del);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ทะเบียนประวัติพนักงาน</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script language="JavaScript" src="calendar.js"></script>
<link href="calendar-mos.css" rel="stylesheet" type="text/css"> 
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
<body>
  <?
	  //-----------เรียกข้อมูล-------------------
   $sql="SELECT * FROM person p , ps_tname_ref ps WHERE p.ps_tname_id = ps.ps_tname_id and p.user_id=$user_id";
   $result = mysql_query($sql, $connect);
   $d =mysql_fetch_array($result);
 ?>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="100%" align="center" height="30">&nbsp;แก้ไขทะเบียนประวัติพนักงาน</td>
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
        <td width="160" class="style_h"><div align="left"> คำนำหน้าชื่อ
        
          &nbsp;&nbsp; </div></td>
        <td width="353"><div align="left">
            <?
			$query="select *  from ps_tname_ref order by ps_tname_item";
			$result=mysql_query($query);
			?>
            <select name="ps_tname_id" class="text">
              <?
			while($d1 =mysql_fetch_array($result)){
				
	?>
              <option value="<? echo $d1[ps_tname_id];?>"
		<?
		if($d[ps_tname_id] == $d1[ps_tname_id] ) echo "selected";
		?>
		><? echo $d1[ps_tname_item];?></option>
              <? }?>
            </select>
          &nbsp;&nbsp; </div></td>
        <td  height="30" class="style_h"><div align="left"> ชื่อ-สกุล  &nbsp;&nbsp; </div></td>
        <td width="541"><div align="left">
            <input name="per_name" type="text" id="per_name" value="<?=$d[name]?>" size="30" maxlength="100" class="text"/>
        </div></td>
      </tr>
      <tr>

		  <td width="160" height="30" class="style_h"><div align="left">เลขประจำตัวประชาชน</div></td>
        <td ><div align="left">
            <input name="id_person" type="text" size="20" maxlength="20" value="<?=$d[id_person]?>"  class="text"/>
        </div></td>
        <td width="244" class="style_h"><div align="left">วัน เดือน ปี เกิด </div></td>
        <td  height="30"   colspan="3"><div align="left" class="entry">
            <?  if($d[birthday] <>'0000-00-00') $j1 = explode("-",$d[birthday]); ?>วันที่ 
        <select name="date1" id="date1" class="text">
          <option value=1 <? if($j1[2] =='1') echo "selected"?> >1</option>
          <option value=2 <? if($j1[2] =='2') echo "selected"?>>2</option>
          <option value=3 <? if($j1[2] =='3') echo "selected"?>>3</option>
          <option value=4 <? if($j1[2] =='4') echo "selected"?>>4</option>
          <option value=5 <? if($j1[2] =='5') echo "selected"?>>5</option>
          <option value=6 <? if($j1[2] =='6') echo "selected"?>>6</option>
          <option value=7 <? if($j1[2] =='7') echo "selected"?>>7</option>
          <option value=8 <? if($j1[2] =='8') echo "selected"?>>8</option>
          <option value=9 <? if($j1[2] =='9') echo "selected"?>>9</option>
          <option value=10 <? if($j1[2] =='10') echo "selected"?>>10</option>
          <option value=11 <? if($j1[2] =='11') echo "selected"?>>11</option>
          <option value=12 <? if($j1[2] =='12') echo "selected"?>>12</option>
          <option value=13 <? if($j1[2] =='13') echo "selected"?>>13</option>
          <option value=14 <? if($j1[2] =='14') echo "selected"?>>14</option>
          <option value=15 <? if($j1[2] =='15') echo "selected"?>>15</option>
          <option value=16 <? if($j1[2] =='16') echo "selected"?>>16</option>
          <option value=17 <? if($j1[2] =='17') echo "selected"?>>17</option>
          <option value=18 <? if($j1[2] =='18') echo "selected"?>>18</option>
          <option value=19 <? if($j1[2] =='19') echo "selected"?>>19</option>
          <option value=20 <? if($j1[2] =='20') echo "selected"?>>20</option>
          <option value=21 <? if($j1[2] =='21') echo "selected"?>>21</option>
          <option value=22 <? if($j1[2] =='22') echo "selected"?>>22</option>
          <option value=23 <? if($j1[2] =='23') echo "selected"?>>23</option>
          <option value=24 <? if($j1[2] =='24') echo "selected"?>>24</option>
          <option value=25 <? if($j1[2] =='25') echo "selected"?>>25</option>
          <option value=26 <? if($j1[2] =='26') echo "selected"?>>26</option>
          <option value=27 <? if($j1[2] =='27') echo "selected"?>>27</option>
          <option value=28 <? if($j1[2] =='28') echo "selected"?>>28</option>
          <option value=29 <? if($j1[2] =='29') echo "selected"?>>29</option>
          <option value=30 <? if($j1[2] =='30') echo "selected"?>>30</option>
          <option value=31 <? if($j1[2] =='31') echo "selected"?>>31</option>
        </select>
        &nbsp;เดือน 
        <select name="month1" id="month1"class="text">
          <option value="01" <? if($j1[1] =='01') echo "selected"?>>มกราคม</option>
          <option value=02  <? if($j1[1] =='02') echo "selected"?>>กุมภาพันธ์</option>
          <option value=03  <? if($j1[1] =='03') echo "selected"?>>มีนาคม</option>
          <option value=04  <? if($j1[1] =='04') echo "selected"?>>เมษายน</option>
          <option value=05  <? if($j1[1] =='05') echo "selected"?>>พฤษภาคม</option>
          <option value=06  <? if($j1[1] =='06') echo "selected"?>>มิถุนายน</option>
          <option value=07  <? if($j1[1] =='07') echo "selected"?>>กรกฎาคม</option>
          <option value=08  <? if($j1[1] =='08') echo "selected"?>>สิงหาคม</option>
          <option value=09  <? if($j1[1] =='09') echo "selected"?>>กันยายน</option>
          <option value=10  <? if($j1[1] =='10') echo "selected"?>>ตุลาคม</option>
          <option value=11  <? if($j1[1] =='11') echo "selected"?>>พฤศจิกายน</option>
          <option value=12  <? if($j1[1] =='12') echo "selected"?>>ธันวาคม</option>
        </select>
        &nbsp; พ.ศ. 
        <input name="year1" type="text" id="year1" size="3" maxlength="4" value="<? if($j1[0] <>'') echo $j1[0]+543?>" class="text">
		</div>
</td>
      </tr>
      <tr>
        <td class="style_h" ><div align="left">สัญชาติ</div></td>
        <td width="353"><div align="left">
          <input name="nationality" type="text" size="20" value="<?=$d[nationality]?>"  class="text"  />
        </div></td>
        <td width="244" class="style_h"><div align="left">เชื้อชาติ</div></td>
        <td width="541"><div align="left">
            <input name="race" type="text" size="20" value="<?=$d[race]?>"   class="text" />
        </div></td>
      </tr>

	  <tr>
        <td class="style_h" ><div align="left">ศาสนา</div></td>
        <td width="353"><div align="left">
            <input name="faith" type="text" size="20" value="<?=$d[faith]?>" class="text" />
        </div></td>
        <td width="244" class="style_h"><div align="left">กรุ๊ปแลือด</div></td>
        <td width="541"><div align="left">
            <input name="blood" type="text" size="20" value="<?=$d[blood]?>"class="text" />
        </div></td>
      </tr>
	        <tr>
        <td class="style_h" ><div align="left">เพศ</div></td>
        <td ><div align="left">
            <input name="sex" size="15"  value="หญิง"  type="radio" <? if($d[sex]=='หญิง') echo "checked"?> class="text"/> &nbsp;&nbsp;หญิง&nbsp;&nbsp;
					<input name="sex" size="15"  value="ชาย"  type="radio" <? if($d[sex]=='ชาย') echo "checked"?> class="text"/> &nbsp;&nbsp;ชาย
        </div></td>
		<td width="269" class="style_h"><div align="left">สถานภาพครอบครัว</div></td>
                <td  ><div align="left"><select name="status_ma" class="text">
				<option value="" <? if($d[status_ma] == '') echo "selected"?>>- - - เลือก - -  -</option>
				<option value="โสด" <? if($d[status_ma] == 'โสด') echo "selected"?>>โสด</option>
				<option value="สมรส" <? if($d[status_ma] == 'สมรส') echo "selected"?>>สมรส</option>
				<option value="หม้าย" <? if($d[status_ma] == 'หม้าย') echo "selected"?>>หม้าย</option>
				<option value="หย่าร้าง" <? if($d[status_ma] == 'หย่าร้าง') echo "selected"?>>หย่าร้าง</option>
                  </select>
                </div></td>
      </tr>
      <tr>
        <td class="style_h" ><div align="left">อาชีพเดิม</div></td>
        <td width="353"><div align="left">
          <input name="occu_old" type="text" size="15"  value="<?=$d[occu_old]?>" class="text"/>
        </div></td>
        <td width="244" class="style_h"><div align="left">อาชีพปัจจุบัน</div></td>
        <td width="541"><div align="left">
            <input name="occu_new" type="text" size="15"  value="<?=$d[occu_new]?>"class="text" />
        </div></td>
      </tr>
		   <tr>
	  <td width="160" class="style_h"><div align="left">รูปภาพ </div></td>
        <td  height="30"  colspan="3" class="style_h"><div align="left">
		  <input type="file" name="image"  size="40" maxlength="255" class="text">
		  <?	if($d[image] != ""){ ?>
	<br>
	รูปเดิม<a href="files/<? echo $d[image];?>" target="_blank" > <? echo $d[image];?></a>
	<input type="hidden" name='image1' value="<? echo $d[image];?>"> 
	<a href="?del=delete&user_id=<? echo $user_id;?>&image=<?=$d[image]?>" target="_self" onClick="return del_confirm();">[ ลบไฟล์ ]</a>
<? }?>
		  </div>		  </td>
		  </tr>
		    <tr>
	  <td width="20%" class="style_h"><div align="left">สถานะ </div></td>
        <td  height="30"  colspan="5"><div align="left"><input  type="radio" name="status" value="0"<? if($d[status] =='0') echo "checked"?> class="text" /> &nbsp;&nbsp;ปกติ&nbsp;&nbsp;
		    <input type="radio" name="status" value="1" <? if($d[status] =='1') echo "checked"?> class="text"/> &nbsp;&nbsp;ลาออก&nbsp;&nbsp;
		    <input type="radio" name="status" value="2" <? if($d[status] =='2') echo "checked"?> class="text"/> &nbsp;&nbsp;ไล่ออก&nbsp;&nbsp;
		    <input type="radio" name="status" value="3" <? if($d[status] =='3') echo "checked"?> class="text"/> &nbsp;&nbsp;เกษียณ&nbsp;&nbsp;
		    <input type="radio" name="status" value="4" <? if($d[status] =='4') echo "checked"?> class="text"/> &nbsp;&nbsp;ย้าย&nbsp;&nbsp;
			<input type="radio" name="status" value="5" <? if($d[status] =='5') echo "checked"?> class="text"/> &nbsp;&nbsp;หมดวาระ&nbsp;&nbsp;
		  </div>		  </td>
		  </tr>
		  <tr>
                <td   colspan="4"><div align="left">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
     <td width="382"  class="style_h"><div align="left">บิดาชื่อ</div></td>
    <td width="313"><div align="left"><input name="fa_name" type="text" size="15"  value="<?=$d[fa_name]?>" class="text"/></div></td>
     <td width="100"  class="style_h"><div align="left">สัญชาติ</div></td>
    <td width="100">&nbsp;
      <input name="fa_nation" type="text" size="5"  value="<?=$d[fa_nation]?>" class="text"/></td>
      <td width="100"  class="style_h"><div align="left">ศาสนา</div></td>
    <td width="100">&nbsp;
      <input name="fa_faith" type="text" size="5"  value="<?=$d[fa_faith]?>" class="text"/></td>
     <td width="100"  class="style_h"><div align="left">อาชีพ</div></td>
    <td width="100">&nbsp;
      <input name="fa_occu" type="text" size="5"  value="<?=$d[fa_occu]?>" class="text"/></td>
  </tr>
  <tr>
     <td width="382"  class="style_h"><div align="left">มารดาชื่อ</div></td>
    <td width="313"><div align="left"><input name="mo_name" type="text" size="15"  value="<?=$d[mo_name]?>" class="text"/></div></td>
     <td width="100"  class="style_h"><div align="left">สัญชาติ</div></td>
    <td width="100">&nbsp;
      <input name="mo_nation" type="text" size="5"  value="<?=$d[mo_nation]?>" class="text"/></td>
      <td width="100"  class="style_h"><div align="left">ศาสนา</div></td>
    <td width="100">&nbsp;
      <input name="mo_faith" type="text" size="5"  value="<?=$d[mo_faith]?>" class="text"/></td>
     <td width="100"  class="style_h"><div align="left">อาชีพ</div></td>
    <td width="100">&nbsp;
      <input name="mo_occu" type="text" size="5"  value="<?=$d[mo_occu]?>" class="text"/></td>
  </tr>

  <tr>
     <td width="382"  class="style_h"><div align="left">คู่สมรสชื่อ</div></td>
    <td width="313"><div align="left"><input name="mate_name" type="text" size="15"  value="<?=$d[mate_name]?>" class="text"/></div></td>
     <td width="100"  class="style_h"><div align="left">สัญชาติ</div></td>
    <td width="100">&nbsp;
      <input name="mate_nation" type="text" size="5"  value="<?=$d[mate_nation]?>" class="text"/></td>
      <td width="100"  class="style_h"><div align="left">ศาสนา</div></td>
    <td width="100">&nbsp;
      <input name="mate_faith" type="text" size="5"  value="<?=$d[mate_faith]?>" class="text"/></td>
     <td width="100"  class="style_h"><div align="left">อาชีพ</div></td>
    <td width="100">&nbsp;
      <input name="mate_occu" type="text" size="5"  value="<?=$d[mate_occu]?>" class="text"/></td>
  </tr>
</table>
                </div></td>
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
                    <input name="num_address_old" type="text"  size="10"  value="<?=$d[num_address_old]?>" class="text"/>
                </div></td> 
				<td width="10%" class="style_h"><div align="left">หมู่ที่</div></td>
                <td width="24%"><div align="left">
                    <input name="moo_old" type="text" size="10"   value="<?=$d[moo_old]?>" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">ถนน</div></td>
                <td width="19%"><div align="left">
                    <input name="road_old" type="text" size="10"  value="<?=$d[road_old]?>" class="text"/>
                </div></td>
              </tr>
              <tr>
               <td width="20%" class="style_h"><div align="left">ตำบล </div></td>
                <td width="19%"><div align="left">
                    <input name="subdistrict_old" type="text"  value="<?=$d[subdistrict_old]?>" size="10" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">อำเภอ</div></td>
                <td width="19%"><div align="left">
                    <input name="district_old" type="text"   value="<?=$d[district_old]?>"size="10" class="text"/>
                </div></td>
				   <td width="10%" class="style_h"><div align="left">จังหวัด</div></td>
                <td width="24%"><div align="left">
                    <input name="county_old"  value="<?=$d[county_old]?>" type="text" size="10" class="text"/>
                </div></td>
              </tr>
              <tr>
                <td width="8%" class="style_h"><div align="left">โทรศัพท์หมายเลข</div></td>
                <td width="19%" ><div align="left">
                    <input name="phone_old" type="text" size="20"  value="<?=$d[phone_old]?>" maxlength="31" class="text"/>
                </div></td>
				 <td width="8%" class="style_h"><div align="left">มือถือ</div></td>
                <td width="19%" ><div align="left">
                    <input name="mobile_old" type="text" size="20"  value="<?=$d[mobile_old]?>" maxlength="31" class="text"/>
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
                    <input name="num_address" type="text"  size="10"  value="<?=$d[num_address]?>" class="text"/>
                </div></td> 
				<td width="10%" class="style_h"><div align="left">หมู่ที่</div></td>
                <td width="24%"><div align="left">
                    <input name="moo" type="text" size="10"   value="<?=$d[moo]?>" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">ถนน</div></td>
                <td width="19%"><div align="left">
                    <input name="road" type="text" size="10"  value="<?=$d[road]?>" class="text"/>
                </div></td>
              </tr>
              <tr>
               <td width="20%" class="style_h"><div align="left">ตำบล </div></td>
                <td width="19%"><div align="left">
                    <input name="subdistrict" type="text"  value="<?=$d[subdistrict]?>" size="10" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">อำเภอ</div></td>
                <td width="19%"><div align="left">
                    <input name="district" type="text"   value="<?=$d[district]?>"size="10" class="text"/>
                </div></td> 
				<td width="10%" class="style_h"><div align="left">จังหวัด</div></td>
                <td width="24%"><div align="left">
                    <input name="county"  value="<?=$d[county]?>" type="text" size="10" class="text"/>
                </div></td>
              </tr>
              <tr>
                <td width="8%" class="style_h"><div align="left">โทรศัพท์หมายเลข</div></td>
                <td width="19%" ><div align="left">
                    <input name="phone" type="text" size="20"  value="<?=$d[phone]?>" maxlength="31" class="text"/>
                </div></td> <td width="8%" class="style_h"><div align="left">มือถือ</div></td>
                <td width="19%" ><div align="left">
                    <input name="mobile" type="text" size="20"  value="<?=$d[mobile]?>" maxlength="31" class="text"/>
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
                    <input name="place_con" type="text"  size="40"  value="<?=$d[place_con]?>" class="text"/>
                </div></td> 
              </tr>
              <tr>
                <td width="20%" class="style_h"><div align="left">เลขที่ </div></td>
                <td width="19%"><div align="left">
                    <input name="num_address_con" type="text"  size="10"  value="<?=$d[num_address_con]?>" class="text"/>
                </div></td> 
				<td width="10%" class="style_h"><div align="left">หมู่ที่</div></td>
                <td width="24%"><div align="left">
                    <input name="moo_con" type="text" size="10"   value="<?=$d[moo_con]?>" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">ถนน</div></td>
                <td width="19%"><div align="left">
                    <input name="road_con" type="text" size="10"  value="<?=$d[road_con]?>" class="text"/>
                </div></td>
              </tr>
              <tr>
                 
               <td width="20%" class="style_h"><div align="left">ตำบล </div></td>
                <td width="19%"><div align="left">
                    <input name="subdistrict_con" type="text"  value="<?=$d[subdistrict_con]?>" size="10" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">อำเภอ</div></td>
                <td width="19%"><div align="left">
                    <input name="district_con" type="text"   value="<?=$d[district_con]?>"size="10" class="text"/>
                </div></td> 
				<td width="10%" class="style_h"><div align="left">จังหวัด</div></td>
                <td width="24%"><div align="left">
                    <input name="county_con"  value="<?=$d[county_con]?>" type="text" size="10" class="text"/>
                </div></td>
              </tr>
              <tr>
	
                <td width="8%" class="style_h"><div align="left">โทรศัพท์หมายเลข</div></td>
                <td width="19%" ><div align="left">
                    <input name="phone_con" type="text" size="20"  value="<?=$d[phone_con]?>" maxlength="31" class="text"/>
                </div></td> <td width="8%" class="style_h"><div align="left">มือถือ</div></td>
                <td width="19%" ><div align="left">
                    <input name="mobile_con" type="text" size="20"  value="<?=$d[mobile_con]?>" maxlength="31" class="text"/>
                </div></td>
              </tr>
            </table>
          </fieldset></td>
      </tr>

      <tr>
        <td colspan="10" height="30" align="center"><input type="submit" name="Go"  value="บันทึกที่แก้ไข" onClick="return godel_1();"/>
          &nbsp;
          <input name="back"  type="button"value=" ยกเลิก "  onclick="window.close();"/>        </td>
      </tr>
    </table>
	<br>
</fieldset>

</div>
</div>
</form>

</body>
</html><script language="javascript">
function del_confirm()
{
	if (confirm("คุณต้องการลบไฟล์นี้ ใช่หรือไม่"))
	{
		return true;
	}
		return false;
}
</script>
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