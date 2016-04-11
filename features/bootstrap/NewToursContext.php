<?php

//namespace NewTours;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\PyStringNode;
use Drupal\DrupalExtension\Context\MinkContext;
//use Drupal\DrupalExtension\Context\DrupalContext;

/**
 * Defines application features from the specific context.
 */
class NewToursContext /*extends MinkContext*/ implements Context, SnippetAcceptingContext
{

	/** 
	 * @var \Behat\MinkExtension\Context\MinkContext 
	 */
	private $minkContext;
	private $session;
	private $output_path = 'reports/screenshots';
	public $currentScenario;
	private $screenshot_path;
	
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
    
    //@Given I wait for :arg1 seconds
    /**
     *  
     * @Given /^I wait for (\d+) seconds$/
     */
    public function iWaitForSeconds($seconds)
    {
       $this->session -> wait(1000*$seconds);
    }
      

    /**
     * @Then I should see following:
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
    
//     /**
//      * 
//      * @AfterStep 
//      */
//     public function iTakeScreenShotOnFailedStep(AfterStepScope $scope) {
//     	//$path = null;
//     	if (99 === $scope->getTestResult()->getResultCode()) {
//     		//$url = $this-> session -> getCurrentUrl();
//     		//$this->saveScreenshot($fileName, $this->output_path);
//     		if (!is_dir($this->output_path)){
//     			mkdir($this->output_path);
//     		}   		
    		
// 	        $browser = $this->getMinkParameter('browser_name');
// 	        $fileName = $browser . '- Failed - ' . date('d-m-y') . '.png';
	        
// 	        file_put_contents($this->output_path . '/' . $fileName, $this->session->getScreenshot());
	        
// 			$this->setMinkParameter("failed_screenshot", $this->output_path.'/'.$fileName); 
				
//     		//print "screenshot taken" . $path;
//     		//return path;
// 	    }
//     }
    
//     /**
//      * @BeforeScenario
//      *
//      * @param BeforeScenarioScope $scope
//      *
//      */
//     public function setUpTestEnvironment($scope)
//     {
//     	$this->currentScenario = $scope->getScenario();
//     }
//}
    
}
