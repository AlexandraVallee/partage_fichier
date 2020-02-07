$(document).ready(function()
{
    //à la validation du formulaire
    $("#formCommentaire").validate(
    {
        rules : {
            commentaire: "required",
        },
        submitHandler: function(form) 
        {
            //envoyer les données du form en ajax
            $.ajax({
                url:'APICommentaire.php',
                type:'POST',
                data: {target:$(form).serialize()},
                dataType:'text' 
                })
            .done(function(data){ 
                let data2=JSON.parse(data);
                var commentaires="";
                //ajouter les commentaires recus en data à la page
                $.each(data2, function(index,value){
                    commentaires+= ' <article><div class="card mt-4"><div class="card-body"><p>'
                    +value['contenu']+
                    '</p><div class="blockquote-footer"><p>'+
                    value['pseudo']+' le '+value['date_ajout'] +'</p></div></div></div></article><br>'
                });
            $('.commentaires').html('<h3 class="mt-4">Les commentaires</h3>'+ commentaires)    
            $("#formCommentaire").get(0).reset();
           })  
        }
    });
});







        

       
        
 