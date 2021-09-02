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
use App\Models\TargetGroup;
use App\Models\Log;
use App\Models\Activity;
use App\Models\Provider;
use App\Models\Band;
use App\Models\Vehicle;
use App\Models\CaseAgent;
use App\Models\SVOP;
use App\Models\LogSV;
use App\Models\Province;
use App\Models\Subdistrict;
use App\Models\District;
use App\Models\Village;
use MongoDB\BSON\ObjectId;
use Maatwebsite\Excel\Facades\Excel;
use Image;


class LogController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	
    
    
    public function chooseTarget(){

        $data = Target::all();
        $paginate = 100;

        return view('logsv.chooseTarget')->with('data',$data);
    }


	

    //------------------------------------------------------------------------------------------------------------------

    public function getDistrict(Request $request)
    {
        $provinceNo = $request->get('provinceNo');
        $districtList = District::where('provinceNo', '=' , intval($provinceNo))
            ->pluck('districtName', 'districtNo');
        //dd($districtList);
        return response()->json($districtList);
        //echo json_encode($districtList);
    }

    public function getSubdistrict(Request $request)
    {
        $districtNo = $request->get('districtNo');
        $provinceNo = $request->get('provinceNo');
        $subdistrictList = Subdistrict::where('districtNo', '=' , intval($districtNo))->where('provinceNo', '=', intval($provinceNo))
        ->pluck('subdistrictName', 'subdistrictNo');
        //dd($districtList);
        return response()->json($subdistrictList);
        //echo json_encode($districtList);
    }

    public function getVillage(Request $request)
    {
        $districtNo = $request->get('districtNo');
        $provinceNo = $request->get('provinceNo');
        $subdistrictNo = $request->get('subdistrictNo');
        $villageList = Village::where('subdistrictNo', '=', intval($subdistrictNo))->where('districtNo', '=' , intval($districtNo))->where('provinceNo', '=', intval($provinceNo))
        ->pluck('villageName', 'villageNo');
        //dd($districtList);
        return response()->json($villageList);
        //echo json_encode($districtList);
    }

    

    public function newLog($_id){

        $target = Target::where('_id', '=', $_id)->first();

        
        $targetGroupList = TargetGroup::all()->pluck('targetGroupName', 'targetGroupName');
        $activityList = Activity::all()->pluck('activityName', 'activityName');
        $providerList = Provider::all()->pluck('providerName', 'providerName');
        $bandList = Band::all()->pluck('bandName', 'bandName');
        $vehicleList = Vehicle::all()->pluck('vehicleType', 'vehicleType');
        $data = Target::all();
        $caseAgentList = CaseAgent::all()->pluck('caseAgentName', 'caseAgentName');
        $svopList = SVOP::all()->pluck('fullname', 'fullname');
        $provinceList = Province::all()->pluck('provinceName', 'provinceNo');
        $districtList = District::all()->pluck('districtName', 'districtName');
        $subdistrictList = Subdistrict::all()->pluck('subdistrictName', 'subdistrictName');
        $villageList = Village::all()->pluck('villageName', 'villageName');
        
        return view('logsv.newLog')->with('target', $target)->with('_id', $_id)->with('targetGroupList', $targetGroupList)
        ->with('activityList', $activityList)->with('providerList', $providerList)->with('bandList', $bandList)
        ->with('vehicleList', $vehicleList)->with('data', $data)->with('caseAgentList', $caseAgentList)->with('svopList', $svopList)
        ->with('provinceList', $provinceList);

    }

    public function addLog(Request $request){

        $_id = new ObjectId();

        $targetID = $request->input('_id');
        $data = $request->input('data');

        $target = Target::where('_id', '=' ,$targetID)->first();
        $targetGroupName = $request->input('targetGroupName');
        $activityDate = $request->input('activityDate');
        $activityTime = $request->input('data.*.activityTime');
        $activityName = $request->input('data.*.activity');
        $activityDetail = $request->input('data.*.activityDetail');
        $province = $request->input('data.*.province');
        $subdistrict = $request->input('data.*.subdistrict');
        $district = $request->input('data.*.district');
        $village = $request->input('data.*.village');
        $place = $request->input('data.*.place');
        $latitude = $request->input('data.*.latitude');
        $longitude = $request->input('data.*.longitude');
        $provider = $request->input('data.*.provider');
        $band = $request->input('data.*.band');
        $gel = $request->input('data.*.gel');
        $cellid = $request->input('data.*.cellid');
        $vehicleType = $request->input('data.*.vehicleType');
        $vehicleNumber1 = $request->input('data.*.vehicleNumber1');
        $vehicleNumber2 = $request->input('data.*.vehicleNumber2');
        $vehicleNumber3 = $request->input('data.*.vehicleNumber3');
        //$vehicleNumber = $vehicleNumber1." ".$vehicleNumber2." ".$vehicleNumber3;
        $inassociate = $request->input('data.*.inassociate');
        $caseAgentName = $request->input('caseAgentName');
        $svteam = $request->input('svteam');
        //$gallery = "";
        $updated_by = Auth::user()->nama;

        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            foreach($file as $file)
            {

                // nama file
                
                $filename = $_id.'.'.$file->getClientOriginalExtension();

                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'gallery';

                $img = Image::make($file->getRealPath());
                $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($tujuan_upload.'/'.$filename);
                
                // upload file
                //$file->move($tujuan_upload , $filename);

                $path = "gallery/".$filename;
                //dd($path);

                $gallery[] = $path;
            }
        }
        else
        {
            $gallery = "";
        }

        
        
        /*$accessPoint= 
        [
            'province' => $province,  
            'district' => $district, 
            'subdistrict' => $subdistrict,
            'village' => $village,
            'place' => $place
        ];
        $coordinat=
        [
            'latitude' => $latitude,
            'longitude' => $longitude
        ];
        $cgi= 
        [
            'provider' => $provider,
            'band' => $band,
            'gel' => $gel,
            'cellid' => $cellid
        ];
        $vehicle= 
        [
            'vehicleType' => $vehicleType,
        ];*/

        foreach($data as $data)
        {
            $province = Province::where('provinceNo', '=', intval($data['province']))->first();
            $district = District::where('provinceNo', '=', intval($data['province']))->where('districtNo', '=', intval($data['district']))->first();
            $subdistrict = Subdistrict::where('provinceNo', '=', intval($data['province']))->where('districtNo', '=', intval($data['district']))->where('subdistrictNo', '=', intval($data['subdistrict']))->first();
            $village = Village::where('provinceNo', '=', intval($data['province']))->where('districtNo', '=', intval($data['district']))->where('subdistrictNo', '=', intval($data['subdistrict']))->where('villageNo', '=', intval($data['village']))->first();
            $activity[] =
            [
                'activityTime' => $data['activityTime'], 
                'activityName' =>  $data['activity'], 
                'activityDetail' => $data['activityDetail'],
                'accessPoint' => 
                [  
                    'province' => $province->provinceName ?? '', 
                    'district' => $district->districtName ?? '', 
                    'subdistrict' => $subdistrict->subdistrictName ?? '', 
                    'village' => $village->villageName?? '',
                    'place' => $data['place']
                ],
                'coordinat' => 
                [
                    'latitude' => $data['latitude'],
                    'longitude' => $data['longitude']
                ],
                'cgi' => 
                [
                    'provider' => $data['provider'],
                    'band' => $data['band'],
                    'gel' => $data['gel'],
                    'cellid' => $data['cellid']
                ],
                'vehicle' => 
                [
                    'vehicleType' => $data['vehicleType'],
                    'vehicleNumber' => $data['vehicleNumber1']." ".$data['vehicleNumber2']." ".$data['vehicleNumber3']
                ]
            ];
        }

        $logsv[] = 
        [
            'targetGroupName' => $targetGroupName,
            'activityDate' => date('Y-m-d', strtotime($activityDate)),
            'activity' => $activity,
            'inassociate' => $inassociate,
            'gallery' => $gallery,
            'caseAgentName' => $caseAgentName,
            'svteam' => $svteam,
            'updated_by' => $updated_by
        ] ;

        //$target = User::where('_id', '=', $targetID);
        //$target->logsv = $logsv;
        $target->push('logsv' , $logsv);
        

        /*LogSV::create([
            '_id' => $_id,
            'targetID' => $target->_id,
            'targetName' => $target->fullname,
            'targetGroupName' => $targetGroupName,
            'activityDate' => $activityDate,
            'activity' => $activity,
            'inassociate' => $inassociate,
            'gallery' => $gallery,
            'caseAgentName' => $caseAgentName,
            'svteam' => $svteam,
            'updated_by' => $updated_by
        ]);*/

        return Redirect::route('chooseTarget')->with('message', 'Log Surveillance has been added!');

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

    

