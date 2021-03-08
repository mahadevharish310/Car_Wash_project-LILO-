<?php include ('connect.php');

?>

    <!DOCTYPE html>
    <html>

    <head>

        <style>

        </style>

        <title>Arun | Welcome</title>
        <meta name="author" content="Arun">
        <meta name="viewport" content="width=device-width , initial-scale=1">

        <link rel="stylesheet" type="text/css" href="style.css" />

    </head>

    <body>

        <script>
            //Get the button
            var mybutton = document.getElementById("Btn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>

        <header>
            <div class="container">
                <div id="branding">
                    <h1><span class="highlight">LILO</span> CarWash</h1>
                </div>
                <nav class="navigation">
                    <ul>
                        <li class="current"><a href="#section0"> Index</a></li>
                        <li><a href='#section3'> Book Appointment</a></li>
                        <li><a href="#section2"> Contact</a></li>
                        <li><a href='#section6'> Testimony</a></li>
                        <li><a href="#section1"> Location</a></li>
                        <li><a href="#section5"> Join Us!</a></li>

                    </ul>
                </nav>
            </div>
        </header>

        <!-- section0 -->

        <div class="indexbody">
            <section id="showcase">
                <div class="container">
                    <h1>Affordable CarWash</h1>
                    <h2><b>LILO Car Wash is Premiere Car Wash & Detailing place. We provide top quality car washing and detailing services for cars, SUVs, trucks, & vans at an economical rate. We also feature a convenience store. Stop by, we look forward to seeing you!</b></h2>
                </div>
            </section>

            <section id="newsletter">
                <div class="container">
                    <h1>Subscribe to our newsletter</h1>
                    <form action="" method='post'>
                        <input type="email" name="newsletteremail" placeholder="Enter email ......">
                        <button type="submit" name="newslettersubmit" class="button">Subscribe</button>
                    </form>
                </div>
            </section>

            <h1>Services offered for</h1>
            <section id="boxes">
                <div id="left">
                    <img src="./images/hatchback.jpg" width="300px" height="300px"></img>
                    <div id="boxes">
                        <h3>Hatchback</h3>
                        <p>Pricing and more details for hatchback CarWash</p>
                    </div>
                </div>

                <div id="middle">
                    <img src="./images/suvs.jpg" width="300px" height="300px"></img>
                    <div id="boxes">
                        <h3>SUVs</h3>
                        <p>Pricing and more details for SUVs CarWash</p>
                    </div>
                </div>

                <div id="right">
                    <img src="./images/sedan.jpg" width="300px" height="300px"></img>
                    <div id="boxes">
                        <h3>Sedan</h3>
                        <p>Pricing and more details for sedan CarWash</p>
                    </div>
                </div>

        </div>
        </section>
        </div>

        <!--section3-->
        <div id="section3">

            <h1>User | Book Appointment</h1>

            <h5>Book Appointment</h5>

            <form role="form" name="book" method="post">

                <label for="service">
                    Service
                </label>
                <select name="service" id="service">
                    <option value=''>------- Select --------</option>
                    <?php 
$sql1 = "select * from lilo_car_wash.service";
$res1 = mysqli_query($conn, $sql1);
if(mysqli_num_rows($res1) > 0) {
while($row1 = mysqli_fetch_object($res1)) {
  echo "<option value='".$row1->serviceId."'>".$row1->service."</option>";
}
}
?>
                </select>
                <br>
                <br>
                <label for="car-type">
                    Car-type
                </label>
                <select name="car" id="car">
                    <option value=''>------- Select --------</option>
                    <?php 
$sql2 = "select * from lilo_car_wash.car";
$res2 = mysqli_query($conn, $sql2);
if(mysqli_num_rows($res2) > 0) {
while($row2 = mysqli_fetch_object($res2)) {
  echo "<option value='".$row2->carId."'>".$row2->carType."</option>";
}
}
?>
                </select>
                <br<br>

                    <label for="AppointmentDate">
                        Date
                    </label>
                    <input type=date name="appdate" required="required" data-date-format="yyyy-mm-dd" laceholder="yyyy-mm-dd">
                    <br<br>

                        <label for="apptime">

                            Time

                        </label>
                        <input type=time name="apptime" required="required">eg : 10:00 PM
                        <br<br>

                            <button type="submit" name="appointmentsubmit">
                                Submit
                            </button>
            </form>

        </div>

        <!--section1-->
        <div id="section1">

            <h1>LILO Car Wash Location</h1>

            <div id="googleMap" style="width:100%;height:400px;"></div>

            <script>
                function myMap() {
                    var mapProp = {
                        center: new google.maps.LatLng(48.4274066, -89.252256),
                        zoom: 5,
                    };
                    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                }
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzBHM1r94CajXfWm5eKReF0lJ8Ki1WUEw&callback=myMap"></script>
            <script>
                var marker = new google.maps.Marker({
                    position: myCenter,
                    animation: google.maps.Animation.BOUNCE
                });

                marker.setMap(map);
            </script>
        </div>

        <!--section2-->
        <div id="section2">
            <h1>Contact Us</h1>
            <div class="container contact-page">
                <section class="contact-form">
                    <form action="" method="post">
                        <h2>
          <ion-icon name="mail"></ion-icon>
          Write to us:
        </h2>
                        <div class="input-1">
                            <input name="contactname" type="text" placeholder="Your name *" required>
                            <input name="contactemail" type="email" placeholder="Your email *" required>
                        </div>
                        <div class="input-2">
                            <input name="contactnumber" type="number" placeholder="Your phone">
                            <input name="contactzip" type="text" placeholder="Your Zip Code">
                        </div>
                        <div class="form-submit">
                            <textarea name="contactmessage" name="" id="" cols="30" rows="10" placeholder="Your message *" required></textarea>
                            <button name="contactsubmit" type="submit">Send</button>
                        </div>
                    </form>

                    <address id="newsletter">
        <h2>Contact Information</h2>
        <p>
          <ion-icon name="pin"></ion-icon> 606 Oliver Road
          <br><ion-icon name="call"></ion-icon> +1 (647) 3363427 
          <br><ion-icon name="mail"></ion-icon> ajoseph5@lakeheadu.ca
        </p>
          <div class="social-icons">
          <ion-icon name="logo-facebook"><a href="www.facebook.com"></ion-icon>
          <ion-icon name="logo-googleplus"></ion-icon>
          <ion-icon name="logo-youtube"></ion-icon>
         </div>
      </address>
                </section>
            </div>

            <!-- container -->
            <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
        </div>

        <!--section6-->
        <div id="section6">

            <h1>TESTIMONIALS . . . .</h1>

            <h2 style="width:1200px">What Our Clients Say About Us</h2>
            <div class="contain">
                <img src="./images/sam.jpg" alt="sam" style="width:90px">
                <p><span>Samidha</span> Assistant Professor at Lakehead univ</p>
                <p>LILO car Wash has been a remarkable discovery. The quality of the wash, wax, and interior is far and away the best service I have received to date.</p>
            </div>

            <div class="contain">
                <img src="./images/suku.jpg" alt="suku" style="width:90px">
                <p><span>Sukumar</span> Deccan chief chef</p>
                <p>I would not hesitate to recommend your mobile car wash, as you far exceeded my expectations.</p>
            </div>

            <div class="contain">
                <img src="./images/gow.jpg" alt="gow" style="width:90px">
                <p><span>Gowtham</span> CEO of LCBA</p>
                <p>I hate driving a dirty car. I contacted LILO acar wash, you guys came to me promptly. By the time my meeting was finished my car was finished and spotless.</p>
            </div>

            <div class="contain">
                <img src="./images/sans.jpg" alt="sans" style="width:90px">
                <p><span>Sanjana</span> CEO of Arthur international</p>
                <p>LILO car wash, What a remarkable convenience. Better than that, my Porsche is glistening when I step outside. They are on time, professional, and totally honest. 5 stars!!!</p>
            </div>
        </div>

        <!--section5-->
        <div id="section5">
            <form action="" method="post" class="career">
                <h1>Join Our Team</h1>
                <p>Are you looking to join our winning team?</p>
                <p>We look forward to hearing from you. Please fill out the details below for consideration for a position with LILO car wash</p>
                <section id="boxes">
                    <div id="left-form">
                        Your Name
                        <br>
                        <input name="careername" type="text">
                        <br>
                        <br> Your Address
                        <br>
                        <input name="careeraddress" type="text">
                        <br>
                        <br> City
                        <br>
                        <input name="careercity" type="text">
                        <br>
                        <br> State
                        <br>
                        <input name="careerstate" type="text">
                        <br>
                        <br> Zip
                        <br>
                        <input name="careerzip" type="text">
                        <br>
                        <br>
                    </div>
                    <div id="right-form">
                        Phone
                        <br>
                        <input name="careerphone" type="Phone">
                        <br>
                        <br> Your email
                        <br>
                        <input name="careeremail" type="email">
                        <br>
                        <br> Employment History
                        <br>
                        <input name="careeremphist" type="text">
                        <br>
                        <br> Comments
                        <br>
                        <input name="careercomments" type="text">
                        <br>
                        <br>
                        <button name="careersubmit" type="submit">submit</button>
                    </div>
                </section>
            </form>

        </div>
    </body>

    <footer>

    </footer>
    <button onclick="topFunction()" id="Btn" title="Go to top">Top</button>

    </html>

    <?php

if (isset($_POST['contactsubmit'])) {

  if(!empty($_POST['contactname']) || !empty($_POST['contactemail']) || !empty($_POST['contactnumber']) || !empty($_POST['contactzip']) || !empty($_POST['contactmessage']) ) {
    $contactname = $_POST['contactname'];
    $contactemail = $_POST['contactemail'];
    $contactnumber = $_POST['contactnumber'];
    $contactzip = $_POST['contactzip'];
    $contactmessage = $_POST['contactmessage'];

    $sql = "INSERT INTO lilo_car_wash.contact (contactemail, contactname, contactnumber, contactzip, contactmessage) VALUES ('$contactemail','$contactname','$contactnumber','$contactzip','$contactmessage');"; 
    if(mysqli_query($conn, $sql)){
     echo "Message sent  successfully";
     echo '<script language="javascript">';
      echo 'alert("Message successfully sent")';
     echo '</script>';
     $contactname='';
     $contactemail='';
     $contactnumber='';
     $contactzip='';
     $contactmessage='';
     } 
 else{
     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
     }

}}

elseif(isset($_POST['careersubmit'])) {

  if(!empty($_POST['careername']) || !empty($_POST['careeraddress']) || !empty($_POST['careercity']) || !empty($_POST['careerstate']) || !empty($_POST['careerzip']) || !empty($_POST['careerphone']) || !empty($_POST['careeremail']) || !empty($_POST['careeremphist']) || !empty($_POST['careerzip']) ) {
    $careername = $_POST['careername'];
    $careeraddress = $_POST['careeraddress'];
    $careercity = $_POST['careercity'];
    $careerstate = $_POST['careerstate'];
    $careerzip = $_POST['careerzip'];
    $careerphone = $_POST['careerphone'];
    $careeremail = $_POST['careeremail'];
    $careeremphist = $_POST['careeremphist'];
    $careercomments = $_POST['careercomments'];

    $sql = "INSERT INTO lilo_car_wash.career (careername, careeraddress, careercity, careerstate, careerzip, careerphone, careeremail, careeremphist, careercomments) VALUES ('$careername','$careeraddress','$careercity','$careerstate','$careerzip','$careerphone','$careeremail','$careeremphist','$careercomments');"; 
    if(mysqli_query($conn, $sql)){
     echo "Message sent  successfully";
     echo '<script language="javascript">';
      echo 'alert("Message successfully sent")';
     echo '</script>';
     $careername='';
     $careeraddress='';
     $careercity='';
     $careerstate='';
     $careerzip='';
     $careerphone='';
     $careeremail='';
     $careeremphist='';
     $careercomments='';
     } 
 else{
     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
     }

}

}
elseif (isset($_POST['appointmentsubmit'])) {

  $amount=''; 
  if(isset($_POST['service']) && isset($_POST['car'])){

    if(($_POST['service'])=='1' && ($_POST['car'])=='1' ){
      $amount=45*1;

    }
    elseif(($_POST['service'])=='1' && ($_POST['car'])=='2' ){
      $amount=45*2;

    }
    elseif(($_POST['service'])=='1' && ($_POST['car'])=='3' ){
      $amount=45*3;

    }
    elseif(($_POST['service'])=='2' && ($_POST['car'])=='1' ){
      $amount=95*1;

    }
    elseif(($_POST['service'])=='2' && ($_POST['car'])=='2' ){
      $amount=95*2;

    }
    elseif(($_POST['service'])=='2' && ($_POST['car'])=='3' ){
      $amount=95*3;

    }
    elseif(($_POST['service'])=='3' && ($_POST['car'])=='1' ){
      $amount=175*1;

    }
    elseif(($_POST['service'])=='3' && ($_POST['car'])=='2' ){
      $amount=175*2;

    }
    elseif(($_POST['service'])=='3' && ($_POST['car'])=='3' ){
      $amount=175*3;

    }
  }

if(!empty($_POST['service']) && !empty($_POST['car']) && !empty($_POST['appdate']) && !empty($_POST['apptime']) ){
  $service=$_POST['service'];
  $car=$_POST['car'];
  $appdate=$_POST['appdate'];
  $apptime=$_POST['apptime'];
  $userId=NULL;
  $userstatus=1;
  $appointmentstatus=1;

  $query = "INSERT INTO lilo_car_wash.appointment (service,userId,amount,appointmentDate,appointmentTime,userStatus,appointmentStatus) values('$service','$userId','$amount','$appdate','$apptime','$userstatus','$appointmentstatus')"; 
  if(mysqli_query($conn, $query)){
    echo '<script language="javascript">';
    echo 'alert("Appointment is fixed, The estimated payment is '.$amount.'");' ; 
    echo '</script>';
    $service='';
    $car='';
    $appdate='';
    $apptime='';

   } 
 else{
  echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
}
 }
}
elseif (isset($_POST['newslettersubmit'])) {

  if(!empty($_POST['newsletteremail'])){ 

    $newsletterstatus = '1';
    $newsletteremail = $_POST['newsletteremail'];

    $query1 = "INSERT INTO lilo_car_wash.newsletter (newsletteremail, newsletterstatus) VALUES ('$newsletteremail','$newsletterstatus');"; 
    if(mysqli_query($conn, $query1)){
     echo '<script language="javascript">';
      echo 'alert("Newsletter saved successfully ")';
     echo '</script>';
     $newsletteremail = '';

     } 
 else{
     echo "ERROR: Could not able to execute $query1. " . mysqli_error($conn);
     }

}}

?>