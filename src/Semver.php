<?php

namespace Zerotoprod\DataModelSemver;

use Zerotoprod\SemverRegex\SemverRegex;
use Zerotoprod\Transformable\Transformable;

class Semver
{
    use Transformable;

    /**
     * The `MAJOR` version component
     *
     * @var string
     *
     * @link https://semver.org/
     */
    public const major = 'major';

    /**
     * The `MINOR` version component
     *
     * @var string
     *
     * @link https://semver.org/
     */
    public const minor = 'minor';

    /**
     * The `PATCH` version component
     *
     * @var string
     *
     * @link https://semver.org/
     */
    public const patch = 'patch';

    /**
     * The `prerelease` version component
     *
     * @var string
     *
     * @link https://semver.org/
     */
    public const prerelease = 'prerelease';

    /**
     * The `buildmetadata` version component
     *
     * @var string
     *
     * @link https://semver.org/
     */
    public const buildmetadata = 'buildmetadata';

    /**
     * The `MAJOR` version component
     *
     * @var null|int
     *
     * @link https://semver.org/
     */
    public $major;

    /**
     * The `MINOR` version component
     *
     * @var null|int
     *
     * @link https://semver.org/
     */
    public $minor;

    /**
     * The `PATCH` version component
     *
     * @var null|int
     *
     * @link https://semver.org/
     */
    public $patch;

    /**
     * The `prerelease` version component
     *
     * @var null|string
     *
     * @link https://semver.org/
     */
    public $prerelease;

    /**
     * The `buildmetadata` version component
     *
     * @var null|string
     *
     * @link https://semver.org/
     */
    public $buildmetadata;

    public static function from(string $version = ''): self
    {
        $self = new self();

        if (!$version) {
            return $self;
        }

        preg_match(SemverRegex::pattern, $version, $matches);
        foreach ($matches as $key => $match) {
            if (property_exists($self, $key)) {
                $self->$key = ($key === self::major || $key === self::minor || $key === self::patch)
                    ? (int)$match
                    : $match;
            }
        }

        return $self;
    }
}