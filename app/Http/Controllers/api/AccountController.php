<?php
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use App\Models\CsUsers;
use App\Models\CsPincode;
use App\Models\CsCart;
use App\Models\CsUserAddress;
use App\Models\CsState;
use App\Models\CsShippingRate;
use App\Models\CsShippingPincode;
use App\Models\CsCountries;
use App\Models\CsThemeAdmin;
use App\Models\CsCities;
use App\Models\CsTransactions;
use App\Models\CsTransactionDetails;
use App\Models\CsUserFavProduct;
use App\Models\CsCurrency;
use App\Models\CsCurrencyRates;

use Hash;
use Validator;

class AccountController extends Controller
{
    public function checkSession($user_token=null){
        $userData = CsUsers::where('user_token',$user_token)->first();
        if(isset($userData) && $userData->user_id>0){
            return true;
        }else{
            return false;
        }
    } 

    public function updateProfile(request $request)
    {
        if($request->isMethod('post')) 
        {            
			$token = $request->header('x-authorization');
			$user_token = str_replace('Bearer ','',$token);
			if(empty($user_token) || $user_token=='null')
			{
				return response()->json(['status' => 'session_expired','message' => 'Session expired'],200);
			}
            if(empty($request->user_fname)){
                return response()->json(['status' => 'error','message' => 'Please enter name'],200);
            }
			$updatedata = CsUsers::where('user_token',$user_token)->update([
                'user_fname'=>$request->user_fname,
                //'user_email'=>$request->user_email,
                //'user_mobile'=>$request->user_mobile,
            ]);
            if(isset($updatedata) && $updatedata!=0){
                return response()->json(['status' => 'success','message' => 'Profile Updated Successfully'],200);  
            }else{
                return response()->json(['status' => 'error','message' => 'Profile did not updated, Please try later.'],200);  
            }
        }else{
            return response()->json(['status' => 'error','message' => 'Invalid Method'],200);
        }
    }

    public function updatePassword(request $request)
    {
        if($request->isMethod('post')) 
        {            
			$token = $request->header('x-authorization');
			$user_token = str_replace('Bearer ','',$token);
			if(empty($user_token) || $user_token=='null')
			{
				return response()->json(['status' => 'session_expired','message' => 'Session expired'],200);
			}
            if(empty($request->new_password)){
                return response()->json(['status' => 'error','message' => 'Please enter New Password'],200);
            }
            if(empty($request->confirm_password)){
                return response()->json(['status' => 'error','message' => 'Please enter Confirm Password'],200);
            }
			$updatedata = CsUsers::where('user_token',$user_token)->update([
                'user_password'=> Hash::make($request->confirm_password), 
            ]);
            if(isset($updatedata) && $updatedata!=0){
                return response()->json(['status' => 'success','message' => 'Password Updated Successfully'],200);  
            }else{
                return response()->json(['status' => 'error','message' => 'Password did not updated, Please try later.'],200);  
            }
        }else{
            return response()->json(['status' => 'error','message' => 'Invalid Method'],200);
        }
    }

    function addtofav(Request $request)
    {
        $token = $request->header('x-authorization');
        $user_token = str_replace('Bearer ','',$token);
        $userSession = self::checkSession($user_token);
        $aryResponse = array();
        if($userSession)
        {
            $loginData = CsUsers::where('user_token',$user_token)->first();
            $check = CsUserFavProduct::where('ufp_user_id',$loginData->user_id)->where('ufp_product_id',$request->product_id)->first();
            if(isset($check->ufp_id) && $check->ufp_id>0){
                CsUserFavProduct::where('ufp_id', $check->ufp_id)->delete();
                $aryResponse['status'] = 'success';
                $aryResponse['notification']='d-icon-heart';
            }else{
                $check = new CsUserFavProduct;
                $check->ufp_user_id = $loginData->user_id;
                $check->ufp_product_id = $request->product_id;
                $check->ufp_status = 1;
                $check->save();
                $aryResponse['status'] = 'success';
                $aryResponse['notification']='d-icon-heart-full';
            }
        }
        return response()->json(['data'=>$aryResponse],200);
    }

