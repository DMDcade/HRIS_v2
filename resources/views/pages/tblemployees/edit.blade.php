<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Edit Tbl Employee"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="edit" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto  back-btn-col" >
                    <a class="back-btn btn " href="{{ url()->previous() }}" >
                        <i class="material-icons">arrow_back</i>                                
                    </a>
                </div>
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Edit Tbl Employee</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col-md-9 comp-grid " >
                    <div  class="card card-1 border rounded page-content" >
                        <!--[form-start]-->
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("tblemployees/edit/$rec_id"); ?>" method="post">
                        <!--[form-content-start]-->
                        @csrf
                        <div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="lastname">Lastname <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-lastname-holder" class=" ">
                                            <input id="ctrl-lastname" data-field="lastname"  value="<?php  echo $data['lastname']; ?>" type="text" placeholder="Enter Lastname"  required="" name="lastname"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="firstname">Firstname <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-firstname-holder" class=" ">
                                            <input id="ctrl-firstname" data-field="firstname"  value="<?php  echo $data['firstname']; ?>" type="text" placeholder="Enter Firstname"  required="" name="firstname"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="middlename">Middlename <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-middlename-holder" class=" ">
                                            <input id="ctrl-middlename" data-field="middlename"  value="<?php  echo $data['middlename']; ?>" type="text" placeholder="Enter Middlename"  required="" name="middlename"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="permanent_address">Permanent Address <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-permanent_address-holder" class=" ">
                                            <input id="ctrl-permanent_address" data-field="permanent_address"  value="<?php  echo $data['permanent_address']; ?>" type="text" placeholder="Enter Permanent Address"  required="" name="permanent_address"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="birthdate">Birthdate <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-birthdate-holder" class="input-group ">
                                            <input id="ctrl-birthdate" data-field="birthdate" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['birthdate']; ?>" type="datetime" name="birthdate" placeholder="Enter Birthdate" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                            <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="contact_number">Contact Number <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-contact_number-holder" class=" ">
                                            <input id="ctrl-contact_number" data-field="contact_number"  value="<?php  echo $data['contact_number']; ?>" type="text" placeholder="Enter Contact Number"  required="" name="contact_number"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="personal_email">Personal Email <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-personal_email-holder" class=" ">
                                            <input id="ctrl-personal_email" data-field="personal_email"  value="<?php  echo $data['personal_email']; ?>" type="email" placeholder="Enter Personal Email"  required="" name="personal_email"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="employee_id">Employee Id <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-employee_id-holder" class=" ">
                                            <input id="ctrl-employee_id" data-field="employee_id"  value="<?php  echo $data['employee_id']; ?>" type="text" placeholder="Enter Employee Id"  required="" name="employee_id"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="work_email">Work Email <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-work_email-holder" class=" ">
                                            <input id="ctrl-work_email" data-field="work_email"  value="<?php  echo $data['work_email']; ?>" type="email" placeholder="Enter Work Email"  required="" name="work_email"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="client_designation">Client Designation <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-client_designation-holder" class=" ">
                                            <input id="ctrl-client_designation" data-field="client_designation"  value="<?php  echo $data['client_designation']; ?>" type="text" placeholder="Enter Client Designation"  required="" name="client_designation"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="job_title">Job Title <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-job_title-holder" class=" ">
                                            <input id="ctrl-job_title" data-field="job_title"  value="<?php  echo $data['job_title']; ?>" type="text" placeholder="Enter Job Title"  required="" name="job_title"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="employee_type">Employee Type <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-employee_type-holder" class=" ">
                                            <input id="ctrl-employee_type" data-field="employee_type"  value="<?php  echo $data['employee_type']; ?>" type="text" placeholder="Enter Employee Type"  required="" name="employee_type"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="employee_status">Employee Status <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-employee_status-holder" class=" ">
                                            <input id="ctrl-employee_status" data-field="employee_status"  value="<?php  echo $data['employee_status']; ?>" type="text" placeholder="Enter Employee Status"  required="" name="employee_status"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="date_hired">Date Hired <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-date_hired-holder" class="input-group ">
                                            <input id="ctrl-date_hired" data-field="date_hired" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['date_hired']; ?>" type="datetime" name="date_hired" placeholder="Enter Date Hired" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                            <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="date_regularization">Date Regularization <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-date_regularization-holder" class="input-group ">
                                            <input id="ctrl-date_regularization" data-field="date_regularization" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['date_regularization']; ?>" type="datetime" name="date_regularization" placeholder="Enter Date Regularization" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                            <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-ajax-status"></div>
                        <!--[form-content-end]-->
                        <!--[form-button-start]-->
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">
                            Update
                            <i class="material-icons">send</i>
                            </button>
                        </div>
                        <!--[form-button-end]-->
                    </form>
                    <!--[form-end]-->
                </div>
            </div>
        </div>
    </div>
</div>
</section>


@endsection
