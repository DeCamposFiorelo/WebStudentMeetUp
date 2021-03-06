<?php include "includes/header.php"?>
<?php include "includes/navigation.php"?>
    <header class="masthead" style="background-image:url('assets/images/book2.jpg');">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><span>Welcome To StudentMeetUp</span></div>
                <div class="intro-heading text-uppercase"><span>It's Nice To Meet You</span></div><a class="btn btn-mybutton btn-xl text-uppercase js-scroll-trigger" role="button" href="#login">Login</a></div>
        </div>
    </header>
    <!-- Login and register section-->   
    <section id="login" >
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <p class="text-muted">Login</p>
                        <form action="includes/login.php" method="post">
                        <div class="form-group"><input class="form" type="email" name="email" required="required"placeholder="Email"></div>
                        <div class="form-group"><input class="form" type="password" name="password" required="required"placeholder="Password"></div>
                        <div class="form-group"><button class="btn btn-mybutton" type="submit" name="login">Log In</button>
                        </div>
                    </form>
                 </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <!-- Register-->
                    <p class="text-muted">Register</p>
                        <form class="custom-form" action="includes/register.php"method="post">
                            <div class="form-row form-group">
                            <div class="form-group"><input class="form" type="text" name="firstName" required="required" placeholder="First Name"></div>
                            <div class="form-group"><input class="form" type="text" name="nickname" required="required" placeholder="Nickname"></div>
                            <div class="form-group"><input class="form" type="email" name="registerEmail" required="required" placeholder="Email"></div>
                            <div class="form-group"><label class="labelss">8 Caracters(Number,Upercase,Lowercase)</label><input class="form" type="password" name="registerPassword" required="required"  placeholder="Password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" ></div>
                            <div class="form-group"><input class="form" type="password" name="repeatPassword" required="required" placeholder="Repeat Password"></div>
                            <div class="form-group"><input class="form" type="text" name="description" required="required" placeholder="Description"></div>
                            </div>
                            <div class="form-row form-group">
                            <div class="custom-form">
                            <div class="form-group"> 
                            <select name="course">
                                 <option>IT</option>
                                 <option>Business</option>
                                 <option>Others</option>
                            </select>
                            </div>
                            <button class="btn btn-mybutton" type="submit" name="submit" >Register</button>
                        </div>
                    </form>
                 </div>
    </section>
    <!-- Team section-->
    <section id="team" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member"><img class="rounded-circle mx-auto" src="assets/images/suelenfiorelo.jpg">
                        <h4>Suelen Fiorelo</h4>
                        <p class="text-muted">Web Developer</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member"><img class="rounded-circle mx-auto" src="assets/images/alejandrozeballos.jpg">
                        <h4>Alejandro Zeballos</h4>
                        <p class="text-muted">Software Developer</p>     
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member"><img class="rounded-circle mx-auto" src="assets/images/jamesharris.jpg">
                        <h4>James Harris</h4>
                        <p class="text-muted">Database administrator</p>      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include "includes/footer.php"?>
    