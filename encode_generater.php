?>
<?php
global $vars;
$html2 = '';
if(isset($vars['passgen_submit'])){
    $generated_pass = '';
    switch ($vars['passgen_type']){
    case 'md2':
      $generated_pass = hash('md2', $vars['passgen_str'] . $vars['passgen_pass']);
      break;
    case 'md4':
      $generated_pass = hash('md4', $vars['passgen_str'] . $vars['passgen_pass']);
      break;
    case 'md5':
      $generated_pass = hash('md5', $vars['passgen_str'] . $vars['passgen_pass']);
      break;
    case 'sha1':
      $generated_pass = hash('sha1', $vars['passgen_str'] . $vars['passgen_pass']);
      break;
    case 'sha224':
      $generated_pass = hash('sha224', $vars['passgen_str'] . $vars['passgen_pass']);
      break;
    case 'sha256':
      $generated_pass = hash('sha256', $vars['passgen_str'] . $vars['passgen_pass']);
      break;
    case 'sha384':
      $generated_pass = hash('sha384', $vars['passgen_str'] . $vars['passgen_pass']);
      break;
    case 'sha512':
      $generated_pass = hash('sha512', $vars['passgen_str'] . $vars['passgen_pass']);
      break;
    case 'md5_php':
      $generated_pass = md5($vars['passgen_str'] . $vars['passgen_pass']);
      break;
    case 'crypt_php':
      $generated_pass = crypt($vars['passgen_str'] . $vars['passgen_pass']);
      break;
    case 'sha1_php':
      $generated_pass = sha1($vars['passgen_str'] . $vars['passgen_pass']);
      break;
    case 'udcec':
      $generated_pass = sha1(crypt(md5($vars['passgen_str'] . $vars['passgen_pass'])));
      break;
    }
    $html2 = "<br /><br />生成されたパスワード:" . $generated_pass;
}
$out = <<<EOD
<form method="POST">
    暗号化する文字列:
    <input type="text" placeholder="暗号化する文字列" name="passgen_str" value="{$vars['passgen_str']}" />
    <br />
    暗号キー(任意):<input type="password" placeholder="暗号キー" size="4" name="passgen_pass" value="{$vars['passgen_pass']}" />
    <br />
    暗号化の種類:
    <select name="passgen_type">
        <option value="md2">md2</option>
        <option value="md4">md4</option>
        <option value="md5" selected>md5</option>
        <option value="sha1">sha1</option>
        <option value="sha224">sha224</option>
        <option value="sha256">sha256</option>
        <option value="sha384">sha384</option>
        <option value="sha512">sha512</option>
        <option value="md5_php">md5_php</option>
        <option value="crypt_php">crypt_php</option>
        <option value="sha1_php">sha1_php</option>
        <option value="udcec">udcec(original)</option>
    </select>
    <br />
    <input type="submit" value="生成" name="passgen_submit" />

    $html2
</form>
EOD;
return $out;