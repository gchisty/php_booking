<?PHP
include('header.php');
if (!empty($_SESSION['room_id']) && $_SESSION['action'] == "update"){
    $data = selectalldatabyid("rooms","room_id",$_SESSION['room_id']);
    $ficility = explode(",",$data['facility']);
}else{
    $data = null;
    unset($_SESSION['room_id']);
    unset($_SESSION['error']);
    unset($_SESSION['action']);
}?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <h3>Add Your New Hotel Here</h3>

        <?php
        if (!empty($_SESSION['error'])) {
            echo $_SESSION['error'];
        }
        ?>
    <form method="POST" role="form" id="form" action="validate.php" enctype="multipart/form-data">
       <input type="hidden" class="form-control" name="room_id" value="<?=$data['room_id']?>">

        <div class="row">
            <label></i>Room City Id:</label>
            <select class="form-control" name="room_city_id">
                <option value="Los Angeles">Los Angeles</option>
                <option value="San Francisco">San Francisco</option>
                <option value="Santa Diego">Santa Diego</option>
                <option value="Modesto">Modesto</option>
                <option value="Beverly Hills">Beverly Hills</option>
            </select>
        </div>
        <br>
        <div class="row">
            <label>Room No:</label>
            <input id="room_no" type="text" class="form-control" name="room_no" value="<?=$data['room_no']?>">
        </div>
         </br>
        <div class="row">
            <label>Room Image:</label>
            <input id="image" type="file" class="form-control" name="image">
        </div>
        </br>
         <div class="row">
            <label></i>Room Type:</label>
            <select id="room_type" type="text" class="form-control" name="room_type">
                <option value="Deluxe Guest Room">Deluxe Guest Room</option><?=$data['room_type']?>
                <option value="Superior Guest Room">Superior Guest Room</option>
                <option value="Club Level Guest Room">Club Level Guest Room</option>
                <option value="Single Guest Room">Single Guest Room</option>
                <option value="Junior Guest Room">Junior Guest Room</option>
            </select>
        </div>
        </br>
        <div class="row">
            <label></i>Capacity:</label>
            <select id="capacity" type="text" class="form-control" name="capacity">
                <option value="2">2</option><?=$data['capacity']?>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>
        <br>
        <div class="row">
            <label>Rent:</label>
            <input id="rent" type="text" class="form-control" name="rent" value="<?=$data['rent']?>">
        </div>
        <br>
        
        <div class="row">
            <label></i>Facility:</label><br>
            <input type="checkbox" name="facility[]" value="Loundry" <?php if(is_array($data)){if(in_array("Loundry",$ficility,strict)){echo "checked";}}?> >Loundry<br>
            <input type="checkbox" name="facility[]" value="Wi-Fi" <?php if(is_array($data)){if(in_array("Wi-Fi",$ficility,strict)){echo "checked";}}?>>Wi-Fi<br>
            <input type="checkbox" name="facility[]" value="Food" <?php if(is_array($data)){if(in_array("Food",$ficility,strict)){echo "checked";}}?>>Food<br>
            <input type="checkbox" name="facility[]" value="Room Service" <?php if(is_array($data)){if(in_array("Room Service",$ficility,strict)){echo "checked";}}?>>Room Service<br>
            <input type="checkbox" name="facility[]" value="Hair dryer" <?php if(is_array($data)){if(in_array("Hair dryer",$ficility,strict)){echo "checked";}}?>>Hair dryer<br>
            <input type="checkbox" name="facility[]" value="Iron & ironing board" <?php if(is_array($data)){if(in_array("Iron & ironing board",$ficility,strict)){echo "checked";}}?>>Iron & ironing board<br>
            <input type="checkbox" name="facility[]" value="Aircondition" <?php if(is_array($data)){if(in_array("Aircondition",$ficility,strict)){echo "checked";}}?>>Aircondition<br>
        </div>
        <br>
        <div class="row">
            <label>Booking Status:</label>
            <input id="booking_status" type="text" readonly class="form-control" name="booking_status" value="<?=$data['booking_status']?>">
        </div>
       
        <br>
        <div class="row">
            <label>Room Status:</label>
            <select class="form-control" id="status" name="status">
                <option value="Enable" <?php if($data['status'] === "Enable"){echo "selected";}?>>Enable</option>
                <option value="Disable" <?php if($data['status'] === "Disable"){echo "selected";}?>>Disable</option>
            </select>
        </div>
          <br>
        <div class="row">
            <input type="submit" class="btn btn-success" name="addrooms" value="Submit">
            <button type="button" class="btn btn-danger">Cancel</button>
        </div>
        <div class="clear"></div>
    </form>
    <br>
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>

<?php
   unset($_SESSION['hotel_id']);
   unset($_SESSION['error']);
   unset($_SESSION['action']);

?>
</body>
</html>
