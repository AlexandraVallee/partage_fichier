
<div id="fenetreConnexion" aria-hidden="true" class="fenetreClose">
   <button type="button" onclick="hideFenetreConnexion()">X</button> 
    <div>
    <div>
    <h2>Connexion</h2>
    <form id="formulaireConnexion" action="" method="POST"><div id='erreur'></div>
        <label for="pseudo">Pseudo:</label>
        <input type="text" id="pseudo_connexion" name="pseudo_connexion"/> <br>
        <label for="mot_de_passe">Mot de passe:</label> 
        <input type="password" id="mot_de_passe_connexion" name="mot_de_passe_connexion"/>  <br>    
        <label for="resterConnecter">rester connecté</label>
        <input type="checkbox" id="resterConnecter" name="resterConnecter"> <br>
        <input type="submit" name='submitConnexion'value="login"/>
        <br>
        <a href='http://localhost/toutou_in_love/index.php?action=r%c3%a9cup%c3%a9ration_mdp'>mot de passe oublié? </a>
    </form> 
    </div>
    <div>
    <h2>Pas encore inscrit?</h2>
    <form id="formulaireInscription"action="" method="POST"><div id='erreur2'></div>
        <label for="pseudo">Pseudo:</label> 
        <input type="text" id="pseudo" name="pseudo"/><br>
        <label for="email">Adresse électronique:</label> 
        <input type="email" id="email" name="email"/><br>
        <label for="mot_de_passe">Mot de passe:</label> 
        <input type="password" id="mot_de_passe" name="mot_de_passe"/><br>
        <label for="mot_de_passe2">Répéter le mot de passe:</label> 
        <input type="password" id="mot_de_passe2" name="mot_de_passe2"/>  <br>      
        <input type="submit" name='submitInscription'value="inscription"/>
    </form> 
    </div>
</div>
</div>
