<SCRIPT LANGUAGE=JavaScript>
<!--

function makeArray(n){this.length = n;return this;}

 month   = new makeArray(12);
 smonth  = new makeArray(12);
 mday	= new makeArray(12);

 month[1]="มกราคม";
 month[2]="กุมภาพันธ์";
 month[3]="มีนาคม";
 month[4]="เมษายน";
 month[5]="พฤษภาคม";
 month[6]="มิถุนายน";
 month[7]="กรกฏาคม";
 month[8]="สิงหาคม";
 month[9]="กันยายน";
 month[10]="ตุลาคม";
 month[11]="พฤศจิกายน";
 month[12]="ธันวาคม";

 smonth[1]="ม.ค.";
 smonth[2]="ก.พ.";
 smonth[3]="มี.ค.";
 smonth[4]="เม.ย.";
 smonth[5]="พ.ค.";
 smonth[6]="มิ.ย.";
 smonth[7]="ก.ค.";
 smonth[8]="ส.ค.";
 smonth[9]="ก.ย.";
 smonth[10]="ต.ค.";
 smonth[11]="พ.ย.";
 smonth[12]="ธ.ค.";

mday[1]=31; 
mday[2]=28;
mday[3]=31;
mday[4]=30;
mday[5]=31;
mday[6]=30;
mday[7]=31;
mday[8]=31;
mday[9]=30;
mday[10]=31;
mday[11]=30;
mday[12]=31;

msPerDay  =  1000*60*60*24+900000;

browserName = navigator.appName;
browserVer = parseFloat(navigator.appVersion);
if ((browserName == "Netscape" && browserVer >= 3)|| browserVer>=4) 
   newBrowser="true";
else newBrowser = "false";

dispMonth=null;
calendarWin=null;


function noError(){return true;}
window.onerror=noError;


function validateDaysetnextday (yCtrl, mCtrl, dCtrl,warn)
{
   
validateDay (yCtrl, mCtrl, dCtrl,warn);

}   


function validateDay (yCtrl, mCtrl, dCtrl,warn)
{
   
 var selday,selmonth,selyear;
 var dayControl,monthControl,yearControl;
 eval("dayControl=document.forms[0]." + dCtrl );
 eval("monthControl=document.forms[0]." + mCtrl );
 eval("yearControl=document.forms[0]." + yCtrl );
 selday=dayControl.selectedIndex;
 selmonth=monthControl.selectedIndex;
 selyear=yearControl.selectedIndex;
 
 if (mday[selmonth]<selday)
 {
  if (selmonth==2) 
  {
   if (isLeapYear(selyear)==true)
   { 
	mday[2]=29;
	if (selday==29)
		return;
   }
  }
	dayControl.options[mday[selmonth]-1].selected=true;
	if (warn==true)
		alert(month[selmonth]+" only has "+mday[selmonth]+" days");   
 }	
}


function isLeapYear(year)
{
	if (year % 4 != 0) { return false; }
	if (year % 400 == 0) { return true;}
	return (year % 100 != 0);
}


function closeCalendar()
{
 if (calendarWin!=null)
 {
    cw=calendarWin;
    calendarWin=null;
    cw.close();
 }
}
 onUnload=closeCalendar;


function openCalendar (yCtrl, mCtrl, dCtrl,pmCtrl,f,i,yStart)
{

 if (newBrowser=="false")
  {
   alert("This feature requires Internet Explorer 4.0, Netscape 3.1 or later versions");
   return;
  }
 today           = new Date();
 currentYear    = today.getYear();
 currentMonth    = today.getMonth();
 prevCtrlMonth=currentMonth;
 dispYear=currentYear;
 dispMonth=currentMonth;
 formIndex  = f;
 yearCtrl = yCtrl;
 monthCtrl = mCtrl;
 dateCtrl  = dCtrl;
 eval("dispYear=document.forms[" + formIndex + "]." + yearCtrl + ".options[document.forms[" + formIndex + "]." + yearCtrl + ".selectedIndex].value");
 eval("dispMonth=document.forms[" + formIndex + "]." + monthCtrl + ".selectedIndex");

if (dispYear < 1900)
{
 dispYear=currentYear;
 dispMonth=currentMonth;
}
else
{
 dispMonth=dispMonth-1;
}

 firstOfMonth  = new Date(dispYear,dispMonth,1);
 calendarWin = this.open("","calendarWin","location=false,toolbar=false,status=false,menubar=false,resizable=true,width=240,height=280,top=50,left=150");
 // Fix the blasted NS Y2K bug.
 if (browserName == "Netscape" && browserVer >= 4.5) 
 {
   newDate = "true";
 }
 else
 {
   newDate = "false";
 }   

 drawCalendar(0,calendarWin,yStart); 
}


