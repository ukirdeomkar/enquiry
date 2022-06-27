<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquiry;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use DB;







class EnquiryController extends Controller
{
    public function index()
    {
        return view('form');

    }
    public function store(Request $request)
    {
        
        $messages=
        [
            "full_name.required"=>"Please enter full name. Max 35 characters allowed. - Numeric and special characters are not allowed. ",
            "full_name.max"=>"Please enter full name. Max 35 characters allowed. - Numeric and special characters are not allowed.",
            "full_name.regex"=>"Please enter full name. Max 35 characters allowed. - Numeric and special characters are not allowed.",

            "company_name.required"=>"Please enter a company name. Max 100 characters allowed. Entering only special characters are not allowed.",
            "company_name.alpha_num"=>"Please enter a company name. Max 100 characters allowed. Entering only special characters are not allowed.",
            "company_name.max"=>"Please enter a company name. Max 100 characters allowed. Entering only special characters are not allowed.",

            "mobile_no.required" => "The Mobile Number Must be between 10 to 15 Digits",
            "mobile_no.max" => "The Mobile Number Must be between 10 to 15 Digits",
            "mobile_no.min" => "The Mobile Number Must be between 10 to 15 Digits",



            "email_id.required"=>"Please enter valid email id.",
            "email_id.email"=>"Please enter valid email id.",

            "ip_ack.accepted"=>"Please accept the ip monitoring checkbox",

            "terms_ack.accepted"=>"Please accept the privacy policy & term of use checkbox.",

            'quer.max'=> "The Query should be at max 2000 digits",


        ];

        $rules = [
            'full_name' => 'required|max:35|regex:/^[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/',
            'company_name' => 'required|max:35|alpha_num',
            'mobile_no' => 'required|min:10|max:15',
            'quer' => 'max:2000',
            'email_id'=>'email:rfc,dns',
            'ip_ack' => 'accepted',
            'terms_ack' => 'accepted'
        ];

        $validate =  Validator::make($request->all(),$rules,$messages);
 

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->messages())->withInput();
        }

        // $show = Enquiry::create($validate);


        $full_name = $request->full_name;
        $company_name = $request->company_name;
        $email_id = $request->email_id;
        $mobile_no = $request->mobile_no;
        $quer = $request->quer;
        // $ip_address = request()->ip();
        $ip_address = $this->getIp(); 
        $page_path = parse_url( $_SERVER[ 'REQUEST_URI' ], PHP_URL_PATH );
        $browser_details = request()->userAgent();
        $created_at = Carbon::now()->toDateTimeString();
        $updated_at = Carbon::now()->toDateTimeString();

        DB::select('call InsertData(?,?,?,?,?,?,?,?,?,?)',array($full_name ,$company_name ,$email_id ,$mobile_no ,$quer ,$ip_address ,$page_path ,$browser_details ,$created_at ,$updated_at));

        $sales = [
            'email' =>request('email_id'),
            'full_name' =>request('full_name'),
            'company_name' =>request('company_name'),
            'mobile_no' =>request('mobile_no'),
            'query' =>request('quer'),
            'created_at' => $created_at 

        ];
        $client = [
            'name' => request('full_name'),
            'time' => Carbon::now()->timestamp,
            'info' => 'Laravel',
            'email' => request('email_id'),
            'office_no' => '(+91) 976 9543 488',
            'support_email' =>'support@dquip.com',
            'website' => 'http://dquiplaravel.mycrmserver.com/',
            'timing' => 'Mon to Fri - 10 am to 6 pm (IST)',
            'skype' =>'dquip.crm'
    
        ];
        \Mail::to('sales@gmail.com')->send(new \App\Mail\SalesMail($sales));
        \Mail::to($client['email'])->send(new \App\Mail\ClientMail($client));

        return redirect('thankyou')->with('status', 'Form Data Has Been inserted');
    }

    public function show()
    {
        // $shows = Enquiry::all();
        $shows = DB::select('call ViewData()');


        return view('data', compact('shows'));
    }
    public function edit($id)
    {
        $show = Enquiry::findOrFail($id);

        return view('edit', compact('show'));
    }
    public function update(Request $request, $id)
    {

        $messages=
        [
            "full_name.required"=>"- Please enter full name. Max 35 characters allowed. - Numeric and special characters are not allowed. ",
            "full_name.max"=>"- Please enter full name. Max 35 characters allowed. - Numeric and special characters are not allowed.",
            "full_name.regex"=>"- Please enter full name. Max 35 characters allowed. - Numeric and special characters are not allowed.",

            "company_name.required"=>"- Please enter a company name. Max 100 characters allowed. Entering only special characters are not allowed.",
            "company_name.alpha_num"=>"- Please enter a company name. Max 100 characters allowed. Entering only special characters are not allowed.",
            "company_name.max"=>"- Please enter a company name. Max 100 characters allowed. Entering only special characters are not allowed.",

            "email_id.required"=>"- Please enter valid email id.",
            "email_id.email"=>"- Please enter valid email id.",

            'quer.max'=> "- The Query should be at max 2000 digits",


        ];

        $rules = [
            'full_name' => 'required|max:35|regex:/^[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/',
            'company_name' => 'required|max:35|alpha_num',
            'mobile_no' => 'required|min:10|max:15',
            'quer' => 'max:2000',
            'email_id'=>'email:rfc,dns',
        ];

        $validate =  Validator::make($request->all(),$rules,$messages);
 

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->messages())->withInput();
        }

        $full_name = $request->full_name;
        $company_name = $request->company_name;
        $email_id = $request->email_id;
        $mobile_no = $request->mobile_no;
        $quer = $request->quer;
        $page_path = parse_url( $_SERVER[ 'REQUEST_URI' ], PHP_URL_PATH );
        $updated_at = Carbon::now()->toDateTimeString();

        DB::select('call UpdateData(?,?,?,?,?,?,?,?)',array($full_name ,$company_name ,$email_id ,$mobile_no ,$quer ,$page_path ,$updated_at,$id));



        // Enquiry::whereId($id)->update($validate);


        return redirect('data')->with('success', 'Data is successfully updated ' );
    }

    public function destroy($id)
    {
            $show = Enquiry::findOrFail($id);
            // $show->delete();
            DB::select('call DeleteData(?)',array($id));


            return redirect('data')->with('success', 'Data is successfully deleted');
    }

    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }
}
