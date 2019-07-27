<?php

use PHPUnit\Framework\TestCase;
use App\Sort;

final class SortTest extends TestCase
{
    public function test_that_a_list_can_be_sorted_using_quick_sort()
    {
	$sort = new Sort();

	$list = [676,2,56,24,5,3,4,563,54,57,5677,43,32,4,424];

	$this->assertEquals([2,3,4,4,5,24,32,43,54,56,57,424,563,676,5677], $sort->quick($list));
    }

    public function test_that_a_list_can_be_sorted_using_insertion_sort()
    {
	$sort = new Sort();

	$list = [676,2,56,24,5,3,4,563,54,57,5677,43,32,4,424];

	$this->assertEquals([2,3,4,4,5,24,32,43,54,56,57,424,563,676,5677], $sort->insertion($list));
    }

    public function test_that_a_list_can_be_sorted_using_selection_sort()
    {	
	$sort = new Sort();

	$list = [676,2,56,24,5,3,4,563,54,57,5677,43,32,4,424];

	$this->assertEquals([2,3,4,4,5,24,32,43,54,56,57,424,563,676,5677], $sort->selection($list));	
    }
}
