<? ob_start();?>
<?
session_start();
include('config.inc.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
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
     req.open("GET", "ajax_1.php?data="+src+"&val="+val); //สร้าง connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}
</script>

<body>
<form name="f12" method="post"  action=""   >
<br>
 <table  width="100%"   border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td  colspan="2"><table width="100%" align="center" cellspacing="0"  cellpadding="0" border="1"  bordercolor="#666666">
      <tr class="header">
        <td  height="28" colspan="14" bgcolor="#DEE4EB"><div  align="left">&nbsp;&nbsp;<strong>รายงานสรุปยอดตั้งเก็บและจัดเก็บได้ค่าธรรมเนียมน้ำประปาประจำปี <? echo $year?></strong> </div></td>
      </tr>
      <tr class="body1"  bgcolor="#DEE4EB">
        <td width="8%"  height="31" align="center"><strong>เดือน</strong></td>
        <td width="12%"  height="31" align="center"><strong>ยอดค้างยกมา</strong></td>
        <td width="12%"  height="31" align="center"><strong>ยอดตั้งเก็บ</strong></td>
        <td width="12%"  align="center"><strong>ยอดรวม</strong></td>
		<td width="12%"  align="center"><strong>ยอดเก็บได้</strong></td>
        <td width="12%"  align="center"><strong>ยอดค้างยกไป</strong></td>
		 <td width="12%"  align="center"><strong>เก็บได้ในเดือน</strong></td>
		  <td width="12%"  align="center"><strong>ค้างเก่าเก็บได้</strong></td>
		  <td width="12%"  align="center"><strong>จำนวนราย</strong></td>
          <!--<td width="14%"  align="center"><strong>&nbsp;</strong></td>  -->
      </tr>
<?
if($search <>'')
$SumMtotal = 0;
$stotal3 = 0; 
$stotal = 0;
$stotal4 = 0;
$stotal5 = 0;
$stotal6 = 0;
$stotal7 = 0;
			?>
<!--///////////////////////09 ก.ย.//////////////////////////// -->
 <tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
 <? 
 $month ='09';
 ?>
        <td  height="25"  align="center">&nbsp;ก.ย. <? echo $year-1; ?></td>
        <td  height="25"   align="center">&nbsp;<? 
		$ff2 = explode("*",Find_SumTotalG8_2($year,$month));
		$Sum0 =(Find_SumRemain8_2($year,$month)-$ff2[0]);
		echo number_format($Sum0,2); 
		$b1=$Sum0;?></td>
		<td  height="25"   align="center">&nbsp;<? 
		$ff2 = explode("*",Find_SumTotalG8_2($year,$month));
		echo number_format($ff2[0],2); 
		$c1= $ff2[0];
		?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format(Find_SumRemain8_2($year,$month),2);
		$d1=Find_SumRemain8_2($year,$month);?></td>
		<td  align="center">&nbsp;<? 
		$Sume1 = Find_SumPayArrearsG8_2($year,$month)+ Find_SumGeTG8_2($year,$month);
		echo number_format($Sume1,2);
		$e1=$Sume1;?></td>
        <td  align="center">&nbsp;<?
		$Sum4 =(Find_SumRemain8_2($year,$month)-$Sume1);
		echo number_format($Sum4,2); 
		$f1=$Sum4;
		?> </td>
	    <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumGeTG8_2($year,$month),2);
		$g1=Find_SumGeTG8_2($year,$month); ?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format(Find_SumPayArrearsG8_2($year,$month),2); 
		$h1=Find_SumPayArrearsG8_2($year,$month);?></td>
        <td  align="center">&nbsp;<? echo number_format($ff2[1]); 
		$i1=$ff2[1];?></td>
		  </tr>
		  <!--///////////////////////10 ต.ค.//////////////////////////// -->		
 <? 
 $month ='10';
 ?>
		  <tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;ต.ค. <? echo ($year-1); ?></td>
        <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumRemain8($year,$month),2); 
		$b2=Find_SumRemain8($year,$month);?></td>
		<td  height="25"   align="center">&nbsp;<? 
		$ff = explode("*",Find_SumTotalG8($year,$month));
		echo number_format($ff[0],2);
		$c2=$ff[0]; ?></td>
		<td  height="25"  align="center">&nbsp;<? 
		$Sum1 =(Find_SumRemain8($year,$month)+$ff[0]);
		echo number_format($Sum1,2); 
		$d2=$Sum1;
		?></td>
		<td  align="center">&nbsp;<?
		$Sum2 = Find_SumGeTG8($year,$month)+Find_SumPayArrearsG8($year,$month);
		 echo number_format($Sum2,2); 
		 $e2=$Sum2;
		 ?></td>
        <td  align="center">&nbsp;<?
		$Sum3 =($Sum1-$Sum2);
		echo number_format($Sum3,2); 
		$f2=$Sum3;
		?> </td>
	    <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumGeTG8($year,$month),2);
		$g2=Find_SumGeTG8($year,$month);  ?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format(Find_SumPayArrearsG8($year,$month),2);
		$h2=Find_SumPayArrearsG8($year,$month); ?></td>
        <td  align="center">&nbsp;<? echo number_format($ff[1]);
		$i2=$ff[1]; ?></td>
		  </tr>				   
