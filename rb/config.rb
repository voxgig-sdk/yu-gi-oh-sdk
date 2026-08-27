# YuGiOh SDK configuration

module YuGiOhConfig
  # Return the process-wide config, built once on first use. The SDK reads
  # the config on every request and never writes to it, so one instance is
  # shared by every client rather than rebuilt per client.
  #
  # The returned hash is shared: treat it as read-only. Callers that need to
  # mutate should use make_config, which always returns a fresh copy.
  def self.shared_config
    @shared_config ||= make_config
  end


  # Build a fresh, fully materialised config hash. Every call rebuilds the
  # whole structure, so prefer shared_config unless you need a private copy
  # you intend to mutate.
  def self.make_config
    {
      "main" => {
        "name" => "YuGiOh",
        "slug" => "yu-gi-oh",
        "version" => "0.0.1",
        "target" => "rb",
      },
      "feature" => {
        "test" => {
          "options" => {
            "active" => false,
          },
          "transport" => "base",
        },
      },
      "options" => {
        "base" => "https://db.ygoprodeck.com/api/v7",
        "headers" => {
          "content-type" => "application/json",
        },
        "entity" => {
          "cardinfo" => {},
        },
      },
      "entity" => {
        "cardinfo" => {
          "fields" => [
            {
              "name" => "archetype",
              "short" => "The archetype the card belongs to",
              "type" => "`$STRING`",
            },
            {
              "name" => "atk",
              "short" => "ATK value (Monster cards only)",
              "type" => "`$INTEGER`",
            },
            {
              "name" => "attribute",
              "short" => "Attribute of the card (Monster cards only: DARK, LIGHT, WATER, FIRE, EARTH, WIND, DIVINE)",
              "type" => "`$STRING`",
            },
            {
              "name" => "banlist_info",
              "short" => "Banlist status information for the card",
              "type" => "`$OBJECT`",
            },
            {
              "name" => "beta_name",
              "short" => "Old/temporary/translated name (only when misc=yes)",
              "type" => "`$STRING`",
            },
            {
              "name" => "card_images",
              "short" => "Array of card images including alternate artworks",
              "type" => "`$ARRAY`",
            },
            {
              "name" => "card_prices",
              "short" => "Array of card prices from various vendors (lowest price across all versions)",
              "type" => "`$ARRAY`",
            },
            {
              "name" => "card_sets",
              "short" => "Array of card sets this card appears in",
              "type" => "`$ARRAY`",
            },
            {
              "name" => "def",
              "short" => "DEF value (Monster cards only, not Link Monsters)",
              "type" => "`$INTEGER`",
            },
            {
              "name" => "desc",
              "req" => true,
              "short" => "Card description/effect text",
              "type" => "`$STRING`",
            },
            {
              "name" => "downvotes",
              "short" => "Number of downvotes (only when misc=yes)",
              "type" => "`$INTEGER`",
            },
            {
              "name" => "formats",
              "short" => "Available formats the card is in (only when misc=yes)",
              "type" => "`$ARRAY`",
            },
            {
              "name" => "frameType",
              "req" => true,
              "short" => "The backdrop frame type (normal, effect, synchro, xyz, spell, trap, link, etc.)",
              "type" => "`$STRING`",
            },
            {
              "name" => "genesys_points",
              "short" => "Genesys format points code (only when format=genesys).",
              "type" => "`$INTEGER`",
            },
            {
              "name" => "has_effect",
              "short" => "Whether card has an actual text effect (1=true, 0=false) (only when misc=yes)",
              "type" => "`$INTEGER`",
            },
            {
              "name" => "id",
              "req" => true,
              "short" => "8-digit passcode/ID of the card",
              "type" => "`$INTEGER`",
            },
            {
              "name" => "konami_id",
              "short" => "Konami ID of the card (only when misc=yes)",
              "type" => "`$INTEGER`",
            },
            {
              "name" => "level",
              "short" => "Level or RANK of the card (Monster cards only, not Link Monsters)",
              "type" => "`$INTEGER`",
            },
            {
              "name" => "linkmarkers",
              "short" => "Link Markers (Link Monsters only)",
              "type" => "`$ARRAY`",
            },
            {
              "name" => "linkval",
              "short" => "Link value (Link Monsters only)",
              "type" => "`$INTEGER`",
            },
            {
              "name" => "md_rarity",
              "short" => "Master Duel rarity (only when misc=yes)",
              "type" => "`$STRING`",
            },
            {
              "name" => "name",
              "req" => true,
              "short" => "Name of the card",
              "type" => "`$STRING`",
            },
            {
              "name" => "ocg_date",
              "short" => "Original OCG release date (only when misc=yes)",
              "type" => "`$STRING`",
            },
            {
              "name" => "race",
              "short" => "Card race/type.",
              "type" => "`$STRING`",
            },
            {
              "name" => "scale",
              "short" => "Pendulum Scale value (Pendulum Monsters only)",
              "type" => "`$INTEGER`",
            },
            {
              "name" => "tcg_date",
              "short" => "Original TCG release date (only when misc=yes)",
              "type" => "`$STRING`",
            },
            {
              "name" => "treated_as",
              "short" => "If the card is treated as another card (e.g., Harpie Lady 1,2,3 are treated as Harpie Lady) (only when misc=yes)",
              "type" => "`$STRING`",
            },
            {
              "name" => "type",
              "req" => true,
              "short" => "The type of card (Normal Monster, Effect Monster, Synchro Monster, XYZ Monster, Spell Card, Trap Card, etc.)",
              "type" => "`$STRING`",
            },
            {
              "name" => "upvotes",
              "short" => "Number of upvotes (only when misc=yes)",
              "type" => "`$INTEGER`",
            },
            {
              "name" => "views",
              "short" => "Number of times card has been viewed in database (only when misc=yes)",
              "type" => "`$INTEGER`",
            },
            {
              "name" => "viewsweek",
              "short" => "Number of times card has been viewed this week (only when misc=yes)",
              "type" => "`$INTEGER`",
            },
            {
              "name" => "ygoprodeck_url",
              "short" => "URL to the card's page on YGOPRODeck",
              "type" => "`$STRING`",
            },
          ],
          "name" => "cardinfo",
          "op" => {
            "list" => {
              "input" => "data",
              "name" => "list",
              "points" => [
                {
                  "args" => {
                    "query" => [
                      {
                        "example" => "Blue-Eyes",
                        "kind" => "query",
                        "name" => "archetype",
                        "orig" => "archetype",
                        "type" => "`$STRING`",
                      },
                      {
                        "example" => "2100",
                        "kind" => "query",
                        "name" => "atk",
                        "orig" => "atk",
                        "type" => "`$STRING`",
                      },
                      {
                        "example" => "WIND",
                        "kind" => "query",
                        "name" => "attribute",
                        "orig" => "attribute",
                        "type" => "`$STRING`",
                      },
                      {
                        "example" => "tcg",
                        "kind" => "query",
                        "name" => "banlist",
                        "orig" => "banlist",
                        "type" => "`$STRING`",
                      },
                      {
                        "example" => "Metal Raiders",
                        "kind" => "query",
                        "name" => "cardset",
                        "orig" => "cardset",
                        "type" => "`$STRING`",
                      },
                      {
                        "example" => "tcg",
                        "kind" => "query",
                        "name" => "dateregion",
                        "orig" => "dateregion",
                        "type" => "`$STRING`",
                      },
                      {
                        "example" => "2000",
                        "kind" => "query",
                        "name" => "def",
                        "orig" => "def",
                        "type" => "`$STRING`",
                      },
                      {
                        "example" => "2002-08-23",
                        "kind" => "query",
                        "name" => "enddate",
                        "orig" => "enddate",
                        "type" => "`$STRING`",
                      },
                      {
                        "example" => "Wizard",
                        "kind" => "query",
                        "name" => "fname",
                        "orig" => "fname",
                        "type" => "`$STRING`",
                      },
                      {
                        "example" => "Speed Duel",
                        "kind" => "query",
                        "name" => "format",
                        "orig" => "format",
                        "type" => "`$STRING`",
                      },
                      {
                        "kind" => "query",
                        "name" => "has_effect",
                        "orig" => "has_effect",
                        "type" => "`$BOOLEAN`",
                      },
                      {
                        "example" => "6983839",
                        "kind" => "query",
                        "name" => "id",
                        "orig" => "id",
                        "type" => "`$STRING`",
                      },
                      {
                        "kind" => "query",
                        "name" => "konami_id",
                        "orig" => "konami_id",
                        "type" => "`$INTEGER`",
                      },
                      {
                        "example" => "4",
                        "kind" => "query",
                        "name" => "level",
                        "orig" => "level",
                        "type" => "`$STRING`",
                      },
                      {
                        "kind" => "query",
                        "name" => "link",
                        "orig" => "link",
                        "type" => "`$INTEGER`",
                      },
                      {
                        "example" => "top,bottom",
                        "kind" => "query",
                        "name" => "linkmarker",
                        "orig" => "linkmarker",
                        "type" => "`$STRING`",
                      },
                      {
                        "kind" => "query",
                        "name" => "misc",
                        "orig" => "misc",
                        "type" => "`$STRING`",
                      },
                      {
                        "example" => "Dark Magician",
                        "kind" => "query",
                        "name" => "name",
                        "orig" => "name",
                        "type" => "`$STRING`",
                      },
                      {
                        "example" => "Wyrm",
                        "kind" => "query",
                        "name" => "race",
                        "orig" => "race",
                        "type" => "`$STRING`",
                      },
                      {
                        "kind" => "query",
                        "name" => "scale",
                        "orig" => "scale",
                        "type" => "`$INTEGER`",
                      },
                      {
                        "example" => "name",
                        "kind" => "query",
                        "name" => "sort",
                        "orig" => "sort",
                        "type" => "`$STRING`",
                      },
                      {
                        "kind" => "query",
                        "name" => "staple",
                        "orig" => "staple",
                        "type" => "`$STRING`",
                      },
                      {
                        "example" => "2000-01-01",
                        "kind" => "query",
                        "name" => "startdate",
                        "orig" => "startdate",
                        "type" => "`$STRING`",
                      },
                      {
                        "kind" => "query",
                        "name" => "tcgplayer_data",
                        "orig" => "tcgplayer_data",
                        "type" => "`$STRING`",
                      },
                      {
                        "example" => "Spell Card",
                        "kind" => "query",
                        "name" => "type",
                        "orig" => "type",
                        "type" => "`$STRING`",
                      },
                    ],
                  },
                  "kind" => "http",
                  "method" => "GET",
                  "orig" => "/cardinfo.php",
                  "parts" => [
                    "cardinfo.php",
                  ],
                  "select" => {
                    "exist" => [
                      "archetype",
                      "atk",
                      "attribute",
                      "banlist",
                      "cardset",
                      "dateregion",
                      "def",
                      "enddate",
                      "fname",
                      "format",
                      "has_effect",
                      "id",
                      "konami_id",
                      "level",
                      "link",
                      "linkmarker",
                      "misc",
                      "name",
                      "race",
                      "scale",
                      "sort",
                      "staple",
                      "startdate",
                      "tcgplayer_data",
                      "type",
                    ],
                  },
                  "transform" => {
                    "req" => "`reqdata`",
                    "res" => "`body.data`",
                  },
                },
              ],
            },
          },
          "relations" => {
            "ancestors" => [],
          },
        },
      },
    }
  end


  def self.make_feature(name)
    require_relative 'features'
    YuGiOhFeatures.make_feature(name)
  end
end
