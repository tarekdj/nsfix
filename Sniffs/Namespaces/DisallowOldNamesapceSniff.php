<?php

namespace PHP_CodeSniffer\Standards\AlmaviaStandard\Sniffs\Namespaces;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class DisallowOldNamesapceSniff implements Sniff
{

    const OLD_NS = 'CHANGE_ME';
    const NEW_NS = 'CHANGE_ME';

    private $fixer;

    private $position;

    /**
     * Returns the token types that this sniff is interested in.
     *
     * @return array(int)
     */
    public function register(): array
    {
        return [
            T_NAMESPACE,
            T_USE
        ];

    }

    /**
     * Processes this sniff, when one of its tokens is encountered.
     *
     * @param \PHP_CodeSniffer\Files\File $phpcsFile The current file being checked.
     * @param int                         $stackPtr  The position of the current token in the
     *                                               stack passed in $tokens.
     *
     * @return void
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $this->fixer = $phpcsFile->fixer;
        $tokens = $phpcsFile->getTokens();
        $ns = $phpcsFile->findNext(T_STRING, $stackPtr+1);
        $this->position = $ns;
        if ($tokens[$ns]['content'] === self::OLD_NS) {
            $error = "Deprecated " . self::OLD_NS . " Namespace; found %s";
            $data  = [$tokens[$stackPtr]['content'] . " " . trim($tokens[$ns]['content'])];
            $phpcsFile->addFixableError(
                $error,
                $stackPtr,
                self::class,
                $data
            );

            $this->fix();
        }
    }

    /**
     * Replaces the old namespace by the new one.
     */
    private function fix(): void
    {
        $this->fixer->replaceToken($this->position, self::NEW_NS);
    }
}

