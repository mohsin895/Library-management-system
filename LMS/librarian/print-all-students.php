<?php
require_once '../dbcon.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print All Studnts</title>
    <style type="text/css">
        body{
            margin: 0;
            font-family: Kalpurush;
        }
        .print-area{
            width: 755px;
            height: 1050px;
            margin: auto;
            box-sizing: border-box;
            page-break-after: always;
        }
        .header,.page-info{
            text-align: center;
        }
        .header h3{
            margin: 0;
        }
        .data-info{}
        .data-info table{
            width: 100%;
            border-collapse: collapse;
        }
        .data-info table th,
        .data-info table td{
            border: 1px solid #555;
            padding: 4px;
            line-height: 1em;
        }

    </style>
</head>
<body >
<?php
?>

    <tr>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
    </tr>



</body>
</html>
<?php
function page_header(){



	$data =' 
   <div class="print-area">
    <div class="header">
        <h3>Digital It,gopalgonj</h3>

    </div>
  <div class="data-info">
        <table>
            <tr>
                <th>Sl No</th>
                <th>Institute name</th>
                <th>Faculty</th>
                <th>Deperment</th>
                <th>Batch No</th>
            </tr>
     ';
	return $data;

}
		function page_footer(){

				$data = '</<table>
		 
        <div class="page-info">Page : -1</div>
        </div>
        </div>

';
	return $data;
	}

?>