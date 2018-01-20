// JavaScript Document
// 上传照片 单张
fid = 0;

function upload_pic(f, imgdid, filename, type, hiddenval) {
	var frname = 'uplitpicfra';
	if(f.value=='') return ;
	vImg 	= document.getElementById(imgdid);
	nFrame 	= document.getElementById(frname);
	nForm 	= f.form;
	nForm.action = HTTPURL+"/common/upload/archives_do.php?imgdid="+imgdid+'&type='+type+'&filename='+filename+'&hidden='+hiddenval;
	nForm.target = frname;
	nForm.submit();
	nForm.action = '';
	nForm.target = '';
}


//处理多个单张的
function upload_more_pic(f, imgdid, filename, type, hiddenval, frame) {
	var frname = frame;
	if(f.value=='') return ;
	vImg 	= document.getElementById(imgdid);
	nFrame 	= document.getElementById(frname);
	nForm 	= f.form;
	nForm.action = HTTPURL+"/common/upload/archives_do.php?imgdid="+imgdid+'&type='+type+'&filename='+filename+'&hidden='+hiddenval;
	nForm.target = frname;
	nForm.submit();
	nForm.action = '';
	nForm.target = '';
}

//单文件上传 file & files
function upload_more_file(f, imgdid, filename, type, hiddenval, frame) {
	var frname = frame;
	if(f.value=='') return ;
	vImg 	= document.getElementById(imgdid);
	nFrame 	= document.getElementById(frname);
	nForm 	= f.form;
	nForm.action = HTTPURL+"/common/upload/archives_do_file.php?imgdid="+imgdid+'&type='+type+'&filename='+filename+'&hidden='+hiddenval;
	nForm.target = frname;
	nForm.submit();
	nForm.action = '';
	nForm.target = '';
}

//删除文件
function delete_file(a) {
	$(a).parent().parent().parent().remove();
}

function delete_pic(a) {
	$(a).parent().parent().children('#divpicview').html('');
	$(a).parent().parent().children('#picid').val('');
}

//增加文件 type = pics
var addfile = function(){
	fid++;
	$('#files').append('<tr>'+
		  	'<td colspan="2" style="padding-left: 110px;">'+
			'<div id="divpicview_'+fid+'" class="divpre"></div>'+
			'<input name="files[]" type="hidden" id="file_'+fid+'" />'+
			'<span></span>'+
			'<span class="litpic_span">'+
				'<input type="button" value="本地上传" style="width:10%;cursor:pointer;" />'+
				'<input name="ajaxfile_'+fid+'" style="width:80%" type="file" id="ajaxfile_'+fid+'" onChange="upload_pic(this, \'divpicview_'+fid+'\', \'ajaxfile_'+fid+'\',\'one\',\'file_'+fid+'\');" size="1" class="np coolbg litpic"/>'+
			'</span>'+
			'<span class="litpic_span">'+
				'<input type="button" value="删除图片" class="deletefile" style="width:10%;cursor:pointer;" onclick="return delete_file(this);" />'+
			'</span>'+
			'</td>'+
		  '</tr>');
}

//多文件上传 -----增加文件 type = files
var addfile_file = function(){
	fid++;
	$('#files_files').append('<tr>'+
		  	'<td colspan="2" style="padding-left: 110px;">'+
			'<div id="divpicview_'+fid+'" class="divpre"></div>'+
			'<input name="files_files[]" type="hidden" id="file_'+fid+'" />'+
			'<span></span>'+
			'<span class="litpic_span">'+
				'<input type="button" value="上传" style="width:10%;cursor:pointer;" />'+
				'<input name="ajaxfile_'+fid+'" style="width:80%" type="file" id="ajaxfile_'+fid+'" onChange="upload_more_file(this, \'divpicview_'+fid+'\', \'ajaxfile_'+fid+'\',\'one\',\'file_'+fid+'\',\'upload_file_name\');" size="1" class="np coolbg litpic"/>'+
			'</span>'+
			'<span class="litpic_span">'+
				'<input type="button" value="删除" class="deletefile" style="width:10%;cursor:pointer;" onclick="return delete_file(this);" />'+
			'</span>'+
			'</td>'+
		  '</tr>');
}

