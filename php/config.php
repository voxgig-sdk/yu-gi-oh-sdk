<?php
declare(strict_types=1);

// YuGiOh SDK configuration

class YuGiOhConfig
{
    /** @var array<string,mixed>|null */
    private static ?array $shared_config = null;

    /**
     * Return the process-wide config, built once on first use. The SDK reads
     * the config on every request and never writes to it, so one instance is
     * shared by every client rather than rebuilt per client.
     *
     * PHP arrays are copy-on-write, so callers that do mutate the result get
     * their own copy and cannot disturb the shared one.
     */
    public static function shared_config(): array
    {
        if (self::$shared_config === null) {
            self::$shared_config = self::make_config();
        }
        return self::$shared_config;
    }

    /**
     * Build a fresh, fully materialised config array. Every call rebuilds the
     * whole structure, so prefer shared_config unless you need a private copy.
     */
    public static function make_config(): array
    {
        return [
            "main" => [
                "name" => "YuGiOh",
                "slug" => "yu-gi-oh",
                "version" => "0.0.1",
                "target" => "php",
            ],
            "feature" => [
                "ratelimit" => [
          'options' => [
            'active' => false,
            'burst' => 5,
            'rate' => 5,
          ],
          'optspec' => [
            'now' => '`$FUNCTION`',
            'sleep' => '`$FUNCTION`',
          ],
          'strict' => false,
          'transport' => 'wrap',
        ],
                "retry" => [
          'options' => [
            'active' => false,
            'factor' => 2,
            'maxDelay' => 2000,
            'minDelay' => 50,
            'retries' => 2,
            'statuses' => [
              408,
              425,
              429,
              500,
              502,
              503,
              504,
            ],
          ],
          'optspec' => [
            'jitter' => '`$BOOLEAN`',
            'sleep' => '`$FUNCTION`',
          ],
          'strict' => false,
          'transport' => 'wrap',
        ],
                "test" => [
          'options' => [
            'active' => false,
          ],
          'optspec' => [
            'entity' => '`$MAP`',
            'net' => '`$MAP`',
          ],
          'strict' => false,
          'transport' => 'base',
        ],
                "timeout" => [
          'options' => [
            'active' => false,
            'ms' => 30000,
          ],
          'optspec' => [
            'clearTimer' => '`$FUNCTION`',
            'setTimer' => '`$FUNCTION`',
          ],
          'strict' => false,
          'transport' => 'wrap',
        ],
            ],
            "options" => [
                "base" => "https://db.ygoprodeck.com/api/v7",
                "headers" => [
          'content-type' => 'application/json',
        ],
                "entity" => [
                    "cardinfo" => [],
                ],
            ],
            "entity" => [
        'cardinfo' => [
          'fields' => [
            [
              'name' => 'archetype',
              'title' => 'Archetype',
              'type' => '`$STRING`',
              'short' => 'The archetype the card belongs to',
            ],
            [
              'name' => 'atk',
              'title' => 'Atk',
              'type' => '`$INTEGER`',
              'short' => 'ATK value (Monster cards only)',
            ],
            [
              'name' => 'attribute',
              'title' => 'Attribute',
              'type' => '`$STRING`',
              'short' => 'Attribute of the card (Monster cards only: DARK, LIGHT, WATER, FIRE, EARTH, WIND, DIVINE)',
            ],
            [
              'name' => 'banlist_info',
              'title' => 'Banlist Info',
              'type' => '`$OBJECT`',
              'short' => 'Banlist status information for the card',
            ],
            [
              'name' => 'beta_name',
              'title' => 'Beta Name',
              'type' => '`$STRING`',
              'short' => 'Old/temporary/translated name (only when misc=yes)',
            ],
            [
              'name' => 'card_images',
              'title' => 'Card Images',
              'type' => '`$ARRAY`',
              'short' => 'Array of card images including alternate artworks',
            ],
            [
              'name' => 'card_prices',
              'title' => 'Card Prices',
              'type' => '`$ARRAY`',
              'short' => 'Array of card prices from various vendors (lowest price across all versions)',
            ],
            [
              'name' => 'card_sets',
              'title' => 'Card Sets',
              'type' => '`$ARRAY`',
              'short' => 'Array of card sets this card appears in',
            ],
            [
              'name' => 'def',
              'title' => 'Def',
              'type' => '`$INTEGER`',
              'short' => 'DEF value (Monster cards only, not Link Monsters)',
            ],
            [
              'name' => 'desc',
              'title' => 'Desc',
              'type' => '`$STRING`',
              'req' => true,
              'short' => 'Card description/effect text',
            ],
            [
              'name' => 'downvotes',
              'title' => 'Downvotes',
              'type' => '`$INTEGER`',
              'short' => 'Number of downvotes (only when misc=yes)',
            ],
            [
              'name' => 'formats',
              'title' => 'Formats',
              'type' => '`$ARRAY`',
              'short' => 'Available formats the card is in (only when misc=yes)',
            ],
            [
              'name' => 'frameType',
              'title' => 'Frame Type',
              'type' => '`$STRING`',
              'req' => true,
              'short' => 'The backdrop frame type (normal, effect, synchro, xyz, spell, trap, link, etc.)',
            ],
            [
              'name' => 'genesys_points',
              'title' => 'Genesys Points',
              'type' => '`$INTEGER`',
              'short' => 'Genesys format points code (only when format=genesys).',
            ],
            [
              'name' => 'has_effect',
              'title' => 'Has Effect',
              'type' => '`$INTEGER`',
              'short' => 'Whether card has an actual text effect (1=true, 0=false) (only when misc=yes)',
            ],
            [
              'name' => 'id',
              'title' => 'Id',
              'type' => '`$INTEGER`',
              'req' => true,
              'short' => '8-digit passcode/ID of the card',
            ],
            [
              'name' => 'konami_id',
              'title' => 'Konami Id',
              'type' => '`$INTEGER`',
              'short' => 'Konami ID of the card (only when misc=yes)',
            ],
            [
              'name' => 'level',
              'title' => 'Level',
              'type' => '`$INTEGER`',
              'short' => 'Level or RANK of the card (Monster cards only, not Link Monsters)',
            ],
            [
              'name' => 'linkmarkers',
              'title' => 'Linkmarkers',
              'type' => '`$ARRAY`',
              'short' => 'Link Markers (Link Monsters only)',
            ],
            [
              'name' => 'linkval',
              'title' => 'Linkval',
              'type' => '`$INTEGER`',
              'short' => 'Link value (Link Monsters only)',
            ],
            [
              'name' => 'md_rarity',
              'title' => 'Md Rarity',
              'type' => '`$STRING`',
              'short' => 'Master Duel rarity (only when misc=yes)',
            ],
            [
              'name' => 'name',
              'title' => 'Name',
              'type' => '`$STRING`',
              'req' => true,
              'short' => 'Name of the card',
            ],
            [
              'name' => 'ocg_date',
              'title' => 'Ocg Date',
              'type' => '`$STRING`',
              'short' => 'Original OCG release date (only when misc=yes)',
              'format' => 'date',
            ],
            [
              'name' => 'race',
              'title' => 'Race',
              'type' => '`$STRING`',
              'short' => 'Card race/type.',
            ],
            [
              'name' => 'scale',
              'title' => 'Scale',
              'type' => '`$INTEGER`',
              'short' => 'Pendulum Scale value (Pendulum Monsters only)',
            ],
            [
              'name' => 'tcg_date',
              'title' => 'Tcg Date',
              'type' => '`$STRING`',
              'short' => 'Original TCG release date (only when misc=yes)',
              'format' => 'date',
            ],
            [
              'name' => 'treated_as',
              'title' => 'Treated As',
              'type' => '`$STRING`',
              'short' => 'If the card is treated as another card (e.g., Harpie Lady 1,2,3 are treated as Harpie Lady) (only when misc=yes)',
            ],
            [
              'name' => 'type',
              'title' => 'Type',
              'type' => '`$STRING`',
              'req' => true,
              'short' => 'The type of card (Normal Monster, Effect Monster, Synchro Monster, XYZ Monster, Spell Card, Trap Card, etc.)',
            ],
            [
              'name' => 'upvotes',
              'title' => 'Upvotes',
              'type' => '`$INTEGER`',
              'short' => 'Number of upvotes (only when misc=yes)',
            ],
            [
              'name' => 'views',
              'title' => 'Views',
              'type' => '`$INTEGER`',
              'short' => 'Number of times card has been viewed in database (only when misc=yes)',
            ],
            [
              'name' => 'viewsweek',
              'title' => 'Viewsweek',
              'type' => '`$INTEGER`',
              'short' => 'Number of times card has been viewed this week (only when misc=yes)',
            ],
            [
              'name' => 'ygoprodeck_url',
              'title' => 'Ygoprodeck Url',
              'type' => '`$STRING`',
              'short' => 'URL to the card\'s page on YGOPRODeck',
              'format' => 'uri',
            ],
          ],
          'id' => [
            'field' => 'id',
            'name' => 'id',
          ],
          'name' => 'cardinfo',
          'op' => [
            'list' => [
              'input' => 'data',
              'name' => 'list',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'GET',
                  'orig' => '/cardinfo.php',
                  'segments' => [
                    [
                      'lit' => 'cardinfo.php',
                    ],
                  ],
                  'parts' => [
                    'cardinfo.php',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body.data`',
                  ],
                  'args' => [
                    'query' => [
                      [
                        'name' => 'archetype',
                        'orig' => 'archetype',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => 'Blue-Eyes',
                      ],
                      [
                        'name' => 'atk',
                        'orig' => 'atk',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => '2100',
                      ],
                      [
                        'name' => 'attribute',
                        'orig' => 'attribute',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => 'WIND',
                      ],
                      [
                        'name' => 'banlist',
                        'orig' => 'banlist',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => 'tcg',
                      ],
                      [
                        'name' => 'cardset',
                        'orig' => 'cardset',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => 'Metal Raiders',
                      ],
                      [
                        'name' => 'dateregion',
                        'orig' => 'dateregion',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => 'tcg',
                      ],
                      [
                        'name' => 'def',
                        'orig' => 'def',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => '2000',
                      ],
                      [
                        'name' => 'enddate',
                        'orig' => 'enddate',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => '2002-08-23',
                      ],
                      [
                        'name' => 'fname',
                        'orig' => 'fname',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => 'Wizard',
                      ],
                      [
                        'name' => 'format',
                        'orig' => 'format',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => 'Speed Duel',
                      ],
                      [
                        'name' => 'has_effect',
                        'orig' => 'has_effect',
                        'type' => '`$BOOLEAN`',
                        'kind' => 'query',
                      ],
                      [
                        'name' => 'id',
                        'orig' => 'id',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => '6983839',
                      ],
                      [
                        'name' => 'konami_id',
                        'orig' => 'konami_id',
                        'type' => '`$INTEGER`',
                        'kind' => 'query',
                      ],
                      [
                        'name' => 'level',
                        'orig' => 'level',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => '4',
                      ],
                      [
                        'name' => 'link',
                        'orig' => 'link',
                        'type' => '`$INTEGER`',
                        'kind' => 'query',
                      ],
                      [
                        'name' => 'linkmarker',
                        'orig' => 'linkmarker',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => 'top,bottom',
                      ],
                      [
                        'name' => 'misc',
                        'orig' => 'misc',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                      ],
                      [
                        'name' => 'name',
                        'orig' => 'name',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => 'Dark Magician',
                      ],
                      [
                        'name' => 'race',
                        'orig' => 'race',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => 'Wyrm',
                      ],
                      [
                        'name' => 'scale',
                        'orig' => 'scale',
                        'type' => '`$INTEGER`',
                        'kind' => 'query',
                      ],
                      [
                        'name' => 'sort',
                        'orig' => 'sort',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => 'name',
                      ],
                      [
                        'name' => 'staple',
                        'orig' => 'staple',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                      ],
                      [
                        'name' => 'startdate',
                        'orig' => 'startdate',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => '2000-01-01',
                      ],
                      [
                        'name' => 'tcgplayer_data',
                        'orig' => 'tcgplayer_data',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                      ],
                      [
                        'name' => 'type',
                        'orig' => 'type',
                        'type' => '`$STRING`',
                        'kind' => 'query',
                        'example' => 'Spell Card',
                      ],
                    ],
                  ],
                  'select' => [
                    'exist' => [
                      'archetype',
                      'atk',
                      'attribute',
                      'banlist',
                      'cardset',
                      'dateregion',
                      'def',
                      'enddate',
                      'fname',
                      'format',
                      'has_effect',
                      'id',
                      'konami_id',
                      'level',
                      'link',
                      'linkmarker',
                      'misc',
                      'name',
                      'race',
                      'scale',
                      'sort',
                      'staple',
                      'startdate',
                      'tcgplayer_data',
                      'type',
                    ],
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
      ],
        ];
    }


    public static function make_feature(string $name)
    {
        require_once __DIR__ . '/features.php';
        return YuGiOhFeatures::make_feature($name);
    }
}
