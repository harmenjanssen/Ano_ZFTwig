<?php
use Twig\Compiler;
use Twig\Node\Node;

/**
 * This file is part of the Ano_ZFTwig package
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.
 *
 * @copyright  Copyright (c) 2010-2011 Benjamin Dulau <benjamin.dulau@gmail.com>
 * @license    New BSD License
 */

/**
 * Compiles url node to PHP.
 * @see Ano_ZFTwig_Extension_Helper
 *
 * @package     Ano_ZFTwig
 * @subpackage  Node
 * @author      Benjamin Dulau <benjamin.dulau@gmail.com>
 */
class Ano_ZFTwig_Node_LayoutNode extends Node
{
    protected $contentKey;

    public function __construct($contentKey, $lineno, $tag = null)
    {
        $this->contentKey = $contentKey;
        parent::__construct(array(), array(), $lineno, $tag);
    }

    /**
     * Compiles the node to PHP.
     *
     * @param Compiler A Twig_Compiler instance
     */
    public function compile(Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write('echo $this->env->getView()->layout()->')
            ->raw($this->contentKey)
            ->raw(';');
    }
}
