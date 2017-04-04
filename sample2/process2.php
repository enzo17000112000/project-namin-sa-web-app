<?php
  require('anyco_ui.inc');
$conn=oci_connect('hr','hr','//localhost/XE'); 
  
  ui_print_header('Employees');
  do_query($conn,'SELECT * FROM EMPLOYEES');
  ui_print_footer(date('Y-m-d H:i:s'));
  function do_query($conn,$query)
  {
    
    $stid = oci_parse($conn,$query);
    $r = oci_execute($stid,OCI_DEFAULT);
  
  print '<table border="1">';
  while($row=oci_fetch_array($stid,OCI_RETURN_NULLS)){
    print'<tr>';
    foreach($row as $item){
      print'<td>'.
        ($item ? htmlentities($item): '&nbsp:').'</td>';
  }
    print '</tr>';
    
  }
  print '</table>';
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>List of Employees</title>
  <style>
          body
              {
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
                background-image: url("enzo1.jpg");
                padding: 100px;
      } 
  </style>
</head>
<body>

        </body>
        </html>