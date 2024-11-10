<?php

namespace Tests\Unit;

use Tests\TestCase;
use Zerotoprod\DataModelSemver\Semver;

class InstantiationTest extends TestCase
{
    /** @test */
    public function null_value(): void
    {
        $Semver = Semver::from();

        self::assertNull($Semver->major);
        self::assertNull($Semver->minor);
        self::assertNull($Semver->patch);
        self::assertNull($Semver->prerelease);
        self::assertNull($Semver->buildmetadata);
    }

    /** @test */
    public function all(): void
    {
        $Semver = Semver::from('1.2.3-prerelease+meta');

        self::assertEquals(1, $Semver->major);
        self::assertIsInt($Semver->major);
        self::assertEquals(2, $Semver->minor);
        self::assertIsInt($Semver->minor);
        self::assertEquals(3, $Semver->patch);
        self::assertIsInt($Semver->patch);
        self::assertEquals('prerelease', $Semver->prerelease);
        self::assertEquals('meta', $Semver->buildmetadata);
    }

    /** @test */
    public function toArray(): void
    {
        $Semver = Semver::from('1.2.3-prerelease+meta')->toArray();

        self::assertEquals(1, $Semver[Semver::major]);
        self::assertEquals(2, $Semver[Semver::minor]);
        self::assertEquals(3, $Semver[Semver::patch]);
        self::assertEquals('prerelease', $Semver[Semver::prerelease]);
        self::assertEquals('meta', $Semver[Semver::buildmetadata]);
    }

    /** @test */
    public function toJson(): void
    {
        self::assertEquals(
            '{"major":1,"minor":2,"patch":3,"prerelease":"prerelease","buildmetadata":"meta"}',
            Semver::from('1.2.3-prerelease+meta')->toJson()
        );
    }
}