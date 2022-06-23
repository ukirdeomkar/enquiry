<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
    
    body {
        font-family: "Helvetica Neue", Helvetica,Arial,sans-serif; 
        line-height: 1.5;
        font-size: 13px;
        color: #333333;
    }
    table, p {
        font-size: 13px;
    }
    table tr td:first-child {
        padding-right: 20px;
    }
    table tr {
        vertical-align: top
    }
    .note {
        font-size: 12px !important;
        color: #b3b3b3 !important;
        margin-top: 20px;
    }
    .footer-contact{
        font-size: 13px !important;
        margin-left: -2px;
    }

    .call-us-btn{
        background-color:#b6eaab;
        color:#3d3d3d;
        padding:5px;
        text-decoration:none;
        display:inline-block;
        margin-bottom:1em;
        border-radius:5px;
        border:2px solid #25b708;
    }

   /* p{
        margin-bottom: 9px;
    } */
    </style>
</head>
<body>

	<!-- Header Start -->
	<!-- <div style="text-align: right;">
		<img src="https://www.dquip.com/images/logo-inner.png" alt="Dquip">
	</div> -->
	<!-- Header End -->

	<!-- Body Start -->
	<div>
		<p>Hi {{ $client['name']}},</p>

		<!-- <p>Your Quotation enquiry is assigned to Dquip Sales Team. They will contact you, alternatively you could reach them on the given contact details.</p> -->
        <p>Thank you for your enquiry. We will get back to you, alternatively you can reach us on below contact numbers.</p>
        
        <p>We could help you in the following ways to take a decision on #industry_name# CRM</p>

        <p>We recommend you to follow the following : </p>

        #extra_message#

        <p><a href="https://www.dquip.com/crm-software-contact.php" class="call-us-btn">Call us</a><br>
        <br><br>
        Mobile no&apos;s - {{ $client['office_no']}}</p>

        <p>Your enquiry is assigned to #sales_person_name# you can reach him directly on #sales_person_direct_no#. </p>


	</div>
	<!-- Body End -->

	<!-- Footer Start -->
	<div>
    <br>
        
		<p>Regards,<br>
		<!-- Glatian <br> -->
		Dquip Sales Team</p>

		<table class="footer-contact">
            <tr>
                <td>Whatsapp</td>
                <td>#whatsapp_no#</td>
            </tr>
            <tr>
                <td>Direct</td>
                <td>#direct_no#</td>
            </tr>
            <tr>
                <td>Office</td>
                <td>{{ $client['office_no']}}</td>
            </tr>
            <tr>
                <td>Skype</td>
                <td>{{ $client['skype']}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $client['support_email']}}</td>
            </tr>
            <tr>
                <td style="padding-right: 15px;">Web</td>
                <td>{{ $client['website']}}</td>
            </tr>
            <tr>
                <td style="padding-right: 15px;">Timing</td>
                <td>{{ $client['timing']}}</td>
            </tr>
        </table>
        
	</div>

	<div>
		<p class="note">#signature#</p>
	</div>
	<!-- Footer End -->

</body>
</html>