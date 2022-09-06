<?php
$a = [	   1000,
		   'x',
		   'a'	=>10, 
		   'b'	=>30, 
		   'c'	=>50,
		   610,
		   'y', 
		   'd'	=>70, 
		   'e'	=>100,
		   'z',
		   950,
		   'numbers'  =>[		
		   				'first'   =>150,
		   				'second'  =>240,
		   				'third'   =>300,
		   				'fourth'  =>460,
		   				'fifth'   =>600,
							'Animals'  =>[  'Pets'  =>[
											'Cat'     => 1,
											'Parrot'  => 2,
											'Dog'     => 3,
														'wild'  =>[
														'Lion'  =>5,
														'Tiger' =>8,
														'Snake' =>10,
														'Crocodile'=>15
					]
				]
			]
		] 
	];
	$a [0] = 1000;
	$a [5] = 610;
	$a [10] = 950;
	$a ['numbers']['Animals']['Pets']['Parrot'] = 10;
echo $a["numbers"]["Animals"]["Pets"]["wild"]["Crocodile"];
echo "<pre>";
print_r($a);
echo "</pre>";
?>