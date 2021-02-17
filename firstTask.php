
<?php
echo "<br/>
Задание 1 (Базовые основы языка):

Не использовать функции стандартной библиотеки.
Написать функцию которая по параметрам принимает число из десятичной системы счисления и преобразовывает в двоичную.
<br/>";
	function positiveBinary($decimal_num, $divider=4294967296){
		$result = $decimal_num/$divider;
		if($result>=1){
			echo 1;
			$decimal_num %= $divider;
			$divider /= 2 ;
			positiveBinary($decimal_num ,$divider);
		}
		if($result<1 and $divider>1){
			echo 0;
			$divider /= 2;
			positiveBinary($decimal_num ,$divider);
		}
}


	function negativeBinary($decimal_num, $divider=4294967296){
		$result = $decimal_num/$divider;
		if($result<=-1){
			echo 0;
			$decimal_num %= $divider;
			$divider /= 2 ;
			negativeBinary($decimal_num ,$divider);
		}
		if($result>-1 and $divider>1){
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
//*
echo "<br/>Написать функцию которая выполняет преобразование наоборот.<br/>";
	function decimal($binary_num){
		$binary_num = (string) $binary_num;
		for ($i=0; $i < strlen($binary_num); $i++) {
			$decimal += $binary_num[$i]*pownumber(2, $i);
		}
		return $decimal;
	}

echo decimal(11101);
echo"<br>";

echo "<br/>Написать функцию которая выводит первые N чисел фибоначчи<br/>";



    function fibonachi($count){
    	$arrayOfFibonachi =array();
        for ($i=0 ; $i <$count ; $i++){
            if ($i == 0) {
            	$arrayOfFibonachi[] = 0;
            }
            elseif ($i == 1) {
            	$arrayOfFibonachi[]=1;
        	}elseif($i<$count){
                $arrayOfFibonachi[]=$arrayOfFibonachi[$i-1] + $arrayOfFibonachi[$i-2];
                       }
        }
        echo "Первые $count чисел с порядка Фибоначчи:";
        foreach ($arrayOfFibonachi as $key => $value) {
        	echo " $value ";
        }
    }

echo fibonachi(6);



echo "<br/>Написать функцию, возведения числа N в степень M<br/>";

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
echo pownumber(2, 32);
echo "<br/>";

echo "<br/>Написать функцию которая вычисляет входит ли IP-адрес в диапазон указанных IP-адресов. Вычислить для версии ipv4.<br/>";


$startIpv4 = "80.80.80.80";
$ipv4 = "92.150.240.79";
$finishIpv4 = "100.100.100.100";


function ipv4($startIpv4 , $finishIpv4 , $ipv4){
$arrayIpv4 =array();
$arrayIpv4[] =  explode(".", $startIpv4);
$arrayIpv4[] =  explode(".", $finishIpv4);
$arrayIpv4[] =  explode(".", $ipv4);
    $result = 0;
for ($i = 0 ; $i < 4; $i++) {
   if($arrayIpv4[0][$i] < $arrayIpv4[2][$i] && $arrayIpv4[2][$i] < $arrayIpv4[1][$i]){
       $result = "Ipv4  входит в диапазон <br>" ;
   	break;
   }
   elseif($arrayIpv4[0][$i] == $arrayIpv4[2][$i] || $arrayIpv4[2][$i] == $arrayIpv4[1][$i] ){
	continue;
   }
   else{
   $result = "Ipv4 не входит ".$arrayIpv4[2][$i]." в диапазон<br>";
   break;
   }}
return $result;
}
    


var_dump(ipv4($startIpv4 , $finishIpv4 , $ipv4));


echo "<br/> Для одномерного массива. Подсчитать процентное соотношение положительных/отрицательных/нулевых/простых чисел<br/>";

$array = [3 , -4, 0, -5, 6, 16, -88, 0, 111, 13];


function calculateZeros($array){
$count    = count($array);
$arrayForNull     = array();

foreach($array as $key=>$value){
if($value == 0){
$arrayForNull[] = $value;
$countNull =count($arrayForNull);
}}
echo "Count zeros in array : ".(($countNull/$count)*100)." % <br/>";
}

calculateZeros($array);


function calculatePositiveNumbers($array){
$count    = count($array);
$arrayForPositiveNumbers = array();
foreach($array as $key=>$value){
if($value > 0){
$arrayForPositiveNumbers [] = $value;
$countPositive =count($arrayForPositiveNumbers );
}}
echo "Count positive numbers in array : ".(($countPositive /$count)*100)." % <br/>";
}

calculatePositiveNumbers($array);


function calculateNegativeNumbers($array){
$count    = count($array);
$arrayForNegativeNumbers = array();
foreach($array as $key=>$value){
if($value < 0){
$arrayForNegativeNumbers [] = $value;
$countNegativ =count($arrayForNegativeNumbers);
}}
echo "Count negative numbers in array: ".(($countNegativ/$count)*100)." % <br/>";
}

calculateNegativeNumbers($array);


function calculateSimpleNumbers($array){
$count  = count($array);
$simple = array();

foreach($array as $key=>$value){
			if($value > 0){
				$countNumbers = 0;
					for ($i=1; $i < $value+1; $i++) { 
						$num = $value/$i;
						if(is_int($num)){
							$countNumbers +=1;
						}
					}
					if($countNumbers<3 && $countNumbers>1){
							$simple [] = $value;
						}	
				$countSimple = count($simple);
				}
}
echo "Count simple numbers in array: ".(($countSimple/$count)*100)." % <br/>";
}

calculateSimpleNumbers($array);

echo "<br/>Отсортировать элементы по возрастанию/убыванию<br/>";


$array = [2, 6 , 4, 8, 5];

function sortToMaxValue($array){
	$newArray = array();
	$count = count($array);
	for($i=0; $i < $count; $i++){
		$minValue = min($array);
		$newArray[] = $minValue;
		$index = array_search($minValue, $array);
		unset($array[$index]);
	}
}

function sortToMinValue($array){
	$newArray = array();
	$count = count($array);
	for($i=0; $i < $count; $i++){
		$maxValue = max($array);
		$newArray[] = $maxValue;
		$index = array_search($maxValue, $array);
		unset($array[$index]);
	}
}

sortToMaxValue($array);
sortToMinValue($array);


echo "<br/>Для двумерных массивов<br/>Транспонировать матрицу";


$arrayMatrix = [
	[1, 6, 11],
	[2, 7, 12],
	[3, 8, 13],
	[4, 9, 14],
	[5, 10,15],
];

	function transpondMatrix($array){
		$count = count($array);
		$countRow = count($array[0]);
		$newMatrix = array();
		for ($r=0; $r < $countRow; $r++) { 
			for ($c=0; $c < $count; $c++) { 
				$newMatrix[$r][$c] = $array[$c][$r]; 
			}
		}
	}

transpondMatrix($arrayMatrix);

echo "<br/>Умножить две матрицы<br/>";


$firstArrayMatrix = [
	[1, 1, 1, 1, 1],
	[6, 0, 0, 0, 0],
	[-16, 0, 0, 5, 0]
];

$secondArrayMatrix = [
	[1, 1, 1, 1, 1],
	[6, 0, 0, 0, 0],
	[-16, 0, 0, 5, 0],
	[6, 0, 0, 0, 0],
	[-16, 0, 0, 5, 0]
];


	function matrixMultiplication($firtsMatrix , $secondMatrix){
		$count = count($firtsMatrix);
		$countRow = count($firtsMatrix[0]);
		$countCol = count($secondMatrix[0]);
		$newMatrix = array();
		
		for ($row=0; $row < $count; $row++) { 
				for ($column=0; $column < $countCol; $column++) { 
						for ($secondRow=0; $secondRow < $countRow; $secondRow++) { 
$newMatrix[$row][$secondColumn] += $firtsMatrix[$row][$secondRow]*$secondMatrix[$secondRow][$secondColumn];
				}
			}
		}
		return $newMatrix;
	}

matrixMultiplication($firstArrayMatrix, $secondArrayMatrix);

echo "<br/>Удалить те строки, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент. Аналогично для столбцов.<br/>";


	function delateZerosAndPositiveValues($matrix){

		$countRows = count($matrix);
		$countCols = count($matrix[0]);

		for ($row=0; $row < $countRows; $row++) { 
				$index = 0;
			for ($cols=0; $cols < $countCols; $cols++) { 
				if($matrix[$row][$cols] == 0){
					unset($matrix[$row]);
				}
				$index += $matrix[$row][$cols];				
				}
				if($index > 0){
				unset($matrix[$row]);
				}

		}
		return $matrix;
	}

delateZerosAndPositiveValues($matrix);


echo "<br/>Написать рекурсивную функцию которая будет обходить и выводить все значения любого массива и любого уровня вложенности
<br/>";

$array = [
	[5, 6],
	[9,[7, 8], 9],
	[5, 6],
	8,
	[5, 6],
];

function recursiv($array){
	if(is_array($array)){
		foreach($array as $key=>$value){
	if(is_array($value)) {
		recursiv($value);
	}else{
	echo $value."<br/>";
}
}}};


