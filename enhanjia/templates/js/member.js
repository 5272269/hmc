<!--
//if(moz == null) 
//{
//	var ie = document.all != null;
//	var moz = !ie && document.getElementById != null && document.layers == null;
//}
//if(moz) {
//	extendEventObject();
//	extendElementModel();
//	emulateAttachEvent();
//}

function delArc(){
	var qstr=getCheckboxItem();
	if(!qstr){
		alert('没有商品被选中!');
	}else{
		if(confirm('该操作不可恢复,确认继续吗？')){
			location="/administrator.php/shop/order/dopost?id="+qstr+"&dopost=delorder";
		}
	}
}
function checkArc(){
	var qstr=getCheckboxItem();
	if(!qstr){
		alert('没有商品被选中!');
	}else{
		location="/administrator.php/shop/index/dopost?id="+qstr+"&dopost=addorder";
	}
}
function move_Arc(){
	var qstr=getCheckboxItem();
	if(!qstr){
		alert('没有商品被选中!');
	}else{
		location="/administrator.php/shop/index/dopost?id="+qstr+"&dopost=delorder";
	}
}
//获得选中文件的文件名
function getCheckboxItem()
{
	var allSel="";
	if(document.form2.arcID.value) return document.form2.arcID.value;
	for(i=0;i<document.form2.arcID.length;i++)
	{
		if(document.form2.arcID[i].checked)
		{
			if(allSel=="")
				allSel=document.form2.arcID[i].value;
			else
				allSel=allSel+"`"+document.form2.arcID[i].value;
		}
	}
	return allSel;
}

//获得选中其中一个的id
function getOneItem()
{
	var allSel="";
	if(document.form2.arcID.value) return document.form2.arcID.value;
	for(i=0;i<document.form2.arcID.length;i++)
	{
		if(document.form2.arcID[i].checked)
		{
				allSel = document.form2.arcID[i].value;
				break;
		}
	}
	return allSel;
}

function selAll()
{
	for(i=0;i<document.form2.arcID.length;i++)
	{
		if(!document.form2.arcID[i].checked)
		{
			document.form2.arcID[i].checked=true;
		}
	}
}
function noSelAll()
{
	for(i=0;i<document.form2.arcID.length;i++)
	{
		if(document.form2.arcID[i].checked)
		{
			document.form2.arcID[i].checked=false;
		}
	}
}
-->
