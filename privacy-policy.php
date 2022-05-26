<?php
    $path = realpath(dirname(__FILE__));

    if (!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="robots" content="index, follow" />
    <title>EC Shop</title>
    <meta name="description" content="Jesco - Fashoin eCommerce HTML Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Add site Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon/favicon.ico" type="image/png">


    <!-- vendor css (Icon Font) -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.css" />

    <!-- plugins css (All Plugins Files) -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css" />
    <link rel="stylesheet" href="assets/css/plugins/venobox.css" />

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/style.min.css"> -->

    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/style.css" />

</head>

<body>

    <!--Top bar, Header Area Start -->
    <?php 
    $path = dirname(__FILE__);
    require_once($path . '/includes/header.php') ?>
    <!--Top bar, Header Area End -->
     <div class="offcanvas-overlay"></div>

    <!-- OffCanvas Wishlist Start -->
<?php 
$path = dirname(__FILE__);
require_once($path . '/includes/offcanvasWishlist.php') ?>
    <!-- OffCanvas Wishlist End -->
    <!-- OffCanvas Cart Start -->
<?php
$path = dirname(__FILE__);
require_once($path . '/includes/offcanvasCart.php') ?>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Menu Start -->
<?php 
$path = dirname(__FILE__);
require_once($path . '/includes/offcanvasMenu.php') ?>
    <!-- OffCanvas Menu End -->


    <!--Privacy Policy area start-->
    <div class="privacy_policy_main_area pb-100px pt-100px">
        <div class="container">
            <div class="container-inner">
                <div class="row">
                    <div class="col-12">
                        <div class="privacy_content section_2" data-aos="fade-up" data-aos-delay="400">
                            <h1><strong>PRIVACY POLICY</strong></h1>
                            <h3>Our Privacy Policy</h3>
                            <p>We are committed to the protection of personal data we process – below you’ll find the Privacy Policy, 
                            which guides how we collect, use, transfer and store the information that you provide us with or that we 
                            collect about you when interacting with Fashion for Good. The following information is provided by Fashion 
                            for Good to show how we comply with applicable rules and regulations such as GDPR and to help keep you fully 
                            informed about your rights (and how to enforce them). By visiting <a href="">www.jesco.com</a> , you accept and consent to the practices described in this Privacy Policy.</p>
                            <h3>Our contact details</h3>
                            <p>Fashion for Good is the data administrator and located on Rokin 102 in Amsterdam, The Netherlands. You can reach us by phone on +31 20 261 9680 or by email at <a href="mailto:demo@example.com">demo@example.com</a> </p>
                            <h3>To whom does this Privacy Policy apply?</h3>
                            <ul >
                                <li>Visitors to the exhibition(s) of Fashion for Good;</li>
                                <li>Visitors to the Fashion for Good website;</li>
                                <li>Recipients of newsletters and emails sent by Fashion for Good to visitors of our exhibitions and/or website;</li>
                                <li>All other persons who contact Fashion for Good or of whom Fashion for Good processes personal data.</li>
                            </ul>
                            <p>This Privacy Policy does not apply to partners, employees, secondees, student interns and applicants.</p>
                            <h3>What personal data do we process?</h3>
                            <p>We process personal data you have provided to us, personal data generated during your visit to our exhibitions and/or our website and when reading newsletters and emails sent by us to visitors of our exhibitions. We also process personal data we have obtained from other sources such as Social Media platforms.</p>
                            <p>Potential personal data we collect:</p>
                            <ul>
                                <li>Name, email address and/or your photo when you visit our exhibitions and make use of the technologies we offer to you to receive a Good GIF or your Good Fashion Action Plan</li>
                                <li>Personal data obtained through or generated on our website, newsletters, commercial emails or related technologies:</li>
                                <li>IP address</li>
                                <li>Your browsing behaviour on the website such as information on your first visit, previous visit and current visit, the visited pages and the manner in which you navigate on the website;</li>
                                <li>Whether you open a newsletter of email and what sections you select.</li>
                            </ul><br>
                            <h3>Cookies</h3>
                            <p>Cookies are files with small amount of data, which may include an anonymous unique identifier. Cookies are sent to your browser from a web site and stored on your computer’s hard drive. For certain sites on the Fashion for Good Web Site, registering or supplying personal information sets such a cookie. By setting this cookie, Fashion for Good will remember your details the next time you visit our Web Site, so you do not have to re-enter the information.</p>
                            <p>You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent at any time you would like. However, if you do not accept cookies, you may not be able to use some portions of our Web Site. Cookies can be easily disabled or erased. Simply click on your respective browser type below to go directly to the respective user guide and to learn how to disable or erase cookies:</p>
                            <ul>
                                <li>Internet Explorer: <a href="">http://windows.microsoft.com/en-us/internet-explorer/delete-manage-cookies</a></li>
                                <li>Firefox: <a href="">https://support.mozilla.org/en-US/kb/enable-and-disable-cookies-website-preferences</a></li>
                                <li>Chrome: <a href="">https://support.google.com/accounts/answer/61416?hl=en</a></li>
                                <li>Safari: <a href="">https://support.apple.com/en-us/HT201265</a></li>
                            </ul><br>
                            <h3>What do we use your personal data for?</h3>
                            <p>We use your personal data for the following purposes:</p>
                            <p>Maintaining contact with the visitors of our exhibitions and website.</p>
                            <p>Your contact details and photo will be recorded in our system and can be used to send you updates on your Good Fashion Action Plan and additional sustainable fashion related information.</p>
                            <p>Improving our communications on fashion appetite and behaviour.</p>
                            <p>We believe it is important to approach you with information that is relevant to you. We combine and analyse the personal data in our possession to do this. We correspondingly determine what information and channels are relevant and what the best times to provide information or to establish contact are. We do not process any special personal data or confidential information for marketing campaigns. We will need to ask your prior permission if we want to create a personal, individual profile. You can always withdraw this permission at a later time.</p>

                        </div>
                        <div class="privacy_content section_3" data-aos="fade-up" data-aos-delay="400">
                            <h2>How long we retain your data</h2>
                            <p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p>
                            <p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change
                                their username). Website administrators can also see and edit that information.</p>
                        </div>
                        <div class="privacy_content section_3" data-aos="fade-up" data-aos-delay="400">
                            <h2>What rights you have over your data</h2>
                            <p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase
                                any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p>
                        </div>
                        <div class="privacy_content section_3" data-aos="fade-up" data-aos-delay="500">
                            <h2>Where we send your data</h2>
                            <p>Visitor comments may be checked through an automated spam detection service.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Privacy Policy area end-->

    <!-- Footer Area Start -->
    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/footer.php') ?>
    <!-- Footer Area End -->


    <!-- Modals -->
    <?php 
    $path = dirname(__FILE__);
    require_once($path . '/includes/modals.php') ?>
    <!-- END Modals -->
<!-- JavaScripts -->
<?php 
$path = dirname(__FILE__);
require_once($path . '/includes/scripts.php')?>
<!-- END JavaScripts -->
</body>

</html>