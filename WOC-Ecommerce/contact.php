
<html>
	<head>
		<meta charset="utf-8">
		<title>World of Collectors</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" media='all'>
		<link rel="stylesheet"  href="font/css/font-awesome.min.css">
		
	</head>



		<header>
	<!--Navigation Bar Start-->
		<!--LOGO HEADER -->
			<a href="index.php" style="font-family: 'Roboto Slab', serif;"><h1>World<span>Of</span><span style="color:#39ca74">Collectors</span></h1></a>
		<!--LOGO ENDS-->
				<nav>
					<ul id="menu">
					<li class="extra"><div id="search">
								<form  method="get" action="results.php" enctype="multipart/form-data" style="display:inline;">
									<input type="text" name="user_query" placeholder="Search Product" id="search-box">
									<input type="submit" name="search" value="Go" id="search-btn">
								</form>	
					</li>
						<li><a id="linkref" href="index.php">Home</a></li>
						
						<div class="dropdown">
					<span><li><a id="linkref" href="categories.php">Categories</a></li></span>
					<div class="dropdown-content">
					<a href="index.php?cat=1">Cars</a>
                    <a href="index.php?cat=2">Currency</a>
                    <a href="index.php?cat=3">Comics</a>
                    <a href="index.php?cat=4">Stamps</a>
                    <a href="index.php?cat=5">Toys</a>
                    <a href="index.php?cat=6">Books</a>
					</div>
					</div>
					<li><a id="linkref" href="customer/my_account.php">My Account</a></li>

					</ul>
				
			
				</nav>
		</header>
		<body>
		<form action="insert.php" method="post">
<div class="container">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
       <option value="india">India</option>
        <option value="uganda">Uganda</option>
         <option value="pakistan">Pakistan</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>
</body>
<style>
	@import url('http://weloveiconfonts.com/api/?family=entypo');

.h2{
	margin-top: 20px;
}


body {
  background: #ddd;
}

.wrapper {
  padding: 120px 0 0;
  text-align: center;
}

    input[type=text], select, textarea {
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */  
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
    background-color: #45a049;
}
}
</style>
<div class="footer">
    <ul>
        <li> <a href="index.php">Home</a></li>
        |
        <li><a href="about.php">About</a></li>
        |
        <li><a href="#">FAQ</a></li>
        |
        <li><a href="contact.php">Contact</a></li>

    <li>
      
      <a href="#">
        <i class="fa fa-envelope" aria-hidden="true"></i>
        <span class="site">E-Mail</span>

      </a>

    </li>
    <li>
      <a href="http://facebook.com" title="My Facebook Page">
        <i class="fa fa-facebook-official" aria-hidden="true"></i>
        <span class="site">Facebook</span>
      </a>
    </li>
    <li>
      <a href="http://twitter.com" title="My Twitter Page">
        <i class="fa fa-twitter-square" aria-hidden="true"></i>
        <span class="site">Twitter</span>
      </a>
    </li>
  </ul>
</div>
</html>
