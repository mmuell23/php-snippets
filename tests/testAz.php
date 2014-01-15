<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://www.allgemeine-zeitung.de/");
  }

  public function testMyTestCase()
  {
    $this->open("/index.htm");
    $this->click("css=img[alt=\"Allgemeine Zeitung\"]");
    $this->waitForPageToLoad("30000");
    $this->click("link=Lokales");
    $this->waitForPageToLoad("30000");
    try {
        $this->assertTrue((bool)preg_match('/^[\s\S]*Lokale[\s\S]*$/',$this->getTitle()));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
  }
}
?>