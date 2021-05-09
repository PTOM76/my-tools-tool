?>
<?php
global $vars;
$html2 = '';
if(isset($vars['discord_converter_submit'])){
    $html2 = "<br /><br />ID:" . base64_decode(preg_replace('/^(.*?)\.(.*)/', '$1', $vars['token']));
}
$out = <<<EOD
<form method="POST">
    トークン:
    <input type="text" placeholder="MDEyMzQ1Njc4OTEwMTExMjEz.v-MTIzNA-p.czEKaA(←存在しません)" name="token" value="{$vars['token']}" size="75" />
    <br />
    <input type="submit" value="変換" name="discord_converter_submit" />
    $html2
</form>
EOD;
return $out;