function selectDate(dayNum,cWin,yStart) {

if (dispMonth==null) {cWin.close();return}
var y=yearNum-yStart;
eval("document.forms[" + formIndex + "]." + yearCtrl + ".selectedIndex=" + y);
var m=monthNum;
eval("document.forms[" + formIndex + "]." + monthCtrl + ".selectedIndex=" + m);
var d=dayNum;
eval("document.forms[" + formIndex + "]." + dateCtrl  + ".selectedIndex=" + d);
validateDaysetnextday(yearCtrl,monthCtrl,dateCtrl,false)
closeCalendar();
}


function w(htext)
{
buffer+=htext;
}


function drawCalendar (upDown,cWin,yStart)
{

if (dispMonth==null) {cWin.close();return}

 newMonth=dispMonth;
 newMonth+=upDown;
 dispMonth = newMonth;

 buffer=new String();

 if (newDate == "true")
 {
    firstOfMonth = new Date(dispYear,dispMonth,1);
 }
 else
 {
   firstOfMonth = new Date(dispYear,dispMonth,1);
 }

 cWin.document.open();
 if (cWin.opener==null)
    cWin.opener=self;
 calendarWin=cWin;
 buffer="<HTML>\r\n<HEAD>\r\n<SCRIPT LANGUAGE=JavaScript>\r\n <!--\r\n function noError(){window.close(); return true}\r\n function unload(){opener.calendarWin=null}\r\n window.onerror=noError;\r\n \/\/-->\r\n <\/SCRIPT>\r\n <title>Calendar<\/title><\/HEAD>\r\n <BODY BGCOLOR=#ffffff onUnload=unload() >\r\n";
 w('<FORM><CENTER>');
 monthNum = firstOfMonth.getMonth() + 1;
 pM=monthNum-1; if (pM<1)  pM+=12;
 nM=monthNum+1; if (nM>12) nM-=12;
 if (newDate == "true")
 {
   yr = firstOfMonth.getFullYear();
 }
 else
 {
    yr = firstOfMonth.getYear();
    if (yr <1999)
    {
      yr += 1900;
    }
 }
 yearNum = yr + 1;

 w("\r\n<TABLE BORDER=0 CELLPADDING=4 CELLSPACING=0 BGCOLOR=#EEEEEE WIDTH=200>\r\n");
 
 w("<TR><TD ALIGN=CENTER HEIGHT=35 BGCOLOR=#CCCCCC WIDTH='10%'><INPUT TYPE='BUTTON' VALUE=\"<<\" onclick=opener.drawCalendar(-1,window,"+ yStart + ") ></TD>\r\n");
 w("<TD ALIGN=CENTER HEIGHT=35 BGCOLOR=#CCCCCC WIDTH='80%'><FONT FACE=VERDANA SIZE=2 COLOR=RED><B>\r\n");
 w(month[monthNum] + " " + (yr+543) +"\r\n</B></FONT></TD>\r\n");
 w("<TD ALIGN=CENTER HEIGHT=35 BGCOLOR=#CCCCCC WIDTH='10%'><INPUT TYPE='BUTTON'  NAME="+smonth[nM]+" VALUE=\">>\" onclick=opener.drawCalendar(1,window," + yStart + ") ></TD>\r\n");
 w("</TR>\r\n");
 
 w("<TR><TD ALIGN=CENTER COLSPAN=3>\r\n");

 w("<TABLE BORDER=1 CELLPADDING=0 CELLSPACING=0 BORDERCOLOR=#CCCCCC>\r\n");
 
 w("<TR BGCOLOR=#CCCCCC HEIGHT=23>\r\n");
 w("<TH><FONT FACE=VERDANA SIZE=1><B>อา</B></FONT></TH>\r\n");
 w("<TH><FONT FACE=VERDANA SIZE=1><B>จ</B></FONT></TH>\r\n");
 w("<TH><FONT FACE=VERDANA SIZE=1><B>อ</B></FONT></TH>\r\n");
 w("<TH><FONT FACE=VERDANA SIZE=1><B>พ</B></FONT></TH>\r\n");
 w("<TH><FONT FACE=VERDANA SIZE=1><B>พฤ</B></FONT></TH>\r\n");
 w("<TH><FONT FACE=VERDANA SIZE=1><B>ศ</B></FONT></TH>\r\n");
 w("<TH><FONT FACE=VERDANA SIZE=1><B>ส</B></FONT></TH></TR>\r\n");

 activeMonth = firstOfMonth.getMonth();

 firstCell = firstOfMonth.getTime() - (msPerDay*firstOfMonth.getDay());
 firstOfMonth.setTime(firstCell);

 for (row=0; row<6; row++)
 {
  w("\r\n<TR BGCOLOR=#FFFFFF HEIGHT=25>");
  for (col=0; col<7; col++)
  {
   date = firstOfMonth.getDate();
   w("<TD ALIGN=CENTER>");

   if (firstOfMonth.getMonth() != activeMonth)
    w("&nbsp;");
   else
   {
 	 w("<INPUT TYPE=BUTTON NAME="+date+ " VALUE=");
 	 if ( date < 10 )
        w("0");
 	 w(date + " onClick=opener.selectDate(" + date + ",window," + yStart + ")>");
   }
   nextDay = firstOfMonth.getTime() + msPerDay;
   firstOfMonth.setTime(nextDay);
   w("</TD>");
  }
  w("</TR>");
 }
 w("\r\n</TABLE></TD></TR>");
 w("\r\n<TR><TD BGCOLOR=#CCCCCC COLSPAN=3 HEIGHT=10>&nbsp;</TD></TR>");
 w("\r\n </TABLE></CENTER></FORM>\r\n</BODY></HTML>");

 calendarWin.document.write(buffer);
 calendarWin.document.close();

 calendarWin.focus();

}

