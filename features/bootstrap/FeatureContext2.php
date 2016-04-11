<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
//use Behat\MinkExtension\Context\MinkContext;
//use Drupal\DrupalExtension\Context\MinkContext;

require 'vendor\autoload.php';

/**
 * Defines application features from the specific context.
 */
class FeatureContext2 implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I wait for :arg1 seconds
     */
    public function iWaitForSeconds($seconds)
    {
        $this-> getSession() -> wait(1000*$seconds);
    }
}
