<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
</head>
<style>
    /* Reset some basic styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #1c1c1c;
    color: #fff;
    overflow-x: hidden;
}

header {
    display: flex;
    justify-content: space-between; /* Aligns logo to left and menu to right */
    align-items: center;
    padding: 10px 20px;
    background-color: #68829f;
    height: 130px;
    position: fixed; /* Fixes the header at the top */
    top: 0; /* Positions the header at the top of the page */
    left: 0; /* Ensures it stretches from the left edge */
    right: 0; /* Ensures it stretches to the right edge */
    z-index: 1000; /* Ensures it's on top of other elements */
}


nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    font-size: 1.4em;
    transition: color 0.3s;
}

nav ul li a:hover {
    color: #ccc; /* Color change on hover */
}

/* The content will always be visible */
#alwaysVisibleContent {
    background-color: #f0f0f0;
    padding: 10px;
    margin-top: 20px; /* Add some space between the header and this content */
}


.logo img {
    margin-top: 4%;
    width: 100%;
    margin-left: -15%;
    max-height: 200px;
    opacity: 0;
    transform: scale(0.5); /* Start with smaller size */
    animation: popUpEffect 0.8s ease-out forwards; /* Apply pop-up animation */
}

/* Keyframes for pop-up effect */
@keyframes popUpEffect {
    0% {
        opacity: 0;
        transform: scale(0.5); /* Small and invisible */
    }
    60% {
        opacity: 1;
        transform: scale(1.1); /* Slight overshoot for bounce effect */
    }
    100% {
        opacity: 1;
        transform: scale(1); /* Settle to normal size */
    }
}

/* Navigation Styles */
nav ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    font-size: 1.4em;
    transition: color 0.3s;
    padding: 10px 20px; /* Adjust top-bottom and left-right padding as needed */
}


nav ul li a:hover {
    color: #ff6f61; /* Change color on hover */
}


/* Hero Section */
.hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 100vh;
    padding: 0 20px;
    background-color: #2d3a48;
    color: #fff;
   
}

/* Hero Image on the Left */
.hero-image {
    flex: 1;
    display: flex;
    justify-content: center;
    opacity: 0;
    transform: translateX(-50px); /* Start off-screen on the left */
    animation: slideIn 3s ease-out forwards; /* Apply left-to-right animation */
}

/* Define the left-to-right keyframes */
@keyframes slideIn {
    0% {
        opacity: 0;
        transform: translateX(-300px); /* Start from left */
    }
    100% {
        opacity: 1;
        transform: translateX(0); /* End at original position */
    }
}

.hero-image img {
    max-width: 100%;
    height: 500px;
    border-radius: 300px;
}

/* Hero Content on the Right */
.hero-content {
    flex: 1;
    text-align: left;
    opacity: 0;
    transform: translateX(50px); /* Start off-screen on the right */
    animation: slideInRightToLeft 1s ease-out forwards; /* Apply right-to-left animation */
}

.hero-content h1 {
    margin-top: -160px;
    font-size: 3em;
    margin-bottom: 13px;
}

.hero-content p {
    font-size: 1.2em;
    margin-bottom: 80px;
}

.cta-button {
    background-color: #ff6f61;
    padding: 15px 30px;
    text-decoration: none;
    color: #fff;
    border-radius: 30px;
    font-weight: bold;
    transition: transform 0.6s ease;
}

/* Keyframes for right-to-left animation */
@keyframes slideInRightToLeft {
    0% {
        opacity: 0;
        transform: translateX(50px); /* Start from right */
    }
    100% {
        opacity: 1;
        transform: translateX(0); /* End at original position */
    }
}

