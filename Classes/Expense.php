<?php
class Expense {
    public $amount;
    public $category;
    public $date;

    public function __construct($amount, $category, $date) {
        $this->amount = $amount;
        $this->category = $category;
        $this->date = $date;
    }
}
