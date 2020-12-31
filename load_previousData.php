<?php
require 'db_connect.php';


$sql_stmt = 'SELECT * FROM `todo_list`';
$result = $mysqli->query($sql_stmt);
if ($result->num_rows > 0) {
    // print_r($result);

    // $list = array();
    // echo json_encode($result);

    while ($row = $result->fetch_assoc()) {

        echo '
        <div class="row mx-auto">
            <div class="col-md-1 my-3">
             ';
        if ($row['status'] == 'pending') {
            echo '
                  <input type="checkbox"  name="todo" class="checker"  data-id="' . $row['id'] . '"/>
                  </div>
                  <div class="col-md-10 my-2">
                    <h3>' . $row['name'] . '</h3>
                  </div> 
                 ';
        } else if ($row['status'] == 'completed') {
            echo '<input type="checkbox" name="todo" class="checker"  data-id="' . $row['id'] . '"';
            if ($row['status'] == 'completed') {
                echo 'checked="checked" disabled="disabled"';
            }
            echo '/>                    
            </div>
                    <div class="col-md-10 my-2">
                        <h3><del>' . $row['name'] . '</del></h3>
                    </div>
                 ';
        }
        echo '   
            
            <div class="col-md-1 my-3">
                <i class="fas fa-trash-alt delete-box" data-id="' . $row['id'] . '" style="color:red"></i>
            </div>
          </div>';
    }
}
