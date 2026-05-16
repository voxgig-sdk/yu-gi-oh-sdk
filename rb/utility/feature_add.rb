# YuGiOh SDK utility: feature_add
module YuGiOhUtilities
  FeatureAdd = ->(ctx, f) {
    ctx.client.features << f
  }
end
