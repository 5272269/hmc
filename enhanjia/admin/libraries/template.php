<?php
/**
 * 模板标签类 
 */
class Template{
    private $data = array();
    private $__ldel = '{';
    private $__rdel = '}';
    private $__ltag = '<!--';
    private $__rtag = '-->';
    private $_template_preg = array(), $_template_replace = array();
    
    function __construct(){
        $this->_CI =& get_instance();
    }

    public function display($tpl = '', $data = array(), $return = false) {
        $this->data = count($data) ? $data : $this->data;

        $template = file_get_contents(ROOT . '/templates/shtml/' . $tpl);
        if( $return ){
            if ( ob_get_level() ){
                ob_end_flush();
                flush(); 
            } 
            ob_start();
        }
        
        extract($this->data, EXTR_OVERWRITE);
        eval('?>' . $this->templateParse($template));
        
        if( $return ){
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
    }

	public function templateParse($template){

        /**
         * 
         * 替换判断
         * 
         * <!--{if $name==1}-->       =>  <?php if ($name==1){ ?>
         * <!--{elseif $name==2}-->   =>  <?php } elseif ($name==2){ ?>
         * <!--{else}-->              =>  <?php } else { ?>
         * <!--{/if}-->               =>  <?php } ?>
         */
        $this->_template_preg[] = '/' . $this->__ltag . "\{if (.*?)\}" . $this->__rtag . '/i';
        $this->_template_preg[] = '/' . $this->__ltag . '\{else\}' . $this->__rtag . '/i';
        $this->_template_preg[] = '/' . $this->__ltag . '\{(else if|elseif) (.*?)\}' . $this->__rtag . '/i';

        $this->_template_replace[] = '<?php if (\\1){ ?>';
        $this->_template_replace[] = '<?php }else{ ?>';
        $this->_template_replace[] = '<?php }else if (\\2){ ?>';

        /**
         * 
         * 替换循环
         * 
         * <!--{foreach $list as $k => $v}-->       =>  <?php foreach ($list as $k => $v){ ?>
         * <!--{for $i=0;$i<10;$i++}-->   =>  <?php for($i=0;$i<10;$i++){ ?>
         */
        $this->_template_preg[] = '/' . $this->__ltag . '\{(loop|foreach) (.*?)\}' . $this->__rtag . '/i';
        $this->_template_replace[] = '<?php foreach (\\2) { ?>';
        $this->_template_preg[] = '/' . $this->__ltag . '\{for (.*?)\}' . $this->__rtag . '/i';
        $this->_template_replace[] = '<?php for (\\1) { ?>';

        //注释标签
        $this->_template_preg[] = '/' . $this->__ltag . '\{(\#|\*)(.*?)(\#|\*)\}' . $this->__rtag . '/';
        $this->_template_replace[] = '';

        //引入页面标签
        $this->_template_preg[] = '/<!--#include\s*file=[\"|\'](.*)\.(html|htm)[\"|\']-->/';
        //$this->_template_replace[] = "<?php \$__Template->display(\"".THEME_NAME.'/'.TPL_NAME."/$1\"); 
        $this->_template_replace[] = '<?php $this->display("$1.$2"); ?>';

        /**
         * 
         * 函数替换
         * 
         * <!--{data('Y-m-d H:i:s', $data)}-->       =>  <?php echo data('Y-m-d H:i:s', $data); ?>
         */
        $this->_template_preg[] = '/' . $this->__ltag . '\{([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff:]*\(([^{}]*)\))\}' . $this->__rtag . '/';
        $this->_template_replace[] = "<?php echo \\1;?>";

        //替换图片CSS等路径
        $template = preg_replace_callback('/<(.*?)(src=|href=|value=|background=)[\"|\'](images\/|img\/|css\/|js\/|style\/)(.*?)[\"|\'](.*?)>/', array($this, 'parse_load'), $template);

        //替换变量标签(必须最后处理)
        $template = preg_replace_callback('/\$\w+((\.\w+)*)?/', array($this, 'parse_var'), $template);
        $this->_template_preg[] = '/' . $this->__ldel . '((( *(\+\+|--) *)*?(([_a-zA-Z][\w]*\(.*?\))|\$((\w+)((\[|\()(\'|")?\$*\w*(\'|")?(\)|\]))*((->)?\$?(\w*)(\((\'|")?(.*?)(\'|")?\)|))){0,})( *\.?[^ \.]*? *)*?){1,})' . $this->__rdel . '/i';
        $this->_template_replace[] = '<?php echo \\1;?>';

        /**
         * 
         * 结束符号
         * 
         * <!--{/if}-->       =>  <?php } ?>
         * <!--{/foreach}-->       =>  <?php } ?>
         */
        $this->_template_preg[] = '/' . $this->__ltag . '\{\/(.*?)\}' . $this->__rtag . '/i';
        $this->_template_replace[] = '<?php } ?>';

        // 替换所有标签
        $template = preg_replace($this->_template_preg, $this->_template_replace, $template);
        //die($template);

        //替换常量
        $template = str_replace('__TPL__', '/templates', $template);
        $template = str_replace('__PUBLIC__', '/data/public', $template);
        $template = str_replace('__ROOT__', '', $template);
        return $template;
	}

    /**
     * 解析变量
     * @param array $var
     * @return string
     */
    private function parse_var($var) {
        if (empty($var[0])){
            return;
        }
        $vars = explode('.', $var[0]);
        $var = array_shift($vars);
        $name = $var;
        foreach ($vars as $val){
            $name .= '["' . $val . '"]';
        }
        //die($var);
        return $name;
    }

    /**
     * 解析文件路径标签
     * @param array $var
     * @return string
     */
    private function parse_load($var) {
        $file = $var[3].$var[4];
        $url = '/templates';
        if(substr($url, 0,1) == '.'){
            $url = substr($url, 1);
        }
        $url = str_replace('\\', '/', $url);
        $url = $url . '/' . $file;
        $html = '<'.$var[1].$var[2].'"'.$url.'"'.$var[5].'>';
        return $html;
    }

}