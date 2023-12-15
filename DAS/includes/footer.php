<style>
    /* Contact Section Styles */
    #contact {
        position: relative;
        padding: 50px 0;
        color: #fff;

    }

    #contact .overlay-mf {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 50%;
        background-image: url();
        background-color: transparent;
        z-index: -1;
    }

    #contact h5.title-left {
        font-size: 24px;
        font-weight: 700;
        color: #fff;
        margin-bottom: 30px;
    }

    #contact .socil-icon ul {
        list-style: none;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
    }

    #contact .socil-icon li {
        margin: 0 15px;
    }

    #contact .socil-icon li a {
        color: #fff;
        font-size: 24px;
        transition: color 0.3s ease;
    }

    #contact .socil-icon li a:hover {
        color: #ccc;
    }

    #contact .socil-icon .ico-circle {
        display: inline-block;
        width: 50px;
        height: 50px;
        line-height: 50px;
        border-radius: 50%;
        background-color: #333;
        text-align: center;
    }

    #contact .socil-icon .ico-circle i {
        line-height: 50px;
    }

    #contact .socil-icon .bi-envelope {
        margin-right: 5px;
    }

    #contact .socil-icon .bi-phone {
        margin-right: 5px;
    }

    /* Responsive Styles */
    @media screen and (max-width: 768px) {
        #contact h5.title-left {
            font-size: 20px;
        }

        #contact .socil-icon ul {
            flex-wrap: wrap;
        }

        #contact .socil-icon li {
            margin: 10px 15px;
        }
    }

    /* Footer Styles */
    .footer {
        background-color: #022702;
        /* Set the background color to dark gray (#333) */
        color: #b8b8d3;
        /* Set the text color to white */
        padding: 20px 0;
        /* Add some padding on the top and bottom */
        margin-top: 100px
    }

    .footer-row {
        justify-content: center;
        /* Center the content horizontally */
    }

    /* Links in the footer */
    .footer a {
        color: #fff;
        /* Set link text color to white */
        text-decoration: none;
        /* Remove underline from links */
        margin: 0 10px;
        /* Add some spacing between links */
    }

    .footer a:hover {
        text-decoration: underline;

    }

    .shorName {
        text-align: center;
    }

    .author {
        text-align: right;
    }
</style>
<!--  ************************* Footer  Starts Here ************************** -->
<footer class="footer" id="contact">
    <div class="container">
        <div class="row footerro">
            <div class="title-box-2 pt-4 pt-md-0">
                <h5 class="title-left text-center title-font">
                    Please Get in touch with us
                </h5>
            </div>
            <div class="socil-icon d-flex flex-column">
                <ul>
                    <li><a href="#"><span><i class="bi-facebook"></i></span></a></li>
                    <li><a href="#"><span><i class="bi-instagram"></i></span></a></li>
                    <li><a href="https://wa.me/+260979541662"><span><i class="bi-whatsapp"></i></span></a></li>
                    <li><a href="mailto:rachealmweemba950@gmail.com"><span><i class="bi-envelope"></i></span></a></li>
                    <li><a href="tel:+260979541662"><span><i class="bi-phone"></i></span></a></li>
                </ul>
            </div>
            <small class="float-center d-none d-sm-inline-block shortName">Copyright &copy; <?php echo date('Y') ?>. DAS | All Rights Reserved</small>
            <div class="float-right d-none d-sm-inline-block author">Developed By: <a href="mailto:rachealmweemba950@gmail.com">Racheal Mweemba</a></div>
        </div>
    </div>
</footer>