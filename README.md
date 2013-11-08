#Gravatar

[![Build Status](https://travis-ci.org/squareinsider/gravatar.png)](https://travis-ci.org/squareinsider/gravatar)
[![Latest Stable Version](https://poser.pugx.org/sqin/gravatar/v/stable.png)](https://packagist.org/packages/sqin/gravatar)
[![Latest Unstable Version](https://poser.pugx.org/sqin/gravatar/v/unstable.png)](https://packagist.org/packages/sqin/gravatar)

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

###getSize()

Returns the size of the Gravatar.

    $gravatar->getSize();

###setRating(string $rating)

Set the max rating of the Gravatar.

    $gravatar->setRating('pg');

###getSize()

Returns the rating of the Gravatar.

    $gravatar->getRating();

###setDefault(string $default)

Set the url to the default Gravatar.

    $gravatar->setDefault('http://example.org/default_avatar.png');

###getSize()

Returns the urlencoded URL of the default Gravatar.

    $gravatar->getDefault();

###getUrl(string $email)

Returns the URL of the Gravatar.

    $gravatar->getUrl('user@example.org');

###getGravatar(string $email [, array $attributes = array()])

Returns Gravatar image tag.

    $gravatar->getGravatar('user@example.org');