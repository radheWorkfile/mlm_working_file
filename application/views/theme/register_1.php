<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap demo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

	<style>
	.par-div{position: relative;}
    .img-ani {position: absolute;top: -2rem;height: 9rem;left: 20rem;animation: move 2.5s linear infinite;}
	@keyframes move
	        {0% {transform: translate(-15px, 0px);}
			50% {transform: translate(0px, -15px);}
			100% {transform: translate(-15px, 0px);}}

input{ width: 100%;padding: 15px; margin:5px 0 22px 0;display: inline-block;border: none;background: #f1f1f1;}
input:focus {background-color: #ddd;outline: none;}
hr {border: 1px solid #f1f1f1;margin-bottom: 25px;}
.registerbtn {background-color: #04AA6D;color: white;padding: 16px 20px;margin: 8px 0; border: none;cursor: pointer;width: 100%;opacity: 0.9;}
.registerbtn:hover {opacity: 1;}
a {color: dodgerblue;}
.signin {background-color: #f1f1f1;
  text-align: center;
}
	</style>

	<div class="container par-div">
		<div class="row">
			<div class="col-md-6">
				<img src="<?php echo base_url(); ?>media/reg-img.png" alt="">
				<img src="<?php echo base_url(); ?>media/reg-img_1.png" alt="" class="img-ani">
			</div>
			<div class="col-md-6">
				<div class="">
				    <?php if (config_item('disable_registration') !== "Yes") { ?>
					<?php echo form_open() ?>
					<h1 style="color:#fe7200;">Register</h1>
					<p>Please fill in this form to create an account.</p><hr>
					<div id="load" style="display:none !important; margin:2% 0%;text-align:center;">
                    <img src="<?php echo site_url('uploads/load.gif') ?>" max-width="50%">
					<h3 style="color:lightseagreen">Registering...</h3>
					</div>
                     
					<div class="row" id="form">
					<?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
					<?php echo $this->session->flashdata('site_flash') ?>

							<div class="col-md-6">
							<label for="email"><b>Name</b></label>
							<input type="text" id="name" name="name" value="<?php echo set_value('name') ?>" placeholder="Enter Name">
							</div>

							<div class="col-md-6">
							<label for="email"><b>Mobile Number</b></label>
							<input type="text" id="phone" name="phone" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" maxlength="10" value="<?php echo set_value('phone') ?>"  placeholder="Enter Mobile Number">
							</div>

							<div class="col-md-12">
							<label for="email"><b>Email ID</b></label>
							<input type="text" name="email" id="email" value="<?php echo set_value('email')?>" placeholder="Enter Email-ID">
							</div>

							<div class="col-md-12">
							<label for="email"><b>Address</b></label>
							<input type="text" name="address_1" id="address_1" value="<?php echo set_value('address_1')?>" placeholder="Enter Address">
							</div>

                            <div class="col-md-6">
							<label for="psw"><b>Password</b></label>
							<input type="password" name="password" id="password" value="<?php echo set_value('password') ?>" placeholder="Enter Password">
							</div>

							<div class="col-md-6">
							<label for="psw-repeat"><b>Repeat Password</b></label>
							<input type="password"  name="password_2" id="password_2" value="<?php echo set_value('password_2') ?>" placeholder="Repeat Password">
						   </div>

						   <div class="col-lg-12"><h5 class="text-info">Joining Information</h5></div>

						    <div class="col-lg-6">
							<div class="form-group">
							<label for="sponsor" class="control-label text-dark" style="font-size: 16px;">Sponsor
							ID<span class="text-danger">*</span></label>
							<input type="text"  onchange="get_user_name('#sponsor', '#spn_res')" 
							value="<?php if ($this->uri->segment(3) !== "epin") {$uri4 = $this->uri->segment(4);};
							echo set_value('sponsor', $uri4) ?>" id="sponsor" name="sponsor" placeholder="Sponsor Id">
							<span id="spn_res" style="color: red; font-weight: bold"></span>
							</div>
							</div>


							
							<div class="col-lg-6">
							<?php if (config_item('enable_epin') == "Yes" && config_item('free_registration') == "Yes") {?>
							<div class="form-group" id="e_pin">
							<label for="epin" class="control-label text-dark" style="font-size: 16px;">e-PIN</label>
							<input type="text" value="<?php if (trim($this->uri->segment(3)) == "epin") {echo set_value('epin', 							$this->uri->segment(4));
							} ?>" placeholder="E-Pin" id="epin" name="epin">
							</div>
							<?php } ?>
							</div>


<div class="col-lg-6">
<?php if (config_item('leg') !== "1" && config_item('show_placement_id') == "Yes" && config_item('autopool_registration') == "No") { ?>
<div class="form-group">
<label for="position" class="control-label text-dark" style="font-size: 16px;">Placement
ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="psn_res"
style="color: red; font-weight: bold"></span></label>
<input type="text" class="form-control" onchange="get_user_name('#position', '#psn_res')" id="position" value="<?php if ($this->uri->segment(3) !== "epin") {$uri4 = $this->uri->segment(4);};
echo set_value('position', $uri4) ?>" name="position" id="position" placeholder="Where you want to place the ID">
</div>
<?php } ?>
</div>


<div class="col-lg-6">
<?php if (config_item('leg') == "1" && config_item('show_placement_id') == "Yes") { ?>
<div class="form-group">
<label for="position" class="control-label text-dark" style="font-size: 16px;">Placement ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="psn_res"
style="color: red; font-weight: bold"></span></label>
<input type="text" class="form-control" onchange="get_user_name('#position', '#psn_res')" id="position" value="<?php if ($this->uri->segment(3) !== "epin") {$uri4 = $this->uri->segment(4);};
echo set_value('position', $uri4) ?>" name="position" placeholder="Where you want to place the ID">
</div>
<?php } ?>
</div>








<div class="col-lg-6">
<?php if (config_item('leg') == "1") {echo form_hidden('leg', 'A');} else {
if (config_item('show_leg_choose') == "Yes" && config_item('autopool_registration') == "No") {?>
<div class="form-group ">
<label for="leg" class="control-label text-dark" style="font-size: 16px;">Position<span class="text-danger">*</span></label>
<select class="form-control" id="leg" name="leg">
<option value="">Select One</option>
<?php $lg = ''; if (trim($this->uri->segment(3)) !== "" && trim($this->uri->segment(3)) !== "epin") {
$lg = trim($this->uri->segment(3));}?>
<?php foreach ($leg as $key => $val) { ?>
<option value="<?php echo $key; ?>" <?php echo ($lg == $key) ? "Selected" : " " ?>><?php echo $val; ?></option>
<?php } ?>
</select>
</div>
<?php } } ?>
</div>


<!-- <div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-7">
<?php //if (config_item('show_join_product') == "Yes") {?>
<div class="form-group col-sm-6">
<label for="product" class="control-label">Sign Up Product / Package</label>
<select class="form-control" id="product" name="product" >
<?php foreach ($products as $val) {echo '<option value="' . $val['id'] . '">' . $val['prod_name'] . '. Price :' . config_item('currency') . number_format($val['prod_price'] + ($val['prod_price'] * $val['gst'] / 100), 2) . ' </option>';
} ?>
</select>
</div>
<?php //} ?>
</div>
</div> -->
<input type="hidden" id="product" name="product" value="1">


<div class="col-lg-6">
<?php if (config_item('show_join_product') == "No" && config_item('free_registration') == "No") { ?>
<div class="form-group " id="amt_to_pay">
<label for="amt_to_pay" class="control-label text-dark" style="font-size: 16px;">Amount You Want to Pay ?</label>
<input type="text" required value="<?php echo set_value('amt_to_pay')?>" class="form-control" id="amt_to_pay" name="amt_to_pay">
</div>
<?php } ?>
</div>


<div class="col-lg-6">
<?php if (config_item('enable_pg') == "Yes" && config_item('free_registration') == "No") {?>
<div class="form-group ">
<label for="epin"class="control-label text-dark"style="font-size: 16px;color: #3a80d7">Payment Gateway</label><br/>
<input type="checkbox" value="yes" id="pg" name="pg"onclick="toogle_div('#e_pin', '#pg')"> I'll Pay Using
Payment Gateway.
</div>
<?php } ?>
</div>

					
							<p class="text-center">Already have an account? <a href="#">Sign in</a>.</p>

							<button type="submit" name="submit" id="submit" onclick="show()" class="registerbtn">Register</button>
						</div>

						
				</div>
				<?php echo form_close(); ?>

                    <?php } else {
					echo "<h3 align='center' style='margin: 10%'> Registration is disabled for maintanance. Please come later.</h3>";
				} ?>
			</div>
		</div>
	</div>






	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>




<script type="text/javascript">
	function toogle_div(id1, id2) {
		if ($(id2).prop("checked") == true) {
			$(id1).hide('slow');
		} else {
			$(id1).show('slow');
		}
	}

	function show() {
		$('#form').hide('slow');
		$('#load').show('slow');
	}

	function get_user_name(id, result) {
		alert(id);
		var id = $(id).val();
		$.get("<?php echo site_url('site/get_user_name/') ?>" + id, function(data) {
			$(result).html(data);
		});
	}
</script>