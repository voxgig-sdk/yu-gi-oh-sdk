# YuGiOh SDK feature factory

require_relative 'feature/base_feature'
require_relative 'feature/ratelimit_feature'
require_relative 'feature/retry_feature'
require_relative 'feature/test_feature'
require_relative 'feature/timeout_feature'


module YuGiOhFeatures
  def self.make_feature(name)
    case name
    when "base"
      YuGiOhBaseFeature.new
    when "ratelimit"
      YuGiOhRatelimitFeature.new
    when "retry"
      YuGiOhRetryFeature.new
    when "test"
      YuGiOhTestFeature.new
    when "timeout"
      YuGiOhTimeoutFeature.new
    else
      YuGiOhBaseFeature.new
    end
  end
end