    function removefavwishlist(Request $request)
    {
        $token = $request->header('x-authorization');
        $user_token = str_replace('Bearer ','',$token);
        $userSession = self::checkSession($user_token);
        $aryResponse = array();
        if($userSession)
        {
            $loginData = CsUsers::where('user_token',$user_token)->first();
            $check = CsUserFavProduct::where('ufp_user_id',$loginData->user_id)->where('ufp_product_id',$request->product_id)->first();
            if(isset($check->ufp_id) && $check->ufp_id>0){
                CsUserFavProduct::where('ufp_id', $check->ufp_id)->delete();
                $favdata = CsUserFavProduct::where('ufp_user_id',$loginData->user_id)->with(['product'])->get();
                $aryResponse['status'] = 'success';
                $aryResponse['favdata']= $favdata;
            } 
        }
        return response()->json(['data'=>$aryResponse],200);
    }

    function addtofavcart(Request $request)
    {
        $token = $request->header('x-authorization');
        $user_token = str_replace('Bearer ','',$token);
        $userSession = self::checkSession($user_token);
        $aryResponse = array();
        if($userSession)
        {
            $loginData = CsUsers::where('user_token',$user_token)->first();
            $check = CsUserFavProduct::where('ufp_user_id',$loginData->user_id)->where('ufp_product_id',$request->product_id)->first();
            if(isset($check->ufp_id) && $check->ufp_id>0){
                $aryResponse['status'] = 'success';
            }else{
                $check = new CsUserFavProduct;
                $check->ufp_user_id = $loginData->user_id;
                $check->ufp_product_id = $request->product_id;
                $check->ufp_status = 1;
                $check->save();
                $aryResponse['status'] = 'success';
            }
        }
        return response()->json(['data'=>$aryResponse],200);
    }

	public function userfavdata(request $request)
    {
        $token = $request->header('x-authorization');
        $user_token = str_replace('Bearer ','',$token);
        if(empty($user_token) || $user_token=='null')
        {
            return response()->json(['status' => 'session_expired','message' => 'Session expired'],200);
        }
		$resUserData = CsUsers::where('user_token',$user_token)->first();
		$favdata = CsUserFavProduct::where('ufp_user_id',$resUserData->user_id)->with(['product'])->get();
		return response()->json(['status' => 'success','message' => 'Users Orders fetched Sucessfully','favdata'=>$favdata],200); 
    }

    public function getstatesdata()
    {
        $stateData = CsState::get();
        return response()->json(['status' => 'success','data' => $stateData],200);
    }

    public function getcitydata(request $request)
    {
        $cityData = CsCities::where('state_id',$request->stateid)->get();
        return response()->json(['status' => 'success','data' => $cityData],200);
    }

    public function getallcitydata(request $request)
    {
        $cityData = CsCities::get();
        return response()->json(['status' => 'success','data' => $cityData],200);
    }

	public function getUserAddress(request $request)
    {
		$token = $request->header('x-authorization');
        $user_token = str_replace('Bearer ','',$token);
        if(empty($user_token) || $user_token=='null')
        {
            return response()->json(['status' => 'session_expired','message' => 'Session expired'],200);
        } 
        $userData = CsUsers::where('user_token',$user_token)->first();
		$resAddress = CsUserAddress::where('ua_user_id',$userData->user_id)->get(); 
        return response()->json(['status' => 'success','message' => 'User Data fetched Sucessfully','resUserAddress'=>$resAddress],200);   
    }

    public function removeAddress(request $request)
    {

		$token = $request->header('x-authorization');
        $user_token = str_replace('Bearer ','',$token);
        if(empty($user_token) || $user_token=='null')
        {
            return response()->json(['status' => 'session_expired','message' => 'Session expired'],200);
        } 
		CsUserAddress::where('ua_id',$request->addrid)->delete(); 
        return response()->json(['status' => 'success','message' => 'Address Deleted Sucessfully'],200);   
    }

    public function editAddress(request $request)
    {

		$token = $request->header('x-authorization');
        $user_token = str_replace('Bearer ','',$token);
        if(empty($user_token) || $user_token=='null')
        {
            return response()->json(['status' => 'session_expired','message' => 'Session expired'],200);
        } 
		$addrdata = CsUserAddress::where('ua_id',$request->addrid)->first(); 
        return response()->json(['status' => 'success','data' => $addrdata],200);   
    }

