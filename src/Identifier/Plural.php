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
		
		
		protected function constructTransformed ($callback, $separator = null)
		{
			return new self(
				$callback($this->identifier),
				$callback($this->plural),
				is_null($separator) ? $this->separator : $separator
			);
		}
	}