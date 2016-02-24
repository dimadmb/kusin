<?php

$ar = array(1=>0,2=>0,3=>1);



function rec($arr)
{
	foreach($arr as &$el)
	{
		if($el != 0)
		{
			echo $el;
			$arr[$el]['children'] = $el;
		}
	}
	
	
	return $arr;
}


?>
<pre>
<? print_r(rec($ar)) ?>
</pre>