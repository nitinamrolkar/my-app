<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Template with Sidebar</title>
  

<style>
    /* General Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Body */
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      background-color: #f4f4f4;
      padding: 0;
      display: flex;
    }

    /* Header */
    header {
      background-color: #931b1b;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      width: 100%;
    }

    header h1 {
      font-size: 2.5em;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      height: 100vh;
      background-color: #e02d2d;
      padding-top: 20px;
      position: fixed;
    }

    .sidebar ul {
      list-style: none;
      padding-left: 0;
    }

    .sidebar ul li {
      padding: 15px 20px;
      border-bottom: 1px solid #555;
    }

    .sidebar ul li a {
      color: white;
      text-decoration: none;
      font-size: 1.2em;
    }

    .sidebar ul li a:hover {
      background-color: #e4cfcf;

    }

    /* Main Content Area */
    .main-content {
      margin-left: 250px; /* Adjust for the sidebar width */
      padding: 20px;
      width: calc(100% - 250px);
      background-color: #f8fefc;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Navigation Bar */
    nav {
      background-color: #444;
      text-align: center;
      margin-top: 20px;
      padding: 10px 0;
    }

    nav ul {
      list-style: none;
      padding: 0;
    }

    nav ul li {
      display: inline;
      margin-right: 20px;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-size: 1.2em;
      padding: 10px 20px;
      background-color: #555;
      border-radius: 5px;
    }

    nav ul li a:hover {
      background-color: #888;
    }

    /* Footer */
    footer {
      text-align: center;
      padding: 20px;
      background-color: #333;
      color: white;
      position: fixed;
      width: 100%;
      bottom: 0;
    }
  </style>

  @yield('style')
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <ul>
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Profile</a></li>
      <li><a href="#">Settings</a></li>
      <li><a href="#">Messages</a></li>
      <li><a href="#">Logout</a></li>
    </ul>
  </div>

  <!-- Main Content Area -->
  <div class="main-content">

    <!-- Header -->
    <header>
      <h1>My Website</h1>
    </header>

    <!-- Navigation Bar -->
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>

    @yield('maincontent')

    <!-- Main Content -->
    <div class="content">
    @yield('content')
      
    </div>

    <!-- Footer -->
    <footer>
      <p>&copy; 2026 My Website. All rights reserved.</p>
    </footer>
  </div>

</body>
    @yield('scripts')
</html>
