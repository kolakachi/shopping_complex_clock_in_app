@extends('store.storecontrols')
@section('details')
	  <section class="section-padding">
	    <div class="jumbotron text-center">
	    @if($message)
	         <p style="color: red;">{{$message}}</p>
            @endif

	       @if($store)
           <table cellspacing="0"  border="0" class="data" style="margin: 10px auto; border:1px solid #333;">
		     <tr>
		       <td>Store Number</td>
		       <td>Store Status</td>
		       <td>Time of Last Activity</td>
		       <td>Action</td>
		     </tr>
		     @foreach($store as $storez)
		       <tr>
		         <td>{{$storez->number}}</td>
		         @if($storez->status=='closed')
		           <td style="color: red !important;">{{$storez->status}}</td>
		         @else
		           <td style="color: green !important;">{{$storez->status}}</td>
		         @endif
		         <td>{{$storez->new_activity}}</td>
		         <td>
		           @if($storez->status=='closed')
		             <form action="/open" method="post" class="col-md-10 col-md-push-1">
		                 {!! csrf_field() !!}
		               <div>
		                 <input type="hidden" name="storeid" value="{{$storez->number}}">
		                 <input type="submit" class="btn btn-danger" name="open" value="open">
		               </div>
		             </form>
		          @else
	        
	              <form action="close" method="post" class="col-md-10 col-md-push-1">
	                    {!! csrf_field() !!}
	                <div>
	                  <input type="hidden" name="storeid" value="{{$storez->number}}">
	                  <input type="submit" class="btn btn-danger" name="close" value="close">
	                </div>
	              </form>
	            </td>
	           @endif
	          </tr>
	         @endforeach
	       </table>

	     <div>{{$store->links()}}</div>
	     @endif
	    </div>
      </section>
  </div>
@stop