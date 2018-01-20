$(document).ready(function () {
    $('.item .add .submit').on('click', function () {
        num++;
        var $obj = $(this),
            id = 'data' + num,
			num1= Number(num) + Number(1),
            $model = $('select.model_type').val(),
            $modelHtml,
            $template;
			
        if ($model == 'doc') $modelHtml = $('#model_doc').html();
        else if($model == 'form') $modelHtml = $('#model_form').html();
        else $modelHtml = $('#model_page').html();
        $('.template').find('li.model').html($modelHtml);
        $template = $('.container .template').html();

		$obj.closest('.box').find('li.last').before('<li id="' + id + '">' + $template + '</li>');
        $('.container .template .field_title').attr('name',('title' + num1));
		$('.container .template .engname').attr('name',('engname' + num1));
		$('#model_doc .field_type').attr('name',('type' + num1));
		$('#model_form .field_type').attr('name',('type' + num1));
		$('#model_page .field_type').attr('name',('type' + num1));
		$('.container .template .field_sort').attr('name',('sort' + num1));
		$('.container .template .field_value').attr('name',('value' + num1)).attr('id',('tags_' + num1));
		$('.box #tags_'+num).tagsInput({width:'auto'});
    });
    $(document).on('change', 'select.field_type', function () {
        var $value = $(this).val();
        if ($value == 'radio' || $value == 'checkbox' || $value == 'select') {
            $(this).closest('.item').find('li.show').show();
        }else{
            $(this).closest('.item').find('li.show').hide();
        }
    });
    $(document).on('change', 'select.model_type', function () {
        var $value = $(this).val(),
            $len = $('.box').find('li[id]').length,
            $modelHtml;

        if ($value == 'doc') $modelHtml = $('#model_doc select.field_type').html();
        else if($value == 'form')$modelHtml = $('#model_form select.field_type').html();
        else $modelHtml = $('#model_page select.field_type').html();

        if ($len) {
            $('.box').find('li[id]').each(function () {
                $(this).find('li.model select.field_type').html($modelHtml);
            });
        }
    });

});
function data_delete(obj){
	if (window.confirm('你确定要删除字段么？提交之后已数据将不可恢复！')) {
		$(obj).parent().remove();
	}else{
		return false;
	}
}
function data_submit(){
    var $len = $('.box').find('li[id]').length,
        $name = $('input[name=name]').val().trim(),
        $content = $('textarea[name=description]').val().trim(),
        bool = true;

    if(bool && $name == ''){
        bool = false;
		$('input[name=name]').focus();
        alert('名称不能为空');
		
    }
    if(bool && $content == ''){
        bool = false;
		$('textarea[name=description]').focus();
        alert('描述不能为空');
    }
    if($len){
        $('.box').find('li[id]').each(function () {
            var $li = $(this),
                $fields = $li.find('input[class!="field_value"]').val().trim();
            
            if(bool && $fields == ''){
                bool = false;
                alert('自定义字段不能为空');
            }
            if($li.find('li.show').is(':visible')){
                var $value = $li.find('input.field_value').val().trim();
                if(bool && $value == ''){
                    bool = false;
                    alert('值不能为空');
                }
            }
        });
    }
    if (bool) {
        $("form").submit(); 
    }else return false;
   
}

