
<div id="fenetreConnexion" aria-hidden="true" class="fenetreClose">
   <button class="btn btn-secondary btn-sm" type="button" onclick="hideFenetreConnexion()">X</button> 
    <div>
    <div>
    <h2 style="text-align:center">Connexion</h2>
    <div class="container">
        <form id="formulaireConnexion" action="" method="POST"><div id='erreur'></div>
            <div class="form-group">
                <label for="pseudo">Pseudo:</label>
                <input class="form-control" type="text" id="pseudo_connexion" name="pseudo_connexion"/> <br>
                <label for="mot_de_passe">Mot de passe:</label> 
                <input class="form-control" type="password" id="mot_de_passe_connexion" name="mot_de_passe_connexion"/>  <br>    
                <label for="resterConnecter">rester connecté</label>
                <input type="checkbox" id="resterConnecter" name="resterConnecter"> <br>
                <input class="btn btn-secondary" type="submit" name='submitConnexion'value="login"/>
                
                <br>
            </div>
    </div>
      
    </form> 
    </div>
    <div>
    <h2 style="text-align:center">Pas encore inscrit?</h2>
    <div class="container">
        <form id="formulaireInscription"action="" method="POST"><div id='erreur2'></div>
            <div class="form-group">
                <label for="pseudo">Pseudo:</label> 
                <input class="form-control" type="text" id="pseudo" name="pseudo"/><br>
                <label for="email">Adresse électronique:</label> 
                <input class="form-control" type="email" id="email" name="email"/><br>
                <label for="mot_de_passe">Mot de passe:</label> 
                <input class="form-control" type="password" id="mot_de_passe" name="mot_de_passe"/><br>
                <label for="mot_de_passe2">Répéter le mot de passe:</label> 
                <input class="form-control" type="password" id="mot_de_passe2" name="mot_de_passe2"/>  <br>      
                <input class="btn btn-secondary mb-2" type="submit" name='submitInscription'value="inscription"/>
            </div>
        </form>
    </div> 
    </div>
</div>
</div>
