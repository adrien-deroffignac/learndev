<script src="https://kit.fontawesome.com/a0be64ca8f.js" crossorigin="anonymous"></script>
<div >
    <nav class="nav">
        <ul>
            <li>
                <a href="../index.php">Accueil</a>
            </li>
            <li>
                <a href="#">Explorer</a>
            </li>
            <li>
                <a href="#">Notifications</a>
            </li>
            <li>
                <a href="#">Messages</a>
            </li>
            <?php if(!isset($_SESSION['user']))
            {
                echo '<li>';
                echo "<a href='../inscription.php'>S'inscrire/Connexion</a>";
                echo '</li>';
            };?>
            <?php if(isset($_SESSION['user']))
            {
                echo '<li>';
                echo '<a href="../deconnexion.php">Déconnexion</a>';
                echo '</li>';
            };?>
            
        </ul>
    </nav>
    <button type="button" aria-label="toggle curtain navigation" class="nav-toggler">
        <span class="line l1"></span> 
        <span class="line l2"></span> 
        <span class="line l3"></span>  
    </button>
</div>