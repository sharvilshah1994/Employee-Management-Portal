<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
include 'header.php';
include 'config.php';
session_start();
$query = "SELECT * FROM clients";
$result = $conn -> query($query);
?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                    <h1 class="page-header">Client Master </h1>
                    <ol class="breadcrumb">
                                   <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Clients</li>
          </ol>
        </section>
                    
        <section class="content">
                <div class="row">
                <div class="col-lg-12">
                      
                        <!-- /.panel-heading -->
                        <div class="box">
                            <div class="box-header">
                  <h3 class="box-title">List of all clients</h3><a href="addnewclient.php" class="btn btn-info pull-right">Add new client</a>
                </div>
                            
                        <div class="box-body">
	<input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter">
        <br>
        <br>
                  <table class="table table-bordered table-striped order-table table">
                                    <thead>
                                        <tr>
                                            
                                            <th>Client Name</th>
                                            <th>Department</th>
                                            <th>Email id</th>
                                            <th>Client handled by</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                        ?>
                                        <tr>
                                            
                                            <td><?php echo $row['cl_name'];?></td>
                                            <td><?php echo $row['dept'];?></td>
                                            <td><?php echo $row['cl_email'];?></td>
                                            <td><?php echo $row['owner_ca'];?></td>
                                            <td><a href="viewclient.php?ID=<?php echo $row['ID']?>" >View</a>&nbsp;
                                                <a href="editclient.php?ID=<?php echo $row['ID']?>" >Edit</a>
                                                </td>
                                        </tr>
                                        <?php
                                        }
                       ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>

<?php
include 'footer.php';
?>

<script>
    (function(document) {
	'use strict';

	var LightTableFilter = (function(Arr) {

		var _input;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}

		function _filter(row) {
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});

})(document);
    </script>