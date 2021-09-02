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


class DashboardController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	
    public function dashboard(){

        $month = date('Y-m');

		$targetCount = Target::all()->count();
		
		$target = Target::all();
		//dd($target);
		foreach($target as $index => $target)
        {  
            foreach($target->logsv as $logsv)
            {

				$caseAgentName = $logsv['caseAgentName'];
				$uniqueCA[] = $logsv['caseAgentName'];

				foreach($logsv['activity'] as $index => $activity)
				{
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

					//begin::data for province map
					if($activity['accessPoint']['province'] == '' )
					{
						$uniqueProvince[] = "Undefined";
					}
					else
					{
						$uniqueProvince[]= $activity['accessPoint']['province'];
					}
					//end::data for province map
	
					//begin::data for district map
					if($activity['accessPoint']['district'] == '')
					{
						$uniqueDistrict[] = "Undefined";
					}
					else
					{
						$uniqueDistrict[]= $activity['accessPoint']['district'];
					}
					//end::data for district map
				}

				//begin:: data for activity column
				$activityName = array_unique($uniqueActivity);
				$activityNameValue = array_values($activityName);
				$activityNameCount = array_count_values($uniqueActivity);
				$activityNameCountValue = array_values($activityNameCount);

				$activityType =
				[
					'name'=>$activityNameValue,
					'value'=>$activityNameCountValue
				];

				$columnActivity[] =
				[ 
					'caseAgentName' => $caseAgentName,
					'activityType' => $activityType,
				];
				//end:: data for activity column

				//begin:: data for vehicle column

					foreach($logsv['activity'] as $activity)
					{
						if($activity['vehicle']['vehicleType'] == '' )
						{
							$uniqueVehicle[] = "Undefined";
						}
						else
						{
							$uniqueVehicle[]= $activity['vehicle']['vehicleType'];
						}

					}

				$vehicleName = array_unique($uniqueVehicle);
				$vehicleNameValue = array_values($vehicleName);
				$vehicleCount = array_count_values($uniqueVehicle);
				$vehicleCountValue = array_values($vehicleCount);
				
				$vehicleType =
				[
					'name'=>$vehicleNameValue,
					'value'=>$vehicleCountValue
				];

				$columnVehicle[] =
				[ 
					'caseAgentName' => $caseAgentName,
					'vehicleType' => $vehicleType,
				];

				//end:: data vor vehicle column

				
			}


			$targetData = array_unique($uniqueCA);
			$targetDataValue = array_values($targetData);
			$targetCounts = array_count_values($uniqueCA);
			$targetCountValue = array_values($targetCounts);
			//$targetCount = $target->count();

			$columnTarget = [
				'caseAgentName' => $targetDataValue,
				'targetCount' => $targetCountValue,
			];

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

		//begin::data for province map
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
        //end::data for province map
		
		
        
        //begin::data for district map
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
        //end::data for district map

		//dd($columnTarget);


		//dd(json_encode($activities));

        return view('main.dashboard')->with('targetCount', $targetCount)->with('activities', $activities)
		->with('province', $province)->with('district', $district);
    }

}