<!--///////////////////////11 พ.ย.//////////////////////////// -->
 <? 
 $month ='11';
 ?>
<tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;พ.ย. <? echo ($year-1); ?></td>
        <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumRemain8($year,$month),2);
		$b3=Find_SumRemain8($year,$month); ?></td>
		<td  height="25"   align="center">&nbsp;<? 
		$ff = explode("*",Find_SumTotalG8($year,$month));
		echo number_format($ff[0],2); 
		$c3=$ff[0];?></td>
		<td  height="25"  align="center">&nbsp;<? 
		$Sum1 =(Find_SumRemain8($year,$month)+$ff[0]);
		echo number_format($Sum1,2); 
		$d3=$Sum1;
		?></td>
		<td  align="center">&nbsp;<?
		$Sum2 = Find_SumGeTG8($year,$month)+Find_SumPayArrearsG8($year,$month);
		 echo number_format($Sum2,2); 
		  $e3=$Sum2;
		 ?></td>
        <td  align="center">&nbsp;<?
		$Sum3 =($Sum1-$Sum2);
		echo number_format($Sum3,2); 
		$f3=$Sum3;
		?> </td>
	    <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumGeTG8($year,$month),2);
		$g3=Find_SumGeTG8($year,$month); ?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format(Find_SumPayArrearsG8($year,$month),2);
		$h3=Find_SumPayArrearsG8($year,$month); ?></td>
        <td  align="center">&nbsp;<? echo number_format($ff[1]); 
		$i3=$ff[1];?></td>
		  </tr>
<!--///////////////////////12 ธ.ค.//////////////////////////// -->		 
 <? 
 $month ='12';
 ?>
 <tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;ธ.ค. <? echo ($year-1); ?></td>
        <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumRemain8($year,$month),2);
		$b4=Find_SumRemain8($year,$month); ?></td>
		<td  height="25"   align="center">&nbsp;<? 
		$ff = explode("*",Find_SumTotalG8($year,$month));
		echo number_format($ff[0]);
		$c4=$ff[0]; ?></td>
		<td  height="25"  align="center">&nbsp;<? 
		$Sum1 =(Find_SumRemain8($year,$month)+$ff[0]);
		echo number_format($Sum1,2); 
		$d4=$Sum1;
		?></td>
		<td  align="center">&nbsp;<?
		$Sum2 = Find_SumGeTG8($year,$month)+Find_SumPayArrearsG8($year,$month);
		 echo number_format($Sum2,2); 
		  $e4=$Sum2;
		 ?></td>
        <td  align="center">&nbsp;<?
		$Sum3 =($Sum1-$Sum2);
		echo number_format($Sum3,2); 
		$f4=$Sum3;
		?> </td>
	    <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumGeTG8($year,$month),2);
		$g4=Find_SumGeTG8($year,$month); ?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format(Find_SumPayArrearsG8($year,$month),2);
		$h4=Find_SumPayArrearsG8($year,$month); ?></td>
        <td  align="center">&nbsp;<? echo number_format($ff[1]);
		$i4=$ff[1]; ?></td>
