<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://www.wiesbadener-kurier.de/");
  }

  public function testMyTestCase()
  {
    $this->open("/index.htm");
    $this->click("css=img[alt=\"Wiesbadener Kurier\"]");
    $this->waitForPageToLoad("30000");
    $this->click("//div[@id='desk']/div/ul/li[3]/a/span");
    $this->waitForPageToLoad("30000");
    try {
        $this->assertTrue((bool)preg_match('/^[\s\S]*Food[\s\S]*$/',$this->getBodyText()));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
  }
}
?>