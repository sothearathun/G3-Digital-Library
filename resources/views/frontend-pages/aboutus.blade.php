
<!-- 
this page will be static since we wont really be editing much or often 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Digitales</title>



    <!-- style sheet -->
    <link rel="stylesheet" href="{{ asset('css/web/aboutus.css') }}">
</head>
<body>

    <!-- header -->
     <x-navigation.header/>


    <div class="container">
        <!-- About Us Section -->
        <section class="section">
            <h2 class="section-title">About Us</h2>
            <div class="about-content">
                <p style="font-weight: bold;">Welcome to our Digitales website!</p>
                <p>Hello! We are a group of 3 students,  from Paragon International University, who are passionate about books and technology.This is a group project for our web development class, and we are excited to share it with you.</p>
            </div>
        </section>

        <!-- Our Mission Section -->
        <section class="section">
            <h2 class="section-title">Our Mission</h2>
            <div class="mission-grid">
                <div class="mission-item">
                    <div class="mission-icon">🎯</div>
                    <h3>Dynamic Digital Library</h3>
                    <p>Our mission is to provide a dynamic digital library that caters to the diverse needs of our community.</p>
                </div>
                <div class="mission-item">
                    <div class="mission-icon">📈</div>
                    <h3>Connect with Community</h3>
                    <p>We believe in fostering a sense of community and collaboration among our users.</p>
                </div>
                <div class="mission-item">
                    <div class="mission-icon">⭐</div>
                    <h3>Enhance Reading Experience</h3>
                    <p>We are committed to improving the reading experience for our users.</p>
                </div>
            </div>
        </section>

        <div class="divider"></div>

        <!-- Contributors Section -->
        <section class="section team-section">
           

            <div class="team-role">
                <h3>Developer Team</h3>
                <div class="team-grid">
                    <div class="team-member">
                        <img src="img/AboutUs_Profile/image.png" alt="Sotheara Thun" class="member-photo">
                        <div class="member-name">Sotheara Thun</div>
                    </div>
                    <div class="team-member">
                        <img src="img/AboutUs_Profile/image.png" alt="Kimleng Huot" class="member-photo">
                        <div class="member-name">Kimleng Huot</div>
                    </div>
                    <div class="team-member">
                        <img src="img/AboutUs_Profile/image.png" alt="Kakada Huot" class="member-photo">
                        <div class="member-name">Kakada Huot</div>
                    </div>
                </div>
            </div>
        </section>

        <div class="divider"></div>
    </div>



    <!-- footer -->
     <x-navigation.footer/>

    
</body>
</html>