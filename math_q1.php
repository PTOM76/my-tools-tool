?>
<?php
global $vars;
$result = '';
$n1 = mt_rand(-25, 25);
$n2 = mt_rand(-25, 25);
$ma = $n1 + $n2;
if(isset($vars['answer'])){
    if($vars['answer'] == $vars['model_answer']){
        $result = "正解です。";
    }else{
        $result = "不正解です。";
    }
}
$body = <<<EOD
<h3>前回の問題の結果</h3>
{$result}
<h3>次の問題を解きなさい。</h3>
Q. {$n1} + {$n2}
<form method="post">
    A. <input type="text" id="answer" name="answer" />
    <input type="hidden" name="model_answer" value="{$ma}" />
    <input type="submit" value="解答" />
</form>
<script>
document.getElementById("answer").focus();
</script>
EOD;
return $body;