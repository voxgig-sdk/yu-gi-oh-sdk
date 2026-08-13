# frozen_string_literal: true

# Typed models for the YuGiOh SDK.
#
# GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
# params (op.<name>.points[].args.params[]). Member types come from the
# canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
# @voxgig/apidef VALID_CANON). Ruby types are unenforced; these YARD
# annotations document the shapes. Do not edit by hand.

# Cardinfo entity data model.
#
# @!attribute [rw] archetype
#   @return [String, nil]
#
# @!attribute [rw] atk
#   @return [Integer, nil]
#
# @!attribute [rw] attribute
#   @return [String, nil]
#
# @!attribute [rw] banlist_info
#   @return [Hash, nil]
#
# @!attribute [rw] beta_name
#   @return [String, nil]
#
# @!attribute [rw] card_images
#   @return [Array, nil]
#
# @!attribute [rw] card_prices
#   @return [Array, nil]
#
# @!attribute [rw] card_sets
#   @return [Array, nil]
#
# @!attribute [rw] def
#   @return [Integer, nil]
#
# @!attribute [rw] desc
#   @return [String]
#
# @!attribute [rw] downvotes
#   @return [Integer, nil]
#
# @!attribute [rw] formats
#   @return [Array, nil]
#
# @!attribute [rw] frameType
#   @return [String]
#
# @!attribute [rw] genesys_points
#   @return [Integer, nil]
#
# @!attribute [rw] has_effect
#   @return [Integer, nil]
#
# @!attribute [rw] id
#   @return [Integer]
#
# @!attribute [rw] konami_id
#   @return [Integer, nil]
#
# @!attribute [rw] level
#   @return [Integer, nil]
#
# @!attribute [rw] linkmarkers
#   @return [Array, nil]
#
# @!attribute [rw] linkval
#   @return [Integer, nil]
#
# @!attribute [rw] md_rarity
#   @return [String, nil]
#
# @!attribute [rw] name
#   @return [String]
#
# @!attribute [rw] ocg_date
#   @return [String, nil]
#
# @!attribute [rw] race
#   @return [String, nil]
#
# @!attribute [rw] scale
#   @return [Integer, nil]
#
# @!attribute [rw] tcg_date
#   @return [String, nil]
#
# @!attribute [rw] treated_as
#   @return [String, nil]
#
# @!attribute [rw] type
#   @return [String]
#
# @!attribute [rw] upvotes
#   @return [Integer, nil]
#
# @!attribute [rw] views
#   @return [Integer, nil]
#
# @!attribute [rw] viewsweek
#   @return [Integer, nil]
#
# @!attribute [rw] ygoprodeck_url
#   @return [String, nil]
Cardinfo = Struct.new(
  :archetype,
  :atk,
  :attribute,
  :banlist_info,
  :beta_name,
  :card_images,
  :card_prices,
  :card_sets,
  :def,
  :desc,
  :downvotes,
  :formats,
  :frameType,
  :genesys_points,
  :has_effect,
  :id,
  :konami_id,
  :level,
  :linkmarkers,
  :linkval,
  :md_rarity,
  :name,
  :ocg_date,
  :race,
  :scale,
  :tcg_date,
  :treated_as,
  :type,
  :upvotes,
  :views,
  :viewsweek,
  :ygoprodeck_url,
  keyword_init: true
)

# Request payload for Cardinfo#list.
#
# @!attribute [rw] archetype
#   @return [String, nil]
#
# @!attribute [rw] atk
#   @return [Integer, nil]
#
# @!attribute [rw] attribute
#   @return [String, nil]
#
# @!attribute [rw] banlist_info
#   @return [Hash, nil]
#
# @!attribute [rw] beta_name
#   @return [String, nil]
#
# @!attribute [rw] card_images
#   @return [Array, nil]
#
# @!attribute [rw] card_prices
#   @return [Array, nil]
#
# @!attribute [rw] card_sets
#   @return [Array, nil]
#
# @!attribute [rw] def
#   @return [Integer, nil]
#
# @!attribute [rw] desc
#   @return [String, nil]
#
# @!attribute [rw] downvotes
#   @return [Integer, nil]
#
# @!attribute [rw] formats
#   @return [Array, nil]
#
# @!attribute [rw] frameType
#   @return [String, nil]
#
# @!attribute [rw] genesys_points
#   @return [Integer, nil]
#
# @!attribute [rw] has_effect
#   @return [Integer, nil]
#
# @!attribute [rw] id
#   @return [Integer, nil]
#
# @!attribute [rw] konami_id
#   @return [Integer, nil]
#
# @!attribute [rw] level
#   @return [Integer, nil]
#
# @!attribute [rw] linkmarkers
#   @return [Array, nil]
#
# @!attribute [rw] linkval
#   @return [Integer, nil]
#
# @!attribute [rw] md_rarity
#   @return [String, nil]
#
# @!attribute [rw] name
#   @return [String, nil]
#
# @!attribute [rw] ocg_date
#   @return [String, nil]
#
# @!attribute [rw] race
#   @return [String, nil]
#
# @!attribute [rw] scale
#   @return [Integer, nil]
#
# @!attribute [rw] tcg_date
#   @return [String, nil]
#
# @!attribute [rw] treated_as
#   @return [String, nil]
#
# @!attribute [rw] type
#   @return [String, nil]
#
# @!attribute [rw] upvotes
#   @return [Integer, nil]
#
# @!attribute [rw] views
#   @return [Integer, nil]
#
# @!attribute [rw] viewsweek
#   @return [Integer, nil]
#
# @!attribute [rw] ygoprodeck_url
#   @return [String, nil]
CardinfoListMatch = Struct.new(
  :archetype,
  :atk,
  :attribute,
  :banlist_info,
  :beta_name,
  :card_images,
  :card_prices,
  :card_sets,
  :def,
  :desc,
  :downvotes,
  :formats,
  :frameType,
  :genesys_points,
  :has_effect,
  :id,
  :konami_id,
  :level,
  :linkmarkers,
  :linkval,
  :md_rarity,
  :name,
  :ocg_date,
  :race,
  :scale,
  :tcg_date,
  :treated_as,
  :type,
  :upvotes,
  :views,
  :viewsweek,
  :ygoprodeck_url,
  keyword_init: true
)

