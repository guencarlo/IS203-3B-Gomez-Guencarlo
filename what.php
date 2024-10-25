<?php
require('./Read.php'); // Ensure Read.php includes necessary database connection and query

// Assume $sqlAccounts is already defined and fetched in Read.php
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sidebar Menu HTML and CSS | CodingNepal</title>
  <!-- Linking Google Font Link For Icons -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="style.css" />
  <style>
/* Importing Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  min-height: 100vh;
  background: #F0F4FF;
}

.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 85px;
  display: flex;
  overflow-x: hidden;
  flex-direction: column;
  background: #161a2d;
  padding: 25px 20px;
  transition: all 0.4s ease;
}

.sidebar:hover {
  width: 260px;
}

.sidebar .sidebar-header {
  display: flex;
  align-items: center;
}

.sidebar .sidebar-header img {
  width: 42px;
  border-radius: 50%;
}

.sidebar .sidebar-header h2 {
  color: #fff;
  font-size: 1.25rem;
  font-weight: 600;
  white-space: nowrap;
  margin-left: 23px;
}

.sidebar-links h4 {
  color: #fff;
  font-weight: 500;
  white-space: nowrap;
  margin: 10px 0;
  position: relative;
}

.sidebar-links h4 span {
  opacity: 0;
}

.sidebar:hover .sidebar-links h4 span {
  opacity: 1;
}

.sidebar-links .menu-separator {
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  height: 1px;
  transform: scaleX(1);
  transform: translateY(-50%);
  background: #4f52ba;
  transform-origin: right;
  transition-delay: 0.2s;
}

.sidebar:hover .sidebar-links .menu-separator {
  transition-delay: 0s;
  transform: scaleX(0);
}

.sidebar-links {
  list-style: none;
  margin-top: 20px;
  height: 80%;
  overflow-y: auto;
  scrollbar-width: none;
}

.sidebar-links::-webkit-scrollbar {
  display: none;
}

.sidebar-links li a {
  display: flex;
  align-items: center;
  gap: 0 20px;
  color: #fff;
  font-weight: 500;
  white-space: nowrap;
  padding: 15px 10px;
  text-decoration: none;
  transition: 0.2s ease;
}

.sidebar-links li a:hover {
  color: #161a2d;
  background: #fff;
  border-radius: 4px;
}

.user-account {
  margin-top: auto;
  padding: 12px 10px;
  margin-left: -10px;
}

.user-profile {
  display: flex;
  align-items: center;
  color: #161a2d;
}

.user-profile img {
  width: 42px;
  border-radius: 50%;
  border: 2px solid #fff;
}

.user-profile h3 {
  font-size: 1rem;
  font-weight: 600;
}

.user-profile span {
  font-size: 0.775rem;
  font-weight: 600;
}

.user-detail {
  margin-left: 23px;
  white-space: nowrap;
}

.sidebar:hover .user-account {
  background: #ADD8E6;
  border-radius: 4px;
}
body {
  padding: 25px;
  background-color: white;
  color: black;
  font-size: 25px;
}

.dark-mode {
  background-color: black;
  color: white;
}
</style>
</head>
<body>

  </style>
</head>
<body>
    <center>
<button onclick="myFunction()">Toggle dark mode</button>        

<script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>
  <aside class="sidebar">
    <div class="sidebar-header">
      <img src="srclogo-removebg-preview.png" alt="logo" />
      <h2>SRC</h2>
    </div>
    <ul class="sidebar-links">
      <h4>
        <span>Main Menu</span>
        <div class="menu-separator"></div>
      </h4>
      <li>
  <a href="website.php">
    <span class="material-symbols-outlined"> HOME </span>HOME
  </a>
</li>

<li>
    <a href="gmail.php"><span class="material-symbols-outlined"> EMAIL</span>EMAIL</a>
</li>
      <h4>
        <span>General</span>
        <div class="menu-separator"></div>
      </h4>
      <li>
  <a href="index1.php">
    <span class="material-symbols-outlined">SORT</span>
    SORT
  </a>
</li>

      <li>
  <a href="sms1.php">
    <span class="material-symbols-outlined"> SMS </span>SMS
  </a>
</li>

      <h4>
        <span>Account</span>
        <div class="menu-separator"></div>
      </h4>
      <li onclick="window.location.href='password.php'">
    <a href="#">
        <span class="material-symbols-outlined">password</span>Password
    </a>
</li>


      <li>
        <a href="#"><span class="material-symbols-outlined"> settings </span>Settings</a>
      </li>
      <li>
  <a href="login.php">
    <span class="material-symbols-outlined"> logout </span>Logout
  </a>
</li>

    </ul>
    <div class="user-account">
      <div class="user-profile">
        <img src="srclogo-removebg-preview.png" alt="Profile Image" />
        <div class="user-detail">
          <h3>GUEN CARLO GOMEZ</h3>
          <span>BSIS 3B </span>
        </div>
      </div>
    </div>
  </aside>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
            color: #343a40; /* Dark text color */
        }
        h1 {
            margin-top: 20px;
            color: #007bff; /* Bootstrap primary color */
        }
        .container {
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            background-color: #ffffff; /* White background for the form */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .table {
            margin-top: 20px;
        }
        .table th {
            background-color: #007bff; /* Blue header */
            color: white;
        }
        .table td {
            background-color: #f1f1f1; /* Light gray rows */
        }
        .btn {
            margin: 5px;
        }
        .action-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .qr-code {
            width: 60px; /* Adjust QR code size */
            height: 60px; 
        }
        button {
            background-color: #007BFF; /* Blue background */
            color: white; /* White text */
            border: none; /* Remove borders */
            padding: 10px 20px; /* Add some padding */
            font-size: 16px; /* Increase font size */
            cursor: pointer; /* Pointer cursor on hover */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s ease; /* Smooth hover effect */
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>

</head>
<body>

    <center><h1>Welcome to SRC Management</h1></center>

    <div class="container">
    
        <form action="Create.php" method="post">
            <h3>STUDENT OF SANTA RITA COLLEGE</h3>
            <div class="form-group">
                <input type="text" class="form-control" name="Fname" placeholder="Enter your Firstname" required />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="Mname" placeholder="Enter your Middlename" required />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="Lname" placeholder="Enter your Lastname" required />
            </div>
            <input type="submit" name="create" value="CREATE" class="btn btn-primary" />
        </form>

        <table class="table table-bordered">
            <thead>
                <tr class="danger">
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($results = mysqli_fetch_array($sqlAccounts)) { ?>
                    <tr class="warning">
                        <td><?php echo htmlspecialchars($results['ID']); ?></td>
                        <td><?php echo htmlspecialchars($results['Firtsname']); ?></td>
                        <td><?php echo htmlspecialchars($results['Middlename']); ?></td>
                        <td><?php echo htmlspecialchars($results['Lastname']); ?></td>
                        <td class="action-buttons">
                            <a href="profile1.php" class="btn btn-success btn-xs">
                                <img src="frame.png" alt="QR Code" class="qr-code" /> 
                                Visit Profile 
                            </a>
                            <form action="edit.php" method="post" style="display:inline;">
                                <input type="hidden" name="editID" value="<?php echo htmlspecialchars($results['ID']); ?>">
                                <input type="hidden" name="editF" value="<?php echo htmlspecialchars($results['Firtsname']); ?>">
                                <input type="hidden" name="editM" value="<?php echo htmlspecialchars($results['Middlename']); ?>">
                                <input type="hidden" name="editL" value="<?php echo htmlspecialchars($results['Lastname']); ?>">
                                <input type="submit" name="edit" value="EDIT" class="btn btn-info btn-xs">
                            </form>
                            <form action="Delete.php" method="post" style="display:inline;">
                                <input type="hidden" name="deleteID" value="<?php echo htmlspecialchars($results['ID']); ?>">
                                <input type="submit" name="delete" value="DELETE" class="btn btn-danger btn-xs">
                            </form>
                           
                        </td>
                
                    </tr>
                   
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>