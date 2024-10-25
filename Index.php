<?php
session_start(); // Start the session
require('./Read.php'); // Ensure Read.php includes necessary database connection and query

// Ensure that the session variable 'username' is set before accessing it
if (!isset($_SESSION['username'])) {
    echo '<script>alert("You must log in first!"); window.location.href = "/gomez/login.php";</script>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* General styling */
        body {
            min-height: 100vh;
            display: flex;
            background: #F0F4FF;
            font-family: 'Arial', sans-serif;
        }
        .container {
            flex-grow: 1;
            padding: 25px;
            margin-left: 85px;
            transition: margin-left 0.4s ease;
        }

        /* Sidebar design */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 85px;
            background: #161a2d;
            padding: 25px 20px;
            transition: width 0.4s ease, margin-left 0.4s ease;
        }

        .sidebar:hover {
            width: 260px;
        }

        /* Sidebar header styles */
        .sidebar-header {
            display: flex;
            align-items: center;
        }

        .sidebar-header img {
            width: 42px;
            border-radius: 50%;
        }

        .sidebar-header h2 {
            color: white;
            font-size: 1.25rem;
            font-weight: 600;
            white-space: nowrap;
            margin-left: 20px;
            opacity: 0;
            transition: opacity 0.4s ease, margin-left 0.4s ease;
        }

        .sidebar:hover .sidebar-header h2 {
            opacity: 1;
            margin-left: 20px;
        }

        /* Sidebar links and icons */
        .sidebar-links {
            list-style: none;
            margin-top: 20px;
            padding: 0;
        }

        .sidebar-links li {
            margin-bottom: 15px;
        }

        .sidebar-links li a {
            color: white;
            display: flex;
            align-items: center;
            padding: 15px;
            text-decoration: none;
            font-weight: 500;
            font-size: 18px;
            transition: background 0.3s, color 0.4s ease;
            opacity: 0.7;
        }

        .sidebar-links li a:hover {
            background: white;
            color: #161a2d;
            border-radius: 5px;
            opacity: 1;
        }

        .sidebar-links span {
            margin-right: 15px;
            font-size: 24px;
        }

        /* Sidebar labels appear on hover */
        .sidebar-links .link-label {
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .sidebar:hover .link-label {
            opacity: 1;
        }

        /* User account section */
        .user-account {
            margin-top: auto;
            padding: 12px 10px;
            color: white;
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-profile img {
            width: 42px;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .user-detail {
            margin-left: 20px;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .sidebar:hover .user-detail {
            opacity: 1;
        }

        /* Welcome message design */
        .sidebar-welcome {
            color: white;
            margin-top: 20px;
            display: flex;
            align-items: center;
            padding: 15px;
            font-weight: 500;
            font-size: 18px;
            transition: background 0.3s, color 0.4s ease;
            opacity: 0.7;
            border-radius: 5px;
        }

        .sidebar-welcome span:first-child {
            font-size: 24px;
            margin-right: 10px;
        }

        .sidebar-welcome span:last-child {
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .sidebar:hover .sidebar-welcome span:last-child {
            opacity: 1;
        }

        .sidebar-welcome:hover {
            background: white;
            color: #161a2d;
            opacity: 1;
        }

    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <img src="8b3a2108-8889-44ff-af36-519d9f6671ce-removebg-preview.png" alt="logo">
            <h2>SANTA RITA</h2>
        </div>
        <ul class="sidebar-links">
                    <!-- Welcome message -->
        <div class="sidebar-welcome">
            <span class="glyphicon glyphicon-user"></span> 
            <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
        </div>
            <li>
                <a href="sms.php">
                    <span class="glyphicon glyphicon-envelope"></span> 
                    <span class="link-label">SMS</span>
                </a>
            </li>
            <li>
                <a href="Email.php">
                    <span class="glyphicon glyphicon-send"></span> 
                    <span class="link-label">Email</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="glyphicon glyphicon-stats"></span> 
                    <span class="link-label">Record of the user</span>
                </a>
            </li>
            <li>
                <a href="crud.php">
                    <span class="glyphicon glyphicon-list"></span> 
                    <span class="link-label">Upload</span>
                </a>
            </li>
            <li>
                <a href="changepass.php">
                    <span class="glyphicon glyphicon-lock"></span> 
                    <span class="link-label">Change Password</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="glyphicon glyphicon-bell"></span> 
                    <span class="link-label">Notifications</span>
                </a>
            </li>
            <li>
                <a href="login.php">
                    <span class="glyphicon glyphicon-log-out"></span> 
                    <span class="link-label">Logout</span>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="container">
        <center><h1>SANTA RITA RECORD</h1></center>
        <br>

        <!-- User Creation Form -->
        <form action="Create.php" method="post" class="form-horizontal">
            <h3>Create User</h3>
            <div class="form-group">
                <label for="Fname" class="col-sm-2 control-label">Firstname</label>
                <div class="col-sm-10">
                    <input type="text" name="Fname" class="form-control" placeholder="Enter your Firstname" required>
                </div>
            </div>
            <div class="form-group">
                <label for="Mname" class="col-sm-2 control-label">Middlename</label>
                <div class="col-sm-10">
                    <input type="text" name="Mname" class="form-control" placeholder="Enter your Middlename" required>
                </div>
            </div>
            <div class="form-group">
                <label for="Lname" class="col-sm-2 control-label">Lastname</label>
                <div class="col-sm-10">
                    <input type="text" name="Lname" class="form-control" placeholder="Enter your Lastname" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="create" value="CREATE" class="btn btn-primary">
                </div>
            </div>
        </form>

        <!-- User Records Table -->
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr class="info">
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($results = mysqli_fetch_array($sqlAccounts)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($results['id']); ?></td>
                        <td><?php echo htmlspecialchars($results['Fname']); ?></td>
                        <td><?php echo htmlspecialchars($results['Mname']); ?></td>
                        <td><?php echo htmlspecialchars($results['Lname']); ?></td>
                        <td>
                            <form action="edit.php" method="post" style="display:inline;">
                                <input type="submit" name="edit" value="EDIT" class="btn btn-info btn-xs">
                                <input type="hidden" name="editID" value="<?php echo htmlspecialchars($results['id']); ?>">
                                <input type="hidden" name="editF" value="<?php echo htmlspecialchars($results['Fname']); ?>">
                                <input type="hidden" name="editM" value="<?php echo htmlspecialchars($results['Mname']); ?>">
                                <input type="hidden" name="editL" value="<?php echo htmlspecialchars($results['Lname']); ?>">
                            </form>
                            <form action="Delete.php" method="post" style="display:inline;">
                                <input type="submit" name="delete" value="DELETE" class="btn btn-danger btn-xs">
                                <input type="hidden" name="deleteID" value="<?php echo htmlspecialchars($results['id']); ?>">
                            </form>
                            <button class="upload-btn" onclick="window.location.href='upload.php';">Upload</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <button id="printButton" class="btn btn-primary" style="float: right;" onclick="window.print()">Print</button>
    </div>
</body>
</html>
