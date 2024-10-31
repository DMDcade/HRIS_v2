<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\TblEmployeesAddRequest;
use App\Http\Requests\TblEmployeesEditRequest;
use App\Models\TblEmployees;
use Illuminate\Http\Request;
use \PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TblemployeesListExport;
use Exception;
class TblEmployeesController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.tblemployees.list";
		$query = TblEmployees::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			TblEmployees::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "tbl_employees.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		// if request format is for export example:- product/index?export=pdf
		if($this->getExportFormat()){
			return $this->ExportList($query); // export current query
		}
		$records = $query->paginate($limit, TblEmployees::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = TblEmployees::query();
		$record = $query->findOrFail($rec_id, TblEmployees::viewFields());
		return $this->renderView("pages.tblemployees.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.tblemployees.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(TblEmployeesAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save TblEmployees record
		$record = TblEmployees::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("tblemployees", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(TblEmployeesEditRequest $request, $rec_id = null){
		$query = TblEmployees::query();
		$record = $query->findOrFail($rec_id, TblEmployees::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("tblemployees", "Record updated successfully");
		}
		return $this->renderView("pages.tblemployees.edit", ["data" => $record, "rec_id" => $rec_id]);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = TblEmployees::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
	

	/**
     * Export table records to different format
	 * supported format:- PDF, CSV, EXCEL, HTML
	 * @param \Illuminate\Database\Eloquent\Model $query
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
	private function ExportList($query){
		ob_end_clean(); // clean any output to allow file download
		$filename = "ListTblEmployeesReport-" . date_now();
		$format = $this->getExportFormat();
		if($format == "print"){
			$records = $query->get(TblEmployees::exportListFields());
			return view("reports.tblemployees-list", ["records" => $records]);
		}
		elseif($format == "pdf"){
			$records = $query->get(TblEmployees::exportListFields());
			$pdf = PDF::loadView("reports.tblemployees-list", ["records" => $records]);
			return $pdf->download("$filename.pdf");
		}
		elseif($format == "csv"){
			return Excel::download(new TblemployeesListExport($query), "$filename.csv", \Maatwebsite\Excel\Excel::CSV);
		}
		elseif($format == "excel"){
			return Excel::download(new TblemployeesListExport($query), "$filename.xlsx", \Maatwebsite\Excel\Excel::XLSX);
		}
	}
}
