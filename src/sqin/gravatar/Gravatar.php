<?php

namespace sqin\gravatar;

/**
 * Gravatar library.
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

	const API_SERVER = '//www.gravatar.com/avatar/';

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
	 * @return  \sqin\gravatar\Gravatar
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
	 * @return  \sqin\gravatar\Gravatar
	 */

	public function setSize($size)
	{
		$this->avatarSize = max(min((int) $size, 512), 1);

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
	 * Set the max rating of the Gravatar.
	 *
	 * @access  public
	 * @param   string         $rating  Maximum rating of the gravatar
	 * @return  \sqin\gravatar\Gravatar
	 */

	public function setRating($rating)
	{
		$ratings = array('g', 'pg', 'r', 'x');

		$this->avatarRating = in_array($rating, $ratings) ? $rating : 'g';

		return $this;
	}

	/**
	 * Returns the rating of the Gravatar.
	 *
	 * @access  public
	 * @return  int
	 */

	public function getRating()
	{
		return $this->avatarRating;
	}

	/**
	 * Set the URL to the default Gravatar.
	 *
	 * @access  public
	 * @param   string         $default  URL to a default avatar image
	 * @return  \sqin\gravatar\Gravatar
	 */

	public function setDefault($default)
	{
		$this->defaultAvatar = rawurlencode($default);

		return $this;
	}

	/**
	 * Returns the urlencode URL of the default Gravatar.
	 *
	 * @access  public
	 * @return  int
	 */

	public function getDefault()
	{
		return $this->defaultAvatar;
	}

	/**
	 * Returns the URL of the Gravatar.
	 *
	 * @access  public
	 * @param   string   $email  Email address
	 * @return  string
	 */

	public function getURL($email)
	{
		return static::API_SERVER . md5(trim(mb_strtolower($email))) . "?r={$this->avatarRating}&amp;s={$this->avatarSize}&amp;d={$this->defaultAvatar}";
	}

	/**
	 * Returns Gravatar image tag.
	 * 
	 * @access  public
	 * @param   string   $email       Email address
	 * @param   array    $attributes  Image attributes
	 * @return  string
	 */

	public function getGravatar($email, array $attributes = array(), $ssl = false)
	{
		$attributes = $attributes + array
		(
			'alt'    => '', 
			'width'  => $this->avatarSize, 
			'height' => $this->avatarSize, 
		);

		$attrs = '';

		foreach($attributes as $attribute => $value)
		{
			if(is_int($attribute))
			{
				$attribute = $value;
			}

			$attrs .= $attribute . '="' . $value . '" ';
		}

		return sprintf('<img src="%s" %s>', $this->getURL($email), trim($attrs));
	}
}

/** -------------------- End of file --------------------**/