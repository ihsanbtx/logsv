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
use App\Models\CaseAgent;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	
    public function login(){

        $caseAgent['caseAgent'] = CaseAgent::all();
        $caseAgentLists = CaseAgent::all()->pluck('caseAgentName', 'caseAgentName');
        return view('main.login', $caseAgent)->with('caseAgentLists', $caseAgentLists);
        //return view('main.login');
    }

    public function newUser(Request $request){
        
        $id = $request->input('data');
        $caseAgentLists = CaseAgent::all()->pluck('caseAgentName', 'caseAgentName');
        return view('user.newUser')->with('caseAgentLists', $caseAgentLists);
        
    }

    public function inputUser(){
        return view('user.inputUser');
    }

    public function changePassword(Request $request){
        return view('user.changePassword');
    }
    
    //------------------------------------------------------------------------------------------------------------------

    public function userList(){

        $data = User::where('nrp', '<>', '');
        $paginate = 100;

        return view('user.userList')->with('data',$data->get());
    }


	

    //------------------------------------------------------------------------------------------------------------------


    public function addUser(Request $request){
    
    $input = $request->except('_token');

    $rules = array(
               'nrp'=>'required|numeric|unique:user,nrp',
               'email'=>'required|email|unique:user,email',
               'password' => 'required|min:6',
               'cpassword' => 'required|same:password'
            );

    $messages = array(
            'numeric' => ':attribute must be a digit',
            'required' => ':attribute is required',
            'email.unique' => 'Email duplicate with our records',
            'nrp.unique' => 'NRP duplicate with our records'
        );

    $validator = Validator::make($input, $rules,$messages);

    if ($validator->fails()){
            return Redirect::route('usermanagement')->withErrors($validator)->withInput();
        }   
        unset($input['cpassword']);

    $input['password'] = Hash::make($input['password']);

    User::create($input);
        Session::flash('success','Input Saved !');
        return Redirect::route('usermanagement')->with('message', 'User added!');
    }


    public function editUser(Request $request){
        $_id = $request->input('data');
        $data['data'] = User::where('_id', '=', $_id)->first();
        $caseAgentLists = CaseAgent::all()->pluck('caseAgentName', 'caseAgentName');

        return view('user.editUser', $data)->with('caseAgentLists', $caseAgentLists);

    }


    public function resetPassword($_id){

        
        $password = Hash::make("Jakarta2021");
        $updated_by = Auth::user()->nama;

        $user = User::where('_id', '=', $_id)->first();
        $user->updated_by = $updated_by;
        $user->password = $password;
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

    public function getUser(Request $request)
    {
        //$nrp = $request->input('nrp');
        // Total records
        //$nrp = $request->input('nrp');
        //$fullname = $request->input('fullname');
        //$email = $request->input('email');
        //$caseagent = $request->input('caseagent');
        //$usertype = $request->input('usertype');
        //$updated_by = $request->input('updated_by');

        /*$totalRecords = 350;
        $totalRecordswithFilter = 350;


        $data = User::where('nrp', '<>', '')->get();

        $data_arr = array();

        foreach($data as $data){
            $nrp = $data->nrp;
            $fullname = $data->username;
            $email = $data->email;
            $caseagent = $data->caseagent;
            $usertype = $data->usertype;
            $updated_by = $data->updated_by;
    
            $data_arr[] = array(
              "nrp" => $nrp,
              "fullname" => $fullname,
              "email" => $email,
              "caseagent" => $caseagent,
              "usertype" => $usertype,
              "updated_by" => $updated_by,
            );
         }
    
         $response = array(
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecordswithFilter,
            "data" => $data_arr
         );*/
         
         
        $user = User::all()->pluck(5, 'Tes');
        dd($user);
         

        //echo json_encode($response,JSON_PRETTY_PRINT);
        //exit;
        //return Response::json($data);
        return view('user.tes');//->with('response', $response);
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

    public function tes()
    {
        return view('user.tes');
    }










    
}
