        <div class="card">
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Product Image</th>
                    <th>Product Code</th>
                    <th>Product Price</th>
                  </tr>
                </thead>

                <tbody>
                  <?php

                   foreach($records as $r){
                    ?>
                    <tr>
                      <td><img src="<?php echo $r['featuredPhoto'];?>" width=100px height=100px></td>
                      <td><?php echo $r['productCode'];?></td>
                      <td><?php echo "₹ " . $r['productPrice'];?></td>
                    </tr>

                    <?php
                   }?>
                </tbody>
              </table>
            </div>







</div>
