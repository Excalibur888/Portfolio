<?php
$bdd = new PDO("mysql:host=localhost;dbname=SitePerso;charset=utf8", "root", "root");
$bdd->query("SET lc_time_names = 'fr_FR'");

$portfolio = $bdd->prepare('SELECT * FROM websites ORDER BY id DESC LIMIT 5');

$portfolio->execute();

$display = $portfolio->fetchAll();


// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['identity'], $_POST['email'], $_POST['message'])) {
        if (!empty($_POST['identity']) and !empty($_POST['email']) and !empty($_POST['message'])) {

            $identity = $_POST['identity'];
            $email = $_POST['email'];
            $company = $_POST['company'];
            $message = $_POST['message'];
            $ins = $bdd->prepare('INSERT INTO messages (identity , email, company, message) VALUES (?, ?, ?, ?)   ');
            $ins->execute(array($identity, $email, $company, $message));
            $btnmessage = "Sent !";
        } else {
            $btnmessage = "Please complete all fields with an * - Try again";
        }
    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ARTHUR DUMOND | Portfolio</title>
    <meta name="description" content="Welcome to Arthur's portfolio, I'm a young student and web dev enthusiast! Come see my work!">
    <meta name="keywords" content="arthur dumond portfolio esiea laval brive dev development developpement web webdev website">
    <meta name="robots" content="index,follow">

    <meta property="og:title" content="Arthur's Portfolio" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Welcome to Arthur's portfolio, I'm a young student and web dev enthusiast! Come see my work!" />
    <meta property="og:url" content="https://dumond.dev" />
    <meta property="og:image" content="https://dumond.dev/assets/Graphics/Logo/logo3d.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@600;700&family=Oxygen:wght@300;400;700&display=swap"
          rel="stylesheet">
    <link id="stylesheet" rel="stylesheet" href="css/style.css">
    <link id="stylesheet" rel="stylesheet" href="css/adaptability.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="js/libs/aos-master/dist/aos.css" />
    <script src="https://unpkg.com/typeit"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/Flip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/Observer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollToPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/Draggable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/EaselPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/MotionPathPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/PixiPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/TextPlugin.min.js"></script>
    <link rel="icon" href="assets/Graphics/Logo/logo3d.png">
</head>
<body onselectstart="return false">
<loader>
    <img src="assets/Graphics/Logo/logo3d.png" alt="Logo">
</loader>
<header>
    <div id="trees-bck"></div>
    <img id="trees" src="assets/Graphics/Background/pngegg-o.svg" alt="">
    <div id="logodiv">
        <img class="logo" id="logoimg" src="assets/Graphics/Logo/logo3d.png" alt="Logo">
        <h1 class="logo" id="logotext">rthur D</h1>
        <h1 class="logo" id="logopoint">.</h1>
    </div>
    <p id="welcomemsg"></p>
</header>
<main>
    <div class="section" id="wym">
        <img class="ill-pic" id="wym-img" src="assets/Pics/work.png" alt="" data-aos="fade-right">
        <div class="band-txt" id="wym-txt">
            <h2 class="section-title" data-aos="fade-left"><span class="blue-higlight" >W</span>ho am I</h2>
            <p data-aos="fade-left">Student in an engineering school, I'm <span class="blue-higlight">French</span>, and I'm <span class="blue-higlight">17</span> years old.<br>My
                passions are: <span class="blue-higlight">Travel</span>,
                <span class="blue-higlight">Technology</span>, <span class="blue-higlight">Surf</span>, <span class="blue-higlight">WebDesign</span>,
                <span class="blue-higlight">Development</span>, <span class="blue-higlight">Video Games</span>...<br>I hope you can appreciate my work
                through
                this portfolio. <br><br><br> <span class="blue-higlight">Contact me</span> with the form at the end of this website!</p>
            <button data-aos="zoom-in" class="cssdisable" id="disablecss" onclick="disableCss()">Why Webdesign is important?</button>
            <h1 style="position: fixed; top:50%; left:50%; background: #00a1a6; font-size: 4vw; font-family:sans-serif; margin-top: -2vw; width: 40vw; margin-left: -20vw; text-align: center;" id="bcsot">Because of this!!!</h1>
            <button class="cssdiable" style="position: fixed; top:50%; left:50%; background: #00a1a6; font-size: 2vw; font-family: sans-serif; height: 6vw; margin-top:3.5vw; border: solid .2vw black; width: 40vw; margin-left: -20vw; text-align: center;" id="enablecss" onclick="enableCss()">Return to the magical world of wedesign</button>
        </div>
    </div>
    <div class="section" id="portfolio">
        <h2 class="section-title" data-aos="zoom-in"><span class="blue-higlight">P</span>ortfolio</h2>
        <div id="illustrations" data-aos="zoom-in">
            <?php foreach ($display as $item) { ?>
                    <a class="work work<?php echo $item['id']; ?>" >
                        <img src="assets/Portfolio/<?php echo $item['picture']; ?>" alt="Website screenshot">
                        <div class="subject">
                            <h2><?php echo $item['title']; ?></h2>
                            <p><?php echo $item['description']; ?></p>
                        </div>
                    </a>

            <?php } ?>
        </div>
    </div>
    <div class="section" id="contact">
        <h2 class="section-title" data-aos="fade-right"><span class="blue-higlight">C</span>ontact</h2>
        <form method="POST" enctype="multipart/form-data" id="contact-form">
            <label data-aos="fade-right" for="name-field">Name</label>
            <input data-aos="fade-right" type="text" name="identity" id="name-field" placeholder="Tim Berners-Lee" required>
            <label data-aos="fade-right" for="email-field">Email</label>
            <input data-aos="fade-right" type="email" name="email" id="email-field" placeholder="tim.bl@email.com" required>
            <label data-aos="fade-right" for="company-field">Company (Optional)</label>
            <input data-aos="fade-right" type="text" name="company" id="company-field" placeholder="Nasa">
            <label data-aos="fade-right" for="text-field">Message</label>
            <textarea data-aos="fade-right" name="message" id="text-field"
                      placeholder="What an amazing website, I would love to work with you!" required></textarea>
            <button data-aos="zoom-in" type="submit" name="submit" id="submit-button">
                <?php if (isset($btnmessage)) {
                    echo $btnmessage;
                } else { ?>
                    Send
                <?php } ?>
            </button>
        </form>
    </div>


</main>
<footer>

</footer>
<div id="contextMenu" class="context-menu" style="display: none">
    <ul>
        <li class="share"><a href="#">Go on top</a></li>
        <li class="link"><a href="#welcomemsg">Who am I</a></li>
        <li class="rename"><a href="#portfolio">Portfolio</a></li>
        <li class="copy"><a href="#contact">Contact</a>
        </li>
    </ul>
</div>
<script src="js/libs/aos-master/dist/aos.js"></script>
<script>
    $(function() {
        AOS.init({
            delay: 0,
            duration: 400,
            once: true
        });
    });
</script>
<script src="js/script.js"></script>
<script src="js/context_menu.js"></script>
<script src="js/work_swap.js"></script>-
</body>
</html>