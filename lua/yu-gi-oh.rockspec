package = "voxgig-sdk-yu-gi-oh"
version = "0.0-1"
source = {
  url = "git://github.com/voxgig-sdk/yu-gi-oh-sdk.git"
}
description = {
  summary = "YuGiOh SDK for Lua",
  license = "MIT"
}
dependencies = {
  "lua >= 5.3",
  "dkjson >= 2.5",
  "dkjson >= 2.5",
}
build = {
  type = "builtin",
  modules = {
    ["yu-gi-oh_sdk"] = "yu-gi-oh_sdk.lua",
    ["config"] = "config.lua",
    ["features"] = "features.lua",
  }
}
