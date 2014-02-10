<?php
$file = Yii::app()->request->baseUrl.'/upload/'.base64_decode($_GET['file']);
$folder = Yii::app()->request->baseUrl.'/upload/'.$_GET['size'];
$file_dest = $folder.'/'.base64_decode($_GET['file']);
$size = $_GET['size'];
$size = explode("x",$size);
$width_thumb = $size[0];
$height_thumb = $size[1];
$tam = getimagesize($file);
$action = CHtml::normalizeUrl(array('/admin/upload/crop'));
?>
<div id="main" style="padding:4px;">
    <img src="<?php echo $file; ?>" <?php echo $tam[3]; ?> id="jcrop_target" />
    <div style="clear:both; height:5px;"></div>
    <form method="post" action="javascript:sendCrop('<?php echo $action; ?>')" id="formCrop">
        <input type="hidden" name="x_top" id="x_top" value="0" />
        <input type="hidden" name="y_top" id="y_top" value="0" />
        <input type="hidden" name="tam_0" id="tam_0" value="<?php echo $tam[0]; ?>" />
        <input type="hidden" name="tam_1" id="tam_1" value="<?php echo $tam[1]; ?>" />
        <input type="hidden" name="width_thumb" id="width_thumb" value="<?php echo $width_thumb; ?>" />
        <input type="hidden" name="height_thumb" id="height_thumb" value="<?php echo $height_thumb; ?>" />
        <input type="hidden" name="width" id="width" value="<?php echo $width_thumb; ?>" />
        <input type="hidden" name="height" id="height" value="<?php echo $height_thumb; ?>" />
        <input type="hidden" name="recortar" value="0" />
        <input type="hidden" name="file" value="<?php echo $file; ?>" />
        <input type="hidden" name="file_dest" value="<?php echo $file_dest; ?>" />
        <input type="hidden" name="folder_dest" value="<?php echo $folder; ?>" />
        <input type="hidden" name="porc" id="porc" value="" />
        <input type="hidden" name="anchoI" id="anchoI" value="<?php echo $tam[0]; ?>" />
        <input type="hidden" name="altoI" id="altoI" value="<?php echo $tam[1]; ?>" />
        <input class="button green" type="submit" value="Recortar" style="display:block; width:inherit;" />
    </form>
</div>

<script type="text/javascript">
var anchoClear = 120;
var altoClear = 140;
var anchoW = $(window).width();
var altoW = $(window).height();
var anchoI = parseInt($('#jcrop_target').css('width'));
var altoI = parseInt($('#jcrop_target').css('height'));
var anchoF;
var porc;
var altoF;

$(document).ready(function(e){
	if(anchoI > (anchoW-anchoClear) || altoI > (altoW-altoClear)){
		resizeAncho();
		if(altoF > altoW)
			resizeAlto();
		$('#jcrop_target').attr('width',anchoF);
		$('#jcrop_target').attr('height',altoF);
		$('#porc').val(porc/-100);
		$('#anchoI').val(anchoF);
		$('#altoI').val(altoF);
	}
});

function resizeAncho(){
	anchoF = anchoW-anchoClear;
	porc = ((anchoI-anchoF)*(100))/anchoI;
	altoF = Math.round(altoI+(altoI*(porc/-100)));
}

function resizeAlto(){
	altoF = altoW-altoClear;
	porc = ((altoI-altoF)*(100))/altoI;
	anchoF = Math.round(anchoI+(anchoI*(porc/-100)));
}
</script>