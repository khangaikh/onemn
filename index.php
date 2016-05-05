    <?php
    require_once 'includes/Twig/Autoloader.php';
    //register autoloader
    Twig_Autoloader::register();
    //loader for template files
    $loader = new Twig_Loader_Filesystem('templates');
    //twig instance
    $twig = new Twig_Environment($loader, array(
        'cache' => 'cache',
    ));
    //load template file
    function fixObject (&$object)
    {
      if (!is_object ($object) && gettype ($object) == 'object')
        return ($object = unserialize (serialize ($object)));
      return $object;
    }
    $twig->setCache(false);
    if(isset($_GET['it'])){
        $template = $twig->loadTemplate('it.html');
        echo $template->render(array('title' => 'Мэдээллийн Технологи', 'lesson' => $_GET['it']));
    } else if (isset($_GET['tutorial'])){
        $template = $twig->loadTemplate('tutorial.html');
        echo $template->render(array('title' => 'Монгол хэл бичиг', 'lesson' => $_GET['tutorial']));
    }
    else{
        $template = $twig->loadTemplate('main.html');
        echo $template->render(array('title' => 'Нэвтрэх' ));
    }
    
    
?>
    
