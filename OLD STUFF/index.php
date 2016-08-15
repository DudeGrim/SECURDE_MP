<?php
    include('/PHP/login.php'); // Includes Login Script
    include('/PHP/register.php'); // Includes Register Script
    if(isset($_SESSION['iduser']))
    {
        header("location: homepage.html");
    }
?>
    <html>
    <!--<![endif]-->

    <head>
        <title>Russelio's Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />

        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="CSS/demo.css" />
        <link rel="stylesheet" type="text/css" href="CSS/style.css" />
        <link rel="stylesheet" type="text/css" href="CSS/animate-custom.css" />
    </head>

    <body>
        <div class="container">
            <header>
                <h1>Russelio's Shop</h1>
            </header>
            <section>
                <div id="container_demo">
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form class="login" action="" autocomplete="on" method="post">
                                <h1>Log in</h1>
                                <p>
                                    <label for="email" class="uname" data-icon="u"> Your email or username </label>
                                    <input id="email" name="email" required="required" type="text" placeholder="mymail@mail.com" />
                                </p>
                                <p>
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="*******" />
                                </p>
                                <p class="keeplogin">
                                    <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
                                    <label for="loginkeeping">Keep me logged in</label>
                                </p>
                                <p class="login button">
                                    <input type="submit" name="login" value="login" />
                                </p>
                                <p class="change_link">
                                    Not a member yet ?
                                    <a href="#toregister" class="to_register">Join us</a>
                                </p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form action="" autocomplete="on" method="post">
                                <h1> Sign up </h1>
                                <p>
                                    <label for="usernamesignup" class="uname" data-icon="u">username</label>
                                    <input id="username" name="username" required="required" type="text" placeholder="Display Name" />
                                </p>
                                <p>
                                    <label for="emailsignup" class="youmail" data-icon="e"> email</label>
                                    <input id="emailsignup" name="email" required="required" type="email" placeholder="mysupermail@mail.com" />
                                </p>
                                <p>
                                    <label for="firstName" class="uname" data-icon="u">First Name</label>
                                    <input id="firstName" name="firstName" required="required" type="text" placeholder="Russel" />
                                </p>
                                <p>
                                    <label for="middleInitial" class="uname" data-icon="u">Middle Initial</label>
                                    <input id="middelInitial" name="middleInitial" required="required" type="text" placeholder="C" />
                                </p>
                                <p>
                                    <label for="lastName" class="uname" data-icon="u">Last Name</label>
                                    <input id="lastName" name="lastName" required="required" type="text" placeholder="Andrade" />
                                </p>
                                <p>
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
                                </p>
                                <p>
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordConfirm" required="required" type="password" placeholder="eg. X8df!90EO" />
                                </p>
                                <!--
                                <p>
                                    <label for="billingAddressHouse" class="uname" data-icon="p">Billing Address</label>
                                    <input id="passwordsignup_confirm" name="billingAddress" required="required" type="text" placeholder="1234" />
                                </p>
                                <p>
                                    <label for="shippingAddress" class="uname" data-icon="p">Shipping Address</label>
                                    <input id="passwordsignup_confirm" name="shippingAddress" required="required" type="text" placeholder="1234" />
                                </p>
-->
                                <p class="signin button">
                                    <input type="submit" name="register" value="register" />
                                </p>
                                <p class="change_link">
                                    Already a member ?
                                    <a href="#tologin" class="to_register"> Go and log in </a>
                                </p>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </body>

    </html>