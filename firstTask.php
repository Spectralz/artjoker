<?php
error_reporting(E_ALL);
// raising a number to a power

	function pownumber($number = 2 , $pow = 32){
		if($pow >0){
			$newNumber=1;
			do {
				$newNumber *= $number;
				--$pow;
			} while ($pow > 0);

		}elseif($pow <0){
			$newNumber=1;
			do {
				$newNumber /= $number;
				$pow++;
			}while ($pow < 0);

		}elseif($pow == 0){
			$newNumber = 1;
		}
		return $newNumber;
		}
echo pownumber(2, 1);
echo "<br/>";

// decimal to binary conversion

	function positiveBinary($decimal_num, $divider=4294967296){
		$res = $decimal_num/$divider;
		if($res>=1){
			echo 1;
			$decimal_num %= $divider;
			$divider /= 2 ;
			positiveBinary($decimal_num ,$divider);
		}
		if($res<1 and $divider>1){
			echo 0;
			$divider /= 2;
			positiveBinary($decimal_num ,$divider);
		}
}


	function negativeBinary($decimal_num, $divider=4294967296){
		$res = $decimal_num/$divider;
		if($res<=-1){
			echo 0;
			$decimal_num %= $divider;
			$divider /= 2 ;
			negativeBinary($decimal_num ,$divider);
		}
		if($res>-1 and $divider>1){
			echo 1;
			$divider /= 2;
			negativeBinary($decimal_num ,$divider);
		}
}

	function binary($decimal_num){
		if($decimal_num <0){
			negativeBinary($decimal_num);
		}else{
			positiveBinary($decimal_num);
		}echo "<br/>";
	}



binary(-5);
binary(-135);
binary(656);
binary(1654);
echo "<br/>";

//binary to dicimal conversion

	function decimal($binary_num){
		$binary_num = (string) $binary_num;
		for ($i=0; $i < strlen($binary_num); $i++) {
			$decimal += $binary_num[$i]*pownumber(2, $i);
		}
		return $decimal;
	}

echo decimal(101);

// рекурствная функция для обхода массивов

$a = [
[5, 6],
[9,[7, 8], 9],
[5, 6],
8,
[5, 6],
];

function recursiv($a){

	if(is_array($a)){

foreach($a as $key=>$value){

	if(is_array($value)) {

	recursiv($value);
	}else{
	echo $value;
}
}}};


recursiv($a);
?>
