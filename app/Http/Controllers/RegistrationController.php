<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\state;
use App\Models\City;
use App\Models\Formdata;
use Validator;
use Illuminate\Support\Facades\File;

class RegistrationController extends Controller
{

    // public function show_registation(){
    //     return view('registration');
    // }
    public function index()
    {
        $data['countries'] = Country::get(["country","id"]);
        return view('registration',$data);
    }
    public function getState(Request $request)
    {
        $data['states'] = state::where("country_id",$request->country_id)
                    ->get(["state_name","id"]);
        return response()->json($data);
    }
    public function getCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)
                    ->get(["city_name","id"]);
        return response()->json($data);
    }

    public function send_form(Request $request){
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required||digits:10',
            'country_name' => 'required',
            'state_name' => 'required',
            'city_name' => 'required',
            'address' => 'required',
            'profile' => 'required',
            'resume' => 'required',
            'qualification_name' => 'required',
            'certificate_file' => ' required',
            'qualification_name' => 'required',
            'qualification_inputs' => 'required',
            'certification_files' => 'required',
        ]);
        $formData = new Formdata();
        $formData->name = $request->name;
        $formData->email = $request->email;
        $formData->phone = $request->phone;
        $formData->country_name = $request->country_name;
        $formData->state_name = $request->state_name;
        $formData->city_name = $request->city_name;
        $formData->address = $request->address;
        $formData->qualification1_name = $request->qualification_name;
        $formData->qualification2_name = $request->qualification_inputs;

        //saving profile file
        $file = $request->profile;
        $extension = $file->getClientOriginalExtension(); //getting image extension
        $filename = time() . '.' . $extension;
        $file->move('student/Image/', $filename);
        $formData->profile_img = $filename;

        //saving resume file
        $file = $request->resume;
        $extension = $file->getClientOriginalExtension(); //getting resume extension
        $filename = time() . '.' . $extension;
        $file->move('sturesume/Resume/', $filename);
        $formData->resume = $filename;

        //saving 1st certificate
        $file = $request->certificate_file;
        $extension = $file->getClientOriginalExtension(); //getting certificate extension
        $filename = time() . '.' . $extension;
        $file->move('certificate/firstcertificate/', $filename);
        $formData->qualification1_certificate = $filename;

        //saving 2nd certificate
        $file = $request->certification_files;
        $extension = $file->getClientOriginalExtension(); //getting certificate extension
        $filename = time() . '.' . $extension;
        $file->move('certificates/secondcertificate/', $filename);
        $formData->qualification2_certificate = $filename;

        $saveFormdata = $formData->save();

        if($saveFormdata){
            return redirect()->route('country-state-city')->with('status', 'Your Registration is complete!');
        }else{
            return redirect()->route('country-state-city')->with('flash', 'Your Registration is failed To complete!');
        }
        
        
    }
}