.cta-button:hover {
    transform: scale(1.1);
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes popUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Media Query for Mobile */
@media screen and (max-width: 768px) {
    .hero {
        flex-direction: column;
        text-align: center;
    }

    .hero-image {
        margin-top: 20px;
    }

    .hero-content {
        text-align: center;
    }
}

.cta-button {
    background-color: #ff6f61;
    padding: 15px 30px;
    text-decoration: none;
    color: #fff;
    border-radius: 30px;
    font-weight: bold;
    transition: transform 0.3s ease;
}

.cta-button:hover {
    transform: scale(1.1);
}

/* About Section */
.about {
    padding: 60px 20px;
    background-color: #68829f;
    text-align: center;
    animation: fadeInUp 2s ease-out;
}

.about h2 {
    margin-top: 10%;
    margin-left: 600px;
    font-size: 2.5em;
    margin-bottom: 20px;
}

.about p {
    margin-left: 600px;
    font-size: 1.2em;
    line-height: 1.6;
}

/* Projects Section */
.projects {
    padding: 60px 20px;
    text-align: center;
    background-color: #f3f5f9;
    animation: fadeInUp 2s ease-out;
}

.projects h2 {
    margin-top: 10%;
    color: #2d3a48;
    font-size: 2.5em;
    margin-bottom: 30px;
}

.project-cards {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.card {
    background-color: #2d3a48;
    padding: 20px;
    width: 250px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
}

.card:hover {
    transform: scale(1.05);
}

.card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 10px;
}

.card h3 {
    margin-top: 15px;
    font-size: 1.5em;
}

.card p {
    font-size: 1em;
}

/* Contact Section */
.contact {
    padding: 60px 20px;
    background-color: #2d3a48;
    text-align: center;
    animation: fadeInUp 2s ease-out;
}

.contact h2 {
    font-size: 2.5em;
    margin-bottom: 20px;
}

.contact p {
    font-size: 1.2em;
    margin-bottom: 20px;
}

/* Footer */
footer {
    background-color: #2d3a48;
    color: #f3f5f9;
    text-align: center;
    padding: 20px;
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
.logout-button {
    background-color: #ff6f61;
    padding: 10px 20px;
    text-decoration: none;
    color: white;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.logout-button:hover {
    background-color: #d65a4f;
}


</style>

<body>

 <!-- Header -->
<header>
    <div class="logo">
        <img src="6.png" alt="Logo">
    </div>
    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="logout.php" class="logout-button">Log Out</a></li>
        </ul>
    </nav>
</header>

<div id="alwaysVisibleContent">
    This content is always visible!
</div>
    <!-- Hero Section -->
    <section id="home" class="hero">
    <div class="hero-image">
        <img src="image.jpg" alt="Your Image">
    </div>
    <div class="hero-content">
        <h1>Welcome to My Portfolio</h1>
        <p>Web Developer | Designer </p>
        <a href="#about" class="cta-button">Learn More</a>
    </div>
</section>


    <!-- About Section -->
    <section id="about" class="about">
        <h2>About Me</h2>
        <p>Hi, I’m Junryl Amorganda, a passionate web developer with experience in front-end and back-end technologies. (JOKE)</p>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects">
        <h2>My Projects</h2>
        <div class="project-cards">
            <div class="card">
                <img src="project1.jpg" alt="Project 1">
                <h3>Project 1</h3>
                <p>Short description of the project.</p>
            </div>
            <div class="card">
                <img src="project2.jpg" alt="Project 2">
                <h3>Project 2</h3>
                <p>Short description of the project.</p>
            </div>
            <!-- Add more projects as needed -->
        </div>
    </section>

    <!-- Contact Section -->
<section id="contact" class="contact">
    <h2>Contact Me</h2>
    <p>Feel free to reach out to me!</p>
    <form action="contact_submit.php" method="POST" style="max-width: 600px; margin: 0 auto;">
        <div style="margin-bottom: 20px;">
            <label for="name" style="display: block; text-align: left; font-size: 1.2em;">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your Name" required 
                style="width: 100%; padding: 10px; border: none; border-radius: 5px; font-size: 1em;">
        </div>
        <div style="margin-bottom: 20px;">
            <label for="email" style="display: block; text-align: left; font-size: 1.2em;">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your Email" required 
                style="width: 100%; padding: 10px; border: none; border-radius: 5px; font-size: 1em;">
        </div>
        <div style="margin-bottom: 20px;">
            <label for="message" style="display: block; text-align: left; font-size: 1.2em;">Message:</label>
            <textarea id="message" name="message" placeholder="Your Message" rows="5" required 
                style="width: 100%; padding: 10px; border: none; border-radius: 5px; font-size: 1em;"></textarea>
        </div>
        <div>
            <button type="submit" style="background-color: #ff6f61; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 1.2em; cursor: pointer; font-weight: bold;">
                Submit
            </button>
        </div>
    </form>
</section>


   

    <script> // Smooth Scroll Effect
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
></script>
</body>
</html>
