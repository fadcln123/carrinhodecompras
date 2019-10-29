<?php
session_start();          
          if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
      }
        
  
        
      if(isset($_GET['acao'])){
           

         if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])){
               $_SESSION['carrinho'][$id] = 1;
            }else{
               $_SESSION['carrinho'][$id] += 1;
            }
         }
           
  
         if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
               unset($_SESSION['carrinho'][$id]);
            }
         }
           

         if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $id => $qtd){
                  $id  = intval($id);
                  $qtd = intval($qtd);
                  if(!empty($qtd) || $qtd <> 0){
                     $_SESSION['carrinho'][$id] = $qtd;
                  }else{
                     unset($_SESSION['carrinho'][$id]);
                  }
               }
            }
         }
        
      }         
           
    ?>

 
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="Descrição" content="Loja Virtual"/>
        <meta name="Autor" content="Márcio Barbosa - arte.marciobarbosa@gmail.com"/>
        <title><?php echo $titulos; ?></title>
        <link rel="stylesheet" type="text/css" href="rep1css.css"/>
        <link rel="stylesheet" href="www.google.com"/>
        <script> 
            function mudafoto1(){
            document.getElementById("foto").src = "<?php echo $prod_img1; ?>";
            }
            function mudafoto2(){
            document.getElementById("foto").src = "<?php echo $prod_img2; ?>";
            }
            function mudafoto3(){
            document.getElementById("foto").src = "<?php echo $prod_img3; ?>";
            }
            function mudafoto4(){
            document.getElementById("foto").src = "<?php echo $prod_img4; ?>";
            }
        </script>
    </head>
    <body>
        <div class="container clearfix">
            <header id="cabecalho">
                <div class="central">
                    <div class="logo">
                        <img src="img\logo.jpg"  width="150" height="60">
                    </div>
                    <form class="searchbar" method="get" width="150" height="60">
                        <input type="text" class="cx-busca" name="busca" width="150" height="60" placeholder="Digite o que você procura"/>
                        <input type="image" width="40" height="20" src="img\buscar.jpg" class="btn-busca" name="buscar"  value="Buscar"/>
                    </form>                
                    
            
            </header>
            <div class="interface">
                <table class="tabela-carrinho" >
                <caption ><h2 class="detalhes"  >Carrinho de Compras</h2></caption>
                    <thead>
          <tr>
            <th width="244">Produto</th>
            <th width="79">Quantidade</th>
            <th width="89">Preço</th>
            <th width="100">SubTotal</th>
            <th width="64">Remover</th>
          </tr>
    </thead>
            <form action="?acao=up" method="post">
    <tfoot>
           <tr>
            <td colspan="5"><input type="submit" value="Atualizar Carrinho" /></td>
            <tr>
            <td colspan="5"><a href="index.php">Continuar Comprando</a></td>
    </tfoot>
       
    <tbody>
       
               <?php
                     if(count($_SESSION['carrinho']) == 0){
                        echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
                     }else{
                     }
                             
                           echo '<tr>       
                                 <td>'.$nome.'</td>
                                 <td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>
                                 <td>R$ '.$preco.'</td>
                                 <td>R$ '.$sub.'</td>
                                 <td><a href="?acao=del&id='.$id.'">Remove</a></td>
                              </tr>';
                        }
                           $total = $total;
                           echo '<tr>
                                    <td colspan="4">Total</td>
                                    <td>R$ '.$total.'</td>
                              </tr>';
                     }
               ?>
     
     </tbody>
        </form>
            </table>
        </div>
    </body>
</html>