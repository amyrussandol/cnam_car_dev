<?php
/**
 * Created by PhpStorm.
 * User: Aemy
 * Date: 10/02/2018
 * Time: 11:08
 */
?>

<?php if(isset($sticky_footer) && $sticky_footer == true): ?>
    <style>
        footer{
            position:absolute;
            bottom: 0;
        }
    </style>
<?php endif; ?>

<style>
    footer {
        background-image: linear-gradient(to right, black, #578aa9);
        width: 100%;
        text-align: center;
    }
    ul{
        text-align: center;
    }

    a{
        text-align: center;
        color: white;
    }

    footer > p{
        color: white;
        font-size: large;
    }
</style>

</main>

<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Ce site est un projet de formation</p>
        </div>

        <div class="col-lg-12">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="../contact.php">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php?action=mentions">Mentions légales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../confidentialite.php">Politique de confidentialité</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../qui_sommes_nous.php">Qui sommes-nous</a>
                </li>
            </ul>
        </div>
    </div>
</footer>

<script src="./bootstrap/js/jquery-3.3.1.min.js"></script>
<script src="./bootstrap/js/popper.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>

</body>
</html>