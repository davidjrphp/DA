<style>
    /* Footer Styles */
    .footer {
        background-color: #022702;
        /* Set the background color to dark gray (#333) */
        color: #b8b8d3;
        /* Set the text color to white */
        padding: 20px 0;
        /* Add some padding on the top and bottom */
        margin-top: 400px;
        height: 100px;
    }


    /* Links in the footer */
    .footer a {
        justify-content: center;
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
        text-align: center;
    }
</style>
<!--  ************************* Footer  Starts Here ************************** -->
<footer class="footer" id="contact">
    <div class="container">
        <div class="row footerro">
            <small class="float d-none d-sm-block shortName">Copyright &copy; <?php echo date('Y') ?>. DAS | All Rights Reserved</small>
            <div class="float-right d-none d-sm-inline-block author">Developed By: <a href="mailto:rachealmweemba950@gmail.com">Racheal Mweemba</a></div>
        </div>
    </div>
</footer>