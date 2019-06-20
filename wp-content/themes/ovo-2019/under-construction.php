<?php

  // Template name: Under construction

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <meta charset="UTF-8">

    <title>OFFICE vs OFFICE</title>
    <style>
        *, *:before, *:after {
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            padding: 0;
            margin: 0;
            background-color: #D2C9E3;
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 15px;
        }

        .background-parent {
            height: 100%;
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
        }

        path {
            stroke: transparent;
        }

        .content {
            max-width: 660px;
            padding: 0 30px;
            padding-bottom: 50px;
            margin: 0 auto;
            position: relative;
            z-index: 100;
        }

        .header {
            padding-top: 160px;
            padding-bottom: 65px;
            border-bottom: 1px solid #5AC9A5;
        }

        @media only screen and (max-width: 960px) {
            /* styles for browsers smaller than 960px; */
            .header {
                padding-top: 70px;
                padding-bottom: 65px;
            }
        }

        .header img {
            display: block;
            margin: 0 auto;
            width: 100%;
            height: auto;
        }

        .body {
            font-size: 15px;
            border-bottom: 1px solid #5AC9A5;
            color: #5A00FF;
            line-height: 24px;
        }

        h2 {
            font-size: 18px;
            text-transform: uppercase;
            margin: 0;
            padding-top: 22px;
            padding-bottom: 15px;
            font-weight: 700;
            text-align: center;
            letter-spacing: 1.5px;
        }

        .sub {
            font-size: 13px;
        }

        .construction {
            color: #EB008B;
            padding-top: 32px;
            text-align: center;
            max-width: 400px;
            margin: 0 auto;
        }

        .panel {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out;
        }
        .panel:after {
            display: block;
            content: ' ';
            height: 25px;
            width: 100%;
        }

    </style>
</head>
<body>

<div class="background-parent"></div>

<div class="content">
    <div class="header">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" class="vs-image">
    </div>
    <div class="body">
        <h2 class="accordion">A Bit About Office <span class="sub">vs</span> Office</h2>
        <div class="panel">
            Erik van der Molen and Joseph Becker launched Office vs Office in 2006. Joseph has since taken on the role
            of
            associate currator of architecture and design at SFMOMA. Erik has focused on Office vs Office, growing it’s
            network and expertise working with various startups, museums, creatives, architects and a long list of
            corporate
            clients nationwide such as Herman Miller, WIRED, Disney, Adaptive Path, Nike, Gap Inc. + all Gap brands
            (e.g.
            Banana Republic, Athleta, Old Navy, and Intermix), Surefire, Walmart, De Young Museum, and Gravity Tank, to
            name
            a few. Through an evidence based approach, Office vs Office designs strategies, solutions and tools
            necessary
            for the success of each projects unique requirements, captivating audiences and telling stories through
            insightful branding, interactive experiences, and moving imagery. Whether it’s launching a product and ecom
            store, rebranding a decades old corporation, defining and communicating the vision and strategy core to the
            business, or simply building a unique and easily manageable digital persentation of ones services and
            projects,
            Office vs Office can set you up with the knowledge, tools, and strategy to confidently move forward.
            <br/>
            <br/>
            If you are interested in working with Office vs Office please do not hesitate to reach out.
        </div>
    </div>
    <div class="body">
        <h2 class="accordion">Working With Office <span class="sub">vs</span> Office</h2>
        <div class="panel">
            Until the site is back up, I would be happy to provide samples of relevant work, a list of services, RFQ’s
            for
            project considerations, or specifics on processes and working with multiple teams, including your own. You
            can
            email me directly at <a id="mail-link" href="">hello@officevsoffice.com</a>. To properly tailor what is
            shared please provide a brief
            description of your project, your role, and a good time to discuss your inquiry in detail. If you simply
            want an
            RFQ, please allow up to 48 hours and include a detailed account of the project requirements.
            <br/>
            <br/>
            I look forward to hearing from you.
        </div>
    </div>
    <div class="construction">
        This digital space is currently undergoing a restoration project and will be under construction until further
        notice.
    </div>
</div>

<!-- Dependencies (assumes jQuery is included in your assets already, per staging site) -->
<link rel="stylesheet" id="floating-svg-background-styles-css" href="<?php echo get_template_directory_uri(); ?>/styles/temp-styles.css" type="text/css" media="all">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/plugins/CSSPlugin.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/plugins/EndArrayPlugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TimelineMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>


<script src="<?php echo get_template_directory_uri(); ?>/scripts/temp-scripts.js"></script>

<!-- Invoke plugin where convenient with url to svg -->
<script>
    var x = '<?php echo get_template_directory_uri(); ?>';

    var getUrlParameter = function getUrlParameter( sParam ) {
        var sPageURL = decodeURIComponent( window.location.search.substring( 1 ) ),
                sURLVariables = sPageURL.split( '&' ),
                sParameterName,
                i;

        for ( i = 0; i < sURLVariables.length; i++ ) {
            sParameterName = sURLVariables[ i ].split( '=' );

            if ( sParameterName[ 0 ] === sParam ) {
                return sParameterName[ 1 ] === undefined ? true : sParameterName[ 1 ];
            }
        }
    };

    jQuery( '.background-parent' ).floatingSvgBackground(x + '/images/gems.svg');

    jQuery( '#mail-link' ).attr( 'href', 'mailto:hello@officevsoffice.com' );

    var acc = document.getElementsByClassName( "accordion" );
    var i;

    for ( i = 0; i < acc.length; i++ ) {
        acc[ i ].addEventListener( "click", function () {
            this.classList.toggle( "active" );
            var panel = this.nextElementSibling;
            if ( panel.style.maxHeight ) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        } );
    }

</script>

</body>

</html>