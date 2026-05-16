# YuGiOh SDK utility: make_context
require_relative '../core/context'
module YuGiOhUtilities
  MakeContext = ->(ctxmap, basectx) {
    YuGiOhContext.new(ctxmap, basectx)
  }
end
