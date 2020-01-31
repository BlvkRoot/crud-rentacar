<?php 
  // $_SESSION['username'] = 'Admin';
  require("header.php");
?>
<div class="row">
        <form action="create" method="POST" id="car_form" class="col 12">
             
          <input type="hidden" name="id" value="save">
          <div class="row">
            <div class="input-field">
              <input type="text" name="plateNumber" placeholder="Plate Number" id="plateNumber" class="input_field white-text">
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
                        <button class="btn" id="saveBtn">Salvar</button>
                        <button class="btn red lighten" onclick="return confirm('Do you wish to cancel?')"><a href="store" class="white-text">Cancelar</a></button>
              </div>
          </div>
        </form>
      </div>
  <script src="../Assets/js/validation.js"></script>