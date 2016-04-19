<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{

	/**
	 * @var \Drupal\DrupalExtension\Context\MinkContext
	 */
	private $minkContext;
	private $session;
	
    
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

    /** @BeforeScenario */
    public function gatherContexts(BeforeScenarioScope $scope)
    {
    	$environment = $scope->getEnvironment();
    
    	$this->minkContext = $environment-> getContext('Drupal\DrupalExtension\Context\MinkContext');
    	$this->session = $this->minkContext->getSession();
    
    }

    /**
     *
     * @Given /^I wait for (\d+) seconds$/
     */
    public function iWaitForSeconds($seconds)
    {
       $this->session -> wait(1000*$seconds);
    }
    
    /**
     * @Given I should see the following links:
     */
    public function iShouldSeeTheFollowingLinks(TableNode $table)
    {
    	$hash= $table->getHash();
    	foreach ($hash as $rows => $row){
    		//var_dump($row['links']);
    		$this->minkContext-> assertPageContainsText($row['links']);
    		
    	}
    }
    
    /**
     * @Then I should see following:
     */
    public function iShouldSeeFollowing(PyStringNode $string)
    {
    	$this->minkContext->assertPageContainsText($string);
    }
    
}