    public function userAddressProcess(request $request)
    {
        $token = $request->header('x-authorization');
        $user_token = str_replace('Bearer ','',$token);
        $userSession = self::checkSession($user_token);
        if($userSession)
        {        
            $loginData = CsUsers::where('user_token',$user_token)->first();
            /* $checkAvailibility = self::checkAvailibility($request->ua_pincode);
            if($checkAvailibility==false){
                return response()->json(['message'=>'error','message' => 'Sorry, we do not ship to this address. Try another one.'],200);  
            } */
            if($request->ua_id>0)
            {
                $add_addr = CsUserAddress::where('ua_id',$request->ua_id)->first();
                if($request->ua_default_address=='1'){
                    CsUserAddress::where('ua_user_id',$loginData->user_id)->update(['ua_default_address'=>0]);
                    $add_addr->ua_default_address=1;
                }else{
                    $add_addr->ua_default_address=0;
                }
            }else{
                $add_addr = new CsUserAddress;
                if($request->ua_default_address=='1')
                {
                    CsUserAddress::where('ua_user_id',$loginData->user_id)->update(['ua_default_address'=>0]);
                    $add_addr->ua_default_address = 1;
                }else{
                    $rowCountData = CsUserAddress::where('ua_user_id',$loginData->user_id)->count();   
                    if($rowCountData>0)
                    {
                        $add_addr->ua_default_address = 0;
                    }else{
                        $add_addr->ua_default_address = 1;
                    }
                }
            }
            if(!empty($request->ua_state_id)){
                $add_addr->ua_state_id = $request->ua_state_id;
                $stateData = CsState::where('state_id',$request->ua_state_id)->first();
                if(!empty($stateData))
                {
                    $add_addr->ua_state_name = $stateData->state_name;  

                }
            }else if(!empty($request->ua_state_name))
            {
                $add_addr->ua_state_name = $request->ua_state_name;   
            }
            if(!empty($request->ua_city_id)){
                $add_addr->ua_city_id = $request->ua_city_id;
                $cityData = CsCities::where('cities_id',$request->ua_city_id)->first();
                if(!empty($cityData))
                {
                    $add_addr->ua_city_name = $cityData->cities_name;  

                }
            }else if(!empty($request->ua_state_name))
            {
                $add_addr->ua_city_name = $request->ua_city_name;  
            }
            $countrydata = CsCountries::where('country_id',$request->ua_country_id)->first();
            $add_addr->ua_country_name = $countrydata->country_name;

            $add_addr->ua_name = $request->ua_name;
            //$add_addr->ua_city_id = $rowPincodeData->pin_city_id;
            $add_addr->ua_area = $request->ua_area;
            $add_addr->ua_pincode = $request->ua_pincode;
            $add_addr->ua_address_type = $request->ua_address_type;
            if(!empty($request->ua_address_type_other))
            {
            $add_addr->ua_address_type_other = $request->ua_address_type_other;
            }
            $add_addr->ua_mobile = $request->ua_mobile;
            $add_addr->ua_house_no = $request->ua_house_no;
            $add_addr->ua_user_id = $loginData->user_id;
            // $add_addr->ua_pin_id = $request->pin_id;
            $add_addr->ua_country_id = $request->ua_country_id;
            if($add_addr->save())
            {
                // $rowDefaultAddress = CsUserAddress::where('ua_user_id',$loginData->user_id)->where('ua_default_address',1)->first(); 
                // $resAddress = CsUserAddress::where('ua_user_id',$loginData->user_id)->where('ua_default_address','!=',1)->get();
                return response()->json(['status' => 'success','message' => 'Address added successfully'],200);
            }else{
                return response()->json(['status' => 'error','message' => 'Address did not add. Please try again'],200);   
            }
        }else{
            return response()->json(['status'=>'session_out','message' => 'Session expired'],200);
        }
    }

