@extends('layouts.layout')
@section('content')
  <div class="clear"></div>
  <div class="container ">
	  <section class="querybox section-padding">
	    <h1 style="text-align: center; color:#378;">Manage Store Reports</h1>
	    <table>
	      <tr>
		    <td>
			    <div class="displayall">
			      <form action="/daily" method="get" role="form" class="col-md-10 col-md-push-1">
			              {!! csrf_field() !!}
			        <table>
			          <thead>
			            <tr>
			             <td><h6>Daily Report</h6></td>
			             <td></td>
			            </tr>
			          </thead>
			          <tbody>
			          	<tr>
			          		<td>
			          		  <input type="Number" placeholder="Store Number" class="form-control input-sm" name="storeid" style="margin-bottom: 5px;" required/>
			          		  <input type="date" placeholder="from" class="form-control input-sm" name="date" style="margin-bottom: 5px;" required/>
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
			      <form action="/monthly" method="get" role="form">
			              {!! csrf_field() !!}
			        <table>
			          <thead>
			            <tr>
			             <td><h6>Monthly Report</h6></td>
			             <td></td>
			            </tr>
			          </thead>
			          <tbody>
			          	<tr>
			          		<td>
			          		  <input type="Number" placeholder="Store Number" class="form-control input-sm" name="storeid" style="margin-bottom: 5px;" required/>
			          		  <input type="month" class="form-control input-sm" name="date" style="margin-bottom: 5px;" required/>
			          		  
			          		</td>
			          		<td><input id="button" type="submit" value="Display" class="form-control"></td>
			          	</tr>
			          </tbody>
			        </table>
			      </form>
		        </div>
		    </td>
		  </tr>

		  <tr>
		    <td>
			    <div class="/weekly">
			      <form action="/weekly" method="get" role="form" class="col-md-10 col-md-push-1">
			              {!! csrf_field() !!}
			        <table>
			          <thead>
			            <tr>
			             <td><h6>Weekly Report</h6></td>
			             <td></td>
			            </tr>
			          </thead>
			          <tbody>
			          	<tr>
			          		<td>
			          		  <input type="Number" placeholder="Store Number" class="form-control input-sm" name="storeid" style="margin-bottom: 5px;" required/>
			          		  <input type="date"  class="form-control input-sm" name="from" style="margin-bottom: 5px;" required/>
				              <input type="date"  class="form-control input-sm" name="to" required/>
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
			      <form action="/yearly" method="get" role="form" class="col-md-10 col-md-push-1">
			              {!! csrf_field() !!}
			        <table>
			          <thead>
			            <tr>
			             <td><h6>Yearly Report</h6></td>
			             <td></td>
			            </tr>
			          </thead>
			          <tbody>
			          	<tr>
			          		<td>
			          		  <input type="Number" placeholder="Store Number" class="form-control input-sm" name="storeid" style="margin-bottom: 9px;" required/>
			          		  <input type="Number" placeholder="Year" class="form-control input-sm" name="date" required/>
			          		</td>
			          		<td><input id="button" type="submit" value="Display" class="form-control"></td>
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