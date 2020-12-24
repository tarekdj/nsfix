<?php

namespace PHP_CodeSniffer\Standards\nsfix\Sniffs\Namespaces;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class DisallowOldNamesapceSniff implements Sniff
{

    private $fixer;

    private $position;

    private $found;

    public $nameSpacesMapping = [];

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
     */
    public function process(File $phpcsFile, $stackPtr): void
    {
        $this->fixer = $phpcsFile->fixer;
        $tokens = $phpcsFile->getTokens();
        $ns = $phpcsFile->findNext(T_STRING, $stackPtr+1);
        $this->position = $ns;

        if (array_key_exists($tokens[$ns]['content'], $this->nameSpacesMapping)) {
            $this->found = $tokens[$ns]['content'];
            $error = "Deprecated " . $this->found . " Namespace; found %s";
            $data  = [$tokens[$stackPtr]['content'] . " " . trim($this->found)];
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
    protected function fix(): void
    {
        $newNamespace = $this->getNewNamespace();
        $this->fixer->replaceToken($this->position, $newNamespace);
    }

    /**
     * Get the namespace replacement.
     */
    protected function getNewNamespace(): string
    {
        return $this->nameSpacesMapping[$this->found] ?? '';
    }
}
