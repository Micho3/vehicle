<?php
	header("Content-Type:text/html;charset=utf-8");
	require_once("./simpletest/autorun.php");
	class test extends UnitTestCase{
		public function testSimple(){
			
			$this->assertEqual(1+1,3);
		}
	
	}

	//class test extends WebTestCase {



	//require_once('./simpletest/web_tester.php');


//$this->assertTrue('./index1.php');
			// exit;
		// function testHomePageHasContactDetailsLink() {
	 //        $this->get('http://www.vehicle.com/index.php');
	 //        $this->assertTitle('欢迎您');
	 //        $this->clickLink('Contact');
  //       	$this->assertTitle('Contact me');
  //       	$this->assertText('/Email me at/');
  //   	}