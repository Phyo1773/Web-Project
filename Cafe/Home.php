<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cuppa Jo Cafe</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    </head>
    <body>

        <header>
            <a href="#" class="logo">
                <img src="images/logo.jpg" alt="">
            </a>
            <h2>Cuppa Jo Café</h2>

            <ul class="navbar">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#reviews">Rate Us</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <li><a href="admin.html">Admin</a></li>
                <li><a href="order.html"><i class='bx bx-cart-alt'></i></a></li>
            </ul>

        </header>

        <section class="home" id="home">
            <div class="home-text">
                <h1>Start a day <br> with coffee</h1>
                <p>Welcome to Cuppa Jo Café where the scent of freshly brewed coffee welcomes you to a cozy haven in the heart of Yangon. From our specialty brews to delectable pastries, every moment here is a celebration of flavor and community. Join us for a memorable experience at Cuppa Jo Café.</p>
                <a href="order.html" class="btn">Shop Now</a>
            </div>

        </section>

        <section class="about" id="about">
            <div class="about-img">
                <img src="images/history.jpg" alt="">
            </div>
            <div class="about-text">
                <h2>About Us</h2>
                <p>Welcome to Cuppa Jo where every cup tells a story. Established on May 25, 2022, our café is more than just a place to grab your daily brew – it's a haven for community, creativity, and connection. Nestled in the heart of Tamwe, our cozy ambiance invites you to unwind, sip and savor the moment.</p>
                <p>At Cuppa Jo, we're passionate about crafting exceptional coffee experiences. From the beans we carefully source to the hands that skillfully brew them, each cup is a labor of love. Our dedication to quality extends beyond our coffee, we take pride in curating a menu of delectable treats and savory delights to complement your beverage of choice.</p>
                <p>As we continue to grow and evolve, our mission remains unchanged – to provide a warm, welcoming space where friends gather, ideas flourish and memories are made. Join us at Cuppa Jo and let's create something beautiful together..</p>
                <a href="#" class="btn">Learn  More</a>
            </div>
        </section>

        <section class="menu" id="menu">
        <div class="paper">
            <h2>Our Menu</h2>
            <div class="it">
            <img src="images/m4.jpg" alt="Photo 1">
            <img src="images/m2.jpg" alt="Photo 2">
            <img src="images/m3.jpg" alt="Photo 3">
            <img src="images/m1.jpg" alt="Photo 4">
            </div>
        </div>
        </section> 

        <section class="sp">
        <div class="special">
        <img src="images/m5.png" alt="SP1">
        <img src="images/m7.png" alt="SP2">
        </div>
        </section>

        <section class="product">
            <br>
    <div class="main-container">
        <div class="title-container">
            <h1>Our Products</h1>
        </div>

        <div class="search-form">
            <form action="" method="get">
                <input type="text" name="search_title">
                <button type="submit">Search</button>
            </form>
        </div>

        <?php
        $host = 'localhost';
        $user = 'root';
        $passwd = '';
        $database = 'cafe';
        $table_name = 'product';

        // Establishing connection
        $connect = mysqli_connect($host, $user, $passwd, $database) or die("could not connect to the database");

        // Handling search query
        $search_title = isset($_GET['search_title']) ? mysqli_real_escape_string($connect, $_GET['search_title']) : '';
        $search_condition = $search_title ? "WHERE `title` LIKE '%$search_title%'" : '';

        // Constructing SQL query
        $query = "SELECT * FROM `$table_name` $search_condition";

        // Selecting database
        mysqli_select_db($connect, $database);

        // Executing query
        $result = mysqli_query($connect, $query);

        // Checking if query was successful
        if ($result) {
            // Looping through results
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<div class="product-container">';
                // Checking if image exists
                if (isset($row['image']) && !empty($row['image'])) {
                    // Constructing image path relative to the PHP file
                    $imagePath = 'uploads/' . $row['image'];
                    echo '<img src="' . $imagePath . '" alt="Product Image">';
                } else {
                    echo '<p>No image available</p>'; // Debugging output
                }
                echo '<div class="product-info">';
                // Displaying other product information
                foreach ($row as $fieldName => $fieldValue) {
                    if ($fieldName !== 'image') {
                        echo '<p>' . $fieldValue . '</p>';
                    }
                }
                echo '</div>';
                echo '</div>';
            } 
        } else {
            // Error handling if query fails
            die("Query=$query failed! Error: " . mysqli_error($connect)); // Debugging output
        }

        // Closing database connection
        mysqli_close($connect);
        ?>
    </div>
</section>

           
        <section class="reviews" id="reviews">
        <div class="container">
            <br>
        <h1>Rate Us</h1>
 
            <form action="submit_review.php" method="post">
                
                <label for="user_email">Your Email:</label>
                <input type="email" name="user_email" required>
            
               
                <label for="star_rating">Star Rating:</label>
                <div class="star-rating">
                    <input type="radio" id="star1" name="star_rating" value="1" required><label for="star1"></label>
                    <input type="radio" id="star2" name="star_rating" value="2"><label for="star2"></label>
                    <input type="radio" id="star3" name="star_rating" value="3"><label for="star3"></label>
                    <input type="radio" id="star4" name="star_rating" value="4"><label for="star4"></label>
                    <input type="radio" id="star5" name="star_rating" value="5"><label for="star5"></label>
                </div>
                
        
                <label for="additional_notes">Additional Notes (optional):</label>
                <textarea name="additional_notes" rows="4" placeholder=""></textarea>
            
                <input type="submit" value="Submit">
            </form>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        </section>

        <section class="contact" id="contact">
        <h3>Contact Us</h3>
        <p>Address: Ma Hlwa Gone St, Kyauk Myaung Street, Tamwe Township, Yangon, Myanmar</p>
        <p>Phone: (+95) 777716216</p>
        <p>Email: cuppajoygn1999@gmail.com</p>
        <p><a href="https://www.facebook.com/profile.php?id=100079140935358&mibextid=uzlsIk" target="_blank"><i class='bx bxl-facebook-square'></i>Visit our Facebook page</a></p>
        <p><a href="https://maps.app.goo.gl/BE8zgqqZuCrJ7CTB9?g_st=ic" target="_blank"><i class='bx bx-map'></i>View Map</a></p>
        </section>   
        
    </body>

</html>