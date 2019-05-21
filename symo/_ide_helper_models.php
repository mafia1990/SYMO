<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Category
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category query()
 */
	class Category extends \Eloquent {}
}

namespace App{
/**
 * App\CategoryProperty
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryProperty query()
 */
	class CategoryProperty extends \Eloquent {}
}

namespace App{
/**
 * App\CategoryPropertyData
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryPropertyData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryPropertyData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryPropertyData query()
 */
	class CategoryPropertyData extends \Eloquent {}
}

namespace App{
/**
 * App\Cloth
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cloth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cloth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cloth query()
 */
	class Cloth extends \Eloquent {}
}

namespace App{
/**
 * App\ClothCategoryPropertyData
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClothCategoryPropertyData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClothCategoryPropertyData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClothCategoryPropertyData query()
 */
	class ClothCategoryPropertyData extends \Eloquent {}
}

namespace App{
/**
 * App\Color
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Color query()
 */
	class Color extends \Eloquent {}
}

namespace App{
/**
 * App\Point
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Point newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Point newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Point query()
 */
	class Point extends \Eloquent {}
}

namespace App{
/**
 * App\Pointable
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Point[] $points
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Set[] $sets
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pointable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pointable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pointable query()
 */
	class Pointable extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role query()
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\Season
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Season newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Season newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Season query()
 */
	class Season extends \Eloquent {}
}

namespace App{
/**
 * App\set
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Season[] $seasons
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Set query()
 */
	class set extends \Eloquent {}
}

namespace App{
/**
 * App\Style
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Style[] $styles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Style newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Style newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Style query()
 */
	class Style extends \Eloquent {}
}

namespace App{
/**
 * Post
 *
 * @mixin \Eloquent
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 */
	class User extends \Eloquent {}
}

