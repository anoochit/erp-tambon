// JavaScript Documentf
function getHTTPObject(){
	var XMLHttpRequestObject = false;
	if(window.XMLHttpRequest){
		XMLHttpRequestObject = new XMLHttpRequest();
	}else if (window.ActiveXObject){
		XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
	}
return XMLHttpRequestObject;
}

function postDataReturnText(url,data,callback){
	var XMLHttpRequestObject = getHTTPObject();	
	if(XMLHttpRequestObject){
		XMLHttpRequestObject.open("POST",url);
		XMLHttpRequestObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		XMLHttpRequestObject.onreadystatechange = function(){
			if(XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status ==200){
					callback(XMLHttpRequestObject.responseText);
					delete XMLHttpRequestObject;
					XMLHttpRequestObject = null;
			}
		}
		XMLHttpRequestObject.send(data);
	}
}