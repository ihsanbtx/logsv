<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\LogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('main.login');
});*/

/*
Route::get('/login',[UserController::class, 'login'])->name('login');
Route::post('/dologin' ,[UserController::class, 'login'])->name('doLogin');
*/

Auth::routes();

Route::group(['middleware'=>['auth']], function () 
{
    Route::get('logout', function(){ 
        Auth::logout();
        session()->flash('msg', 'Successfully done the operation.');
        return Redirect::route('login')->with('message', 'Your are now logged out!');
    });

    Route::get('/',[DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/home',[DashboardController::class, 'dashboard'])->name('home');

    Route::get('/usermanagement',[UserController::class, 'userList'])->name('usermanagement');
    Route::post('/newUser',[UserController::class, 'newUser'])->name('newUser');
    Route::post('/addUser', [UserController::class, 'addUser'])->name('addUser');
    //Route::get('/editUser/{nrp}',[UserController::class, 'editUser'])->name('editUser/{nrp}');
    Route::post('/editUser',[UserController::class, 'editUser'])->name('editUser');
    //Route::get('/editUser/{$nrp}',[UserController::class, 'editUser'])->name('editUser/');
    Route::post('/updateUser', [UserController::class, 'updateUser'])->name('updateUser');
    Route::post('/deleteUser/{_id}',[UserController::class, 'deleteUser'])->name('deleteUser/{_id}');
    Route::get('/deleteUser/{_id}',[UserController::class, 'deleteUser'])->name('deleteUser/{_id}');
    Route::get('/resetPassword/{_id}',[UserController::class, 'resetPassword'])->name('resetPassword/{_id}');
    Route::post('/importUser', [UserController::class, 'importUser'])->name('importUser');
    Route::post('/doImportUser', [UserController::class, 'doImportUser'])->name('doImportUser');
    Route::post('/changePassword', [UserController::class, 'changePassword'])->name('changePassword');
    Route::post('/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');

    Route::get('/caseAgentList',[FormController::class, 'caseAgentList'])->name('caseAgentList');
    Route::post('/newCaseAgent',[FormController::class, 'newCaseAgent'])->name('newCaseAgent');
    Route::post('/addCaseAgent', [FormController::class, 'addCaseAgent'])->name('addCaseAgent');
    Route::post('/editCaseAgent',[FormController::class, 'editCaseAgent'])->name('editCaseAgent');
    Route::post('/updateCaseAgent', [FormController::class, 'updateCaseAgent'])->name('updateCaseAgent');
    Route::post('/deleteCaseAgent/{_id}',[FormController::class, 'deleteCaseAgent'])->name('deleteCaseAgent/{_id}');
    Route::get('/deleteCaseAgent/{_id}',[FormController::class, 'deleteCaseAgent'])->name('deleteCaseAgent/{_id}');
    Route::post('/importCaseAgent', [FormController::class, 'importCaseAgent'])->name('importCaseAgent');
    Route::post('/doImportCaseAgent', [FormController::class, 'doImportCaseAgent'])->name('doImportCaseAgent');

    Route::get('/svopList',[FormController::class, 'svopList'])->name('svopList');
    Route::post('/newSVOP',[FormController::class, 'newSVOP'])->name('newSVOP');
    Route::post('/addSVOP', [FormController::class, 'addSVOP'])->name('addSVOP');
    Route::post('/editSVOP',[FormController::class, 'editSVOP'])->name('editSVOP');
    Route::post('/updateSVOP', [FormController::class, 'updateSVOP'])->name('updateSVOP');
    Route::post('/deleteSVOP/{_id}',[FormController::class, 'deleteSVOP'])->name('deleteSVOP/{_id}');
    Route::get('/deleteSVOP/{_id}',[FormController::class, 'deleteSVOP'])->name('deleteSVOP/{_id}');
    Route::post('/importSVOP', [FormController::class, 'importSVOP'])->name('importSVOP');
    Route::post('/doImportSVOP', [FormController::class, 'doImportSVOP'])->name('doImportSVOP');

    Route::get('/activityList',[FormController::class, 'activityList'])->name('activityList');
    Route::post('/newActivity',[FormController::class, 'newActivity'])->name('newActivity');
    Route::post('/addActivity', [FormController::class, 'addActivity'])->name('addActivity');
    Route::post('/editActivity',[FormController::class, 'editActivity'])->name('editActivity');
    Route::post('/updateActivity', [FormController::class, 'updateActivity'])->name('updateActivity');
    Route::post('/deleteActivity/{_id}',[FormController::class, 'deleteActivity'])->name('deleteActivity/{_id}');
    Route::get('/deleteActivity/{_id}',[FormController::class, 'deleteActivity'])->name('deleteActivity/{_id}');
    Route::post('/importActivity', [FormController::class, 'importActivity'])->name('importActivity');
    Route::post('/doImportActivity', [FormController::class, 'doImportActivity'])->name('doImportActivity');

    Route::get('/targetGroupList',[FormController::class, 'targetGroupList'])->name('targetGroupList');
    Route::post('/newTargetGroup',[FormController::class, 'newTargetGroup'])->name('newTargetGroup');
    Route::post('/addTargetGroup', [FormController::class, 'addTargetGroup'])->name('addTargetGroup');
    Route::post('/editTargetGroup',[FormController::class, 'editTargetGroup'])->name('editTargetGroup');
    Route::post('/updateTargetGroup', [FormController::class, 'updateTargetGroup'])->name('updateTargetGroup');
    Route::post('/deleteTargetGroup/{_id}',[FormController::class, 'deleteTargetGroup'])->name('deleteTargetGroup/{_id}');
    Route::get('/deleteTargetGroup/{_id}',[FormController::class, 'deleteTargetGroup'])->name('deleteTargetGroup/{_id}');
    Route::post('/importTargetGroup', [FormController::class, 'importTargetGroup'])->name('importTargetGroup');
    Route::post('/doImportTargetGroup', [FormController::class, 'doImportTargetGroup'])->name('doImportTargetGroup');

    Route::get('/providerList',[FormController::class, 'providerList'])->name('providerList');
    Route::post('/newProvider',[FormController::class, 'newProvider'])->name('newProvider');
    Route::post('/addProvider', [FormController::class, 'addProvider'])->name('addProvider');
    Route::post('/editProvider',[FormController::class, 'editProvider'])->name('editProvider');
    Route::post('/updateProvider', [FormController::class, 'updateProvider'])->name('updateProvider');
    Route::post('/deleteProvider/{_id}',[FormController::class, 'deleteProvider'])->name('deleteProvider/{_id}');
    Route::get('/deleteProvider/{_id}',[FormController::class, 'deleteProvider'])->name('deleteProvider/{_id}');
    Route::post('/importProvider', [FormController::class, 'importProvider'])->name('importProvider');
    Route::post('/doImportProvider', [FormController::class, 'doImportProvider'])->name('doImportProvider');

    Route::get('/bandList',[FormController::class, 'bandList'])->name('bandList');
    Route::post('/newBand',[FormController::class, 'newBand'])->name('newBand');
    Route::post('/addBand', [FormController::class, 'addBand'])->name('addBand');
    Route::post('/editBand',[FormController::class, 'editBand'])->name('editBand');
    Route::post('/updateBand', [FormController::class, 'updateBand'])->name('updateBand');
    Route::post('/deleteBand/{_id}',[FormController::class, 'deleteBand'])->name('deleteBand/{_id}');
    Route::get('/deleteBand/{_id}',[FormController::class, 'deleteBand'])->name('deleteBand/{_id}');
    Route::post('/importBand', [FormController::class, 'importBand'])->name('importBand');
    Route::post('/doImportBand', [FormController::class, 'doImportBand'])->name('doImportBand');

    Route::get('/provinceList',[FormController::class, 'provinceList'])->name('provinceList');
    Route::post('/newProvince',[FormController::class, 'newProvince'])->name('newProvince');
    Route::post('/addProvince', [FormController::class, 'addProvince'])->name('addProvince');
    Route::post('/editProvince',[FormController::class, 'editProvince'])->name('editProvince');
    Route::post('/updateProvince', [FormController::class, 'updateProvince'])->name('updateProvince');
    //Route::post('/deleteProvince/{_id}',[FormController::class, 'deleteArea'])->name('deleteProvince/{_id}');
    Route::get('/deleteProvince/{_id}',[FormController::class, 'deleteProvince'])->name('deleteProvince/{_id}');
    Route::post('/importProvince', [FormController::class, 'importProvince'])->name('importProvince');
    Route::post('/doImportProvince', [FormController::class, 'doImportProvince'])->name('doImportProvince');

    Route::get('/districtList',[FormController::class, 'districtList'])->name('districtList');
    Route::post('/newDistrict',[FormController::class, 'newDistrict'])->name('newDistrict');
    Route::post('/addDistrict', [FormController::class, 'addDistrict'])->name('addDistrict');
    Route::post('/editDistrict',[FormController::class, 'editDistrict'])->name('editDistrict');
    Route::post('/updateDistrict', [FormController::class, 'updateDistrict'])->name('updateDistrict');
    //Route::post('/deleteDistrict/{districtNo}/{provinceNo}',[FormController::class, 'deleteDistrict'])->name('deleteDistrict/{_id}');
    Route::get('/deleteDistrict/{districtNo}/{provinceNo}',[FormController::class, 'deleteDistrict'])->name('deleteDistrict/{districtNo}/{provinceNo}');
    Route::post('/importDistrict', [FormController::class, 'importDistrict'])->name('importDistrict');
    Route::post('/doImportDistrict', [FormController::class, 'doImportDistrict'])->name('doImportDistrict');
    Route::post('/getDistrictData', [FormController::class, 'getDistrictData'])->name('getDistrictData');

    Route::get('/subdistrictList',[FormController::class, 'subdistrictList'])->name('subdistrictList');
    Route::post('/newSubdistrict',[FormController::class, 'newSubdistrict'])->name('newSubdistrict');
    Route::post('/addSubdistrict', [FormController::class, 'addSubdistrict'])->name('addSubdistrict');
    Route::post('/editSubdistrict',[FormController::class, 'editSubdistrict'])->name('editSubdistrict');
    Route::post('/updateSubdistrict', [FormController::class, 'updateSubdistrict'])->name('updateSubdistrict');
    //Route::post('/deleteSubdistrict/{subdistrictNo}/{provinceNo}',[FormController::class, 'deleteSubdistrict'])->name('deleteSubdistrict/{_id}');
    Route::get('/deleteSubdistrict/{subdistrictNo}/{districtNo}/{provinceNo}',[FormController::class, 'deleteSubdistrict'])->name('deleteSubdistrict/{subdistrictNo}/{districtNo}/{provinceNo}');
    Route::post('/importSubdistrict', [FormController::class, 'importSubdistrict'])->name('importSubdistrict');
    Route::post('/doImportSubdistrict', [FormController::class, 'doImportSubdistrict'])->name('doImportSubdistrict');
    Route::post('/getSubdistrictData', [FormController::class, 'getSubdistrictData'])->name('getSubdistrictData');

    Route::get('/villageList',[FormController::class, 'villageList'])->name('villageList');
    Route::post('/newVillage',[FormController::class, 'newVillage'])->name('newVillage');
    Route::post('/addVillage', [FormController::class, 'addVillage'])->name('addVillage');
    Route::post('/editVillage',[FormController::class, 'editVillage'])->name('editVillage');
    Route::post('/updateVillage', [FormController::class, 'updateVillage'])->name('updateVillage');
    //Route::post('/deleteVillage/{villageNo}/{provinceNo}',[FormController::class, 'deleteVillage'])->name('deleteVillage/{_id}');
    Route::get('/deleteVillage/{villageNo}/{subdistrictNo}/{districtNo}/{provinceNo}',[FormController::class, 'deleteVillage'])->name('deleteVillage/{villageNo}/{subdistrictNo}/{districtNo}/{provinceNo}');
    Route::post('/importVillage', [FormController::class, 'importVillage'])->name('importVillage');
    Route::post('/doImportVillage', [FormController::class, 'doImportVillage'])->name('doImportVillage');
    Route::post('/getVillageData', [FormController::class, 'getVillageData'])->name('getVillageData');

    Route::get('/vehicleList',[FormController::class, 'vehicleList'])->name('vehicleList');
    Route::post('/newVehicle',[FormController::class, 'newVehicle'])->name('newVehicle');
    Route::post('/addVehicle', [FormController::class, 'addVehicle'])->name('addVehicle');
    Route::post('/editVehicle',[FormController::class, 'editVehicle'])->name('editVehicle');
    Route::post('/updateVehicle', [FormController::class, 'updateVehicle'])->name('updateVehicle');
    Route::post('/deleteVehicle/{_id}',[FormController::class, 'deleteVehicle'])->name('deleteVehicle/{_id}');
    Route::get('/deleteVehicle/{_id}',[FormController::class, 'deleteVehicle'])->name('deleteVehicle/{_id}');
    Route::post('/importVehicle', [FormController::class, 'importVehicle'])->name('importVehicle');
    Route::post('/doImportVehicle', [FormController::class, 'doImportVehicle'])->name('doImportVehicle');

    Route::get('/chooseTarget',[LogController::class, 'chooseTarget'])->name('chooseTarget');
    Route::post('/newTarget',[TargetController::class, 'newTarget'])->name('newTarget');
    Route::post('/addTarget', [TargetController::class, 'addTarget'])->name('addTarget');
    Route::post('/detailTarget', [TargetController::class, 'detailTarget'])->name('detailTarget');
    Route::post('/getEvents', [TargetController::class, 'getEvents'])->name('getEvents');
    Route::get('/getEvents', [TargetController::class, 'getEvents'])->name('getEvents');
    Route::get('/getSeries', [TargetController::class, 'getSeries'])->name('getSeries');

    Route::post('/newLog/{_id}',[LogController::class, 'newLog'])->name('newLog/{_id}');
    Route::get('/newLog/{_id}',[LogController::class, 'newLog'])->name('newLog/{_id}');
    Route::post('/newLog/{_id}',[LogController::class, 'newLog'])->name('newLog/{_id}');
    Route::get('/newLog/{_id}',[LogController::class, 'newLog'])->name('newLog/{_id}');
    Route::post('/addLog',[LogController::class, 'addLog'])->name('addLog');
    //Route::get('/newLog',[LogController::class, 'newLog'])->name('newLog');
    Route::post('/getDistrict', [LogController::class, 'getDistrict'])->name('getDistrict');
    Route::post('/getSubdistrict', [LogController::class, 'getSubdistrict'])->name('getSubdistrict');
    Route::post('/getVillage', [LogController::class, 'getVillage'])->name('getVillage');


    Route::post('/getUser', [UserController::class, 'getUser'])->name('getUser');
    Route::get('/getUser', [UserController::class, 'getUser'])->name('getUser');
    Route::get('/tes', [UserController::class, 'tes'])->name('tes');
    //Route::get('calendar-event', [UserController::class, 'index']);
    //Route::post('calendar-crud-ajax', [UserController::class, 'calendarEvents']);


    Route::post('/testInsert', [FormController::class, 'testInsert'])->name('testInsert');





    Route::post('/addLog1',[LogController::class, 'addLog1'])->name('addLog1');
    Route::post('/addLog2',[LogController::class, 'addLog2'])->name('addLog2');

    

    /*Route::get('/activitylist',[UserController::class, 'activitylist'])->name('activitylist');

    Route::get('/targetgrouplist',[UserController::class, 'targetgrouplist'])->name('targetgrouplist');

    Route::get('/providerlist',[UserController::class, 'providerlist'])->name('providerlist');

    Route::get('/bandlist',[UserController::class, 'bandlist'])->name('bandlist');

    Route::get('/genderlist',[UserController::class, 'genderlist'])->name('genderlist');

    Route::get('/arealist',[UserController::class, 'arealist'])->name('arealist');

    Route::get('/vehiclelist',[UserController::class, 'vehiclelist'])->name('vehiclelist');
    */



    


    


});