//-->

</SCRIPT>

<?php

function day_drop_down ($sDayName, $iDayValue) {
	$sDayDropDown = "<select Name='" . $sDayName . "' size='1'>\n";
	$sDayDropDown .= "	<option value='00'>---วัน---\n";
	for ($i = 1; $i <= 31; $i++)
	{
		if ($iDayValue == $i)
		{
			$sDayDropDown .= "	<option value='". substr("0". $i, (strlen("0". $i)-2), 2) ."' selected>" . $i . "\n";
		}
		else
		{
			$sDayDropDown .= "	<option value='". substr("0". $i, (strlen("0". $i)-2), 2) ."'>" . $i . "\n";
		}
	}
	$sDayDropDown .= "</select>\n";
	return $sDayDropDown;
}

function month_drop_down ($sMonthName, $iMonthValue) {
	$sMonthDropDown = "<select Name='" . $sMonthName . "' size='1'>\n";
	$sMonthDropDown .= "	<option value='00'>---เดือน---\n";
	for ($i = 1; $i <= 12; $i++)
	{
		switch ($i) {
			case "1":
				$sMonth = "มกราคม";
				break;
			case "2":
				$sMonth = "กุมภาพันธ์";
				break;
			case "3":
				$sMonth = "มีนาคม";
				break;
			case "4":
				$sMonth = "เมษายน";
				break;
			case "5":
				$sMonth = "พฤษภาคม";
				break;
			case "6":
				$sMonth = "มิถุนายน";
				break;
			case "7":
				$sMonth = "กรกฏาคม";
				break;
			case "8":
				$sMonth = "สิงหาคม";
				break;
			case "9":
				$sMonth = "กันยายน";
				break;
			case "10":
				$sMonth = "ตุลาคม";
				break;
			case "11":
				$sMonth = "พฤศจิกายน";
				break;
			case "12":
				$sMonth = "ธันวาคม";
				break;
		}

		if ($iMonthValue == $i)
		{
			$sMonthDropDown .= "	<option value='". substr("0". $i, (strlen("0". $i)-2), 2) ."' selected>" . $sMonth . "\n";
		}
		else
		{
			$sMonthDropDown .= "	<option value='". substr("0". $i, (strlen("0". $i)-2), 2) ."'>" . $sMonth . "\n";
		}
	}
	$sMonthDropDown .= "</select>\n";
	return $sMonthDropDown;
}

function year_drop_down ($sYearName, $iYearValue, $iAddDisplay, $iAddStartYear, $iAddEndYear) {
	if (strlen($iAddDisplay) < 1)
	{
		$iAddDisplay = 0;
	}
	if (strlen($iAddStartYear) < 1)
	{
		$iAddStartYear = -2;
	}
	if (strlen($iAddEndYear) < 1)
	{
		$iAddEndYear = 2;
	}
	$iCurrYear = date("Y");

	$sYearDropDown = "<select Name='" . $sYearName . "' size='1'>\n";
	$sYearDropDown .= "	<option value='0000'>---ปี---\n";

	for ($i = ($iCurrYear + $iAddStartYear); $i <= ($iCurrYear + $iAddEndYear); $i++)
	{
		if ($iYearValue == $i)
		{
			$sYearDropDown .= "	<option value='". $i ."' selected>" . ($i + $iAddDisplay) . "\n";
		}
		else
		{
			$sYearDropDown .= "	<option value='". $i ."'>" . ($i + $iAddDisplay) . "\n";
		}
	}
	$sYearDropDown .= "</select>\n";
	return $sYearDropDown;
}

?>