public function addLog1(Request $request){

    $_id = new ObjectId();

    $targetID = $request->input('_id');

    $target = Target::where('_id', '=' ,$targetID)->first();
    $targetGroupName = $request->input('targetGroupName');
    $activityDate = $request->input('activityDate');
    /*
    $activityTime = $request->input('activityTime');
    $activityName = $request->input('activity');
    $activityDetail = $request->input('activityDetail');
    $province = $request->input('province');
    $subdistrict = $request->input('subdistrict');
    $district = $request->input('district');
    $village = $request->input('village');
    $place = $request->input('place');
    $latitude = $request->input('latitude');
    $longitude = $request->input('longitude');
    $provider = $request->input('provider');
    $band = $request->input('band');
    $gel = $request->input('gel');
    $cellid = $request->input('cellid');
    $vehicleType = $request->input('datavehicleType');
    $vehicleNumber1 = $request->input('datavehicleNumber1');
    $vehicleNumber2 = $request->input('datavehicleNumber2');
    $vehicleNumber3 = $request->input('datavehicleNumber3');
    $vehicleNumber = $vehicleNumber1." ".$vehicleNumber2." ".$vehicleNumber3;
    $inassociate = $request->input('inassociate');
    $caseAgentName = $request->input('caseAgentName');
    $svteam = $request->input('svteam');
    //$gallery = "";
    $updated_by = Auth::user()->nama;

    $province = Province::where('provinceNo', '=', intval($province))->first();
    $district = District::where('provinceNo', '=', intval($province))->where('districtNo', '=', intval($district))->first();
    $subdistrict = Subdistrict::where('provinceNo', '=', intval($province))->where('districtNo', '=', intval($district))->where('subdistrictNo', '=', intval($subdistrict))->first();
    $village = Village::where('provinceNo', '=', intval($province))->where('districtNo', '=', intval($district))->where('subdistrictNo', '=', intval($subdistrict))->where('villageNo', '=', intval($village))->first();
    

    if($request->hasFile('file'))
    {
        $file = $request->file('file');
        foreach($file as $file)
        {

            // nama file
            
            $filename = $_id.'.'.$file->getClientOriginalExtension();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'gallery';

            $img = Image::make($file->getRealPath());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($tujuan_upload.'/'.$filename);
            
            // upload file
            //$file->move($tujuan_upload , $filename);

            $path = "gallery/".$filename;
            //dd($path);

            $gallery[] = $path;
        }
    }
    else
    {
        $gallery = "";
    }

    
    
    $accessPoint= 
    [
        'province' => $province,  
        'district' => $district, 
        'subdistrict' => $subdistrict,
        'village' => $village,
        'place' => $place
    ];
    $coordinat=
    [
        'latitude' => $latitude,
        'longitude' => $longitude
    ];
    $cgi= 
    [
        'provider' => $provider,
        'band' => $band,
        'gel' => $gel,
        'cellid' => $cellid
    ];
    $vehicle= 
    [
        'vehicleType' => $vehicleType,
        'vehicleNumber' => $vehicleNumber
    ];

    $activity[] = 
    [
        'activityTime' => $activityTime,
        'activityName' => $activityName,
        'activityDetail' => $activityDetail,
        'accessPoint' => $accessPoint,
        'coordinat' => $coordinat,
        'cgi' => $cgi,
        'vehicle' => $vehicle,
        'inassociate' => $inassociate,        
    ];

    
    if($request->filled('activityDate') && $request->filled('activityTime') && $request->filled('caseAgentName'))
    {
        $logsv[] = 
        [
            'targetGroupName' => $targetGroupName,
            'activityDate' => date('Y-m-d', strtotime($activityDate)),
            'activity' => $activity,
            'inassociate' => $inassociate,
            'gallery' => $gallery,
            'caseAgentName' => $caseAgentName,
            'svteam' => $svteam,
            'updated_by' => $updated_by
        ] ;

        //$target = User::where('_id', '=', $targetID);
        //$target->logsv = $logsv;
        $target->push('logsv' , $logsv);
        return Redirect::route('chooseTarget')->with('message', 'Log Surveillance has been added!');
    }
    else if($request->filled('activityDate') && $request->filled('activityTime'))
    {
        $logsv[]=
        [
            'targetGroupName' => $targetGroupName,
            'activityDate' => date('Y-m-d', strtotime($activityDate)),
            'activity' => $activity,
            'inassociate' => $inassociate,
            'updated_by' => $updated_by
        ];

        $target->push('logsv', $logsv);
        return back()->with('message', 'Activity has been added!');
    }
    else if($request->filled('caseAgentName') && $request->filled('activityTime'))
    {
        $logsv[]=
        [
            'activity' => $activity,
            'inassociate' => $inassociate,
            'gallery' => $gallery,
            'caseAgentName' => $caseAgentName,
            'svteam' => $svteam,
            'updated_by' => $updated_by
        ];

        $target->push('logsv', $logsv);
        return back()->with('message', 'Activity has been added!');
    }
    else if($request->filled('activityTime'))
    {
        $logsv[]=
        [
            'activity' => $activity,
            'inassociate' => $inassociate,
            'updated_by' => $updated_by
        ];
        $target->push('logsv', $logsv);
        return back()->with('message', 'Activity has been added!');
    }
    */

    $logsv[]=
    [
        '_id'=>$_id,
        'targetGroupName'=>$targetGroupName,
        'activityDate'=>$activityDate,
    ];

    $target->push('logsv', $logsv);

    $activityList = Activity::all()->pluck('activityName', 'activityName');
    $providerList = Provider::all()->pluck('providerName', 'providerName');
    $bandList = Band::all()->pluck('bandName', 'bandName');
    $vehicleList = Vehicle::all()->pluck('vehicleType', 'vehicleType');
    $provinceList = Province::all()->pluck('provinceName', 'provinceNo');
    $data = Target::all();
    $target = Target::where('_id', '=', $targetID)->first();

    return view('logsv.newLog2')->with('_id', $_id)->with('activityList', $activityList)->with('providerList', $providerList)->with('bandList', $bandList)->with('vehicleList', $vehicleList)->with('provinceList', $provinceList)->with('data',$data)->with('target',$target);
    

}

