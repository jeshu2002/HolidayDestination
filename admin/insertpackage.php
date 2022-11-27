<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<DOCTYPE HTML>
    <html>
    <head>
        <title>New Package</title>
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    </head>
    <body>
    <?php include('includes/navbar.php');?>
    <?php include('includes/sidebar.php'); ?>
    
           
    <div class="text-center">
        <button class="text-white bg-gray-900 hover:bg-gray-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-disable-body-scrolling" data-drawer-show="drawer-disable-body-scrolling" data-drawer-body-scrolling="false" aria-controls="drawer-disable-body-scrolling">
            Menu
        </button>
    </div>
    <div>
        <div style="float: left; padding-left: 3%; padding-top: 2%;" class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Package_id
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Package_name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Days
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Location_id
                    </th>
                </tr>
                </thead>
                <tbody>

                <?php
                $sql = "SELECT * from package";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                //            echo('Package_id,    Name,   Location_id');


                if($query->rowCount() > 0)
                {
                    foreach($results as $result)
                    {	?>
                        <div>

                            <!--                        --><?php //echo htmlentities($result->Package_id);?>
                            <!--                        --><?php //echo htmlentities($result->Name);?>
                            <!--                        --><?php //echo htmlentities($result->Location_id);?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo htmlentities($result->Package_id);?>
                                </th>
                                <td class="py-4 px-6">
                                    <?php echo htmlentities($result->Name);?>
                                </td>
                                <td class="py-4 px-6">
                                    <?php echo htmlentities($result->Days);?>
                                </td>
                                <td class="py-4 px-6">
                                    <?php echo htmlentities($result->Location_id);?>
                                </td>
                            </tr>

                        </div>

                    <?php }} ?>
                    
                </tbody>
            </table>
        </div>
    </div>

    <?php
    if(isset($_POST['submit'])) {
        $Name = $_POST['Name'];
        $Days = $_POST['Days'];
        $Location_id = $_POST['Location_id'];
        $sql1 = "insert into package(Name,Days, Location_id) values ('$Name', '$Days' ,'$Location_id')";
        $query1 = $dbh->prepare($sql1);
        $query1->execute();
    }
    ?>
    


    <div class="mt-3 " style="position: absolute;padding-left: 1100px;padding-right: 20 px; float: right">
        <p class="text-xl text-gray-900 dark:text-white">Give the following to insert into the database</p>
        <form  method="POST" action="">
            <div class="p-6 max-w-sm h-auto backdrop-invert bg-white/50 rounded-lg border border-gray-200 shadow-md">
                <div class="mb-6">
                    <label for="Name" class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">Package_name</label>
                    <input type="name" name="Name" id="Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="Days" class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">Days</label>
                    <input type="number" id="Days" name="Days" placeholder="Enter number of days" required min="1" max="100" class="bg-gray-50 border border-gray-300 w-48 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="Location_id" class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">Location id</label>
                    <input type="number" id="Location_id" name="Location_id" placeholder="Enter Location id" required min="1" max="100" class="bg-gray-50 border border-gray-300 w-48 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>

            <br>

            <input type="submit" name="submit" value="submit" class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">

        </form>

    </div>



    </div>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    </body>
    </html>