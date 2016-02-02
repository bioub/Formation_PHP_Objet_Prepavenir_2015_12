<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Prepavenir\BootstrapBundle\Twig;

/**
 * Description of BootstrapAlert
 *
 * @author romain
 */
class BootstrapAlert extends \Twig_Extension
{
    
    public function getFunctions() {
        return array(
            new \Twig_SimpleFunction('bootstrapAlert', [$this, 'bootstrapAlert'], ['is_safe' => ['html']])
        );
    }
    
    public function bootstrapAlert($msg) {
        // <<<HTML syntaxe HEREDOC (chaine de caractère sans ' ou " voir la doc PHP)
        // attention pas d'espace ou autre après <<<HTML
        // avant ou après HTML;
        return <<<HTML
<div class="alert alert-success">$msg</div>
HTML;
    }

    
    public function getName()
    {
        return 'BootstrapAlert';
    }

}
