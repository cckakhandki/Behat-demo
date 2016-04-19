<?php

//namespace NewTours;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\PyStringNode;
use Drupal\DrupalExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class NewToursContext extends FeatureContext implements Context, SnippetAcceptingContext
{

	/**
	 * @var \Behat\MinkExtension\Context\MinkContext
	 */
	private $minkContext;
	private $session;
	
 	/** @BeforeScenario */
 	public function gatherContexts(BeforeScenarioScope $scope)
 	{
 		$environment = $scope->getEnvironment();
	
 		$this->minkContext = $environment-> getContext('Drupal\DrupalExtension\Context\MinkContext');
 		$this-> session = $this->minkContext ->getSession();
 		//$this->session = $this->getSession();
		
 	}
	
    public function __construct()
    {
    	//var_dump($params);
    }
      

    /**
     * @Then I should see the following:
     */
    public function iShouldSeeFollowing(PyStringNode $string)
    {
        $this->minkContext->assertPageContainsText($string);
    }
    
    /**
     * @Then I should not see following:
     */
    public function iShouldNotSeeFollowing(PyStringNode $string)
    {
    	$this->minkContext->assertPageNotContainsText($string);
    }
    
}
