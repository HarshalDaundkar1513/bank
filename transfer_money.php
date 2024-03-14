<?php
// Database connection parameters
$conn = new mysqli("localhost", "root", "", "sdb");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch customer names for the dropdown
$result = $conn->query("SELECT DISTINCT sender_name FROM transactions");

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Spark Digital - Transfer Money</title>
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

   <section class="text-gray-400 bg-gray-900 body-font relative">
    <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
                <h1
                    class="sm:text-4xl text-3xl font-medium title-font mb-0 text-slate-200 hover:text-gray-200 hover:underline">
                    Transfer Money</h1>
            </div>
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <form action="process_transfer.php" method="post" class="flex flex-wrap -m-2">
                <div class="p-2 w-1/2">
                    <div class="relative">
                        <label for="sender" class="leading-7 text-sm text-slate-200">Sender:</label>
                        <select id="sender" name="sender" class="w-full bg-gray-800 bg-opacity-40 rounded border border-gray-700 focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                            <?php
                            if ($result->num_rows > 0) :
                                while ($row = $result->fetch_assoc()) : ?>
                                    <option value="<?= $row['sender_name'] ?>"><?= $row['sender_name'] ?></option>
                            <?php endwhile;
                            endif; ?>
                        </select>
                    </div>
                </div>
                

                <div class="p-2 w-1/2">
                    <div class="relative">
                        <label for="receiver" class="leading-7 text-sm text-slate-200">Receiver:</label>
                        <input type="text" id="receiver" name="receiver" class="w-full bg-gray-800 bg-opacity-40 rounded border border-gray-700 focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="Enter receiver's name" required>
                    </div>
                </div>

                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="amount" class="leading-7 text-sm text-slate-200">Amount:</label>
                        <input type="number" name="amount" class="w-full bg-gray-800 bg-opacity-40 rounded border border-gray-700 focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                    </div>
                </div>

                <div class="p-2 w-full">
                    <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Transfer</button>
                </div>
            </form>
        </div>
    </div>
</section>

    <footer class="text-slate-200 bg-gray-900 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <p
                class="text-sm text-slate-200 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">
                © 1999 The Spark Digital
            </p>
            <span
                class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a href="#"
                    class="text-blue-500 hover:text-blue-700">
                    <!-- Add your social media icon or link here -->
                </a>

                <a href="#"
                    class="ml-3 text-red-500 hover:text-red-700">
                    <!-- Add another social media icon or link here -->
                </a>
            </span>
        </div>
    </footer>

    

   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>