</tr>
<!--///////////////////////01 ม.ค.//////////////////////////// -->		 
 <? 
 $month ='01';
 ?>
<tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;ม.ค. <? echo ($year); ?></td>
        <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumRemain8($year,$month),2); 
		$b5=Find_SumRemain8($year,$month);?></td>
		<td  height="25"   align="center">&nbsp;<? 
		$ff = explode("*",Find_SumTotalG8($year,$month));
		echo number_format($ff[0],2); 
		$c5=$ff[0];?></td>
		<td  height="25"  align="center">&nbsp;<? 
		$Sum1 =(Find_SumRemain8($year,$month)+$ff[0]);
		echo number_format($Sum1,2); 
		$d5=$Sum1;
		?></td>
		<td  align="center">&nbsp;<?
		$Sum2 = Find_SumGeTG8($year,$month)+Find_SumPayArrearsG8($year,$month);
		 echo number_format($Sum2,2);
		  $e5=$Sum2; 
		 ?></td>
        <td  align="center">&nbsp;<?
		$Sum3 =($Sum1-$Sum2);
		echo number_format($Sum3,2); 
		$f5=$Sum3;
		?> </td>
	    <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumGeTG8($year,$month),2); 
		$g5=Find_SumGeTG8($year,$month);?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format(Find_SumPayArrearsG8($year,$month),2);
		$h5=Find_SumPayArrearsG8($year,$month); ?></td>
        <td  align="center">&nbsp;<? echo number_format($ff[1]);
		$i5=$ff[1]; ?></td>
		  </tr>
<!--///////////////////////02 ก.พ.//////////////////////////// -->		
 <? 
 $month ='02';
 ?>
 <tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;ก.พ. <? echo ($year); ?></td>
        <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumRemain8($year,$month),2); 
		$b6=Find_SumRemain8($year,$month);?></td>
		<td  height="25"   align="center">&nbsp;<? 
		$ff = explode("*",Find_SumTotalG8($year,$month));
		echo number_format($ff[0],2); 
		$c6=$ff[0];?></td>
		<td  height="25"  align="center">&nbsp;<? 
		$Sum1 =(Find_SumRemain8($year,$month)+$ff[0]);
		echo number_format($Sum1,2); 
		$d6=$Sum1;
		?></td>
		<td  align="center">&nbsp;<?
		$Sum2 = Find_SumGeTG8($year,$month)+Find_SumPayArrearsG8($year,$month);
		 echo number_format($Sum2,2); 
		  $e6=$Sum2;
		 ?></td>
        <td  align="center">&nbsp;<?
		$Sum3 =($Sum1-$Sum2);
		echo number_format($Sum3,2); 
		$f6=$Sum3;
		?> </td>
	    <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumGeTG8($year,$month),2); 
		$g6=Find_SumGeTG8($year,$month);?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format(Find_SumPayArrearsG8($year,$month),2);
		$h6=Find_SumPayArrearsG8($year,$month); ?></td>
        <td  align="center">&nbsp;<? echo number_format($ff[1]);
		$i6=$ff[1]; ?></td>
		  </tr>
