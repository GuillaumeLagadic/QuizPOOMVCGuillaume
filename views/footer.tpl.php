<footer>
    <div class="footer_nav">
            <div class="links1">
            <?php if(isset($_SESSION['admin'])) : ?>
            <a href="profiladmin">Administrateur</a>
            <?php else : ?>
            <a href="loginAdmin">Administrateur</a>
            <?php endif; ?>
                    
                    <a href="#">Plan du site</a>
                    <a href="./">Mentions légales</a>
                </ul>
            </div>

            <div class="links2">
                    <a href="formation.html">Accueil</a>
                    <a href="projet.html">Tags</a>
            </div>

            <div class="social">
                <a href="https://www.twitter.com/"><img src="./assets/img/twitter-outline-black.png" alt="logo instagram"></a>
                <a href="https://www.fr-fr.facebook.com/"><img src="./assets/img/facebook-outline-black.png" alt="logo facebook"></a>
                <a href="https://www.instagram.com/"><img src="./assets/img/instagram-outline-black.png" alt="logo twitter"></a>
            </div>
        </div>
    </footer>
</body>
</html>