<?php


	require_once(__DIR__ . '/../bootstrap.php');
	
	
	use LiftKit\Identifier\Identifier;
	
	
	class Identifier_Identifier_Test extends PHPUnit_Framework_TestCase
	{
		
		
		public function testToString ()
		{
			$string = 'test';
			$identifier = new Identifier($string);
			
			$this->assertEquals($identifier->toString(), $string);
			$this->assertEquals((string) $identifier, $string);
		}
		
		
		public function testCapitalized ()
		{
			$identifier = new Identifier('two words');
			
			$this->assertEquals($identifier->capitalized(), 'Two Words');
		}
		
		
		public function testUppercase ()
		{
			$identifier = new Identifier('two words');
			
			$this->assertEquals($identifier->uppercase(), 'TWO WORDS');
		}
		
		
		public function testLowercase ()
		{
			$identifier = new Identifier('TWO WORDS');
			
			$this->assertEquals($identifier->lowercase(), 'two words');
		}
		
		
		public function testCamelcase ()
		{
			$identifier = new Identifier('two words');
			
			$this->assertEquals($identifier->camelcase(), 'twoWords');
		}
		
		
		public function testJoin ()
		{
			$identifier = new Identifier('two words');
			
			$this->assertEquals($identifier->join('#'), 'two#words');
		}
		
		
		public function testPlural ()
		{
			$identifier = new Identifier('thing', 'things');
			
			$this->assertEquals($identifier, 'thing');
			$this->assertEquals($identifier->plural(), 'things');
			$this->assertEquals($identifier->plural()->uppercase(), 'THINGS');
		}
		
		
		public function testDashed ()
		{
			$identifier = new Identifier('Two Words');
			
			$this->assertEquals($identifier->dashed(), 'Two-Words');
		}
		
		
		public function testUnderscored ()
		{
			$identifier = new Identifier('Two Words');
			
			$this->assertEquals($identifier->underscored(), 'Two_Words');
		}
		
		
		public function testUppercaseUnderscored ()
		{
			$identifier = new Identifier('Two Words');
			
			$this->assertEquals($identifier->uppercase()->underscored(), 'TWO_WORDS');
		}
		
		
		public function testConvertFromDashesToUnderscored ()
		{
			$identifier = new Identifier('two words');
			
			$this->assertEquals($identifier->dashed()->underscored(), 'two_words');
		}
		
		
		public function testCapitalizedCamelcase ()
		{
			$identifier = new Identifier('two words');
			
			$this->assertEquals($identifier->capitalizedCamelcase(), 'TwoWords');
		}
		
		
		/**
		  * @expectedException \LiftKit\Identifier\Exception\Identifier
		  */
		public function testFailsWithIncorrectSeparator ()
		{
			$identifier = new Identifier('test', null, '');
		}
		
		
		/**
		  * @expectedException \LiftKit\Identifier\Exception\Identifier
		  */
		public function testFailsWithNoPlural ()
		{
			$identifier = new Identifier('test', null);
			
			$identifier->plural();
		}
		
		
		/**
		  * @expectedException \LiftKit\Identifier\Exception\Identifier
		  */
		public function testFailsWithDoublePlural ()
		{
			$identifier = new Identifier('test', 'tests');
			
			$identifier->plural()->plural();
		}
	}