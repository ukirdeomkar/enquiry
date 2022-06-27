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
    <div class="card uper">
    <div class="card-header">
        Update Data
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('shows.update', $show->id) }}" onSubmit="return confirm('Are you sure you wish to edit details?');">
            <div class="form-group">
                @csrf
                @method('PATCH')
            <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" id="full_name" name="full_name" class="form-control" required="" pattern="[a-zA-Z'-'\s]*" maxlength="35" autocomplete="off" value="{{ $show->full_name }}">
            <br>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Company Name</label>
            <input type="text" id="company_name" name="company_name" class="form-control" required=""  maxlength="100" autocomplete="off" value="{{ $show->company_name }}">
            <br>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Email Id</label>
            <input type="email" id="email_id" name="email_id" class="form-control" required="" autocomplete="off" value="{{ $show->email_id }}">
            <br>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Mobile No</label>
            <input type="number" id="mobile_no" name="mobile_no" class="form-control" required="" maxlength="15" minlength="10" autocomplete="off" value="{{ $show->mobile_no }}">
            <br>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Query</label>
            <textarea name="quer" id="quer" class="form-control" required="" maxlength="2000" autofocus autocomplete="off" > {{ $show->query }}</textarea>
            <br>
            </div>
            <button type="submit" class="btn btn-primary">Update Enquiry</button>
        </form>
    </div>
    </div>
</body>
</html>
