<?php 
require("res/build_con.php");
require("res/check_login.php");



// get terms and conditions from database and display 
$query = "SELECT * FROM terms WHERE status = 'Active'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$terms = $row['terms'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Service</title>
    
  <style>@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500;700&display=swap');

::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #242836;
}

::-webkit-scrollbar-thumb {
    background: #333541;
}

* {

    margin: 0;
    padding: 0;
    box-sizing: border-box;

}

body,html {

    width: 100%;
    min-height: 100%;
    background-color: #242836;

}

.main-header {

    width: 100%;
    height: 75px;
    background-color: #181A24;
    display: block;

}

.main-header ul.header-options {

    width: 100%;
    height: 100%;
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: space-around;
    padding-right: 100px;

}

.main-header ul.header-options li {
    display: inline-block;
}

.main-header ul.header-options li.title {

    font-size: 18px;
    color: #fff;
    font-family: Arial;
    cursor: pointer;

}

.header-mobile {

    width: 100%;
    height: 75px;
    background-color: #181A24;
    text-align: center;
    display: none;
}

.title-mobile {
    font-size: 18px;
    color: #fff;
    font-family: Arial;
    cursor: pointer;
    padding-top: 30px;
}

a {
    text-decoration: none;
    font-size: 16px;
    color: #6D6F79;
    font-family: Arial;
    cursor: pointer;
}

a:hover {
    font-size: 16px;
    color: #9598a7;
}


.card {
    margin-top: 100px;
    margin-bottom: 100px;
    height : 6000px;
    width: 1200px;
    border-radius: 30px;
    background-color: #333541;
    margin-left: auto;
    margin-right: auto;
}

.card .primary-heading {
    text-align: center;
    font-family: josefin sans;
    color: white;
    padding-top: 50px ;
    font-size: 4em;
}

.paragraph {
    font-family: josefin sans;
    color: rgb(179, 179, 179);
    margin-left: 50px;
    margin-right: 25px;
    padding-top: 50px;
    font-size: 1.5em;
    line-height: 1.3em;
    font-weight: 500;
}

.bold {
    font-weight: 700;
    color: white;
}

.footer-heading {
    text-align: center;
    font-family: josefin sans;
    color: white;
    margin-bottom: 50px;
    font-size: 2em;
    line-height: 35px;
}

@media only screen and (max-width: 1218px) {
    .card {
        margin-top: 100px;
        margin-bottom: 100px;
        height : 2050px;
        width: 1000px;
        border-radius: 30px;
        background-color: #333541;
        margin-left: auto;
        margin-right: auto;
    }
}

@media only screen and (max-width: 1012px) {
    .card {
        margin-top: 100px;
        margin-bottom: 100px;
        height : 2350px;
        width: 800px;
        border-radius: 30px;
        background-color: #333541;
        margin-left: auto;
        margin-right: auto;
    }
}

@media only screen and (max-width: 832px) {
    .card {
        margin-top: 100px;
        margin-bottom: 100px;
        height : 2950px;
        width: 600px;
        border-radius: 30px;
        background-color: #333541;
        margin-left: auto;
        margin-right: auto;
    }
    .card .primary-heading {
        font-size: 3.5em;
    }

    .footer-heading {
        font-size: 1.5em;
    }
}

@media only screen and (max-width: 626px) {
    .card {
        margin-top: 100px;
        margin-bottom: 100px;
        height : 3850px;
        width: 450px;
        border-radius: 30px;
        background-color: #333541;
        margin-left: auto;
        margin-right: auto;
    }

    .header-mobile {
        display: block;
    }

    .main-header {
        display: none;
    }

    .card .primary-heading {
        font-size: 3em;
    }
}

@media only screen and (max-width: 480px) {
    .card {
        margin-top: 100px;
        margin-bottom: 100px;
        height : 5050px;
        width: 350px;
        border-radius: 30px;
        background-color: #333541;
        margin-left: auto;
        margin-right: auto;
    }

    .card .primary-heading {
        font-size: 2em;
    }
}

@media only screen and (max-width: 365px) {
    .card {
        margin-top: 100px;
        margin-bottom: 100px;
        height : 6300px;
        width: 290px;
        border-radius: 30px;
        background-color: #333541;
        margin-left: auto;
        margin-right: auto;
    }

    .card .primary-heading {
        font-size: 2em;
    }
}</style>
</head>
<body>
    <header class="main-header dark-theme">

        <ul class="header-options">
    
             <a href="dashbord.php"><li class="title"> Money vedas </li></a>
            <li class="option"> <a href="dashbord.php"> Home </a></li>
            <li class="option"> <a href="#"> Facebook </a> </li>
            <li class="option"> <a href="#"> Instagram </a> </li>
            <li class="option"> <a href="#"> Twitter </a> </li>
        </ul>
    
    </header>

    <header class="header-mobile dark-theme">
            <h3 class="title-mobile"> Money vedas </h3>
    </header>

    <section id="terms-of-service">
        <div class="card">
            <h1 class="primary-heading">Terms of Service</h1>
            <p class="paragraph">
               

