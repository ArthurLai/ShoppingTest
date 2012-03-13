<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>
<script type="text/javascript">

function sayGood()
{
	var form = document.getElementById('reviewpost');
	var stars = form.elements['stars_value'].value;
	var title = form.elements['title'].value;
	var content = form.elements['content'].value;
	var postData = 'stars=' + stars + '&title=' + title + '&content=' + content;
	
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} 
			
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			if(xmlhttp.responseText == 'true')
				document.getElementById(id).innerHTML = '';					
		}
	};
	
	source = 'receivepost.php?' + postData;
	xmlhttp.open('GET', source, true);
	xmlhttp.send();
}

/* 傳送連接 */
function postReview(){

	var form = document.getElementById('reviewpost');
	var stars = form.elements['stars_value'].value;
	var title = form.elements['title'].value;
	var content = form.elements['content'].value;
	var postData = 'stars=' + stars + '&title=' + title + '&content=' + content;
	
    /*建立傳送的資料 */
    //var postData = 'user=xxxx&pass=xxxx';
    /*產生要求資料的 URL 位址*/
    var sURL = "receivepost.php";
    /* 建立 XMLHttpRequest 物件，並且送要求 */
   		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} 
    var oRequest = xmlhttp;
    /* 設定(傳送的方式,要求的位址,是否非同步進行) */
    oRequest.open("POST", sURL, true);
    /* 使用 POST 傳送必須設定 MIME 型態 */
    oRequest.setRequestHeader(
        'Content-Type',
        'application/x-www-form-urlencoded'
    );

    /* 建立接收資料的函數 */
    oRequest.onreadystatechange = function(){
        /* readyState 所有可能的傳送狀態值如下：
         0 (還沒開始)
         1 (讀取中)
         2 (已讀取)
         3 (資訊交換中)
         4 (請求完成) */
        if (oRequest.readyState == 4) {
            /* (在此處加入開啟已停用選項的設置) */
            /* 處理傳回為 200 的 HTTP 狀態碼 */
            if (oRequest.status == 200) {
                /* 接受資料成功 */
                /*可以從responseText或responseXML取得傳回的資料*/
                json = oRequest.responseText;

                /* 處理其他錯誤 HTTP 狀態碼 */
            }else{
                /*接收資料失敗，可以從 statusText 取得錯誤狀態資訊*/
                alert(oRequest.statusText);
            }
        }
    }

    /* (在此處可以加入一些網頁選項停用的設置,以防止重複送出) */

    /* 送出 Ajax 要求 */
    oRequest.send(postData);
    /*以POST傳送時,這裡可以輸入(XML,串流,字串,JSON格式)*/
    /*以GET傳送時,這裡只要輸入 null 或是空的 */
}

</script>
</head>
<body>
	
						<form id="reviewpost" onsubmit="postReview(); return false;" >
							<table>
								<tr>
									<td>評分</td>
									<td>
										<input type="radio" value=1 name="stars"  onclick="document.getElementById('stars_value').value=1"> 1 </input>
										<input type="radio" value=2 name="stars"  onclick="document.getElementById('stars_value').value=2"> 2 </input>
										<input type="radio" value=3 name="stars"  onclick="document.getElementById('stars_value').value=3"> 3 </input>
										<input type="radio" value=4 name="stars"  onclick="document.getElementById('stars_value').value=4"> 4 </input>
										<input checked="checked" type="radio" value=5 name="stars"  onclick="document.getElementById('stars_value').value=5"> 5 </input>
									</td>
								</tr>
								<tr>
									<td>標題</td>
									<td><input type="text" name="title"></input></td>
								</tr> 
								<tr>
									<td>評語</td>
									<td><textarea name="content" rows="3" cols="20"></textarea></td>
								</tr>
								<tr>
									<td><input type="hidden" id="stars_value" name="stars_value" value=5></input></td>
									<td><input type="submit" value="送出" /></td>
								</tr>
							</table>
						</form>

</body>
</html>