<?php

class SudokuGrid implements GridInterface


{
    public static function loadFromFile($filepath): ?SudokuGrid{
        if(!file_exists($filepath)){
            return null;
        }
        $contents =file_get_contents($filepath);
        $grid =json_decode($contents);
        if ($grid === null) {
            return null;
        }                                  
        return new SudokuGrid($grid);
    }

    public $data ;
    public function __construct(array $data){
        $this->data = $data;
    }
    

    public function get(int $rowIndex, int $columnIndex): int{
            return $this->data[$rowIndex][$columnIndex];
    }

    public function set(int $rowIndex, int $columnIndex, int $value): void{
        $this->data[$rowIndex][$columnIndex]= $value;   

    }

    public function row(int $rowIndex): array{
        if ($rowIndex < 0 || $rowIndex > 8) {
            return [];
        }
    
        return $this->data[$rowIndex];
    }

    public function column(int $columnIndex): array{
        if ($columnIndex < 0 || $columnIndex > 8 ){
            return[];
        }
        return $this-> data[$columnIndex];
    }

    public function square(int $squareIndex): array{

    }

    public function display(): string{

    }

    public function isValueValidForPosition(int $rowIndex, int $columnIndex, int $value): bool{

    }

    public function getNextRowColumn(int $rowIndex, int $columnIndex): array{

    }

    public function isValid(): bool{

    }

    public function isFilled(): bool{

    }

}
