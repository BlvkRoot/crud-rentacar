<?php 
  $_SESSION['username'] = 'Admin';
  require("header.php");
?>
<!-- <link rel="stylesheet" href="../Assets/css/app.css"> -->
<?php if(isset($_SESSION['username']) == 'Admin'){?>
    <h2 style="text-align: center;">Dashboard</h2>
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
      
  
<?php
      foreach($params as $car)
      {
?>
  <div class="row">
    
    <form action="" method="POST" class="col s12" id="manage_car_form" name="manage_cars">
      <table class="striped">
        <tr>
          <input type="hidden" name="car_id" value="<?= $car['id']?>"/>
          <td style='width: 40%; padding: 10px; '><?= $car['name']?></td>
          <td style='width: 35%; padding: 10px;'><?= $car['color']?></td>
          <td style='padding: 10px;'>
              <div name="editBtn" class="btn blue lighten" id="editBtn">
                  <span>Edit</span>
              </div>
              <div class="btn red lighten" id="deleteBtn">
                <span>Delete</span>
              </div>
          </td>
        </tr>
      </table>
    </form>
  </div>
    
    
<?php
      
  }
?>
    <div class="row">
      <form action="store" method="POST" id="car_form" class="col 12 offset-m4">
        <input type="hidden" name="id" value="save">
        <div class="row">
          <div class="input-field">
            <input type="text" name="plateNumber" placeholder="Placa" id="plateNumber">
        </div>
        </div>
        <div class="row">
            <div class="input-field"> 
              <input type="text" name="name" placeholder="Nome" id="name" value=""  >
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <input type="text" name="color" placeholder="Cor" id="color" value="">
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <input type="text" name="status" placeholder="Disponibilidade" value=''  id="status" >
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <div class="btn" onclick="return loginFormValidation()">
                    <span>Salvar<span>
                </div>
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
<!-- MESSAGES -->
<?php 
  // $notify = new Notification();
  // $notify->messages();
?>
