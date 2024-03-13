<style>
  .customer li{
      border-bottom: 1px dotted;
      text-transform: capitalize;
      font-size: 20px;
  }
  .bt{
    background-color: green;
    color: white;
    height: 50px;
    width: 150px;
    margin-left: 40px;
    border-radius: 5px;
  }
</style>
<div class="modal fade" id="userModal<?php echo $row['id'];?>">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Order for <?php echo $row['order_id'];?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <?php
         $customerrecords= $db->userDetails($row['userid']);
         if(mysqli_num_rows($customerrecords)==1){
          $customer= mysqli_fetch_assoc($customerrecords);
          $country = $db ->displayCountry($customer['country']);
          $state = $db ->displayState($customer['state']);
          $city = $db ->displayCity($customer['city']);
          ?>
            <div class="card">
              <div class="card-body">
                  <ul class="customer">
                    <li><b>Customer Name :</b> <?php echo $customer['firstName'].' '.$customer['lastName'];?></li>
                    <li><b>Deliver At :</b>
                      <?php echo $customer['address']. $city['name'].','. $state['name'].' '.$country['name'].' '.$customer['pincode'];?>
                    </li>
                    <li><b>Contact Number :</b> <?php echo $customer['contact'];?></li>
                    <li><b>Email </b> : <?php echo $customer['email'];?></li>
                  </ul>

                  <button type = "button" class = "bt">Dispatched Order</button>

              </div>
            </div>
          <?php
         }


        //include "order-item-details.php";?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <p id="statusResult"></p>
      </div>

    </div>
  </div>
</div>

