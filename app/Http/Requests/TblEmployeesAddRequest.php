<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TblEmployeesAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
		
        return [
            
				"lastname" => "required|string",
				"firstname" => "required|string",
				"middlename" => "required|string",
				"permanent_address" => "required|string",
				"birthdate" => "required|date",
				"contact_number" => "required|string",
				"personal_email" => "required|email",
				"employee_id" => "required|string",
				"work_email" => "required|email",
				"client_designation" => "required|string",
				"job_title" => "required|string",
				"employee_type" => "required|string",
				"employee_status" => "required|string",
				"date_hired" => "required|date",
				"date_regularization" => "required|date",
            
        ];
    }

	public function messages()
    {
        return [
			
            //using laravel default validation messages
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            //eg = 'name' => 'trim|capitalize|escape'
        ];
    }
}
