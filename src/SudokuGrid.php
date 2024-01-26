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

    public function __construct(array $data){
        $this->grid = $data;
    }
    
    function get_data() {
        return $this->data;
    }
    


    public function get(int $rowIndex, int $columnIndex): int{

    }

    public function set(int $rowIndex, int $columnIndex, int $value): void{

    }

    public function row(int $rowIndex): array{

    }

    public function column(int $columnIndex): array{

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
