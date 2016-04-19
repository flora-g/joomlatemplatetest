<?php

//get language and direction
$app  = JFactory::getApplication();
$doc  = JFactory::getDocument();
$user = JFactory::getUser();
$templateparams = $app->getTemplate(true)->params;
$this->language = $doc->language;
$this->direction = $doc->direction;
$menu = $app->getMenu();


// HACK POUR ACTIVER LES FICHIER MOOTOOLS CORE
//JHtml::_('behavior.framework', true);
JHtml::_('bootstrap.framework');
// Remove Scripts
$doc = JFactory::getDocument();
unset($doc->_scripts[JURI::root(true) . '/media/jui/js/bootstrap.min.js']);
//////////////////////////////////////////////


// VARIABLES
$active = $app->getMenu()->getActive();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');

// Add Stylesheets
$doc->addStyleSheet($this->baseurl."/templates/".$this->template."/css/style.min.css");


// Add Script
$doc->addScript($this->baseurl."/templates/".$this->template."/js/customiz.js");
$doc->addScript($this->baseurl."/templates/".$this->template."/js/bootstrap.min.js");

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<meta name="HandheldFriendly" content="true" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
    <!--<link rel="stylesheet" href="localhost/templates/template_test/css/style.css" type="text/css" />-->
    <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/style.min.css" type="text/css" />
     <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700,600' rel='stylesheet' type='text/css'>
</head>
    <body class="site error">
           <div id="globalContent">
                <div class="container">
                    <div class="row">
                            <div id="contentBox">
                            <div class="item-page">
                                <center>                                
                                        <div class="page-header"><h1>Oups... erreur 404</h1></div>
                                    	<h2>Page introuvable...</h2>
                                    <p>
                                        Désolé, la page que vous cherchez est introuvable...<br/>
                                        Cliquez sur un lien dans le menu de navigation ou <a onclick="window.history.back()">retournez en arrière.</a>
                                    </p>
                                    <ul>
                                    <li class="readmore"><a href="#">Page d'accueil</a></li>
                                    <li class="readmore"><a href="#">Page contact</a></li>
                                    </ul>                         
                                </center>
                            </div>
                            </div>    
                    </div> 
                </div>
		</div>
    </body>
</html>