public function addLog2(Request $request){

    $_id = new ObjectId();

    $targetID = $request->input('_id');

    $target = Target::where('_id', '=' ,$targetID)->first();
    $logsv = $target['logsv']->last();
    dd($logsv);
    /*
    $activityTime = $request->input('activityTime');
    $activityName = $request->input('activity');
    $activityDetail = $request->input('activityDetail');
    $province = $request->input('province');
    $subdistrict = $request->input('subdistrict');
    $district = $request->input('district');
    $village = $request->input('village');
    $place = $request->input('place');
    $latitude = $request->input('latitude');
    $longitude = $request->input('longitude');
    $provider = $request->input('provider');
    $band = $request->input('band');
    $gel = $request->input('gel');
    $cellid = $request->input('cellid');
    $vehicleType = $request->input('datavehicleType');
    $vehicleNumber1 = $request->input('datavehicleNumber1');
    $vehicleNumber2 = $request->input('datavehicleNumber2');
    $vehicleNumber3 = $request->input('datavehicleNumber3');
    $vehicleNumber = $vehicleNumber1." ".$vehicleNumber2." ".$vehicleNumber3;
    $inassociate = $request->input('inassociate');
    $caseAgentName = $request->input('caseAgentName');
    $svteam = $request->input('svteam');
    //$gallery = "";
    $updated_by = Auth::user()->nama;

    $province = Province::where('provinceNo', '=', intval($province))->first();
    $district = District::where('provinceNo', '=', intval($province))->where('districtNo', '=', intval($district))->first();
    $subdistrict = Subdistrict::where('provinceNo', '=', intval($province))->where('districtNo', '=', intval($district))->where('subdistrictNo', '=', intval($subdistrict))->first();
    $village = Village::where('provinceNo', '=', intval($province))->where('districtNo', '=', intval($district))->where('subdistrictNo', '=', intval($subdistrict))->where('villageNo', '=', intval($village))->first();
    

    if($request->hasFile('file'))
    {
        $file = $request->file('file');
        foreach($file as $file)
        {

            // nama file
            
            $filename = $_id.'.'.$file->getClientOriginalExtension();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'gallery';

            $img = Image::make($file->getRealPath());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($tujuan_upload.'/'.$filename);
            
            // upload file
            //$file->move($tujuan_upload , $filename);

            $path = "gallery/".$filename;
            //dd($path);

            $gallery[] = $path;
        }
    }
    else
    {
        $gallery = "";
    }

    
    
    $accessPoint= 
    [
        'province' => $province,  
        'district' => $district, 
        'subdistrict' => $subdistrict,
        'village' => $village,
        'place' => $place
    ];
    $coordinat=
    [
        'latitude' => $latitude,
        'longitude' => $longitude
    ];
    $cgi= 
    [
        'provider' => $provider,
        'band' => $band,
        'gel' => $gel,
        'cellid' => $cellid
    ];
    $vehicle= 
    [
        'vehicleType' => $vehicleType,
        'vehicleNumber' => $vehicleNumber
    ];

    $activity[] = 
    [
        'activityTime' => $activityTime,
        'activityName' => $activityName,
        'activityDetail' => $activityDetail,
        'accessPoint' => $accessPoint,
        'coordinat' => $coordinat,
        'cgi' => $cgi,
        'vehicle' => $vehicle,
        'inassociate' => $inassociate,        
    ];

    
    if($request->filled('activityDate') && $request->filled('activityTime') && $request->filled('caseAgentName'))
    {
        $logsv[] = 
        [
            'targetGroupName' => $targetGroupName,
            'activityDate' => date('Y-m-d', strtotime($activityDate)),
            'activity' => $activity,
            'inassociate' => $inassociate,
            'gallery' => $gallery,
            'caseAgentName' => $caseAgentName,
            'svteam' => $svteam,
            'updated_by' => $updated_by
        ] ;

        //$target = User::where('_id', '=', $targetID);
        //$target->logsv = $logsv;
        $target->push('logsv' , $logsv);
        return Redirect::route('chooseTarget')->with('message', 'Log Surveillance has been added!');
    }
    else if($request->filled('activityDate') && $request->filled('activityTime'))
    {
        $logsv[]=
        [
            'targetGroupName' => $targetGroupName,
            'activityDate' => date('Y-m-d', strtotime($activityDate)),
            'activity' => $activity,
            'inassociate' => $inassociate,
            'updated_by' => $updated_by
        ];

        $target->push('logsv', $logsv);
        return back()->with('message', 'Activity has been added!');
    }
    else if($request->filled('caseAgentName') && $request->filled('activityTime'))
    {
        $logsv[]=
        [
            'activity' => $activity,
            'inassociate' => $inassociate,
            'gallery' => $gallery,
            'caseAgentName' => $caseAgentName,
            'svteam' => $svteam,
            'updated_by' => $updated_by
        ];

        $target->push('logsv', $logsv);
        return back()->with('message', 'Activity has been added!');
    }
    else if($request->filled('activityTime'))
    {
        $logsv[]=
        [
            'activity' => $activity,
            'inassociate' => $inassociate,
            'updated_by' => $updated_by
        ];
        $target->push('logsv', $logsv);
        return back()->with('message', 'Activity has been added!');
    }
    */

    $logsv[]=
    [
        '_id'=>$_id,
        'targetGroupName'=>$targetGroupName,
        'activityDate'=>$activityDate,
    ];

    $target->push('logsv', $logsv);

    $activityList = Activity::all()->pluck('activityName', 'activityName');
    $providerList = Provider::all()->pluck('providerName', 'providerName');
    $bandList = Band::all()->pluck('bandName', 'bandName');
    $vehicleList = Vehicle::all()->pluck('vehicleType', 'vehicleType');
    $provinceList = Province::all()->pluck('provinceName', 'provinceNo');
    $data = Target::all();
    $target = Target::where('_id', '=', $targetID)->first();

    return view('logsv.newLog2')->with('_id', $_id)->with('activityList', $activityList)->with('providerList', $providerList)->with('bandList', $bandList)->with('vehicleList', $vehicleList)->with('provinceList', $provinceList)->with('data',$data)->with('target',$target);
    

}





}

