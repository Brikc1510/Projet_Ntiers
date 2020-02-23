<?php
class View {
  private $vars;
  private $head;
  private $b;
  private $c;
  public function construct(){
    $this->head='head.php';
    $this->b=true;
    $this->c=true;
  }
  public function change($a){
    $this->head = $a;
  }
  public function changeb($b){
    $this->b = $b;
  }
  public function changec($c){
    $this->c = $c;
  }
  public function render($controllername,$viewname){
    if (isset($this->vars)){
      extract($this->vars);
      
    }
    echo '<!doctype html>';
    echo '<html lang="fr">';
    echo '<head>';
    if($this->c)
    {
    include VIEWS.DS.'common'.DS.$this->head;
    }
    echo '</head>';
    echo '<body>';
    if($this->b)
    {
    include VIEWS.DS.'common'.DS.'nav.php';
    }
    include VIEWS.DS.strtolower($controllername).'_'.strtolower($viewname).'.php';
    //include VIEWS.DS.'common'.DS.'bs_js.php';
    echo '</body>';
  }
  public function setVar($key, $value = null){
    if (is_array($key)){
      $this->vars = $key;
      
    } else {
      $this->vars[$key] = $value;
      //var_dump($this->vars);
    }
  }
  
}
?>