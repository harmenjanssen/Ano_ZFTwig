<?php
use Twig\Node\Expression\ArrayExpression;
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
 * @package     Ano_ZFTwig
 * @subpackage  TokenParser
 * @author      Benjamin Dulau <benjamin.dulau@gmail.com>
 */
class Ano_ZFTwig_TokenParser_JavascriptTokenParser extends AbstractTokenParser
{
    /**
     * Parses a token and returns a node.
     *
     * @param  Token $token A Token instance
     * @return Twig_NodeInterface A Twig_NodeInterface instance
     */
    public function parse(Token $token)
    {
        $expr = $this->parser->getExpressionParser()->parseExpression();

        // options
        if ($this->parser->getStream()->test(Token::PUNCTUATION_TYPE, ',')) {
            $this->parser->getStream()->next();

            $options = $this->parser->getExpressionParser()->parseExpression();
        } else {
            $options = new ArrayExpression(array(), $token->getLine());
        }

        $this->parser->getStream()->expect(Token::BLOCK_END_TYPE);

        return new Ano_ZFTwig_Node_JavascriptNode($expr, $options, $token->getLine(), $this->getTag());
    }

    /**
     * Gets the tag name associated with this token parser.
     *
     * @param string The tag name
     */
    public function getTag()
    {
        return 'javascript';
    }
}
