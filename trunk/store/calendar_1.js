
var frmField, frmValue;

var date = new Date()
var minYear = date.getYear() - 2, maxYear = date.getYear() +10;

document.write('<table id="tblCalender" cellpadding="1" cellspacing="1" border="0"'
	+'style="position:absolute;visibility:hidden;font-family:sans-serif;font-size:8pt;font-weight:bold;border:thin solid #000;background-color:#7292b8;">');
document.write('<tr>');
document.write('<td colspan="6" align="center">');

document.write('<select name="optCalenderMonth" onchange="updateMenu();" style="font-size:8pt;font-weight:bold;">');
for (i=0; i<12; i++){
	document.write('<option value="' + i + '">' + getMonths(i) + '</option>');
}
document.write('</select>&nbsp;&nbsp;');

document.write('<select name="optCalenderYear" onchange="updateMenu();" style="font-size:8pt;font-weight:bold;">');
for (i=minYear; i<=maxYear; i++){
	document.write('<option value="' + i + '">' + i + '</option>');
}
document.write('</select>');
document.write('</td>');

document.write('<td   align="right" valign="top"><div style="cursor:hand;font-size:8px;text-align:center;color:#2E578A;" '
	+ 'onmouseover="closeOver();" '
	+ 'onmouseout="closeOut();" '
	+ 'onclick="closeClick();">X</div></td>');
document.write('</tr>');

document.write('<tr>');
var str = "Sun,Mon,Tue,Wed,Thu,Fri,Sat";
var arr = str.split(',');
for (i=0; i<7; i++){
	document.write('<th style="background-color:#fff;">' + arr[i] + '</th>');
}
document.write('</tr>');
// Grid
for (i = 0; i < 6; i++) { // 6 weeks
	document.write('<tr>');
	for (j = 0; j < 7; j++) { // 7 days per week
		document.write('<td id="tdCalender" style="text-align:left;vertical-align:top;width:25px;cursor:hand;background-color:#fff;" '
			+ 'onmouseover="calOver();" '
			+ 'onmouseout="calOut();" '
			+ 'onclick="calClick();">');
		document.write('</td>');
	}
	document.write('</tr>');
}
document.write('</table>');


function getDates(y, m) {
	var dates = new Array(42);
	var first = new Date(y, m, 1).getDay();
	var days = 32 - new Date(y, m, 32).getDate();
	var i = 1;
	for (j = first; j <first+days; j++) {
		dates[j] = i;
		i++;
	}
	return dates;
}
function getMonths(i){
	//var sMonths = "January,February,March,April,May,June,July,August,September,October,November,December";
	var sMonths = "มกราคม,กุมภาพันธ์,มีนาคม,เมษายน,พฤษภาคม,มิถุนายน,กรกฎาคม,สิงหาคม,กันยายน,ตุลาคม,พฤศจิกายน,ธันวาคม";
	var aMonth = sMonths.split(',');
	return aMonth[i];
}
function updateMenu(){
	updateCalender(document.getElementById('optCalenderYear').value, document.getElementById('optCalenderMonth').value);
}
function updateCalender(y, m) {
	var arr = getDates(y, m);
	for (i=0; i<document.getElementById('optCalenderYear').options.length; i++) {
		if (document.getElementById('optCalenderYear').options[i].value == y) {
			document.getElementById('optCalenderYear').options.selectedIndex = i;
		}
	}
	for (i=0; i<document.getElementById('optCalenderMonth').options.length; i++) {
		if (document.getElementById('optCalenderMonth').options[i].value == m) {
			document.getElementById('optCalenderMonth').options.selectedIndex = i;
		}
	}
	for (i=0; i<arr.length; i++) {
		if (!isNaN(arr[i])) tdCalender[i].innerText = arr[i];
		else tdCalender[i].innerText = "";
	}
}
function popupCalender(field){
	frmField = document.getElementById(field);
	frmValue = frmField.value;
	var thisDate, thisYear, thisMonth;
	with (document.getElementById('tblCalender')){
		style.visibility = "visible";
		style.top = event.clientY + document.body.scrollTop;
		style.left = event.clientX + document.body.scrollLeft-170;

		SetVis('SELECT','hidden');
	}
	var reDate = /^\d{2}\/\d{2}\/\d{4}$/;
	if (reDate.test(frmValue)) {
		thisDate = frmValue.split('/');
		thisYear = thisDate[2];
		//thisMonth = thisDate[0]-1;
		thisMonth = thisDate[1]-1;
	}
	else {
		thisDate = new Date();
		thisYear = thisDate.getFullYear();
		thisMonth = thisDate.getMonth();
	}
	updateCalender(thisYear, thisMonth);
} 
function calOver() {
	if (!isNaN(parseInt(event.srcElement.innerText))) {
		event.srcElement.style.color = "#f00";
	}
}
function calOut() {
	if (!isNaN(parseInt(event.srcElement.innerText))) {
		event.srcElement.style.color = "#000";
	}
}
function calClick() {
	if (!isNaN(parseInt(event.srcElement.innerText))) {
		var strDate = "";
		var strMonth = parseInt(document.getElementById('optCalenderMonth').options[document.getElementById('optCalenderMonth').selectedIndex].value)+1;
		var strYear = document.getElementById('optCalenderYear').options[document.getElementById('optCalenderYear').selectedIndex].value;

		if (parseInt(event.srcElement.innerText) < 10) strDate += "0";
		strDate += event.srcElement.innerText + '/' 
		if (strMonth < 10) strDate += "0";
		strDate += strMonth + '/' + strYear;
		frmField.value = strDate;
		document.getElementById('tblCalender').style.visibility = "hidden";
		SetVis('SELECT','');
	}
}
function closeOver() {
	event.srcElement.style.backgroundColor = "#000";
	event.srcElement.style.color = "#FFCC00";
}
function closeOut() {
	event.srcElement.style.backgroundColor = "#7292b8";
	event.srcElement.style.color = "#fff";
}
function closeClick() {
	frmField.value = frmValue;
	document.getElementById('tblCalender').style.visibility = "hidden";
	SetVis('SELECT','');
}

function SetVis(sT,sV)
{
	var ao=document.getElementsByTagName(sT);
	for(var io=0;io<ao.length;io++)
	{
		var o=ao[io];
		if (o.name!='optCalenderMonth' & o.name!='optCalenderYear'){
		if(!o||o.nm_bOk)
		continue;
		o.style.visibility=sV;}
	}
}

