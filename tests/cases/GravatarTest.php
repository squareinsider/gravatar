<?php

use \sqin\gravatar\Gravatar;

class GravatarTest extends PHPUnit_Framework_TestCase
{
	/**
	 *
	 */

	public function testSize()
	{
		$gravatar = new Gravatar();

		$gravatar->setSize(0);

		$this->assertEquals(1, $gravatar->getSize());

		$gravatar->setSize(100);

		$this->assertEquals(100, $gravatar->getSize());

		$gravatar->setSize(1000);

		$this->assertEquals(512, $gravatar->getSize());
	}

	/**
	 * 
	 */

	public function testRating()
	{
		$gravatar = new Gravatar();

		$gravatar->setRating('g');

		$this->assertEquals('g', $gravatar->getRating());

		$gravatar->setRating('pg');

		$this->assertEquals('pg', $gravatar->getRating());

		$gravatar->setRating('r');

		$this->assertEquals('r', $gravatar->getRating());

		$gravatar->setRating('x');

		$this->assertEquals('x', $gravatar->getRating());

		$gravatar->setRating('xx');

		$this->assertEquals('g', $gravatar->getRating());
	}

	/**
	 * 
	 */

	public function testDefault()
	{
		$gravatar = new Gravatar();

		$this->assertEquals('mm', $gravatar->getDefault());

		$gravatar->setDefault('http://example.org/default.jpg');

		$this->assertEquals('http%3A%2F%2Fexample.org%2Fdefault.jpg', $gravatar->getDefault());
	}

	/**
	 * 
	 */

	public function testURL()
	{
		$gravatar = new Gravatar();

		$this->assertEquals('//www.gravatar.com/avatar/64f677e30cd713a9467794a26711e42d.jpg?r=g&amp;s=80&amp;d=mm', $gravatar->getURL('foo@example.org'));

		$gravatar = new Gravatar();

		$gravatar->setSize(100);

		$gravatar->setRating('pg');

		$gravatar->setDefault('http://example.org/default.jpg');

		$this->assertEquals('//www.gravatar.com/avatar/64f677e30cd713a9467794a26711e42d.jpg?r=pg&amp;s=100&amp;d=http%3A%2F%2Fexample.org%2Fdefault.jpg', $gravatar->getURL('foo@example.org'));
	}

	/**
	 * 
	 */

	public function testGravatar()
	{
		$gravatar = new Gravatar();

		$this->assertEquals('<img src="//www.gravatar.com/avatar/64f677e30cd713a9467794a26711e42d.jpg?r=g&amp;s=80&amp;d=mm" alt="" width="80" height="80">', $gravatar->getGravatar('foo@example.org'));

		$gravatar = new Gravatar();

		$this->assertEquals('<img src="//www.gravatar.com/avatar/64f677e30cd713a9467794a26711e42d.jpg?r=g&amp;s=80&amp;d=mm" alt="foo" class="bar" width="80" height="80">', $gravatar->getGravatar('foo@example.org', array('alt' => 'foo', 'class' => 'bar')));
	}
}