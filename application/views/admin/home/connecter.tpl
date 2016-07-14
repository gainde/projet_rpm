<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>Creative - Bootstrap Admin Template</title>
        <!-- CSS -->  
        {foreach from=$liste_css item=css}
             <link href="{$ROOT}ressources/css/{$css}" rel="stylesheet" />
        {/foreach}
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
          <script src="js/lte-ie7.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
<div class="col-lg-12 col-sm-12 col-md-12">
    <h1 class="page-heading nospace"><img src="{$ROOT}ressources/images/logo.png" width="100"/></h1>
        <br>
  
   
            <div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Veuillez vous authentifier</h3>
				  </div>
                                    <div class="panel-body" >
                                        <center>
                                        <table width="50%" class='table-register'><thead><tr><th width='100%'></th></tr></thead>
                                            <tr><td  align='center'>{if $success eq '0'}<label class="alert alert-danger">Erreur de connection!</label></td></tr>
                                                                                              {/if}
                                            <tr><td align='center'>
                    <form id="login" action="" method="post">
                        
                            <div class="form-group">
                                <input type="text" name="username" id="username" placeholder="Entrez votre nom d'utilisateur" value="" class="form-control login-field">
                                <i class="fa fa-user login-field-icon"></i>
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" id="login-pass" placeholder="Password" value="" class="form-control login-field">
                                <i class="fa fa-lock login-field-icon"></i>
                            </div>

                            <input href="#" class="btn btn-success modal-login-btn" id="submit" type="submit" value="Connecter">
                            
                            <a href="{$ROOT}authentification/initialiser/" class="login-link text-center">Mot de passe perdu</a>
                       
                    </form>
                </td>
               </tr></table>
                                        </center>
                </div>
            </div>
        </div>

               
</div>    
{foreach from=$liste_js item=js}
    <script type="text/javascript" src="{$ROOT}ressources/js/{$js}"></script>
{/foreach}

<script>

    //knob
    $(function () {
        $(".knob").knob({
            'draw': function () {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function () {
        $("#owl-slider").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

        });
    });

    //custom select box

    $(function () {
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function () {
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                        values: gdpData,
                        scale: ['#000', '#000'],
                        normalizeFunction: 'polynomial'
                    }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function (e, el, code) {
                el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
            }
        });
    });



</script>

</body>
</html>