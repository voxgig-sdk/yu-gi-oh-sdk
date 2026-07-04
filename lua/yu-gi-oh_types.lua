-- Typed models for the YuGiOh SDK (LuaLS annotations).
--
-- GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
-- params (op.<name>.points[].args.params[]). Field/param types come from the
-- canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
-- @voxgig/apidef VALID_CANON). Annotations only — no runtime effect. Do not
-- edit by hand.

---@class Cardinfo
---@field archetype? string
---@field atk? number
---@field attribute? string
---@field banlist_info? table
---@field beta_name? string
---@field card_image? table
---@field card_price? table
---@field card_set? table
---@field def? number
---@field desc string
---@field downvote? number
---@field format? table
---@field frame_type string
---@field genesys_point? number
---@field has_effect? number
---@field id number
---@field konami_id? number
---@field level? number
---@field linkmarker? table
---@field linkval? number
---@field md_rarity? string
---@field name string
---@field ocg_date? string
---@field race? string
---@field scale? number
---@field tcg_date? string
---@field treated_a? string
---@field type string
---@field upvote? number
---@field view? number
---@field viewsweek? number
---@field ygoprodeck_url? string

---@class CardinfoListMatch

local M = {}

return M
