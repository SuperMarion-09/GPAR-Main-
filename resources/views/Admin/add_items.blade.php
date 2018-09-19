@extends('admin.layout.master')

@section('content')
<form action="/admin/event/add_items" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add items</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add items</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Add items</header>
					</div>
					<div class="card-body row">
						<div class="col-lg-6">
							
								<small id="label" class="text-muted">Category</small>
								<select class="form-control" name="category_type"  onchange="show_category(this.value)" arialabelledby="label">
									<option class="" disabled selected="">Category Type</option>
									<option value="services">Services</option>
									<option value="pavilion">Pavilion</option>
									<option value="foods">Foods</option>
									<option value="others">Others</option>
																	
							</select>
							</div>
						</div>
						<div class="card-body row">
						<section id="SF" class="col-lg-12 p-t-20" style="display: none;">
						<div class="col-lg-12 p-t-20"> 
							
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class="mdl-textfield__input" name="item_price" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample2">
								<label class="mdl-textfield__label" for="sample2">Price</label>
								<span class="mdl-textfield__error">Input is not a number!</span>
							</div>
						</div>
						<div class="col-lg-12 p-t-20"> 
							<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class = "mdl-textfield__input" name="item_name" type="text" id = "txtRoomNo">
								<label class = "mdl-textfield__label">Item name</label>
							</div>
						</div>

						<div class="col-lg-12 p-t-20"> 
							<div class = "mdl-textfield mdl-js-textfield txt-full-width">
								<textarea class = "mdl-textfield__input" name="item_description" rows =  "4" 
								id = "" ></textarea>
								<label class = "mdl-textfield__label" for = "text7">Item descrition</label>
							</div>
						</div>
						<input type="hidden" value="{{$events->max_pax}}" name="max_pax" >
						<input type="hidden" value="{{$events->add_price}}" name="add_price">
						<div class="col-lg-12 p-t-20 text-center">
							<label class="control-label col-md-3">Upload Item Photos</label>
							
									<div >
										<input type="file" name="upload">
										
									</div>
									<h3>Drop files here or click to upload.</h3>
									<em>(400 x 300 recommended size in pixels)
									</em>
							
						</div>
						<div class="col-lg-12 p-t-20 text-center"> 
							<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
							<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
						</div>
					</section>
					</form>	
				</div>
				

				<div class="card-body row">
					
					<section id="other" class="col-lg-12 p-t-20" style="display: none;">
						<form method="post" action="/admin/event/update/others">
							{{csrf_field()}}
							
						<div class="col-lg-12 p-t-20"> 

							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class="mdl-textfield__input" value="{{$events->max_pax}}" name="max_pax" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample2">
								<label class="mdl-textfield__label" for="sample2">Minimum Pax in Event & Food</label>
								<span class="mdl-textfield__error">Input is not a number!</span>
							</div>
						</div>
						<div class="col-lg-12 p-t-20"> 
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class="mdl-textfield__input" value="{{$events->add_price}}" name="add_price" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample2">
								<label class="mdl-textfield__label" for="sample2">Add Pax Price</label>
								<span class="mdl-textfield__error">Input is not a number!</span>
							</div>
						</div>
						
						<div class="col-lg-12 p-t-20 text-center"> 
							<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Update</button>
							<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
						</div>

					</section>
					
					</div>
					</form>
						
					
				</div>
			</div>
		</div>
	

<script type="text/javascript">
	function show_category(val)
	{
		if ((val == 'services')||(val == 'foods')||(val == 'pavilion')) 
		{
			$('#SF').show();
			$('#other').hide();
		}
		if(val == 'others')
		{
			$('#SF').hide();
			$('#other').show();	
		}
	}

</script>

		@endsection