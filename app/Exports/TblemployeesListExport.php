<?php 

namespace App\Exports;
use App\Models\TblEmployees;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class TblemployeesListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(TblEmployees::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
    }
	
	public function headings(): array
    {
        return [
			'Employee Id',
			'Lastname',
			'Firstname',
			'Middlename',
			'Work Email',
			'Client Designation'
        ];
    }
	
    public function map($record): array
    {
        return [
			$record->employee_id,
			$record->lastname,
			$record->firstname,
			$record->middlename,
			$record->work_email,
			$record->client_designation
        ];
    }
}
