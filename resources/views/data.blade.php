<!DOCTYPE html>
<html>
<head>
    <title>Laravel Form </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        table, th, td {
        border: 1px solid;
        }
    </style>

</head>
<body>
    <div class="uper">
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div><br />
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
            <td>ID</td>
            <td>Full Name</td>
            <td>Company Name</td>
            <td>Email ID</td>
            <td>Mobile No</td>
            <td >Query</td>
            <td >IP Adress</td>
            <td >Page Path</td>
            <td >Browser Details</td>
            <td >Created at</td>
            <td >Updated at</td>





            <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($shows as $show)
            <tr>
                <td>{{$show->id}}</td>
                <td>{{$show->full_name}}</td>
                <td>{{$show->company_name}}</td>
                <td>{{$show->email_id}}</td>
                <td>{{$show->mobile_no}}</td>
                <td>{{$show->query}}</td>
                <td>{{$show->ip_address}}</td>
                <td>{{$show->page_path}}</td>
                <td>{{$show->browser_details}}</td>
                <td>{{$show->created_at}}</td>
                <td>{{$show->updated_at}}</td>
                <td><a href="">Edit</a></td>
                <td><a href="">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div> 
</body>
</html>
