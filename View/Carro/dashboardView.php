<?php 
  $_SESSION['username'] = 'Admin';
  require("header.php");
?>
<?php if(isset($_SESSION['username']) == 'Admin'){?>
  <div class="container">
    <h2 style="text-align: center;">Admin Panel</h2>

    <div class="right-align">
          <button class="btn" ><a href="createCar" class="white-text" >Adicionar</a></button>
  </div>
    <!-- Listing of cars will go here -->
  <div class="row">  
    <form action="" method="POST" class="col s12" name="manage_cars" id="manage_car_form">
    <input type="hidden" id="car_id" name="car_id" value=""/>
        <table class="striped white-text">
        <thead>
          <tr >
            <th>Name</th>
            <th>Color</th>
            <th>Action</th>
          </tr>
        </thead>
      <?php foreach($params as $car)  { ?>
          <tr>
            <td><?= $car['name']?></td>
            <td><?= $car['color']?></td>
            <td >
                <div name="editBtn" class="btn blue lighten" onclick="edit(<?= $car['id'] ?>)">
                    <span>Edit</span>
                </div>
                <div class="btn red lighten" onclick="remove(<?= $car['id'] ?>, '<?= $car['name']?>')">
                  <span>Delete</span>
                </div>
            </td>
          </tr>
      <?php   } ?>
        </table>
      </form>
  </div>
  <div class="center-align">
    <ul>
      <li>
<?php
        echo $previous . ' ' . $next;
  }else{
        var_dump("Please login"); die();
  }    
?>
    </li>
  </ul>
</div>
</div>
<script src="../Assets/js/main.js"></script>

