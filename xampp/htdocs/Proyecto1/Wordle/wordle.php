<!-- http://localhost/Proyecto1/Wordle/wordle.php -->
<html>
  <?php
  $palabra = "GUAPO";
  $aInputs= array();
  
  
    if(isset($_POST["boton"])){
      var_export($_POST);
      for($i= 0; $i< strlen($palabra); $i++){
      //echo $palabra[$i];
        if($palabra[$i] == $_POST["letra".$i]){
          $aInputs[$i] = "green";
        } 
        else if($_POST["letra".$i]==$palabra[0] || $_POST["letra".$i]==$palabra[1] ||$_POST["letra".$i]==$palabra[2] 
                ||$_POST["letra".$i]==$palabra[3] ||$_POST["letra".$i]==$palabra[4]){
          $aInputs[$i]="yellow";
        }
        else {
          $aInputs[$i] = "white";
        }
      }
      
      $intentos = $_POST["intentosPost"] +1;
      
    }
    else // Primera entrada a la página
    {
    $intentos = 0; 
    }
  ?>
  <body>
    <form action="wordle.php" method="post">
      <input type="hidden" name="intentosPost" value="<?php echo $intentos; ?>"/>
      <label>Número de intentos: <?php echo $intentos; ?></label><br/>
      
      <?php
        for($i= 0; $i < $intentos; $i++)
        {
          
         if($i == $intentos-1)
         {
           echo "<label>".$_POST["letra0"].$_POST["letra1"].$_POST["letra2"].$_POST["letra3"].$_POST["letra4"]."</label><br/>";
         }
          else
          {
            echo "<label>".$_POST["h".$i]."</label><br/>";
          }
          
          
        }
         for($i= 0; $i < $intentos; $i++)
         {
           if($i == $intentos-1)
           {
             echo  '<input type="hidden" name= "h'.$i.'" value= "'.$_POST["letra0"].$_POST["letra1"].$_POST["letra2"].$_POST["letra3"].$_POST["letra4"].'"/>';
           }
           else
           {
           echo  '<input type="hidden" name= "h'.$i.'" value= '.$_POST["h".$i].' />';
           }
         }
        for($i= 0; $i< strlen($palabra); $i++){
          $color= (isset($aInputs[$i]))?$aInputs[$i]: "white";
          $valor= (isset($_POST["letra".$i]))?$_POST["letra".$i]: "";
          echo '<input type="text" name="letra'.$i.'" value="'.$valor.'" style="background-color:'.$color.'"/>';
        }
       
      ?>
      <!-- <input type="text" name="letra0"/> -->
      
      <input type="submit" name="boton"/>
    </form>
  </body>
</html>