    public function getCountryData(request $request)
    {
        $token = $request->header('X-AUTH-TOKEN');
        $userSession = self::checkSession(str_replace('Bearer ','',$token));
        $user_token = str_replace('Bearer ','',$token);
        $aryResponseData = array();
        if($userSession)
        {        
            $data = CsCountries::orderBy('country_name','ASC')->get();
            return response()->json(['status' => 'success','message' => 'Address added successfully','res_country_data' =>$data],200);
        }else{
            return response()->json(['status'=>'session_out','message' => 'Session expired'],200);
        }
    }

    public function checkPincode(request $request){
        if($request->isMethod('post')) 
        {
            $rowPincodeData = CsPincode::where('Pincode',$request->pincode)->first();
            if(isset($rowPincodeData)){
                return response()->json(['status' => 'success','message' => 'Pincode fetched Sucessfully','data' => $rowPincodeData],200);  
            }else{
                return response()->json(['status' => 'error','message' => 'Invalid Pincode'],200);  
            }
        }else{
            return response()->json(['status' => 'error','message' => 'Invalid Method'],200);
        }
    }

	public function getUserOrders(request $request)
    {
		$token = $request->header('x-authorization');
        $user_token = str_replace('Bearer ','',$token);
        if(empty($user_token) || $user_token=='null')
        {
            return response()->json(['status' => 'session_expired','message' => 'Session expired'],200);
        }
		$resUserData = CsUsers::where('user_token',$user_token)->first();
		$orderList = CsTransactions::where('trans_user_id',$resUserData->user_id)->orderBy('trans_id','DESC')->with(['items'])->get();
		$orderStatus = array('1'=>'Confirmed','Pending payment','On hold','Delivered','Cancelled','Shipped','Item Picked Up');
		foreach($orderList as $value){
                $orderItemCount = CsTransactionDetails::where('td_trans_id',$value->trans_id)->count();
                $value['orderstatus'] = $orderStatus[$value->trans_status];
                $value['itemscount'] = $orderItemCount;
            }
        
        return response()->json(['status' => 'success','message' => 'Users Orders fetched Sucessfully','orderList'=>$orderList],200);   
    }

	public function getordersdetail(Request $request)
    {
        $token = $request->header('x-authorization');
        $user_token = str_replace('Bearer ','',$token);
        $userSession = self::checkSession($user_token);
        if($userSession)
        {
            $rowOrdersData['item_sub_total'] = 0; 
            $resUserData = CsUsers::where('user_token',$user_token)->first();
            $rowOrdersData = CsTransactions::where('trans_user_id', $resUserData->user_id)->where('trans_order_number', $request->trans_id)->with(['items'])->first();
            $orderStatus = array('1'=>'Confirmed','Pending payment','On hold','Delivered','Cancelled','Shipped','Item Picked Up');			
            $rowOrdersData['orderstatus'] = $orderStatus[$rowOrdersData->trans_status];
            $resOrderItemCount = CsTransactionDetails::where('td_trans_id',$rowOrdersData->trans_id)->count();
            $rowOrdersData['itemscount'] = $resOrderItemCount;
            $resOrderItem = CsTransactionDetails::where('td_trans_id',$rowOrdersData->trans_id)->get();
            foreach($resOrderItem as $value){
                $rowOrdersData['item_sub_total'] += $value->td_item_net_price * $value->td_item_qty;;
            }
            return response()->json(['status'=>'success','message' => 'Data fetched successfully','row_orders_data' =>$rowOrdersData],200);
        }else{
            return response()->json(['status' => 'session_expired','message' => 'Session expired'],200);
        }
    }

    public function currencyrates(Request $request)
    {
        $rowCurrencyRates = CsCurrencyRates::where('cr_currency_select',$request->selectedValue)->first();
        return response()->json(['status'=>'success','rowCurrencyRates' =>$rowCurrencyRates],200);
    }

    public function currency(Request $request)
    {
        $rowCurrency = CsCurrency::first();
        $rowCurrencyRates = CsCurrencyRates::where('cr_currency_select',$rowCurrency->currency_name)->first();
        return response()->json(['status'=>'success','rowCurrencyRates' =>$rowCurrencyRates,'rowCurrency' =>$rowCurrency],200);
    }
}