<!--///////////////////////03 มี.ค.//////////////////////////// -->		
 <? 
 $month ='03';
 ?>
 <tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;มี.ค. <? echo ($year); ?></td>
        <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumRemain8($year,$month),2);
		$b7=Find_SumRemain8($year,$month); ?></td>
		<td  height="25"   align="center">&nbsp;<? 
		$ff = explode("*",Find_SumTotalG8($year,$month));
		echo number_format($ff[0],2);
		$c7=$ff[0]; ?></td>
		<td  height="25"  align="center">&nbsp;<? 
		$Sum1 =(Find_SumRemain8($year,$month)+$ff[0]);
		echo number_format($Sum1,2); 
		$d7=$Sum1;
		?></td>
		<td  align="center">&nbsp;<?
		$Sum2 = Find_SumGeTG8($year,$month)+Find_SumPayArrearsG8($year,$month);
		 echo number_format($Sum2,2); 
		  $e7=$Sum2;
		 ?></td>
        <td  align="center">&nbsp;<?
		$Sum3 =($Sum1-$Sum2);
		echo number_format($Sum3,2); 
		$f7=$Sum3;
		?></td>
	    <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumGeTG8($year,$month),2); 
		$g7=Find_SumGeTG8($year,$month);?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format(Find_SumPayArrearsG8($year,$month),2); 
		$h7=Find_SumPayArrearsG8($year,$month);?></td>
        <td  align="center">&nbsp;<? echo number_format($ff[1]);
		$i7=$ff[1]; ?></td>
</tr>
<!--///////////////////////04 เม.ย.//////////////////////////// -->
 <? 
 $month ='04';
 ?>
<tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;เม.ย. <? echo ($year); ?></td>
        <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumRemain8($year,$month),2);
		$b8=Find_SumRemain8($year,$month); ?></td>
		<td  height="25"   align="center">&nbsp;<? 
		$ff = explode("*",Find_SumTotalG8($year,$month));
		echo number_format($ff[0],2); 
		$c8=$ff[0];?></td>
		<td  height="25"  align="center">&nbsp;<? 
		$Sum1 =(Find_SumRemain8($year,$month)+$ff[0]);
		echo number_format($Sum1,2); 
		$d8=$Sum1;
		?></td>
		<td  align="center">&nbsp;<?
		$Sum2 = Find_SumGeTG8($year,$month)+Find_SumPayArrearsG8($year,$month);
		 echo number_format($Sum2,2); 
		  $e8=$Sum2;
		 ?></td>
        <td  align="center">&nbsp;<?
		$Sum3 =($Sum1-$Sum2);
		echo number_format($Sum3,2); 
		$f8=$Sum3;
		?> </td>
	    <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumGeTG8($year,$month),2);
		$g8=Find_SumGeTG8($year,$month);?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format(Find_SumPayArrearsG8($year,$month),2);
		$h8=Find_SumPayArrearsG8($year,$month); ?></td>
        <td  align="center">&nbsp;<? echo number_format($ff[1]);
		$i8=$ff[1]; ?></td>
		  </tr>
<!--///////////////////////05 พ.ค.//////////////////////////// -->		  
 <? 
 $month ='05';
 ?>
<tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;พ.ค. <? echo ($year); ?></td>
        <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumRemain8($year,$month),2);
		$b9=Find_SumRemain8($year,$month); ?></td>
		<td  height="25"   align="center">&nbsp;<? 
		$ff = explode("*",Find_SumTotalG8($year,$month));
		echo number_format($ff[0],2);
		$c9=$ff[0]; ?></td>
		<td  height="25"  align="center">&nbsp;<? 
		$Sum1 =(Find_SumRemain8($year,$month)+$ff[0]);
		echo number_format($Sum1,2); 
		$d9=$Sum1;
		?></td>
		<td  align="center">&nbsp;<?
		$Sum2 = Find_SumGeTG8($year,$month)+Find_SumPayArrearsG8($year,$month);
		 echo number_format($Sum2,2); 
		  $e9=$Sum2;
		 ?></td>
        <td  align="center">&nbsp;<?
		$Sum3 =($Sum1-$Sum2);
		echo number_format($Sum3,2); 
		$f9=$Sum3;
		?> </td>
	    <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumGeTG8($year,$month),2);
		$g9=Find_SumGeTG8($year,$month); ?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format(Find_SumPayArrearsG8($year,$month),2);
		$h9=Find_SumPayArrearsG8($year,$month); ?></td>
        <td  align="center">&nbsp;<? echo number_format($ff[1]);
		$i9=$ff[1]; ?></td>
		  </tr>
<!--///////////////////////06 มิ.ย.//////////////////////////// -->		  
 <? 
 $month ='06';
 ?>
<tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;มิ.ย. <? echo ($year); ?></td>
        <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumRemain8($year,$month),2); 
		$b10=Find_SumRemain8($year,$month);?></td>
		<td  height="25"   align="center">&nbsp;<? 
		$ff = explode("*",Find_SumTotalG8($year,$month));
		echo number_format($ff[0],2);
		$c10=$ff[0]; ?></td>
		<td  height="25"  align="center">&nbsp;<? 
		$Sum1 =(Find_SumRemain8($year,$month)+$ff[0]);
		echo number_format($Sum1,2); 
		$d10=$Sum1;
		?></td>
		<td  align="center">&nbsp;<?
		$Sum2 = Find_SumGeTG8($year,$month)+Find_SumPayArrearsG8($year,$month);
		 echo number_format($Sum2,2); 
		  $e10=$Sum2;
		 ?></td>
        <td  align="center">&nbsp;<?
		$Sum3 =($Sum1-$Sum2);
		echo number_format($Sum3,2); 
		$f10=$Sum3;
		?> </td>
	    <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumGeTG8($year,$month),2);
		$g10=Find_SumGeTG8($year,$month); ?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format(Find_SumPayArrearsG8($year,$month),2); 
		$h10=Find_SumPayArrearsG8($year,$month);?></td>
        <td  align="center">&nbsp;<? echo number_format($ff[1]);
		$i10=$ff[1]; ?></td>
		  </tr>
		   <!--///////////////////////07 ก.ค.//////////////////////////// -->
 <? 
 $month ='07';
 ?>
<tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;ก.ค. <? echo ($year); ?></td>
        <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumRemain8($year,$month),2); 
		$b11=Find_SumRemain8($year,$month);?></td>
		<td  height="25"   align="center">&nbsp;<? 
		$ff = explode("*",Find_SumTotalG8($year,$month));
		echo number_format($ff[0],2);
		$c11=$ff[0]; ?></td>
		<td  height="25"  align="center">&nbsp;<? 
		$Sum1 =(Find_SumRemain8($year,$month)+$ff[0]);
		echo number_format($Sum1,2); 
		$d11=$Sum1;
		?></td>
		<td  align="center">&nbsp;<?
		$Sum2 = Find_SumGeTG8($year,$month)+Find_SumPayArrearsG8($year,$month);
		 echo number_format($Sum2,2); 
		  $e11=$Sum2;
		 ?></td>
        <td  align="center">&nbsp;<?
		$Sum3 =($Sum1-$Sum2);
		echo number_format($Sum3,2); 
		$f11=$Sum3;
		?> </td>
	    <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumGeTG8($year,$month),2);
		$g11=Find_SumGeTG8($year,$month); ?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format(Find_SumPayArrearsG8($year,$month),2);
		$h11=Find_SumPayArrearsG8($year,$month); ?></td>
        <td  align="center">&nbsp;<? echo number_format($ff[1]);
		$i11=$ff[1]; ?></td>
		  </tr>	
<!--///////////////////////08 ส.ค.//////////////////////////// --> 
<? 
 $month ='08';
 ?>
