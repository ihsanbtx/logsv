<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\CaseAgent;
use App\Models\SVOP;
use App\Models\Activity;
use App\Models\Area;
use App\Models\Band;
use App\Models\Provider;
use App\Models\TargetGroup;
use App\Models\Vehicle;
use App\Models\Province;
use App\Models\District;
use App\Models\Subdistrict;
use App\Models\Village;
use App\Imports\SVOPImport;
use App\Imports\CaseAgentImport;


class FormController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	
    public function caseAgentList(){
        $data = CaseAgent::all();
        return view('caseagent.caseAgentList')->with('data', $data);
    }

    public function newCaseAgent(Request $request){
        
        $caseAgentName = $request->input('data');
        return view('caseagent.newCaseAgent');
        
    }

    public function addCaseAgent(Request $request){
    
        $input = $request->except('_token');
    
        $rules = array(
                   'caseAgentName'=>'required|unique:caseagent,caseAgentName'
                );
    
        $messages = array(
                'required' => ':attribute is required',
                'unique' => 'Case Agent Name duplicate with our records'
            );
    
        $validator = Validator::make($input, $rules,$messages);
    
        if ($validator->fails()){
                return Redirect::route('caseAgentList')->withErrors($validator)->withInput();
        }
        else{  
            $caseagent = new CaseAgent;
            $caseagent->caseAgentName = $request->input('caseAgentName');
            $caseagent->updated_by = Auth::user()->fullname;
            $caseagent->save();
            return Redirect::route('caseAgentList')->with('message', 'Case Agent added!');
        }   
    
    }

    public function editCaseAgent(Request $request){
        $_id = $request->input('data');
        $data['data'] = CaseAgent::where('_id', '=', $_id)->first();

        return view('caseagent.editCaseAgent', $data);
    }

    public function updateCaseAgent(Request $request){
        
        $input = $request->except('_token');

        $_id = $request->input('_id');

    
        $caseagent = CaseAgent::where('_id', '=' ,$_id)->first();
        $caseAgentName = $request->input('caseAgentName');
        $updated_by = Auth::user()->fullname;
        
        $caseagent->updated_by = $updated_by;
        $caseagent->caseAgentName = $caseAgentName;
        $caseagent->update();
        
        
        return Redirect::route('caseAgentList')->with('message', 'Case Agent updated!');
    }

    public function deleteCaseAgent($_id){

        $caseagent = CaseAgent::where('_id', '=', $_id)->first();
        $caseagent->delete();
        
        return Redirect::route('caseAgentList')->with('message', 'Case Agent has been deleted');

    }

    public function importCaseAgent(Request $request)
    {
        return view('caseagent.importCaseAgent');
    }

    public function doImportCaseAgent(Request $request)
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
        
        Excel::import(new CaseAgentImport, public_path('/file_upload/'.$filename));
        
        return back()->with('message','Success import file!');
        
    }
    
    //------------------------------------------------------------------------------------------------------------------

    public function svopList(){
        $data = SVOP::all();
        return view('svop.svopList')->with('data', $data);
    }

    public function newSVOP(Request $request){
        
        return view('svop.newSVOP');
        
    }

    public function addSVOP(Request $request){
    
        $input = $request->except('_token');
    
        $rules = array(
                   'nrp'=>'required|unique:svop,nrp'
                );
    
        $messages = array(
                'required' => ':attribute is required',
                'unique' => 'NRP duplicate with our records'
            );
    
        $validator = Validator::make($input, $rules,$messages);
    
        if ($validator->fails()){
                return Redirect::route('svopList')->withErrors($validator)->withInput();
        }
        else{  
            $svop = new SVOP;
            $svop->nrp = $request->input('nrp');
            $svop->fullname = $request->input('fullname');
            $svop->updated_by = Auth::user()->fullname;
            $svop->save();
            return Redirect::route('svopList')->with('message', 'Surveillance Operator added!');
        }   
    }

    public function editSVOP(Request $request){
        $_id = $request->input('data');
        $data['data'] = SVOP::where('_id', '=', $_id)->first();

        return view('svop.editSVOP', $data);
    }

    public function updateSVOP(Request $request){
        
        $input = $request->except('_token');

        $_id = $request->input('_id');

    
        $svop = SVOP::where('_id', '=' ,$_id)->first();
        $nrp = $request->input('nrp');
        $fullname = $request->input('fullname');
        $updated_by = Auth::user()->fullname;
        
        $svop->nrp = $nrp;
        $svop->fullname = $fullname;
        $svop->update_by = $updated_by;
        $svop->update();
        
        
        return Redirect::route('svopList')->with('message', 'Surveillance Operator updated!');
    }

    public function deleteSVOP($_id){

        $svop = SVOP::where('_id', '=', $_id)->first();
        $svop->delete();
        
        return Redirect::route('svopList')->with('message', 'Surveillance Operator has been deleted');

    }

    public function importSVOP(Request $request)
    {
        return view('svop.importSVOP');
    }

    public function doImportSVOP(Request $request)
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
        
        Excel::import(new SVOPImport, public_path('/file_upload/'.$filename));
        
        return back()->with('message','Success import file!');

    }

    //------------------------------------------------------------------------------------------------------------------
    
    public function activityList(){
        $data = Activity::all();
        return view('activity.activityList')->with('data', $data);
    }

    public function newActivity(Request $request){
        
        return view('activity.newActivity');
        
    }

    public function addActivity(Request $request){
    
        $input = $request->except('_token');
    
        $rules = array(
                   'activityName'=>'required|unique:activity,activityName'
                );
    
        $messages = array(
                'required' => ':attribute is required',
                'unique' => 'Activity duplicate with our records'
            );
    
        $validator = Validator::make($input, $rules,$messages);
    
        if ($validator->fails()){
                return Redirect::route('activityList')->withErrors($validator)->withInput();
        }
        else{  
            $activity = new Activity;
            $activity->activityName = $request->input('activityName');
            $activity->updated_by = Auth::user()->fullname;
            $activity->save();
            return Redirect::route('activityList')->with('message', 'Activity added!');
        }   
    }

    public function editActivity(Request $request){
        $_id = $request->input('data');
        $data['data'] = Activity::where('_id', '=', $_id)->first();

        return view('activity.editActivity', $data);
    }

    public function updateActivity(Request $request){
        
        $input = $request->except('_token');

        $_id = $request->input('_id');

    
        $activity = Activity::where('_id', '=' ,$_id)->first();
        $activityName = $request->input('activityName');
        $updated_by = Auth::user()->fullname;
        
        $activity->activityName = $activityName;
        $activity->updated_by = $updated_by;
        $activity->update();
        
        
        return Redirect::route('activityList')->with('message', 'Activity updated!');
    }

    public function deleteActivity($_id){

        $activity = Activity::where('_id', '=', $_id)->first();
        $activity->delete();
        
        return Redirect::route('activityList')->with('message', 'Activity has been deleted');

    }

    public function importActivity(Request $request)
    {
        return view('activity.importActivity');
    }

    public function doImportActivity(Request $request)
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
        
        Excel::import(new ActivityImport, public_path('/file_upload/'.$filename));
        
        return back()->with('message','Success import file!');

    }

    //------------------------------------------------------------------------------------------------------------------

    public function targetGroupList(){
        $data = TargetGroup::all();
        return view('targetGroup.targetGroupList')->with('data', $data);
    }

    public function newTargetGroup(Request $request){
        
        $targetGroupID = $request->input('data');
        return view('targetGroup.newTargetGroup');
        
    }

    public function addTargetGroup(Request $request){
    
        $input = $request->except('_token');
    
        $rules = array(
                   'targetGroupName'=>'required|unique:targetgroup,targetGroupName'
                );
    
        $messages = array(
                'required' => 'Target Group is required',
                'unique' => 'Target Group duplicate with our records'
            );
    
        $validator = Validator::make($input, $rules,$messages);
    
        if ($validator->fails()){
                return Redirect::route('targetGroupList')->withErrors($validator)->withInput();
        }
        else{  
            $targetGroup = new TargetGroup;
            $targetGroup->targetGroupName = $request->input('targetGroupName');
            $targetGroup->updated_by = Auth::user()->fullname;
            $targetGroup->save();
            return Redirect::route('targetGroupList')->with('message', 'Activity added!');
        }   
    }

    public function editTargetGroup(Request $request){
        $_id = $request->input('data');
        $data['data'] = TargetGroup::where('_id', '=', $_id)->first();

        return view('targetgroup.editTargetGroup', $data);
    }

    public function updateTargetGroup(Request $request){
        
        $input = $request->except('_token');

        $_id = $request->input('_id');

    
        $targetGroup = TargetGroup::where('_id', '=' ,$_id)->first();
        $targetGroupName = $request->input('targetGroupName');
        $updated_by = Auth::user()->fullname;

        $targetGroup->targetGroupName = $targetGroupName;
        $targetGroup->updated_by = $updated_by;
        $targetGroup->update();
        
        
        return Redirect::route('targetGroupList')->with('message', 'Target Group updated!');
    }

    public function deleteTargetGroup($_id){

        $targetGroup = TargetGroup::where('_id', '=', $_id)->first();
        $targetGroup->delete();
        
        return Redirect::route('targetGroupList')->with('message', 'Target Group has been deleted');

    }

    public function importTargetGroup(Request $request)
    {
        return view('targetgroup.importTargetGroup');
    }

    public function doImportTargetGroup(Request $request)
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
        
        Excel::import(new TargetGroupImport, public_path('/file_upload/'.$filename));
        
        return back()->with('message','Success import file!');

    }

    //------------------------------------------------------------------------------------------------------------------
    
    public function providerList(){
        $data = Provider::all();
        return view('provider.providerList')->with('data', $data);
    }

    public function newProvider(Request $request){
        
        return view('provider.newProvider');
        
    }

    public function addProvider(Request $request){
    
        $input = $request->except('_token');
    
        $rules = array(
                   'providerName'=>'required|unique:provider,providerName'
                );
    
        $messages = array(
                'required' => 'Provider is required',
                'unique' => 'Provider duplicate with our records'
            );
    
        $validator = Validator::make($input, $rules,$messages);
    
        if ($validator->fails()){
                return Redirect::route('providerList')->withErrors($validator)->withInput();
        }
        else{  
            $provider = new Provider;
            $provider->providerName = $request->input('providerName');
            $provider->updated_by = Auth::user()->fullname;
            $provider->save();

            return Redirect::route('providerList')->with('message', 'Provider added!');
        }   
    }

    public function editProvider(Request $request){
        $_id = $request->input('data');
        $data['data'] = Provider::where('_id', '=', $_id)->first();

        return view('provider.editProvider', $data);
    }

    public function updateProvider(Request $request){
        
        $input = $request->except('_token');

        $_id = $request->input('_id');

    
        $provider = Provider::where('_id', '=' ,$_id)->first();
        $providerName = $request->input('providerName');
        $updated_by = Auth::user()->fullname;

        $provider->providerName = $providerName;
        $provider->updated_by = $updated_by;
        $provider->update();
        
        
        return Redirect::route('providerList')->with('message', 'Provider updated!');
    }

    public function deleteProvider($_id){

        $provider = Provider::where('_id', '=', $_id)->first();
        $provider->delete();
        
        return Redirect::route('providerList')->with('message', 'Provider has been deleted');

    }

    public function importProvider(Request $request)
    {
        return view('provider.importProvider');
    }

    public function doImportProvider(Request $request)
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
        
        Excel::import(new Provider, public_path('/file_upload/'.$filename));
        
        return back()->with('message','Success import file!');

    }

    //------------------------------------------------------------------------------------------------------------------

    public function bandList(){
        $data = Band::all();
        return view('band.bandList')->with('data', $data);
    }

    public function newBand(Request $request){
        
        return view('band.newBand');
        
    }

    public function addBand(Request $request){
    
        $input = $request->except('_token');
    
        $rules = array(
                   'bandName'=>'required|unique:band,bandName'
                );
    
        $messages = array(
                'required' => 'Band is required',
                'unique' => 'Band duplicate with our records'
            );
    
        $validator = Validator::make($input, $rules,$messages);
    
        if ($validator->fails()){
                return Redirect::route('bandList')->withErrors($validator)->withInput();
        }
        else{  
            $band = new Band;
            $band->bandName = $request->input('bandName');
            $band->updated_by = Auth::user()->fullname;
            $band->save();

            return Redirect::route('bandList')->with('message', 'Band added!');
        }   
    }

    public function editBand(Request $request){
        $_id = $request->input('data');
        $data['data'] = Band::where('_id', '=', $_id)->first();

        return view('band.editBand', $data);
    }

    public function updateBand(Request $request){
        
        $input = $request->except('_token');

        $_id = $request->input('_id');

    
        $band = Band::where('_id', '=' ,$_id)->first();
        $bandName = $request->input('bandName');
        $updated_by = Auth::user()->fullname;

        $band->bandName = $bandName;
        $band->updated_by = $updated_by;
        $band->update();
        
        
        return Redirect::route('bandList')->with('message', 'Band updated!');
    }

    public function deleteBand($_id){

        $band = Band::where('_id', '=', $_id)->first();
        $band->delete();
        
        return Redirect::route('bandList')->with('message', 'Band has been deleted');

    }

    public function importBand(Request $request)
    {
        return view('band.importBand');
    }

    public function doImportBand(Request $request)
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
        
        Excel::import(new Band, public_path('/file_upload/'.$filename));
        
        return back()->with('message','Success import file!');

    }

    //------------------------------------------------------------------------------------------------------------------

    public function provinceList(){
        $data = Province::all();
        return view('province.provinceList')->with('data', $data);
    }

    public function newProvince(Request $request){
        
        return view('province.newProvince');
        
    }

    public function addProvince(Request $request){

        $provinceNo = Province::all()->pluck("provinceNo")->last()+1;
        
        $input = $request->except('_token');
    
        $rules = array(
                   'provinceName'=>'required|unique:province,provinceName'
                );
    
        $messages = array(
                'required' => 'Province is required',
                'unique' => 'Province duplicate with our records'
            );
    
        $validator = Validator::make($input, $rules,$messages);
    
        if ($validator->fails()){
                return Redirect::route('provinceList')->withErrors($validator)->withInput();
        }
        else{
            $province = new Province;
            $province->provinceNo = $provinceNo;
            $province->provinceName = $request->input('provinceName');
            $province->updated_by = Auth::user()->fullname;
            $province->save();

            return Redirect::route('provinceList')->with('message', 'Province added!');
        }   
    }

    public function editProvince(Request $request){
        $_id = $request->input('data');
        $data['data'] = Province::where('_id', '=', $_id)->first();

        return view('province.editProvince', $data);
    }

    public function updateProvince(Request $request){
        
        $input = $request->except('_token');

        $_id = $request->input('_id');

    
        $province = Province::where('_id', '=' ,$_id)->first();
        $provinceName = $request->input('provinceName');
        $updated_by = Auth::user()->fullname;

        $province->provinceName = $provinceName;
        $province->updated_by = $updated_by;
        $province->update();
        
        
        return Redirect::route('provinceList')->with('message', 'Province updated!');
    }

    public function deleteProvince($_id){

        $province = Province::where('_id', '=', $_id)->first();
        $province->delete();
        
        return Redirect::route('provinceList')->with('message', 'Province has been deleted');

    }

    public function importProvince(Request $request)
    {
        return view('province.importProvince');
    }

    public function doImportProvince(Request $request)
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
        
        Excel::import(new Province, public_path('/file_upload/'.$filename));
        
        return back()->with('message','Success import file!');

    }

    //------------------------------------------------------------------------------------------------------------------

    public function districtList(){
        $data = District::all();
        $provinceList = Province::all()->pluck('provinceName', 'provinceNo');
        return view('district.districtList')->with('data', $data)->with('provinceList', $provinceList);
    }

    public function getDistrictData(Request $request)
    {
        $provinceNo = $request->get('provinceNo');
        $districtList = District::where('provinceNo', '=' , intval($provinceNo))
            ->pluck('districtName', 'districtNo');
        
        return response()->json($districtList);
    }

    public function newDistrict(Request $request){
        
        $provinceList = Province::all()->pluck('provinceName', 'provinceNo');
        return view('district.newDistrict')->with('provinceList', $provinceList);
        
    }

    public function addDistrict(Request $request){

        $districtNo = District::all()->sortBy('districtNo')->pluck("districtNo")->last()+1;
        $provinceNo = $request->input('province');
        
        $input = $request->except('_token');
    
        $rules = array(
                   'districtName'=>'required|unique:district,districtName'
                );
    
        $messages = array(
                'required' => 'District is required',
                'unique' => 'District duplicate with our records'
            );
    
        $validator = Validator::make($input, $rules,$messages);
    
        if ($validator->fails()){
                return Redirect::route('districtList')->withErrors($validator)->withInput();
        }
        else{
            $district = new District;
            $district->provinceNo = intval($provinceNo);
            $district->districtNo = $districtNo;
            $district->districtName = $request->input('districtName');
            $district->updated_by = Auth::user()->fullname;
            $district->save();

            return Redirect::route('districtList')->with('message', 'District added!');
        }   
    }

    public function editDistrict(Request $request){
        $districtNo = $request->input('districtNo');
        $provinceNo = $request->input('provinceNo');
        $data['data'] = District::where('districtNo', '=', intval($districtNo))->where('provinceNo', '=', intval($provinceNo))->first();
        

        return view('district.editDistrict', $data);
    }

    public function updateDistrict(Request $request){
        
        $input = $request->except('_token');

        $_id = $request->input('_id');

        $provinceNo = $request->input('provinceNo');

    
        $district = District::where('_id', '=' ,$_id)->first();
        $districtName = $request->input('districtName');
        $updated_by = Auth::user()->fullname;

        $district->districtName = $districtName;
        $district->updated_by = $updated_by;
        $district->update();
        
        
        return Redirect::back()->with('message', 'District updated!');
    }

    public function deleteDistrict($districtNo, $provinceNo){

        $district = District::where('districtNo', '=', intval($districtNo))->where('provinceNo', '=', intval($provinceNo))->first();
        
        $district->delete();
        
        return Redirect::back()->with('message', 'District has been deleted');

    }

    public function importDistrict(Request $request)
    {
        return view('district.importDistrict');
    }

    public function doImportDistrict(Request $request)
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
        
        Excel::import(new District, public_path('/file_upload/'.$filename));
        
        return back()->with('message','Success import file!');

    }

    //------------------------------------------------------------------------------------------------------------------

    public function subdistrictList(){
        $data = Subdistrict::all();
        $provinceList = Province::all()->pluck('provinceName', 'provinceNo');
        return view('subdistrict.subdistrictList')->with('data', $data)->with('provinceList', $provinceList);
    }

    public function getSubdistrictData(Request $request)
    {
        $provinceNo = $request->get('provinceNo');
        $districtNo = $request->get('districtNo');
        $subdistrictList = Subdistrict::where('provinceNo', '=' , intval($provinceNo))->where('districtNo', '=' , intval($districtNo))
            ->pluck('subdistrictName', 'subdistrictNo');
        
        return response()->json($subdistrictList);
    }

    public function newSubdistrict(Request $request){
        
        $provinceList = Province::all()->pluck('provinceName', 'provinceNo');
        return view('subdistrict.newSubdistrict')->with('provinceList', $provinceList);
        
    }

    public function addSubdistrict(Request $request){

        $subdistrictNo = Subdistrict::all()->sortBy('subdistrictNo')->pluck("subdistrictNo")->last()+1;
        $provinceNo = $request->input('province');
        $districtNo = $request->input('district');
        
        $input = $request->except('_token');
    
        $rules = array(
                   'subdistrictName'=>'required|unique:subdistrict,subdistrictName'
                );
    
        $messages = array(
                'required' => 'Subdistrict is required',
                'unique' => 'Subdistrict duplicate with our records'
            );
    
        $validator = Validator::make($input, $rules,$messages);
    
        if ($validator->fails()){
                return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            $subdistrict = new Subdistrict;
            $subdistrict->provinceNo = intval($provinceNo);
            $subdistrict->districtNo = intval($districtNo);
            $subdistrict->subdistrictNo = $subdistrictNo;
            $subdistrict->subdistrictName = $request->input('subdistrictName');
            $subdistrict->updated_by = Auth::user()->fullname;
            $subdistrict->save();

            return Redirect::back()->with('message', 'Subdistrict added!');
        }   
    }

    public function editSubdistrict(Request $request){
        $subdistrictNo = $request->input('subdistrictNo');
        $provinceNo = $request->input('provinceNo');
        $districtNo = $request->input('districtNo');
        $data['data'] = Subdistrict::where('subdistrictNo', '=', intval($subdistrictNo))->where('districtNo', '=', intval($districtNo))
        ->where('provinceNo', '=', intval($provinceNo))->first();
        

        return view('subdistrict.editSubdistrict', $data);
    }

    public function updateSubdistrict(Request $request){
        
        $input = $request->except('_token');

        $_id = $request->input('_id');

        $provinceNo = $request->input('provinceNo');
        $districtNo = $request->input('districtNo');

    
        $subdistrict = Subdistrict::where('_id', '=' ,$_id)->first();
        $subdistrictName = $request->input('subdistrictName');
        $updated_by = Auth::user()->fullname;

        $subdistrict->subdistrictName = $subdistrictName;
        $subdistrict->updated_by = $updated_by;
        $subdistrict->update();
        
        
        return Redirect::back()->with('message', 'Subdistrict updated!');
    }

    public function deleteSubdistrict($subdistrictNo, $districtNo, $provinceNo){

        $subdistrict = Subdistrict::where('subdistrictNo', '=', intval($subdistrictNo))->where('districtNo', '=', intval($districtNo))
        ->where('provinceNo', '=', intval($provinceNo))->first();
        //dd(json_encode($subdistrict));
        $subdistrict->delete();
        
        return Redirect::back()->with('message', 'Subdistrict has been deleted');

    }

    public function importSubdistrict(Request $request)
    {
        return view('subdistrict.importSubdistrict');
    }

    public function doImportSubdistrict(Request $request)
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
        
        Excel::import(new Subdistrict, public_path('/file_upload/'.$filename));
        
        return back()->with('message','Success import file!');

    }


    //------------------------------------------------------------------------------------------------------------------

    public function villageList(){
        $data = Village::all();
        $provinceList = Province::all()->pluck('provinceName', 'provinceNo');
        return view('village.villageList')->with('data', $data)->with('provinceList', $provinceList);
    }

    public function getVillageData(Request $request)
    {
        $provinceNo = $request->get('provinceNo');
        $districtNo = $request->get('districtNo');
        $subdistrictNo = $request->get('subdistrictNo');
        $villageList = Village::where('provinceNo', '=' , intval($provinceNo))->where('districtNo', '=' , intval($districtNo))
        ->where('subdistrictNo', '=' , intval($subdistrictNo))->pluck('villageName', 'villageNo');
        
        return response()->json($villageList);
    }

    public function newVillage(Request $request){
        
        $provinceList = Province::all()->pluck('provinceName', 'provinceNo');
        return view('village.newVillage')->with('provinceList', $provinceList);
        
    }

    public function addVillage(Request $request){

        $villageNo = Village::all()->sortBy('villageNo')->pluck("villageNo")->last()+1;
        $provinceNo = $request->input('province');
        $districtNo = $request->input('district');
        $subdistrictNo = $request->input('subdistrict');
        
        $input = $request->except('_token');
    
        $rules = array(
                   'villageName'=>'required|unique:village,villageName'
                );
    
        $messages = array(
                'required' => 'Village is required',
                'unique' => 'Village duplicate with our records'
            );
    
        $validator = Validator::make($input, $rules,$messages);
    
        if ($validator->fails()){
                return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            $village = new Village;
            $village->provinceNo = intval($provinceNo);
            $village->districtNo = intval($districtNo);
            $village->subdistrictNo = intval($subdistrictNo);
            $village->villageNo = $villageNo;
            $village->villageName = $request->input('villageName');
            $village->updated_by = Auth::user()->fullname;
            $village->save();

            return Redirect::back()->with('message', 'Village added!');
        }   
    }

    public function editVillage(Request $request){
        $villageNo = $request->input('villageNo');
        $provinceNo = $request->input('provinceNo');
        $districtNo = $request->input('districtNo');
        $subdistrictNo = $request->input('subdistrictNo');
        $data['data'] = Village::where('villageNo', '=', intval($villageNo))->where('subdistrictNo', '=', intval($subdistrictNo))->where('districtNo', '=', intval($districtNo))
        ->where('provinceNo', '=', intval($provinceNo))->first();
        //dd($data);
        

        return view('village.editVillage', $data);
    }

    public function updateVillage(Request $request){
        
        $input = $request->except('_token');

        $_id = $request->input('_id');

        $provinceNo = $request->input('provinceNo');
        $districtNo = $request->input('districtNo');

    
        $village = Village::where('_id', '=' ,$_id)->first();
        $villageName = $request->input('villageName');
        $updated_by = Auth::user()->fullname;

        $village->villageName = $villageName;
        $village->updated_by = $updated_by;
        $village->update();
        
        
        return Redirect::back()->with('message', 'Village updated!');
    }

    public function deleteVillage($villageNo, $subdistrictNo, $districtNo, $provinceNo){

        $village = Village::where('villageNo', '=', intval($villageNo))->where('subdistrictNo', '=', intval($subdistrictNo))->where('districtNo', '=', intval($districtNo))
        ->where('provinceNo', '=', intval($provinceNo))->first();
        //dd(json_encode($village));
        $village->delete();
        
        return Redirect::back()->with('message', 'Village has been deleted');

    }

    public function importVillage(Request $request)
    {
        return view('village.importVillage');
    }

    public function doImportVillage(Request $request)
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
        
        Excel::import(new Village, public_path('/file_upload/'.$filename));
        
        return back()->with('message','Success import file!');

    }

    //------------------------------------------------------------------------------------------------------------------

    public function vehicleList(){
        $data = Vehicle::all();
        return view('vehicle.vehicleList')->with('data', $data);
    }

    public function newVehicle(Request $request){
        
        $vehicleID = $request->input('data');
        return view('vehicle.newVehicle');
        
    }

    public function addVehicle(Request $request){
    
        $input = $request->except('_token');
    
        $rules = array(
                   'vehicleType'=>'required|unique:vehicle,vehicleType'
                );
    
        $messages = array(
                'required' => 'Vehicle Type is required',
                'unique' => 'Vehicle Type duplicate with our records'
            );
    
        $validator = Validator::make($input, $rules,$messages);
    
        if ($validator->fails()){
                return Redirect::route('vehicleList')->withErrors($validator)->withInput();
        }
        else{  
            $vehicle = new Vehicle;
            $vehicle->vehicleType = $request->input('vehicleType');
            $vehicle->updated_by = Auth::user()->fullname;
            $vehicle->save();

            return Redirect::route('vehicleList')->with('message', 'Vehicle Type added!');
        }   
    }

    public function editVehicle(Request $request){
        $_id = $request->input('data');
        $data['data'] = Vehicle::where('_id', '=', $_id)->first();

        return view('vehicle.editVehicle', $data);
    }

    public function updateVehicle(Request $request){
        
        $input = $request->except('_token');

        $_id = $request->input('_id');

    
        $vehicle = Vehicle::where('_id', '=' ,$_id)->first();
        $vehicleType = $request->input('vehicleType');
        $updated_by = Auth::user()->fullname;

        $vehicle->vehicleType = $vehicleType;
        $vehicle->updated_by = $updated_by;
        $vehicle->update();
        
        
        return Redirect::route('vehicleList')->with('message', 'Vehicle updated!');
    }

    public function deleteVehicle($_id){

        $vehicle = Vehicle::where('_id', '=', $_id)->first();
        $vehicle->delete();
        
        return Redirect::route('vehicleList')->with('message', 'Vehicle has been deleted');

    }

    public function importVehicle(Request $request)
    {
        return view('vehicle.importVehicle');
    }

    public function doImportVehicle(Request $request)
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
        
        Excel::import(new Vehicle, public_path('/file_upload/'.$filename));
        
        return back()->with('message','Success import file!');

    }

    //------------------------------------------------------------------------------------------------------------------


    public function testInsert(Request $request)
    {
        $activityName = $request->input('activityName');

        $activty = new Activity;
        $activity->activityName = $activityName;
        $activity->updated_by = Auth::user()->fullname;
        $activity->save();

        return response()->json(['response'=>'SUCCESS']);
    }

}
