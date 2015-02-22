<?php


	namespace LiftKit\Token;
	
	use LiftKit\Token\Exception\Token as TokenException;
	
	
	class Plural extends Token 
	{
		protected $plural;
		
		
		public function __construct ($identifier, $plural, $separator = ' ')
		{			
			parent::__construct($identifier, $separator);
			
			if (! $plural) {
				throw new TokenException('Invalid plural form.');
			}
			
			$this->plural = $plural;
		}
		
		
		public function plural ()
		{
			return new Token(
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