<?php

namespace Zerotoprod\DataModelSemver;

use Zerotoprod\RegexSemver\RegexSemver;
use Zerotoprod\Transformable\Transformable;

/**
 * A DataModel Representing the Components of a SemVer String
 *
 * @link https://github.com/zero-to-prod/data-model-semver
 */
class Semver
{
    use Transformable;

    /**
     * The `MAJOR` version component
     *
     * @var string
     *
     * @link https://semver.org
     * @link https://github.com/zero-to-prod/data-model-semver
     */
    public const major = 'major';

    /**
     * The `MINOR` version component
     *
     * @var string
     *
     * @link https://semver.org
     * @link https://github.com/zero-to-prod/data-model-semver
     */
    public const minor = 'minor';

    /**
     * The `PATCH` version component
     *
     * @var string
     *
     * @link https://semver.org
     * @link https://github.com/zero-to-prod/data-model-semver
     */
    public const patch = 'patch';

    /**
     * The `prerelease` version component
     *
     * @var string
     *
     * @link https://semver.org
     * @link https://github.com/zero-to-prod/data-model-semver
     */
    public const prerelease = 'prerelease';

    /**
     * The `buildmetadata` version component
     *
     * @var string
     *
     * @link https://semver.org
     * @link https://github.com/zero-to-prod/data-model-semver
     */
    public const buildmetadata = 'buildmetadata';

    /**
     * The `MAJOR` version component
     *
     * @var null|int
     *
     * @link https://semver.org
     * @link https://github.com/zero-to-prod/data-model-semver
     */
    public $major;

    /**
     * The `MINOR` version component
     *
     * @var null|int
     *
     * @link https://semver.org
     * @link https://github.com/zero-to-prod/data-model-semver
     */
    public $minor;

    /**
     * The `PATCH` version component
     *
     * @var null|int
     *
     * @link https://semver.org
     * @link https://github.com/zero-to-prod/data-model-semver
     */
    public $patch;

    /**
     * The `prerelease` version component
     *
     * @var null|string
     *
     * @link https://semver.org
     * @link https://github.com/zero-to-prod/data-model-semver
     */
    public $prerelease;

    /**
     * The `buildmetadata` version component
     *
     * @var null|string
     *
     * @link https://semver.org
     * @link https://github.com/zero-to-prod/data-model-semver
     */
    public $buildmetadata;

    /**
     * @link https://github.com/zero-to-prod/data-model-semver
     */
    public static function from(string $version = ''): self
    {
        $self = new self();

        if (!$version) {
            return $self;
        }

        preg_match(RegexSemver::pattern, $version, $matches);
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