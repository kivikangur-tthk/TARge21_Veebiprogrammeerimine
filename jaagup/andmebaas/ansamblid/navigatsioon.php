<?php
function isActive($name): string
{
    return basename($_SERVER['PHP_SELF']) == $name ? "active" : "";
}

?>

<nav>
    <ul>
        <li><a class="<?= isActive('index.php'); ?>" href="index.php">Avaleht</a></li>
        <li><a class="<?= isActive('lisamine.php'); ?>" href="lisamine.php">Lisamine</a></li>
        <li><a class="<?= isActive('peitmine.php'); ?>" href="peitmine.php">Peitmine</a></li>
        <!--        <li><a href="#about">About</a></li>-->
    </ul>
</nav>
