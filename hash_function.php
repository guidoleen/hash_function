<?php
define("ASCI_UPPER", 65);
error_reporting(0);

	$hash_T = [];
	$strF = "txt.txt";
	
	try
	{
		$F = fopen($strF, "r");
	}
	catch(Exception $Err)
	{
		echo $Err;
	}

	if($F == NULL)
	{
		exit();
	}

	$hash_T = fread($F, filesize($strF) );

	$iFS = filesize($strF);
	$Str = "";
	$Arr_Hash = [];

	for($i = 0; $i<$iFS; $i++)
	{
		if($hash_T[$i] != " ")
		{
			$Str .= $hash_T[$i];

		}
		else
		{
			echo $Str;
				// $iH = hash_function($Str);
				$iH = hash_function2($Str);
					$Arr_Hash = arr_push($Arr_Hash, $iH, $Str);
			echo "</br>";
			$Str = "";
		}
	}

	var_dump($Arr_Hash);

	echo $Arr_Hash[hash_function2("Je")];

// New Hash Function
function hash_function2($Str)
{
        $hash = 5381;

	$iStrL = strlen($Str);
        for ($i = 0; $i<$iStrL; $i++)
	{
		$c = ord($Str);
           	$hash = (($hash << 5) + $hash) + $c;
	}

        return $hash;
}

// Old HashFunction
function hash_function($Str)
{
	$iHash = NULL;
	$iStrL = strlen($Str);
	for($i = 0; $i<$iStrL; $i++)
	{
		$iHash .= char_toInt($Str[$i]);
	}
	return $iHash;
}

function char_toInt($iHash)
{
	return ord(strtoupper($iHash))-ASCI_UPPER;
}

function arr_push($Arr_H, $Key, $StrVal)
{
	$Arr_H[$Key] = $StrVal;
	return $Arr_H;
}

?>