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

    public function insertion(array $numbers) : array
    {
	for ($i = 1; $i < count($numbers); $i++) {
	    for ($j = 0; $j < $i; $j++) {
		if ($numbers[$i] < $numbers[$j]) {
		    $spliced = array_splice($numbers, $i, 1);
		    array_splice($numbers, $j, 0, $spliced[0]);
		}
	    }
	}

	return $numbers;
    }

    public function selection(array $numbers) : array
    {
	for ($i = count($numbers) - 1; $i > 0; $i--) {
	    $this->swap($numbers, $this->max($numbers, $i), $i);
	}

	return $numbers;
    }

    public function shell(array $numbers) : array
    {
	for ($gap = round(count($numbers) / 2); $gap > 0; ($gap = $gap / 2)) {
	    for ($i = $gap; $i < count($numbers); $i++) {
		for ($j = $i - $gap; $j >= 0; $j -= $gap) {
		    if ($numbers[$j + $gap] >= $numbers[$j]) {
			break;
		    }

		    $this->swap($numbers, $j+$gap, $j);		    
		}
	    }
	}
	return $numbers;
    }

    private function swap(array &$numbers, int $low, int $high)
    {
	$temp = $numbers[$low];
	$numbers[$low] = $numbers[$high];
	$numbers[$high] = $temp;
    }

    private function max(array $numbers, int $high)
    {
	$largest = 0;

	for ($i = 1; $i <= $high; $i++) {
	    if ($numbers[$largest] < $numbers[$i]) {
		$largest = $i;
	    }
	}
	
	return $largest;
    }
}
