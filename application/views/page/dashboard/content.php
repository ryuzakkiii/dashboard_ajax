
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<div class="jumbotron">

<?php        
        $total_stock = 0;
        $total_vendu = 0;
        $total_montant = 0;
        $total_reste = 0;
        foreach ($valeur as $value): 
            $total_stock += $value->quantite;
            $total_vendu += $value->quantite_vendu;
            $total_montant += $value->montant;
            $total_reste += $value->reste; 
        endforeach;
    ?>
<div style="height : 100px;" class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="card bg-light mb-3" style="">
                    <div class="card-body">
                    <h5 class="card-title">Total Stock</h5>
                    <p class="card-text"><?php echo $total_stock;?></p>
                </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-light mb-3" style="">
                    <div class="card-body">
                    <h5 class="card-title">Total Vendu</h5>
                    <p class="card-text"><?php echo $total_vendu;?></p>
                </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-light mb-3" style="">
                    <div class="card-body">
                    <h5 class="card-title"> Caisse</h5>
                    <p class="card-text"><?php echo $total_montant;?> Ariary</p>
                </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-light mb-3" style="">
                    <div class="card-body">
                    <h5 class="card-title">reste stock</h5>
                    <p class="card-text"><?php echo $total_reste;?></p>
                </div>
                </div>
            </div>
        </div>          
    </div>
</div>
<div class="container">

<h3>Commande par produit :</h3>

<table class="table table-sm" style="padding : 30px;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Produit</th>
                <th scope="col">Stock</th>
                <th scope="col">Vendu</th>
                <th scope="col">Montant</th>
                <th scope="col">Reste</th>   
            </tr>
        </thead>
        <?php foreach ($valeur as $resultat): ?>
            <tbody>
            <tr>
                <td><?php echo $resultat->designation_produit;?></td>
                <td><?php echo $resultat->quantite;?></td>
                <td><?php echo $resultat->quantite_vendu;?></td>
                <td><?php echo $resultat->montant;?></td>
                <td><?php echo $resultat->reste;?></td>   
            </tr> 
            </tbody>
         <?php endforeach;?>
    </table>   

    <h3>Details des commandes par produit :</h3>

    <form method="post">
    
        <select id="filtre">
        <?php foreach($detail as $details) : ?>
            <option id="produit" value="<?php echo $details->designation_produit?>"><?php echo $details->designation_produit?></option>
        <?php endforeach;?>  
        </select>

    </form>

    <br>


    <table id="prod" class="table table-sm"> 
        <thead class="thead-light">
            <tr>
                <th>Nom client</th>
                <th>Produit</th>
                <th>Nombre</th>
                <th>Date commande</th>

            </tr>
        </thead>
        <tbody>
            <tr>
            
            </tr>
        </tbody>
        

    </table>
    
    </form>            
    </div>
    

        

    
</div>
<script>
$(document).ready(function(){

$('#filtre').change(function(){
  var designation_produit  = $(this).val();

  $.ajax({
    url: '<?php echo base_url();?>acceuil/filtre',
    method : "POST",
    data : {designation_produit: designation_produit},
    dataType : 'json',
    error: function() {
      alert('Something is wrong');
    },
    success: function(valeur){
      $('#prod').find('tbody').remove();
      $('#prod').append('<tbody></tbody>');
      $.each(valeur,function(index,data){  
        $('#prod').find('tbody').append('<tr><td>' + data['nom_client'] + '</td><td>' + data['designation_produit'] + '</td><td>' + data['quantite_vendu'] + '</td><td>' + data['date_commande'] + '</td></tr>') ;
      });
      
    }
  });

});
});
</script>















