<?php 

function getTableData($tableName, $page, $limit)
{
    $dataTable = array();
    $startRow = ($page - 1) * $limit;
    $query = mysql_query('SELECT * FROM `'.$tableName.'` WHERE level=3 ORDER BY id_pengguna DESC LIMIT '.$startRow.', '.$limit);
 
    while ($data = mysql_fetch_assoc($query)) 
        array_push($dataTable, $data);
 
    return $dataTable;
}

function showPagination($tableName, $limit)
{
    $countTotalRow = mysql_query('SELECT COUNT(*) AS total FROM `'.$tableName.'` WHERE level=3 ');
    $queryResult = mysql_fetch_assoc($countTotalRow);
    $totalRow = $queryResult['total'];
 
    $totalPage = ceil($totalRow / $limit);
 
    $page = 1;
	echo "<div class=\"pagination\">";
		echo "<a href='?page=1' style=\"text-decoration:none\"><<</a> "; // Goto 1st page  
		
		for ($i=1; $i<=$totalPage; $i++) { 
					echo "<a href='?page=".$i."' style=\"text-decoration:none\">".$i."</a> "; 
		}; 
		echo "<a href='?page=$totalPage' style=\"text-decoration:none\">>></a> "; // Goto last page
	echo "</div>";
} 

?>