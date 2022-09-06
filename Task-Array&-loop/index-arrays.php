<?php
$x = [10, 20, 40, 80, 100];
$y = [$x, 
		   "Testing", 
		   [
		   		"Lahore",
		   		"Karachi"
		   	],
		   [[["Cat", "Dog", "Parrot", "Chicken", "Reptile"]]]
		];
echo $x[2];

echo "<pre>";
print_r($y);
echo "</pre>";

echo $y[3][0][0][2];

?>