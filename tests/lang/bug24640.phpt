--TEST--
Bug #24640 (var_export and var_dump can't output large float)
--INI--
precision=12
--FILE--
<?php
function test($v)
{
	echo var_export($v, true) . "\n";
	var_dump($v);
	echo "$v\n";
	print_r($v);
	echo "\n------\n";
}

test(1.7e+300);
test(1.7e-300);
test(1.7e+79);
test(1.7e-79);
test(1.7e+80);
test(1.7e-80);
test(1.7e+81);
test(1.7e-81);
test(1.7e+319);
test(1.7e-319);
test(1.7e+320);
test(1.7e-320);
test(1.7e+321);
test(1.7e-321);
test(1.7e+324);
test(1.7e-324);
test(1.7e+1000);
test(1.7e-1000);

?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
1.7000000000000001E+300
float(1.7E+300)
1.7E+300
1.7E+300
------
1.7000000000000001E-300
float(1.7E-300)
1.7E-300
1.7E-300
------
1.7000000000000002E+79
float(1.7E+79)
1.7E+79
1.7E+79
------
1.6999999999999999E-79
float(1.7E-79)
1.7E-79
1.7E-79
------
1.7E+80
float(1.7E+80)
1.7E+80
1.7E+80
------
1.7E-80
float(1.7E-80)
1.7E-80
1.7E-80
------
1.7E+81
float(1.7E+81)
1.7E+81
1.7E+81
------
1.6999999999999999E-81
float(1.7E-81)
1.7E-81
1.7E-81
------
I%s
float(I%s)
I%s
I%s
------
1.6999810742105611E-319
float(1.69998107421E-319)
1.69998107421E-319
1.69998107421E-319
------
I%s
float(I%s)
I%s
I%s
------
1.7000798873397294E-320
float(1.70007988734E-320)
1.70007988734E-320
1.70007988734E-320
------
I%s
float(I%s)
I%s
I%s
------
1.6995858216938881E-321
float(1.69958582169E-321)
1.69958582169E-321
1.69958582169E-321
------
I%s
float(I%s)
I%s
I%s
------
0
float(0)
0
0
------
I%s
float(I%s)
I%s
I%s
------
0
float(0)
0
0
------
===DONE===
