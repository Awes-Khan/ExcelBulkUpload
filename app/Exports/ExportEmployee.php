<?php

namespace App\Exports;
use App\Models\User;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ExportEmployee implements FromCollection,WithColumnFormatting,WithCustomStartCell,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employee::all('name', 'email', 'mobile');
    }
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_GENERAL,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_NUMBER,
        ];
    }
        public function startCell(): string
    {
        return 'A1';
    }
    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Mobile Number',
        ];
    }

}
