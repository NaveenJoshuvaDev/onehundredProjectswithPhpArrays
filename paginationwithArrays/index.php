<?php
//Pagination using arrays
//step1 defining values
$items = range(1, 53);//array(1to50)
//step2 number of items per page
$itemsPerPage = 10;

//step3: calculate the total number of pages needed
$totalItems = count($items);
$totalPages = ceil($totalItems / $itemsPerPage);

// step:4  Function to get items for a specific page

//array_slice(array $array, int $offset, ?int $length = null, bool $preserve_keys = false): array




function getItemsPerPage($items, $itemsPerPage, $page)
{
    $offset = ($page - 1) * $itemsPerPage;
   return  array_slice($items, $offset, $itemsPerPage);
   
}
//step 5 getting the user input 
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

//step6 

if($page <  1 || $page >  $totalPages){
   echo "page not Found";
}
else
{
 $pageItems =  getItemsPerPage($items, $itemsPerPage, $page);

 echo " Displaying page $page of $totalPages:\n";
 echo '<pre>';
 print_r($pageItems);
 echo '</pre>';

 //step7

 echo "\nPages\n";

 for($i=1; $i <= $totalPages; $i++)
 {
   

    echo "<a href=\"?page=$i\">$i</a>";
 }

   

}





















?>