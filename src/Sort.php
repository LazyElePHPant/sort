<?php

namespace App;

class Sort
{
    public function quick(array $numbers) : array
    {
	if (count($numbers) <= 1) return $numbers;

	$pivot = $numbers[count($numbers) - 1];
	$left = [];
	$right = [];

	for ($i = 0; $i < count($numbers) - 1; $i++) {
	    $method = ($numbers[$i] < $pivot)
		    ? 'left'
		    : 'right';
	    
	    array_push($$method, $numbers[$i]);
	}

	return array_merge($this->quick($left), [$pivot], $this->quick($right));
    }
}
