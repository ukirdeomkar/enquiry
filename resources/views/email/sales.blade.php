<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css"> 

    *{
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 13px;
    }  

    .details-table{
        border-collapse: collapse;
    }

    .details-table tbody tr td:first-child{
        text-align: right;
        /*color: #9c9c9c;*/
        /*font-weight: 200;*/
    }

    .details-table tbody tr td{
        padding: 5px;
        border: 1px solid #dcdcdc;
    }

    @media only screen and (-webkit-min-device-pixel-ratio: 1.5), only screen and (min-device-pixel-ratio: 1.5) {
    }

    @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
        body {
            -webkit-text-size-adjust: 60%;
            -ms-text-size-adjust: 60%;
        }
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
        body {
            -webkit-text-size-adjust: 60%;
            -ms-text-size-adjust: 60%;
        }
    }

    @media only screen and (-webkit-min-device-pixel-ratio: 1.5), only screen and (min-device-pixel-ratio: 1.5) {
        body {
            -webkit-text-size-adjust: 60%;
            -ms-text-size-adjust: 60%;
        }
    }

    @media screen and (max-width: 480px) {
        body p {
            float: none;
        }
    }    </style>
</head>
<body>
<p>Hi,<br><br>New #enquiry_type# Enquiry for CRM</p>
<!-- <div align="center"> -->
<br>

<table class="details-table">
        <tbody>
            <tr>
                <td>Full Name :</td>
                <td> {{$sales['full_name']}} </td>
            </tr>
            <tr>
                <td>Company Name :</td>
                <td>{{$sales['company_name']}}</td>
            </tr>
            <tr>
                <td>Email :</td>
                <td>{{$sales['email']}}</td>
            </tr>
            <tr>
                <td>Mobile :</td>
                <td>{{$sales['mobile_no']}}</td>
            </tr>
            <tr>
                <td>Query :</td>
                <td>{{$sales['query']}}</td>
            </tr>
            <tr>
                <td>Page Name :</td>
                <td>#page_name#</td>
            </tr>
            <tr>
                <td>Section :</td>
                <td>#section#</td>
            </tr>
            <tr>
                <td>Button :</td>
                <td>#button#</td>
            </tr>
            <tr>
                <td><strong>Enquired on</strong> :</td>
                <td><strong>{{$sales['created_at']}}</strong></td>
            </tr>
        </tbody>
    </table>




<!-- </div> -->
</body>
</html>