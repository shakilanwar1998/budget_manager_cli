<?php
class BudgetManager {
    private $incomes;
    private $expenses;
    private $categoryManager;

    public function __construct() {
        $this->incomes = $this->loadData('data/incomes.json');
        $this->expenses = $this->loadData('data/expenses.json');
        $this->categoryManager = new Category();
    }

    private function loadData($file) {
        if (file_exists($file)) {
            $data = file_get_contents($file);
            return json_decode($data, true);
        }
        return [];
    }

    private function saveData($file, $data) {
        file_put_contents($file, json_encode($data));
    }

    public function addIncome($amount, $category, $date) {
        $income = new Income($amount, $category, $date);
        $this->incomes[] = $income;
        $this->saveData('data/incomes.json', $this->incomes);
    }

    public function addExpense($amount, $category, $date) {
        $expense = new Expense($amount, $category, $date);
        $this->expenses[] = $expense;
        $this->saveData('data/expenses.json', $this->expenses);
    }

    public function getIncomes() {
        return $this->incomes;
    }

    public function getExpenses() {
        return $this->expenses;
    }

    public function getSavings() {
        $totalIncome = array_reduce($this->incomes, fn($sum, $income) => $sum + $income['amount'], 0);
        $totalExpense = array_reduce($this->expenses, fn($sum, $expense) => $sum + $expense['amount'], 0);
        return $totalIncome - $totalExpense;
    }

    public function getCategories() {
        return $this->categoryManager->getCategories();
    }
}