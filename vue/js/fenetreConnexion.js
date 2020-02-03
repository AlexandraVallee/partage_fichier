
function showFenetreConnexion()
{
	document.getElementById('fenetreConnexion').className='fenetreShow';
	document.getElementById('fond').className='fondShow';	
}

function hideFenetreConnexion()
{
	
	document.getElementById('fenetreConnexion').className='fenetreClose';//virer la div
	document.getElementById('fond').className='';//virer le fond
    //réinitialiser la valeur des input
    $('input[type!=submit]').each(function(){
    {
        $('input[type!=submit]').val("");
    }
    });
    //enlever les messages d'erreur
    $('#erreur').text("");
    $('#erreur2').text("");
    $('form .error').text("");
}
//virer la fenetre de connexion si on clique à côté
document.getElementById('fond').addEventListener('click',hideFenetreConnexion)

//jquery validate
$(document).ready(function(){
    jQuery.validator.addMethod("regex",function(value, element, regexp) 
    {
       if (regexp.constructor != RegExp)
          regexp = new RegExp(regexp);
       else if (regexp.global)
          regexp.lastIndex = 0;
          return this.optional(element) || regexp.test(value);
    },"erreur expression reguliere"
    );
////////////formulaire inscription///////////////////////////
    $("#formulaireInscription").validate(
    {
    	rules : {
            pseudo : { 
                required : true 
            },
            mot_de_passe : { 
                required :true,
                regex: /^(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/
            },	
            email : {
                required : true,
                email : true
            },
            mot_de_passe2:{
    	       required:true,
    	       equalTo:'#mot_de_passe'
            }
        },
        messages : {
            pseudo : "<br>Veuillez fournir un pseudo",
            mot_de_passe : {
    	       required : "<br>Veuillez fournir un mot de passe",
    	       regex: "<br>Le mot de passe doit comporter au moins une majuscule, un chiffre, un caractère spécial et 8 caractères"
            },
            email : "<br>L'email est incorrect",
            mot_de_passe2:{
   	            required:"<br>Veuillez répétez le mot de passe",
    	       equalTo:"<br>Les 2 mots de passe ne correspondent pas"
            }
        },
        //envoie données en ajax au submit
       submitHandler: function(form) 
        {
         
            $.ajax({
                url:'APIConnexion.php',
                type:'POST',
                data: {action:'inscription', target:$(form).serialize()},
                dataType:'text' 
                })
            .done(function(data)
                { 
                    console.log(data);
                    let rep=JSON.parse(data);
                    
                    if(rep.success)
                    {
                        $('#erreur2').html(rep.message);
                        $('input[name="pseudo"]').val("");
                        $('input[name="mot_de_passe"]').val("");
                        $('input[name="mot_de_passe2"]').val("");
                        $('input[name="email"]').val("");
                    }
                    else
                    {  
                        $('#erreur2').text(rep.erreur);
                        $('input[name="mot_de_passe"]').val("");
                        $('input[name="mot_de_passe2"]').val("");
                    }

                });
        }
      	});

//////////////formulaire connexion//////////////////////////////////
    $("#formulaireConnexion").validate(
    {
        rules : {
            pseudo_connexion : "required",
            mot_de_passe_connexion : "required",
        },
        messages : {
            pseudo_connexion : "<br>Veuillez fournir un pseudo",
            mot_de_passe_connexion :"<br>Veuillez fournir un mot de passe",
        },
        submitHandler: function(form) 
        {
         
            $.ajax({
                url:'APIConnexion.php',
                type:'POST',
                data: {action:'connexion', target:$(form).serialize()},
                dataType:'text' 
                })
            .done(function(data)
                { 
                    let rep=JSON.parse(data);
                    if(rep.success)
                    {
                        document.location.href=(rep.location);
                    }
                    else
                    {  
                        $('input[name="pseudo_connexion"]').val("");
                        $('input[name="mot_de_passe_connexion"]').val("");
                        $('#erreur').text(rep.erreur);
                    }
                });
        }
    });
});