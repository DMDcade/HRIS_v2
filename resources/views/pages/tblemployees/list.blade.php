<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = "Employees"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page ajax-page" data-page-type="list" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center gap-3">
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Tbl Employees</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <a  class="btn btn-primary btn-block" href="<?php print_link("tblemployees/add", true) ?>" >
                    <i class="material-icons">add</i>                               
                    Add New Tbl Employee 
                </a>
            </div>
            <div class="col-md-3  " >
                <!-- Page drop down search component -->
                <form  class="search" action="{{ url()->current() }}" method="get">
                    <input type="hidden" name="page" value="1" />
                    <div class="input-group">
                        <input value="<?php echo get_value('search'); ?>" class="form-control page-search" type="text" name="search"  placeholder="Search" />
                        <button class="btn btn-primary"><i class="material-icons">search</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<div  class="" >
    <div class="container-fluid">
        <div class="row ">
            <div class="col comp-grid " >
                <div  class=" page-content" >
                    <div id="tblemployees-list-records">
                        <div id="page-main-content" class="table-responsive">
                            <div class="ajax-page-load-indicator" style="display:none">
                                <div class="text-center d-flex justify-content-center load-indicator">
                                    <span class="loader mr-3"></span>
                                    <span class="fw-bold">Loading...</span>
                                </div>
                            </div>
                            <?php Html::page_bread_crumb("/tblemployees/", $field_name, $field_value); ?>
                            <?php Html::display_page_errors($errors); ?>
                            <div class="filter-tags mb-2">
                                <?php Html::filter_tag('search', __('Search')); ?>
                            </div>
                            <table class="table table-hover table-striped table-sm text-left">
                                <thead class="table-header ">
                                    <tr>
                                        <th class="td-employee_id <?php echo (get_value('orderby') == 'employee_id' ? 'sortedby' : null); ?>" >
                                        <?php Html :: get_field_order_link('employee_id', "Employee Id", ''); ?>
                                        </th>
                                        <th class="td-lastname <?php echo (get_value('orderby') == 'lastname' ? 'sortedby' : null); ?>" >
                                        <?php Html :: get_field_order_link('lastname', "Lastname", ''); ?>
                                        </th>
                                        <th class="td-firstname <?php echo (get_value('orderby') == 'firstname' ? 'sortedby' : null); ?>" >
                                        <?php Html :: get_field_order_link('firstname', "Firstname", ''); ?>
                                        </th>
                                        <th class="td-middlename <?php echo (get_value('orderby') == 'middlename' ? 'sortedby' : null); ?>" >
                                        <?php Html :: get_field_order_link('middlename', "Middlename", ''); ?>
                                        </th>
                                        <th class="td-work_email" > Work Email</th>
                                        <th class="td-client_designation" > Client Designation</th>
                                        <th class="td-btn"></th>
                                    </tr>
                                </thead>
                                <?php
                                    if($total_records){
                                ?>
                                <tbody class="page-data">
                                    <!--record-->
                                    <?php
                                        $counter = 0;
                                        foreach($records as $data){
                                        $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                                        $counter++;
                                    ?>
                                    <tr>
                                        <!--PageComponentStart-->
                                        <td class="td-employee_id">
                                            <?php echo  $data['employee_id'] ; ?>
                                        </td>
                                        <td class="td-lastname">
                                            <?php echo  $data['lastname'] ; ?>
                                        </td>
                                        <td class="td-firstname">
                                            <?php echo  $data['firstname'] ; ?>
                                        </td>
                                        <td class="td-middlename">
                                            <?php echo  $data['middlename'] ; ?>
                                        </td>
                                        <td class="td-work_email">
                                            <a href="<?php print_link("mailto:$data[work_email]") ?>"><?php echo $data['work_email']; ?></a>
                                        </td>
                                        <td class="td-client_designation">
                                            <?php echo  $data['client_designation'] ; ?>
                                        </td>
                                        <!--PageComponentEnd-->
                                        <td class="td-btn">
                                            <a class="btn btn-sm btn-primary has-tooltip page-modal"    href="<?php print_link("tblemployees/view/$rec_id"); ?>" >
                                            <i class="material-icons">visibility</i> View
                                        </a>
                                        <a class="btn btn-sm btn-success has-tooltip page-modal"    href="<?php print_link("tblemployees/edit/$rec_id"); ?>" >
                                        <i class="material-icons">edit</i> Edit
                                    </a>
                                    <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal"  href="<?php print_link("tblemployees/delete/$rec_id"); ?>" >
                                    <i class="material-icons">delete_sweep</i> Delete
                                </a>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>
                        <!--endrecord-->
                    </tbody>
                    <tbody class="search-data"></tbody>
                    <?php
                        }
                        else{
                    ?>
                    <tbody class="page-data">
                        <tr>
                            <td class="bg-light text-center text-muted animated bounce p-3" colspan="1000">
                                <i class="material-icons">block</i> No record found
                            </td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
            </div>
            <?php
                if($show_footer){
            ?>
            <div class=" mt-3">
                <div class="row align-items-center justify-content-between">    
                    <div class="col-md-auto d-flex">    
                        <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("tblemployees/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                        <i class="material-icons">delete_sweep</i> Delete Selected
                        </button>
                        <div class="dropup export-btn-holder">
                            <button  class="btn  btn-sm btn-outline-primary dropdown-toggle" title="Export" type="button" data-bs-toggle="dropdown">
                            <i class="material-icons">save</i> 
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php Html :: export_menus(['pdf', 'print', 'excel', 'csv']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">   
                        <?php
                            if($show_pagination == true){
                            $pager = new Pagination($total_records, $record_count);
                            $pager->show_page_count = false;
                            $pager->show_record_count = true;
                            $pager->show_page_limit =false;
                            $pager->limit = $limit;
                            $pager->show_page_number_list = true;
                            $pager->pager_link_range=5;
                            $pager->ajax_page = true;
                            $pager->render();
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>


@endsection
