<!DOCTYPE html>
<html>
<head>
    <title>Laravel Form </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Enquiry Form 
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
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="store-form" accept-charset="utf-8" autocomplete="off">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Full Name</label>
          <input type="text" id="full_name" name="full_name" class="form-control" required="" pattern="[a-zA-Z'-'\s]*" maxlength="35" autocomplete="off">
          <br>
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Company Name</label>
          <input type="text" id="company_name" name="company_name" class="form-control" required=""  maxlength="100" autocomplete="off">
          <br>
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Email Id</label>
          <input type="email" id="email_id" name="email_id" class="form-control" required="" autocomplete="off">
          <br>
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Mobile No</label>
          <input type="number" id="mobile_no" name="mobile_no" class="form-control" required="" maxlength="15" minlength="10" autocomplete="off">
          <br>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Query</label>
          <textarea name="quer" id="quer" class="form-control" required="" maxlength="2000" autofocus autocomplete="off"> </textarea>
          <br>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox"  id="flexCheckDefault" name="ip_ack" >
            <label class="form-check-label" for="flexCheckDefault" >
            I acknowledge that IP address and Email address are being logged for monitoring purpose
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox"  id="flexCheckDefault" name="terms_ack">
            <label class="form-check-label" for="flexCheckDefault" >
            I have read and I agree to the 
            <a href="http://dquiplaravel.mycrmserver.com/privacy-policy">privacy policy</a> & 
            <a href="http://dquiplaravel.mycrmserver.com/terms-of-use">terms of use</a>
            </label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>
  </div>
</div>  
</body>
</html>
