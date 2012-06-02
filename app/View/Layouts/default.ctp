<?php
/**
*
* Default layout for the DevTrack system
* Layout which all views will render inside
*
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
* 
* @copyright     DevTrack Development Team 2012
* @link          http://github.com/chrisbulmer/devtrack
* @package       DevTrack.View.Layouts
* @since         DevTrack v 0.1
* @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
*/
?>
<!DOCTYPE html>
<head> 
    <title>
        DevTrack - <?= $title_for_layout ?>
    </title> 
    <?= $this->Html->charset('UTF-8') . "\n" ?>
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('layout'); ?>
    <?= $this->Html->css('bootstrap-responsive.min') ?>
    <? if (isset($css_for_layout)): foreach ($css_for_layout as $css): ?>
            <?= $this->Html->css(array($css)) ?>
        <? endforeach;
    endif; ?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <header>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    </a>
                    <?= $this->Html->link('DevTrack', '/', array('class' => 'brand')); ?>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <?php
                            $this->ActiveNav->markLink('dashboard', 'Dashboard');
                            $this->ActiveNav->markLink('projects', 'Projects');
                            ?>
                        </ul>
                        <form class="navbar-search pull-right">
                            <input type="text" class="search-query" placeholder="Search">
                        </form>
                        <?php
                        if (isset($user_name)){
                            echo $this->Bootstrap->button_dropdown($user_name, array(
                                "split" => true,
                                "dropup" => true,
                                "right" => true,
                                "links" => array(
                                    $this->Html->link("Link 1", "#"),
                                    array("Link 2", "#"),
                                    null, // Will produce a divider line
                                    array("Link 3", "#")
                                )
                            ));
                        } else{
                            echo $this->Bootstrap->button_link("Login", "/login", array("size" => "medium", 'id' => 'user_button', 'class' => 'pull-right'));
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header> 
    <div class="container">
        <div id="content">
            <?= $this->Session->flash() ?>
            <?= $content_for_layout ?>
        </div>
    </div>

    <!-- JavaScript! Placed at the end of the file for faster page loading -->
    <?= $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'); ?>
    <?= $this->Html->script('bootstrap.min') ?>


</body>
</html>
