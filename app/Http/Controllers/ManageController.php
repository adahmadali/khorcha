<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;
use App\Models\Contact;
use App\Models\Basic;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class ManageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('admin.dashboard.home');
    }
    public function basic(){
        $data = Basic::where('basic_status',1)->where('basic_id',1)->firstOrfail();
        return view ('admin.manage.basic',compact('data'));
    }
    public function basicUpdate(Request $request){
        $this->validate($request,[
            'basic_companyName'=> 'required',
        ],[
            'basic_companyName.required' => 'Please enter the company name.',
        ]);

        $update = Basic::where('basic_status',1)->where('basic_id',1)->update([
            'basic_companyName' => $request->basic_companyName,
            'basic_title' => $request->basic_title,
        ]);

        if($request->hasFile('basic_logo')){
            $image = $request->file('basic_logo');
            $imageName = 'logo_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save(public_path('uploads/basic/'.$imageName));

            Basic::where('basic_id',1)->update([
                'basic_logo' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($request->hasFile('basic_logo')){
           
            $image = $request->file('basic_logo');
            $imageName = 'logo_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('uploads/basic/'.$imageName);

            Basic::where('basic_id',1)->update([
                'basic_logo' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);


        }

        if($request->hasFile('basic_footerLogo')){
            $image = $request->file('basic_footerLogo');
            $imageName = 'flogo_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('uploads/basic/'.$imageName);

            Basic::where('basic_id',1)->update([
                'basic_footerLogo' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
        if($request->hasFile('basic_favicon')){
            $image = $request->file('basic_favicon');
            $imageName = 'favicon_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('uploads/basic/'.$imageName);

            Basic::where('basic_id',1)->update([
                'basic_favicon' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($update){
            return redirect()->back()->with('success','Successfully update basic information.');
        }else{
            return redirect()->back()->with('error','Operation Failed.');
        }
    }
    public function contact(){
        $data = Contact::where('contact_status',1)->where('contact_id',1)->firstOrfail();
        return view ('admin.manage.contact',compact('data'));
    }
    public function contactUpdate(){

    }
    public function socialMedia(){
        $data = SocialMedia::where('socialMedia_status',1)->where('socialMedia_id',1)->firstOrfail();
        return view ('admin.manage.socialMedia',compact('data'));
    }
    public function socialMediaUpdate(){
        
    }
}