<tr class="body1" bgcolor="<? echo $bg?>" onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe'" onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = ''">
        <td  height="25"  align="center">&nbsp;ส.ค. <? echo ($year); ?></td>
        <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumRemain8($year,$month),2); 
		$b12=Find_SumRemain8($year,$month);?></td>
		<td  height="25"   align="center">&nbsp;<? 
		$ff = explode("*",Find_SumTotalG8($year,$month));
		echo number_format($ff[0],2); 
		$c12=$ff[0];?></td>
		<td  height="25"  align="center">&nbsp;<? 
		$Sum1 =(Find_SumRemain8($year,$month)+$ff[0]);
		echo number_format($Sum1,2); 
		$d12=$Sum1;
		?></td>
		<td  align="center">&nbsp;<?
		$Sum2 = Find_SumGeTG8($year,$month)+Find_SumPayArrearsG8($year,$month);
		 echo number_format($Sum2,2); 
		  $e12=$Sum2;
		 ?></td>
        <td  align="center">&nbsp;<?
		$Sum3 =($Sum1-$Sum2);
		echo number_format($Sum3,2); 
		$f12=$Sum3;
		?> </td>
	    <td  height="25"   align="center">&nbsp;<? echo number_format(Find_SumGeTG8($year,$month),2); 
		$g12=Find_SumGeTG8($year,$month);?></td>
		<td  height="25"  align="center">&nbsp;<? echo number_format(Find_SumPayArrearsG8($year,$month),2);
		$h12=Find_SumPayArrearsG8($year,$month); ?></td>
        <td  align="center">&nbsp;<? echo number_format($ff[1]);
		$i12=$ff[1]; ?></td>
		  </tr>	
 <!--///////////////////////รวม//////////////////////////// -->	
 <? 
 $SumB = $b1+ $b2+ $b3+ $b4+ $b5+ $b6+ $b7+ $b8+ $b9+ $b10+ $b11+ $b12;
 $SumC = $c1+ $c2+ $c3+ $c4+ $c5+ $c6+ $c7+ $c8+ $c9+ $c10+ $c11+ $c12;
 $SumD = $d1+ $d2+ $d3+ $d4+ $d5+ $d6+ $d7+ $d8+ $d9+ $d10+ $d11+ $d12;
 $SumE = $e1+ $e2+ $e3+ $e4+ $e5+ $e6+ $e7+ $e8+ $e9+ $e10+ $e11+ $e12;
 $SumF = $f1+ $f2+ $f3+ $f4+ $f5+ $f6+ $f7+ $f8+ $f9+ $f10+ $f11+ $f12;
 $SumG = $g1+ $g2+ $g3+ $g4+ $g5+ $g6+ $g7+ $g8+ $g9+ $g10+ $g11+ $g12;
 $SumH = $h1+ $h2+ $h3+ $h4+ $h5+ $h6+ $h7+ $h8+ $h9+ $h10+ $h11+ $h12;
 $SumI = $i1+ $i2+ $i3+ $i4+ $i5+ $i6+ $i7+ $i8+ $i9+ $i10+ $i11+ $i12;
 ?>
  
      <tr class="body1" bgcolor="#DEE4EB"  onMouseOver= "if (typeof(this.style) != 'undefined') this.style.backgroundColor = '#b9c9fe' " onMouseOut="if (typeof(this.style) != 'undefined') this.style.backgroundColor = '' ">
        <td  height="25"  align="center">&nbsp;<strong>รวม</strong></td>
        <td  height="25"   align="center"><strong>&nbsp;<?=number_format($SumB,2)?></strong></td>
        <td  height="25"  align="center"><strong>&nbsp;<?=number_format($SumC,2)?></strong></td>
        <td  align="center"><strong>&nbsp;<?=number_format($SumD,2)?></strong></td>
		<td  align="center"><strong>&nbsp;<?=number_format($SumE,2)?></strong></td>
        <td  align="center"><strong>&nbsp;<?=number_format($SumF,2)?></strong></td>
        <td  align="center"><strong>&nbsp;<?=number_format($SumG,2)?></strong></td>
        <td  align="center"><strong>&nbsp;<?=number_format($SumH,2)?></strong></td>
        <td  align="center"><strong>&nbsp;<?=number_format($SumI)?></strong></td>
	      </tr>
    </table></td>
    </tr>
  </table>
