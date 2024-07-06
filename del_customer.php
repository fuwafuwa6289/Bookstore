<?php
    include('testconnect.php');

    // Check if the delete parameter is set in the URL
    if (isset($_GET['delete'])) {
        $CustomerID = $_GET['delete'];

        // Use a prepared statement to prevent SQL injection
        $sql = "DELETE FROM Customer WHERE CustomerID = ?";
        
        $params = array($CustomerID);
        $result = sqlsrv_query($conn, $sql, $params);

        if ($result === false) {
            die(print_r(sqlsrv_errors(), true)); // Handle errors if the query fails
        } else {
            // Redirect to the main page after successful deletion with a success message
            header("Location: customer.php?deleteSuccess=1");
        }
    }

        // Redirect to the main page after deletion
       
?>