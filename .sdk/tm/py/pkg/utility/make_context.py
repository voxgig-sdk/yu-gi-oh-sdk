# YuGiOh SDK utility: make_context

from projectname_sdk.core.context import YuGiOhContext


def make_context_util(ctxmap, basectx):
    return YuGiOhContext(ctxmap, basectx)
