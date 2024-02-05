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
        if ($squareIndex<0 || $squareIndex>8 ){
            return[];
        }
    $startRow = intdiv($squareIndex, 3) * 3;
    $startCol = ($squareIndex % 3) * 3;

    $block = [];
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $block[] = $this->data[$startRow + $i][$startCol + $j];
        }
    }
    return $block;
    }

    public function display(): string{
        $display = "";
        for($i=0;$i<9;$i++){
            for($j=0;$j<9;$j++){
                $display .= " " . $this->data[$i][$j];
            }
            $display .= PHP_EOL;
        }
    
        return $display;
    
    }

    public function isValueValidForPosition(int $rowIndex, int $columnIndex, int $value): bool{

    if ($rowIndex < 0 || $rowIndex > 8 || $columnIndex < 0 || $columnIndex > 8) {
        return false;
    }

    if ($this->data[$rowIndex][$columnIndex] === $value) {
        return false;
    }

    for ($col = 0; $col < 9; $col++) {
        if ($this->data[$rowIndex][$col] === $value) {
            return false;
        }
    }

    for ($row = 0; $row < 9; $row++) {
        if ($this->data[$row][$columnIndex] === $value) {
            return false;
        }
    }
    $startRow = intdiv($rowIndex, 3) * 3;
    $startCol = intdiv($columnIndex, 3) * 3;

    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if ($this->data[$startRow + $i][$startCol + $j] === $value) {
                return false;
            }
        }
    }
    return true;
}

    public function getNextRowColumn(int $rowIndex, int $columnIndex): array{
        $columnIndex +=1;

        if($columnIndex>8){
            $columnIndex=0;
            $rowIndex += 1;
    
    }
    if ($rowIndex > 8) {
        return [];
    }
    return [$rowIndex,$columnIndex];

    }




    public function isValid(): bool{
    }

    public function isFilled(): bool{
    }

}
