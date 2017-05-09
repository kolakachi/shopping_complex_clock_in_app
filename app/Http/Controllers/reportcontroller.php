<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\store as store;
use App\activity as activity;

class reportcontroller extends Controller
{

    //>....display stores activities function...............................................................>

    public function todayreports() 
	{

		$date=Date('d');//get todays date.
		$activity=new activity;//new activity instance.
		$activities=$activity::whereDay('date','=',date($date))->paginate(10);//get the days report.
		if(count($activities)>0)//if there are reports for the day.
		{
			$message='0';
		    $data=array('activities'=>$activities,'message'=>$message);
			return view('reports.reportsall',$data);//disp reports.
		}
        else
        {
           $message='No reports for today.';
           $data=array('activities'=>$activities,'message'=>$message);
           return view('reports.reportsall',$data);//disp message if no report to disp.
       }
    }

    //<....end of display stores activities function........................................................<

    //>....display daily store reports function...............................................................>

    public function daily() 
	{
        $storeid=\Request::get('storeid');//get the desired store id.
        $storedate=\Request::get('date');//get the desired date.
        $datetime=new \DateTime($storedate);
        $date=$datetime->format('d');//get the desired format.
        $activity=new activity;//new activity instance.
        $activities=$activity::whereDay('date','=',date($date))->where('store','=',$storeid)->paginate(10);//get the reports.
        if(count($activities)>0)//if the desired report exists.
		{
            $message='';
		    return \View::make('reports.reports',compact('activities','storeid','storedate','message'));//disp report.
		}
        else{
           $message='No report for the chosen date/store number.'; 
           return \View::make('reports.reports',compact('activities','storeid','storedate','message'));//disp message if no report to disp.
        }
    }

    //<....end of display daily store reports function........................................................<

    //>....display weekly store report function...............................................................>

    public function weekly(Request $request) 
	{
        $storeid=\Request::get('storeid');//get the desired store id.
        $storedate=\Request::get('from');//get the desired start date.
        $storedate1=\Request::get('to');//get the desired end date.
        $datetime1=new \DateTime($storedate);
        $date1=$datetime1->format('y-m-d');//get the desired format.
        $datetime2=new \DateTime($storedate1);
        $date2=$datetime2->format('y-m-d');
        $activity=new activity;//new activity instance.
        $stor=new store;//new store instance.
        $store=$stor::where('number','=',$storeid)->first();//get the store.
        $activities=$activity::where('store','=',$storeid)->whereBetween('date',[date($date1),date($date2)])->paginate(10);//get the report.
		if($store && count($activities)>0)//if the desired report exists.
		{
			$message='';
		    return \View::make('reports.reportsall',compact('activities','storeid','storedate','storedate1','message'));//disp report.
		}
        else{
            $message='No report for the chosen date/store number.'; 
            return \View::make('reports.reportsall',compact('activities','storeid','storedate','storedate1','message'));//disp message if no report.
        }
    }

    //<....end of display weekly report function........................................................<

    //>....display monthly store report function...............................................................>

    public function monthly() 
	{
        $storeid=\Request::get('storeid');//get desired store number.
        $storedate=\Request::get('date');//get desired date.
        $datetime=new \DateTime($storedate);
        $date=$datetime->format('m');//get desired format.
        $activity=new activity;//new activity instance.
        $stor=new store;//new store instance.
        $store=$stor::where('number','=',$storeid)->first();//get the store.
        $activities=$activity::where('store','=',$storeid)->whereMonth('date','=',date($date))->paginate(10);//get desired report.
            
        if($store && count($activities)>0)//check if store number or report is available.
        {
            $message='';
            return \View::make('reports.reports',compact('activities','storeid','storedate','message'));//disp report.
        }
        else{
           $message='No report for the chosen date/store number.'; 
           return \View::make('reports.reports',compact('activities','storeid','storedate','message'));//disp message if no report to disp.
        }
    }

    //<....end of monthly report function........................................................<

    //>....display yearly store report function...............................................................>

    public function yearly() 
	{

		$storeid=\Request::get('storeid');//get the desired store id.
        $storedate=\Request::get('date');//get the desired date.
        $datetime=new \DateTime($storedate);
        $date=$datetime->format('Y');//get the desired format.
        $activity=new activity;//new activity instance.
        $stor=new store;//new store instance.
        $store=$stor::where('number','=',$storeid)->first();//get the store.
        $activities=$activity::where('store','=',$storeid)->whereYear('date','=',date($date))->paginate(10);//get the desired report.
		if($store && count($activities)>0)//if the desired store and report exists.
        {
            $message='';
            return \View::make('reports.reports',compact('activities','storeid','storedate','message'));//disp report.
        }
        else{
           $message='No report for the chosen date/store number.'; 
           return \View::make('reports.reports',compact('activities','storeid','storedate','message'));//disp message if no report to disp.
        }
    }

    //<....end ofdisplay yearly report function function........................................................< 
}
