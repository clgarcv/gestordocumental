<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor Prácticas en Laboratorios</title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min', 'bootstrap-theme.min', 'menu', 'estiloweb', 'jquery-ui.min']) ?>

    <?= $this->Html->script(['jquery-3.1.1.min', 'bootstrap.min', 'menuppal', 'jquery-ui.min', 'autocompletar']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script type="text/javascript">
        var basePath = "<?php echo Cake\Routing\Router::url('/'); ?>";

    </script>


</head>
<body>
    <!--
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav>
    -->
    <?php if (isset($current_user)): ?>
        <?= $this->element('cabecera_menu', array("role" => $current_user['role'])) ?>

    <?php endif;?>

    <?= $this->Flash->render() ?>
    <?= $this->Flash->render('auth') ?>

	<?= $this->fetch('content') ?>



</body>
</html>
