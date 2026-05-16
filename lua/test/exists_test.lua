-- ProjectName SDK exists test

local sdk = require("yu-gi-oh_sdk")

describe("YuGiOhSDK", function()
  it("should create test SDK", function()
    local testsdk = sdk.test(nil, nil)
    assert.is_not_nil(testsdk)
  end)
end)
