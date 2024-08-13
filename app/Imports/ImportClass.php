<?php

namespace App\Imports;

use App\Models\Cronogram;
use Carbon\Carbon;
use Exception;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportClass implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $fechaOriginal = trim($row['fecha']);
        
        if (is_numeric($fechaOriginal)) {
            $fechaConvertida = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($fechaOriginal))->format('Y-m-d');
        } elseif (preg_match('/^\d{2}-\d{2}-\d{4}$/', $fechaOriginal)) {
            try {
                $fechaConvertida = Carbon::createFromFormat('d-m-Y', $fechaOriginal)->format('Y-m-d');
            } catch (Exception $e) {
                throw new \Exception("Error al convertir la fecha: $fechaOriginal - " . $e->getMessage());
            }
        } else {
            throw new \Exception("El formato de la fecha es incorrecto: $fechaOriginal");
        }
        return Cronogram::updateOrCreate([
            'date' => $fechaConvertida, 
            'title' => $row['celebracion'],
        ]);
    }
}
