<?php
class Category {
    private $categories;

    public function __construct() {
        $this->categories = $this->loadCategories();
    }

    private function loadCategories() {
        $file = 'data/categories.json';
        if (file_exists($file)) {
            $data = file_get_contents($file);
            return json_decode($data, true);
        }
        return [];
    }

    public function getCategories() {
        return $this->categories;
    }
}