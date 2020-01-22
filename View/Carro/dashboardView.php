<?php 
  // $_SESSION['username'] = 'Admin';
  require("header.php");
?>
<?php if(isset($_SESSION['username']) == 'Admin'){?>
    <h2 style="text-align: center;">Admin Panel</h2>
    <!-- Listing of cars will go here -->
      <table class="responsive-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Color</th>
            <th>Action</th>
          </tr>
        </thead>
        
      </table>
      
  

  <div class="row">
    
    <form action="" method="POST" class="col s12" name="manage_cars" id="manage_car_form">
	<input type="hidden" id="car_id" name="car_id" value=""/>
      <table class="striped">
	  <?php foreach($params as $car)  { ?>
        <tr>
          <td style='width: 40%; padding: 10px; '><?= $car['name']?></td>
          <td style='width: 35%; padding: 10px;'><?= $car['color']?></td>
          <td style='padding: 10px;'>
              <div name="editBtn" class="btn blue lighten" onclick="_editar(<?= $car['id'] ?>)" id="editBtnx">
                  <span>Edit</span>
              </div>
              <div class="btn red lighten" onclick="_remover(<?= $car['id'] ?>, '<?= $car['name']?>')" id="deleteBtnx">
                <span>Delete</span>
              </div>
          </td>
        </tr>
		<?php   } ?>
      </table>
    </form>
  </div>
    
    

    <div class="row">
		
	
      <form action="create" method="POST" id="car_form" class="col 12 offset-m4">
	       
        <input type="hidden" name="id" value="save">
        <div class="row">
          <div class="input-field">
            <input type="text" name="plateNumber" placeholder="Plate Number" id="plateNumber" class="input_field">
            <p class="error">Please enter a valid plate number</p>
        </div>
        </div>
        <div class="row">
            <div class="input-field"> 
              <input type="text" name="name" placeholder="Name" id="name" value=""  class="input_field">
              <p class="error">Car name invalid</p>
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <input type="text" name="color" placeholder="Color" id="color" value="" class="input_field">
                <p class="error">Color invalid</p>
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <input type="text" name="status" placeholder="Status" value=''  id="status" class="input_field">
                <p class="error">Hint: {enter 0 or 1}</p>
            </div>
        </div>
        <div class="row">
            <div class="input-field">
				      <button class="btn" onclick="return validateEmptyFields()">Salvar</button>
            </div>
        </div>
      </form>
    </div>
<?php
  }else{
    var_dump("Please login"); die();
  }    
?>
<script src="../Assets/js/main.js"></script>
<script src="../Assets/js/validation.js"></script>
<!-- MESSAGES -->
<?php 
  // $notify = new Notification();
  // $notify->messages();
?>
