#Gravatar

##Description

The Gravatar package allows you to easily implement Gravatars in your application.

##Methods

###__construct()

Creates a Gravatar instance.

    $gravatar = new Gravatar();

###factory()

Returns a Gravatar instance. Allows for method chaining right of the bat.

    Gravatar::factory()->setSize(80)->getGravatar('user@example.org');

###setSize(int $size)

Set the size of the Gravatar. Value must be between 1 and 512.

    $gravatar->setSize(100);

###setRating(string $rating)

Set the max rating of the Gravatar.

    $gravatar->setRating('pg');


###setDefault(string $default)

Set the url to the default Gravatar.

    $gravatar->setDefault('http://example.org/default_avatar.png');

###getSize()

Returns the size of the Gravatar.

    $gravatar->getSize();

###getUrl(string $email [, boolean $ssl = false ])

Returns the URL of the Gravatar.

    $gravatar->getUrl('user@example.org');

###getSecureUrl(string $email)

Returns the secure URL of the Gravatar.

    $gravatar->getSecureUrl('user@example.org');

###getGravatar(string $email [, array $attributes = array() [, $ssl = false]])

Returns Gravatar image tag.

    $gravatar->getGravatar('user@example.org');

###getSecureGravatar(string $email [, array $attributes = array()])

Returns secure Gravatar image tag.

    $gravatar->getGravatar('user@example.org');