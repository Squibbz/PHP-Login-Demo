<?php
    include_once 'header.php';
    include 'includes/library.php';

    // On loading home page, make 'accounts' table if it does not already exist
    make_table();
?>

<div class="index-wrapper">
    <section class="index-intro showcase">
        <h1></h1>
        <span>
            <h1>Caleb Burgin</h1>
            <h1>Portfolio Webpage</h1>
            <hr class="divider">
        </span>
        <p>This webpage acts as a hub to access all of my projects. The page itself is a project which includes back-end PHP for login functions and a protected page that is inaccessable to people who are not members.</p>
        
    </section>

    <section class="protected-dash top-box-a">
        <span>
            <h1>Protected Page</h1>
            <hr class="divider">
        </span>
        
        <p>Try accessing the protected page of this site without being logged in!</p>

        <a href="../project/protected.php"class="btn">View</a>
    </section>

    <section class="github-dash top-box-b">
    <span>
            <h1>View My Latest Projects</h1>
            <hr class="divider">
        </span>
        
        <p>Visit my GitHub page to see all of my open-source projects!</p>

        <a href="https://github.com/Squibbz"class="btn">View</a>
    </section>
</div>

<div class="portfolio-wrapper">

    <section class="portfolio-item">
        <h1>PHP Webpage</h1>
    </section>
    <section class="portfolio-item">
        <h1>Discord Bot</h1>
    </section>
    <section class="portfolio-item">
        <h1>Filler</h1>
    </section>
    <section class="portfolio-item">
        <h1>Filler</h1>
    </section>

</div>

</div>

</body>
</html>