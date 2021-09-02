<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Target;
use Maatwebsite\Excel\Facades\Excel;
use MongoDB\BSON\ObjectId;
use Image;


class TargetController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	
    
    public function newTarget(Request $request){
        
        return view('target.newTarget');
        
    }
    
    //------------------------------------------------------------------------------------------------------------------

    public function targetList(){

        $data = Target::all();
        $paginate = 100;

        return view('logsv.chooseTarget')->with('data',$data);
    }

    public function getEvents(Request $request)
    {
        $_id = $request->input('_id');
        $target = Target::where('_id', '=', $_id)->first();
        $className = "fc-event-danger fc-event-solid-warning";

        foreach($target->logsv as $logsv)
        {
            $activityDate = $logsv['activityDate'];

            foreach($logsv['activity'] as $activity)
            {
                if($activity['activityTime'] == null)
                {
                    $activityTime = "00:00:00";
                }
                else
                {
                    $activityTime = $activity['activityTime'];
                }

                if($activity['activityName'] == null)
                {
                    $activityName = "";
                }
                else
                {
                    $activityName = $activity['activityName'];
                }

                if($activity['activityDetail'] == null)
                {
                    $activityDetail = "";
                }
                else
                {
                    $activityDetail = $activity['activityDetail'];
                }
                $events[] = 
                [
                    'title' => $activityName,
                    'description' => $activityDetail,
                    'start'=> $activityDate."T".$activityTime,
                    'className'=>$className
                ];
            }
        }


        //dd($events);
        echo json_encode($events);
    
    }

    public function getSeries(Request $request)
    {
        $_id = $request->input('_id');
        $target = Target::where('fullname', 'LIKE', 'MOHAMAD%')->first();
        $className = "fc-event-danger fc-event-solid-warning";

        foreach($target->logsv as $logsv)
        {
            $activityDate = $logsv['activityDate'];

            foreach($logsv['activity'] as $activity)
            {
                if($activity['activityTime'] == "")
                {
                    $activityTime = "00:00:00";
                }
                else
                {
                    $activityTime = $activity['activityTime'];
                }
                $events[] = 
                [
                    'title' => $activity['activityName'],
                    'description' => $activity['activityDetail'],
                    'start'=> $activityDate."T".$activityTime,
                    'className'=>$className
                ];
            }
        }

        $s [] = 
        [
             11,
            12,
            13,
            14,
            15,
            
        ];

        //dd($events);
        echo json_encode($s);
    
    }


	

    //------------------------------------------------------------------------------------------------------------------


    public function addTarget(Request $request){

    
    
    $input = $request->except('_token');

    $_id = new ObjectId();
    $nik = $request->input('nik');
    $fullname = $request->input('fullname');
    $placeofbirth = $request->input('placeofbirth');
    $dateofbirth = $request->input('dateofbirth');
    $gender = $request->input('gender');
    $asknownas = $request->input('asknownas');
    $avatar = $request->file('avatar');

    if($request->hasFile('avatar'))
    {
        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('avatar');
 
        // nama file
        
        $filename = $_id.'.'.$file->getClientOriginalExtension();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'avatar';

        $img = Image::make($file->getRealPath());
        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tujuan_upload.'/'.$filename);
        
        // upload file
        //$file->move($tujuan_upload , $filename);

        $avatar = "avatar/".$filename;
        //$path = basename($path);
    }
    

    $rules = array(
               'gender'=>'required',
               'asknownas' => 'required'
            );

    $messages = array(
            'nik.unique' => 'NIK duplicate to our records',
            'gender.required' => 'Gender is required',
            'asknownas.unique' => 'As Known As is required'
        );

    $validator = Validator::make($input, $rules,$messages);

    if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }   

        Target::create(['_id' => $_id ,'nik' => $nik,
        'fullname' => $fullname,
        'placeofbirth' => $placeofbirth,
        'dateofbirth' => $dateofbirth,
        'gender' => $gender,
        'avatar' => $avatar,
        'asknownas' => $asknownas,
    ]);

        //Target::insert($input);

        /*$target = new Target;
        $target->nik = $nik;
        $target->fullname = $fullname;
        $target->placeofbirth = $placeofbirth;
        $target->dateofbirth = $dateofbirth;
        $target->gender = $gender;
        $target->avatar = $avatar;
        $target->save();

        $asknownas = $request->input('asknownas');
        foreach($asknownas as $asknownas)
        {
            $target = Target::latest()->first();
            $target->asknownas = $asknownas;
            $target->update();
        }
        */
        
        Session::flash('success','Input Saved !');
        return back()->with('message', 'Target added!');

}


    public function detailTarget(Request $request){
        $_id = $request->input('data');
        $data['data'] = Target::where('_id', '=', $_id)->first();
        $target = Target::where('_id', '=', $_id)->first();
        
        foreach($target->logsv as $logsv)
        {  
            foreach($logsv['activity'] as $activity)
            {
                //$activityName = $activity['activityName'];

                //begin::data for activity pie
                if($activity['activityName'] == '')
                {
                    $uniqueActivity[] = "Undefined";
                }
                else
                {
                    $uniqueActivity[] = $activity['activityName'];
                }
                //end::data for activity pie
                
                /*$aktivitas[] = 
                [
                    'value' => 10,
                    'name' => $activityName,
                ];*/

                //begin::data for vehicle pie
                if($activity['vehicle']['vehicleType'] == '')
                {
                    $uniqueVehicle[] = "Undefined";
                }
                else
                {
                    $uniqueVehicle[]= $activity['vehicle']['vehicleType'];
                }
                //end::data for vehicle pie

                //begin::data for province pie
                if($activity['accessPoint']['province'] == '')
                {
                    $uniqueProvince[] = "Undefined";
                }
                else
                {
                    $uniqueProvince[]= $activity['accessPoint']['province'];
                }
                //end::data for province pie

                //begin::data for district pie
                if($activity['accessPoint']['district'] == '')
                {
                    $uniqueDistrict[] = "Undefined";
                }
                else
                {
                    $uniqueDistrict[]= $activity['accessPoint']['district'];
                }
                //end::data for district pie
                

                //begin::data for subdistrict pie
                if($activity['accessPoint']['subdistrict'] == '')
                {
                    $uniqueSubdistrict[] = "Undefined";
                }
                else
                {
                    $uniqueSubdistrict[]= $activity['accessPoint']['subdistrict'];
                }
                //end::data for subdistrict pie

                //begin::data for village pie
                if($activity['accessPoint']['village'] == '')
                {
                    $uniqueVillage[] = "Undefined";
                }
                else
                {
                    $uniqueVillage[]= $activity['accessPoint']['village'];
                }
                //end::data for village pie
                
            }
        }
        
        //begin::data for activity pie
        $activityData = array_unique($uniqueActivity);
        $activityDataValue = array_values($activityData);
        $activityCount= array_count_values($uniqueActivity);
        $activityCountValue = array_values($activityCount);
        
        
        
        foreach($activityCountValue as $index => $activityValue )
        {
            $activities[]=
            [
                'value'=>$activityValue,
                'name'=>$activityDataValue[$index]
            ];
            
        }
        //end::data for activity pie
        
        
        
        //begin::data for vehicle pie
        $vehicleData = array_unique($uniqueVehicle);
        $vehicleDataValue = array_values($vehicleData);
        $vehicleCount= array_count_values($uniqueVehicle);
        $vehicleCountValue = array_values($vehicleCount);

        foreach($vehicleCountValue as $index => $vehicleValue )
        {
            $vehicle[]=
            [
                'value'=>$vehicleValue,
                'name'=>$vehicleDataValue[$index]
            ];
        }
        //end::data for vehicle pie

        //begin::data for province pie
        $provinceData = array_unique($uniqueProvince);
        $provinceDataValue = array_values($provinceData);
        $provinceCount= array_count_values($uniqueProvince);
        $provinceCountValue = array_values($provinceCount);

        foreach($provinceCountValue as $index => $provinceValue )
        {
            $province[]=
            [
                'value'=>$provinceValue,
                'name'=>$provinceDataValue[$index]
            ];
        }
        //end::data for province pie
        
        //begin::data for district pie
        $districtData = array_unique($uniqueDistrict);
        $districtDataValue = array_values($districtData);
        $districtCount= array_count_values($uniqueDistrict);
        $districtCountValue = array_values($districtCount);

        foreach($districtCountValue as $index => $districtValue )
        {
            $district[]=
            [
                'value'=>$districtValue,
                'name'=>$districtDataValue[$index]
            ];
        }
        //end::data for district pie

        //begin::data for subdistrict pie
        $subdistrictData = array_unique($uniqueSubdistrict);
        
        $subdistrictDataValue = array_values($subdistrictData);
        $subdistrictCount= array_count_values($uniqueSubdistrict);
        $subdistrictCountValue = array_values($subdistrictCount);

        foreach($subdistrictCountValue as $index => $subdistrictValue )
        {
            $subdistrict[]=
            [
                'value'=>$subdistrictValue,
                'name'=>$subdistrictDataValue[$index]
            ];
        }
        //end::data for subdistrict pie

        //begin::data for village pie
        $villageData = array_unique($uniqueVillage);
        $villageDataValue = array_values($villageData);
        $villageCount= array_count_values($uniqueVillage);
        $villageCountValue = array_values($villageCount);

        foreach($villageCountValue as $index => $villageValue )
        {
            $village[]=
            [
                'value'=>$villageValue,
                'name'=>$villageDataValue[$index]
            ];
        }
        //end::data for subdistrict pie




        //dd(json_encode($vehicle));
        
        /*foreach($z as $z)
        {
            
                $kuya[]=
                [
                    'value' => $z,
                ];
            
        }

        foreach($x as $x)
        {
            //$y= array_count_values($uniqueActivity);
            //$z = array_values($y);
            $koyo[]=
            [
                'name' => $x
            ];
        }*/
        
        //$result = array_combine($x, $z);
        /*foreach($x as $x)
        {
            $kuya[] = 
            [
                'value' => $z,
                'name' => $x,
            ];
        }*/

        //$final = array_fill_keys($)
        
        
        //dd(json_encode($budi));

        //$unique = array_count_values($activityName);

        //dd(json_encode($y));

        /*foreach($test['activity'] as $a )
        {
            $namaAktivitas[] = $a['activityName'];
            $x[] = 
            [
                'value' => 10,
                'name' => $namaAktivitas,
            ];
        }*/

        return view('target.detailTarget', $data)->with('activities', $activities)
        ->with('vehicle', $vehicle)->with('province', $province)->with('district', $district)
        ->with('subdistrict', $subdistrict)->with('village', $village);
    }

    public function resetPassword($_id){

        $user = User::find($_id);
        $password = Hash::make("Jakarta2021");
        $updated_by = Auth::user()->nama;

        $user->password = $password;
        $user->updated_by = $updated_by;
        $user->update();
        
        return Redirect::route('usermanagement')->with('message', 'Password has been reset!');

    }


    public function deleteUser($_id){

        $user = User::where('_id', '=', $_id);
        $user->delete();
        
        return Redirect::route('usermanagement')->with('message', 'User has been deleted!');

    }


    public function updateUser(Request $request){
        
        $input = $request->except('_token');

        $_id = $request->input('_id');

    
        $user = User::where('_id', '=' ,$_id)->first();
        $fullname = $request->input('fullname');
        $nrp = $request->input('nrp');
        $email = $request->input('email');
        $usertype = $request->input('usertype');
        $caseagent = $request->input('caseagent');
        $updated_by = Auth::user()->nama;

        $user->fullname = $fullname;
        $user->email = $email;
        if($nrp == "")
        {
            $user->nrp = $oldNrp;
        }
        else
        {
            $user->nrp = $nrp;
        }
        $user->usertype = $usertype;
        $user->caseagent = $caseagent;
        $user->updated_by = $updated_by;
        $user->update();
        
        
        return Redirect::route('usermanagement')->with('message', 'User updated!');
        
    }

    //------------------------------------------------------------------------------------------------------------------

    public function updatePassword(Request $request){

       $input= $request->except('_token');
       $currentPassword = $request->input('currentPassword');
       $newPassword = $request->input('newPassword');
       $cpassword = $request->input('cpassword');
       $password = Auth::user()->password;

       if(!Hash::check($currentPassword, $password)){
            return back()->withErrors( 
                            array('currentPassword' => 'Incorrect Current Password!')
                    )->withInput();
            
        }
        
        $rules = array(
               'currentPassword'=>'required|min:6',
               'newPassword'=>'required|min:6',
               'cpassword'=>'required|min:6|same:newPassword'
            );
        $messages = array(
        );
        //validation
        /*$validator = Validator::make($input, $rules, $messages);
        
        if ($validator->fails()){
            return Redirect::route('dashboard')->withErrors($validator)->withInput();
        }*/
        
       Auth::user()->update(array('password'=>Hash::make($input['newPassword'])));
       Session::flash('success','Password Changed !');
       return back()->with('message', 'Password has been changed!');

    }

    public function importUser(Request $request)
    {
        return view('user.importUser');
    }

    public function doImportUser(Request $request)
    {
        // validasi
        $this->validate($request, [
           'uploadFile' => 'required|mimes:xlsx,xls,csv'
        ]);
     
        // menangkap file excel
        $file = $request->file('uploadFile');
     
        // membuat nama file unik
        $filename = $request->file('uploadFile')->getClientOriginalName();
     
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_upload', $filename);
        
        Excel::import(new UserImport, public_path('/file_upload/'.$filename));
        
        return back()->with('message','Success import file!');
        
    }

}
