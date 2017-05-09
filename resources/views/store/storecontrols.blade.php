@extends('layouts.layout')
@section('content')
  <div class="clear"></div>
  <div class="container ">
	  <section class="querybox section-padding">
	  <h1 style="text-align: center; color:#378;">Manage Store status</h1>
	       
	    <table>
	      <tr>
		    <td>
			    <div class="displayall">
			      <form action="{{ route('displayall') }}" method="post" role="form" class="col-md-10 col-md-push-1">
			              {!! csrf_field() !!}
			        <table>
			          <thead>
			            <tr>
			             <td><h6>Display All</h6></td>
			             <td></td>
			            </tr>
			          </thead>
			          <tbody>
			          	<tr>
			          		<td>
			          		  <select class="form-control" name="status">
			                    <option>All</option>
			                    <option>Opened</option>
			                    <option>Closed</option>
			                  </select>
			          		</td>
			          		<td><input id="button" type="submit" value="Display" class="form-control"></td>
			          	</tr>
			          </tbody>
			        </table>
			      </form>
				</div>
		    </td>
		  
		    <td>
		        <div>
			      <form action="search" method="post" role="form" class="col-md-10 col-md-push-1">
			              {!! csrf_field() !!}
			        <table>
			          <thead>
			            <tr>
			             <td><h6>Display a Store Status</h6></td>
			             <td></td>
			            </tr>
			          </thead>
			          <tbody>
			          	<tr>
			          		<td>
			          		  <input type="Number" placeholder="Store Number" class="form-control input-sm" name="storeid" required/>
			          		</td>
			          		<td><input id="button" type="submit" value="Search" class="form-control"></td>
			          	</tr>
			          </tbody>
			        </table>
			      </form>
		        </div>
		    </td>
		  </tr>

		  <tr>
		    <td>
			    <div class="displayall">
			      <form action="/singlestatus" method="post" role="form" class="col-md-10 col-md-push-1">
			              {!! csrf_field() !!}
			        <table>
			          <thead>
			            <tr>
			             <td><h6>Change single store</h6></td>
			             <td></td>
			            </tr>
			          </thead>
			          <tbody>
			          	<tr>
			          		<td>
			          		  <input type="Number" placeholder="Store Number" class="form-control input-sm" name="storeid" required/>
				              <div class="radio">
							    <label>
							      <input type="radio" name="open" id="optionsRadios1"
							        value="open" checked> Open
							    </label>
							  </div>
							  <div class="radio">
							    <label>
							      <input type="radio" name="open" id="optionsRadios2"
							       value="close">
							        Close
							    </label>
							  </div>
			          		</td>
			          		<td><input id="button" type="submit" value="Change" class="form-control"></td>
			          	</tr>
			          </tbody>
			        </table>
			      </form>
				</div>
		    </td>
		  
		    <td>
		        <div>
			      <form action="/multiplestatus" method="post" role="form" class="col-md-10 col-md-push-1">
			              {!! csrf_field() !!}
			        <table>
			          <thead>
			            <tr>
			             <td><h6>Change Multiple Stores</h6></td>
			             <td></td>
			            </tr>
			          </thead>
			          <tbody>
			          	<tr>
			          		<td>
			          		  <input type="Number" placeholder="From Number" class="form-control input-sm" name="from" style="margin-bottom: 9px;" required/>
			          		  <input type="Number" placeholder="To Number" class="form-control input-sm" name="to" required/>
			          		  <div class="radio">
							    <label>
							      <input type="radio" name="open" id="optionsRadios1"
							        value="open" checked> Open
							    </label>
							  </div>
							  <div class="radio">
							    <label>
							      <input type="radio" name="open" id="optionsRadios2"
							       value="close">
							        Close
							    </label>
							  </div>
			          		</td>
			          		<td><input id="button" type="submit" value="Change" class="form-control"></td>
			          	</tr>
			          </tbody>
			        </table>
			      </form>
		        </div>
		    </td>
		  </tr>
		</table>
	  </section>
	  @yield('details')
@stop