<?php
$struid =$_SESSION['pageinfo']['main-visit'] ;

echo <<<script
<script>
AjaxVis('$struid');
</script>
script;
?>