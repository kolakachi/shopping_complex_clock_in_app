<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\store as store;
use App\activity as activity;
use App\User as cuser;
use Validator,Input,Redirect;

class storecontroller extends Controller
{
	//>.....login check for homepage.................................................................>
	public function check()
	{
		
		if(Auth::check())//check if the user is logged in.
		{
             return redirect('home');//redirect to home.
		}
		else 
		 {
			$currentusers= new cuser;
			$users=$currentusers::all();//check if theres a user in the database.
			$numofusers=count($users);
			if($numofusers>0)//if true
			{
				return view('auth\login');//redirect to login page.

			}
			else{
				return view('auth\registers');//redirect to register page.
			}
		}
    }
    //<.....end of login check for homepage...........................................................<

    //>....function to logout user....................................................................>
	public function logout()
	{
        Auth::logout();
        return redirect('/');
    }
    //<....end of function to logout user.............................................................<




	//>....function to paginate store status display...................................................>
	public function paging()
	{
        $stores=new store;
        $store=$stores::paginate(10);
        $message='';
        $data=array('store'=>$store,'message'=>$message);
		return view('store\stores',$data);
    }

    //<....end of function to paginate store status display............................................<
    
    
    //>....store open function.........................................................................>
    
    public function open(Request $request) 
	{
		$input=$request->all();//get user input.
		$activity=new activity;//new activity instance.
		$stor=new store;//new store instance.
		$store=$stor::where('number','=',$input['storeid'])->first();//get the store.
		if($store->status=='opened')
		{
			$store='';
			$message='This store is already opened.';
			$data=array('store'=>$store,'message'=>$message);
			return view('store\stores',$data);
        }
        else{
        	$store->status='opened';//change store status to open.
			$store->prev_activity=$store->new_activity;//store prev new activity in prev activity
			$store->new_activity=date('h:i:s');//set new activity time to present input time.
			$store->save();

			$activity->activity='opened';//set activity to opened.
			$activity->store=$input['storeid'];//set store to input number.
			$activity->time=date('h:i:s');//set activity time.
			$activity->date=date('y:m:d');//set activit date.
			$activity->save();
			return redirect('/');
        }
	}

    //<....end store open function......................................................................<
    
    
    //>....store closed function........................................................................>
   
    public function close(Request $request) 
	{
		$input=$request->all();//get user inputs.
		$activity=new activity;//new activity instance.
		$stor=new store;//new store instance.
		$store=$stor::where('number','=',$input['storeid'])->first();//get the store id.

		if($store->status=='closed')
		{
			$store='';
			$message='This store is already closed.';
			$data=array('store'=>$store,'message'=>$message);
			return view('store\stores',$data);
        }
        else
        {
			$store->status='closed';//change store status to closed.
			$store->prev_activity=$store->new_activity;//store prev new activity in prev activity.
			$store->new_activity=date('h:i:s');//set new activity time to present 
			$store->save();

			$activity->activity='closed';//change activity to closed.
			$activity->store=$input['storeid'];//set store to input number.
			$activity->time=date('h:i:s');//set activity time.
			$activity->date=date('y:m:d');
			$activity->save();//set activit date.
			return redirect('/');
		}
    }
    
    //<....end store closed function....................................................................<

    
    //>....display stores and status....................................................................>
    

    public function displayall(Request $request)  
	{
		$input=$request->all();//get user input.
		$stor=new store;//new store instance.
		
		switch ($input['status']) {//test for user choice.
			case 'All'://if choice==All.
				$store=$stor::paginate(10);//get All stores.
                $message='';
                $data=array('store'=>$store,'message'=>$message);
		        return view('store\stores',$data);
			
			case 'Opened'://if choice==Open.
				$store=$stor::where('status','=','opened')->paginate(10);//get all Open stores.
		        $message='';
                $data=array('store'=>$store,'message'=>$message);
		        return view('store\stores',$data);

            case 'Closed'://if choice==Closed.
				$store=$stor::where('status','=','closed')->paginate(10);//get all Closed stores.
		        $message='';
                $data=array('store'=>$store,'message'=>$message);
		        return view('store\stores',$data);
		    }
    }

    //<....end of display stores activities function........................................................<

    //>....display search stores and status function.........................................................>

    public function search(Request $request) 
	{
		$input=$request->all();//get user input.
		$stor=new store;//new store instance.
		$store=$stor::where('number','=',$input['storeid'])->first();//get the store id.
		if($store)
		{
			$store=$stor::where('number','=',$input['storeid'])->paginate(10);
			$message='';
			$data=array('store'=>$store,'message'=>$message);
			return view('store\stores',$data);
		}
		else
		{
			$store='';
			$message='No store with that number in the complex.';
			$data=array('store'=>$store,'message'=>$message);
			return view('store\stores',$data);
		}
    }

    //<....end of display search stores and status function...................................................<

    //>....display single store and status function............................................................>

    public function singlestatus(Request $request)  
	{
		$input=$request->all();//get user input.
		$stor=new store;//new store instance.
		$store=$stor::where('number','=',$input['storeid'])->first();
		if($store)
		{
			if($input['open']=='open') //if option==open. 
			{
	            return $this->open($request);
			}
	        else
	        {
	        	return $this->close($request);
	        }
        }
        else
		{
			$store='';
			$message='No store with that number in the complex.';
			$data=array('store'=>$store,'message'=>$message);
			return view('store\stores',$data);
		}
	}

	//<....display single store and status function............................................................<

	//>....display single store and status function............................................................>

    public function multiplestatus(Request $request)  
	{
		$input=$request->all();//get user input.
		
		$stor=new store;
        $start=$stor::where('number','=',$input['from'])->first();
        $end=$stor::where('number','=',$input['to'])->first();
		if(($start && $end) && ($input['from']<$input['to']))
		{
			if($input['open']=='open') //if option==open. 
			{
	            for($i=$input['from']; $i<=$input['to']; $i++)
	            {
	            	$activity=new activity;//new activity instance.
	            	$store=$stor::where('number','=',$i)->first();//get the store.
                    if($store->status=='closed')
		            {
		            	
						$store->status='opened';//change store status to open.
						$store->prev_activity=$store->new_activity;//store prev new activity in prev activity
						$store->new_activity=date('h:i:s');//set new activity time to present input time.
						$store->save();

						$activity->activity='opened';//set activity to opened.
						$activity->store=$i;//set store to input number.
						$activity->time=date('h:i:s');//set activity time.
						$activity->date=date('y:m:d');//set activit date.
						$activity->save();
				    }
				}
				return redirect('/');
			}
	        else
	        {
	        	for($i=$input['from']; $i<=$input['to']; $i++)
	            {
	            	$activity=new activity;//new activity instance.
	            	$store=$stor::where('number','=',$i)->first();//get the store id.
	            	if($store->status=='opened')
		            {
						$store->status='closed';//change store status to closed.
						$store->prev_activity=$store->new_activity;//store prev new activity in prev activity.
						$store->new_activity=date('h:i:s');//set new activity time to present 
						$store->save();
                        
						$activity->activity='closed';//change activity to closed.
						$activity->store=$i;//set store to input number.
						$activity->time=date('h:i:s');//set activity time.
						$activity->date=date('y:m:d');
						$activity->save();//set activit date.
					}
				}
				return redirect('/');
	        }
        }
        else
		{
			$store='';
			$message="Either the 'FROM' or the 'TO' is not a store number in the complex or check if 'TO' is greater than 'FROM' . Try again";
			$data=array('store'=>$store,'message'=>$message);
			return view('store\stores',$data);
		}
	}

	//<....display single store and status function...............................................................<



}
