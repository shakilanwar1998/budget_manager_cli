<?php
require_once 'Classes/Income.php';
require_once 'Classes/Expense.php';
require_once 'Classes/Category.php';
require_once 'Classes/BudgetManager.php';

$budgetManager = new BudgetManager();

while (true) {
    echo "1. Add income\n";
    echo "2. Add expense\n";
    echo "3. View incomes\n";
    echo "4. View expenses\n";
    echo "5. View savings\n";
    echo "6. View categories\n";
    echo "Enter your option: ";

    $option = trim(fgets(STDIN));

    switch ($option) {
        case 1:
            echo "Enter amount: ";
            $amount = trim(fgets(STDIN));
            echo "Enter category: ";
            $category = trim(fgets(STDIN));
            echo "Enter date (YYYY-MM-DD): ";
            $date = trim(fgets(STDIN));
            $budgetManager->addIncome($amount, $category, $date);
            echo "Income added.\n";
            break;

        case 2:
            echo "Enter amount: ";
            $amount = trim(fgets(STDIN));
            echo "Enter category: ";
            $category = trim(fgets(STDIN));
            echo "Enter date (YYYY-MM-DD): ";
            $date = trim(fgets(STDIN));
            $budgetManager->addExpense($amount, $category, $date);
            echo "Expense added.\n";
            break;

        case 3:
            $incomes = $budgetManager->getIncomes();
            echo "------------------------------------\n";
            foreach ($incomes as $income) {
                echo "Amount: {$income['amount']}, Category: {$income['category']}, Date: {$income['date']}\n";
            }
            echo "------------------------------------\n";
            break;

        case 4:
            $expenses = $budgetManager->getExpenses();
            echo "------------------------------------\n";
            foreach ($expenses as $expense) {
                echo "Amount: {$expense['amount']}, Category: {$expense['category']}, Date: {$expense['date']}\n";
            }
            echo "------------------------------------\n";
            break;

        case 5:
            echo "------------------------------------\n";
            echo "Savings: " . $budgetManager->getSavings() . "\n";
            echo "------------------------------------\n";
            break;

        case 6:
            $categories = $budgetManager->getCategories();
            echo "------------------------------------\n";
            foreach ($categories as $category) {
                echo "Name: ".$category['name']." Type: ".$category['type']."\n";
            }
            echo "------------------------------------\n";
            break;

        default:
            echo "Invalid option. Please try again.\n";
    }
}