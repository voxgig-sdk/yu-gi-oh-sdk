-- YuGiOh SDK error

local YuGiOhError = {}
YuGiOhError.__index = YuGiOhError


function YuGiOhError.new(code, msg, ctx)
  local self = setmetatable({}, YuGiOhError)
  self.is_sdk_error = true
  self.sdk = "YuGiOh"
  self.code = code or ""
  self.msg = msg or ""
  self.ctx = ctx
  self.result = nil
  self.spec = nil
  return self
end


function YuGiOhError:error()
  return self.msg
end


function YuGiOhError:__tostring()
  return self.msg
end


return YuGiOhError
