<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASC E-Book - View Contact Information</title>
    <link rel="stylesheet" href="../common/css/Main Page CSS.css">
	<link rel="stylesheet" href="../common/css/Table CSS.css">
</head>
    <body>
    <?php
    // Connect to the database
	include '../common/navigation bar.php';
    include '../common/session must not login.php';
    ?>
	
     <div class="content">
	 <header>
    <h1>View Contact Information</h1>
	</header>
	<h2>Contact List</h2>
    <form action="" method="GET">
        <label for="search">Search:</label>
        <input type="text" id="search" name="q" value="<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Contact ID</th>
                <th>Contact Name</th>
                <th>Contact Number</th>
                <th>Contact Email</th>
                <th>Contact Subject</th>
                <th>Contact Message</th>
                <th>Contact File (PDF)</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            
			<?php 
 require "action/conn.php";
    // Fetch contact information from the database based on search query
    if (isset($_GET['q'])) {
        $search_query = $_GET['q'];
        $sql = "SELECT * FROM contact WHERE 
                contact_id LIKE '%$search_query%' OR
                contact_name LIKE '%$search_query%' OR
                contact_number LIKE '%$search_query%' OR
                contact_email LIKE '%$search_query%' OR
                contact_subject LIKE '%$search_query%' OR
                contact_message LIKE '%$search_query%'";
    } else {
        // If no search query is provided, fetch all contact information
        $sql = "SELECT * FROM contact";
    }
    
    $result = $conn->query($sql);
    ?>
<?php
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['contact_id'] . "</td>";
    echo "<td>" . $row['contact_name'] . "</td>";
    echo "<td>" . $row['contact_number'] . "</td>";
    echo "<td>" . $row['contact_email'] . "</td>";
    echo "<td>" . $row['contact_subject'] . "</td>";
    echo "<td>" . $row['contact_message'] . "</td>";
    echo "<td>";
    
    // Display the PDF file link if available
    if (!empty($row['contact_file'])) {
        echo "<a href='" . $row['contact_file'] . "' target='_blank'>View File</a>";
    } else {
        echo "No File";
    }
    
    echo "</td>";
    echo "<td>";
    if ($row['contact_status'] == 'Pending') {
        echo "<a href='#' onclick=\"changeStatus('" . $row['contact_id'] . "')\">Change Status</a>";
    } else {
        echo "Viewed";
    }
    echo "</td>";
    echo "</tr>";
}
?>
        </tbody>
    </table>
	
	<footer>
      <p>&copy; 2023 ASC E-Book. All rights reserved.</p>
    </footer>
    </div>
<script>
function changeStatus(contactId) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            // Refresh the page or update the UI as needed
            window.location.reload(); // Reload the page after successful status change
        }
    };
    xmlhttp.open("GET", "action/change_status.php?contact_id=" + contactId, true);
    xmlhttp.send();
}
</script>
	
</body>
</html>
