<?php

$espiral = [[1,2,3],
            [4,5,6],
            [7,8,9]];

$arrayRetorno = [];

$tamanhoX = sizeof($espiral);
$tamanhoY = sizeof($espiral[0]);

$maiorX = $tamanhoX - 1;
$maiorY = $tamanhoY - 1;
$menorX = 0;
$menorY = 0;
$n = 0;

/*
	0 - Direita
	1 - Baixo
	2 - Esquerda
	3 - Cima
*/
$direcao = 0;

$x = 0;
$y = 0;

while($n < $tamanhoX * $tamanhoY)
{
	$n++;
	$arrayRetorno[] = $espiral[$x][$y];
	caminhar($x, $y, $direcao, $maiorX, $menorX, $maiorY, $menorY, $n == $tamanhoX * $tamanhoY);
    // echo $n.' ------------------------<br>';
}

echo $arrayRetorno;

function alterarDirecao(&$direcao)
{
	if($direcao < 3)
		$direcao++;
	else
		$direcao = 0;
}

function caminhar(&$x, &$y, &$direcao, &$maiorX, &$menorX, &$maiorY, &$menorY, $final)
{
    if($final)
    {
        return;
    }

	switch($direcao)
	{
		case 0:
		
			if($x < $maiorX)
			{                
				$x++;
                $menorY = $y + 1;
			}
			else
			{
				alterarDirecao($direcao);			
				caminhar($x, $y, $direcao, $maiorX, $menorX, $maiorY, $menorY, $final);
			}	
						
		break;
		
		case 1:
		
			if($y < $maiorY)
			{
				$y++;
                $maiorX = $x - 1;
			}
			else
			{
				alterarDirecao($direcao);			
				caminhar($x, $y, $direcao, $maiorX, $menorX, $maiorY, $menorY, $final);
			}	
						
		break;
		
		case 2:
		
			if($x > $menorX)
			{
				$x--;
                $maiorY = $y - 1;
			}
			else
			{
				alterarDirecao($direcao);			
				caminhar($x, $y, $direcao, $maiorX, $menorX, $maiorY, $menorY, $final);
			}	
						
		break;

        case 3:
		
			if($y > $menorY)
			{
				$y--;
                $menorX = $x + 1;
			}
			else
			{
				alterarDirecao($direcao);			
				caminhar($x, $y, $direcao, $maiorX, $menorX, $maiorY, $menorY, $final);
			}	
						
		break;
	}
	
}

function printArray($array, $tamX, $tamY)
{
    for($y = 0; $y < $tamY; $y++)
    {
        for($x = 0; $x < $tamX; $x++)
        {
            if(!empty($array[$x][$y]))
                echo(" ".$array[$x][$y]." ");
            else   
                echo(" # ");
        }
        echo('<br>');
    }
}