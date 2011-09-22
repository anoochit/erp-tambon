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
		if($year2<>'')$date_contain = ($year2-543)."-".$month2."-".$date2;
		if($year3<>'')$date_start = ($year3-543)."-".$month3."-".$date3;
		$sql_order = " UPDATE person  SET 
		ps_tname_id = '$ps_tname_id', name = '$per_name'  ,birthday = '".$birthday."' ,
		fa_name  ='$fa_name' , mo_name = '$mo_name',id_person='$id_person',id_serv='$id_serv',
		tax_id ='$tax_id',ss_id ='$ss_id' ,
		num_address =  '$num_address' , road = '$road' , soi ='$soi', subdistrict = '$subdistrict',district ='$district'  ,
		county='$county' ,zip_code = '$zip_code',address ='$address'  , phone = '$phone'  ,blood ='$blood'  ,
		race= '$race' ,nationality ='$nationality', faith = '$faith' , mate_name = '$mate_name' , office='$office' , 
		ruck  = '$ruck', tel  = '$tel'  ".$upimage." ,type_work ='$type_work' ,reseve = '$reseve',status ='$status',date_contain = '".$date_contain."'
		,date_start = '".$date_start."'
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
        <td width="124" class="style_h"><div align="left"> คำนำหน้าชื่อ
 
          &nbsp;&nbsp; </div></td>
        <td width="208"><div align="left">
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
        <td width="257"><div align="left">
            <input name="per_name" type="text" id="per_name" value="<?=$d[name]?>" size="30" maxlength="100" class="text"/>
        </div></td>
      </tr>
      <tr>

		  <td width="124" height="30" class="style_h"><div align="left">เลขประจำตัวประชาชน</div></td>
        <td ><div align="left">
            <input name="id_person" type="text" size="20" maxlength="20" value="<?=$d[id_person]?>"  class="text"/>
        </div></td>
    
        <td width="142" height="30" class="style_h"><div align="left">เลขบัตรข้าราชการ</div></td>
        <td ><div align="left">
            <input name="id_serv" type="text" size="20" maxlength="13" value="<?=$d[id_serv]?>" class="text" />
        </div></td>
	    </tr>
		  <tr>
        <td class="style_h" ><div align="left">เลขประจำตัวผู้เสียภาษี</div></td>
        <td width="208"><div align="left">
            <input name="tax_id" type="text" size="20" maxlength="31"  value="<?=$d[tax_id]?>"  class="text"/>
        </div></td>
        <td width="142" class="style_h"><div align="left">เลขประจำตัวบัตรประกันสังคม</div></td>
        <td width="257"><div align="left">
            <input name="ss_id" type="text" size="20" maxlength="31"  value="<?=$d[ss_id]?>"  class="text"/>
        </div></td>
      </tr>

      <tr>
        <td width="124" class="style_h"><div align="left">วัน เดือน ปี เกิด </div></td>
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
        <input name="year1" type="text" id="year1" size="5" value="<? if($j1[0] <>'') echo $j1[0]+543?>" class="text">
		</div>
		</td>

      </tr>
	        <tr>
        <td height="30" class="style_h"><div align="left">วันที่บรรจุ &nbsp;&nbsp; </div></td>
        <td height="30"  colspan="3">
          <div align="left" class="entry">
            <? if($d[date_contain] <>'0000-00-00') $j2 = explode("-",$d[date_contain]); ?>วันที่ 
        <select name="date2" id="date2" class="text">
          <option value=1 <? if($j2[2] =='1') echo "selected"?> >1</option>
          <option value=2 <? if($j2[2] =='2') echo "selected"?>>2</option>
          <option value=3 <? if($j2[2] =='3') echo "selected"?>>3</option>
          <option value=4 <? if($j2[2] =='4') echo "selected"?>>4</option>
          <option value=5 <? if($j2[2] =='5') echo "selected"?>>5</option>
          <option value=6 <? if($j2[2] =='6') echo "selected"?>>6</option>
          <option value=7 <? if($j2[2] =='7') echo "selected"?>>7</option>
          <option value=8 <? if($j2[2] =='8') echo "selected"?>>8</option>
          <option value=9 <? if($j2[2] =='9') echo "selected"?>>9</option>
          <option value=10 <? if($j2[2] =='10') echo "selected"?>>10</option>
          <option value=11 <? if($j2[2] =='11') echo "selected"?>>11</option>
          <option value=12 <? if($j2[2] =='12') echo "selected"?>>12</option>
          <option value=13 <? if($j2[2] =='13') echo "selected"?>>13</option>
          <option value=14 <? if($j2[2] =='14') echo "selected"?>>14</option>
          <option value=15 <? if($j2[2] =='15') echo "selected"?>>15</option>
          <option value=16 <? if($j2[2] =='16') echo "selected"?>>16</option>
          <option value=17 <? if($j2[2] =='17') echo "selected"?>>17</option>
          <option value=18 <? if($j2[2] =='18') echo "selected"?>>18</option>
          <option value=19 <? if($j2[2] =='19') echo "selected"?>>19</option>
          <option value=20 <? if($j2[2] =='20') echo "selected"?>>20</option>
          <option value=21 <? if($j2[2] =='21') echo "selected"?>>21</option>
          <option value=22 <? if($j2[2] =='22') echo "selected"?>>22</option>
          <option value=23 <? if($j2[2] =='23') echo "selected"?>>23</option>
          <option value=24 <? if($j2[2] =='24') echo "selected"?>>24</option>
          <option value=25 <? if($j2[2] =='25') echo "selected"?>>25</option>
          <option value=26 <? if($j2[2] =='26') echo "selected"?>>26</option>
          <option value=27 <? if($j2[2] =='27') echo "selected"?>>27</option>
          <option value=28 <? if($j2[2] =='28') echo "selected"?>>28</option>
          <option value=29 <? if($j2[2] =='29') echo "selected"?>>29</option>
          <option value=30 <? if($j2[2] =='30') echo "selected"?>>30</option>
          <option value=31 <? if($j2[2] =='31') echo "selected"?>>31</option>
        </select> &nbsp;เดือน <select name="month2" id="month2" class="text">
          <option value="01" <? if($j2[1] =='01') echo "selected"?>>มกราคม</option>
          <option value=02  <? if($j2[1] =='02') echo "selected"?>>กุมภาพันธ์</option>
          <option value=03  <? if($j2[1] =='03') echo "selected"?>>มีนาคม</option>
          <option value=04  <? if($j2[1] =='04') echo "selected"?>>เมษายน</option>
          <option value=05  <? if($j2[1] =='05') echo "selected"?>>พฤษภาคม</option>
          <option value=06  <? if($j2[1] =='06') echo "selected"?>>มิถุนายน</option>
          <option value=07  <? if($j2[1] =='07') echo "selected"?>>กรกฎาคม</option>
          <option value=08  <? if($j2[1] =='08') echo "selected"?>>สิงหาคม</option>
          <option value=09  <? if($j2[1] =='09') echo "selected"?>>กันยายน</option>
          <option value=10  <? if($j2[1] =='10') echo "selected"?>>ตุลาคม</option>
          <option value=11  <? if($j2[1] =='11') echo "selected"?>>พฤศจิกายน</option>
          <option value=12  <? if($j2[1] =='12') echo "selected"?>>ธันวาคม</option>
        </select>
        &nbsp; พ.ศ. 
        <input name="year2" type="text" id="year2" size="5" value="<? if($j2[0] <>'') echo $j2[0]+543?>" class="text">
		</div></td>
		    </tr>
	  <tr>
      
  <td height="30" class="style_h"><div align="left">วันเริ่มปฏิบัติราชการ &nbsp;&nbsp; </div></td>
        <td height="30" colspan="3">
          <div align="left" class="entry">
            <? 
			//echo $d[date_start]."fff<br>";
			if($d[date_start] <>'0000-00-00') $j3= explode("-",$d[date_start]); ?>วันที่ 
        <select name="date3" id="date3" class="text">
          <option value=1 <? if($j3[2] =='1') echo "selected"?> >1</option>
          <option value=2 <? if($j3[2] =='2') echo "selected"?>>2</option>
          <option value=3 <? if($j3[2] =='3') echo "selected"?>>3</option>
          <option value=4 <? if($j3[2] =='4') echo "selected"?>>4</option>
          <option value=5 <? if($j3[2] =='5') echo "selected"?>>5</option>
          <option value=6 <? if($j3[2] =='6') echo "selected"?>>6</option>
          <option value=7 <? if($j3[2] =='7') echo "selected"?>>7</option>
          <option value=8 <? if($j3[2] =='8') echo "selected"?>>8</option>
          <option value=9 <? if($j3[2] =='9') echo "selected"?>>9</option>
          <option value=10 <? if($j3[2] =='10') echo "selected"?>>10</option>
          <option value=11 <? if($j3[2] =='11') echo "selected"?>>11</option>
          <option value=12 <? if($j3[2] =='12') echo "selected"?>>12</option>
          <option value=13 <? if($j3[2] =='13') echo "selected"?>>13</option>
          <option value=14 <? if($j3[2] =='14') echo "selected"?>>14</option>
          <option value=15 <? if($j3[2] =='15') echo "selected"?>>15</option>
          <option value=16 <? if($j3[2] =='16') echo "selected"?>>16</option>
          <option value=17 <? if($j3[2] =='17') echo "selected"?>>17</option>
          <option value=18 <? if($j3[2] =='18') echo "selected"?>>18</option>
          <option value=19 <? if($j3[2] =='19') echo "selected"?>>19</option>
          <option value=20 <? if($j3[2] =='20') echo "selected"?>>20</option>
          <option value=21 <? if($j3[2] =='21') echo "selected"?>>21</option>
          <option value=22 <? if($j3[2] =='22') echo "selected"?>>22</option>
          <option value=23 <? if($j3[2] =='23') echo "selected"?>>23</option>
          <option value=24 <? if($j3[2] =='24') echo "selected"?>>24</option>
          <option value=25 <? if($j3[2] =='25') echo "selected"?>>25</option>
          <option value=26 <? if($j3[2] =='26') echo "selected"?>>26</option>
          <option value=27 <? if($j3[2] =='27') echo "selected"?>>27</option>
          <option value=28 <? if($j3[2] =='28') echo "selected"?>>28</option>
          <option value=29 <? if($j3[2] =='29') echo "selected"?>>29</option>
          <option value=30 <? if($j3[2] =='30') echo "selected"?>>30</option>
          <option value=31 <? if($j3[2] =='31') echo "selected"?>>31</option>
        </select>
        &nbsp;เดือน 
        <select name="month3" id="month3" class="text">
          <option value="01" <? if($j3[1] =='01') echo "selected"?>>มกราคม</option>
          <option value=02  <? if($j3[1] =='02') echo "selected"?>>กุมภาพันธ์</option>
          <option value=03  <? if($j3[1] =='03') echo "selected"?>>มีนาคม</option>
          <option value=04  <? if($j3[1] =='04') echo "selected"?>>เมษายน</option>
          <option value=05  <? if($j3[1] =='05') echo "selected"?>>พฤษภาคม</option>
          <option value=06  <? if($j3[1] =='06') echo "selected"?>>มิถุนายน</option>
          <option value=07  <? if($j3[1] =='07') echo "selected"?>>กรกฎาคม</option>
          <option value=08  <? if($j3[1] =='08') echo "selected"?>>สิงหาคม</option>
          <option value=09  <? if($j3[1] =='09') echo "selected"?>>กันยายน</option>
          <option value=10  <? if($j3[1] =='10') echo "selected"?>>ตุลาคม</option>
          <option value=11  <? if($j3[1] =='11') echo "selected"?>>พฤศจิกายน</option>
          <option value=12  <? if($j3[1] =='12') echo "selected"?>>ธันวาคม</option>
        </select>
        &nbsp; พ.ศ. 
        <input name="year3" type="text" id="year3" size="5" value="<? if($j3[0] <>'') echo $j3[0]+543?>" class="text">
		</div>
		  </td>
      </tr>
	  	  <tr>
      
		 <td width="124" class="style_h"><div align="left">ประเภทข้าราชการ</div></td>
        <td colspan="3"><div align="left">
            <input name="type_work" type="text" size="20"  value="<?=$d[type_work]?>" class="text"/>
        </div></td>
      </tr>
      <tr>
        <td class="style_h" ><div align="left">สัญชาติ</div></td>
        <td width="208"><div align="left">
          <input name="nationality" type="text" size="20" value="<?=$d[nationality]?>"  class="text"  />
        </div></td>
        <td width="142" class="style_h"><div align="left">เชื้อชาติ</div></td>
        <td width="257"><div align="left">
            <input name="race" type="text" size="20" value="<?=$d[race]?>"   class="text" />
        </div></td>
      </tr>
      <tr>
        <td class="style_h" ><div align="left">ศาสนา</div></td>
        <td width="208"><div align="left">
            <input name="faith" type="text" size="20" value="<?=$d[faith]?>" class="text" />
        </div></td>
        <td width="142" class="style_h"><div align="left">กรุ๊ปแลือด</div></td>
        <td width="257"><div align="left">
            <input name="blood" type="text" size="20" value="<?=$d[blood]?>"class="text" />
        </div></td>
      </tr>
      <tr>
          <td width="124" class="style_h"><div align="left">ชื่อบิดา</div></td>
                <td  ><div align="left">
                    <input name="fa_name" type="text" size="30" value="<?=$d[fa_name]?>" class="text"/>
                </div></td>
		  <td width="142" class="style_h"><div align="left">ชื่อมารดา</div></td>
                <td  ><div align="left">
                    <input name="mo_name" type="text" size="30" value="<?=$d[mo_name]?>" class="text"/>
                </div></td>
        </tr>
		   <tr>
	  <td width="124" class="style_h"><div align="left">รูปภาพ </div></td>
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
        <td colspan="4" ><br />
            <fieldset>
            <legend align="left" > <span class="pageName"  >ที่อยู่ที่ติดต่อได้</span> </legend>
              <br />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" class="style_h"><div align="left">เลขที่ </div></td>
                <td width="19%"><div align="left">
                    <input name="num_address" type="text"  size="10" value="<?=$d[num_address]?>" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">ถนน</div></td>
                <td width="19%"><div align="left">
                    <input name="road" type="text" size="10" value="<?=$d[road]?>" class="text"/>
                </div></td>
                <td width="10%" class="style_h"><div align="left">ซอย</div></td>
                <td width="24%"><div align="left">
                    <input name="soi" type="text" size="10"value="<?=$d[soi]?>" class="text"/>
                </div></td>
              </tr>
              <tr>
                <td width="20%" class="style_h"><div align="left">ตำบล </div></td>
                <td width="19%"><div align="left">
                    <input name="subdistrict" type="text"  size="10" value="<?=$d[subdistrict]?>" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">อำเภอ</div></td>
                <td width="19%"><div align="left">
                    <input name="district" type="text" size="10" value="<?=$d[district]?>" class="text"/>
                </div></td>
                <td width="10%" class="style_h"><div align="left">จังหวัด</div></td>
                <td width="24%"><div align="left">
                    <input name="county" type="text" size="10" value="<?=$d[county]?>" class="text"/>
                </div></td>
              </tr>
              <tr>
                <td width="20%" class="style_h"><div align="left">รหัสไปรษณีย์</div></td>
                <td width="19%"><div align="left">
                    <input name="zip_code" type="text" size="10" value="<?=$d[zip_code]?>" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">โทรศัพท์</div></td>
                <td width="19%" colspan="2"><div align="left">
                    <input name="phone" type="text" size="20" maxlength="31" value="<?=$d[phone]?>" class="text"/>
                </div></td>

                <td width="24%"><div align="left"></div></td>
              </tr>
              <tr>
                <td width="20%" class="style_h"><div align="left">ที่อยู่ตามทะเบียนบ้าน</div></td>
                <td  colspan="5"><div align="left">
                    <input name="address" type="text" size="80"  value="<?=$d[address]?>" class="text"/>
                </div></td>
              </tr>
			  <tr>
	  <td width="187" class="style_h"><div align="left">สมัคร กบข. </div></td>
        <td  height="30"  colspan="5"><div align="left">
		  <input  type="radio" name="reseve" value="Y"<? if($d[reseve] =='Y') echo "checked"?> class="text" /> &nbsp;&nbsp;สะสม&nbsp;&nbsp;
		    <input type="radio" name="reseve" value="N" <? if($d[reseve] =='N') echo "checked"?> class="text"/> &nbsp;&nbsp;ไม่สะสม&nbsp;&nbsp;
		  </div>		  </td>
		  </tr>
		  <tr>
	  <td width="141" class="style_h"><div align="left">สถานะ </div></td>
        <td  height="30"  colspan="5"><div align="left"><input  type="radio" name="status" value="0"<? if($d[status] =='0') echo "checked"?>class="text" /> &nbsp;&nbsp;ปกติ&nbsp;&nbsp;
		    <input type="radio" name="status" value="1" <? if($d[status] =='1') echo "checked"?> class="text"/> &nbsp;&nbsp;ลาออก&nbsp;&nbsp;
		    <input type="radio" name="status" value="2" <? if($d[status] =='2') echo "checked"?> class="text"/> &nbsp;&nbsp;ไล่ออก&nbsp;&nbsp;
		    <input type="radio" name="status" value="3" <? if($d[status] =='3') echo "checked"?> class="text"/> &nbsp;&nbsp;เกษียณ&nbsp;&nbsp;
		    <input type="radio" name="status" value="4" <? if($d[status] =='4') echo "checked"?> class="text"/> &nbsp;&nbsp;ย้าย&nbsp;&nbsp;
		  </div>		  </td>
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
            <input name="mate_name" type="text" id="mate_name" value="<?=$d[mate_name]?>" size="20" maxlength="100" class="text"/>
        </div></td>
		<td width="168" class="style_h" ><div align="left">สถานที่ทำงาน</div>		</td>
		<td width="324" ><div align="left">
                <input name="office" type="text" size="25" maxlength="255"value="<?=$d[office]?>"  class="text"/></div>           </td>
      </tr>
              <tr>
        <td  height="30" class="style_h"><div align="left"> ตำแหน่ง&nbsp;&nbsp; </div></td>
        <td width="308"><div align="left">
            <input name="ruck" type="text" id="ruck" value="<?=$d[ruck]?>" size="25" maxlength="100"class="text" />
        </div></td>
		<td class="style_h" ><div align="left">เบอร์โทร</div>		</td>
		<td ><div align="left">
                <input name="tel" type="text" size="10" maxlength="255"value="<?=$d[tel]?>" class="text"/></div>           </td>
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