<?php
$conn = new mysqli("localhost", "root", "", "sdb");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute the query
$result = $conn->query("SELECT * FROM transactions LIMIT 20");

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Spark Digital </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="">

<div class="hd ">
        <header class=" text-black body-font text-slate-200 bg-gray-900 ">
            <div
                class="  text-slate-200 overflow-hidden container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                    <a href="index.php" class="text-xl mr-5 hover:text-gray-300 hover:underline hover:smooth">Home</a>
                    <a href="view_custmer.php" class="text-xl mr-5 hover:text-gray-300 hover:underline">Customers</a>
                    <a href="transfer_money.php" class="text-xl mr-5 hover:text-gray-300 hover:underline">Transfer</a>
                    <a href="view_transactions.php" class="text-xl mr-5 hover:text-gray-300 hover:underline">History</a>
                </nav>
            </div>
        </header>
    </div>

    <section class="text-gray-400 bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-10">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-0 text-slate-200 hover:text-gray-200 hover:underline">All Customers</h1>
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800 rounded-tl rounded-bl">ID</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Sender Name</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Sender Email</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Receiver Name</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Receiver Email</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Amount</th>
                            <!-- <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Timestamp</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Check if there are rows in the result set
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) : ?>
                                <tr class="text-slate-200 table-auto w-full">
                                    <td class="px-4 py-3"><?= $row["id"] ?></td>
                                    <td class="px-4 py-3"><?= $row["sender_name"] ?></td>
                                    <td class="px-4 py-3"><?= $row["sender_email"] ?></td>
                                    <td class="px-4 py-3"><?= $row["receiver_name"] ?></td>
                                    <td class="px-4 py-3"><?= $row["receiver_email"] ?></td>
                                    <td class="px-4 py-3"><?= $row["amount"] ?></td>
                                    <!-- <td class="px-4 py-3"><?= $row["timestamp"] ?></td> -->
                                </tr>
                        <?php endwhile;
                        } else {
                            echo "<tr><td colspan='7'>No transactions found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                  <a href="index.php" class="text-indigo-400 inline-flex items-center md:mb-2 lg:mb-0">
                  <button class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded">Home Page</button>
                 </a>
            </div>

        </div>
    </section>

    <footer class="text-slate-200 bg-gray-900 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <p class="text-sm text-slate-200 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">©
                1999
                The Spark Digital 
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a href="#" class="text-blue-500 hover:text-blue-700">
                    <!-- Add your social media icon or link here -->
                </a>

                <a href="#" class="ml-3 text-red-500 hover:text-red-700">
                    <!-- Add another social media icon or link here -->
                </a>
            </span>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>
