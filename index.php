<?php

include 'connect.php';

// Fetch programming skill data from the database
$query = "SELECT * FROM programing where id=1";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

// Loop through the fetched data and display it
//while ($row = mysqli_fetch_assoc($result)) 

$res = mysqli_query($connection, 'select * from profile where id=1');
$profile_row = mysqli_fetch_array($res);

$res1 = mysqli_query($connection, 'select * from about where id=1');
$about_row = mysqli_fetch_array($res1);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Portfolio</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="mediaqueries.css" />
</head>

<body>
  <nav id="desktop-nav">
    <div class="logo">Anik Ekka</div>
    <div>
      <ul class="nav-links">
        <li><a href="#about">About</a></li>
        <li><a href="#experience">Experience</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#publication">Publications</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="login.php">Login</a></li>
        <!-- <button id="login_btn_id">Login</button> -->
      </ul>
    </div>
  </nav>
  <nav id="hamburger-nav">
    <div class="logo">Anik Ekka</div>
    <div class="hamburger-menu">
      <div class="hamburger-icon" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="menu-links">
        <li><a href="#about" onclick="toggleMenu()">About</a></li>
        <li><a href="#experience" onclick="toggleMenu()">Experience</a></li>
        <li><a href="#projects" onclick="toggleMenu()">Projects</a></li>
        <li><a href="#publication" onclick="toggleMenu()">Publications</a></li>
        <li><a href="#contact" onclick="toggleMenu()">Contact</a></li>
        <li><a href="login.php" onclick="toggleMenu()">Login</a></li>
      </div>
    </div>
  </nav>
  <section id="profile">
    <div class="section__pic-container">
      <!-- <img src="./assets/profile-pic.png" alt="John Doe profile picture" /> -->
      <img src="<?php echo 'profile/uploads/' . $profile_row['image']; ?>" alt="Anik profile picture" />
    </div>
    <div class="section__text">
      <p class="section__text__p1">Hello, I'm</p>
      <h1 class="title">Anik Ekka</h1>
      <p class="section__text__p2"><?php echo $profile_row['description']; ?></p>
      <div class="btn-container">
        <button class="btn btn-color-2" onclick="window.open('<?php echo $profile_row['cv_link']; ?>')">
          Download CV
        </button>
        <button class="btn btn-color-1" onclick="window.open('<?php echo $profile_row['contact_link']; ?>')">
          Contact Info
        </button>
      </div>
      <div id="socials-container">
        <img src="./assets/linkedin.png" alt="My LinkedIn profile" class="icon" onclick="location.href='<?php echo $profile_row['linkedin_link']; ?>'" />
        <img src="./assets/github.png" alt="My Github profile" class="icon" onclick="location.href='<?php echo $profile_row['github_link']; ?>'" />
      </div>
    </div>
  </section>
  <section id="about">
    <p class="section__text__p1">Get To Know More</p>
    <h1 class="title">About Me</h1>
    <div class="section-container">
      <div class="section__pic-container">
        <!-- <img src="./assets/about-pic.png" alt="Profile picture" class="about-pic"/> -->
        <img src="<?php echo 'about/uploads/' . $about_row['image_about'];?>" alt="Profile picture" class="about-pic" />

      </div>
      <div class="about-details-container">
        <div class="about-containers">
          <div class="details-container">
            <img src="./assets/experience.png" alt="Experience icon" class="icon" />
            <h3>Experience</h3>
            <p><?php echo $about_row['experience']; ?></p>
          </div>
          <div class="details-container">
            <img src="./assets/education.png" alt="Education icon" class="icon" />
            <h3>Education</h3>
            <p><?php echo $about_row['education']; ?></p>
          </div>
        </div>
        <div class="text-container">
          <p>
          <?php echo $about_row['about']; ?>
          </p>
        </div>
      </div>
    </div>
    <img src="./assets/arrow.png" alt="Arrow icon" class="icon arrow" onclick="location.href='./#experience'" />
  </section>
  <section id="experience">
    <p class="section__text__p1">Explore My</p>
    <h1 class="title">Experience</h1>
    <div class="experience-details-container">
      <div class="about-containers">
        <div class="details-container">
          <h2 class="experience-sub-title">Progrming Skill</h2>
          <div class="article-container">
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />



              <div>
                <h3>HTML</h3>
                <p><?php echo $row['html']; ?></p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>CSS</h3>
                <p><?php echo $row['css']; ?></p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>C programing</h3>
                <p><?php echo $row['c_programing']; ?>e</p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>JavaScript</h3>
                <p><?php echo $row['java_script']; ?></p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>C++ programing</h3>
                <p><?php echo $row['c++programing']; ?></p>
              </div>
            </article>
            <article>

              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>Python</h3>
                <p><?php echo $row['python']; ?></p>
              </div>
            </article>
          </div>
        </div>
        <div class="details-container">
          <h2 class="experience-sub-title">Knowledge</h2>
          <div class="article-container">
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <?php
              $query = "SELECT * FROM know where id=1";
              $result = mysqli_query($connection, $query);
              $know_row = mysqli_fetch_assoc($result);



              ?>



              <div>
                <h3>Windows</h3>
                <p><?php echo $know_row['windows']; ?></p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>Linux</h3>
                <p><?php echo $know_row['linux']; ?></p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>Database</h3>
                <p><?php echo $know_row['data_base']; ?></p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>Git</h3>
                <p><?php echo $know_row['git']; ?></p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>Machine Learning</h3>
                <p><?php echo $know_row['machine_learning']; ?></p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>Cyber Security</h3>
                <p><?php echo $know_row['cyber_security']; ?></p>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
    <img src="./assets/arrow.png" alt="Arrow icon" class="icon arrow" onclick="location.href='./#projects'" />
  </section>
  <section id="projects">
    <p class="section__text__p1">Browse My Recent</p>
    <h1 class="title">Projects</h1>
    <div class="experience-details-container">
      <div class="about-containers">
        <div class="details-container color-container">
          <div class="article-container">
            <img src="./assets/project1.png" alt="Project 1" class="project-img" />
          </div>
          <h2 class="experience-sub-title project-title">Project One</h2>
          <div class="btn-container">
            <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/slasherror/OPP_cpp_E-commerce_project'">
              Github
            </button>
          </div>
        </div>
        <div class="details-container color-container">
          <div class="article-container">
            <img src="./assets/project2.png" alt="Project 2" class="project-img" />
          </div>
          <h2 class="experience-sub-title project-title">Project Two</h2>
          <div class="btn-container">
            <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/slasherror/Teleport-Java-Desktop-App'">
              Github
            </button>
          </div>
        </div>
        <div class="details-container color-container">
          <div class="article-container">
            <img src="./assets/project3.png" alt="Project 3" class="project-img" />
          </div>
          <h2 class="experience-sub-title project-title">Project Three</h2>
          <div class="btn-container">
            <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">
              Github
            </button>
            <!-- <button
                class="btn btn-color-2 project-btn"
                onclick="location.href='https://github.com/'"
              >
                Live Demo
              </button> -->
          </div>
        </div>
      </div>
    </div>
    <img src="./assets/arrow.png" alt="Arrow icon" class="icon arrow" onclick="location.href='./#contact'" />
  </section>
  <section id="contact">
    <p class="section__text__p1">Get in Touch</p>
    <h1 class="title">Contact Me</h1>
    <div class="contact-info-upper-container">
      <div class="contact-info-container">
        <img src="./assets/email.png" alt="Email icon" class="icon contact-icon email-icon" />
        <p><a href="mailto:anikekka11@gmail.com">anikekka11@gmail.com</a></p>
      </div>
      <div class="contact-info-container">
        <img src="./assets/linkedin.png" alt="LinkedIn icon" class="icon contact-icon" />
        <p><a href="https://www.linkedin.com/in/anik-ekka-040877268/">LinkedIn</a></p>
      </div>
    </div>
  </section>
  <footer>
    <nav>
      <div class="nav-links-container">
        <ul class="nav-links">
          <li><a href="#about">About</a></li>
          <li><a href="#experience">Experience</a></li>
          <li><a href="#projects">Projects</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>
    </nav>
  </footer>
  <script src="script.js"></script>
  <!-- <script>
    document.getElementById("login_btn_id").addEventListener("click", function(){
      window.location.href = "login.php";
    });
  </script> -->
</body>

</html>