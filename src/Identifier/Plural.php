<?php


	namespace LiftKit\Identifier;
	
	use LiftKit\Identifier\Exception\Identifier as IdentifierException;
	
	
	class Plural extends Identifier 
	{
		protected $plural;
		
		
		public function __construct ($identifier, $plural, $separator = ' ')
		{			
			parent::__construct($identifier, $separator);
			
			if (! $plural) {
				throw new IdentifierException('Invalid plural form.');
			}
			
			$this->plural = $plural;
		}
		
		
		public function plural ()
		{			
			return new Identifier(
				$this->plural,
				$this->separator
			);
		}
		
		
		public function capitalized ()
		{
			return new self(
				$this->transformCapitalized($this->identifier),
				$this->transformCapitalized($this->plural),
				$this->separator
			);
		}
		
		
		public function uppercase ()
		{
			return new self(
				$this->transformUppercase($this->identifier),
				$this->transformUppercase($this->plural),
				$this->separator
			);
		}
		
		
		public function lowercase ()
		{
			return new self(
				$this->transformLowercase($this->identifier),
				$this->transformLowercase($this->plural),
				$this->separator
			);
		}
		
		
		public function camelcase ()
		{
			return new self(
				$this->transformCamelcase($this->identifier),
				$this->transformCamelcase($this->plural)
			);
		}
		
		
		public function join ($separator = '')
		{
			return new self(
				$this->transformJoin($this->identifier, $separator),
				$this->transformJoin($this->plural, $separator),
				$separator ?: ' '
			);
		}
	}