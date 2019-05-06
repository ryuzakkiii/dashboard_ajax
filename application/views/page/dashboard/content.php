
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Document</title>
</head>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<!--recap-->
    <div class="jumbotron" style="background-color : #1E90FF;">
        <div class="container-fluide">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="card border-info mx-sm-1 p-3" >
                            <div class="card border-info shadow text-info p-3 my-card" style="height : 70px;width :70px; position:absolute;left:35%;top:-40px;border-radius:50%;"><img src="./public/images/appel.jpg" alt=""></div>
                            <div class="text-info text-center mt-3"><h4>Total appel</h4></div>
                            <div class="text-info text-center mt-2" id="totappel"><p>valeur</p></div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card border-info mx-sm-1 p-3" >
                        
                            <div class="text-info text-center mt-3" ><h4>Appel Qualifié</h4></div>
                            <div class="text-info text-center mt-2" id="aqualifie"><p>valeur</p></div>
                            
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card border-info mx-sm-1 p-3" >
                            <div class="text-info text-center mt-3"><h4>Répondeur</h4></div>
                            <div class="text-info text-center mt-2" id="repondeur"><p>valeur</p></div>
                            
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card border-info mx-sm-1 p-3" >
                            <div class="text-info text-center mt-3"><h4>Rappel</h4></div>
                            <div class="text-info text-center mt-2" id="rappel"><p>valeur</p></div>
                            
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card border-info mx-sm-1 p-3" >
                            <div class="text-info text-center mt-3"><h4>Injoignable</h4></div>
                            <div class="text-info text-center mt-2" id="injoign"><p>valeur</p></div>
                            
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card border-info mx-sm-1 p-3" >
                            <div class="text-info text-center mt-3"><h4>Test</h4></div>
                            <div class="text-info text-center mt-2" id="test"><p>valeur</p></div>
                            
                        </div>
                    </div>
                </div>  
        
        </div>
        <input type="date" id="date">

    </div>

        <!--filtre par produit-->


    <div class="container">
                <h4>Detail Appel</h4>
                    <select name="agent" id="agent">
                        <option value="-----------">---choisi un nom-----</option>
                    <?php foreach($agent as $agents):?>
                        <option value="<?php echo $agents->agentname;?>"><?php echo $agents->agentname;?></option>
                    <?php endforeach;?>                
                    </select> 
                    <div>
                        <table class="table table-sm table-light">
                            <thead>
                                <tr>
                                <th scope="col">Agent Name</th>
                                <th scope="col">Appel total</th>
                                <th scope="col">Appel Qualifié</th>
                                <th scope="col">Repondeur</th>
                                <th scope="col">Injoignable</th>
                                <th scope="col">Rappel</th>
                                <th scope="col">Rappel programme</th>

                                </tr>
                            </thead>
                            <tbody id="filtre">
                                <tr>
                                
                                </tr>
                        </table>
                    </div>                    
            </div>
    </div>   

<script>
//filtre par agent
$(document).ready(function(){

    $('#date').change(function(){
        var dates = $(this).val();

        $.ajax({
        url : '<?php echo base_url();?>acceuil/valeur',
            method : "POST",
            data : {dates: dates},
            dataType: 'json',
            error : function(){
                alert('something wrong');
            },
            success : function(data){
                
                $.each(data,function(){ 
                    $('#totappel').find('p').remove();
                    $('#totappel').append('<p></p>'); 
                    $('#aqualifie').find('p').remove();
                    $('#aqualifie').append('<p></p>');
                    $('#repondeur').find('p').remove();
                    $('#repondeur').append('<p></p>');
                    $('#rappel').find('p').remove();
                    $('#rappel').append('<p></p>');
                    $('#injoign').find('p').remove();
                    $('#injoign').append('<p></p>');
                    $('#test').find('p').remove();
                    $('#test').append('<p></p>');
                    $('#totappel p').append(data['totappel'][0]['toppel']);
                    $('#aqualifie p').append(data['aqualifie'][0]['aqualifie']);
                    $('#repondeur p').append(data['repondeur'][0]['repondeur']);
                    $('#rappel p').append(data['rappel'][0]['rappel']);
                    $('#injoign p').append(data['injoign'][0]['injoign']);
                    $('#test p').append(data['test'][0]['test']);
                    $('#')
                }); 
            }
            

        })

    });

});


//filtre par agent
$(document).ready(function(){

    $('#agent').change(function(){
        var agentname = $(this).val();
        var dates = $("#date").val();

        $.ajax({
        url : '<?php echo base_url();?>acceuil/filtre',
            method : "POST",
            data : {agentname: agentname, dates : dates},
            dataType: 'json',
            error : function(){
                alert('something wrong');
            },
            success : function(agent){
                $('#filtre').find('tr').remove();
                $('#filtre').append('<tr></tr>');
                $.each(agent,function(index,data){  
                    $('#filtre').find('tr').append('<td>' + data['agentname'] + '</td><td>' + data['tous'] + '</td><td>' + data['qualifie'] + '</td><td>' + data['repondeur'] +'</td><td>' + data['ijoign'] + '</td><td>' + data['rappel'] + '</td><td>' + data['rappelp'] + '</td>') ;
                });       
            }          

        })

    });

});


$(document).ready(function(){

$('#date').change(function(){
    var dates = $(this).val();
    var agentname = $("#agent").val();

    $.ajax({
    url : '<?php echo base_url();?>acceuil/filtre',
        method : "POST",
        data : {agentname: agentname, dates : dates},
        dataType: 'json',
        error : function(){
            alert('something wrong');
        },
        success : function(agent){
            $('#filtre').find('tr').remove();
            $('#filtre').append('<tr></tr>');
            $.each(agent,function(index,data){  
                $('#filtre').find('tr').append('<td>' + data['agentname'] + '</td><td>' + data['tous'] + '</td><td>' + data['qualifie'] + '</td><td>' + data['repondeur'] + '</td><td>' + data['ijoign'] + '</td><td>' + data['rappel'] + '</td><td>' + data['rappelp'] + '</td>') ;
            });       
        }          

    })

});

});

</script>
