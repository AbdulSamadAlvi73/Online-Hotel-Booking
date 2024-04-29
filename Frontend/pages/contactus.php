<?php
// include("../Admin/conn.php");
session_start();
$conn = mysqli_connect('localhost','root','','royal_edge');

if(isset($_POST['submit'])){
   
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $contact_query = "INSERT INTO `contact_us` (`name`, `email`,`message`) VALUES ('$name','$email','$message')";
  $query_run = mysqli_query($conn,$contact_query); 
 
  $msg="Thanks Your Message is Submited";
	
	$html="
    <h2 style='font-size:13px;'>Someone wants to connecting with us:</h2>
    <table>
    <tr>
    <th style='text-align:left;'>Name:</th>
    <td>$name</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Email:</th>
    <td>$email</td>
    </tr>
    <tr>
    <th style='text-align:left;'>Message:</th>
    <td>$message</td>
    </tr>
    </table>";
	
	include('../smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="samadalvihafizabdul@gmail.com";
	$mail->Password="oyam wefr dmxn edih";
	$mail->SetFrom("samadalvihafizabdul@gmail.com");
	$mail->addAddress("abdulsamadalvi73@gmail.com");
	$mail->IsHTML(true);
	$mail->Subject="Royal Edge - Contact Us";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		//echo "Mail send";
	}else{
		//echo "Error occur";
	}
	// echo $msg; 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">


    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Royal Edge</title>

    <style>

:root {
  /* --header-height: 3.5rem; */

  /* colors */
  --hue: 152;
  --first-color: #58483b;
  --first-color-alt: #9b8977;
  --first-color-light: #1a1714;
  --first-color-lighten: #9b8977;
  --title-color: #1a1714;
  --text-color: #1a1714;
  --text-color-light: #58483b;
  --body-color: hsl(var(--hue), 0%, 100%);
  --container-color: #FFF;

  /* font */
  /* --body-font: 'Poppins', sans-serif; */
  --big-font-size: 4rem;
  /* --h1-font-size: 1.5rem; */
  --h2-font-size: 1.25rem;
  --h3-font-size: 1rem;
  --normal-font-size: .938rem;
  --small-font-size: .813rem;
  --smaller-font-size: .75rem;

  --font-medium: 500;
  --font-semi-bold: 600;

  --mb-0-5: .5rem;
  --mb-0-75: .75rem;
  --mb-1: 1rem;
  --mb-1-5: 1.5rem;
  --mb-2: 2rem;
  --mb-2-5: 2.5rem;
/* 
  --z-tooltip: 10;
  --z-fixed: 100; */
}

/* Responsive typography */
@media screen and (min-width: 968px) {
  :root {
    --big-font-size: 3.5rem;
    --h1-font-size: 2.25rem;
    --h2-font-size: 1.5rem;
    --h3-font-size: 1.25rem;
    --normal-font-size: 1rem;
    --small-font-size: .875rem;
    --smaller-font-size: .813rem;
  }
}

/* base */
*{
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}

html{
  scroll-behavior: smooth;
}

body,
button,
input,
textarea{
  font-family: var(--body-font);
  font-size: var(--normal-font-size);
}

body{
  margin: var(--header-height) 0 0 0;
  background-color: var(--body-color);
  color: var(--text-color);
  transition: .4s;
}

button{
  cursor: pointer;
  border: none;
  outline: none;
}

h1,h2,h3{
  color: var(--title-color);
  font-weight: var(--font-semi-bold);
}

ul{
  list-style: none;
}

a{
  text-decoration: none;
}

img{
  max-width: 100%;
  height: auto;
}

/* Dark theme */
body.dark-theme{
  --first-color-dark: #58483b;
  --title-color: #ebe3db;
  --text-color: #ebe3db;
  --body-color: #1a1714;
  --container-color: #9b8977;
}
/* btn dark light */
.change-theme{
  color: var(--title-color);
  font-size: 1.15rem;
  cursor: pointer;
}

.nav__btns{
  display: inline-flex;
  align-items: center;
  column-gap: 1rem;
}

/* colourchanges */

.dark-theme .steps__bg,
.dark-theme .questions{
  background-color: var(--first-color-dark);
}

.dark-theme .product__circle,
.dark-theme .footer__subscribe{
  background-color: var(--container-color);
}




.section{
  padding: 3rem 0 1rem;
}

.section__title,
.section__title-center{
  font-size: var(--h2-font-size);
  margin-bottom: var(--mb-2);
  line-height: 140%;
}

.section__title-center{
  text-align: center;
}

.container{
  max-width: 1100px;
  margin-left: var(--mb-1-5);
  margin-right: var(--mb-1-5);
}

.grid{
  display: grid;
}

.main{
  overflow: hidden;
}
/* header */
.header{
  width: 100%;
  background-color: var(--body-color);
  position: fixed;
  top: 0;
  left: 0;
  z-index: var(--z-fixed);
  transition: .4s; 
}

/* nav */
.nav{
  height: var(--header-height);
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.nav__logo,
.nav__toggle,
.nav__close{
  color: var(--title-color);
}

.nav__logo{
  text-transform: uppercase;
  font-weight: 700;
  letter-spacing: -1px;
  display: inline-flex;
  align-items: center;
  column-gap: .5rem;
  transition: .3s;
}

.nav__logo-icon{
  font-size: 1.15rem;
  color: var(--first-color);
}

.nav__logo:hover{
  color: var(--first-color);
}

.nav__toggle{
  display: inline-flex;
  font-size: 1.25rem;
  cursor: pointer;
}

@media screen and (max-width: 767px){
  .nav__menu{
    position: fixed;
    background-color: var(--container-color);
    width: 80%;
    height: 100%;
    top: 0;
    right: -100%;
    box-shadow: -2px 0 4px hsla(var(--hue), 24%, 15%, .1);
    padding: 4rem 0 0 3rem;
    border-radius: 1rem 0 0 1rem;
    transition: .3s;
    z-index: var(--z-fixed);
  }
}

.nav__close{
  font-size: 1.5rem;
  position: absolute;
  top: 1rem;
  right: 1.25rem;
  cursor: pointer;
}

.nav__list{
  display: flex;
  flex-direction: column;
  row-gap: 1.5rem;
}

.nav__link{
  color: var(--title-color);
  font-weight: var(--font-medium);
  transition: .3s;
}

.nav__link:hover{
  color: var(--first-color);
}

/* Show menu */
.show-menu{
  right: 0;
}



.active-link{
  position: relative;
  color: var(--first-color);
}

.active-link::after{
  content: '';
  position: absolute;
  bottom: -.5rem;
  left: 0;
  width: 50%;
  height: 2px;
  background-color: var(--first-color);
}

/*home*/

.swiper {
  width: 100%;
  height: 100%;
  background: #000;
}

.swiper-slide {
  font-size: 18px;
  color: #1a1714;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  padding: 40px 60px;
}

.parallax-bg {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  -webkit-background-size: cover;
  background-size: cover;
  background-position: center;
}

.swiper-slide .title {
  font-size: var(--big-font-size);
  font-weight: 300;
  color: var(--text-color);
}

.swiper-slide .subtitle {
  font-size: 21px;
  color: var(--text-color);
}

.swiper-slide .text {
  font-size: 14px;
  max-width: 70%;
  line-height: 140%;
}

.booking-area{
  background: #9b8977;
  box-shadow: 0.625rem, 937rem 0 rgb(0 0 0/ 10%);
  margin-top: -4rem;
  padding: 50px 50px;
  position: relative;
  z-index: 9999999;
}

/*** Destination ***/
.destination img {
  transition: .5s;
}

.destination a:hover img {
  transform: scale(1.1);
}

/* explore */
.exclusives{
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  grid-gap: 30px;
}

.exclusives div img{
  width: 100%;
  border-radius: 10px;
}

.exclusives div{
  position: relative;
}

.exclusives div span{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  text-align: center;
  color: #FFF;
}

/*=============== BUTTONS ===============*/
.button{
  display: inline-block;
  background-color: #008186;
  color: #FFF;
  padding: 1rem 1.75rem;
  border-radius: .5rem;
  font-weight: var(--font-medium);
  transition: all 0.3s linear;
}

.button:hover{
  background-color: white;
  color: #008186;
  border: #008186 solid 1px;
}

.button__icon{
  transition: .3s;
}

.button:hover .button__icon{
  transform: translateX(.25rem);
}

.button--flex{
  display: inline-flex;
  align-items: center;
  column-gap: .5rem;
}

.button--link{
  color: var(--first-color);
  font-weight: var(--font-medium);
}

.button--link:hover .button__icon{
  transform: translateX(.25rem);
}

/*=============== ABOUT ===============*/
.about__container{
  row-gap: 2rem;
}

.about__img{
  width: 280px;
  justify-self: center;
}

.about__title{
  margin-bottom: var(--mb-1);
}

.about__description{
  margin-bottom: var(--mb-2);
}

.about__details{
  display: grid;
  row-gap: 1rem;
  margin-bottom: var(--mb-2-5);
}

.about__details-description{
  display: inline-flex;
  column-gap: .5rem;
  font-size: var(--small-font-size);
}

.about__details-icon{
  font-size: 1rem;
  color: var(--first-color);
  margin-top: .15rem;
}

/*=============== STEPS ===============*/
.steps__bg{
  background-color: var(--first-color);
  padding: 3rem 2rem 2rem;
  border-radius: 1rem;
}

.steps__container{
  gap: 2rem;
  padding-top: 1rem;
}

.steps__title{
  color: #FFF;
}

.steps__card{
  background-color: var(--container-color);
  padding: 2.5rem 3rem 2rem 1.5rem;
  border-radius: 1rem;
}

.steps__card-number{
  display: inline-block;
  background-color: var(--first-color-alt);
  color: #FFF;
  padding: .5rem .75rem;
  border-radius: .25rem;
  font-size: var(--h2-font-size);
  margin-bottom: var(--mb-1-5);
  transition: .3s;
}

.steps__card-title{
  font-size: var(--h3-font-size);
  margin-bottom: var(--mb-0-5);
}

.steps__card-description{
  font-size: var(--small-font-size);
}

.steps__card:hover .steps__card-number{
  transform: translateY(-.25rem);
}

/* counter */
.counter {
  background-image: url('assets/img/counter..jpg');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  padding: 3.125rem;
  position: relative;
}

.counter::before {
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: var(--bg-black);
  opacity: 0.5;
  z-index: 1;
}

.counter h1,
.counter p {
  position: relative;
  z-index: 3;
  color: var(--text-white)
}

/*=============== QUESTIONS ===============*/
.questions{
  background-color: var(--first-color-lighten);
}

.questions__container{
  gap: 1.5rem;
  padding: 1.5rem 0;
}

.questions__group{
  display: grid;
  row-gap: 1.5rem;
}

.questions__item{
  background-color: var(--container-color);
  border-radius: .25rem;
}

.questions__item-title{
  font-size: var(--small-font-size);
  font-weight: var(--font-medium);
}

.questions__icon{
  font-size: 1.25rem;
  color: var(--title-color);
}

.questions__description{
  font-size: var(--smaller-font-size);
  padding: 0 1.25rem 1.25rem 2.5rem;
}

.questions__header{
  display: flex;
  align-items: center;
  column-gap: .5rem;
  padding: .75rem .5rem;
  cursor: pointer;
}

.questions__content{
  overflow: hidden;
  height: 0;
}

.questions__item,
.questions__header,
.questions__item-title,
.questions__icon,
.questions__description,
.questions__content{
  transition: .3s;
}

.questions__item:hover{
  box-shadow: 0 2px 8px hsla(var(--hue), 4%, 15%, .15);
}

/*Rotate icon, change color of titles and background*/
.accordion-open .questions__header,
.accordion-open .questions__content{
  background-color: var(--first-color);
}

.accordion-open .questions__item-title,
.accordion-open .questions__description,
.accordion-open .questions__icon{
  color: #FFF;
}

.accordion-open .questions__icon{
  transform: rotate(45deg);
}

/*=============== CONTACT ===============*/
.contact__container{
  row-gap: 3.5rem;
}

.contact__data{
  display: grid;
  row-gap: 2rem;
}

.contact__subtitle{
  font-size: var(--normal-font-size);
  font-weight: var(--font-medium);
  color: #008186;
  margin-bottom: var(--mb-0-5);
}

.contact__description{
  display: inline-flex;
  align-items: center;
  column-gap: .5rem;
  color: var(--title-color);
  font-weight: var(--font-medium);
}

.contact__icon{
  font-size: 1.25rem;
}

.contact__inputs{
  display: grid;
  row-gap: 2rem;
  margin-bottom: var(--mb-2-5);
}

.contact__content{
  position: relative;
  height: 3rem;
  border-bottom: 1px solid var(--text-color-light);
}

.contact__input{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding: 1rem 1rem 1rem 0;
  background: none;

  color: var(--text-color);

  
  border: none;
  outline: none;
  z-index: 1;
}

.contact__label{
  position: absolute;
  top: .75rem;
  width: 100%;
  font-size: var(--small-font-size);
  color: #008186;
  transition: .3s;
}

.contact__area{
  height: 7rem;
}

.contact__area textarea{
  resize: none;
}





/*5  Room */
.room-item {
  position: relative;
  overflow: hidden;
}

.room-item img {
  width:100%;
  -webkit-transition: all 400ms ease-in 0s;
  transition: all 400ms ease-in 0s;
}

.room-item:hover img {
  -webkit-transform: scale3d(1.05, 1.05, 1.05);
  transform: scale3d(1.05, 1.05, 1.05);
}

.room-item::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #000;
  opacity: 0;
  z-index: 1;
  -webkit-transition: all 400ms ease-in 0s;
  transition: all 400ms ease-in 0s;
}

.room-item:hover::before {
  opacity: 0.6;
}

.room-item .room-item-wrap {
  left: 1.875rem;
  right: 1.875rem;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  z-index: 1;
}

.room-item .room-content {
  border: .125rem solid #fff;
  padding: 5rem 1.875rem;
  -webkit-transform: scale3d(1.2, 1.2, 1.2);
  transform: scale3d(1.2, 1.2, 1.2);
  -webkit-transition: all 500ms ease-in 0s;
  transition: all 500ms ease-in 0s;
  opacity: 0;
}

.room-item:hover .room-content {
  opacity: 1;
  -webkit-transform: scale3d(1, 1, 1);
  transform: scale3d(1, 1, 1);
}


/*Input focus move up label*/
.contact__input:focus + .contact__label{
  top: -.75rem;
  left: 0;
  font-size: var(--smaller-font-size);
  z-index: 10;
}

/*Input focus sticky top label*/
.contact__input:not(:placeholder-shown).contact__input:not(:focus) + .contact__label{
  top: -.75rem;
  font-size: var(--smaller-font-size);
  z-index: 10;
}












/* 11 footer */
.footer_wrapper {
  background-color: #1a1714;
}

.footer_wrapper h5 {
  color: #FFF;
  margin-bottom: 1.25rem;
}

.footer_wrapper ul li {
  margin-bottom: .5rem;
  list-style: none;
}

.footer_wrapper .contact-info li a{
  color: #FFF
}

.footer_wrapper .link-widget li a,
.footer_wrapper p {
  color: #FFF;
  font-size: .875rem;
  padding-left:1.5rem;
  position: relative;
  -webkit-transition: all 0.3s ease-out 0s;
  transition: all 0.3s ease-out 0s;
}

.footer_wrapper .link-widget li a::before {
  content: '\f105';
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  position: absolute;
  left: 0.3rem;
  top: 50%;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}

.footer_wrapper .link-widget li a:hover {
  margin-left: .625rem;
  color: #9b8977;
}

.footer_wrapper .social-network a {
  width: 2.1875rem;
  height: 2.1875rem;
  margin: .5rem;
  line-height:2rem;
  font-size: .875rem;
  display: inline-block;
  border: .125rem solid var(--text-gray);
  color: #FFF;
  text-align: center;
  border-radius: 100%;
  -webkit-transition: all 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
  transition: all 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
}

.footer_wrapper .social-network a:hover {
  background-color: var(--secondary-color);
  border-color: var(--secondary-color);
  color: #9b8977;
  box-shadow: 0 .625rem .9375rem 0 rgb(0 0 0 / 10%);
  transform: translateY(-0.1875rem);
}

.footer_wrapper .form-control:focus {
  outline: none;
  box-shadow: none;
  border-color: #58483b;
}

.footer_wrapper .copyright-section {
  background-color: var(--primary-color);
  padding: 1.25rem 0 .3125rem;
  text-align: center;
}

.footer_wrapper .copyright-section a {
  color: var(--text-color-light);
}



/*=============== BREAKPOINTS ===============*/
/* For small devices */
@media screen and (max-width: 320px){
  .container{
    margin-left: var(--mb-1);
    margin-right: var(--mb-1);
  }

  .home__img{
    width: 180px;
  }
  .home__title{
    font-size: var(--h1-font-size);
  }

  .steps__bg{
    padding: 2rem 1rem;
  }
  .steps__card{
    padding: 1.5rem;
  }
}

/* For medium devices */
@media screen and (min-width: 576px){
  .steps__container{
    grid-template-columns: repeat(2, 1fr);
  }

  .footer__subscribe{
    width: 400px;
  }
}

@media screen and (min-width: 767px){
  body{
    margin: 0;
  }

  .nav{
    height: calc(var(--header-height) + 1.5rem);
    column-gap: 3rem;
  }
  .nav__toggle,
  .nav__close{
    display: none;
  }
  .nav__list{
    flex-direction: row;
    column-gap: 3rem;
  }
  .nav__menu{
    margin-left: auto;
  }

  .home__container,
  .about__container,
  .questions__container,
  .contact__container,
  .footer__container{
    grid-template-columns: repeat(2, 1fr);
  }
  
  .home{
    padding: 10rem 0 5rem;
  }
  .home__container{
    align-items: center;
  }
  .home__img{
    width: 280px;
    order: 1;
  }
  .home__social{
    top: 30%;
  }

  .questions__container{
   align-items: flex-start;
  }

  .footer__container{
    column-gap: 3rem;
  }
  .footer__subscribe{
    width: initial;
  }
}

/* For large devices */
@media screen and (min-width: 992px){
  .container{
    margin-left: auto;
    margin-right: auto;
  }

  .section__title,
  .section__title-center{
    font-size: var(--h1-font-size);
  }

  .home{
    padding: 13rem 0 5rem;
  }
  .home__img{
    width: 350px;
  }
  .home__description{
    padding-right: 7rem;
  }

  .about__img{
    width: 380px;
  }

  .steps__container{
    grid-template-columns: repeat(3, 1fr);
  }
  .steps__bg{
    padding: 3.5rem 2.5rem;
  }
  .steps__card-title{
    font-size: var(--normal-font-size);
  }
  .questions__container{
    padding: 1rem 0 4rem;
  }
  .questions__title{
    text-align: initial;
  }
  .questions__group{
    row-gap: 2rem;
  }
  .questions__header{
    padding: 1rem;
  }
  .questions__description{
    padding: 0 3.5rem 2.25rem 2.75rem;
  }

  .footer__logo{
    font-size: var(--h3-font-size);
  }
  .footer__container{
    grid-template-columns: 1fr .5fr .5fr .5fr;
  }
  .footer__copy{
    margin: 7rem 0 2rem;
  }
}

@media screen and (min-width: 1200px){
  .home__social{
    right: -3rem;
    row-gap: 4.5rem;
  }
  .home__social-follow{
    font-size: var(--small-font-size);
  }
  .home__social-follow::after{
    width: 1.5rem;
    right: -60%;
  }
  .home__social-link{
    font-size: 1.15rem;
  }

  .about__container{
    column-gap: 7rem;
  }



  
}
    </style>
</head>

<body>
    <!-- navbar-section-start -->
    <?php
         include("./assets/header.php");
    ?>
    <!-- navbar-section-end -->

         <!--contact-->
<!-- <div class="noor-hotels-container">
         <div class="noor-hotel-info-box">
                <div class="noor-info-bgr">
                    <div class="noor-info-text">
                        
                        <h1>
                           <span>"</span>Contact Us<span>"</span>
                        </h1> -->
<!-- 
                        <h3>-Our Top Hotels-</h3>
                        <h5>In Best Price <i class="fa-solid fa-leaf"></i></h5> -->
                    <!-- </div>
                </div>
            </div>
            </div> -->
            <div class="samad-contactus-heading"><h1>Contact Us</h1></div>
         <section class="contact section container" id="contact">
            <div class="contact__container grid">
                <div class="contact__box">
                    <h2 class="section__title samad-contactus-title">
                        Reach out to us today via any of the given information
                    </h2>

                    <div class="contact__data" style="padding: 0 1rem;">
                        <div class="contact__information">
                            <h3 class="contact__subtitle">Call us</h3>
                            <span class="contact__description">
                                <i class="ri-phone-line contact__icon"></i>
                                +92 319 3493076
                            </span>
                        </div>

                        <div class="contact__information">
                            <h3 class="contact__subtitle">Write us by mail</h3>
                            <span class="contact__description">
                                <i class="ri-mail-line contact__icon"></i>
                                royaledge@info.com
                            </span>
                        </div>
                    </div>
                </div>

                <form action="#" method="POST" class="contact__form" style="padding: 0 1rem;">
                    <div class="contact__inputs">
                        <div class="contact__content">
                            <input type="text" placeholder="" name="name" class="contact__input">
                            <label for="" class="contact__label">Name</label>
                        </div>

                        <div class="contact__content">
                            <input type="email" placeholder="" name="email" class="contact__input">
                            <label for="" class="contact__label">Email</label>
                        </div>

                        <div class="contact__content contact__area">
                            <textarea name="message" placeholder="" name="message" class="contact__input"></textarea>
                            <label for="" class="contact__label">Message</label>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="button button--flex">
                        Send Message
                        <i class="ri-arrow-right-up-line button__icon"></i>
                    </button>
                </form>
            </div>
        </section>

        <br><br><br>

        <!-- map -->
        <section class="location" style="margin: 2rem 0;">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3604.972916190148!2d68.34795367452638!3d25.372224174590762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x394c70620a660cb1%3A0x77fbd3f00ba99045!2sAptech%20Computer%20Education%2C%20Latifabad%20Unit%202%20Latifabad%2C%20Hyderabad%2C%20Sindh%2071000%2C%20Pakistan!5e0!3m2!1sen!2s!4v1697750156083!5m2!1sen!2s" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>

    <!-- Footer-Start -->
    <?php
    include('./assets/footer.php')
    ?>
    <!-- Footer-End -->

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../javascript/script.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
  AOS.init();
</script>
</body>
</html>