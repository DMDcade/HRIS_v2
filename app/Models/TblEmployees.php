<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class TblEmployees extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'tbl_employees';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'lastname','firstname','middlename','permanent_address','birthdate','contact_number','personal_email','employee_id','work_email','client_designation','job_title','employee_type','employee_status','date_hired','date_regularization'
	];
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				Employee_ID LIKE ?  OR 
				Lastname LIKE ?  OR 
				Firstname LIKE ?  OR 
				Middlename LIKE ?  OR 
				Work_Email LIKE ?  OR 
				Client_Designation LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"Employee_ID AS employee_id",
			"Lastname AS lastname",
			"Firstname AS firstname",
			"Middlename AS middlename",
			"Work_Email AS work_email",
			"Client_Designation AS client_designation",
			"ID AS id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"Employee_ID AS employee_id",
			"Lastname AS lastname",
			"Firstname AS firstname",
			"Middlename AS middlename",
			"Work_Email AS work_email",
			"Client_Designation AS client_designation",
			"ID AS id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"ID AS id",
			"Employee_ID AS employee_id",
			"Lastname AS lastname",
			"Firstname AS firstname",
			"Middlename AS middlename",
			"Permanent_Address AS permanent_address",
			"Birthdate AS birthdate",
			"Contact_Number AS contact_number",
			"Personal_Email AS personal_email",
			"Work_Email AS work_email",
			"Client_Designation AS client_designation",
			"Job_Title AS job_title",
			"Employee_Type AS employee_type",
			"Employee_Status AS employee_status",
			"Date_Hired AS date_hired",
			"Date_Regularization AS date_regularization" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"ID AS id",
			"Employee_ID AS employee_id",
			"Lastname AS lastname",
			"Firstname AS firstname",
			"Middlename AS middlename",
			"Permanent_Address AS permanent_address",
			"Birthdate AS birthdate",
			"Contact_Number AS contact_number",
			"Personal_Email AS personal_email",
			"Work_Email AS work_email",
			"Client_Designation AS client_designation",
			"Job_Title AS job_title",
			"Employee_Type AS employee_type",
			"Employee_Status AS employee_status",
			"Date_Hired AS date_hired",
			"Date_Regularization AS date_regularization" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"Lastname AS lastname",
			"Firstname AS firstname",
			"Middlename AS middlename",
			"Permanent_Address AS permanent_address",
			"Birthdate AS birthdate",
			"Contact_Number AS contact_number",
			"Personal_Email AS personal_email",
			"Employee_ID AS employee_id",
			"Work_Email AS work_email",
			"Client_Designation AS client_designation",
			"Job_Title AS job_title",
			"Employee_Type AS employee_type",
			"Employee_Status AS employee_status",
			"Date_Hired AS date_hired",
			"Date_Regularization AS date_regularization",
			"ID AS id" 
		];
	}
}
