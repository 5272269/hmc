// JavaScript Document
// 上传照片 单张
function UploadPic(f, imgdid, hiddenval, type) {
	var frname = 'uplitpicfra';
	if(f.value=='') return ;
	vImg 	= document.getElementById(imgdid);
	nFrame 	= document.getElementById(frname);
	nForm 	= f.form;
	nForm.action = HTTPURL+"/common/upload/archives_do.php?imgdid="+imgdid+'&type='+type+'&hidden='+hiddenval;
	nForm.target = frname;
	nForm.submit();
	nForm.action = '';
	nForm.target = '';
}

