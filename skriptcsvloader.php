?>
<?php
global $vars;
$html = '
<form action="./?' . $vars['page'] . '" method="post" enctype="multipart/form-data">
  <input type="file" name="uploadfile">
  <input type="submit" value="アップロード">
</form>';
//$data = $vars['data'];
$tempfile = $_FILES['uploadfile']['tmp_name'];
if(is_uploaded_file($tempfile)){
$lines = file($tempfile);
foreach($lines as $line){
    $line = str_replace(' ', "", $line);
	$data = explode(',', $line);
    if (!isset($data[1])){
        continue;
    }
    $data[2] = preg_replace('/\n|\r|\r\n/', '', $data[2]);
    if($data[1] == "string"){
        $data[2] = substr($data[2], 4);
        $data[2] = hex2bin($data[2]);        
    }
    if($data[1] == "offlineplayer"){
        $data[2] = preg_replace("/(.*?)0475756964.*/", "$1", $data[2]);
        $data[2] = substr($data[2], 18);
        $data[2] = hex2bin($data[2]);
    }
    if($data[1] == "long"){
        $data[2] = hexdec($data[2]);        
    }
    if($data[1] == "int"){
        $data[2] = hexdec($data[2]);        
    }
    if($data[1] == "double"){
        $data[2] = hexdec($data[2]);        
    }
    if($data[1] == "boolean"){
        if($data[2] == "01"){
            $data[2] = "true";
        }
        if($data[2] == "00"){
            $data[2] = "false";
        }
    }
	$html .= '<p>';
	$html .= ' 変数名:{' . $data[0] . "}";
	$html .= ' <br />種類:' . $data[1];
	$html .= ' <br />内容:' . $data[2];	
	$html .= '</p>';
}
}

return $html;