<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TblEmployeesEditRequest extends FormRequest
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
            
				"lastname" => "filled|string",
				"firstname" => "filled|string",
				"middlename" => "filled|string",
				"permanent_address" => "filled|string",
				"birthdate" => "filled|date",
				"contact_number" => "filled|string",
				"personal_email" => "filled|email",
				"employee_id" => "filled|string",
				"work_email" => "filled|email",
				"client_designation" => "filled|string",
				"job_title" => "filled|string",
				"employee_type" => "filled|string",
				"employee_status" => "filled|string",
				"date_hired" => "filled|date",
				"date_regularization" => "filled|date",
            
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
