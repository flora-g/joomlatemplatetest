<?php 
$app  = JFactory::getApplication();
$doc  = JFactory::getDocument();
$user = JFactory::getUser();
$templateparams = $app->getTemplate(true)->params;
$this->language = $doc->language;
$this->direction = $doc->direction;
$menu = $app->getMenu();
echo 'hoho';
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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>"  dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="true" />
    <jdoc:include type="head" />
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700,600' rel='stylesheet' type='text/css'>
</head>
<body class="<?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('site')).' '.$active->alias . $pageclass; ?>">
        <header class="container">
            <div class="row">
            <?php if ($menu->getActive() == $menu->getDefault()) {
               echo '<div class="col-sm-3"><img src="'. $this->baseurl. '/templates/'. $this->template .'/images/logo-web-ia.png" alt="logo" class="logoheader" /></div>';    
	           echo '<div class="col-sm-5"><h1 class="baseline">TOTO</h1></div>';
            }
            else{
                echo '<div class="col-sm-3"><a href="/Joomla"><img src="'. $this->baseurl . '/templates/' . $this->template . '/images/logo-web-ia.png" alt="logo" class="logoheader" /></a></div>';
                echo '<div class="col-sm-5"><p class="baseline">TOTO</p></div>';
            } ?>
            
                <div class="moduletabletelephone col-sm-4 col-xs-12">
                    <div class="customtelephone">
                        <p><a id="number" data-rel="external" data-number="02 40 40 26 26" href="tel:+33240402626">Contactez-nous <span>par téléphone</span></a></p>
                    </div>
                </div>
            </div>
            
            <nav class="navbar navbar-default">
                    <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                           <span class="hamburger">
                               <span class="wrap">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                               </span>
                                <span class="txt">MENU</span>
                              </span>
                          </button>            
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <jdoc:include type="modules" name="menu" style="xhtml" />
                    </div>                      
            </nav>
             
        </header><!--header -->
        <?php if ($this->countModules('slide')): ?>
		<div id="slider" class="container-fluid">
            <jdoc:include type="modules" name="slide" style="xhtml" />
         </div>
        <?php endif; ?>
    <div id="page" class="container">
        <div class="row">
            
            <div class="content <?php if ($this->countModules ('left') && $this->countModules ('right')): ?>col-sm-8 col-xs-12 col-sm-push-2<?php elseif ($this->countModules ('left') || $this->countModules ('right')) : ?>col-sm-10 col-xs-12 col-sm-push-2<?php endif; ?>">
                <div class="breadcrumbs">
                    <jdoc:include type="modules" name="top" style="xhtml"/>
                </div>
                <jdoc:include type="component"/>
                <jdoc:include type="modules" name="middle" style="xhtml"/>

            </div>
            <?php if ($this->countModules ('left')):  ?>
                <div class="leftcolumn col-sm-2 col-xs-12 col-sm-pull-8">
                    <jdoc:include type="modules" name="left" style="xhtml" />
                </div>
            <?php endif;  ?> 
            
            <?php if ($this->countModules ('right')): ?>
                <div class="rightcolumn col-sm-2 col-xs-12 ">
                    <jdoc:include type="modules" name="right" style="xhtml"/>
                </div>
            <?php endif;  ?> 
            
            
        </div><!-- contenu et colonnes -->
        
        <?php if ($this->countModules ('bottom')): ?>
            <jdoc:include type="modules" name="bottom" style="xhtml"/><!-- bottom -->
         <?php endif;  ?> 
        
        
        <footer class="row">
            <?php if ($this->countModules ('position-4') || $this->countModules('position-5') || $this->countModules('position-6')):  ?>
                    
                <div id="footer-menu">
                    <!--<jdoc:include type="modules" name="footer" style="xhtml" />    -->                
                    <nav id="infosfooter">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <jdoc:include type="modules" name="position-4" style="xhtml" />
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <jdoc:include type="modules" name="position-5" style="xhtml" /> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <jdoc:include type="modules" name="position-6" style="xhtml" /> 
                        </div>
                    </nav>
                </div>
            <?php endif;  ?> 
        </footer><!-- footer -->
    </div><!-- #page -->
<noscript>
<div class="noscript">
  <p>Ce site nécessite JavaScript afin de fonctionner correctement. Merci de l'activer dans votre navigateur.</p>
</div>
</noscript>   
    <a href="#0" class="totop">Top</a>
</body>
</html>