@extends('reports.reportcontrols')
@section('details')
   <div class="container">
    <section class="section-padding">
     <div class="jumbotron text-center">
   @if($message=='No report for the chosen date/store number.')
   <p style="color: red;">{{$message}}</p>
   @endif
    <table cellspacing="0"  border="0" class="data" style="margin: 10px auto; border:1px solid #333;">
       <tr>
         <td>Store Number</td>
         <td>Activity</td>
         <td>Time of Activity</td>
         <td>Date of Activity</td>
       </tr>
      @foreach($activities as $activity)
       <tr>
         <td>{{$activity->store}}</td>
         @if($activity->activity=='closed')
           <td style="color: red !important;">{{$activity->activity}}</td>
         @else
           <td style="color: green !important;">{{$activity->activity}}</td>
         @endif
         <td>{{$activity->time}}</td>
         <td>{{$activity->date}}</td>
       </tr>
       
      @endforeach
      
    </table>


     <div>{{$activities->appends(array('storeid'=>$storeid,'date'=>$storedate))->links()}}</div>
   </div>
   </section>
   </div>
@stop

