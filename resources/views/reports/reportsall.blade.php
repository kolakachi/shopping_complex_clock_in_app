@extends('reports.reportcontrols')
@section('details')
   <div class="container">
    <section class="section-padding">
     <div class="jumbotron text-center">
    @if($message=='No report for the chosen date/store number.' || $message=='No reports for today.')
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
      @if($message=='0' || $message=='No reports for today.')
       <div>{{$activities->links()}}</div>
      @else
      <div>{{$activities->appends(array('storeid'=>$storeid,'from'=>$storedate,'to'=>$storedate1))->links()}}</div>
      @endif
   </div>
   </section>
   </div>
@stop