</form>
</body>
</html>
<?
///////////////////////  ค้างเก่ายกยอดมา   ///////////////////////////
function Find_SumRemain8($year,$month){
	if ($month == '09' or $month == '10' or $month == '11' or $month == '12') {
							$Yr = ($year-1);
	}else{
							$Yr = ($year);
	}		
		$p_date_1 = ($Yr-543)."-".($month)."-"."31";
        $sql =  "select  if(sum(sum_m) is null,'0.00',sum(sum_m)) as total1 from meter 
		 where  (((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ' ) or  p_date >'".$p_date_1."' ) and  ";
		$ex = substr($month,0,1);
		if($ex =='0') $month = substr($month,1);	
		else $month = $month;	 
		if($month  <> '' and $month <=8 ){		 
				$sql .=  " ((myear =  '".$year. "' and monthh <  ".$month.")  or (myear =  '" .$year. "' and monthh >= 10 and monthh <=12) ";
		}elseif($month  <> '' and $month >8 ){	
				$sql .=  "   ((myear =  '".$year. "'  and monthh >= 10 and monthh < ".$month.") ";
		}
		$sql .=  " or myear <  '".$year. "')  ";
		$sql .=  " group by rmk ";
		echo $sql."<br>";
		$result = mysql_query($sql);
		if($result)
		$rs_1=mysql_fetch_array($result);
		return $rs_1[total1];
}
////////////////////////////    เก็บได้ในเดือน   ////////////////////////////////////////
function Find_SumGeTG8($year,$month){
	if ($month == '09' or $month == '10' or $month == '11' ) {
							$Yr = ($year-1);
	}else{
							$Yr = ($year);
	}	
	if ($month == '12' ) {
			$p_date_2 = ($Yr-543)."-01-%";
	}else{
	$month1 = ($month+1);
		$ex2 = strlen($month1);
			if($ex2 =='2') $month11 = $month1;	
			else $month11 = "0".$month1;
			$p_date_2 = ($Yr-543)."-".($month11)."-%";
	}	
	 $sql1 =  "select count(rec_id), sum(sum_m) as total1 from meter m
		            where myear =  '".$year. "' and monthh =  ".$month." 
					and rec_id <> ''and rec_id is not null and rec_status is not null
				    and rec_status <>'ยกเลิก' and p_date like '" .$p_date_2 ."' 
		            group by mid(p_date,6,2),mid(p_date,1,4)  ";
		$result1 = mysql_query($sql1);
		if($result1)
		$rs_1=mysql_fetch_array($result1);
		return $rs_1[total1];	
   }
////////////////////////////    เก็บได้ค้างเก่า   ////////////////////////////////////////
function Find_SumPayArrearsG8($year,$month){
	if ($month == '09' or $month == '10' or $month == '11') {
							$Yr = ($year-1);
	}else{
							$Yr = ($year);
	}	
	if ($month == '12' ) {
			$p_date_3 = ($Yr-543)."-01-%";
	}else{
	$month2 = ($month+1);
		$ex3 = strlen($month2);
			if($ex3 =='2') $monthh = $month2;
			else $monthh = "0".$month2;
			$p_date_3 = ($Yr-543)."-".($monthh)."-%";
	}		
		$sql2 =  " select count(rec_id) ,sum(sum_m) as total2 from meter m  
        Where rec_id <> '' and rec_id is not null and  p_date like '".$p_date_3."'  and p_date <> '1111-11-11'  and ";
        	if($month  <> '' and $month <=8 ){		 
				$sql2 .=  " ((myear =  '".$year. "' and monthh <  ".$month.")  or (myear =  '" .$year. "' and monthh >= 10 and monthh <=12) ";
		}elseif($month  <> '' and $month >8 ){	
				$sql2 .=  "   ((myear =  '".$year. "'  and monthh >= 10 and monthh < ".$month.") ";
		}
       $sql2 .=  " or myear <  '" .$year. "')  and rec_status is not null and rec_status <> 'ยกเลิก' 
       group by mid(p_date,6,2),mid(p_date,1,4) ";
	   	$result2 = mysql_query($sql2);
		if($result2)
		$rs_2=mysql_fetch_array($result2);
		return $rs_2[total2];	
}
////////////////////////////    ยอดตั้งเก็บ   ////////////////////////////////////////
function Find_SumTotalG8($year,$month){
        $sql3 =  "select if(sum(sum_m) is null,'0.00',sum(sum_m)) as  total3 ,count(rec_id) as crec_id  from meter
		            where myear =  '".$year. "' and monthh =  ".$month." 
					 and rec_status is not null and rec_status <>'ยกเลิก'
		             group by monthh,myear  ";
		$result3= mysql_query($sql3);
		if($result3)
		$rs_3=mysql_fetch_array($result3);
		return $rs_3[total3]."*".$rs_3[crec_id];
}
////////////////////////////    เก็บได้ในเดือน ก.ย.   ////////////////////////////////////////
function Find_SumGeTG8_2($year,$month){
	if ($month == '09' or $month == '10' or $month == '11') {
							$Yr = ($year-1);
	}else{
							$Yr = ($year);
	}	
			$p_date_5 = ($Yr-543)."-10-%";
        $sql5 =  "select count(rec_id), sum(sum_m) as total5 from meter m
		            where myear =  '".$Yr. "' and monthh =  ".$month." 
					and rec_id <> ''and rec_id is not null and rec_status is not null
				    and rec_status <>'ยกเลิก' and p_date like '" .$p_date_5 ."' 
		            group by mid(p_date,6,2),mid(p_date,1,4)  ";
		$result5 = mysql_query($sql5);
		if($result5)
		$rs_5=mysql_fetch_array($result5);
		return $rs_5[total5];
}
////////////////////////////    เก็บได้ค้างเก่า  ก.ย.  ////////////////////////////////////////
function Find_SumPayArrearsG8_2($year,$month){
	if ($month == '09' or $month == '10' or $month == '11') {
							$Yr = ($year-1);
	}else{
							$Yr = ($year);
	}	
	$p_date_6 =  ($Yr-543)."-10-%";
	$sql6 =  " select count(rec_id) ,sum(sum_m) as total6 from meter m  
        Where rec_id <> '' and rec_id is not null and  p_date like '".$p_date_6."'  and p_date <> '1111-11-11'  and ";
				$sql6 .=  " ((myear =  '".$Yr. "' and monthh <  ".$month.")  or (myear =  '" .$Yr. "' and monthh >= 10 and monthh <=12) ";
       $sql6 .=  " or myear <  '" .$Yr. "')  and rec_status is not null and rec_status <> 'ยกเลิก' 
       group by mid(p_date,6,2),mid(p_date,1,4) ";
		$result6 = mysql_query($sql6);
		if($result8)
		$rs_6=mysql_fetch_array($result6);
		return $rs_6[total6];
}
////////////////////////////    ยอดรวมใหม่ + ค้างเก่า  ก.ย.  ////////////////////////////////////////
function Find_SumRemain8_2($year,$month){
	if ($month == '09' or $month == '10' or $month == '11') {
							$Yr = ($year-1);
	}else{
							$Yr = ($year);
	}	
	$p_date_7 =  ($Yr-543)."-09-31";
	$sql7 =  " select if(sum(sum_m) is null,'0.00',sum(sum_m)) as total7 from meter m  
    where ( ((rec_id = '' or rec_id is  null or p_date ='1111-11-11') and rec_status = 'ค้างชำระ') 
	 or  p_date > '".$p_date_7."') and 
	 ((myear =  '".$Yr. "' and monthh <  ".$month.")  or (myear =  '" .$Yr. "' and monthh >=  ".$month." and monthh <=12) 
	  or myear <  '" .$Yr. "') group by rmk ";
		$result7 = mysql_query($sql7);
		if($result7)
		$rs_7=mysql_fetch_array($result7);
		return $rs_7[total7];
}
////////////////////////////    ยอดตั้งเก็บ ก.ย   ////////////////////////////////////////
function Find_SumTotalG8_2($year,$month){
        $sql8 =  "select if(sum(sum_m) is null,'0.00',sum(sum_m)) as  total8 ,count(rec_id) as crec_id  from meter
		            where myear =  '".($year-1). "' and monthh =  ".$month." 
					 and rec_status is not null and rec_status <>'ยกเลิก'
		             group by monthh,myear  ";
		$result8= mysql_query($sql8);
		if($result8)
		$rs_8=mysql_fetch_array($result8);
		return $rs_8[total8]."*".$rs_8[crec_id];
}
?>