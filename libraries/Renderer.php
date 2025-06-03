<?php 

class Renderer {
 public static function render(string $path, array $variables = [])
  {
    // Crée des variables à partir des clés du tableau
    extract($variables);

    // Commence la mise en tampon de sortie
    ob_start();

    // Inclut le fichier de contenu
    require('templates/' . $path . '.html.php');

    // Récupère le contenu généré dans $pageContent
    $pageContent = ob_get_clean();

    // Inclut le layout principal qui utilise $pageContent
    require('templates/layout.html.php');
  }

  // Fonction de redirection


}