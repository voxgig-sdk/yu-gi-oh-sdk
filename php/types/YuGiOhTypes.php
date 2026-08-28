<?php
declare(strict_types=1);

// Typed models for the YuGiOh SDK.
//
// GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
// params (op.<name>.points[].args.params[]). Field/param types come from the
// canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
// @voxgig/apidef VALID_CANON). Do not edit by hand.
//
// These are documentation-grade value objects (PHP 8 typed properties),
// registered on the composer classmap autoload. The SDK boundary exchanges
// assoc-arrays; these classes name the shapes for tooling and typed callers.

/** Cardinfo entity data model. */
class Cardinfo
{
    public ?string $archetype = null;
    public ?int $atk = null;
    public ?string $attribute = null;
    public ?array $banlist_info = null;
    public ?string $beta_name = null;
    public ?array $card_images = null;
    public ?array $card_prices = null;
    public ?array $card_sets = null;
    public ?int $def = null;
    public string $desc;
    public ?int $downvotes = null;
    public ?array $formats = null;
    public string $frameType;
    public ?int $genesys_points = null;
    public ?int $has_effect = null;
    public int $id;
    public ?int $konami_id = null;
    public ?int $level = null;
    public ?array $linkmarkers = null;
    public ?int $linkval = null;
    public ?string $md_rarity = null;
    public string $name;
    public ?string $ocg_date = null;
    public ?string $race = null;
    public ?int $scale = null;
    public ?string $tcg_date = null;
    public ?string $treated_as = null;
    public string $type;
    public ?int $upvotes = null;
    public ?int $views = null;
    public ?int $viewsweek = null;
    public ?string $ygoprodeck_url = null;
}

/** Request payload for Cardinfo#list. */
class CardinfoListMatch
{
    public ?string $archetype = null;
    public ?string $atk = null;
    public ?string $attribute = null;
    public ?string $banlist = null;
    public ?string $cardset = null;
    public ?string $dateregion = null;
    public ?string $def = null;
    public ?string $enddate = null;
    public ?string $fname = null;
    public ?string $format = null;
    public ?bool $has_effect = null;
    public ?string $id = null;
    public ?int $konami_id = null;
    public ?string $level = null;
    public ?int $link = null;
    public ?string $linkmarker = null;
    public ?string $misc = null;
    public ?string $name = null;
    public ?string $race = null;
    public ?int $scale = null;
    public ?string $sort = null;
    public ?string $staple = null;
    public ?string $startdate = null;
    public ?string $tcgplayer_data = null;
    public ?string $type = null;
}

