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

		echo "<br><br><center><font color=red  size=3>�ѹ�֡���������º��������</font>		</center><br><br>";
		print "<meta http-equiv=\"refresh\" content=\"1;URL=?action=personnel_story_h&user_id=$max_file_id\">\n";
	}else{
		echo "<br><br><center><font color=red  size=3>����ʡ�ū�ӡ�سҡ�͡����������</font>		</center><br><br>";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>����¹����ѵԾ�ѡ�ҹ</title>

<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
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
     req.open("GET", "ajax_2.php?data="+src+"&val="+val); //���ҧ connection
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //�觤��
}

</script>
<script language="javascript">
	//------------------------------function  ����Ҩҡ form-------------------------
	function validate(theForm) 
	{
		if (  document.form1.per_name.value =='' || document.form1.per_name.value == ' ')
           {
           alert("��سҡ�͡����ʡ��");
           document.form1.per_name.focus();           
           return false;
           }
		
			return true;
	}
</script>
<script language="JavaScript" type="text/javascript">
	//------------------------------function  ����Ҩҡ form-------------------------
	function validate(theForm) 
	{
		if (  document.add_user.div_name.value=='' || document.add_user.div_name.value==' ' )
           {
           alert("��س����͡�ͧ");
           document.add_user.div_name.focus();           
           return false;
           }
		   if (  document.add_user.sub_name.value=='' || document.add_user.sub_name.value==' ' )
           {
           alert("��س����͡����");
           document.add_user.sub_name.focus();           
           return false;
           }
		    if (  document.add_user.level.value=='' || document.add_user.level.value==' ' )
           {
           alert("��س����͡�дѺ�����ҹ");
           document.add_user.level.focus();           
           return false;
           }
		    if (  document.add_user.u_name.value=='' || document.add_user.u_name.value==' ' )
           {
           alert("��سҡ�͡���ͼ����");
           document.add_user.u_name.focus();           
           return false;
           }
		    if (  document.add_user.u_surname.value=='' || document.add_user.u_surname.value==' ' )
           {
           alert("��سҡ�͡���ʡ�ż����");
           document.add_user.u_surname.focus();           
           return false;
           }
		    if (  document.add_user.user_name.value=='' || document.add_user.user_name.value==' ' )
           {
           alert("��سҡ�͡ Username");
           document.add_user.user_name.focus();           
           return false;
           }
		   if (  document.add_user.password.value=='' || document.add_user.password.value==' ' )
           {
           alert("��سҡ�͡ Password");
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
      <td width="100%" height="30" align="center" class="lgBar1"  >&nbsp;��¡/�ͧ��¡/��Ҫԡ��� ���</td>
    </tr>
	
  </table>
  <div align="center" >
<div style="border:0px solid; width:98%; border-color:#0000FF"  >

<fieldset>
	<legend align="left" >
	<span class="pageName"  >��ǹ��� 1 : ��������ǹ���</span>
	</legend>
	<br>
	<table width="100%"  cellpadding="0" cellspacing="0" border="0"  align="left">
      <tr>
        <td width="269" class="style_h"><div align="left"> �ӹ�˹�Ҫ��� / ��
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
        <td  height="30" class="style_h"><div align="left"> ����-ʡ��  &nbsp;&nbsp; <font color="#FF0000">*</font></div></td>
        <td width="519"><div align="left">
            <input name="per_name" type="text" id="per_name" value="<?=$per_name?>" size="25" maxlength="100"class="text" />
        </div></td>
      </tr>
	  <tr><td width="269" height="30" class="style_h"><div align="left">�Ţ��Шӵ�ǻ�ЪҪ�</div></td>
        <td ><div align="left">
            <input name="id_person" type="text" size="15" maxlength="20" value="<?=$id_person?>" class="text" />
        </div></td>
	
        	
        <td width="202" class="style_h"><div align="left">�ѹ ��͹ �� �Դ </div></td>
        <td  height="30"   colspan="3" class="style_h"><div align="left" >�ѹ��� 
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
        &nbsp;��͹ 
        <select name="month1" id="month1" class="text">
          <option value="01" selected>���Ҥ�</option>
          <option value=02>����Ҿѹ��</option>
          <option value=03>�չҤ�</option>
          <option value=04>����¹</option>
          <option value=05>����Ҥ�</option>
          <option value=06>�Զع�¹</option>
          <option value=07>�á�Ҥ�</option>
          <option value=08>�ԧ�Ҥ�</option>
          <option value=09>�ѹ��¹</option>
          <option value=10>���Ҥ�</option>
          <option value=11>��Ȩԡ�¹</option>
          <option value=12>�ѹ�Ҥ�</option>
        </select>
        &nbsp; �.�. 
        <input name="year1" type="text" id="year1" size="3" class="text" maxlength="4">
            </div></td>
      </tr>
      <tr>
        <td class="style_h" ><div align="left">�ѭ�ҵ�</div></td>
        <td width="308"><div align="left">
          <input name="nationality" type="text" size="10"  value="<?=$nationality?>" class="text"/>
        </div></td>
        <td width="202" class="style_h"><div align="left">���ͪҵ�</div></td>
        <td width="519"><div align="left">
            <input name="race" type="text" size="10"  value="<?=$race?>"class="text" />
        </div></td>
      </tr>
      <tr>
        <td class="style_h" ><div align="left">��ʹ�</div></td>
        <td width="308"><div align="left">
            <input name="faith" type="text" size="10"  value="<?=$faith?>" class="text">
        </div></td>
        <td width="202" class="style_h"><div align="left">�������ʹ</div></td>
        <td width="519"><div align="left">
            <input name="blood" type="text" size="10"  value="<?=$blood?>" class="text"/>
        </div></td>
      </tr>
	  
	  <tr>
		<td width="269" class="style_h"><div align="left">��</div></td>
                <td  ><div align="left">
                    <input name="sex" size="15"  value="˭ԧ"  type="radio" <? if($sex =='˭ԧ') echo "checked"?> class="text"/> &nbsp;&nbsp;˭ԧ&nbsp;&nbsp;
					<input name="sex" size="15"  value="���"  type="radio" <? if($sex =='���') echo "checked"?> class="text"/> &nbsp;&nbsp;���
                </div></td>
<td width="202" class="style_h"><div align="left">ʶҹ�Ҿ��ͺ����</div></td>
                <td  ><div align="left"><select name="status_ma" class="text">
				<option value="">- - - ���͡ - -  -</option>
				<option value="�ʴ">�ʴ</option>
				<option value="����">����</option>
				<option value="�����">�����</option>
				<option value="������ҧ">������ҧ</option>
                  </select>
                </div></td>
	    </tr>
		<tr>
        <td class="style_h" ><div align="left">�Ҫվ���</div></td>
        <td width="308"><div align="left">
          <input name="occu_old" type="text" size="15"  value="<?=$occu_old?>" class="text"/>
        </div></td>
        <td width="202" class="style_h"><div align="left">�Ҫվ�Ѩ�غѹ</div></td>
        <td width="519"><div align="left">
            <input name="occu_new" type="text" size="15"  value="<?=$occu_new?>"class="text" />
        </div></td>
      </tr>
	  <tr>
                <td   colspan="4"><div align="left">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
     <td width="338"  class="style_h"><div align="left">�ԴҪ���</div></td>
    <td width="357"><div align="left"><input name="fa_name" type="text" size="15"  value="<?=$fa_name?>" class="text"/></div></td>
     <td width="100"  class="style_h"><div align="left">�ѭ�ҵ�</div></td>
    <td width="100">&nbsp;
      <input name="fa_nation" type="text" size="5"  value="<?=$fa_nation?>" class="text"/></td>
      <td width="100"  class="style_h"><div align="left">��ʹ�</div></td>
    <td width="100">&nbsp;
      <input name="fa_faith" type="text" size="5"  value="<?=$fa_faith?>" class="text"/></td>
     <td width="100"  class="style_h"><div align="left">�Ҫվ</div></td>
    <td width="100">&nbsp;
      <input name="fa_occu" type="text" size="5"  value="<?=$fa_occu?>" class="text"/></td>
  </tr>


  <tr>
     <td width="338"  class="style_h"><div align="left">��ôҪ���</div></td>
    <td width="357"><div align="left"><input name="mo_name" type="text" size="15"  value="<?=$mo_name?>" class="text"/></div></td>
     <td width="100"  class="style_h"><div align="left">�ѭ�ҵ�</div></td>
    <td width="100">&nbsp;
      <input name="mo_nation" type="text" size="5"  value="<?=$mo_nation?>" class="text"/></td>
      <td width="100"  class="style_h"><div align="left">��ʹ�</div></td>
    <td width="100">&nbsp;
      <input name="mo_faith" type="text" size="5"  value="<?=$mo_faith?>" class="text"/></td>
     <td width="100"  class="style_h"><div align="left">�Ҫվ</div></td>
    <td width="100">&nbsp;
      <input name="mo_occu" type="text" size="5"  value="<?=$mo_occu?>" class="text"/></td>
  </tr>

  <tr>
     <td width="338"  class="style_h"><div align="left">������ʪ���</div></td>
    <td width="357"><div align="left"><input name="mate_name" type="text" size="15"  value="<?=$mate_name?>" class="text"/></div></td>
     <td width="100"  class="style_h"><div align="left">�ѭ�ҵ�</div></td>
    <td width="100">&nbsp;
      <input name="mate_nation" type="text" size="5"  value="<?=$mate_nation?>" class="text"/></td>
      <td width="100"  class="style_h"><div align="left">��ʹ�</div></td>
    <td width="100">&nbsp;
      <input name="mate_faith" type="text" size="5"  value="<?=$mate_faith?>" class="text"/></td>
     <td width="100"  class="style_h"><div align="left">�Ҫվ</div></td>
    <td width="100">&nbsp;
      <input name="mate_occu" type="text" size="5"  value="<?=$mate_occu?>" class="text"/></td>
  </tr>
</table>

                </div></td>

	    </tr>
		   <tr>
	  <td width="269" class="style_h"><div align="left">�ٻ�Ҿ </div></td>
        <td  height="30"  colspan="3"><div align="left">
		  <input type="file" name="image" size="40"  value="<?=$image?>"maxlength="255" class="text">
		  </div>		  </td>
		  </tr>
		  
		    <tr>
        <td colspan="4" ><br />
            <fieldset>
            <legend align="left" > <span class="logout"  >����������� </span> </legend>
              <br />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" class="style_h"><div align="left">�Ţ��� </div></td>
                <td width="19%"><div align="left">
                    <input name="num_address_old" type="text"  size="10"  value="<?=$num_address_old?>" class="text"/>
                </div></td> 
				<td width="10%" class="style_h"><div align="left">������</div></td>
                <td width="24%"><div align="left">
                    <input name="moo_old" type="text" size="10"   value="<?=$moo_old?>" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">���</div></td>
                <td width="19%"><div align="left">
                    <input name="road_old" type="text" size="10"  value="<?=$road_old?>" class="text"/>
                </div></td>
              </tr>
              <tr>
             
               <td width="20%" class="style_h"><div align="left">�Ӻ� </div></td>
                <td width="19%"><div align="left">
                    <input name="subdistrict_old" type="text"  value="<?=$subdistrict_old?>" size="10" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">�����</div></td>
                <td width="19%"><div align="left">
                    <input name="district_old" type="text"   value="<?=$district_old?>"size="10" class="text"/>
                </div></td>
				   <td width="10%" class="style_h"><div align="left">�ѧ��Ѵ</div></td>
                <td width="24%"><div align="left">
                    <input name="county_old"  value="<?=$county_old?>" type="text" size="10" class="text"/>
                </div></td>
              </tr>
              <tr>
                <td width="8%" class="style_h"><div align="left">���Ѿ�������Ţ</div></td>
                <td width="19%" ><div align="left">
                    <input name="phone_old" type="text" size="20"  value="<?=$phone_old?>" maxlength="31" class="text"/>
                </div></td>
				 <td width="8%" class="style_h"><div align="left">��Ͷ��</div></td>
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
            <legend align="left" > <span class="logout"  >�������һѨ�غѹ </span> </legend>
              <br />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" class="style_h"><div align="left">�Ţ��� </div></td>
                <td width="19%"><div align="left">
                    <input name="num_address" type="text"  size="10"  value="<?=$num_address?>" class="text"/>
                </div></td> 
				<td width="10%" class="style_h"><div align="left">������</div></td>
                <td width="24%"><div align="left">
                    <input name="moo" type="text" size="10"   value="<?=$moo?>" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">���</div></td>
                <td width="19%"><div align="left">
                    <input name="road" type="text" size="10"  value="<?=$road?>" class="text"/>
                </div></td>
              </tr>
              <tr>
                 
               <td width="20%" class="style_h"><div align="left">�Ӻ� </div></td>
                <td width="19%"><div align="left">
                    <input name="subdistrict" type="text"  value="<?=$subdistrict?>" size="10" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">�����</div></td>
                <td width="19%"><div align="left">
                    <input name="district" type="text"   value="<?=$district?>"size="10" class="text"/>
                </div></td> 
				<td width="10%" class="style_h"><div align="left">�ѧ��Ѵ</div></td>
                <td width="24%"><div align="left">
                    <input name="county"  value="<?=$county?>" type="text" size="10" class="text"/>
                </div></td>
              </tr>
              <tr>
	
                <td width="8%" class="style_h"><div align="left">���Ѿ�������Ţ</div></td>
                <td width="19%" ><div align="left">
                    <input name="phone" type="text" size="20"  value="<?=$phone?>" maxlength="31" class="text"/>
                </div></td> <td width="8%" class="style_h"><div align="left">��Ͷ��</div></td>
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
            <legend align="left" ><span class="logout"> ʶҹ���������ö�Դ������дǡ</span>  </legend>
              <br />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
                <td width="20%" class="style_h"><div align="left">ʶҹ���������ö�Դ������дǡ</div></td>
                <td  colspan="5"><div align="left">
                    <input name="place_con" type="text"  size="40"  value="<?=$place_con?>" class="text"/>
                </div></td> 
              </tr>
              <tr>
                <td width="20%" class="style_h"><div align="left">�Ţ��� </div></td>
                <td width="19%"><div align="left">
                    <input name="num_address_con" type="text"  size="10"  value="<?=$num_address_con?>" class="text"/>
                </div></td> 
				<td width="10%" class="style_h"><div align="left">������</div></td>
                <td width="24%"><div align="left">
                    <input name="moo_con" type="text" size="10"   value="<?=$moo_con?>" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">���</div></td>
                <td width="19%"><div align="left">
                    <input name="road_con" type="text" size="10"  value="<?=$road_con?>" class="text"/>
                </div></td>
              </tr>
              <tr>
                 
               <td width="20%" class="style_h"><div align="left">�Ӻ� </div></td>
                <td width="19%"><div align="left">
                    <input name="subdistrict_con" type="text"  value="<?=$subdistrict_con?>" size="10" class="text"/>
                </div></td>
                <td width="8%" class="style_h"><div align="left">�����</div></td>
                <td width="19%"><div align="left">
                    <input name="district_con" type="text"   value="<?=$district_con?>"size="10" class="text"/>
                </div></td> 
				<td width="10%" class="style_h"><div align="left">�ѧ��Ѵ</div></td>
                <td width="24%"><div align="left">
                    <input name="county_con"  value="<?=$county_con?>" type="text" size="10" class="text"/>
                </div></td>
              </tr>
              <tr>
	
                <td width="8%" class="style_h"><div align="left">���Ѿ�������Ţ</div></td>
                <td width="19%" ><div align="left">
                    <input name="phone_con" type="text" size="20"  value="<?=$phone_con?>" maxlength="31" class="text"/>
                </div></td> <td width="8%" class="style_h"><div align="left">��Ͷ��</div></td>
                <td width="19%" ><div align="left">
                    <input name="mobile_con" type="text" size="20"  value="<?=$mobile_con?>" maxlength="31" class="text"/>
                </div></td>
              </tr>
            </table>
          </fieldset></td>
      </tr>

      <tr>
        <td colspan="10" height="30" align="center"><!--return godel(); -->
		<input name="admin_submit" type="submit" value="�ѹ�֡������" onClick="return validate();" />
          &nbsp;
          <input name="back"  type="button"value=" ��Ѻ "  onclick="window.navigate('index.php')"/>        </td>
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
	if (confirm("�س��ͧ��úѹ�֡������ ���������"))
	{
		return true;
	}
		return false;
}
function godel_1()
{
	if (confirm("�س��ͧ��úѹ�֡�����ŷ����� ���������"))
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