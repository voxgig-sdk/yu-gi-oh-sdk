# Typed models for the YuGiOh SDK.
#
# GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
# params (op.<name>.points[].args.params[]). Field/param types come from the
# canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
# @voxgig/apidef VALID_CANON). Do not edit by hand.

from __future__ import annotations

from dataclasses import dataclass
from typing import Optional, Any


@dataclass
class Cardinfo:
    desc: str
    frame_type: str
    id: int
    name: str
    type: str
    archetype: Optional[str] = None
    atk: Optional[int] = None
    attribute: Optional[str] = None
    banlist_info: Optional[dict] = None
    beta_name: Optional[str] = None
    card_image: Optional[list] = None
    card_price: Optional[list] = None
    card_set: Optional[list] = None
    downvote: Optional[int] = None
    format: Optional[list] = None
    genesys_point: Optional[int] = None
    has_effect: Optional[int] = None
    konami_id: Optional[int] = None
    level: Optional[int] = None
    linkmarker: Optional[list] = None
    linkval: Optional[int] = None
    md_rarity: Optional[str] = None
    ocg_date: Optional[str] = None
    race: Optional[str] = None
    scale: Optional[int] = None
    tcg_date: Optional[str] = None
    treated_a: Optional[str] = None
    upvote: Optional[int] = None
    view: Optional[int] = None
    viewsweek: Optional[int] = None
    ygoprodeck_url: Optional[str] = None


@dataclass
class CardinfoListMatch:
    archetype: Optional[str] = None
    atk: Optional[int] = None
    attribute: Optional[str] = None
    banlist_info: Optional[dict] = None
    beta_name: Optional[str] = None
    card_image: Optional[list] = None
    card_price: Optional[list] = None
    card_set: Optional[list] = None
    desc: Optional[str] = None
    downvote: Optional[int] = None
    format: Optional[list] = None
    frame_type: Optional[str] = None
    genesys_point: Optional[int] = None
    has_effect: Optional[int] = None
    id: Optional[int] = None
    konami_id: Optional[int] = None
    level: Optional[int] = None
    linkmarker: Optional[list] = None
    linkval: Optional[int] = None
    md_rarity: Optional[str] = None
    name: Optional[str] = None
    ocg_date: Optional[str] = None
    race: Optional[str] = None
    scale: Optional[int] = None
    tcg_date: Optional[str] = None
    treated_a: Optional[str] = None
    type: Optional[str] = None
    upvote: Optional[int] = None
    view: Optional[int] = None
    viewsweek: Optional[int] = None
    ygoprodeck_url: Optional[str] = None

