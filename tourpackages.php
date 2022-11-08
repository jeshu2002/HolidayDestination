<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
            <title>Tour Packages</title>
    </head>
    <body>
        <div>
        <?php include('includes/navbar.php');?>
        </div>
            <div class="grid 2sm:grid-cols-7 grid-cols-3 gap-2 mx-2 mb-2 mt-5">
            <?php $sql = "SELECT * from package";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
			<div class="max-w-sm max-h-sm rounded border-black overflow-hidden shadow-lg justify-content">
                <div>

					<img class="max-h-sm" src="images/<?php echo htmlentities($result->Image);?>.jpg" class="img-responsive" alt=""/>
                    <div class="">
					<h4 class="pz-5 text-black"><?php echo htmlentities($result->Name);?></h4>
					<h6 class="pz-5 text-black"><?php echo htmlentities($result->Days);?>Days/<?php echo htmlentities($result->Days);?>Nights</h6>
                    <a href="selecttour.php">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Book</button>
</a>
				</div>
</div>
                    
                </div>
				
				

<?php }} ?>
            </div>

       
    </body>
</html>