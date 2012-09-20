<?php

namespace mako;

use \mako\HTML;

/**
 * Class that makes it easy to implement Gravatar in your application.
 *
 * @author     Frederic G. Østby
 * @copyright  (c) 2008-2012 Frederic G. Østby
 * @license    http://www.makoframework.com/license
 */

class Gravatar
{
	//---------------------------------------------
	// Class variables
	//---------------------------------------------

	/**
	 * URL to the API server.
	 * 
	 * @var string
	 */

	const API_SERVER = 'http://www.gravatar.com/avatar/';

	/**
	 * URL to the secure API server.
	 * 
	 * @var string
	 */

	const API_SECURE_SERVER = 'https://secure.gravatar.com/avatar/';

	/**
	 * Default avatar size in pixels.
	 * 
	 * @var int
	 */

	protected $avatarSize = 80;

	/**
	 * Default avatar rating.
	 * 
	 * @var string
	 */

	protected $avatarRating = 'g';

	/**
	 * URL to the default avatar.
	 * 
	 * @var string
	 */

	protected $defaultAvatar = 'mm';

	//---------------------------------------------
	// Class constructor, destructor etc ...
	//------------------------------------------------

	/**
	 * Constructor.
	 *
	 * @access  public
	 */

	public function __construct()
	{
		// Nothing here
	}

	/**
	 * Factory method making method chaining possible right off the bat.
	 *
	 * @access  public
	 * @return  mako\Gravatar
	 */

	public static function factory()
	{
		return new static();
	}

	//---------------------------------------------
	// Class methods
	//---------------------------------------------

	/**
	 * Set the size of the Gravatar. Value must be between 1 and 512.
	 *
	 * @access  public
	 * @param   int            $size  Size of the avatar in pixels
	 * @return  mako\Gravatar
	 */

	public function setSize($size)
	{
		$this->avatarSize = ((int) $size <= 512 && (int) $size >= 1) ? (int) $size : 80;

		return $this;
	}

	/**
	 * Set the max rating of the Gravatar.
	 *
	 * @access  public
	 * @param   string         $rating  Maximum rating of the gravatar
	 * @return  mako\Gravatar
	 */

	public function setRating($rating)
	{
		$ratings = array('g', 'pg', 'r', 'x');

		$this->avatarRating = in_array($rating, $ratings) ? $rating : 'g';

		return $this;
	}

	/**
	 * Set the url to the default Gravatar.
	 *
	 * @access  public
	 * @param   string         $default  URL to a default avatar image
	 * @return  mako\Gravatar
	 */

	public function setDefault($default)
	{
		$this->defaultAvatar = rawurlencode($default);

		return $this;
	}
	
	/**
	 * Returns the size of the Gravatar.
	 *
	 * @access  public
	 * @return  int
	 */

	public function getSize()
	{
		return $this->avatarSize;
	}

	/**
	 * Returns the URL of the Gravatar.
	 *
	 * @access  public
	 * @param   string   $email  Email address
	 * @param   boolean  $ssl    (optional) Use SSL?
	 * @return  string
	 */

	public function getUrl($email, $ssl = false)
	{
		$server = ($ssl === true) ? static::API_SECURE_SERVER : static::API_SERVER;

		return $server . md5(trim(mb_strtolower($email))) . ".jpg?r={$this->avatarRating}&amp;s={$this->avatarSize}&amp;d={$this->defaultAvatar}";
	}

	/**
	 * Returns the secure URL of the Gravatar.
	 *
	 * @access  public
	 * @param   string  $email Email address
	 */

	public function getSecureUrl($email)
	{
		return $this->getUrl($email, true);
	}

	/**
	 * Returns Gravatar image tag.
	 * 
	 * @access  public
	 * @param   string   $email       Email address
	 * @param   array    $attributes  Image attributes
	 * @param   boolean  $ssl         (optional) Use SSL?
	 * @return  string
	 */

	public function getGravatar($email, array $attributes = array(), $ssl = false)
	{
		return HTML::tag('img', array_merge($attributes + array('alt' => ''), array
		(
			'src' => $this->getUrl($email, $ssl),
			'height' => $this->getSize(),
			'width'  => $this->getSize()
		)));
	}

	/**
	 * Returns secure Gravatar image tag.
	 * 
	 * @access  public
	 * @param   string   $email       Email address
	 * @param   array    $attributes  Image attributes
	 * @return  string
	 */

	public function getSecureGravatar($email, array $attributes = array())
	{
		return $this->getGravatar($email, $attributes, true);
	}
}

/** -------------------- End of file --------------------**/