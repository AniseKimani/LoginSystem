<?php
session_start();
require_once('connection.php');

if (!isset($_SESSION['User_ID']) || $_SESSION['group'] != 1) {
    header("Location: login.php");
    exit();
}

$limit = 10; 
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page=1;
};  
$start_from = ($page-1) * $limit;

$query = "SELECT User_ID, User_Name, User_Email, grpID FROM users LIMIT $start_from, $limit";
$result = mysqli_query($con, $query);

$total_query = "SELECT COUNT(User_ID) FROM users";
$total_result = mysqli_query($con, $total_query);
$total_row = mysqli_fetch_row($total_result);
$total_records = $total_row[0];
$total_pages = ceil($total_records / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link rel="stylesheet" href="tablestyle.css">
    <script>
        function editRow(rowId) {
            document.getElementById('editRow_' + rowId).style.display = 'block';
            document.getElementById('displayRow_' + rowId).style.display = 'none';
        }

        function saveRow(rowId) {
            var formData = new FormData(document.getElementById('editForm_' + rowId));
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'updateuser.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    location.reload(); 
                } else {
                    alert('Error updating user');
                }
            };
            xhr.send(formData);
        }

        function deleteRow(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'deleteuser.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        location.reload(); 
                    } else {
                        alert('Error deleting user');
                    }
                };
                xhr.send('user_id=' + userId);
            }
        }
    </script>
</head>
<body>
    <h1>User List</h1>

    <h2>Create New User</h2>
    <form action="createuser.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="group">Group:</label>
        <select id="group" name="group">
            <option value="1">Admin</option>
            <option value="2">Client</option>
            <option value="3">Recipe Owner</option>
        </select>
        <button type="submit">Create</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Group</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr id="displayRow_<?php echo $row['User_ID']; ?>">
                    <td><?php echo $row['User_ID']; ?></td>
                    <td><?php echo $row['User_Name']; ?></td>
                    <td><?php echo $row['User_Email']; ?></td>
                    <td><?php echo $row['grpID']; ?></td>
                    <td>
                        <button onclick="editRow(<?php echo $row['User_ID']; ?>)">Edit</button>
                        <button onclick="deleteRow(<?php echo $row['User_ID']; ?>)">Delete</button>
                    </td>
                </tr>
                <tr id="editRow_<?php echo $row['User_ID']; ?>" style="display:none;">
                    <form id="editForm_<?php echo $row['User_ID']; ?>">
                        <td><?php echo $row['User_ID']; ?></td>
                        <td><input type="text" name="username" value="<?php echo $row['User_Name']; ?>"></td>
                        <td><input type="email" name="email" value="<?php echo $row['User_Email']; ?>"></td>
                        <td>
                            <select name="group">
                                <option value="1" <?php echo $row['grpID'] == 1 ? 'selected' : ''; ?>>Admin</option>
                                <option value="2" <?php echo $row['grpID'] == 2 ? 'selected' : ''; ?>>Client</option>
                                <option value="3" <?php echo $row['grpID'] == 3 ? 'selected' : ''; ?>>Recipe Owner</option>
                            </select>
                        </td>
                        <td>
                            <input type="hidden" name="user_id" value="<?php echo $row['User_ID']; ?>">
                            <button type="button" onclick="saveRow(<?php echo $row['User_ID']; ?>)">Save</button>
                            <button type="button" onclick="location.reload()">Cancel</button>
                        </td>
                    </form>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="pagination">
        <?php for ($i=1; $i<=$total_pages; $i++): ?>
            <a href="table.php?page=<?php echo $i; ?>" class="<?php if ($page == $i) echo 'active'; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</body>
</html>
