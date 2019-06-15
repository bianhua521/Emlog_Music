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
function plugin_setting_view(){
	include(EMLOG_ROOT.'/content/plugins/music/music_config.php');
	?>
<link href="/content/plugins/music/style/style.css?ver=12.7" type="text/css" rel="stylesheet" />
	<div class="com-hd">
		<b>播放器设置</b>
		<?php
		if(isset($_GET['setting'])){
			echo "<span class='actived'>设置保存成功! </span>";
		} else {
			echo "<span class='warning'>点击保存后请耐心等候,完成解析将自动跳转! </span>";
		}
		?>
	</div>
	<form action="./plugin.php?plugin=music&action=setting" method="post">
		<table class="tb-set">
			<tr>
				<td align="right" width="40%"><b>播放器key：</b><br />(如果没有keyid可以前往<a href="https://heshi.love" target="_blank">heshi.love</a>获取！)</td>
				<td><input type="text" class="txt" name="keyid" value="<?php echo $config["keyid"];?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>加载jquery：</b><br />(没有jquery库时请打开，JS冲突请关闭)</td>
				<td><span class="sel"><select name="jq"><option value="open" <?php if($config["jq"]=="open") echo "selected"; ?>>开启</option><option value="close" <?php if($config["jq"]=="close") echo "selected"; ?>>关闭</option></select></span></td>
			</tr>
			<tr>
				<td align="right"><b>加载Fontawesome：</b><br />(没有Fontawesome时请打开，字体冲突请关闭)</td>
				<td><span class="sel"><select name="font"><option value="open" <?php if($config["font"]=="open") echo "selected"; ?>>开启</option><option value="close" <?php if($config["font"]=="close") echo "selected"; ?>>关闭</option></select></span></td>
			</tr>
			<tr>
				<td align="right"><b>用户名：</b><br />(填写歌单后台登陆账号，用于识别用户)</td>
				<td><input type="text" class="txt" name="user_id" value="<?php echo $config["user_id"]; ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>密码：</b><br />(填写歌单后台登陆密码，仅后台显示用于备忘)</td>
				<td><input type="text" class="txt" name="user_psd" value="<?php echo $config["user_psd"]; ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>后台地址：</b><br />(播放器歌单后台管理地址)</td>
				<td><b>播放器后台：<a href="https://heshi.love" target="_blank">https://heshi.love</a></b></td>
			</tr>
			<tr>
				<td align="right"><b>按钮：</b></td>
				<td align="left"><button class="btn" type="submit">点击保存</button></td>
			</tr>   
		</table>
	</form>
<script>
$('#music').addClass('sidebarsubmenu1');
</script>
	<?php
}

function plugin_setting(){
	require_once 'music_config.php';
	$jq = $_POST["jq"]==""?"open":$_POST["jq"];
	$font = $_POST["font"]==""?"open":$_POST["font"];
	$user_id = $_POST["user_id"]==""?"usero":$_POST["user_id"];
	$user_psd = $_POST["user_psd"]==""?"123456":$_POST["user_psd"];
	$newConfig = '<?php
	$config = array( 
	"keyid" => "'.$_POST['keyid'].'",  
	"jq" => "'.$jq.'",
	"font" => "'.$font.'",
	"user_id" => "'.str_replace(array("\r\n", "\r", " ", "\n"), "", $user_id).'",
	"user_psd" => "'.str_replace(array("\r\n", "\r", " ", "\n"), "", $user_psd).'",
);';
	@file_put_contents(EMLOG_ROOT.'/content/plugins/music/music_config.php', $newConfig);
}
?>