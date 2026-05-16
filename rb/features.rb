# YuGiOh SDK feature factory

require_relative 'feature/base_feature'
require_relative 'feature/test_feature'


module YuGiOhFeatures
  def self.make_feature(name)
    case name
    when "base"
      YuGiOhBaseFeature.new
    when "test"
      YuGiOhTestFeature.new
    else
      YuGiOhBaseFeature.new
    end
  end
end
