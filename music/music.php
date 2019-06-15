<?php
/**
 * Plugin Name: 音乐播放器
 * Version: 2.0
 * Plugin URL: https://heshi.love/
 * Description: EMLOG播放器插件 如需使用插件 请前往heshi.love获取keyid！
 * Author: 彼岸花
 * Author Email: 2964517993@qq.com
 * Author URL: https://bianhua.fun/
 */
!defined('EMLOG_ROOT') && exit('access deined!');
function music_load(){
   echo '<link rel="stylesheet" type="text/css" href="'.BLOG_URL.'content/plugins/music/style/player.css">';
}
function music_list(){
require_once 'music_config.php';
if($config["jq"]=="open"){
	echo '<script type="text/javascript" src="//lib.baomitu.com/jquery/1.9.1/jquery.min.js"></script>';
}
if($config["font"]=="open"){
	echo '<link rel="stylesheet" type="text/css" href="//lib.baomitu.com/font-awesome/4.7.0/css/font-awesome.min.css">';
}
?>
<?php  include(EMLOG_ROOT.'/content/plugins/music/music_config.php');?>
<script id="ilt" src="https://heshi.love/player/js/music.js" key="<?php echo $config["keyid"];?>"></script>
<?php
}
function music_menu() {
  echo '<div class="sidebarsubmenu" id="music"><a href="./plugin.php?plugin=music">音乐播放器</a></div>';
}
addAction('index_head', 'music_load');
addAction('index_footer', 'music_list');
addAction('adm_sidebar_ext', 'music_menu');
