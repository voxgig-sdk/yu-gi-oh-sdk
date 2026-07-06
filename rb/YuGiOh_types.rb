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
# @!attribute [rw] card_image
#   @return [Array, nil]
#
# @!attribute [rw] card_price
#   @return [Array, nil]
#
# @!attribute [rw] card_set
#   @return [Array, nil]
#
# @!attribute [rw] def
#   @return [Integer, nil]
#
# @!attribute [rw] desc
#   @return [String]
#
# @!attribute [rw] downvote
#   @return [Integer, nil]
#
# @!attribute [rw] format
#   @return [Array, nil]
#
# @!attribute [rw] frame_type
#   @return [String]
#
# @!attribute [rw] genesys_point
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
# @!attribute [rw] linkmarker
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
# @!attribute [rw] treated_a
#   @return [String, nil]
#
# @!attribute [rw] type
#   @return [String]
#
# @!attribute [rw] upvote
#   @return [Integer, nil]
#
# @!attribute [rw] view
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
  :card_image,
  :card_price,
  :card_set,
  :def,
  :desc,
  :downvote,
  :format,
  :frame_type,
  :genesys_point,
  :has_effect,
  :id,
  :konami_id,
  :level,
  :linkmarker,
  :linkval,
  :md_rarity,
  :name,
  :ocg_date,
  :race,
  :scale,
  :tcg_date,
  :treated_a,
  :type,
  :upvote,
  :view,
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
# @!attribute [rw] card_image
#   @return [Array, nil]
#
# @!attribute [rw] card_price
#   @return [Array, nil]
#
# @!attribute [rw] card_set
#   @return [Array, nil]
#
# @!attribute [rw] def
#   @return [Integer, nil]
#
# @!attribute [rw] desc
#   @return [String, nil]
#
# @!attribute [rw] downvote
#   @return [Integer, nil]
#
# @!attribute [rw] format
#   @return [Array, nil]
#
# @!attribute [rw] frame_type
#   @return [String, nil]
#
# @!attribute [rw] genesys_point
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
# @!attribute [rw] linkmarker
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
# @!attribute [rw] treated_a
#   @return [String, nil]
#
# @!attribute [rw] type
#   @return [String, nil]
#
# @!attribute [rw] upvote
#   @return [Integer, nil]
#
# @!attribute [rw] view
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
  :card_image,
  :card_price,
  :card_set,
  :def,
  :desc,
  :downvote,
  :format,
  :frame_type,
  :genesys_point,
  :has_effect,
  :id,
  :konami_id,
  :level,
  :linkmarker,
  :linkval,
  :md_rarity,
  :name,
  :ocg_date,
  :race,
  :scale,
  :tcg_date,
  :treated_a,
  :type,
  :upvote,
  :view,
  :viewsweek,
  :ygoprodeck_url,
  keyword_init: true
)

