<?php
use Twig\Token;
use Twig\TokenParser\AbstractTokenParser;

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
 * Wrapper for Zend Framework 1.1x url view helper.
 * Syntax : {% url 'my_route' with ['param1': 'value1'] %}
 *
 * @package     Ano_ZFTwig
 * @subpackage  TokenParser
 * @author      Benjamin Dulau <benjamin.dulau@gmail.com>
 */
class Ano_ZFTwig_TokenParser_LayoutTokenParser extends AbstractTokenParser
{
    /**
     * Parses a token and returns a node.
     *
     * @param  Token $token A Twig_Token instance
     * @return Twig_NodeInterface A Twig_NodeInterface instance
     */
    public function parse(Token $token)
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();

        $contentKey = $this->parser->getStream()->expect(Token::STRING_TYPE)->getValue();

        $stream->expect(Token::BLOCK_END_TYPE);

        return new Ano_ZFTwig_Node_LayoutNode($contentKey, $lineno, $this->getTag());
    }

    /**
     * Gets the tag name associated with this token parser.
     *
     * @param string The tag name
     */
    public function getTag()
    {
        return 'layout';
    }
}