<p class="paragraph">Welcome to moneyvedas!</p>

<p class="paragraph">These terms and conditions outline the rules and regulations for the use of Money vedas's Website, located at moneyvedas.tech.</p>

<p class="paragraph">By accessing this website we assume you accept these terms and conditions. Do not continue to use moneyvedas if you do not agree to take all of the terms and conditions stated on this page.</p>

<p class="paragraph">The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>
<br>
<h3><strong class="paragraph">Cookies:- </strong></h3>

<p class="paragraph">We employ the use of cookies. By accessing moneyvedas, you agreed to use cookies in agreement with the Money vedas's Privacy Policy. </p>

<p class="paragraph">Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>
<br>
<h3><strong class="paragraph">License:- </strong></h3>

<p class="paragraph">Unless otherwise stated, Money vedas and/or its licensors own the intellectual property rights for all material on moneyvedas. All intellectual property rights are reserved. You may access this from moneyvedas for your own personal use subjected to restrictions set in these terms and conditions.</p>

<p class="paragraph">You must not:</p>
<ul class="paragraph">
    <li class="option">Republish material from moneyvedas</li>
    <li class="option">Sell, rent or sub-license material from moneyvedas</li>
    <li class="option">Reproduce, duplicate or copy material from moneyvedas</li>
    <li class="option">Redistribute content from moneyvedas</li>
</ul>

<p class="paragraph">This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the <a href="https://www.termsfeed.com/terms-conditions-generator/">Terms And Conditions Generator</a>.</p>

<p class="paragraph">Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. Money vedas does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of Money vedas,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, Money vedas shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>

<p class="paragraph">Money vedas reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>

<p class="paragraph">You warrant and represent that:</p>

<ul class="paragraph">
    <li class="option">You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>
    <li class="option">The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>
    <li class="option">The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>
    <li class="option">The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>
</ul>

<p class="paragraph">You hereby grant Money vedas a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>

<h3><strong class="paragraph">Hyperlinking to our Content</strong></h3>

<p class="paragraph">The following organizations may link to our Website without prior written approval:</p>

<ul class="paragraph">
    <li class="option">Government agencies;</li>
    <li class="option">Search engines;</li>
    <li class="option">News organizations;</li>
    <li class="option">Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>
    <li class="option">System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>
</ul>

<p class="paragraph">These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.</p>

<p class="paragraph">We may consider and approve other link requests from the following types of organizations:</p>

<ul class="paragraph">
    <li class="option">commonly-known consumer and/or business information sources;</li>
    <li class="option">dot.com community sites;</li>
    <li class="option">associations or other groups representing charities;</li>
    <li class="option">online directory distributors;</li>
    <li class="option">internet portals;</li>
    <li class="option">accounting, law and consulting firms; and</li>
    <li class="option">educational institutions and trade associations.</li>
</ul>

<p class="paragraph">We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of Money vedas; and (d) the link is in the context of general resource information.</p>

<p class="paragraph">These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party’s site.</p>

<p class="paragraph">If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to Money vedas. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>

<p class="paragraph">Approved organizations may hyperlink to our Website as follows:</p>

<ul class="paragraph">
    <li class="option">By use of our corporate name; or</li>
    <li class="option">By use of the uniform resource locator being linked to; or</li>
    <li class="option">By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.</li>
</ul>

<p class="paragraph">No use of Money vedas's logo or other artwork will be allowed for linking absent a trademark license agreement.</p>

<h3><strong class="paragraph">iFrames</strong></h3>

<p class="paragraph">Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>

<h3><strong class="paragraph">Content Liability</strong></h3>

<p class="paragraph">We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>

<h3><strong class="paragraph">Your Privacy</strong></h3>

<p class="paragraph">Please read Privacy Policy</p>

<h3><strong class="paragraph">Reservation of Rights</strong></h3>

<p class="paragraph">We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it’s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>

<h3><strong class="paragraph">Removal of links from our website</strong></h3>

<p class="paragraph">If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>

<p class="paragraph">We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>

<h3><strong class="paragraph">Disclaimer</strong></h3>

<p class="paragraph">To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>

<ul class="paragraph">
    <li class="option">limit or exclude our or your liability for death or personal injury;</li>
    <li class="option">limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
    <li class="option">limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
    <li class="option">exclude any of our or your liabilities that may not be excluded under applicable law.</li>
</ul>

<p class="paragraph">The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>

<p class="paragraph">As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>


            </p>
        </div>
    </section>
    <footer>
        <p class="footer-heading">© Copyright 2022 Money vedas. All rights reserved.</p>
    </footer>
</body>
</html>






