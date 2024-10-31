
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>List of Employees</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Employee Id</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Middlename</th>
            <th>Work Email</th>
            <th>Client Designation</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->employee_id }}</td>
            <td>{{ $record->lastname }}</td>
            <td>{{ $record->firstname }}</td>
            <td>{{ $record->middlename }}</td>
            <td>{{ $record->work_email }}</td>
            <td>{{ $record->client_designation }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
