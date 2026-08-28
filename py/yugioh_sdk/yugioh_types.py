# Typed models for the YuGiOh SDK.
#
# GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
# params (op.<name>.points[].args.params[]). Field/param types come from the
# canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
# @voxgig/apidef VALID_CANON). Do not edit by hand.
#
# These are TypedDicts, not dataclasses: the SDK ops return/accept plain dicts
# at runtime, and a TypedDict IS a dict shape, so the types match the runtime.
# Optional (req:false) keys are modelled as TypedDict key-optionality
# (total=False), split into a required base + total=False subclass when a type
# has both required and optional keys.

from __future__ import annotations

from typing import TypedDict, Any


class CardinfoRequired(TypedDict):
    desc: str
    frameType: str
    id: int
    name: str
    type: str


class Cardinfo(CardinfoRequired, total=False):
    archetype: str
    atk: int
    attribute: str
    banlist_info: dict
    beta_name: str
    card_images: list
    card_prices: list
    card_sets: list
    downvotes: int
    formats: list
    genesys_points: int
    has_effect: int
    konami_id: int
    level: int
    linkmarkers: list
    linkval: int
    md_rarity: str
    ocg_date: str
    race: str
    scale: int
    tcg_date: str
    treated_as: str
    upvotes: int
    views: int
    viewsweek: int
    ygoprodeck_url: str


class CardinfoListMatch(TypedDict, total=False):
    archetype: str
    atk: str
    attribute: str
    banlist: str
    cardset: str
    dateregion: str
    enddate: str
    fname: str
    format: str
    has_effect: bool
    id: str
    konami_id: int
    level: str
    link: int
    linkmarker: str
    misc: str
    name: str
    race: str
    scale: int
    sort: str
    staple: str
    startdate: str
    tcgplayer_data: str
    type: str
