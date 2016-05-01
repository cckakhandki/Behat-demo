<?php

namespace src\Newtours;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\PyStringNode;
use Drupal\DrupalExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class NewToursContext implements Context, SnippetAcceptingContext {
    
    /**
     *
     * @var \Behat\MinkExtension\Context\MinkContext
     */
    private $minkContext;
    private $session;
    /** @var \src\FeatureContext */
    private $featureContext;
    
    /**
     * @BeforeScenario
     */
    public function gatherContexts(BeforeScenarioScope $scope) {
        $environment = $scope->getEnvironment ();
        $this->minkContext = $environment->getContext ( 'Drupal\DrupalExtension\Context\MinkContext' );
        $this->session = $this->minkContext->getSession ();
        $this->featureContext = $environment->getContext ( 'src\FeatureContext' );
    }
    public function __construct() {
        // var_dump($params);
    }
    
    /**
     * @Then I should not see following:
     */
    public function iShouldNotSeeFollowing(PyStringNode $string) {
        $this->minkContext->assertPageNotContainsText ( $string );
    }
}
